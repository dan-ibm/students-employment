<!doctype html>
<head>
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @extends('layouts.head')
    @extends('layouts.navbar')


</head>
<body>
<div class="container my-5">
    <div class="row my-5">
        <div class="col-md-5 order-md-1">
                <h3 class="login-heading  mt-5">Login Account</h3>
                <form action="{{url('post-login')}}" method="POST" id="logForm" class="needs-validation">
                    {{ csrf_field() }}

                    <div class="form-label-group mb-2">
                        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Login" >

                        @if ($errors->has('username'))
                            <span class="error alert-danger">{{ $errors->first('username') }}</span>
                        @endif
                    </div>

                    <div class="form-label-group mb-2">
                        <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="error alert-danger">{{ $errors->first('password') }}</span>
                        @endif
                    </div>
                    <div class="m-2">
                        <p>Forgot password? Click<a href="{{url('reset')}}" class="text-primary mx-1">here</a></p>
                    </div>

                    <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign In</button>
                </form>
        </div>

        <div class="col-md-4 order-md-2 mb-4 mx-5">
            <h3 class="login-heading  mt-5 mx-3">Register Account</h3>
                    <div class="text-center mb-2">
                            <a class="small" href="{{url('registration')}}"></a>
                    </div>
            <div class="row border align-items-center mx-3">
                <svg class="bi bi-person text-primary mx-2" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M13 14s1 0 1-1-1-4-6-4-6 3-6 4 1 1 1 1h10zm-9.995-.944v-.002.002zM3.022 13h9.956a.274.274 0 00.014-.002l.008-.002c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664a1.05 1.05 0 00.022.004zm9.974.056v-.002.002zM8 7a2 2 0 100-4 2 2 0 000 4zm3-2a3 3 0 11-6 0 3 3 0 016 0z" clip-rule="evenodd"/>
                </svg>
                <h3 class="m-2"><a href="registration?type=student">Register Student</a></h3>
            </div>
            <div class="row border my-2 align-items-center mx-3">
                <svg class="bi bi-house-door text-primary mx-2" width="3em" height="3em" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 01.708 0l6 6a.5.5 0 01.146.354v7a.5.5 0 01-.5.5H9.5a.5.5 0 01-.5-.5v-4H7v4a.5.5 0 01-.5.5H2a.5.5 0 01-.5-.5v-7a.5.5 0 01.146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 01.5-.5h3a.5.5 0 01.5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" clip-rule="evenodd"/>
                    <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 01.5-.5h1a.5.5 0 01.5.5z" clip-rule="evenodd"/>
                </svg>
                <h3 class="m-2"><a href="registration?type=employer">Register Employer</a></h3>
            </div>
        </div>

    </div>
</div>


</body>
</html>
