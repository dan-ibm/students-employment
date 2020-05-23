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

    @if(null !== Session::get('teacher_id') && !$student->teachers->contains(Session::get('teacher_id')))

    <div class="row">
    <strong class="text-info">Grade: </strong>
    <p class="text-dark ml-2">{{$grades}}</p>
    </div>
    <div class="row">
    <a class="btn btn-primary"href="/grade-student?student_id={{$student->id}}&teacher_id={{Session::get('teacher_id')}}">Grade student</a>
    </div>
    <br>

    @elseif(null !== Session::get('teacher_id') && $student->teachers->contains(Session::get('teacher_id')))

    <div class="row">
    <strong class="text-info">Grade: </strong>
    <p class="text-dark ml-2">{{$grades}}</p>
    </div>

    <div class="row">
    <a class="btn btn-primary disabled"href="#">Grade student</a>
    </div>
    <br>
    

    @elseif(null !== Session::get('role') && Session::get('role') == "employer")

    <div class="row">
    <strong class="text-info">Grade: </strong>
    <p class="text-dark ml-2">{{$grades}}</p>
    </div>
    <br>

    @endif


    <a class="row btn btn-outline-primary mb-4" href="{{url()->previous()}}">Go back</a>
</div>
@endsection
