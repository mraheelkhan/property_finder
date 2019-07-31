@extends('layouts.public')
@section('title')
	Home Property Listing
@endsection
@section('content')

<style type="text/css">
	/*********************************
5. Home
*********************************/

.home
{
	height: 261px;
}
.home_content
{
	padding-top: 83px;
}
.home_title
{
	font-size: 30px;
	font-weight: 500;
	color: #ffffff;
}

/*********************************
6. Intro
*********************************/

.intro
{
	background: #ffffff;
	padding-top: 92px;
	padding-bottom: 92px;
}
.intro_text
{
	margin-top: 36px;
}
.intro_button
{
	margin-top: 47px;
}
.intro_image
{
	height: 100%;
}
.intro_image > img
{
	display: none;
}

</style>
	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="{{ asset('images/about.jpg') }}" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content text-center mt-5">
						<div class="home_title">Submit Listing</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="intro">
		<div class="container">
			<form action="{{route('SubmitStore')}}" method="POST" class=""  enctype="multipart/form-data">
				<div class="pb-5 pt-5" style="background: #f9f9f9" >
					<div class="row">
						<div class="col-md-6 col-offset-md-3">
						@if(Session::has('message'))
							<p class="alert alert-success">{!! Session::get('message') !!}</p>
						@endif
						@if ($errors->any())
	                    <div class="alert alert-danger">
	                        <ul>
	                            @foreach ($errors->all() as $error)
	                                <li>{{ $error }}</li>
	                            @endforeach
	                        </ul>
	                    </div>
	                  	@endif
	                  	</div>
                  	</div>
                  	<div class="row">
						<div class="col-md-4 offset-2">
							@csrf
							<h4 class="">General Details</h4>
							<div class="form-group">
								<label class="badge badge-primary">Enter Title</label> <label class="badge badge-danger">*</label>	
								<input type="text" name="title" id="title" class="form-control" placeholder="Enter Title for Your Ad" value="{{old('title')}}">
							</div>
							<hr>
							<h4 class="">Address Details</h4>
							<div class="form-group">
								<label class="badge badge-primary">Street Name or Number</label>
								<input type="text" name="street" id="street" class="form-control" placeholder="Enter Street Name or Number" value="{{old('street')}}">
							</div>
							<div class="form-group">
								<label class="badge badge-primary">House Number</label>
								<label class="badge badge-danger">*</label>
								<input type="text" name="house" id="house" class="form-control" placeholder="Enter House Number" value="{{old('house')}}">
							</div>
							<div class="form-group">
								<label class="badge badge-primary">Sector</label><label class="badge badge-danger">*</label>
								<select name="listing_area_id" id="listing_area_id" class="form-control" value="{{old('listing_area_id')}}">
									<option value="" selected disabled>Select Area/Sector</option>
									@foreach($areas as $area)
										<option value="{{$area->id}}">{{$area->area_name}} , {{$area->sector->sector_name}}</option>
									@endforeach
								</select>
							</div>
							<div class="form-group">
								<label class="badge badge-primary">Type of Ad</label><label class="badge badge-danger">*</label>
								<select name="ad_type" id="ad_type" class="form-control" value="{{old('ad_type')}}">
									<option value="sale">Sale</option>
									<option value="rent">Rent</option>
								</select>
							</div>
							<hr>
							<h4 class="">Pricing Details </h4>
							<div class="form-group">
								<label class="badge badge-primary">Price</label>
								<label class="badge badge-danger">*</label>
								<input type="text" name="price" id="price" class="form-control" placeholder="Enter Price" value="{{old('price')}}">
							</div>
							<div class="form-group">
								<label class="badge badge-primary">Pricing Type</label><label class="badge badge-danger">*</label>
								<select name="pricing_type" id="pricing_type" class="form-control" value="{{old('pricing_type')}}">
									<option value="1">Per Month</option>
									<option value="2">Per Year</option>
									<option value="3">Fixed Amount</option>
								</select>
							</div>
							<hr>
							<h4 class="">Contact Details </h4>
							<div class="form-group">
								<label class="badge badge-primary">Contact Number</label>
								<input type="text" name="contact1" id="contact1" class="form-control" placeholder="Enter Contact Number" value="{{old('contact1')}}">
							</div>
							<div class="form-group">
								<label class="badge badge-primary">Contact Number 2</label>
								<input type="text" name="contact2" id="contact2" class="form-control" placeholder="Enter Contact Number 2" value="{{old('contact2')}}">
							</div>
						<button class="btn btn-primary">Submit Ad </button>
						</div>

						<div class="col-md-4">
							<h4 class="">Property Details</h4>
							<div class="form-group">
								<label class="badge badge-primary">Garages</label>
								<input type="text" name="garages" id="garages" class="form-control" placeholder="Enter Number of Garages" value="{{old('garages')}}">
							</div>
							<div class="form-group">
								<label class="badge badge-primary">Bedrooms</label><label class="badge badge-danger">*</label>
								<input type="text" name="bedrooms" id="bedrooms" class="form-control" placeholder="Enter Number of Bedrooms" value="{{old('bedrooms')}}">
							</div>
							<div class="form-group">
								<label class="badge badge-primary">Siderooms</label>
								<input type="text" name="siderooms" id="siderooms" class="form-control" placeholder="Enter Number of Siderooms" value="{{old('siderooms')}}">
							</div>
							<div class="form-group">
								<label class="badge badge-primary">Washrooms</label><label class="badge badge-danger">*</label>
								<input type="text" name="washrooms" id="washrooms" class="form-control" placeholder="Enter Number of Washrooms" value="{{old('washrooms')}}">
							</div>
							<div class="form-group">
								<label class="badge badge-primary">Floors</label>
								<input type="text" name="floors" id="floors" class="form-control" placeholder="Enter Number of Floors" value="{{old('floors')}}">
							</div>
							<div class="form-group">
								<label class="badge badge-primary">Kitchens</label>
								<input type="text" name="kitchens" id="kitchens" class="form-control" placeholder="Enter Number of Kitchens" value="{{old('kitchens')}}">
							</div>
							<hr>
							<div class="form-group">
								<label class="badge badge-primary">Featured Image</label>
								<input type="file" name="featured_image" id="featured_image" class="form-control">
							</div>
							<div class="form-group">
								<label class="badge badge-primary">Comment</label>
								<textarea class="form-control" rows="5" name="comment" id="comment" class="form-control">{{old('comment')}}</textarea>
							</div>

							<div class="form-group">
								<label class="badge badge-primary"> Description </label>
								<input type="text" class="form-control" name="description" id="description" value="{{old('description')}}">
							</div>
							<input type="text" disabled id="lat" placeholder="LAT">
							<input type="text" disabled id="lng" placeholder="LNG">
						</div>
						<div class="col-md-12"  style="height: 400px;">
								<div id="map"></div>
						</div>
					</div>

					
					<script>
						function initMap() {
							var lat1 = document.getElementById('lat').value;
							var lng1 = document.getElementById('lng').value;
							var myLatLng = {lat: 33.64, lng: 73.044};
							

							var map = new google.maps.Map(document.getElementById('map'), {
								zoom: 4,
								center: myLatLng
							});

							var marker = new google.maps.Marker({
							// position: myLatLng,
								map: map,
								title: 'Hello World!'
							});
							google.maps.event.addListener(map, 'click', function(event) {
								
								alert(event.latLng.lat() + ", " + event.latLng.lng());
								document.getElementById('lat').value= event.latLng.lat();
								document.getElementById('lng').value= event.latLng.lng(); 
							});

							google.maps.event.addListener(map, 'click', function(event) {
								placeMarker(event.latLng);
							});

								function placeMarker(location) {
									var marker = new google.maps.Marker({
										position: location, 
										map: map
									});
								}
							}
					</script>
					{{-- <script async defer
						src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBgTgbxRK69p6pWShajYbfteTNKVRWUrRc&callback=initMap">
					</script> --}}
					{{-- src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB1ZDTKLqTHX1_uNAiL-SUWl5vP-eq7YWk&callback=initMap"> --}}
				</div>
			</form>
		</div>
	</div>

@endsection