<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta name="Keywords" content="家電,冷蔵庫,カメラ" />
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <!-- Styles -->
        <link href="{{ asset('css/index.css') }}" rel="stylesheet">
        <!-- <link href="css/index.css" rel="stylesheet" type="text/css" /> -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

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
                <ul class="menu">
                    <li class="menu-item"><a href="#">TOP</a></li>
                    <li class="menu-item"><a href="#">カテゴリー</a></li>
                    <li class="menu-item"><a href="#">検証結果</a></li>
                    <li class="menu-item"><a href="#">自己紹介</a></li>
                    <li class="menu-item"><a href="#">サイトの使い方</a></li>
                    <li class="menu-item"><a href="#">お問い合わせ</a></li>
                    <div class="top_search sp">
                        <form action="./" method="get">
                        <input class="window"type="text" size="20" name="q" value="" maxlength="200" />
                        <input class="butn"type="submit" value=" 検索 " />
                        </form>
                    </div>
                    </ul>
                </nav>
            <!--main-->




            <main class="clearfix">
                <!--nav-->  
                <div class="side_menu pc">

	            <div class="top_search">
	                <form action="./" method="get">
	                <input class="window"type="text" size="20" name="q" value="" maxlength="200" />
	                <input class="butn"type="submit" value=" 検索 " />
	                </form>
	            </div>

                    <h3>カテゴリー</h3>
                    <ul id="menu">
                        <li><div class="menu_in"><img src="{{ asset('images/arrow.gif') }}"> らくらく</div>
                        <ul class="sub_menu">
                            <li><a href="#">もうける</a></li>
                            <li><a href="#">そんする</a></li>
                            <li><a href="#">ローン</a></li>
                        </ul></li>
                        <li><div class="menu_in"><img src="{{ asset('images/arrow.gif') }}"> キッチン・調理</div>
                        <ul class="sub_menu">
                            <li><a href="#">冷蔵庫・冷凍庫</a></li>
                            <li><a href="#">オーブン・レンジ・トースター</a></li>
                            <li><a href="#">炊飯器・ホームベーカリー</a></li>
                            <li><a href="#">電気ポット・ケトル</a></li>
                            <li><a href="#">コーヒーメーカー</a></li>
                        </ul></li>
                        <li><div class="menu_in"><img src="{{ asset('images/arrow.gif') }}"> カメラ・ビデオ</div>
                        <ul class="sub_menu">
                            <li><a href="#">デジタルカメラ</a></li>
                            <li><a href="#">ビデオカメラ</a></li>
                            <li><a href="#">カメラレンズ・フィルター</a></li>
                        </ul></li>
                        <li><div class="menu_in"><img src="{{ asset('images/arrow.gif') }}">オーディオ</div>
                        <ul class="sub_menu">
                            <li><a href="#">レコードプレイヤー</a></li>
                            <li><a href="#">ヘッドホン・イヤホン</a></li>
                            <li><a href="#">オーディオプレイヤー・レコーダー</a></li>
                            <li><a href="#">カセットデッキ</a></li>
                        </ul></li>
                        <li><div class="menu_in"><img src="{{ asset('images/arrow.gif') }}">テレビ</div>
                            <ul class="sub_menu">
                                <li><a href="#">液晶機器</a></li>
                                <li><a href="#">レコーダー・プレイヤー</a></li>
                            </ul></li>
                            <li><div class="menu_in"><img src="{{ asset('images/arrow.gif') }}">美容・健康器具</div>
                                <ul class="sub_menu">
                                    <li><a href="#">ドライヤー・ヘアーアイロン</a></li>
                                    <li><a href="#">体重計・体脂肪計</a></li>
                                    <li><a href="#">マッサージ器</a></li>
                                </ul></li>
                                <li><div class="menu_in"><img src="{{ asset('images/arrow.gif') }}">季節家電</div>
                                    <ul class="sub_menu">
                                        <li><a href="#">エアコン</a></li>
                                        <li><a href="#">扇風機</a></li>
                                        <li><a href="#">電気暖房</a></li>
                                        <li><a href="#">石油暖房</a></li>
                                        <li><a href="#">加湿器・除湿器</a></li>
                                </ul></li>
                    </ul>
                    <h3 class="pc">更新情報</h3>
                        <table id="side_info-table" class="pc">
                            <tr><th><span class="dashed_af">2020.03.03</span>&nbsp;<span class="new_mark">NEW</span></th></tr>
                            <br><td><span class="dashed_af">ああああああああああああああああああああああああ</span></td></span></tr>
                            <tr><th><span class="dashed_af">2020.03.03</span></th></tr>
                            <tr><td><span class="dashed_af">ああああああああああああああああああああああああ</span></td></span></tr>
                            <tr><th><span class="dashed_af">2020.03.03</span></th></tr>
                            <tr><td><span class="dashed_af">ああああああああああああああああああああああああ</span></td></span></tr>
                            <tr><th><span class="dashed_af">2020.03.03</span></th></tr>
                            </tr><td><span class="dashed_af">ああああああああああああああああああああああああ</span></td></span></tr>
                        </table>

                </div>
                <!--nav end--> 

                <!--content-->
                <div id="content">


                    <section class="about">
                        <h2>ラクラク大百科とはとは</h2>
							<p>さだおと愉快な仲間どもの巣窟である。</p>

                    </section>


                  <section class="about">
                        <h2>自己紹介</h2>
							<p>さだおと愉快な仲間どもの巣窟である。</p>

                    </section>

                    <section class="info sp">
                        <h2>更新情報</h2>
                        <table id="info-table">
                            <tr><th><span class="dashed_af">2020.03.03</span>&nbsp;<span class="new_mark">NEW</span></th><td><span class="dashed_af">ああああああああああああああああああああああああ</span></td></span></tr>
                            <tr><th><span class="dashed_af">2020.03.03</span></th><td><span class="dashed_af">ああああああああああああああああああああああああ</span></td></span></tr>
                            <tr><th><span class="dashed_af">2020.03.03</span></th><td><span class="dashed_af">ああああああああああああああああああああああああ</span></td></span></tr>
                            <tr><th><span class="dashed_af">2020.03.03</span></th><td><span class="dashed_af">ああああああああああああああああああああああああ</span></td></span></tr>
                        </table>
                    </section>
                

                </div>

