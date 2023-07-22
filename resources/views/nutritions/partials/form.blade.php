@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
@endpush

<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="form-group {{ $errors->get('name')?'has-error':'' }}">
            <label>Name <span class="mendatory">*</span></label>
            {{
                Form::text('name', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('name')}}</span>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
        <div class="form-group {{ $errors->get('amount')?'has-error':'' }}">
            <label>Amount <span class="mendatory">*</span></label>
            {{
                Form::number('amount', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('amount')}}</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group {{ $errors->get('detail')?'has-error':'' }}">
            <label>Detail *</label>
            {{
                Form::textarea('detail', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('detail')}}</span>
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
        function readPhotoURL(input) {
          $('.image_upload .help-block').remove()
          if (input.files && input.files[0]) {
            if(input.files[0].size>1572864) {
              $('.image_upload').append('<p class="help-block" style="color:red;"> Image will not be greater than 1.5MB </p>');
                        $("#image").val('');
                        $('.img_thumb').attr('src', '');
              return false;
            }
            var reader = new FileReader();

            reader.onload = function (e) {
              $('.img_thumb').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
        }
    </script>
@endpush