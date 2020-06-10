@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                <form method="POST" action="{{ route('admin.article_updata') }}">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <h3>Article Updata</h3>
                    <div>
                        CategoryName::<input type="text" name="title" value="{{$article -> title}}">
                    </div>
                    <div>
                    MainCategory::
                    <select name="category_id">
                            @foreach ($categories as $index => $category)
                                <option value="{{ $category -> id}}"  @if($category->id==$article->category_id) selected @endif>
                                @if($category->main_id==null)
                                (m)
                                @else
                                (S)
                                @endif    
                                {{ $category -> name}}</option>
                            @endforeach
                    </select>
                    </div>
                    <div>
                    <textarea id="editor" name="main">{!! $article -> main !!}</textarea>
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
                    <input type="text" class="datepicker" value="{{$article -> disp_release_YMD}}" name="release_day">
                    <select name="release_hour">
                        @for($i = 0; $i < 24; $i++))
                        <option value="{{ $i }}" @if($article -> disp_release_H == $i) selected @endif>
                            {{ $i }}
                        </option>
                        @endfor
                    </select>
                    時<select name="release_minute">
                        @for($i = 0; $i < 60; $i++))
                        <option value="{{ $i }}" @if($article -> disp_release_m == $i) selected @endif>
                            {{ $i }}
                        </option>
                        @endfor
                    </select>
                    分
                    </div>
                    <div>
                    <input type="submit">
                    <input type="hidden" value="{{$article -> id}}" name="id">
                    </div>
                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection