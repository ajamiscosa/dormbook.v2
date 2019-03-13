@extends('app')
@section('content')

    <!-- Banner Home Slider -->
    <div class="banner-home-city">

        <section class="started-bussiness" style="background-image: url({{ asset('campuses/1/9.jpg') }});">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="content text-center">
                            <h1 style="color: white;">&nbsp;</h1>
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
                    <a href="/search?campus=silang" class="img-box">
                        <img src="campuses/9/1.jpg" alt="Image" style="height: 100%;">
                        <div class="content">
                            <h3>Silang </h3>
                            <span>{{ count(\App\Dorm::where('City','=','Silang')->get()) }} Listings</span>
                        </div>
                    </a>
                </div>
                <div class="col-sm-8 col-xs-12">
                    <a href="/search?campus=indang" class="img-box">
                        <img src="campuses/1/1.jpg" alt="Image" style="width: 100%;">
                        <div class="content">
                            <h3>Indang </h3>
                            <span>{{ count(\App\Dorm::where('City','=','Indang')->get()) }} Listings</span>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-8">
                    <a href="/search?campus=naic" class="img-box">
                        <img src="campuses/11/1.jpg" alt="Image" style="width: 100%;">
                        <div class="content">
                            <h3>Naic </h3>
                            <span>{{ count(\App\Dorm::where('City','=','Naic')->get()) }} Listings</span>
                        </div>
                    </a>
                </div>
                <div class="col-xs-12 col-sm-4">
                    <a href="/search?campus=imus" class="img-box">
                        <img src="campuses/4/1.jpg" alt="Image" style="height: 125%;">
                        <div class="content">
                            <h3>Imus</h3>
                            <span>{{ count(\App\Dorm::where('City','=','Imus')->get()) }} Listings</span>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </section>

@endsection