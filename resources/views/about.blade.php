@extends('app')
@section('content')
    <!-- TERMS INFO SECTION -->
    <section class="clearfix termsInfoSection">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h3 style="font-size: 5em;">About Us</h3>
                    <hr/>
                    <ul class="list-unstyled termsList">
                        <li>
                            <h3>&nbsp;</h3>
                            <p style="font-size: 22px;"> Trouble looking for dorm? Hassle from seaching? DormBook got you!
                                Dormbook helps you compare the prices of different dormitories. It will also show the features, amenities and even its location.
                                Don't lose time, effort and money!
                                Let dormbook do the work!
                                It makes it easy for you to find your ideal dormitories, at the best price and safe.</p>
                        </li>
                        <li>
                            <h3>CvSU Mission</h3>
                            <p>
                                Cavite State University shall provide excellent, equitable, and relevant educational opportunities in the arts, science, and technology through quality instruction and relevant research and development activities.
                                It shall produce professional, skilled, and morally upright individuals for global competitiveness.
                            </p>
                        </li>
                        <li>
                            <h3>CvSU Vision</h3>
                            <p>The premier university in historic Cavite recognized for excellence in the development of morally upright and globally competitive individuals.</p>
                        </li>
                        <li>
                            <h3>CvSU Quality Policy</h3>
                            <p>We commit to the highest standards of education, value our stakeholders, strive for continual improvement of our products and services, and upload the university’s tenets of Truth, excellence, and service to produce globally competitive and morally upright individuals..</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <!-- PAGE TITLE SECTION -->
    <section class="clearfix pageTitleSection" style="background-image: url();">
        <div class="container">
            <ul class="list-unstyled termsList">
                <li>
                    <h3>Researchers</h3>
                </li>
            </ul>
            <div class="row">
                <div class="col-lg-6">

                    <ul class="list-inline listingsInfo">
                        <li>
                            <a href="#">
                                <img src="{{ asset('images/arafel.jpg') }}" alt="Image Listings">
                            </a>
                        </li>
                        <li>
                            <h3>ARAFEL CHRISS D. SURIAGA</h3>
                            <h5>469 Luksuhin Ibaba, Alfonso, Cavite</h5>
                                <span class="category">+63 955 657 3435</span>
                                <p>suriagaarafel17@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">

                    <ul class="list-inline listingsInfo">
                        <li>
                            <a href="#">
                                <img src="{{ asset('images/shann.jpg') }}" alt="Image Listings">
                            </a>
                        </li>
                        <li>
                            <h3>SHANNEN N. DIAZ</h3>
                            <h5>299 R. Magsaysay St. Daine II, Indang, Cavite</h5>
                                <span class="category">+63 905 743 5888</span>
                                <p>diazshannen.n@gmail.com</p>
                        </li>
                    </ul>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
            <br/>
            <div class="row">
                <div class="col-lg-6">

                    <ul class="list-inline listingsInfo">
                        <li>
                            <a href="#">
                                <img src="{{ asset('images/karen.jpg') }}" alt="Image Listings">
                            </a>
                        </li>
                        <li>
                            <h3>KAREN B. LACOSTALES</h3>
                            <h5>Blk 41 Lot 13 Brgy. Anahaw II Bulihan, Silang, Cavite</h5>
                                <span class="category">+63 935 125 1797</span>
                                <p>lacostaleskaren17@gmail.com</p>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6">

                    <ul class="list-inline listingsInfo">
                        <li>
                            <a href="#">
                                <img src="{{ asset('images/camille.jpg') }}" alt="Image Listings">
                            </a>
                        </li>
                        <li>
                            <h3>CAMILLE I. HERRERA</h3>
                            <h5>Tambo Balagbag, Indang, Cavite</h5>
                                <span class="category">+63 975 509 6507</span>
                                <p>herreracamille.ch@gmail.com</p>
                        </li>
                    </ul>
                </div>
            </div>
            <br/>
            <br/>
            <br/>
        </div>
    </section>

@endsection
