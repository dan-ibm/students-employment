@extends('base')
@section('title')
    <title>{{ $vacancy->employer->org_name }} - Объявления</title>
@endsection
@section('main')
<div class="container">
    <br>
    <h1 class="text-primary my-3">{{ $vacancy->employer->org_name }}</h1>

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

    @if(null !== Session::get('employer_id') && $vacancy->employer_id == Session::get('employer_id') )

    <div>
        <strong class="text-info">Students:</strong>

        <p style='color:blue;'>{{ $vacancy->students()->pluck('first_name')->implode(', ') }}</p>
    </div>

    <div>
        <strong class="text-info">Students:</strong>
        @foreach($students as $student)

        <a href="/students/id/{{ $student->id }}">{{ $student->first_name }}, </a>
        @endforeach
    </div>

    @endif

    @if(null !== Session::get('student_id'))

    <div>
    <a class="btn btn-primary"href="#">Откликнуться</a>
    </div>
    <br>

    @endif

    <a class="btn btn-outline-primary mb-4" href="{{url()->previous()}}">Go back</a>
</div>
@endsection
