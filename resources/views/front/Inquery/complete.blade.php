@extends('layouts.front.app')

@section('content')
<div id="content">
    <section class="call">
        <h2>送信完了しました</h2>
        <div class="formbox">
            <p>
            お問い合わせ受け付けました。<br>
            ありがとうございます！
            </p>
            <div class="return_button">
                <a href="{{ route('index') }}">Topページへ戻る</a>
            </div>
        </div>
    </section>
</div>
@endsection