<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title>Fitness Point</title>

    <!-- Favicon -->
   <link rel="shortcut icon" href="{{asset("back/images/favicon.png")}}" type="image/x-icon">

    <!-- plugins css -->
    <link rel="stylesheet" href="{{asset('back/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('back/css/pace-theme-minimal.css')}}" />
    <link rel="stylesheet" href="{{asset('back/css/perfect-scrollbar.min.css')}}" />

    <!-- page plugins css -->
    <link rel="stylesheet" href="{{asset('back/css/jquery-jvectormap-1.2.2.css')}}" />
    <link rel="stylesheet" href="{{asset('back/css/nv.d3.min.css')}}" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <!-- core css -->
	<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="{{asset('back/css/ei-icon.css')}}" rel="stylesheet">
    <link href="{{asset('back/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('back/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('back/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('back/css/app.css')}}" rel="stylesheet">
    <link href="{{asset('back/css/bootstrap-datepicker3.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('front/css/dropzone.css')}}">

    <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sweetalert2.css') }}">

    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/css/select2.min.css" rel="stylesheet">

    @stack('style')
</head>

<body>
    <div class="app">
        <div class="layout is-collapsed">
            <!-- Side Nav START -->
            <div class="side-nav">
                <div class="side-nav-inner">
                    @include('layouts.partials.sidebar')
                </div>
            </div>
            <!-- Side Nav END -->

            <!-- Page Container START -->
            <div class="page-container">
                <!-- Header START -->
                <div class="header navbar">
                     @include('layouts.partials.header')
                </div>
                <!-- Header END -->
                <!-- theme configurator START -->
                <div class="theme-configurator">
                    <div class="configurator-wrapper">
                        <div class="config-header">
                            <h4 class="config-title">Config Panel</h4>
                            <button class="config-close">
                                <i class="ti-close"></i>
                            </button>
                        </div>
                        <div class="config-body">
                            <div class="mrg-btm-30">
                                <p class="lead font-weight-normal">Header Color</p>
                                <div class="theme-colors header-default">
                                    <input type="radio" id="header-default" name="theme">
                                    <label for="header-default"></label>
                                </div>
                                <div class="theme-colors header-primary">
                                    <input type="radio" class="primary" id="header-primary" name="theme">
                                    <label for="header-primary"></label>
                                </div>
                                <div class="theme-colors header-info">
                                    <input type="radio" id="header-info" name="theme">
                                    <label for="header-info"></label>
                                </div>
                                <div class="theme-colors header-success">
                                    <input type="radio" id="header-success" name="theme">
                                    <label for="header-success"></label>
                                </div>
                                <div class="theme-colors header-danger">
                                    <input type="radio" id="header-danger" name="theme">
                                    <label for="header-danger"></label>
                                </div>
                                <div class="theme-colors header-dark">
                                    <input type="radio" id="header-dark" name="theme">
                                    <label for="header-dark"></label>
                                </div>
                            </div>
                            <div class="mrg-btm-30">
                                <p class="lead font-weight-normal">Sidebar Color</p>
                                <div class="theme-colors sidenav-default">
                                    <input type="radio" id="sidenav-default" name="sidenav">
                                    <label for="sidenav-default"></label>
                                </div>
                                <div class="theme-colors side-nav-dark">
                                    <input type="radio" id="side-nav-dark" name="sidenav">
                                    <label for="side-nav-dark"></label>
                                </div>
                            </div>
                            <div class="mrg-btm-30">
                                <p class="lead font-weight-normal no-mrg-btm">RTL</p>
                                <div class="toggle-checkbox checkbox-inline toggle-sm mrg-top-10">
                                    <input type="checkbox" name="rtl-toogle" id="rtl-toogle">
                                    <label for="rtl-toogle"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- theme configurator END -->

                <!-- Theme Toggle Button START -->

                <!-- Theme Toggle Button END -->


                <!-- Content Wrapper START -->
                <div class="main-content">
                    <div class="container-fluid">
                        <div class="col-md-12">
                            @if (session()->has('success'))
                                <div class="alert alert-success">
                                    <strong>{{session()->get('success')}}</strong>
                                </div>
                            @endif
                            @if (session()->has('error'))
                                <div class="alert alert-danger">
                                    <strong>{{session()->get('error')}}</strong>
                                </div>
                            @endif

                        </div>
                        @yield('content')
                    </div>
                </div>
                <!-- Content Wrapper END -->

                 <!-- Footer START -->
                @include('layouts.partials.footer')
                <!-- Footer END -->

            </div>
            <!-- Page Container END -->
        </div>
    </div>

    <!-- Modal -->
    <div class="modal" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel"
        aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20%281%29.jpg" alt="avatar" class="rounded-circle img-responsive payment-image" style="max-width:50%;">
                    {{-- <h5 class="modal-title" id="paymentModalLabel">Renew</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button> --}}
                </div>
                {{ Form::open(['url'=>'payments.renew','method'=>'POST','id'=>'payment-form']) }}
                    <div class="modal-body">

                        <h5 class="mt-1 mb-2 text-center payment-name">Mayur Vadher</h5>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group {{ $errors->get('months')?'has-error':'' }}">
                                    <label>Months</label>
                                    {{
                                        Form::select('months', ['1'=>'1 Month','3'=>'3 Month','6'=>'6 Month','12'=>'1 Year'],null, array('class' => 'form-control payment-month'))
                                    }}
                                    <span class="help-block">{{$errors->first('months')}}</span>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group {{ $errors->get('amount')?'has-error':'' }}">
                                    <label>Amount</label>
                                    {{
                                        Form::number('amount', null, array('class' => 'form-control'))
                                    }}
                                    <span class="help-block error error-amount">{{$errors->first('amount')}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Accept</button>
                    </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>

        <!-- build:js assets/js/vendor.js -->
    <!-- plugins js -->
    <script src="{{asset('back/js/jquery.min.js')}}"></script>
	<script src="{{asset('back/js/main.js')}}"></script>
    <script src="{{asset('back/js/popper.min.js')}}"></script>
    <script src="{{asset('front/js/dropzone.js')}}"></script>
    <script src="{{asset('back/js/bootstrap.js')}}"></script>
    <script src="{{asset('back/js/pace.min.js')}}"></script>
    <script src="{{asset('back/js/perfect-scrollbar.jquery.js')}}"></script>
    <!-- endbuild -->

    <!-- page plugins js -->
    <script src="{{asset('back/js/jquery-jvectormap-1.2.2.min.js')}}"></script>
    <script src="{{asset('back/js/jquery-jvectormap-us-aea.js')}}"></script>
    <script src="{{asset('back/js/d3.min.js')}}"></script>
    <script src="{{asset('back/js/nv.d3.min.js')}}"></script>
    <script src="{{asset('back/js/index.js')}}"></script>
    <script src="{{asset('back/js/Chart.min.js')}}"></script>
    <script src="{{asset('back/js/bootstrap-datepicker.min.js')}}"></script>

    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- build:js assets/js/app.min.js -->
    <!-- core js -->
    <script src="{{asset('back/js/app.js')}}"></script>
    <!-- endbuild -->

    <!-- page js -->
    {{-- <script src="{{asset('back/js/dashboard.js')}}"></script> --}}
    <script src="{{ asset('js/summernote.min.js') }}"></script>

    <script src="{{ asset('/') }}js/bootstrap-notify-master/bootstrap-notify.min.js"></script>
    <script src="{{ asset('/') }}js/sweetalert2/sweetalert2.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6/js/select2.min.js"></script>
    <script>

        $(document).on('click','.payment-renew',function(){
            $('.payment-name').text($(this).data('name'));
            $('.payment-month').val($(this).data('month'));
            $('.payment-image').attr('src',$(this).data('image'));
            $('#payment-form').attr('action',$(this).data('href'));
            $('#paymentModal').modal('show');
        });

        $(document).on('submit','#payment-form',function(e){
            e.preventDefault();

            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
            beforeSend: function() {
                $('.withdraw-otp-form-submit').attr('disabled',true);
            },
            }).done(function (response) {
                if(response.success){
                    swal(response.message+"!", "", "success");
                    $('#dataTableBuilder').DataTable().ajax.reload();
                    $('#paymentModal').modal('hide');
                    return;
                }
                swal(response.message+"!", "", "error");
            }).fail(function (data) {
                jQuery.each(data.responseJSON.errors, function (index, val) {
                    $('.error-'+index).text(val[0]);
                })
            })
        });

        $(document).on("keypress","input[type='number']", function (evt) {
            if (evt.which != 8 && evt.which != 0 && evt.which < 48 || evt.which> 57)
            {
                evt.preventDefault();
            }
        });

        $(document).ready(function(e){
            @if(request()->is('dashboard*'))
                $.ajax({
                    type: 'GET',
                    url: "{{route('registrations.recent')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                }).done(function (response) {
                    $('.recent-registration').html(response);
                }).fail(function (data) {
                    jQuery.each(data.responseJSON.errors, function (index, val) {
                        toastr.error(val[0]);
                    })
                });

                $.ajax({
                    type: 'GET',
                    url: "{{route('dashboard.summary')}}",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                }).done(function (response) {
                    $('.total-registration').text(response.registrations);
                    $('.total-payment').text(response.payment);
                    $('.nutrition-profit').text(response.nutritions);
                    $('.near-to-expire').text(response.nearToExpire);
                    $('.expired').text(response.expired);
                    $('.month-list').text(' ('+response.start_date+' - '+response.end_date+')');
                }).fail(function (data) {
                    jQuery.each(data.responseJSON.errors, function (index, val) {
                        toastr.error(val[0]);
                    })
                })
            @endif
        });

        function destroy(url){
            swal({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                confirmButtonClass: 'btn btn-success',
                cancelButtonClass: 'btn btn-danger',
                buttonsStyling: false
            }).then(function (check) {
                if (check) {
                    $.ajax(
                        {
                            type: "POST",
                            url: url,
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            data: {
                                '_method': 'DELETE'
                            },
                            success: function (data) {
                                $('#dataTableBuilder').DataTable().ajax.reload();
                            }
                        }
                    ).done(function (data) {
                    // if(data.success){
                            swal(
                                'Deleted!',
                                data.message,
                                'success'
                            )
                    // }else{
                        /* swal(
                                'Cancelled',
                                data.message,
                                'error'
                            )
                        }*/
                    });

                } else {
                    swal(
                        'Cancelled',
                        'Your data file is safe :)',
                        'error'
                    )
                }

            })

        }

    </script>
    @stack('script')
</body>

</html>