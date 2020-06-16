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
                   <h3>inquery List</h3>
                   <form action="{{ route('admin.inquery_list') }}" method="POST">
                   @csrf
                   @if(count($inqueries) > 0)
                   <table>
                        @foreach ($inqueries as $index => $inquery)
                        <tr>
                        <th>{{$inquery -> id}}</th>
                        <td>@if($inquery -> response == 0)未返信@else返信済み@endif</td>
                        <td><a href="reposponse/{{ $inquery -> id}}">{{$inquery -> adress}}</a></td>
                        <td>{{$inquery -> name}}</td>
                        <td><input type="checkbox" value="{{$inquery -> id}}" name="del_id[]"></td>
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