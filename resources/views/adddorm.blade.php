@extends('app')
@section('styles')
<link href="{{ asset('css/fileinput.css')}}" media="all" rel="stylesheet" type="text/css"/>
<link href="{{ asset('explorer-fas/theme.css')}}" media="all" rel="stylesheet" type="text/css"/>
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
<form method="POST" action="/dorm/store">
    {{ csrf_field() }}
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
                                        <input type="text" class="form-control" id="dormName" placeholder="Listing Title" name="Name" required>
                                    </div>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="listingCategory">Campus</label>
                                        <div class="contactSelect">
                                            <select id="CampusSelect" class="select-drop" required>
												<option value="-1">- Select Campus -</option>
                                                @foreach(App\Campus::all() as $campus)
                                                    <option value="{{ $campus->ID }}|{{ $campus->Latitude }}|{{ $campus->Longitude }}">{{ $campus->Campus }}</option>
                                                @endforeach
                                            </select>
                                            <input type="hidden" name="Campus" id="Campus"/>
                                        </div>
                                    </div>
                                    <hr/>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="listingTitle">Number of Rooms</label>
                                        <input type="text" class="form-control" placeholder="# of Rooms" name="Rooms" required>
                                    </div>
                                    <hr/>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="listingTitle">Monthly Rate (per head)</label>
                                        <input type="number" class="form-control" placeholder="Monthly Rate (per head)" name="Rate" required>
                                    </div>
                                    <hr/>
                                    <div class="form-group col-sm-4 col-xs-12">
                                        <label for="listingTitle">Business Permit ID</label>
                                        <input type="text" class="form-control" placeholder="Business Permit" name="BusinessPermit" required>
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
                                            <input type="text" class="form-control" id="Owner" name="Owner" placeholder="Owner's Name" autocomplete="off" required>
                                        </div>
                                    </div>


                                    <div class="form-group col-sm-6 col-xs-12">
                                        <label for="listingRegion">Address Line 1</label>
                                        <div class="contactSelect">
                                            <input type="text" class="form-control" id="AddressLine1" name="AddressLine1" placeholder="Type Location" autocomplete="off" required>
                                        </div>
                                    </div>


                                    <div class="form-group col-sm-6 col-sm-6 col-xs-12">
                                        <div class="row pt-1" id="mapdiv">
                                            <div class="col-lg-12">
                                                <div id="mapid" style="width: 100%; height: 395px;">

                                                </div>
                                                <input type="hidden" name="Latitude" id="Latitude" required/>
                                                <input type="hidden" name="Longitude" id="Longitude" required/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group col-sm-6 col-sm-6 col-xs-12">
                                        <label for="listingPhone">Address Line 2</label>
                                        <input type="text" class="form-control" id="AddressLine2" name="AddressLine2" placeholder="">
                                    </div>
                                    <div class="form-group col-sm-6 col-sm-6 col-xs-12">
                                        <div class="row">
                                            <div class="col-lg-8">
                                                <label for="listingEmail">City</label>
                                                <input type="text" class="form-control" id="City" name="City" placeholder="" required>
                                            </div>
                                            <div class="col-lg-4">
                                                <label for="listingEmail">Zip</label>
                                                <input type="number" class="form-control" id="Zip" name="Zip" placeholder="" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-sm-6 col-sm-6 col-xs-12">
                                        <label for="listingWebsite">Mobile Number</label>
                                        <input type="text" class="form-control" id="MobileNumber" name="MobileNumber" placeholder="" required>
                                    </div>
                                    <div class="form-group col-sm-6 col-sm-6 col-xs-12">
                                        <label for="listingWebsite">Land Line Number</label>
                                        <input type="text" class="form-control" id="LandLineNumber" name="LandLineNumber" placeholder="" required>
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
                            <button type="submit" class="btn btn-primary btn-sm btn-block">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('scripts')


<script src="{{ asset('js/sortable.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/fileinput.js')}}" type="text/javascript"></script>
<script src="{{ asset('fas/theme.js')}}" type="text/javascript"></script>
<script src="{{ asset('explorer-fas/theme.js')}}" type="text/javascript"></script>

<script>
    $("#file-0c").fileinput({
        'theme': 'fas',
        'allowedFileExtensions': ['jpg', 'png', 'bmp'],
        'elErrorContainer': '#errorBlock',
        showUpload: false
    });
</script>
<script>
    var abc = 0;      // Declaring and defining global increment variable.
    $(document).ready(function() {
//  To add new input file field dynamically, on click of "Add More Files" button below function will be executed.
        $('#add_more').click(function() {
            $(this).before($("<div/>", {
                id: 'thumbnail'
            }).fadeIn('slow').append($("<input/>", {
                name: 'Images[]',
                type: 'file',
                id: 'file'
            }), $("<br/><br/>")));
        });
// Following function will executes on change event of file input to select different file.
        $('body').on('change', '#file', function() {
            if (this.files && this.files[0]) {
                abc += 1; // Incrementing global variable by 1.
                var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd" + abc + "' class='abcd'><img id='previewimg" + abc + "' src=''/></div>");
                var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
                $(this).hide();
                $("#abcd" + abc).append($("<img/>", {
                    id: 'img',
                    src: 'x.png',
                    alt: 'delete'
                }).click(function() {
                    $(this).parent().parent().remove();
                }));
            }
        });
// To Preview Image
        function imageIsLoaded(e) {
            $('#previewimg' + abc).attr('src', e.target.result);
        };
        $('#upload').click(function(e) {
            var name = $(":file").val();
            if (!name) {
                alert("First Image Must Be Selected");
                e.preventDefault();
            }
        });
    });
</script>



    <script src="{{ asset('js/leaflet.js') }}" type="text/javascript"></script>
    <script src="{{ asset('js/leaflet-search.js') }}" type="text/javascript"></script>

    <script>

        var mymap = new L.map('mapid').setView([14.194331,120.876732], 13);

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



        $(document).ready(function(){
            $(document).on('change','#CampusSelect',function() {
                var data = $(this).val();
                var values = data.split('|');

                mymap.setView([values[1],values[2]], 13);

                $('#Campus').val(values[0]);
            });
        });
    </script>
@endsection
