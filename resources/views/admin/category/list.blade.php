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
                   <h3>Category List</h3>
                   <a href="{{ route('admin.category_regist') }}">{{ __('New++') }}</a>
                   <form action="{{ route('admin.category_list') }}" method="POST">
                   @csrf
                   <table>
                        @foreach ($categories as $index => $category)
                            @if($category -> main_id == null)
                            <tr>
                            <th>{{ $category -> id}}</th>
                            <td><a href="edit/{{ $category -> id}}">{{ $category -> name}}</a></td>
                            <td><input type="checkbox" value="{{$category -> id}}" name="del_id[]"></td>
                            </tr>
                                @if(isset($category->sub_categories))
                                @foreach ($category->sub_categories as $idx => $sub_category)
                                <tr>
                                <th></th>
                                <td>┗<a href="edit/{{ $sub_category -> id}}">{{ $sub_category -> name}}</a></td>
                                <td><input type="checkbox" value="{{$sub_category -> id}}" name="del_id[]"></td>
                                </tr>
                                @endforeach
                                @endif
                            @endif
                        @endforeach
                    </table>
                    <input type="submit" value="checkしたものを消す" id="delete">
                   </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection