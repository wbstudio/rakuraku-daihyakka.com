@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                <form method="POST" action="{{ route('admin.category_regist') }}">
                    @csrf
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <h3>Category Updata</h3>
                    <div>
                        CategoryName::<input type="text" name="name">
                    </div>
                    <div>
                    MainCategory::
                    <select name="main_id">
                        <option value="">This is main cateory!</option>
                            @foreach ($categories as $index => $main_category)
                                @if($main_category -> main_id == null)
                                <option value="{{ $main_category -> id}}">{{ $main_category -> name}}</option>
                                @endif
                            @endforeach
                    </select>
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