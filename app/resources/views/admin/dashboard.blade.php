@extends('base')
@section('title')
    <title>Admin</title>
@endsection
@section('main')
<div class="container">
    <div class = "row px-5 my-3">
        <a href="{{ url('admin/create') }}" class="my-3 btn btn-success">Create Teacher</a>
    </div>
</div>

@endsection
