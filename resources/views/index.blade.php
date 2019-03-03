@extends('app')
@section('content')

    <!-- Banner Home Slider -->
    <div class="banner-home-city">

        <section class="started-bussiness" style="background-image: url({{ asset('images/banner1.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content text-center">
                            <h1 style="color: white;">We found it all for you!</h1>
                            <p>Trouble looking for dorm? Hassle from seaching? DormBook got you!
                                Dormbook helps you compare the prices of different dormitories. It will also show the features, amenities and even its location.
                                Don't lose time, effort and money!
                                Let dormbook do the work!
                                It makes it easy for you to find your ideal dormitories, at the best price and safe.</p>
                            <a href="/search" class="btn btn-primary">Explore Dorms</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- Gallery Section -->
    <section class="populer-city-section bg-dark">
        <div class="container">
            <div class="page-header text-center">
                <h2>Campuses <small>Browse listings from all campuses </small></h2>
            </div>
            <div class="row">
                <div class="col-sm-4 col-xs-12">
                    <a href="https://themes.iamabdus.com/listty/1.4/listings-half-screen-map-list.html" class="img-box">
                        <img src="images/populer-city-1.jpg" alt="Image">
                        <div class="content">
                            <h3>Silang </h3>
                            <span>26 Listings</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <a href="https://themes.iamabdus.com/listty/1.4/listings-half-screen-map-list.html" class="img-box">
                        <img src="images/populer-city-2.jpg" alt="Image">
                        <div class="content">
                            <h3>Indang </h3>
                            <span>21 Listings</span>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <a href="https://themes.iamabdus.com/listty/1.4/listings-half-screen-map-list.html" class="img-box">
                        <img src="images/populer-city-3.jpg" alt="Image">
                        <div class="content">
                            <h3>Cavite City </h3>
                            <span>33 Listings</span>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <a href="https://themes.iamabdus.com/listty/1.4/listings-half-screen-map-list.html" class="img-box">
                        <img src="images/populer-city-6.jpg" alt="Image">
                        <div class="content">
                            <h3>Imus</h3>
                            <span>13 Listings</span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </section>

@endsection