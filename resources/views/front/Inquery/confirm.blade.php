@extends('layouts.contents_header')

@section('content')
<div class="">
    <div class="">
        <div class="">
            <div class="">

                <div class="">
                <form method="POST" action="{{ route('inquery_complete') }}">
                @csrf
                    <div>
                        お名前：{{$inquery -> name}}
                    </div>
                    <div>
                        アドレス：{{$inquery -> adress}}
                    </div>
                    <div>
                        内容：{!!$inquery -> main_text!!}
                    </div>
                    <div>
                    <input type="hidden" name="name" value="{{$inquery -> name}}">
                    <input type="hidden" name="adress" value="{{$inquery -> adress}}">
                    <input type="hidden" name="main_text" value="{!!$inquery -> main_text!!}">
                    <input type="submit" name="action" value="submit">
                    <input type="submit" name="action" value="back">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection