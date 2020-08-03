@extends('layouts.front.app')

@section('content')
<div id="content">
<section class="kijibox">
    <h2>
         @if($url == "category")
            カテゴリー「{{$pagetitle -> name}}」の記事一覧
         @elseif($url == "search")
            「{{$pagetitle}}」の検索結果一覧
         @endif
    </h2>
    @isset($Articles)
    @foreach($Articles as $Article)
    <div class="kiji">
    <a href="{{route('article')}}/{{$Article->id}}" style="width:100%;">
		<p class="kiji_title">{{$Article->title}}</p>
		<p class="kiji_day">
            {{$Article->release_at->format('Y年m月d日')}}　{{$Article->category_name}}
            <img src="{{route("index")}}/images/file.png">
        </p>
        <p class="kiji_gazo"><img src="{{route("index")}}/images/gazo.png"></p>
		<p class="kiji_in">ああああああああああああああああああああああ...[続きを読む]</p>
		</a>
	</div>
    @endforeach
    @else
    <div class="kiji">
        記事がない...orz
	</div>
    @endisset
    @isset($pagenator -> firstPageNum)
    <a href="{{route("index")}}/{{$url}}/article-list/{{$keyforurl}}/{{$pagenator -> firstPageNum}}">最初</a>
    @endisset
    @isset($pagenator -> prePageNum)
    <a href="{{route("index")}}/{{$url}}/article-list/{{$keyforurl}}/{{$pagenator -> prePageNum}}">前へ</a>
    @endisset
    @isset($pagenator -> firstPageNum)
    ...
    @endisset
    @isset($pagenator -> linkNum)
        @foreach($pagenator -> linkNum as $key => $Num)
        @if($page == $Num)
        <span style="background:#FF0;">{{$Num}}</span>
        @else
        <a href="{{route("index")}}/{{$url}}/article-list/{{$keyforurl}}/{{$Num}}">{{$Num}}</a>
        @endif
        @endforeach
    @endisset
    @isset($pagenator -> lastPageNum)
    ...
    @endisset
    @isset($pagenator -> nextPageNum)
    <a href="{{route("index")}}/{{$url}}/article-list/{{$keyforurl}}/{{$pagenator -> nextPageNum}}">次へ</a>
    @endisset
    @isset($pagenator -> lastPageNum)
    <a href="{{route("index")}}/{{$url}}/article-list/{{$keyforurl}}/{{$pagenator -> lastPageNum}}">最後</a>
    @endisset
       
</section>
</div>
@endsection