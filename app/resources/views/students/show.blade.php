@extends('base')
@section('title')
    <title>{{ $student->first_name }} {{ $student->last_name }} - Page</title>
@endsection
@section('main')
<div class="container">
    <br>
    <div class="row">
        <h1 class="text-primary my-3">{{ $student->first_name }} {{ $student->last_name }}</h1>
    </div>

    <br>
    <div class="row">
        <strong class="text-info">Phone number:</strong>
        <p class="text-secondary ml-1">{{ $student->phone }}</p>
    </div>

    <div class="row">
        <strong class="text-info">Wants to work as:</strong>
        @foreach($vacancies as $vacancy)
        <p class="text-dark ml-2">{{ $vacancy->position }} in {{  $vacancy->employer->org_name }},</p>
        @endforeach
    </div>


    <a class="row btn btn-outline-primary mb-4" href="{{url()->previous()}}">Go back</a>
</div>
@endsection
