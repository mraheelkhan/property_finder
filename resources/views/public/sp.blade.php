@extends('layouts.public')
@section('title')
	Home Property Listing
@endsection
@section('content')
	<!-- Home Slider -->


	<!-- Featured: available for Rent -->
	<div class="featured">
		<div class="container">
				<div class="col-md-12">
					@if(Session::has('message'))
						<p class="alert alert-danger">{!! Session::get('message') !!}</p>
					@endif
				</div>	
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						
					<div class="section_title"><h1>{{ $user->first_name }} {{ $user->last_name }}</h1></div>
					<div class="section_title"><h1>{{ $user->email }} </h1></div>
					<div class="section_title"><h1>{{ $user->phone }} </h1></div>
					<div class="section_title"><h1>{{ $user->address }} </h1></div>
					</div>
				</div>
			</div>
			<div class="row featured_row">
				
				<div class="col-lg-6 offset-3">
					<div class="listing">
						
						<div class="listing_content">
							<h2> Services </h2>
								<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										{{-- <i class="fas fa-microphone fa-2x"></i> --}}
										<a href="#">
											Steel Frames - {{($data['streel_frames'] == 1 ? "Yes" : 'No')	}}
										</a>
									</div>
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								{{-- <img src="{{asset('images/icon_1.png')}}" alt=""> --}}
								<a href=""> electrical_systems - {{($data['electrical_systems'] == 1 ? "Yes" : 'No')	}} </a>
							</div>
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								{{-- <i class="fas fa-phone-square fa-lg" style="font-size: 2em"></i> --}}
								<a href=""> concrete - {{($data['concrete'] == 1 ? "Yes" : 'No')	}} </a>
							</div>
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								{{-- <i class="fas fa-phone-square fa-lg" style="font-size: 2em"></i> --}}
								<a href=""> ceiling - {{($data['ceiling'] == 1 ? "Yes" : 'No')	}} </a>
							</div>
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								{{-- <i class="fas fa-phone-square fa-lg" style="font-size: 2em"></i> --}}
								<a href=""> masonry - {{($data['masonry'] == 1 ? "Yes" : 'No')	}} </a>
							</div>
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								{{-- <i class="fas fa-phone-square fa-lg" style="font-size: 2em"></i> --}}
								<a href=""> plumbing - {{($data['plumbing'] == 1 ? "Yes" : 'No')	}} </a>
							</div>
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								{{-- <i class="fas fa-phone-square fa-lg" style="font-size: 2em"></i> --}}
								<a href=""> windows - {{($data['windows'] == 1 ? "Yes" : 'No')	}} </a>
							</div>
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								{{-- <i class="fas fa-phone-square fa-lg" style="font-size: 2em"></i> --}}
								<a href=""> labour - {{($data['labour'] == 1 ? "Yes" : 'No')	}} </a>
							</div>
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								{{-- <i class="fas fa-phone-square fa-lg" style="font-size: 2em"></i> --}}
								<a href=""> transport - {{($data['transport'] == 1 ? "Yes" : 'No')	}} </a>
							</div>
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								{{-- <i class="fas fa-phone-square fa-lg" style="font-size: 2em"></i> --}}
								<a href=""> transport - {{($data['transport'] == 1 ? "Yes" : 'No')	}} </a>
							</div>
							
							
						</div>
					</div>
				</div>
				
				<!-- Featured Item End -->
				
			</div>
		</div>
	</div>

	
@endsection