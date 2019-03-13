@php
    $data = App\Dorm::find($id);

@endphp
<ul class="list-inline listingsInfo">
    <li><a href="#"><img src="{{ asset('images/'.$data->ID.'/1.jpg') }}" alt="Image Listings"></a></li>
    <li>
        <h3> <i class="fa fa-check-circle" aria-hidden="true"></i></h3>
        <h5>1569 Queen Street West <span class="cityName">Toronto</span></h5>
        <span class="category">Hotel</span>
        <p>From $50.00 /Night <span class="likeArea"><i class="fa fa-heart-o" aria-hidden="true"></i>10k</span></p>
    </li>
</ul>