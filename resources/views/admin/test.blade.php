@extends('layouts.app_admin')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3>ckEditor</h3>
            <textarea id="editor"></textarea>
            <script src="https://cdn.ckeditor.com/4.14.0/full/ckeditor.js"></script>
            <script>
                window.onload=function(){
                    CKEDITOR.replace('editor',{
                        filebrowserBrowseUrl:filemanager.ckBrowseUrl
                    })
                }
            </script>
            <div class="card">
                <div class="card-header">Admin Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection