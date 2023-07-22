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
            <h4 class="bold">Registration List</h4>
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