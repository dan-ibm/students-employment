@extends('base')
@section('title')
    <title>Объявления о работе</title>
@endsection
@section('main')
<div class="container">

    @foreach($vacancies as $vacancy)
        <ul>
            <li><a href="vacancy/{{$vacancy->id}}">{{$vacancy->title}}</a></li>
            <p>ЗП от: {{ $vacancy->min_salary }} до {{ $vacancy->max_salary }}</p>
        </ul>
    @endforeach
    {{$vacancies->links()}}

</div>
@endsection
