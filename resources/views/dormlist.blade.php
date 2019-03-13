@extends('app')
@section('styles')
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
<section class="clearfix bg-dark listyPage">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <div class="dashboardPageTitle">
                    <h2>My Listings</h2>
                </div>
                <div class="table-responsive" data-pattern="priority-columns">
                    <table class="table listingsTable" id="dormsTable">
                        <thead>
                        <tr class="rowItem">
                            <th data-priority="">Listings</th>
                            <th data-priority="1">Owner</th>
                            <th data-priority="2">Address</th>
                            <th data-priority="3">Mobile #</th>
                            <th data-priority="4"># of Rooms</th>
                            <th data-priority="5">Action</th>
                        </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</section>
@endsection
@section('scripts')

    <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $('#dormsTable').DataTable( {
            serverSide: false,
            processing: true,
            searching: true,
            ajax: '/dorm/data',
            dataSrc: 'data',
            columns: [
                { data:"Name" },
                { data:"Owner" },
                { data:"Address" },
                { data:"Mobile" },
                { data:"Rooms", class: 'text-center' },
                { data: null, class:'text-right' }
            ],
            columnDefs: [
                {
                    render: function ( data, type, row ) {
                        var ID = row['ID'];
                        var Name = row['Name'];
                        var Address = row['Address']
                        var City = row['City'];
                        var Rate = row['Rate'];
                        var url = row['Name'].split(' ').join('-');
                        return '<ul class="list-inline listingsInfo"><li><a href=\"/view/'+ID+'-'+url+'\""><img src="/uploads/'+ID+'/1.jpg" alt="Image Listings" style="width: 100%;"></a></li><li><h3>'+Name+' <i class="fa fa-check-circle" aria-hidden="true"></i></h3><h5>'+Address+' <span class="cityName">'+City+'</span></h5></li></ul>';
                    },
                    targets: 0

                },
                {
                    render: function (data, type, row) {
                        var ID = row['ID'];
                        var Name = row['Name'].split(' ').join('-');
                        return '<a href="/dorm/update/'+ID+'-'+Name+'" class="btn btn-warning btn-link btn-icon btn-sm edit"><i class="fa fa-edit"></i></a>' +
                            '<a href="/dorm/delete/'+ID+'-'+Name+'" class="btn btn-danger btn-link btn-icon btn-sm remove"><i class="fa fa-times"></i></a>';
                    },
                    targets: 5
                }
            ],
            pagingType: "full_numbers",
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
            responsive: true,
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Search Dorms",
                infoFiltered: ""
            }
        } );
    </script>
@endsection