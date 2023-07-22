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
        <img class="img_thumb" width="200" src="{{isset($registration)?$registration->image_url:null}}" alt="">
    </div>
</div>
<div class="row">
    <div class="col-md-2 col-sm-2 col-xs-12">
        <div class="form-group {{ $errors->get('registration_no')?'has-error':'' }}">
            <label>Registration No</label>
            {{
                Form::text('registration_no', isset($registration) ? $registration->registration_no : 'FP-'.str_pad(\App\Registration::max('id')+1, 5, '0', STR_PAD_LEFT), array('class' => 'form-control','disabled'))
            }}
            <span class="help-block">{{$errors->first('registration_no')}}</span>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
        <div class="form-group {{ $errors->get('date')?'has-error':'' }}">
            <label>Joining Date <span class="mendatory">*</span></label>
            {{
                Form::text('date', null, array('class' => 'form-control datepicker'))
            }}
            <span class="help-block">{{$errors->first('date')}}</span>
        </div>
    </div>
    <div class="col-md-2 col-sm-2 col-xs-12">
        <div class="form-group {{ $errors->get('months')?'has-error':'' }}">
            <label>Months <span class="mendatory">*</span></label>
            {{
                Form::select('months', ['1'=>'1 Month','3'=>'3 Month','6'=>'6 Month','12'=>'1 Year'],null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('months')}}</span>
        </div>
    </div>
</div>
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
        <div class="form-group {{ $errors->get('address')?'has-error':'' }}">
            <label>Address</label>
            {{
                Form::textarea('address', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('address')}}</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group {{ $errors->get('gender')?'has-error':'' }}">
            <label class="col-md-4 row">Gender <span class="mendatory">*</span></label>
            <input type="radio" name="gender" value="male" checked> Male
            <input type="radio" name="gender" value="female"> Female
            <span class="help-block">{{$errors->first('gender')}}</span>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group {{ $errors->get('birth_date')?'has-error':'' }}">
            <label>Birth Date</label>
            {{
                Form::text('birth_date', null, array('class' => 'form-control datepicker'))
            }}
            <span class="help-block">{{$errors->first('birth_date')}}</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group {{ $errors->get('blood_group')?'has-error':'' }}">
            <label>Blood Group</label>
            {{
                Form::select('blood_group', [''=>'Select Bloodgroup','A+'=>'A+','A-'=>'A-','B+'=>'B+','B-'=>'B-','AB+'=>'AB+','AB-'=>'AB-','O+'=>'O+','O-'=>'O-'],null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('blood_group')}}</span>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group {{ $errors->get('mobile_no')?'has-error':'' }}">
            <label>Mobile No <span class="mendatory">*</span></label>
            {{
                Form::text('mobile_no', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('mobile_no')}}</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-4 col-sm-4 col-xs-12">
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
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group {{ $errors->get('relative_name')?'has-error':'' }}">
            <label>Relative Name</label>
            {{
                Form::text('relative_name', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('relative_name')}}</span>
        </div>
    </div>
    <div class="col-md-3 col-sm-3 col-xs-12">
        <div class="form-group {{ $errors->get('relative_contact')?'has-error':'' }}">
            <label>Relative Contact</label>
            {{
                Form::text('relative_contact', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('relative_contact')}}</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group {{ $errors->get('addiction')?'has-error':'' }}">
            <label>Addiction</label>
            {{
                Form::text('addiction', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('addiction')}}</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group {{ $errors->get('health_note')?'has-error':'' }}">
            <label>Health Note</label>
            {{
                Form::textarea('health_note', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('health_note')}}</span>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div class="form-group {{ $errors->get('workout_goal')?'has-error':'' }}">
            <label>Workout Goal</label>
            {{
                Form::textarea('workout_goal', null, array('class' => 'form-control'))
            }}
            <span class="help-block">{{$errors->first('workout_goal')}}</span>
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