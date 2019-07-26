@extends('layouts.public')
@section('title')
	Home Property Listing
@endsection
@section('content')
	<!-- Home Slider -->
	<div class="home">
		<div class="home_slider_container">
			 <div class="owl-carousel owl-theme home_slider">
				 <!-- Slide -->
				 @foreach($slides as $slide)
			 	<div class="slide">
				 <div class="background_image" style="background-image:url({{asset('images/sliders')}}/{{$slide->slider_name}})"></div>
			 		<div class="home_container">
			 			<div class="container">
			 				<div class="row">
			 					<div class="col">
			 						{{-- <div class="home_content">
			 							<div class="home_title"><h1>Fazle-Haq Road, Street 24, House 18, Islamabad</h1></div>
			 							<div class="home_price_tag">PKR 482 900</div>
			 						</div> --}}
			 					</div>
			 				</div>
			 			</div>
			 		</div>
				 </div>
				 @endforeach
			 	
			 </div>
			 <!-- Home Slider Navigation -->
			 <div class="home_slider_nav"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
			 
		</div>
	</div>

	<!-- Search -->

	<div class="search">
		<div class="container">
			<div class="row">
				<div class="col">
					{{-- <div class="search_container">
						<div class="search_title">Find your home</div>
						<div class="search_form_container">
							<form action="#" class="search_form" id="search_form">
								<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
									<div class="search_inputs d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-start">
										<input type="text" class="search_input" placeholder="Property type" required="required">
										<input type="text" class="search_input" placeholder="No rooms" required="required">
										<input type="text" class="search_input" placeholder="Location" required="required">
									</div>
									<button class="search_button">submit listing</button>
								</div>
							</form>
						</div>
					</div> --}}
				</div>
			</div>
		</div>
	</div>

	<!-- Featured: available for Rent -->
	<div class="featured">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">The best deals</div>
						<div class="section_title"><h1>Latest Properties</h1></div>
					</div>
				</div>
			</div>
			<div class="row featured_row">
				@foreach($listings as $data)
				<div class="col-lg-4">
					<div class="listing">
						<div class="listing_image">
							<a href="{{route('SubmitShow', $data->id)}}">
								<div class="listing_image_container">
									<img src="{{ asset('images/'.$data->featured_image) }}" alt="">
								</div>
							</a>
							<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
								<div class="tag tag_house"><a href="#">house</a></div>
							<div class="tag tag_sale"><a href="#">for {{$data['type']}}</a></div>
							</div>
							<div class="tag_price listing_price">PKR {{number_format($data->price)}} </div>
						</div>
						<div class="listing_content">
								<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
										<i class="fas fa-microphone fa-2x"></i>
										<a href="{{route('SubmitShow', $data->id)}}">{{ucwords($data['title'])}}</a>
									</div>
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								<img src="{{asset('images/icon_1.png')}}" alt="">
								<a href="{{route('SubmitShow', $data->id)}}">{{$data['house']}} {{$data['street_name']}} {{$data->area->area_name}}</a>
							</div>
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								<i class="fas fa-phone-square fa-lg" style="font-size: 2em"></i>
								<a href="{{route('SubmitShow', $data->id)}}">{{($data['contact1'] ? $data['contact1'] : $data->user->phone)	}}</a>
							</div>
							<div class="listing_info">
								<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
									<li class="property_area d-flex flex-row align-items-center justify-content-start">
										<img src="{{asset('images/icon_2.png')}}" alt="">
										<span>{{($data['size'] ? $data['size'] : '00')	}} sq ft </span>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<img src="{{asset('images/icon_3.png')}}" alt="">
										<span>{{($data['bathroom'] ? $data['bathroom'] : 'NAN')	}}</span>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<img src="{{asset('images/icon_4.png')}}" alt="">
										<span>{{($data['kitchens'] ? $data['kitchens'] : '00')	}}</span>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<img src="{{asset('images/icon_5.png')}}" alt="">
										<span>{{($data['bedrooms'] ? $data['bedrooms'] : 'NAN')	}}</span>
									</li>
								</ul>
							</div>
							
						</div>
					</div>
				</div>
				@endforeach
				<!-- Featured Item End -->
				
			</div>
		</div>
	</div>

	
@endsection