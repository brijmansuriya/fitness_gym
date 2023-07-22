@extends('layouts.auth')

@section('content')
<div class="vertical-align full-height pdd-horizon-70">
    <div class="table-cell">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        <div class="pdd-horizon-15">
            <h2>Reset Password</h2>
            <form role="form" method="POST" action="{{ route('password.request') }}">
                {{ csrf_field() }}
                <input type="hidden" name="token" value="{{ $token }}">
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Email">
                    @if ($errors->has('email'))
                        <p class="help-block"> {{ $errors->first('email') }} </p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    @if ($errors->has('password'))
                        <p class="help-block">{{ $errors->first('password') }}</p>
                    @endif
                </div>
                <div class="form-group {{ $errors->has('password_confirmation') ? ' has-error' : '' }} ">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password">
                    @if ($errors->has('password_confirmation'))
                        <p class="help-block">{{ $errors->first('password_confirmation') }}</p>
                    @endif
                </div>
                <button type="submit" class="btn btn-info">Send Email</button>
            </form>
        </div>
    </div>
</div>
<div class="login-footer">
    <img class="img-responsive inline-block" src="{{asset('back/img/logo.png')}}" width="100" alt="">
    <span class="font-size-13 pull-right pdd-top-10">Fitness Point <a href="{{ route('login') }}">Login</a></span>
</div>
@endsection