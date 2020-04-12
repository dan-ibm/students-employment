@extends('base')
@extends('layouts.navbar')
<title>Dashboard Student</title>

@section('main')
    <div class="container col">
        <div class = "row">
        <div class="d-flex p-4 mb-2 rounded col-md-6 order-md-2" style="font-size: 10em">
            <svg class="bi bi-people-circle" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path d="M13.468 12.37C12.758 11.226 11.195 10 8 10s-4.757 1.225-5.468 2.37A6.987 6.987 0 008 15a6.987 6.987 0 005.468-2.63z"></path>
                <path fill-rule="evenodd" d="M8 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                <path fill-rule="evenodd" d="M8 1a7 7 0 100 14A7 7 0 008 1zM0 8a8 8 0 1116 0A8 8 0 010 8z" clip-rule="evenodd"></path>
            </svg>
            <div class="container">
                <div>
                    <h2 class="text-primary px-4">{{ $student->first_name }} {{ $student->last_name }}</h2>
                </div>
                <div class = "row px-5">
                    <h4 class = "card-text">Your email: </h4>
                    <h4 class="text-success">{{ $student->email }} </h4>
                </div>
                <div class = "row px-5">
                    <h4 class = "card-text">Your phone: </h4>
                    <h4 class="text-success">{{ $student->phone }} </h4>
                </div>

                <div class = "row px-5">
                    <h4 class = "card-text">You are: </h4>
                    <h4 class="text-success">{{ $student->status }} </h4>
                </div>
                <div class="row px-5">
                     <h4 class = "card-text">Resume: </h4>
                     <h4 class="text-success">{{ $student->resume }} </h4>
                </div>
                <div class="row  px-5">
                    <a class="button" href="{{url('logout')}}"><h3 class="text-danger">Logout</h3></a>
                </div>

            </div>
        </div>
        </div>
    </div>
@endsection
