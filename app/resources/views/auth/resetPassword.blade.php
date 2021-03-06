@extends('base')
@section('main')

        <div class="container col-md-5 order-md-1">
            <h3 class="login-heading  mt-3">Reset password</h3>
            <form action="{{url('successful-reset')}}" method="POST" id="resForm" class="needs-validation">
                {{ csrf_field() }}

                <div class="form-label-group mb-2">
                    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="New Password" >

                    @if ($errors->has('password'))
                        <span class="error">{{ $errors->first('password') }}</span>
                    @endif
                </div>

                <div class="form-label-group mb-2">
                    <input type="password" name="confirmPassword" id="inputConfirmPassword" class="form-control" placeholder="Confirm password" >

                    @if ($errors->has('confirmPassword'))
                        <span class="error">{{ $errors->first('confirmPassword') }}</span>
                    @endif
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold" type="submit">Reset password</button>
            </form>
            <br><br><br><br><br><br><br><br><br>

        </div>
@endsection
