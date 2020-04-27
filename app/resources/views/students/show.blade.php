@extends('base')
@section('title')
    <title>{{ $student->first_name }} {{ $student->last_name }} - Page</title>
@endsection
@section('main')
<div class="container">
    <br>
    <h1 class="text-primary my-3">{{ $student->first_name }}</h1>

    <div>
        <h3 class="text-dark">{{ $student->last_name }}</h3>
        <h4 class="text-secondary">{{ $student->email }} - {{ $student->phone }}</h4>
    </div>

    <br>
    <div>
        <strong class="text-info">Email: </strong>
        <p>{{ $student->email }}</p>
     </div>

    <div>
        <strong class="text-info">Phone number:</strong>
        <p>{{ $student->phone }}</p>
    </div>

    <div>
        <strong class="text-info">Vacancies:</strong>
        @foreach($vacancies as $vacancy)
        <p>{{ $vacancy->title }}</p>
        @endforeach
    </div>


    <a class="btn btn-outline-primary mb-4" href="{{url()->previous()}}">Go back</a>
</div>
@endsection
