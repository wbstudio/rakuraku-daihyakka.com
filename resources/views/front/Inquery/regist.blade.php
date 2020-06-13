@extends('layouts.contents_header')

@section('content')
<div class="">
    <div class="">
        <div class="">
            <div class="">

                <div class="">
                <form method="POST" action="{{ route('inquery') }}">
                @csrf
                    <div>
                        お名前：<input type="text" name="name" value="{{old('name')}}">
                    </div>
                    <div>
                        アドレス：<input type="text" name="adress" value="{{old('adress')}}">
                    </div>
                    <div>
                        内容：<textarea name="main_text"> {{old('main_text')}}</textarea>
                    </div>
                    <div>
                        <input type="submit" value="確認画面へ">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection