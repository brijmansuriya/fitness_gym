@extends('layouts.master')
@section('content')

    <div class="page-title">
        <h4  class="bold"><a href="{{ route('users.index') }}" class="back-arrow"><img src="{{asset("back/images/back-arrow.svg")}}" alt=""></a>Create Registration</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">
                            {{Form::open(array('url' => route('users.store'), 'method' => 'POST','files'=>true))}}

                                @include('users.partials.form')

                                <button class="mrg-top-15 btn btn-primary" type="submit">Submit</button>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

