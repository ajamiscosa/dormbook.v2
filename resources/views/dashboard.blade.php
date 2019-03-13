@extends('app')
@section('content')
    <section class="navbar-dashboard-area">
        <nav class="navbar navbar-default lightHeader navbar-dashboard" role="navigation">
            <div class="container">

                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-dash">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                @if(auth()->user()->isAdministrator())
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse navbar-dash">
                    <ul class="nav navbar-nav mr0">
                        <li class="active">
                            <a href="/"><i class="fa fa-tachometer icon-dash" aria-hidden="true"></i> Dashboard</a>
                        </li>
                        <li class="dropdown singleDro">
                            <a href="javascript:void(0)" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-list-ul icon-dash" aria-hidden="true"></i> Dorms
                                <i class="fa fa-angle-down" aria-hidden="true"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/dorm">List of Dorms</a></li>
                                <li><a href="/dorm/new">Add Dorm</a></li>
                            </ul>
                        </li>
                        <li class="">
                            <a href="/user"><i class="fa fa-user icon-dash" aria-hidden="true"></i> Users</a>
                        </li>
                        <li class="text-right">
                            <a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                        </li>
                    </ul>
                    <div class="row adjustRow">
                        <div class="pull-right col-xs-12 col-sm-2">
                            <form class="navbar-form" role="search">
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Search" name="q">
                                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><i class="icon-list icon-search-2"></i></button>
                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @else
                    <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse navbar-dash">
                            <ul class="nav navbar-nav mr0">
                                <li class="active">
                                    <a href="/"><i class="fa fa-tachometer icon-dash" aria-hidden="true"></i> Dashboard</a>
                                </li>
                                <li>
                                    <a href="/dorm"><i class="fa fa-home" aria-hidden="true"></i> Dorm Details</a>
                                </li>
                                <li class="text-right">
                                    <a href="/logout"><i class="fa fa-sign-out" aria-hidden="true"></i> Logout</a>
                                </li>
                            </ul>
                            <div class="row adjustRow">
                                <div class="pull-right col-xs-12 col-sm-2">
                                    <form class="navbar-form" role="search">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Search" name="q">
                                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button"><i class="icon-list icon-search-2"></i></button>
                    </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                @endif
            </div>
        </nav>
    </section>

    <div class="section dashboard-breadcrumb-section bg-dark">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h2>Dashboard</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.html">Home</a></li>
                        <li class="active">Dashboard</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    
    <section class="clearfix bg-dark equalHeight dashboardSection">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-xs-12">
                    <div class="panel panel-default panel-card">
                        <div class="panel-heading">
                            Popular Listings
                        </div>
                        <div class="panel-body plr">
                            <ul class="list-unstyled panel-list">
                                @php
                                $dorms = App\Dorm::all();
                                $data = array();

                                foreach($dorms as $dorm)
                                {
                                    $entry = array();
                                    $entry['data'] = $dorm;
                                    $entry['rating'] = $dorm->getOverallAverageRating();
                                    array_push($data, $entry);
                                }

                                function cmp($a, $b)
                                {
                                    return strcmp($b["rating"], $a["rating"]);
                                }

                                usort($data, "cmp");

                                @endphp
                                @for($i=0;$i<5;$i++)
                                    <li>
                                        <div class="listWrapper">
                                            <div class="listName">
                                                <h3>{{ $data[$i]['data']->Name }}
                                                    <small>
                                                        {{ $data[$i]['data']->AddressLine1 }},
                                                        {{ $data[$i]['data']->AddressLine2 }},
                                                        <strong>{{ $data[$i]['data']->City }}, Cavite</strong>
                                                    </small>
                                                </h3>
                                            </div>
                                            <div class="listResult">
                                                <ul class="list-inline rating">
                                                    @for($x=0;$x<floor($data[$i]['rating']);$x++)
                                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                    @endfor
                                                    @if($data[$i]['rating']>$x)
                                                        <li><i class="fa fa-star-half-empty" aria-hidden="true"></i></li>
                                                    @endif
                                                </ul>
                                                <span class="likeResult">{{ number_format($data[$i]['rating'],2,'.',',') }}/<strong>5.00</strong></span>
                                            </div>
                                        </div>
                                    </li>
                                @endfor
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-xs-12">

                    <div class="col-md-12">
                        <div class="panel panel-default panel-card">
                            <div class="panel-heading">
                                Cheapest Rate <span class="label label-primary">Monthly</span>
                            </div>
                            <div class="panel-body">
                                <h2>{{ \App\Dorm::all()->sortBy('Rate')->first()->Rate }}</h2>
                                <p>{{ \App\Dorm::all()->sortBy('Rate')->first()->Name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection