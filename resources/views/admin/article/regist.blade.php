@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                <form method="POST" action="{{ route('admin.article_regist') }}">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <h3>Article Insert</h3>
                    <div>
                        title::<input type="text" name="title">
                    </div>
                    <div>
                    Category::
                    <select name="category_id">
                        @foreach ($categories as $index => $category)
                            @if($category -> main_id == null)
                            <option disabled @if($index == 0)selected @endif>--(main){{ $category -> name}}--</option>
                                @foreach ($category->sub_categories as $sub_category)
                                <option value="{{$sub_category -> id}}">--(sub){{ $sub_category -> name}}</option>
                                @endforeach
                            @endif
                        @endforeach
                    </select>
                    </div>
                    <div>
                    <textarea id="editor" name="main"></textarea>
                    <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
                    <script>
                        window.onload=function(){
                            CKEDITOR.replace('editor',{
                                filebrowserBrowseUrl:filemanager.ckBrowseUrl
                            })
                        }
                    </script>
                    </div>
                    <div>
                    ReleaseDate::
                    <input type="text" id="NowDaySet" class="datepicker" value="" name="release_day">
                    <select name="release_hour" id="NowHorSet">
                        @for($i = 0; $i < 24; $i++))
                        <option value="{{ $i }}">
                            {{ $i }}
                        </option>
                        @endfor
                    </select>
                    時<select name="release_minute" id="NowMinSet">
                        @for($i = 0; $i < 60; $i++))
                        <option value="{{ $i }}">
                            {{ $i }}
                        </option>
                        @endfor
                    </select>
                    分
                    </div>
                    <div>
                    <input type="submit">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection