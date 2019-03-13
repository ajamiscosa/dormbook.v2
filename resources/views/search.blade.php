@extends('app')

@section('styles')
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}"/>
    <style>
        @media screen and (min-width: 320px) and (max-width: 767px) and (orientation: landscape) {
            html {
                transform: rotate(-90deg);
                transform-origin: left top;
                width: 100vh;
                overflow-x: hidden;
                position: absolute;
                top: 100%;
                left: 0;
            }
        }
    </style>


    <script src="{{ asset('js/leaflet.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/leaflet-search.js') }}" type="text/javascript"></script>

    <script>
        function getDistance(id,lat1,lon1,lat2,lon2) {
            var campus = L.latLng(lat1, lon1);
            var dorm = L.latLng(lat2, lon2);
            document.getElementById("distance"+id).innerHTML = (campus.distanceTo(dorm)/1000).toFixed(2)+" km away from campus";
        }
    </script>
@endsection
@section('content')

@if(!isset($data))
<div class="container clearfix">
    <div class="row">
        <div class="col-lg-12">
            <form action="/search" method="get">
                <span class="btn-group btn-panel pb-1">
                    <button type="submit" class="btn btn-primary" name="campus" value="Indang">Indang</button>
                    <button type="submit" class="btn btn-primary" name="campus" value="Carmona">Carmona</button>
                    <button type="submit" class="btn btn-primary" name="campus" value="Trece Martirez">Trece Martirez</button>
                    <button type="submit" class="btn btn-primary" name="campus" value="Imus">Imus</button>
                    <button type="submit" class="btn btn-primary" name="campus" value="Rosario">Rosario</button>
                    <button type="submit" class="btn btn-primary" name="campus" value="Cavite City">Cavite City</button>
                    <button type="submit" class="btn btn-primary" name="campus" value="Tanza">Tanza</button>
                    <button type="submit" class="btn btn-primary" name="campus" value="General Trias">Gen. Trias</button>
                    <button type="submit" class="btn btn-primary" name="campus" value="Silang">Silang</button>
                    <button type="submit" class="btn btn-primary" name="campus" value="Bacoor">Bacoor</button>
                </span>
            </form>
        </div>
    </div>
    <div class="dashboardBoxBg">
        <div class="profileIntro">
            <div class="row">

                <div class="text-center">
                    <form action="/search" method="get">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group ">
                                    <input type="text" class="form-control" name="search" placeholder="What are you looking for?">
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
                                                $campus = $entry->getCampus();
                                            @endphp
                                            <h2><a href="/view/{{ $path }}" style="color: #222222">{{ $entry->Name }}</a> <span class="likeCount"><i class="fa fa-heart-o" aria-hidden="true"></i> {{ $entry->getTotalRatings() }}</span></h2>
                                            <p>{{ $entry->AddressLine1 }}, {{ $entry->AddressLine2 }}, <span class="placeName"> {{ $entry->City }}</span></p>
                                            <p id="distance{{ $entry->ID }}">
                                                <script>getDistance('{{ $entry->ID }}','{{ $campus->Latitude }}','{{ $campus->Longitude }}','{{ $entry->Latitude }}','{{ $entry->Longitude }}')</script>
                                            </p>
                                            <ul class="list-inline list-tag">
                                                <li><a href="/">{{ $entry->Rate }}</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <script>
                                getDistance('{{ $entry->Latitude }}', '{{ $entry->Longitude }}','{{ $entry->Latitude }}', '{{ $entry->Longitude }}')
                            </script>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif
@endsection

@section('scripts')
    <script>

        @if(isset($campus))
            var mymap = new L.map('mapid').setView([{{ $campus->Latitude }}, {{ $campus->Longitude }}], 14);
        @else
            mymap = new L.map('mapid').setView([14.194331, 120.876732], 14);
        @endif

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