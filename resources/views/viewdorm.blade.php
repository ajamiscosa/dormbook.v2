@extends('app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}"/>
@endsection
@section('content')
<section class="clearfix paddingAdjustBottom" id="listing-details">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="listingTitleArea">
                    <h2>{{ $data->Name }}</h2>
                    <p>{{ $data->AddressLine1 }}, {{ $data->AddressLine2 }}, <br>{{ $data->City }}, Cavite</p>
                    <div class="listingReview">
                        <ul class="list-inline rating rating-review">
                            @for($i=0;$i<floor($data->getOverallAverageRating());$i++)
                                <li><i class="fa fa-star" aria-hidden="true"></i></li>
                            @endfor
                            @if($data->getOverallAverageRating()>$i)
                                <li><i class="fa fa-star-half-empty" aria-hidden="true"></i></li>
                            @endif
                        </ul>
                        <span>( {{ $data->getTotalRatings() }} Reviews )</span>
                        <a href="dashboard-reviews.html" class="btn btn-primary">Write a review</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="clearfix paddingAdjustTopBottom">
    <ul class="list-inline listingImage">
        <li><img src="{{ asset("uploads/{$data->ID}/1.jpg") }}" alt="Image Listing" class="img-responsive"></li>
        <li><img src="{{ asset("uploads/{$data->ID}/2.jpg") }}" alt="Image Listing" class="img-responsive"></li>
        <li><img src="{{ asset("uploads/{$data->ID}/3.jpg") }}" alt="Image Listing" class="img-responsive"></li>
        <li><img src="{{ asset("uploads/{$data->ID}/4.jpg") }}" alt="Image Listing" class="img-responsive"></li>
    </ul>
</section>
<section class="clearfix paddingAdjustTop">
    <div class="container">
        <div class="row">
            <div class="col-sm-8 col-xs-12">
                <div class="listDetailsInfo">
                    <div class="detailsInfoBox">
                        <h3>About This Dormitory</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt  labore et dolore magna aliqua.Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident. sunt in culpa qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam. </p>
                        <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est. </p>
                        <p>Qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui </p>
                    </div>
                    <div class="detailsInfoBox">
                        <h3>Features</h3>
                        <ul class="list-inline featuresItems">
                            @php
                                $amenities = json_decode($data->Amenities);
                            @endphp
                            @foreach(\App\Facility::all() as $facility)
                                <li><i class="fa {{ in_array($facility->ID, $amenities, true)?"fa-check-circle-o":"fa-times-circle" }} " aria-hidden="true"></i> <span style="{{ in_array($facility->ID, $amenities, true)?"":"text-decoration: line-through;" }}">{{ $facility->Description }}</span> </li>
                                <br/>
                            @endforeach

                        </ul>
                    </div>
                    <div class="detailsInfoBox">
                        <h3>Policies</h3>
                        <ul class="list-inline featuresItems">
                            <li><i class="fa fa-times-circle-o"></i><span> No Smoking</span> </li> <br/>
                            <li><i class="fa fa-times-circle-o"></i><span> No Parties, or events</span> </li>
                        </ul>
                    </div>
                    <div class="detailsInfoBox">
                        <h3>{{ $data->getTotalRatings() }} Reviews</h3>
                        <hr/>
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                Communication
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <ul class="list-inline rating rating-review">

                                    @for($i=0;$i<floor($data->getAverageRating('Communication'));$i++)
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    @endfor
                                    @if($data->getAverageRating('Communication')>$i)
                                        <li><i class="fa fa-star-half-empty" aria-hidden="true"></i></li>
                                    @endif

                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                Cleanliness
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <ul class="list-inline rating rating-review">
                                    @for($i=0;$i<floor($data->getAverageRating('Location'));$i++)
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    @endfor
                                    @if($data->getAverageRating('Location')>$i)
                                        <li><i class="fa fa-star-half-empty" aria-hidden="true"></i></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6">
                                Location
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <ul class="list-inline rating rating-review">
                                    @for($i=0;$i<floor($data->getAverageRating('Location'));$i++)
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    @endfor
                                    @if($data->getAverageRating('Location')>$i)
                                        <li><i class="fa fa-star-half-empty" aria-hidden="true"></i></li>
                                    @endif
                                </ul>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                Value
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <ul class="list-inline rating rating-review">
                                    @for($i=0;$i<floor($data->getAverageRating('Value'));$i++)
                                        <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                    @endfor
                                    @if($data->getAverageRating('Value')>$i)
                                        <li><i class="fa fa-star-half-empty" aria-hidden="true"></i></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <hr/>

                        @foreach($data->getRatings() as $rating)
                        <div class="media media-comment">
                            <div class="media-body">
                                <h1 class="media-heading"><strong>{{ $rating->Name }}</strong></h1>
                                <h5 class="media-heading">{{ \Carbon\Carbon::parse($rating->created_at)->format('F Y') }}</h5>
                                <p>{{ $rating->Message }}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="detailsInfoBox">
                        <h3>Write A Review </h3>
                        <span>( {{ $data->getTotalRatings() }} Reviews )</span>
                        <form action="/dorm/review/store" method="POST">
                            {{ csrf_field() }}
                            <input type="hidden" name="Dorm" value="{{ $data->ID }}">
                            <div class="listingReview">

                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        Communication
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <ul class="list-inline rating rating-review">
                                            <li><i class="fa fa-star-o" id="Communication1" aria-hidden="true" onclick="add('Communication',1)"></i></li>
                                            <li><i class="fa fa-star-o" id="Communication2" aria-hidden="true" onclick="add('Communication',2)"></i></li>
                                            <li><i class="fa fa-star-o" id="Communication3" aria-hidden="true" onclick="add('Communication',3)"></i></li>
                                            <li><i class="fa fa-star-o" id="Communication4" aria-hidden="true" onclick="add('Communication',4)"></i></li>
                                            <li><i class="fa fa-star-o" id="Communication5" aria-hidden="true" onclick="add('Communication',5)"></i></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        Cleanliness
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <ul class="list-inline rating rating-review">
                                            <li><i class="fa fa-star-o" id="Cleanliness1" aria-hidden="true" onclick="add('Cleanliness',1)"></i></li>
                                            <li><i class="fa fa-star-o" id="Cleanliness2" aria-hidden="true" onclick="add('Cleanliness',2)"></i></li>
                                            <li><i class="fa fa-star-o" id="Cleanliness3" aria-hidden="true" onclick="add('Cleanliness',3)"></i></li>
                                            <li><i class="fa fa-star-o" id="Cleanliness4" aria-hidden="true" onclick="add('Cleanliness',4)"></i></li>
                                            <li><i class="fa fa-star-o" id="Cleanliness5" aria-hidden="true" onclick="add('Cleanliness',5)"></i></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-3 col-md-6">
                                        Location
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <ul class="list-inline rating rating-review">
                                            <li><i class="fa fa-star-o" id="Location1" aria-hidden="true" onclick="add('Location',1)"></i></li>
                                            <li><i class="fa fa-star-o" id="Location2" aria-hidden="true" onclick="add('Location',2)"></i></li>
                                            <li><i class="fa fa-star-o" id="Location3" aria-hidden="true" onclick="add('Location',3)"></i></li>
                                            <li><i class="fa fa-star-o" id="Location4" aria-hidden="true" onclick="add('Location',4)"></i></li>
                                            <li><i class="fa fa-star-o" id="Location5" aria-hidden="true" onclick="add('Location',5)"></i></li>
                                        </ul>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        Value
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <ul class="list-inline rating rating-review">
                                            <li><i class="fa fa-star-o" id="Value1" aria-hidden="true" onclick="add('Value',1)"></i></li>
                                            <li><i class="fa fa-star-o" id="Value2" aria-hidden="true" onclick="add('Value',2)"></i></li>
                                            <li><i class="fa fa-star-o" id="Value3" aria-hidden="true" onclick="add('Value',3)"></i></li>
                                            <li><i class="fa fa-star-o" id="Value4" aria-hidden="true" onclick="add('Value',4)"></i></li>
                                            <li><i class="fa fa-star-o" id="Value5" aria-hidden="true" onclick="add('Value',5)"></i></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <input type="hidden" name="Communication" id="Communication">
                            <input type="hidden" name="Cleanliness" id="Cleanliness">
                            <input type="hidden" name="Location" id="Location">
                            <input type="hidden" name="Value" id="Value">

                            <div class="formSection formSpace">
                                <div class="form-group">
                                    <input type="text" class="form-control" name="Name" placeholder="Name"></input>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" rows="3" name="Comment" placeholder="Comment"></textarea>
                                </div>
                                <div class="form-group mb0">
                                    <button type="submit" class="btn btn-primary">Send Review</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-sm-4 col-xs-12" id="mapdiv">
                <div class="clearfix map-sidebar map-right">
                    <div id="mapid" style="position: relative; margin: 0px; padding: 0px; height: 538px; max-width: none; overflow: hidden;">

                    </div>
                </div>
                <div class="listSidebar">
                    <h3>Contact Details</h3>
                    <div class="contactInfo">
                        <ul class="list-unstyled list-address">
                            <li>
                                <i class="fa fa-mobile-phone" aria-hidden="true"></i>
                                {{ $data->MobileNumber }}
                            </li>
                            <li>
                                <i class="fa fa-phone" aria-hidden="true"></i>
                                {{ $data->LandLineNumber }}
                            </li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection

@section('scripts')
    <script>
        function add(cls,sno){


            for (var i=1;i<=5;i++){
                var cur=document.getElementById(cls+""+i)
                cur.className="fa fa-star-o"
            }

            for (var i=1;i<=sno;i++){
                var cur=document.getElementById(cls+""+i)
                if(cur.className=="fa fa-star-o")
                {
                    cur.className="fa fa-star"
                }
            }

            $('#'+cls).val(sno);
        }
    </script>
    <script src="{{ asset('js/leaflet.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/leaflet-search.js') }}" type="text/javascript"></script>
    <script>

        var mymap = new L.map('mapid').setView([{{$data->Latitude}}, {{$data->Longitude}}], 14);

        new L.Control.Search({
            url: 'https://nominatim.openstreetmap.org/search?format=json&q={s}',
            jsonpParam: 'json_callback',
            propertyName: 'display_name',
            propertyLoc: ['lat','lon'],
//        marker: L.circleMarker([0,0],{radius:30}),
            autoCollapse: true,
            autoType: false,
            minLength: 2
        }).addTo(mymap);

        var tileLayer = new L.tileLayer('https://api.tiles.mapbox.com/v4/{id}/{z}/{x}/{y}.png?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
            maxZoom: 18,
            minZoom: 9,
            attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
            '<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
            'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
            id: 'mapbox.streets'
        }).addTo(mymap);


        var popup = L.popup();

        var lat = 0;
        var lng = 0;


        @if(isset($data))

        var name = '<strong>{{ $data->Name }}</strong><br/>'+
                '{{ $data->AddressLine1 }}, {{ $data->AddressLine2 }}, <br/>'+
                '{{ $data->City }}, Cavite<br/>';

        var marker;
        marker = L.marker([{{ $data->Latitude }}, {{ $data->Longitude }}]).addTo(mymap).bindPopup(name)
            .openPopup();

        @endif



        $('#toggleMap').on('click', function() {
            $('#listDiv').toggle();
            $('#mapdiv').toggle();
            var text = $(this).text();

            $(this).text(text=="VIEW LIST"?"VIEW MAP":"VIEW LIST");
        });
    </script>
@endsection