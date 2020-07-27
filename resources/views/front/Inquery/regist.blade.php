@extends('layouts.front.app')

@section('content')
<div id="content">
<section class="call">

    <h2>お問い合わせ</h2>
    <div class="formbox">
        <form method="POST" action="{{ route('inquery') }}">
            @csrf
            <p id="form">
            メールアドレス<span class="red">（必須）</span><br>
            <input class="inp30" type="text" name="adress" value="{{old('adress')}}">
            </p>

            <p>
            お名前<span class="red">（必須）</span><br>
            <input class="inp30" type="text" name="name" value="{{old('name')}}">
            </p>

            <p>
            お問い合わせ内容<span class="red">（必須）</span><br>
            <textarea class="inp100" name="main_text"> {!! nl2br(e(old('main_text'))) !!}</textarea>
            </p>

            <p class="center">
                <input class="send_b" type="submit" value="送信する">
            </p>
        </form>
    </div>

</section>
</div>
@endsection