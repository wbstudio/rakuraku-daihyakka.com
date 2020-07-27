@extends('layouts.front.app')

@section('content')
<div id="content">
<section class="call">
<h2>お問い合わせ内容</h2>
<div class="formbox">
    <form method="POST" action="{{ route('inquery_complete') }}">
    @csrf
    <table>
    <tr>
        <th>お名前</th>
        <td>{{$inquery -> name}}</td>
    </tr>
    <tr>
        <th>アドレス</th>
        <td>{{$inquery -> adress}}</td>
    </tr>
    <tr>
        <th class="detail">内容</th>
        <td>{!! nl2br(e($inquery -> main_text)) !!}</td>
    </tr>
    </table>
    <input type="hidden" name="name" value="{{$inquery -> name}}">
    <input type="hidden" name="adress" value="{{$inquery -> adress}}">
    <input type="hidden" name="main_text" value="{!! nl2br(e($inquery -> main_text)) !!}">
    <div class="sbs_button">
        <input class="" type="submit" name="action" value="送信する">
        <input class="" type="submit" name="action" value="戻る">
    </div>
    </form>
</div>
</section>
</div>
@endsection