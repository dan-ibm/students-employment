@extends('base')
@section('main')

    <div class="row">
        <div class="col-md-5 order-md-1">
            <h3 class="login-heading  mt-3">Login Account</h3>
            <form action="{{url('post-reset')}}" method="POST" id="resForm" class="needs-validation">
                {{ csrf_field() }}

                <div class="form-label-group mb-2">
                    <input type="text" name="email" id="inputEmail" class="form-control" placeholder="Email" >

                    @if ($errors->has('email'))
                        <span class="error">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Reset password</button>
            </form>
        </div>
    </div>

@endsection
