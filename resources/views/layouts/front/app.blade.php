<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta name="Keywords" content="家電,冷蔵庫,カメラ" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <link href="{{ asset('css/index.css') }}" rel="stylesheet" type="text/css" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="{{ asset('js/common.js') }}"></script>

        <title>ラクラク大百科</title>

    </head>
    <body>
            <!--header-->
            <header>
                <h1 class=""><img src="{{ asset('images/header.png') }}" ></h1>
            
            </header>
            <!--header end-->
            <div class="hamburger"><span></span></div>
                <nav class="menu-container">
                <ul class="main_menu">
                    <li class="menu-item"><a href="{{ route('index') }}">TOP</a></li>
                    <li class="menu-item"><a href="{{ route('category') }}">カテゴリー</a></li>
                    <li class="menu-item"><a href="#">検証結果</a></li>
                    <li class="menu-item"><a href="#">自己紹介</a></li>
                    <li class="menu-item"><a href="#">サイトの使い方</a></li>
                    <li class="menu-item"><a href="{{ route('inquery') }}">お問い合わせ</a></li>
                    <div class="top_search sp">
                        <form action="{{route('search')}}" method="post">
                        @csrf
                        <input class="window"type="text" size="20" name="key" maxlength="200" />
                        <input class="butn" type="submit" value=" 検索 " />
                        </form>
                    </div>
                    </ul>
                </nav>
            <!--main-->

            <main class="clearfix">
                <!--nav-->  
                <div class="side_menu pc">

	            <div class="top_search">
                    <form action="{{route('search')}}" method="post">
                        @csrf
                        <input class="window"type="text" size="20" name="key" maxlength="200" />
                        <input class="butn" type="submit" value=" 検索 " />
	                </form>
	            </div>

                    <h3>カテゴリー</h3>
                    <ul id="menu">
                    @foreach ($categories as $index => $category)
                        @if($category -> main_id == null)
                        <li><div class="menu_in"><img src="{{ asset('images/arrow.gif') }}"> {{ $category -> name}}</div>
                            @if(isset($category->sub_categories))
                            <ul class="sub_menu">
                                @foreach ($category->sub_categories as $sub_category)
                                <li><a href="{{ route('category') }}/article-list/{{ $sub_category -> id}}/1">{{ $sub_category -> name}}</a></li>
                                @endforeach
                            </ul>
                            @endif
                        @endif
                        </li>
                    @endforeach
                    </ul>
                    <h3 class="pc">更新情報</h3>
                        <table id="side_info-table" class="pc">
                            @foreach ($recentlylists as $recentlylist)
                            <tr><th><span class="dashed_af">{{ $recentlylist -> release_at->format('Y.m.d')}}</span>&nbsp;<span class="new_mark">NEW</span></th></tr>
                            <br><td><a href="{{ route('article') }}/{{ $recentlylist -> id}}"><span class="dashed_af">{{ $recentlylist -> title}}</span></a></td></tr>
                            @endforeach
                        </table>
                </div>
                <!--nav end--> 

                <!--content-->
                @yield('content')
            </main>

        <footer>
            
            <div class="footer_link">
                <div class="linkbox">
                <ul>
                    <li>ご利用ガイド</li>
                    <li>お支払方法</li>
                    <li>配送について</li>
  
                </ul>

                <ul>
                    <li>ご利用規約</li>   
                    <li>特定商取引法に基づく表示</li>  
                    <li>企業情報</li>
                </ul>
                </div>
            </div>
            <p class="copy">Copyright (C) ラクラク大百科 2020 All Rights Reserved. </p>
        </footer>
    </body>
</html>