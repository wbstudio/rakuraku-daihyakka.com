@extends('layouts.front.app')

@section('content')
<div id="content">

    @if( request()->path()  == "/")
    <section class="info sp">
        <h2>更新情報</h2>
        <table id="info-table">
            @foreach ($recentlylists as $recentlylist)
            <tr><th><span class="dashed_af">{{ $recentlylist -> release_at->format('Y.m.d')}}</span>&nbsp;<span class="new_mark">NEW</span></th>
            <td><span class="dashed_af">{{ $recentlylist -> title}}</span></td></span></tr>
            @endforeach
        </table>
    </section>
    @endif
    <section class="about">
        <h2>ラクラク大百科とはとは</h2>
            <p>さだおと愉快な仲間どもの巣窟である。</p>

    </section>
    <section class="about">
        <h2>自己紹介</h2>
            <p>さだおと愉快な仲間どもの巣窟である。</p>
    </section>
</div>
@endsection