@extends('layouts.auth')

@section('content')
<div class="vertical-align full-height pdd-horizon-70">
    <div class="table-cell">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
        <div class="pdd-horizon-15">
            <h2>Login</h2>
            <p class="mrg-btm-15 font-size-13">Please enter your user name and password to login</p>
            <form role="form" method="POST" action="{{ route('login') }}">
                {{ csrf_field() }}
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" name="email" class="form-control" placeholder="Email">
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
                <div class="checkbox font-size-12">
                    <input id="agreement" name="remember" type="checkbox" {{ old('remember') ? 'checked' : '' }}>
                    <label for="agreement">Keep Me Signed In</label>
                </div>
                <button type="submit" class="btn btn-info">Login</button>
            </form>
        </div>
    </div>
</div>
<div class="login-footer">
    <img class="img-responsive inline-block" src="{{asset('back/images/logo.png')}}" width="100" alt="">
    <span class="font-size-13 pull-right pdd-top-10">Forgot <a href="{{ route('password.request') }}">Password?</a></span>
</div>
@endsection