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
            <h4 class="bold">Account Ledger</h4>
        </div>

        {{Form::open(['url'=>route('reports.index'), 'method'=>'GET','class'=>'filter-form'])}}
            <div class="row">

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">Start Date</label>
                        {{
                            Form::text('start_date',isset($search['start_date']) ? \Carbon\Carbon::parse($search['start_date'])->format('d-m-Y') : \Carbon\Carbon::now()->subMonths(1)->format('d-m-Y'), ['class'=>'form-control datepicker'])
                        }}
                        <label id="start_date-error" class="error" for="start_date">{{ $errors->first('start_date') }}</label>
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label class="form-label">End Date</label>
                        {{
                            Form::text('end_date',isset($search['end_date']) ? \Carbon\Carbon::parse($search['end_date'])->format('d-m-Y') : \Carbon\Carbon::now()->format('d-m-Y'), ['class'=>'form-control datepicker'])
                        }}
                        <label id="end_date-error" class="error" for="end_date">{{ $errors->first('end_date') }}</label>
                    </div>
                </div>
            </div>
        {{ Form::close() }}

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

@endsection
@push('script')
    <script src="{{ asset('js/datatable.js') }}"></script>
    {!! $html->scripts() !!}

    <script>
        $('.datepicker').datepicker({
            format: 'dd-mm-yyyy',
        });

        $('select[name="group_by"],select[name="payment"],.datepicker').on('change',function(){
            $('.filter-form').submit();
        });

        $('.export-selling').on('click',function(){
            location.href = $(this).data('href')+'?'+$('.filter-form').serialize();
        });
    </script>
@endpush