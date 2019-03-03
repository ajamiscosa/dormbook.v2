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
    <link href="css/jquery-ui.min.css" rel="stylesheet">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/bootstrap-thumbnail.css" rel="stylesheet">
    <link href="css/datepicker.min.css" rel="stylesheet">
    <link href="css/select_option1.css" rel="stylesheet">
    <link href="css/owl.carousel.min.css" rel="stylesheet">
    <link href="css/jquery.fancybox.min.css" rel="stylesheet">
    <link href="css/isotope.min.css" rel="stylesheet">
    <link href="css/map.css" rel="stylesheet">
    <link href="css/jquery.rateyo.min.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <!-- GOOGLE FONT -->
    <link href="css/fonts.css" rel="stylesheet">
    <link href="css/fonts2.css" rel="stylesheet">
    <link href="css/fonts3.css" rel="stylesheet">
    <link href="css/fonts4.css" rel="stylesheet">
    <!-- CUSTOM CSS -->
    <link href="css/app.css" rel="stylesheet">
    <!-- <link href="assets/plugins/bootstrap-rtl/bootstrap-rtl.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="css/default.css" id="option_color">
    <!-- FAVICON -->
    <link href="images/favico.png" rel="shortcut icon">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-71155940-7');
    </script>
    {{--<script type="text/javascript" charset="UTF-8" src="js/common.js"></script><script type="text/javascript" charset="UTF-8" src="js/util.js"></script>--}}
</head>
<body id="body" class="body-wrapper boxed-menu">
<div class="main-wrapper">
    <!-- HEADER -->
    <header id="pageTop" class="header">
        <!-- TOP INFO BAR -->
        <div class="nav-wrapper navbarWhite" style="height: 97px;">
            <!-- NAVBAR -->
            <nav id="menuBar" class="navbar navbar-default lightHeader animated" role="navigation" style="opacity: 1;">
                <div class="container">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="/">
                            <img src="{{ asset('images/dormbook.png') }}" style="width: 178px !important; height: 44px !important;"/>
                        </a>

                    </div>

                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse navbar-ex1-collapse pull-right">
                        <ul class="nav navbar-nav navbar-right">
                            <li class=""><a href="/">home</a></li>
                            <li class=""><a href="/about">about us</a></li>
                            <li class=""><a href="/admin">admin</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
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

<div style="position: absolute; z-index: -10000; top: 0px; left: 0px; right: 0px;"></div>
</body>
</html>