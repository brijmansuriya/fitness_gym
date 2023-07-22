@extends('layouts.master')

@section('content')
    <div class="page-title">
        <h4  class="bold"><a href="{{ route('expense.index') }}" class="back-arrow"><img src="{{asset("back/images/back-arrow.svg")}}" alt=""></a>Edit Expense</h4>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <div class="col-md-12 ml-auto mr-auto">
                            {{ Form::model($expense, array('route' => array('expense.update', $expense->id),'files'=>true,'method'=>'PUT')) }}

                                @include('expense.partials.form')

                                <button class="mrg-top-15 btn btn-primary" type="submit">Submit</button>
                            {{Form::close()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
