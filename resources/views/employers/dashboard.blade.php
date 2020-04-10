@extends('base')
@section('title')
<title>Dashboard</title>
@endsection
@section('main')
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-3"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">My Dashboard</h3>
                            <div class="card">
                                <div class="card-body text-center">
                                    Welcome <h3 class="text-success">{{ Auth()->user()->employer->org_name }} </h3>
                                </div>
                                <div class="card-body">

                                    @foreach($vacancies as $employer)
                                        <ul>
                                            <li><a href="list/{{$employer->id}}">{{$employer->title}}</a></li>
                                            <p>{{ $employer->position }}</p>
                                        </ul>
                                    @endforeach

                                </div>
                                <div class="card-body text-center">
                                    <a class="small" href="{{url('logout')}}"><h5 class="text-danger">Logout</h5></a>
                                </div>
                                <div class="card-body text-center">
                                    <a href="{{ url('vacancies')}}" class="btn btn-primary">My vacancies</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
