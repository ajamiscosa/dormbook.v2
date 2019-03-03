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
                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default panel-card">
                        <div class="panel-heading">
                            Listings <span class="label label-primary">Monthly</span>
                        </div>
                        <div class="panel-body">
                            <h2>71,503</h2>
                            <p>Compare to last month <span class="resultInfo resultUp">10% <i class="fa fa-level-up" aria-hidden="true"></i></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default panel-card">
                        <div class="panel-heading">
                            Visits <span class="label label-primary">Today</span>
                        </div>
                        <div class="panel-body">
                            <h2>5,00,103</h2>
                            <p>Compare to yesterday <span class="resultInfo resultDown">5% <i class="fa fa-level-down" aria-hidden="true"></i></span></p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default panel-card">
                        <div class="panel-heading">
                            Search <span class="label label-primary">Today</span>
                        </div>
                        <div class="panel-body">
                            <h2>31,200</h2>
                            <p>Compare to yesterday <span class="resultInfo resultUp">10% <i class="fa fa-level-up"></i></span></p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default panel-card">
                        <div class="panel-heading">
                            Orders
                            <span class="rightContent">
							<span class="dateRange">
								<label>From:</label>
								<div class="dateSelect">
									<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
										<input type="text" class="form-control" placeholder="mm/dd/yyyy">
										<div class="input-group-addon">
											<i class="fa fa-calendar" aria-hidden="true"></i>
										</div>
									</div>
								</div>
							</span>
							<span class="dateRange">
								<label>To:</label>
								<div class="dateSelect">
									<div class="input-group date ed-datepicker filterDate" data-provide="datepicker">
										<input type="text" class="form-control" placeholder="mm/dd/yyyy">
										<div class="input-group-addon">
											<i class="fa fa-calendar" aria-hidden="true"></i>
										</div>
									</div>
								</div>
							</span>
							<span class="btn-group btn-panel">
								<button type="button" class="btn btn-primary active">Daily</button>
								<button type="button" class="btn btn-primary">Weekly</button>
								<button type="button" class="btn btn-primary">Monthly</button>
							</span>
						</span>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-3 col-xs-12">
                                    <div class="chartInfo">
                                        <h2>2,450</h2>
                                        <p>Total Orders</p>
                                    </div>
                                    <div class="chartInfo">
                                        <h2>$50,500</h2>
                                        <p>Total Payments</p>
                                    </div>
                                </div>
                                <div class="col-sm-9 col-xs-12">
                                    <div class="flot-chart">
                                        <div class="flot-chart-content" id="flot-dashboard-chart" style="padding: 0px; position: relative;"><canvas class="flot-base" width="816" height="222" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 816px; height: 222px;"></canvas><div class="flot-text" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; font-size: smaller; color: rgb(84, 84, 84);"><div class="flot-x-axis flot-x1-axis xAxis x1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 68px; top: 201px; left: 81px; text-align: center;">Jan 03</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 68px; top: 201px; left: 155px; text-align: center;">Jan 06</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 68px; top: 201px; left: 230px; text-align: center;">Jan 09</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 68px; top: 201px; left: 304px; text-align: center;">Jan 12</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 68px; top: 201px; left: 378px; text-align: center;">Jan 15</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 68px; top: 201px; left: 453px; text-align: center;">Jan 18</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 68px; top: 201px; left: 527px; text-align: center;">Jan 21</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 68px; top: 201px; left: 602px; text-align: center;">Jan 24</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 68px; top: 201px; left: 676px; text-align: center;">Jan 27</div><div class="flot-tick-label tickLabel" style="position: absolute; max-width: 68px; top: 201px; left: 751px; text-align: center;">Jan 30</div></div><div class="flot-y-axis flot-y1-axis yAxis y1Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 186px; left: 21px; text-align: right;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 142px; left: 7px; text-align: right;">250</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 99px; left: 7px; text-align: right;">500</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 56px; left: 7px; text-align: right;">750</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 13px; left: 0px; text-align: right;">1000</div></div><div class="flot-y-axis flot-y2-axis yAxis y2Axis" style="position: absolute; top: 0px; left: 0px; bottom: 0px; right: 0px; display: block;"><div class="flot-tick-label tickLabel" style="position: absolute; top: 186px; left: 802px;">0</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 155px; left: 802px;">5</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 124px; left: 802px;">10</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 93px; left: 802px;">15</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 62px; left: 802px;">20</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 31px; left: 802px;">25</div><div class="flot-tick-label tickLabel" style="position: absolute; top: 1px; left: 802px;">30</div></div></div><canvas class="flot-overlay" width="816" height="222" style="direction: ltr; position: absolute; left: 0px; top: 0px; width: 816px; height: 222px;"></canvas><div class="legend"><div style="position: absolute; width: 106px; height: 42px; top: 16px; left: 38px; background-color: rgb(255, 255, 255); opacity: 0.85;"> </div><table style="position:absolute;top:16px;left:38px;;font-size:smaller;color:#545454"><tbody><tr><td class="legendColorBox"><div style="border:1px solid #000000;padding:1px"><div style="width:4px;height:0;border:5px solid #e5e5e5;overflow:hidden"></div></div></td><td class="legendLabel">Number of orders</td></tr><tr><td class="legendColorBox"><div style="border:1px solid #000000;padding:1px"><div style="width:4px;height:0;border:5px solid #2196f3;overflow:hidden"></div></div></td><td class="legendLabel">Payments</td></tr></tbody></table></div></div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default panel-card">
                        <div class="panel-heading">
                            Popular Listings <span class="label label-primary">Monthly</span>
                        </div>
                        <div class="panel-body plr">
                            <ul class="list-unstyled panel-list">
                                <li>
                                    <div class="listWrapper">
                                        <div class="listName">
                                            <h3>Think Coffee<small>215 Terry Lane, New York</small></h3>
                                        </div>
                                        <div class="listResult">
                                            <ul class="list-inline rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            </ul>
                                            <span class="likePart"><i class="fa fa-heart-o primaryColor" aria-hidden="true"></i>8k</span>
                                            <span class="likeResult">Visits: <strong>20,500</strong></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="listWrapper">
                                        <div class="listName">
                                            <h3>Burger House<small>2726 Shinn Street, New York</small></h3>
                                        </div>
                                        <div class="listResult">
                                            <ul class="list-inline rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            </ul>
                                            <span class="likePart"><i class="fa fa-heart-o primaryColor" aria-hidden="true"></i>9.2k</span>
                                            <span class="likeResult">Visits: <strong>15,500</strong></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="listWrapper">
                                        <div class="listName">
                                            <h3>Tom's Restaurant<small>964 School Street, New York</small></h3>
                                        </div>
                                        <div class="listResult">
                                            <ul class="list-inline rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            </ul>
                                            <span class="likePart"><i class="fa fa-heart-o primaryColor" aria-hidden="true"></i>9.5K</span>
                                            <span class="likeResult">Visits: <strong>21,499</strong></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="listWrapper">
                                        <div class="listName">
                                            <h3>Sticky Band<small>Bishop Avenue, New York</small></h3>
                                        </div>
                                        <div class="listResult">
                                            <ul class="list-inline rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            </ul>
                                            <span class="likePart"><i class="fa fa-heart-o primaryColor" aria-hidden="true"></i>596k</span>
                                            <span class="likeResult">Visits: <strong>1,425</strong></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="listWrapper">
                                        <div class="listName">
                                            <h3>Hotel Govendor<small>778 Country Street, New York</small></h3>
                                        </div>
                                        <div class="listResult">
                                            <ul class="list-inline rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            </ul>
                                            <span class="likePart"><i class="fa fa-heart-o primaryColor" aria-hidden="true"></i>5k</span>
                                            <span class="likeResult">Visits: <strong>5,786</strong></span>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <div class="listWrapper">
                                        <div class="listName">
                                            <h3>The Mayfair Hotel<small>242 W 49th St, New York</small></h3>
                                        </div>
                                        <div class="listResult">
                                            <ul class="list-inline rating">
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                            </ul>
                                            <span class="likePart"><i class="fa fa-heart-o primaryColor" aria-hidden="true"></i>10k</span>
                                            <span class="likeResult">Visits: <strong>20,500</strong></span>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default panel-card">
                        <div class="panel-heading" id="categories">
                            Popular Categories <span class="label label-primary">Monthly</span>
                        </div>
                        <div class="panel-body plr">
                            <ul class="list-styled panel-list list-padding">
                                <li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-tea-cup-1 iconBox"></i>Restaurants</span> <span class="itemSubmit">Submited List: <strong>250</strong></span></li>
                                <li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-building iconBox"></i>Hotels</span> <span class="itemSubmit">Submited List: <strong>90</strong></span></li>
                                <li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-juice iconBox"></i>Nightclubs</span> <span class="itemSubmit">Submited List: <strong>260</strong></span></li>
                                <li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-car-1 iconBox"></i>Auto Motive</span> <span class="itemSubmit">Submited List: <strong>900</strong></span></li>
                                <li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-castle iconBox"></i>Museums</span> <span class="itemSubmit">Submited List: <strong>20</strong></span></li>
                                <li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-television iconBox"></i>Movie Theaters</span> <span class="itemSubmit">Submited List: <strong>150</strong></span></li>
                                <li class="listWrapper"><span class="itmeName"><i class="icon-listy icon-mall-1 iconBox"></i>Shopping</span> <span class="itemSubmit">Submited List: <strong>300</strong></span></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-sm-4 col-xs-12">
                    <div class="panel panel-default panel-card">
                        <div class="panel-heading">
                            Recent Users <span class="label label-primary">Daily</span>
                        </div>
                        <div class="panel-body plr">
                            <ul class="list-styled panel-list list-padding-sm">
                                <li class="listWrapper"><span class="recentUserInfo"><img src="assets/img/dashboard/recent-user-1.jpg" alt="Image User" class="img-circle">Aaren</span> <span class="userTime">Active 10m ago</span></li>
                                <li class="listWrapper"><span class="recentUserInfo"><img src="assets/img/dashboard/recent-user-2.jpg" alt="Image User" class="img-circle">Abby</span> <span class="userTime">Active 12m ago</span></li>
                                <li class="listWrapper"><span class="recentUserInfo"><img src="assets/img/dashboard/recent-user-3.jpg" alt="Image User" class="img-circle">Abriel</span> <span class="userTime">Active 15m ago</span></li>
                                <li class="listWrapper"><span class="recentUserInfo"><img src="assets/img/dashboard/recent-user-4.jpg" alt="Image User" class="img-circle">Adam Smith</span> <span class="userTime">Active 17m ago</span></li>
                                <li class="listWrapper"><span class="recentUserInfo"><img src="assets/img/dashboard/recent-user-1.jpg" alt="Image User" class="img-circle">Jone Deo</span> <span class="userTime">Active 19m ago</span></li>
                                <li class="listWrapper"><span class="recentUserInfo"><img src="assets/img/dashboard/recent-user-2.jpg" alt="Image User" class="img-circle">Eelheid</span> <span class="userTime">Active 14m ago</span></li>
                                <li class="listWrapper"><span class="recentUserInfo"><img src="assets/img/dashboard/recent-user-3.jpg" alt="Image User" class="img-circle">Aime</span> <span class="userTime">Active 1h ago</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="panel panel-default panel-card">
                        <div class="panel-heading" id="message">
                            Messages <span class="label label-default label-sm">3 New</span> <a href="" class="btn label label-primary">Send Message</a>
                        </div>
                        <div class="panel-body panel-message">
                            <ul class="list-unstyled panel-list">
                                <li class="messageCommon recentMessage listWrapper">
								<span class="messageInfo">
									<h5>Aden, <small>Today <span class="dayTime">11.08 AM</span></small></h5>
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
								</span>
                                    <span class="messageTime">5m ago</span>
                                </li>
                                <li class="messageCommon recentMessage listWrapper">
								<span class="messageInfo">
									<h5>Adrien Smith, <small>Today <span class="dayTime">10.38 AM</span></small></h5>
									<p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
								</span>
                                    <span class="messageTime">5m ago</span>
                                </li>
                                <li class="messageCommon recentMessage listWrapper">
								<span class="messageInfo">
									<h5>Agata, Roy <small>Today <span class="dayTime">8.56 AM</span></small></h5>
									<p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
								</span>
                                    <span class="messageTime">5m ago</span>
                                </li>
                                <li class="messageCommon oldMessage listWrapper">
								<span class="messageInfo">
									<h5>Aileen Deo, <small>Today <span class="dayTime">8.07 PM</span></small></h5>
									<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin</p>
								</span>
                                    <span class="messageTime">5m ago</span>
                                </li>
                                <li class="messageCommon oldMessage listWrapper">
								<span class="messageInfo">
									<h5>Agneta Smith, <small>Today <span class="dayTime">11.08 AM</span></small></h5>
									<p>Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked</p>
								</span>
                                    <span class="messageTime">5m ago</span>
                                </li>
                                <li class="messageCommon oldMessage listWrapper">
								<span class="messageInfo">
									<h5>Alexa Deos, <small>Today <span class="dayTime">2.08 PM</span></small></h5>
									<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.</p>
								</span>
                                    <span class="messageTime">5m ago</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection