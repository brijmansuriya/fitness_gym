@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
@endpush

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group {{ $errors->get('name')?'has-error':'' }}">
            <label>Name</label>
            {{
                Form::text('name', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('name')}}</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group {{ $errors->get('date')?'has-error':'' }}">
            <label>Date</label>
            {{
                Form::text('date', null, array('class' => 'form-control datepicker'))
            }}
            <span class="help-block">{{$errors->first('date')}}</span>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group {{ $errors->get('amount')?'has-error':'' }}">
            <label>Amount</label>
            {{
                Form::text('amount', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('amount')}}</span>
        </div>
    </div>
</div>

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.js"></script>
    <script>
        $(document).ready(function(){
            $('.datepicker').datepicker({
                format: 'dd-mm-yyyy',
            });
        });
    </script>
@endpush