<!DOCTYPE html>
<html>
<head>
    <title>Sign Up</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @extends('layouts.head')

</head>
<body>
<div class="container">

    <div class="col-md-8 order-md-1">
        @if ( $_GET['type'] == 'employer')
            <h4 class="mb-3">Register as EMPLOYER</h4>

            <form action="{{ route('post-reg', 'employer') }}" method="POST" id="regForm">
                {{ csrf_field() }}
                <div class="mb-3 form-label-group">
                    <label for="firstName">Company name</label>
                    <input type="text" name="org_name" id="inputOrgName" class="form-control" placeholder="Name of your organization">
                    <div class="invalid-feedback">
                        Valid first name is required.
                    </div>
                    @if ($errors->has('org_name'))
                        <span class="error">{{ $errors->first('org_name') }}</span>
                    @endif
                </div>


                <div class="mb-3 form-label-group">
                    <label for="username">Login</label>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">@</span>
                        </div>
                        <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Login" autofocus>
                        <div class="invalid-feedback" style="width: 100%;">
                            Your username is required.
                        </div>
                    </div>
                    @if ($errors->has('username'))
                        <span class="error">{{ $errors->first('username') }}</span>
                    @endif
                </div>

                <div class="mb-3 form-label-group">
                    <label for="email">Password</label>
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                    @if ($errors->has('password'))
                        <span class="error">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="mb-3 form-label-group">
                    <label for="email">Email </label>
                    <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email">
                    <div class="invalid-feedback">
                        Please enter a valid email address.
                    </div>
                    @if ($errors->has('email'))
                        <span class="error">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <hr class="mb-4">
                <button class="btn btn-primary btn-lg btn-block" type="submit">Sign IN</button>

            </form>

    </div>
</div>
@endif

                            @if($_GET['type'] == 'student')
                                <div class="container">
                                    <div class="col-md-8 order-md-1">
                                        <h4 class="mb-3">Register as a STUDENT</h4>
                                        <form action="{{ route('post-reg', 'student') }}" method="POST" id="regForm">
                                            {{ csrf_field() }}
                                            <div class="row">
                                                <div class="form-label-group col-md-6 mb-3">
                                                    <label for="firstName">First name</label>
                                                    <input type="text" name="first_name" id="inputOrgName" class="form-control" placeholder="First Name">
                                                    <div class="invalid-feedback">
                                                        Valid first name is required.
                                                    </div>
                                                    @if ($errors->has('first_name'))
                                                        <span class="error">{{ $errors->first('first_name') }}</span>
                                                    @endif
                                                </div>

                                                <div class="form-label-group col-md-6 mb-3">
                                                    <label for="lastName">Last name</label>
                                                    <input type="text" name="last_name" id="inputOrgName" class="form-control" placeholder="Last Name">
                                                    <div class="invalid-feedback">
                                                        Valid last name is required.
                                                    </div>
                                                </div>
                                                @if ($errors->has('last_name'))
                                                    <span class="error">{{ $errors->first('last_name') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-label-group mb-3">
                                                <label for="username">Username</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text">@</span>
                                                    </div>
                                                    <input type="text" name="username" id="inputUsername" class="form-control" placeholder="Login" autofocus>
                                                    <div class="invalid-feedback" style="width: 100%;">
                                                        Your username is required.
                                                    </div>
                                                </div>
                                                @if ($errors->has('username'))
                                                    <span class="error">{{ $errors->first('username') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-label-group mb-3">
                                                <label for="email">Password</label>
                                                <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Password">
                                                <div class="invalid-feedback">
                                                    Please enter a valid email address.
                                                </div>
                                                @if ($errors->has('password'))
                                                    <span class="error">{{ $errors->first('password') }}</span>
                                                @endif
                                            </div>

                                            <div class="form-label-group mb-3">
                                                <label for="email">Email </label>
                                                <input type="text" name="email" id="inputOrgName" class="form-control" placeholder="you@example.com">
                                                <div class="invalid-feedback">
                                                    Please enter a valid email address.
                                                </div>
                                                @if ($errors->has('email'))
                                                    <span class="error">{{ $errors->first('email') }}</span>
                                                @endif
                                            </div>




                                            <div class="form-label-group">
                                                <label>I'm a ...</label>
                                                <select class="form-control" name="status" id="exampleFormControlSelect1">
                                                    <option value='student'>Student</option>
                                                    <option value="graduate">Graduate</option>
                                                </select>
                                            </div>

                                            <div class = "mb-4 mt-3">
                                                <h6 class="mb-3">Upload resume</h6>
                                                <div class="form-label-group">
                                                    <input name="resume" type="file">
                                                </div>
                                            </div>


                                            <hr class="mb-4">
                                            <button class="btn btn-primary btn-lg btn-block" type="submit">Sign IN</button>
                                        </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
