@extends('base')
@extends('layouts.navbar')
<title>Dashboard Student</title>

@section('main')
    <div class="container col">
        <div class = "row">
        <div class="d-flex p-4 mb-2 rounded col-md-6 order-md-2" style="font-size: 10em">
            <svg class="bi bi-person text-primary mx-2" width="1em" height="1em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd"/>
            </svg>
            <div class="container">
                <div>
                    <h2 class="text-primary px-4">{{ $student->first_name }} {{ $student->last_name }}</h2>
                </div>
                <div class = "row px-5">
                    <h4 class = "card-text">Your email: </h4>
                    <h4 class="text-success">{{ Auth()->user()->email }} </h4>
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
