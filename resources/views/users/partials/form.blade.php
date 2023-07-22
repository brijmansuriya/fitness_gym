@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.css">
@endpush

<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
        <div class="form-group {{ $errors->get('image')?'has-error':'' }} image_upload">
            <label>Image</label>
            {{
                Form::file('image', array('class' => 'form-control','onchange'=>"readPhotoURL(this)"))
            }}
            <span class="help-block">{{$errors->first('image')}}</span>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
        <img class="img_thumb" width="200" src="{{isset($user)?$user->image_url:null}}" alt="">
    </div>
</div>

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
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group {{ $errors->get('email')?'has-error':'' }}">
            <label>Email</label>
            {{
                Form::text('email', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('email')}}</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group {{ $errors->get('mobile_no')?'has-error':'' }}">
            <label>Mobile No</label>
            {{
                Form::text('mobile_no', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('mobile_no')}}</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group {{ $errors->get('password')?'has-error':'' }}">
            <label>Password</label>
            {{
                Form::password('password', array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('password')}}</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group {{ $errors->get('confirm_password')?'has-error':'' }}">
            <label>Confirm Password</label>
            {{
                Form::password('confirm_password', array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('confirm_password')}}</span>
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