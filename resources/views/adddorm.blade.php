@extends('app')
@section('styles')
    <link rel="stylesheet" href="{{ asset('css/leaflet.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/leaflet-search.css') }}"/>
    <style>
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>
@endsection

@section('content')
    <section class="clearfix bg-dark listingSection" id="listing-add-edit">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <form action="" method="" class="listing__form">
                        <div class="dashboardBoxBg mb30">
                            <div class="profileIntro paraMargin">
                                <h3>Basic Information</h3>
                                <p>We are not responsible for any damages caused by the use of this website, or by posting business listings here. Please use our site at your own discretion and exercise good judgement as well as common sense when advertising business here.</p>
                                <div class="row">
                                    <div class="form-group col-sm-8 col-xs-12">
                                        <label for="listingTitle">Name of Dormitory</label>
                                        <input type="text" class="form-control" id="listingTitle" placeholder="Listing Title">
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="listingCategory">Campus</label>
                                        <div class="contactSelect">
                                            <select name="guiest_id9" id="guiest_id9" class="select-drop" sb="40996851" style="display: none;">
                                                @foreach(App\Campus::all() as $campus)
                                                    <option value="{{ $campus->ID }}">{{ $campus->Campus }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group col-xs-12">
                                        <label for="discribeTheListing">Describe the Dormitory / Sales Pitch</label>
                                        <textarea class="form-control" rows="3" placeholder="Discribe the listing"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboardBoxBg mb30">
                            <div class="profileIntro paraMargin">
                                <h3>Contact</h3>
                                <p>We are not responsible for any damages caused by the use of this website, or by posting business listings here. Please use our site at your own discretion and exercise good judgement as well as common sense when advertising business here.</p>
                                <div class="row">

                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="listingAddress">Name of Owner</label>
                                        <div class="contactSelect">
                                            <input type="text" class="form-control" id="listingAddress" placeholder="Type Location" autocomplete="off">
                                        </div>
                                    </div>


                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="listingRegion">Address Line 1</label>
                                        <div class="contactSelect">
                                            <input type="text" class="form-control" id="listingAddress" placeholder="Type Location" autocomplete="off">
                                        </div>
                                    </div>


                                    <div class="form-group col-sm-6 col-sm-6 col-xs-12">
                                        <div class="row pt-1" id="mapdiv">
                                            <div class="col-lg-12">
                                                <div id="mapid" style="width: 100%; height: 395px;">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-sm-6 col-xs-12">
                                        <label for="listingPhone">Address Line 2</label>
                                        <input type="text" class="form-control" id="listingPhone" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6 col-sm-6 col-xs-12">
                                        <label for="listingEmail">City</label>
                                        <input type="text" class="form-control" id="listingEmail" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6 col-sm-6 col-xs-12">
                                        <label for="listingWebsite">Mobile Number</label>
                                        <input type="text" class="form-control" id="listingWebsite" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6 col-sm-6 col-xs-12">
                                        <label for="listingWebsite">Land Line Number</label>
                                        <input type="text" class="form-control" id="listingWebsite" placeholder="">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="dashboardBoxBg mb30">
                            <div class="profileIntro paraMargin">
                                <h3>Gallery</h3>
                                <p>We are not responsible for any damages caused by the use of this website, or by posting business listings here. Please use our site at your own discretion and exercise good judgement as well as common sense when advertising business here.</p>
                                <div class="row">
                                    <div class="form-group col-xs-12">
                                        <div class="imageUploader text-center">
                                            <div class="file-upload">
                                                <div class="upload-area">
                                                    <input type="file" name="img[]" class="file" id="file" multiple>
                                                    <button class="browse" type="button">Click or Drag images here</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-xs-12">
                                        <label for="videoUrl">Video URL</label>
                                        <input type="text" class="form-control" id="videoUrl" placeholder="http://">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="dashboardBoxBg mb30">
                            <div class="profileIntro paraMargin">
                                <h3>Facilities</h3>
                                @php($count=1)
                                @foreach(\App\Facility::all() as $facility)
                                    @if($count%4==0)
                                        <div class="row">
                                    @endif
                                        <div class="col-md-3">
                                            <div class="form-check">
                                                <label class="form-check-label">
                                                    <input name="Amenities[]" class="form-check-input" type="checkbox" value="{{ $facility->ID }}">
                                                    <span class="form-check-sign"></span>
                                                    {{ $facility->Description }}
                                                </label>
                                            </div>
                                        </div>
                                    @if($count%4==0)
                                        </div>
                                    @endif
                                    @php($count++)
                                @endforeach
                            </div>
                            <br/>
                        </div>
                        <div class="form-footer text-center">
                            <button type="submit" class="btn-submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')
    <script src="{{ asset('js/leaflet.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/leaflet-search.js') }}" type="text/javascript"></script>

    <script>

        var mymap = new L.map('mapid').setView([14.2917802,120.9115148], 11);

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

        function onMapClick(e) {
            popup
                .setLatLng(e.latlng)
                .setContent("You clicked the map at " + e.latlng.toString()+".<br/><input type='button' value='Drop Pin' id='dropPin' />")
                .openOn(mymap);

            lat = e.latlng.lat;
            lng = e.latlng.lng;
        }

        mymap.on('click', onMapClick);

        //    L.marker([14.19480, 120.88169]).addTo(mymap);

        var marker;

        $(document).on('click', '#dropPin', function() {
            var name = $("#dormName").val();
            if(name=="") {
                alert('Please provide dorm\'s name first.');
                return;
            }

            if (marker) {
                mymap.removeLayer(marker);
            }

            marker = new L.marker([lat, lng]).addTo(mymap)
                .bindPopup(name)
                .openPopup();

            $('#Latitude').val(lat);
            $('#Longitude').val(lng);

        });


        $('#toggleMap').on('click', function() {
            $('#mapdiv').toggle();
        });
    </script>
@endsection