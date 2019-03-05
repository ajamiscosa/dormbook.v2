<!DOCTYPE html>
<!-- saved from url=(0051)https://themes.iamabdus.com/listty/1.4/index-4.html -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- SITE TITTLE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>DormBook</title>
    <!-- PLUGINS CSS STYLE -->
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-thumbnail.css') }}" rel="stylesheet">
    <link href="{{ asset('css/datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select_option1.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.fancybox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/isotope.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/map.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery.rateyo.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <!-- GOOGLE FONT -->
    <link href="{{ asset('css/fonts.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts2.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts3.css') }}" rel="stylesheet">
    <link href="{{ asset('css/fonts4.css') }}" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- <link href="assets/plugins/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="{{ asset('css/default.css') }}" id="option_color">
    <!-- FAVICON -->
    <link href="{{ asset('images/favico.png')}}" rel="shortcut icon">


    @yield('styles')
</head>
<body id="body" class="body-wrapper boxed-menu">
<div class="main-wrapper">
    @include('includes.header')
    @yield('content')

    @include('includes.footer')
</div>
<!-- LOGIN  MODAL -->
<div id="loginModal" tabindex="-1" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Log In to your Account</h4>
            </div>
            <div class="modal-body">
                <form class="loginForm">
                    <div class="form-group">
                        <i class="fa fa-envelope" aria-hidden="true"></i>
                        <input type="email" class="form-control" id="email" placeholder="Email">
                    </div>
                    <div class="form-group">
                        <i class="fa fa-lock" aria-hidden="true"></i>
                        <input type="password" class="form-control" id="pwd" placeholder="Password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-block">Log In</button>
                    </div>
                    <div class="checkbox">
                        <label><input type="checkbox"> Remember me</label>
                        <a href="https://themes.iamabdus.com/listty/1.4/index-4.html#" class="pull-right link">Fogot Password?</a>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <p>Don’t have an Account? <a href="https://themes.iamabdus.com/listty/1.4/index-4.html#" class="link">Sign up</a></p>
            </div>
        </div>
    </div>
</div>
@include('includes.scripts')
@yield('scripts')
<div style="position: absolute; z-index: -10000; top: 0px; left: 0px; right: 0px;"></div>
</body>
</html>