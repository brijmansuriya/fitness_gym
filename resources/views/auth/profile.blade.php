@extends('layouts.master')
@section('content')
<div class="container-fluid">
    <div class="page-title">
        <h4 class="bold">Profile</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
	                <form action="{{ route('profile.store') }}" method="POST">
	                    @csrf
	                    <div class="row">
							<div class="col-md-6 col-sm-6 col-xs-12">
						    	<div class="form-group {{ $errors->get('username')?'has-error':'' }}">
							        <label>UserName</label>
							        <input class="form-control" placeholder="Username" type="text" name="name" value="{{ $user->name }}"/>
							        <span class="help-block">{{ $errors->first('username') }}</span>
						    	</div>

						    	<div class="form-group {{ $errors->get('email')?'has-error':'' }}">
							        <label>Email</label>
							        <input class="form-control" placeholder="Email" type="text" name="email" value="{{ $user->email }}"/>
							        <span class="help-block">{{ $errors->first('email') }}</span>
						    	</div>
						    	<div class="form-group {{ $errors->get('password')?'has-error':'' }}">
							        <label>Password</label>
							        <input class="form-control" placeholder="Password" type="password" name="password" value=""/>
							        <span class="help-block">{{ $errors->first('password') }}</span>
						    	</div>
						    	<div class="form-group {{ $errors->get('confirm_password')?'has-error':'' }}">
							        <label>Confirm Password</label>
							        <input class="form-control" placeholder="Confirm Password" type="password" name="confirm_password" value=""/>
							        <span class="help-block">{{ $errors->first('confirm_password') }}</span>
						    	</div>
					    		<button class="mrg-top-15 btn btn-primary" type="submit" name="button" value="save">Save</button>
							</div>
						</div>
	                </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection