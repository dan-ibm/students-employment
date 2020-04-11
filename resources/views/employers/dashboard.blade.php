@extends('base')
@extends('layouts.navbar')
<title>Dashboard Employer</title>


@section('main')
<div class="container col">
    <div class="row px-5">
        <div class = "border">
            <div class="d-flex p-4 mb-2 rounded" style="font-size: 10em">
                <svg class="bi bi-house-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 012 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"></path>
                    <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 011.414 0l6.647 6.646a.5.5 0 01-.708.708L8 2.207 1.354 8.854a.5.5 0 11-.708-.708L7.293 1.5z" clip-rule="evenodd"></path>
                </svg>
            </div>
        </div>

        <div class="container">
            <div>
                <h2 class="text-dark px-4">{{ Auth()->user()->employer->org_name }} </h2>
            </div>

            <div class = "row px-5 ">
                <p class="text-secondary">{{ $employer->email }} </p>
            </div>

            <div class = "row px-5 mb-3">
                <a href="{{ url('vacancies')}}" class="btn btn-primary">My vacancies</a>
                <div class="px-5">
                    <a class="btn btn-danger" href="{{url('logout')}}">Logout</a>
                </div>
            </div>

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


    </div>
</div>


@endsection
