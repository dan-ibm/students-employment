@extends('base')
@section('title')
    <title>{{ $vacancy->employer->org_name }} - Объявления</title>
@endsection
@section('main')
<div class="container">
    <h1 class="text-primary mt-n3 mb-3">{{ $vacancy->employer->org_name }}</h1>

    <div>
        <h3 class="text-dark">{{ $vacancy->position }}</h3>
        <h4 class="text-secondary">{{ $vacancy->min_salary }} - {{ $vacancy->max_salary }}</h4>
    </div>

    <br>
    <div>
        <strong class="text-info">Requirments: </strong>
        <p>{{ $vacancy->requirements }}</p>
     </div>

    <div>
        <strong class="text-info">Responsibilities:</strong>
        <p>{{ $vacancy->responsibilities }}</p>
    </div>

    <div>
        <strong class="text-info">Terms:</strong>
        <p>{{ $vacancy->terms }}</p>
    </div>

    <div>
        <strong class="text-info">Skills:</strong>
        <p>{{ $vacancy->skills }}</p>
    </div>

    <a class="btn btn-outline-primary" href="{{url()->previous()}}">Go back</a>
</div>
@endsection
