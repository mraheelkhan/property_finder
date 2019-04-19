@extends('layouts.public')
@section('title')
	My Property Listing
@endsection
@section('content')
<style type="text/css">
	/*********************************
7. Listing
*********************************/
.listing_container
{
	padding-bottom: 92px;
	background: #ffffff;
}
.listing_tabs
{
	background: #e9f0f6;
	padding-left: 23px;
	padding-right: 23px;
}
.tab_content
{
	height: 101px;
	cursor: pointer;
	padding-left: 10px;
	padding-right: 10px;
	border-bottom: solid 3px transparent;
	-webkit-transition: all 200ms ease;
	-moz-transition: all 200ms ease;
	-ms-transition: all 200ms ease;
	-o-transition: all 200ms ease;
	transition: all 200ms ease;
}
.tab [type=radio]
{
	position: absolute;
	top: 0;
	left: 0;
	visibility: hidden;
	opacity: 0;
}
.tab [type=radio]:checked ~ .tab_content
{
	border-bottom: solid 3px #adc867;
}
.tab label
{
	position: absolute;
	top: 0;
	left: 0;
	width: 100%;
	height: 100%;
	z-index: 1;
	cursor: pointer;
	margin-bottom: 0;
}
.tab_content span
{
	font-size: 14px;
	font-weight: 700;
	color: #6c7079;
	text-transform: uppercase;
	margin-left: 8px;
	-webkit-transition: all 200ms ease;
	-moz-transition: all 200ms ease;
	-ms-transition: all 200ms ease;
	-o-transition: all 200ms ease;
	transition: all 200ms ease;
}
.tab:hover .tab_content span,
.tab [type=radio]:checked ~ .tab_content span
{
	color: #2b2e35;
}
.tab_icon
{
	width: 30px;
	height: 30px;
}
.tab_icon svg,
.tab_icon img
{
	max-width: 100%;
	max-height: 100%;
}
.svg path, .svg rect, .svg polygon
{
    fill: #b6c9d9;
    -webkit-transition: all 200ms ease;
    -moz-transition: all 200ms ease;
    -ms-transition: all 200ms ease;
    -o-transition: all 200ms ease;
    transition: all 200ms ease;
}
.tab:hover .tab_content .tab_icon .svg path,
.tab [type=radio]:checked ~ .tab_content .tab_icon .svg path,
.tab:hover .tab_content .tab_icon .svg rect,
.tab [type=radio]:checked ~ .tab_content .tab_icon .svg rect,
.tab:hover .tab_content .tab_icon .svg polygon,
.tab [type=radio]:checked ~ .tab_content .tab_icon .svg polygon
{
	fill: #adc867;
}
.about
{
	padding-top: 92px;
}
.tag_price
{
	display: inline-block;
	height: 37px;
	padding-left: 27px;
	padding-right: 26px;
	background: #ff006c;
	line-height: 37px;
	font-size: 16px;
	font-weight: 500;
	color: #ffffff;
}
.listing_name
{
	margin-top: 22px;
}
.listing_location
{
	margin-top: 11px;
	padding-left: 1px;
}
.listing_location img
{
	margin-top: -6px;
}
.listing_location span
{
	font-size: 16px;
	font-weight: 600;
	color: #6c7079;
	margin-left: 25px;
}
.listing_list
{
	margin-top: 35px;
}
.listing_list ul li
{
	font-size: 14px;
	font-weight: 600;
	color: #a2b0bf;
}
.listing_list ul li:not(:last-of-type)
{
	margin-bottom: 9px;
}
.prop_agent
{
	margin-top: 31px;
}
.prop_agent_image
{
	width: 49px;
	height: 49px;
	border-radius: 50%;
	overflow: hidden;
}
.prop_agent_name
{
	margin-left: 15px;
	color: #6c7079;
	font-weight: 600;
}
.prop_agent_name a
{
	font-size: 14px;
	font-weight: 600;
	color: #adc867;
}
.prop_info
{
	padding-top: 24px;
	padding-bottom: 12px;
	margin-top: 6px;
}
.prop_info ul li
{
	margin-bottom: 20px;
}
.prop_info ul li:not(:last-of-type)
{
	margin-right: 40px;
}
.prop_info ul li > div
{
	padding-left: 15px;
}
.prop_info ul li > div > div
{
	font-weight: 600;
	color: #6c7079;
	line-height: 0.75;
}
.prop_info ul li > div > div:first-of-type
{
	font-size: 19.2px;
}
.prop_info ul li > div > div:last-of-type
{
	font-size: 12px;
	margin-top: 9px;
}
.about_text
{
	padding-top: 124px;
}
.listing_features
{
	margin-top: 54px;
}
.listing_title h3
{
	font-weight: 700;
}
.listing_features ul
{
	margin-top: 29px;
}
.listing_features ul li
{
	height: 45px;
	line-height: 45px;
	font-size: 14px;
	font-weight: 600;
	color: #6c7079;
	padding-left: 30px;
}
.listing_features ul li:nth-child(odd)
{
	background: #e9f0f6;
}
.listing_video
{
	margin-top: 54px;
}
.video_container
{
	margin-top: 29px;
}
.video_button
{
	position: absolute;
	top: 50%;
	left: 50%;
	-webkit-transform: translate(-50%, -50%);
	-moz-transform: translate(-50%, -50%);
	-ms-transform: translate(-50%, -50%);
	-o-transform: translate(-50%, -50%);
	transform: translate(-50%, -50%);
	width: 64px;
	height: 64px;
	border-radius: 50%;
	background: #adc867;
	text-align: center;
	-webkit-transition: all 200ms ease;
	-moz-transition: all 200ms ease;
	-ms-transition: all 200ms ease;
	-o-transition: all 200ms ease;
	transition: all 200ms ease;
}
.video_button a
{
	display: block;
	width: 100%;
	height: 100%;
}
.video_button:hover
{
	-webkit-transform: translate(-50%, -50%) scale(1.2);
	-moz-transform: translate(-50%, -50%) scale(1.2);
	-ms-transform: translate(-50%, -50%) scale(1.2);
	-o-transform: translate(-50%, -50%) scale(1.2);
	transform: translate(-50%, -50%) scale(1.2);
}
.video_button a i
{
	color: #FFFFFF;
	font-size: 24px;
	line-height: 64px;
	margin-left: 3px;
}
#colorbox
{
    background-color: #000000;
}
.google_map_container
{
	margin-top: 92px;
}
.map
{
	width: 100%;
}
.google_map
{
	width: 100%;
	height: 524px;
}
.map_container
{
	width: 100%;
	height: 100%;
	overflow: hidden;
}
#map
{
	width: 100%;
	height: calc(100% + 30px);
}


