@extends('base')
@section('title')
    <title>{{ $vacancy->employer->org_name }} - Объявления</title>
@endsection
@section('main')
<div class="container">
    <br>
    <h1 class="text-primary my-2">{{ $vacancy->employer->org_name }}</h1>

    <div>
        <h3 class="text-dark">{{ $vacancy->position }}</h3>
        <h4 class="text-secondary">{{ $vacancy->min_salary }} - {{ $vacancy->max_salary }}</h4>
    </div>

    <br>
    <div>
        <strong class="text-info">Requirments: </strong>
        <p class="text-dark">{{ $vacancy->requirements }}</p>
     </div>

    <div>
        <strong class="text-info">Responsibilities:</strong>
        <p class="text-dark">{{ $vacancy->responsibilities }}</p>
    </div>

    <div>
        <strong class="text-info">Terms:</strong>
        <p class="text-dark">{{ $vacancy->terms }}</p>
    </div>

    <div>
        <strong class="text-info">Skills:</strong>
        <p class="text-dark">{{ $vacancy->skills }}</p>
    </div>

    @if(null !== Session::get('employer_id') && $vacancy->employer_id == Session::get('employer_id') )


    <div>
        <strong class="text-info">Students:</strong>
        @foreach($students as $student)

        <a href="/student/{{ $student->id }}">{{ $student->first_name }}, </a>
        @endforeach
    </div>

    @endif

    @if(null !== Session::get('student_id') && !$vacancy->students->contains(Session::get('student_id')))

    <div>
    <a class="btn btn-primary"href="/vacancy-request/{{$vacancy->id}}/{{Session::get('student_id')}}">Respond</a>
    </div>
    <br>

    @endif

    @if(null !== Session::get('student_id') && $vacancy->students->contains(Session::get('student_id')))

    <div>
    <a class="btn btn-warning"href="/vacancy-request-not/{{$vacancy->id}}/{{Session::get('student_id')}}">Not respond</a>
    </div>
    <br>

    @endif

    <a class="btn btn-outline-primary mt-4" href="{{url()->previous()}}">Go back</a>
</div>
@endsection
