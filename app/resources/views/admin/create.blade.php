@extends('base')
@section('title')
    <title>Admin - Create Teacher</title>
@endsection
@section('main')
<div class="container">
    <h4 class="mb-3 tex">Register a Teacher</h4>
    <form action="{{ route('post-teacher') }}" method="POST" id="regForm">
        {{ csrf_field() }}
        <div class="row text-secondary">
            <div class="form-label-group col-md-6 mb-3">
                <label for="firstName">First name</label>
                <input type="text" name="first_name" id="inputOrgName" class="form-control" placeholder="First Name">
                <div class="invalid-feedback">
                    Valid first name is required.
                </div>
            </div>

            <div class="form-label-group col-md-6 mb-3">
                <label for="lastName">Last name</label>
                <input type="text" name="last_name" id="inputOrgName" class="form-control" placeholder="Last Name">
                <div class="invalid-feedback">
                    Valid last name is required.
                </div>
            </div>
        </div>

        <div class="form-label-group mb-3 text-secondary">
            <label for="username">Username</label>
            <div class="input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">@</span>
                </div>
                <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Username" autofocus>
                <div class="invalid-feedback" style="width: 100%;">
                    Your username is required.
                </div>
            </div>
            @if ($errors->has('username'))
                <span class="error alert-danger">{{ $errors->first('username') }}</span>
            @endif
        </div>

        <div class="form-label-group mb-3 text-secondary">
            <label for="email">Password</label>
            <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
            <div class="invalid-feedback">
                Please enter a valid email address.
            </div>
        </div>


        <div class="row text-secondary">
            <div class="form-label-group col-md-6 mb-3">
                <label for="email">Email </label>
                <input type="text" name="email" id="inputEmail" class="form-control" placeholder="you@example.com">
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
                @if ($errors->has('email'))
                    <span class="error alert-danger">{{ $errors->first('email') }}</span>
                @endif
            </div>
            <div class="form-label-group col-md-6 mb-3">
                <label for="email">Phone </label>
                <input type="text" name="phone" id="inputPhone" class="form-control" placeholder="Phone">
                <div class="invalid-feedback">
                    Please enter a valid phone.
                </div>
                @if ($errors->has('phone'))
                    <span class="error alert-danger">{{ $errors->first('phone') }}</span>
                @endif
            </div>


        </div>

        <button class="btn btn-primary btn-lg" type="submit">Register</button>
    </form>
</div>

@endsection
