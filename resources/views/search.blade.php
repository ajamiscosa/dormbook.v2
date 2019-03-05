@extends('app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}"/>
@endsection
@section('content')

@if(!isset($data))
<div class="container clearfix">
    <div class="row">
        <div class="col-lg-12">
            <form method="post" action="/search">
                {{ csrf_field() }}
                <span class="btn-group btn-panel pb-1">
                    <button type="submit" class="btn btn-primary" name="Search" value="Indang">Indang</button>
                    <button type="submit" class="btn btn-primary" name="Search" value="Carmona">Carmona</button>
                    <button type="submit" class="btn btn-primary" name="Search" value="Trece Martirez">Trece Martirez</button>
                    <button type="submit" class="btn btn-primary" name="Search" value="Imus">Imus</button>
                    <button type="submit" class="btn btn-primary" name="Search" value="Rosario">Rosario</button>
                    <button type="submit" class="btn btn-primary" name="Search" value="Cavite City">Cavite City</button>
                    <button type="submit" class="btn btn-primary" name="Search" value="Tanza">Tanza</button>
                    <button type="submit" class="btn btn-primary" name="Search" value="General Trias">Gen. Trias</button>
                    <button type="submit" class="btn btn-primary" name="Search" value="Silang">Silang</button>
                    <button type="submit" class="btn btn-primary" name="Search" value="Bacoor">Bacoor</button>
                </span>
            </form>
        </div>
    </div>
    <div class="dashboardBoxBg">
        <div class="profileIntro">
            <div class="row">

                <div class="text-center">
                    <h1>WE FOUND IT ALL FOR YOU!</h1>
                    <form action="/search" method="post">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <input type="text" class="form-control" name="Search" placeholder="What are you looking for?">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group ">
                                <button type="submit" class="btn btn-primary btn-sm">Search <i class="fa fa-search" aria-hidden="true"></i></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
@else
    <section class="clearfix p0" id="mapdiv">
        <div id="mapid" style="position: relative; overflow: hidden; width: 100%; height: 500px;">
        </div>
    </section>
@endif

    @if(isset($data))
        <section class="clearfix">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-xs-12">
                        <div class="resultBar barSpaceAdjust">
                            <h2>We found <span>{{ count($data) }}</span> Results for you</h2>
                        </div>

                        @foreach($data as $entry)
                            <div class="listContent">
                                <div class="row">
                                    <div class="col-sm-5 col-xs-12">
                                        <div class="categoryImage">
                                            <img src="{{ asset("uploads/{$entry->ID}/1.jpg") }}" alt="Image category" class="img-responsive img-rounded">
                                        </div>
                                    </div>
                                    <div class="col-sm-7 col-xs-12">
                                        <div class="categoryDetails">
                                            <ul class="list-inline rating">
                                                @for($i=0;$i<floor($entry->getOverallAverageRating());$i++)
                                                    <li><i class="fa fa-star" aria-hidden="true"></i></li>
                                                @endfor
                                                @if($entry->getOverallAverageRating()>$i)
                                                        <li><i class="fa fa-star-half-empty" aria-hidden="true"></i></li>
                                                @endif
                                            </ul>
                                            @php
                                                $path = explode(' ',$entry->Name);
                                                $path = implode('-',$path);
                                                $path = sprintf("%s-%s",$entry->ID,$path);
                                            @endphp
                                            <h2><a href="/view/{{ $path }}" style="color: #222222">{{ $entry->Name }}</a> <span class="likeCount"><i class="fa fa-heart-o" aria-hidden="true"></i> {{ $entry->getTotalRatings() }}</span></h2>
                                            <p>{{ $entry->AddressLine1 }}, {{ $entry->AddressLine2 }}, <span class="placeName"> {{ $entry->City }}</span></p>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed eiusmod tempor incididunt  labore et dolore magna aliqua. </p>
                                            <ul class="list-inline list-tag">
                                                <li><a href="/">{{ $entry->Rate }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@section('scripts')

    <script src="{{ asset('js/leaflet.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/leaflet-search.js') }}" type="text/javascript"></script>
    <script>

        var mymap = new L.map('mapid').setView([14.194331, 120.876732], 14);

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
                @foreach($data as $entry)

        var name = '<strong>{{ $entry->Name }}</strong><br/>'+
                '{{ $entry->AddressLine1 }}, {{ $entry->AddressLine2 }}, '+
                '{{ $entry->City }}, Cavite<br/>{{ $entry->Rate }}<br/>' +
                '<img src="/uploads/{{ $entry->ID }}/1.jpg" style="max-height: 100px; max-width: 100px;"/>';

        var marker;
        marker = L.marker([{{ $entry->Latitude }}, {{ $entry->Longitude }}]).addTo(mymap).bindPopup(name)
            .openPopup();

        @endforeach
    @endif



        $('#toggleMap').on('click', function() {
            $('#listDiv').toggle();
            $('#mapdiv').toggle();
            var text = $(this).text();

            $(this).text(text=="VIEW LIST"?"VIEW MAP":"VIEW LIST");
        });
    </script>
@endsection