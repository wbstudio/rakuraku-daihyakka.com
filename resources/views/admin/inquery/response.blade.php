@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                <form method="POST" action="{{ route('admin.inquery_reposponse') }}">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <h3>Inquery Response</h3>
                   <div>
                        問い合わせ人::{{$inquery -> name}}
                    </div>
                    <div>
                        問い合わせアドレス::{{$inquery -> adress}}
                    </div>
                    <div>
                    問い合わせ内容::{!!$inquery -> main_text!!}
                    </div>
                    <div>
                    問い合わせ時間::{{$inquery -> created_at}}
                    @if($inquery -> response == 1 && $inquery -> resp_text != null)
                    <br>返信時間::{{$inquery -> updated_at}}
                    @endif
                    </div>
                    <div>
                    res::
                        <input tye="text" name="resp_title" @if($inquery -> response == 1 && $inquery -> resp_title != null) readonly @endif value="{{$inquery -> resp_title}}">
                    </div>
                    <div>
                    res::
                        <textarea name="resp_text" @if($inquery -> response == 1 && $inquery -> resp_text != null) readonly @endif>{{$inquery -> resp_text}}</textarea>
                    </div>
                    <div>
                    @if($inquery -> response == 0 && $inquery -> resp_text == null)
                    <input type="submit">
                    @endif
                    </div>
                    <input type="hidden" name="adress" value="{{$inquery -> adress}}">
                    <input type="hidden" name="id" value="{{$inquery -> id}}">
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection