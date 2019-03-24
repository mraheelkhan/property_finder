@extends('layouts.public')
@section('title')
	Home Property Listing
@endsection
@section('content')

	<div class="home">
		<div class="home_slider_container">
			 <div class="owl-carousel owl-theme home_slider">
			 	<div class="home_content text-center mt-5">

						<div class="home_title" style="color:#fff; font-size: 28px; text-align:center"> All Listing</div>
					</div>
			 </div>
		</div>
	</div>
	
	

	<div class="intro">
		<div class="container">
			@if(Session::has('message'))
				<p class="alert alert-success">{!! Session::get('message') !!}</p>
			@endif
		</div>
	</div>

@endsection