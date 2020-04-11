@extends('base')
@section('title')
    <title>Объявления о работе</title>
@endsection
@section('main')
<div class="container">

    <div class="px-4">

        <table class="table table-bordered">
            <thead>
            <tr>
                <th scope="col">Position</th>
                <th scope="col">Salary</th>

            </tr>
            </thead>
            @foreach($vacancies as $employer)
                <tbody>
                <tr>
                    <td><a href="{{url('vacancies')}}/{{$employer->id}}">{{$employer->position}}</a></td>
                    <td><a>{{ $employer->min_salary }} - {{ $employer->max_salary }}</a></td>

                </tr>
                </tbody>
            @endforeach
        </table>

</div>
@endsection
