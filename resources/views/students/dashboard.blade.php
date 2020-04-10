@extends('base')
@extends('layouts.navbar')
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
                                    Welcome <h3 class="text-success">{{ $student->first_name }} {{ $student->last_name }}</h3>
                                    Email<h3 class="text-success">{{ $student->email }} </h3>
                                    Username<h3 class="text-success">{{ $user->username }} </h3>
                                    Status<h3 class="text-success">{{ $student->status }} </h3>
                                    Resume<h3 class="text-success">{{ $student->resume }} </h3>
                                </div>
                                <div class="card-body text-center">
                                    <a class="small" href="{{url('logout')}}"><h5 class="text-danger">Logout</h5></a>
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
