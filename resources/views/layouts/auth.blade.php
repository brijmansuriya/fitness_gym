<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no">
    <title>Mighty Basket Admin Panel</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('back/images/favicon.png')}}">

    <!-- plugins css -->
    <link rel="stylesheet" href="{{asset('back/css/bootstrap.css')}}" />
    <link rel="stylesheet" href="{{asset('back/css/pace-theme-minimal.css')}}" />
    <link rel="stylesheet" href="{{asset('back/css/perfect-scrollbar.min.css')}}" />

    <!-- core css -->
    <link href="{{asset('back/css/ei-icon.css')}}" rel="stylesheet">
    <link href="{{asset('back/css/themify-icons.css')}}" rel="stylesheet">
    <link href="{{asset('back/css/font-awesome.min.css')}}" rel="stylesheet">
    <link href="{{asset('back/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('back/css/app.css')}}" rel="stylesheet">
</head>

<body>
    <div class="app">
        <div class="authentication">
            <div class="sign-in">
                <div class="row no-mrg-horizon">
                    <div class="col-md-8 no-pdd-horizon d-none d-md-block">
                        <div class="full-height bg" style="background-image: url('/back/images/fitness.png'); background-color:#88806F;">
                            <div class="img-caption">
                                <h1 class="caption-title" style="color:#88806F">Fitness Point</h1>
                                <p class="caption-text" style="color:#88806F">Turn Fat into FIT!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 no-pdd-horizon">
                        <div class="full-height bg-white height-100">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- build:js assets/js/vendor.js -->
    <!-- plugins js -->
    <script src="{{asset('back/js/jquery.min.js')}}"></script>
    <script src="{{asset('back/js/popper.min.js')}}"></script>
    <script src="{{asset('back/js/bootstrap.js')}}"></script>
    <script src="{{asset('back/js/pace.min.js')}}"></script>
    <script src="{{asset('back/js/perfect-scrollbar.jquery.js')}}"></script>
    <!-- endbuild -->

    <!-- build:js {{asset('back/js/')}}assets/js/app.min.js -->
    <!-- core js -->
    <script src="{{asset('back/js/app.js')}}"></script>
    <!-- endbuild -->

    <!-- page js -->

</body>

</html>