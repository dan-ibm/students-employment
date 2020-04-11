@extends('base')
@section('title')
    <title>Объявления о работе</title>
@endsection
@section('main')
<div class="container" style="margin-top: 4%; margin-left: 30%">

    @foreach($vacancies as $vacancy)
        <ul>
            <li><a href="vacancy/{{$vacancy->id}}">{{$vacancy->title}}</a></li>
            <p>ЗП от: {{ $vacancy->min_salary }} до {{ $vacancy->max_salary }}</p>
        </ul>
    @endforeach

</div>
@endsection
