@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                   <h3>article List</h3>
                   <a href="{{ route('admin.article_regist') }}">{{ __('New++') }}</a>
                   <form action="{{ route('admin.article_list') }}" method="POST">
                   @csrf
                   @if(count($articles) > 0)
                   <table>
                        @foreach ($articles as $index => $article)
                        <tr>
                        <th>{{$article -> id}}</th>
                        <td><a href="edit/{{ $article -> id}}">{{$article -> title}}</a></td>
                        <td>{{$article -> name}}</td>
                        <td>{{$article -> release_at}}</td>
                        <td><input type="checkbox" value="{{$article -> id}}" name="del_id[]"></td>
                        </tr>
                        @endforeach
                    </table>
                    <input type="submit" value="checkしたものを消す" id="delete">
                    @else
                    <p>
                    記事が一つもありません！！！
                    </p>
                    @endif
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection