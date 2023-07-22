@extends('layouts.master')
@push('style')
    <style>
        .btn-red-text{
            color:red;
            background-color: transparent;
        }
    </style>
@endpush
@section('content')
    <div class="container-fluid">
        <div class="page-title">
            @if (request()->has('expired'))
                <h4 class="bold">Expired plans list</h4>
                <a href="{{ route('payments.index') }}" class="btn btn-primary btn-sm pull-right">View near to expire</a>
            @else
                <h4 class="bold">Plans near to expire list</h4>
                <a href="{{ route('payments.index',['expired']) }}" class="btn btn-primary btn-sm pull-right">View Expired</a>
            @endif
            <a href="{{ route('registrations.create') }}" class="btn btn-info btn-sm pull-right">Add Resiteration</a>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="data-section">
                            {!! $html->table() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('script')
        <script src="{{ asset('js/datatable.js') }}"></script>
        {!! $html->scripts() !!}
    @endpush
@endsection