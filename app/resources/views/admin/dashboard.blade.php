@extends('base')
@section('title')
    <title>Admin</title>
@endsection
@section('main')

<div class = "row px-5 mb-3">
    <a href="{{ url('admin/create') }}" class="btn btn-success">Create Teacher</a>
</div>

@endsection