<!--
                <div class="side_info">
                    <ul>
                    <li class="pc"><a href src=""><img src="images/ban01.png"/ alt="アウトレット"></a></li>
                    <li class="pc"><a href src=""><img src="images/ban02.png"/></a></li>
                    </ul>

                    <ul>
                        <li class="sp"><a href src=""><img src="images/ban01_sp.png"/ alt="アウトレット"></a></li>
                        <li class="sp"><a href src=""><img src="images/ban02_sp.png"/></a></li>
                        </ul>
                </div>-->



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
        <script type="text/javascript">
            $(function(){
                $('.sub_menu').hide();
                $('.menu_in').click(function(){
                    $('img').removeClass('rotate');
                    $('ul.sub_menu').slideUp();
                    if($('+ul.sub_menu',this).css('display') == 'none'){
                        $('img',this).addClass('rotate');
                        $('+ul.sub_menu',this).slideDown();
                    }
                });
            });
        </script>
        <script>
            //ハンバーガー
            jQuery('.hamburger').on('click', function() {
                if(jQuery('.menu-container .menu').css('display') === 'block') {
                    jQuery('.menu-container .menu').slideUp('1500');
                }else {
                    jQuery('.menu-container .menu').slideDown('1500');
                }
            });
            //画面幅で表示コンテンツと非表示コンテンツを分ける
            var disp_width = $(window).width();
            if(disp_width < 480){
                //SP
                $(".pc").css("display","none");
            }else{
                //PC
                $(".sp").css("display","none");
            }
        </script>
    </body>
</html>