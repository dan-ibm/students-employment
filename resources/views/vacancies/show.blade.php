@extends('base')
@section('title')
    <title>{{ $vacancy->employer->org_name }} - Объявления</title>
@endsection
@section('main')
<div class="container" style="margin-top: 4%;">
    <h1>{{ $vacancy->employer->org_name }}</h1>
    <p>Должность: {{ $vacancy->position }}</p>
    <p>Требования: {{ $vacancy->requirements }}</p>
    <p>Обязанности: {{ $vacancy->responsibilities }}</p>
    <p>Зарплата: от {{ $vacancy->min_salary }} до {{ $vacancy->max_salary }}</p>
    <p>Условия работы: {{ $vacancy->terms }}</p>
    <p>Навыки: {{ $vacancy->skills }}</p>

    <br><a href="{{ asset('vacancies/all') }}">Вернуться назад</a>
</div>
@endsection
