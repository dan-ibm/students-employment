@extends('base')
@extends('layouts.navbar')
<title>Dashboard Employer</title>


@section('main')
<div class="container col">
    <div class="row">
        <div class="d-flex p-4 mb-2 rounded col-md-6 order-md-2" style="font-size: 10em">
        <svg class="bi bi-house-fill" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 3.293l6 6V13.5a1.5 1.5 0 01-1.5 1.5h-9A1.5 1.5 0 012 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"></path>
            <path fill-rule="evenodd" d="M7.293 1.5a1 1 0 011.414 0l6.647 6.646a.5.5 0 01-.708.708L8 2.207 1.354 8.854a.5.5 0 11-.708-.708L7.293 1.5z" clip-rule="evenodd"></path>
        </svg>


    <div class="container">
        <div>
            <h2 class="text-success px-4">{{ Auth()->user()->employer->org_name }} </h2>
        </div>

        <div class = "row px-5">
            <h4 class = "card-text">Your email: </h4>
            <h4 class="text-success">{{ $employer->email }} </h4>
        </div>

        <div>
            @foreach($vacancies as $employer)
                <ul>
                    <li><a href="list/{{$employer->id}}">{{$employer->title}}</a></li>
                    <p>{{ $employer->position }}</p>
                </ul>
            @endforeach
        </div>

        <div class = "row px-5 py-2">
            <a href="{{ url('vacancies')}}" class="btn btn-primary">My vacancies</a>
        </div>
        <div class = "row px-5 py-2">
            <a class="small" href="{{url('logout')}}"><h5 class="text-danger">Logout</h5></a>
        </div>
    </div>
    </div>
    </div>
</div>


@endsection
