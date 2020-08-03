@extends('layouts.front.app')

@section('content')
<div id="content">
<section class="about">
    <h2>カテゴリー</h2>
    <dl class="category">
    @foreach ($categories as $index => $category)
        @if($category -> main_id == null)
        <dt>{{ $category -> name}}</dt>
            @foreach ($category->sub_categories as $sub_category)
            <dd><a href="{{ route('category') }}/article-list/{{ $sub_category -> id}}/1">{{ $sub_category -> name}}</a></dd>
            @endforeach
        @endif
    @endforeach
	</dl>
</section>
</div>
@endsection