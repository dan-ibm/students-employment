@extends('base')
@section('main')

    <div class="row" style="margin-left: 30%;">
        <div class="col-md-5 order-md-1">
            <h3 class="login-heading  mt-3">Enter reset code</h3>
            <form action="{{url('check-reset')}}" method="POST" id="resForm" class="needs-validation">
                {{ csrf_field() }}

                <div class="form-label-group mb-2">
                    <input type="text" name="code" id="inputCode" class="form-control" placeholder="Enter code" >

                    @if ($errors->has('code'))
                        <span class="error">{{ $errors->first('code') }}</span>
                    @endif
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-login text-uppercase font-weight-bold mb-2" type="submit">Check reset code</button>
            </form>
        </div>
    </div>

@endsection
