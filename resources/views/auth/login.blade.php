<!doctype html>
<head>
    <title>Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @extends('layouts.head')

</head>
<body>
<div class="container-fluid">
    <div class="row no-gutter">
        <div class="d-none d-md-flex col-md-3"></div>
        <div class="col-md-8 col-lg-6">
            <div class="login d-flex align-items-center py-5">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-lg-8 mx-auto">
                            <h3 class="login-heading mb-4">Login Account</h3>
                            <form action="{{url('post-login')}}" method="POST" id="logForm">

                                {{ csrf_field() }}

                                <div class="form-label-group mb-2">
                                    <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Login" >

                                    @if ($errors->has('username'))
                                        <span class="error">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>

                                <div class="form-label-group mb-2">
                                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">

                                    @if ($errors->has('password'))
                                        <span class="error">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>

                                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Sign In</button>

                                <div class="text-center mb-2">If you have an account?
                                    <a class="small" href="{{url('registration')}}"></a>
                                </div>
                                    <a class ="p-5" href="registration?type=student">Register Student</a>
                                    <a class ="p-5" href="registration?type=employer">Register Employer</a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
