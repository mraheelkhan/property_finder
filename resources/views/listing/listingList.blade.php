@extends('layouts.admin')
@section('title')
	Home Property Listing
@endsection
@section('content')

	
	<div class="col-md-12 mt-5">
			<div class="card">
			  <div class="card-header card-header-primary">
				<h4 class="card-title ">Listings List</h4>
				<p class="card-category"> </p>
			  </div>
			  <div class="card-body">
				<div class="table-responsive">
				  <table class="table">
					<thead class=" text-primary">
					 
					  <th>
						List Name
					  </th>
					  <th>
						Address
					  </th>
					  <th>
						Posted By
					  </th>
					  <th>
						Status
					  </th>
					  <th>
						Action
					  </th>
					</thead>
				<tbody>
						@foreach($lists as $list)
					  <tr>
						<td>
							{{$list->title}}
						</td>
						<td>
							{{$list->house}} {{$list->area->area_name}} {{$list->sector_id}} {{$list->city_id}}
						</td>
						<td>
							{{$list->user->first_name}} {{$list->user->last_name	}}
						</td>
						<td>
							@if($list->status == "active")
								<label class="badge badge-success">{{$list->status}}</label>
							@else 
								<label class="badge badge-danger">{{$list->status}}</label>
							@endif
								
						</td>
						<td class="text-primary">
							<a href="{{route('SubmitDelete', $list->id)}}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
							@if($list->status == 'active')
								<a href="{{route('SubmitDeactivate', $list->id)}}" class="btn btn-dark" title="Deactivate Now"><i class="fa fa-times-circle"></i></a>
								@else
								<a href="{{route('SubmitActivate', $list->id)}}" class="btn btn-info" title="Activate Now"><i class="fa fa-check-circle"></i></a>
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
@endsection