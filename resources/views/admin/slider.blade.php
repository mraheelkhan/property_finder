@extends('layouts.admin')
@section('title')
	Property Admin Panel
@endsection
@section('content')
<div class="col-md-12">
@if(Session::has('message'))
	<p class="alert alert-success">{!! Session::get('message') !!}</p>
@endif
@if (count($errors) > 0)
<div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
			</div>
@endif
</div>

<div class="col-md-12">
	<div class="card">
		<div class="card-header card-header-primary">
		<h4 class="card-title ">Add New Slide</h4>
		{{-- <p class="card-category"> Here is a subtitle for this table</p> --}}
		</div>
		<div class="card-body">
		<div class="">
		<form action="{{ route('SliderUpdate') }}" enctype="multipart/form-data" method="post">
			<div class="row">
				@csrf
				<div class="col-md-6">
                    <label class="">Slider Image Upload</label>
                    <input type="file" id="slider_image" name="slider_image" accept="image/png, image/jpeg">
					
					{{-- <div class="form-group">
                    <input type="file" id="slider_image" name="slider_image" accept="image/png, image/jpeg">
					</div> --}}
				</div>
				<div class="col-md-6">
					<div class="form-group">
					<select name="status" class="form-control" id="status">
						<option value="active" selected>Active</option>
						<option value="inactive">Deactivate</option>
					</select>
					</div>
				</div>
				<div class="col-md-12">
					<div class="form-group">
					<input type="submit" class="btn btn-primary pull-right" id="ajaxSubmit"/>
					</div>
				</div>
			</form>
			</div>
		</div>
		</div>
	</div>
</div>

<div class="col-md-12 mt-5">
		<div class="card">
		  <div class="card-header card-header-primary">
			<h4 class="card-title ">Slides List</h4>
			<p class="card-category"> </p>
		  </div>
		  <div class="card-body">
			<div class="table-responsive">
			  <table class="table">
				<thead class=" text-primary">
				 
				  <th>
					Picture
				  </th>
				  <th>
					Status
				  </th>
				  <th>
					Action
				  </th>
				</thead>
				<tbody>
                @foreach($slides as $city)
				  <tr>
					<td>
                    <img src="{{ asset('/images/sliders')}}/{{$city->slider_name}}" style="width:50%" />
					</td>
					<td>
						@if($city->status == "active")
							<label class="badge badge-success">{{$city->status}}</label>
						@else 
							<label class="badge badge-danger">{{$city->status}}</label>
						@endif
							
					</td>
					<td class="text-primary">
						<a href="{{route('SlideDelete', $city->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
						@if($city->status == 'active')
						<a href="{{route('SlideDeactivate', $city->id)}}" class="btn btn-dark" title="Deactivate Now"><i class="fa fa-times-circle"></i></a>
						@else
						<a href="{{route('SlideActivate', $city->id)}}" class="btn btn-info" title="Activate Now"><i class="fa fa-check-circle"></i></a>
						@endif
					</td>
				  </tr>
                @endforeach
				  
				</tbody>
			  </table>
			</div>
		  </div>
		</div>
	  </div>
<script>
				
</script>
@endsection