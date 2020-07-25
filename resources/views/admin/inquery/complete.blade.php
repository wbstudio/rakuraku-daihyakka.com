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
                   <h3>Complete</h3>
                   <a href="{{ route('admin.inquery_list') }}">もどる</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection