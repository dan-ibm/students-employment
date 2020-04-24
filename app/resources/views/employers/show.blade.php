<html>
<head>
    <title>Employers</title>
    @extends('layouts.head')
</head>
<body>

<div class="container" style="margin-top: 4%;">
    <h1>{{ $employer->id }}</h1>
    <p>Должность: {{ $employer->position }}</p>
    <p>Требования: {{ $employer->requirements }}</p>
    <p>Категория: {{ $employer->category }}</p>
    <p>Зарплата: от {{ $employer->min_salary }} до {{ $employer->max_salary }}</p>

    <br><a href="{{ asset('list') }}">Вернуться назад</a>
</div>


</body>
</html>
