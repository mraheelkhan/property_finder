@extends('layouts.public')
@section('title')
	My Property Listing
@endsection
@section('content')
	<!-- Home Slider -->
	<div class="">
		<div class="">
			 
			 	<!-- Slide -->
			 	<div class="background_image" style="height:300px;!important;background-image:url({{asset('images/index.jpg')}})"></div>
			 	<div class="">
			 		<div class="">
			 			<div class="container">
			 				<div class="row">
			 					<div class="col">
			 						<div class="home_content" style="margin-top:100px;">
			 							<div class="home_price_tag"></div>
			 							<div class="home_title"><h1>My Listings</h1></div>
			 						</div>
			 					</div>
			 				</div>
			 			</div>
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
						{{-- <div class="section_subtitle">The best deals</div>
						<div class="section_title"><h1>Featured Properties</h1></div> --}}
						@if(Session::has('message'))
							<p class="alert alert-success">{!! Session::get('message') !!}</p>
						@endif
					</div>
				</div>
			</div>
			<div class="row featured_row">
				
				<!-- Featured Item -->
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
								<div class="tag tag_sale"><a href="#">for sale</a></div>
							</div>
							<div class="tag_price listing_price">PKR {{number_format($data->price)}}</div>
						</div>
						<div class="listing_content">
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								<i class="fas fa-microphone fa-2x"></i>
								<a href="{{route('SubmitShow', $data->id)}}">{{$data['title']}}</a>
							</div>
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								<img src="{{asset('images/icon_1.png')}}" alt="">
								<a href="{{route('SubmitShow', $data->id)}}">{{$data['house']}} {{$data['street_name']}} {{$data->area->area_name}}</a>
							</div>
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								<i class="fas fa-phone-square fa-lg" style="font-size: 2em"></i>
								<a href="{{route('SubmitShow', $data->id)}}">{{($data['contact1'] ? $data['contact1'] : Auth::user()->phone)	}}</a>
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
							<div class="listing_info">
								<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
									<li class="d-flex flex-row align-items-center justify-content-start">
										@can('onlyAdmin')
										<a class="btn btn-danger pull-right" href="{{route('SubmitDelete', $data['id'])}}">
										<i class="fa fa-trash"></i></a>
										@endcan
										@if($data->status == 'active')
										<a href="{{route('SubmitDeactivate', $data->id)}}" class="btn btn-dark" title="Deactivate Now"><i class="fa fa-times-circle"></i></a>
										@else
										<a href="{{route('SubmitActivate', $data->id)}}" class="btn btn-info" title="Activate Now"><i class="fa fa-check-circle"></i></a>
										@endif
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</div>


	
@endsection