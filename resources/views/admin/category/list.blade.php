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
                   <table>
                        @foreach ($categories as $index => $category)
                            @if($category -> main_id == null)
                            <tr>
                            <th>{{ $category -> id}}</th>
                            <td><a href="edit/{{ $category -> id}}">{{ $category -> name}}</a></td>
                            </tr>
                            @endif
                            @if(isset($category->sub_categories))
                            @foreach ($category->sub_categories as $idx => $sub_category)
                            <tr>
                            <th></th>
                            <td>┗<a href="edit/{{ $sub_category -> id}}">{{ $sub_category -> name}}</a></td>
                            </tr>
                            @endforeach
                            @endif
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection