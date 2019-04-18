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
                        @if(auth()->user())
                            <li class=""><a href="/admin">{{ auth()->user()->Username }}</a></li>
                        @else
                        <li class=""><a href="/admin">admin</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