/* comment section custom css code  */

.comment-wrapper .media-list .media img {
    width:64px;
    height:64px;
    border:2px solid #e5e7e8;
}

.comment-wrapper .media-list .media {
    border-bottom:1px dashed #efefef;
    margin-bottom:25px;
}
.comment-wrapper .media-list .media .img-circle{
	border-radius: 50%;
}
.comment-wrapper .media-list .media .media-body{
	margin: 1px 20px;
}
</style>
	

	<!-- Featured: available for Rent -->
	<div class="featured">
		<div class="container">
			<div class="row">
			</div>
			<div class="row featured_row">
			</div>
		</div>
	</div>
	<!-- Listing -->

	<div class="listing_container">
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Image -->
					<div class="listing_image"><img src="{{ asset('images/'.$data->featured_image)  }}" alt=""></div>
					<!-- About -->
					<div class="">
						<div class="row">
							<div class="col-lg-6">
								<div class="property_info">
									<div class="tag_price listing_price" style="position: relative; top:0; left: 0px;">PKR {{$data->price}}</div>
									<div class="listing_name"><h1>{{($data['title'] ? $data['title'] : 'No Title')	}}</h1></div>
									<div class="listing_location d-flex flex-row align-items-start justify-content-start">
										<img src="images/icon_1.png" alt="">
									<span>Address: 	{{$data['house']}}, {{$data['street_name']}} {{$data->area->area_name}}</span>
									</div>
									<div class="listing_list">
										<ul>
											<li>{{($data['contact1']) ? $data['contact1'] : $data->user->phone	}}</li>
											<li>Posted on: {{$data['created_at']}}</li>
											<li>Off plan</li>
										</ul>
									</div>
									<div class="prop_agent d-flex flex-row align-items-center justify-content-start">
										<div class="prop_agent_image"><img src="images/agent_1.jpg" alt=""></div>
										<div class="prop_agent_name"><a href="#">Posted By: {{$data->user->first_name}} {{$data->user->last_name}}</a></div>
									</div>
									<div class="prop_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_2_large.png" alt="">
												<div>
													<div>{{($data['size'] ? $data['size'] : '00')	}}</div>
													<div>sq ft</div>
												</div>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_3_large.png" alt="">
												<div>
													<div>{{($data['bathroom'] ? $data['bathroom'] : 'NAN')	}}</div>
													<div>baths</div>
												</div>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_4_large.png" alt="">
												<div>
													<div>{{($data['bedrooms'] ? $data['bedrooms'] : 'NAN')	}}</div>
													<div>beds</div>
												</div>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_5_large.png" alt="">
												<div>
													<div>{{($data['garages'] ? $data['garages'] : 'NAN')	}}</div>
													<div>garages</div>
												</div>
											</li>
											<li>
												{{($data['description'] ? $data['description'] : 'NAN')	}}
											</li>
										</ul>
									</div>
								</div>
							</div>
							
							<div class="col-lg-12">
								@if(Auth::check() && Auth::user()->id == $data->user_id)
									@can('onlyAdmin')
									<a class="btn btn-danger pull-right" href="{{route('SubmitDelete', $data['id'])}}">
									<i class="fa fa-trash"></i></a>
									@endcan
									@if($data->status == 'active')
									<a href="{{route('SubmitDeactivate', $data->id)}}" class="btn btn-dark" title="Deactivate Now"><i class="fa fa-times-circle"></i></a>
									@else
									<a href="{{route('SubmitActivate', $data->id)}}" class="btn btn-info" title="Activate Now"><i class="fa fa-check-circle"></i></a>
									@endif
								@endif
								<div class="listing_features">
									<div class="listing_title"><h3>Features</h3></div>
									<div class="row">
										<div class="col-lg-12">
											<ul>
												<li>{{($data['bedrooms'] ? $data['bedrooms'] : '00')	}} Bedrooms</li>
												<li>{{($data['kitchens'] ? $data['kitchens'] : '00')	}} Bathrooms</li>
												<li>{{($data['siderooms'] ? $data['siderooms'] : '00')	}} Siderooms	</li>
											</ul>
										</div>
										<div class="col-lg-12">
											<ul>
												<li>{{($data['garages'] ? $data['garages'] : '00')	}} Car garages</li>
												<li>{{($data['kitchens'] ? $data['kitchens'] : '00')	}} Kitchens</li>
												<li>{{($data['floors'] ? $data['floors'] : '00')	}} floors</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>		
					</div>
					
				</div>
			</div>
			<div class="row">
				<div class="col-md-12">
					{{-- comment section code started here  --}}
	<div class="mt-5 mb-5">
		<div class="col-md-8 col-md-offset-2 col-sm-12">
			<div class="comment-wrapper">
				<div class="card card-info">
					<div class="card-header">
						Comment Section
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
					<div class="card-body">
					<form class="" action="{{ route('PostComment') }}" method="post">
						@csrf
						<input type="hidden" name="listing_id" value=" {{ $data['id'] }} "/>
							<textarea name="comment_body" class="form-control" placeholder="write a comment..." rows="3"></textarea>
							<br>
							<button type="submit" class="btn btn-info pull-right">Post</button>
						</form>
						<div class="clearfix"></div>
						<hr>
						<ul class="media-list">
							<small class="mt-2 mb-2">Latest Comments First</></small>
							@foreach($comments as $comment)
							
							<li class="media">
								<a href="#" class="pull-left">
									<img src="https://bootdey.com/img/Content/user_1.jpg" alt="" class="img-circle">
								</a>
								<div class="media-body">
									<span class="text-muted pull-right">
										<small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small>
									</span>
								<strong class="text-success">{{ $comment->user->first_name ." " . $comment->user->last_name }} | {{ "@" . $comment->user->username }}</strong>
									<p>
										{{ $comment->comment_body }}
									</p>
								</div>
							</li>
							@endforeach
							
						</ul>
					</div>
				</div>
			</div>
	
		</div>
	</div>
	{{-- comment section end here --}}
				</div>
			</div>
		</div>
	</div>

	

@endsection