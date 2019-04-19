@extends('layouts.public')
@section('title')
	{{Auth::user()->firstname}}
@endsection
@section('content')
<style>


/* The switch - the box around the slider */
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

/* Hide default HTML checkbox */
.switch input {display:none;}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input.default:checked + .slider {
  background-color: #444;
}
input.primary:checked + .slider {
  background-color: #2196F3;
}
input.success:checked + .slider {
  background-color: #8bc34a;
}
input.info:checked + .slider {
  background-color: #3de0f5;
}
input.warning:checked + .slider {
  background-color: #FFC107;
}
input.danger:checked + .slider {
  background-color: #f44336;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
.checkbox{background-color:#fff;display:inline-block;height:28px;width:28px;border-radius:4px;border:1px solid #ccc;}
  .checkbox span{display:block;height:28px;position:relative;width:28px;padding:0}
  .checkbox span:after{-moz-transform:scaleX(-1) rotate(135deg);-ms-transform:scaleX(-1) rotate(135deg);-webkit-transform:scaleX(-1) rotate(135deg);transform:scaleX(-1) rotate(135deg);-moz-transform-origin:left top;-ms-transform-origin:left top;-webkit-transform-origin:left top;transform-origin:left top;border-right:4px solid #fff;border-top:4px solid #fff;content:'';display:block;height:20px;left:3px;position:absolute;top:15px;width:10px}
  .checkbox span:hover:after{border-color:#999}
  .checkbox input{display:none}
  .checkbox input:checked + span:after{-webkit-animation:check .8s;-moz-animation:check .8s;-o-animation:check .8s;animation:check .8s;border-color:#555}
.checkbox input:checked + .primary:after{border-color:#2196F3}
</style>
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
<div class="container">
<div class="row">
<div class="col-md-12 mt-5">
        <div class="content mt-5">
                      <div class="card">
                        <div class="card-header card-header-primary">
                          <h4 class="card-title">Edit Profile</h4>
                          
                        </div>
                        <div class="card-body">
                          <form action="{{route('ProfileUpdate')}}" method="post">
                              @csrf
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Username</label>
                                <input type="text" name="" value="{{$user->username}}" class="form-control" >
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Email address</label>
                                  <input type="email" value="{{$user->email}}" name=""  class="form-control">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Fist Name</label>
                                  <input type="text" name="first_name" class="form-control" value="{{$user->first_name}}">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Last Name</label>
                                  <input type="text" name="last_name" class="form-control" value="{{$user->last_name}}">
                                </div>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-8">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Address</label>
                                  <input type="text" name="address" class="form-control" value="{{$user->address}}">
                                </div>
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label class="bmd-label-floating">Phone</label>
                                  <input type="text" name="phone" class="form-control" value="{{$user->phone}}"/>
                                  </div>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-primary pull-right">Update Profile</button>
                            <div class="clearfix"></div>
                          </form>
                        </div>
                      </div>
                    </div>
                   
                  </div>
                </div>
               
                    
        @if($data)
        <div class="col-md-12 mt-5">
            <div class="card">
                    <div class="card-header card-header-primary">
                      <h4 class="card-title text-center">Select Your Services</h4>
                      
                    </div>
            
            <div class="card-body">
                <table class="table table-striped">
                    <tr>

                        <td>#</td>
                        <td>Service Name</td>
                        <td>Action</td>

                    </tr>
                    <tr>
                        <td>1</td>
                        <td> Electrical Systems</td>
                        <td>
                            <label class="switch ">
                                <input type="checkbox" {{ $data->electrical_systems == 1 ? 'checked' : ''}} class="primary" id="electrical_system" data-value="{{ $data->electrical_systems }}">
                                <span class="slider round" onclick="clicked_electrical_system()"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td> Concrete </td>
                        <td>
                            <label class="switch ">
                                <input type="checkbox" id="concrete"  onclick="clicked_concrete()" data-service="2"  data-value="{{ $data->concrete }}" {{ $data->concrete == 1 ? 'checked' : ''}} class="primary">
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td> Steel Frames </td>
                        <td>
                            <label class="switch ">
                                <input type="checkbox" id="steel_frames" onclick="clicked_steel_frames()" data-service="3"  data-value="{{ $data->steel_frames }}" {{ $data->steel_frames == 1 ? 'checked' : ''}} class="primary">
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td> Ceiling </td>
                        <td>
                            <label class="switch">
                                <input type="checkbox" id="ceiling" onclick="clicked_ceiling()" data-service="4"  data-value="{{ $data->ceiling }}" {{ $data->ceiling == 1 ? 'checked' : ''}} class="primary">
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td> Masonsry </td>
                        <td>
                            <label class="switch ">
                                <input type="checkbox" id="masonry" onclick="clicked_masonry()" data-service="5"  data-value="{{ $data->masonry }}" {{ $data->masonry == 1 ? 'checked' : ''}} class="primary">
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td> Plumbing </td>
                        <td>
                            <label class="switch ">
                                <input type="checkbox" id="plumbing" onclick="clicked_plumbing()" data-service="6"  data-value="{{ $data->plumbing }}" {{ $data->plumbing == 1 ? 'checked' : ''}} class="primary">
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td> Windows </td>
                        <td>
                            <label class="switch ">
                                <input type="checkbox" id="window" onclick="clicked_window()" data-service="7"  data-value="{{ $data->windows }}"  {{ $data->windows == 1 ? 'checked' : ''}}  class="primary">
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td> Labours </td>
                        <td>
                            <label class="switch ">
                                <input type="checkbox" id="labour" onclick="clicked_labour()" data-service="8"  data-value="{{ $data->labours }}" {{ $data->labour   == 1 ? 'checked' : ''}} class="primary">
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                    <tr>
                        <td>9</td>
                        <td> Transport </td>
                        <td>
                            <label class="switch ">
                            <input type="checkbox" id="transport" onclick="clicked_transport()" data-service="9"  data-value="{{ $data->transport }}" {{ $data->transport == 1 ? 'checked' : ''}} class="primary">
                                <span class="slider round"></span>
                            </label>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-footer">

            </div>
        </div>
              </div>
            @endif
</div>



@if($data)
<script>

    function update_service_ajax(service_id, value){
        service_provider_id = {{ $data->id }};
        route_url = " {{ url('/service/update') }}/"+ service_provider_id + "/" + service_id + "/" + value + "";
        $.ajax({
            url: route_url,
            method: "GET",
            success:
            function(data)
            { 
                swal('success', 'Service Status Updated', "success");      
            }
        });
    }
	function clicked_electrical_system(){
        var value = $('#electrical_system').attr('data-value');
        if( value == 0){
            $('#electrical_system').attr('data-value', 1);
            value = $('#electrical_system').attr('data-value');
        } else{
            $('#electrical_system').attr('data-value', 0);
            value = $('#electrical_system').attr('data-value');
        }
        service_id = 1;
        this.update_service_ajax(service_id, value);
    }
    

	function clicked_concrete(){
        var value = $('#concrete').attr('data-value');
        var service_id = $('#concrete').attr('data-service');
        if( value == 0){
            $('#concrete').attr('data-value', 1);
            value = $('#concrete').attr('data-value');
        } else{
            $('#concrete').attr('data-value', 0);
            value = $('#concrete').attr('data-value');
        }
        this.update_service_ajax(service_id, value);
    }

	function clicked_steel_frames(){
        var value = $('#steel_frames').attr('data-value');
        var service_id = $('#steel_frames').attr('data-service');
        if( value == 0){
            $('#steel_frames').attr('data-value', 1);
            value = $('#steel_frames').attr('data-value');
        } else{
            $('#steel_frames').attr('data-value', 0);
            value = $('#steel_frames').attr('data-value');
        }
        this.update_service_ajax(service_id, value);
    }
	function clicked_ceiling(){
        var value = $('#ceiling').attr('data-value');
        var service_id = $('#ceiling').attr('data-service');
        if( value == 0){
            $('#ceiling').attr('data-value', 1);
            value = $('#ceiling').attr('data-value');
        } else{
            $('#ceiling').attr('data-value', 0);
            value = $('#ceiling').attr('data-value');
        }
        this.update_service_ajax(service_id, value);
    }
	function clicked_masonry(){
        var value = $('#masonry').attr('data-value');
        var service_id = $('#masonry').attr('data-service');
        if( value == 0){
            $('#masonry').attr('data-value', 1);
            value = $('#masonry').attr('data-value');
        } else{
            $('#masonry').attr('data-value', 0);
            value = $('#masonry').attr('data-value');
        }
        this.update_service_ajax(service_id, value);
    }
	function clicked_plumbing(){
        var value = $('#plumbing').attr('data-value');
        var service_id = $('#plumbing').attr('data-service');
        if( value == 0){
            $('#plumbing').attr('data-value', 1);
            value = $('#plumbing').attr('data-value');
        } else{
            $('#plumbing').attr('data-value', 0);
            value = $('#plumbing').attr('data-value');
        }
        this.update_service_ajax(service_id, value);
    }
	function clicked_window(){
        var value = $('#window').attr('data-value');
        var service_id = $('#window').attr('data-service');
        if( value == 0){
            $('#window').attr('data-value', 1);
            value = $('#window').attr('data-value');
        } else{
            $('#window').attr('data-value', 0);
            value = $('#window').attr('data-value');
        }
        this.update_service_ajax(service_id, value);
    }
	function clicked_labour(){
        var value = $('#labour').attr('data-value');
        var service_id = $('#labour').attr('data-service');
        if( value == 0){
            $('#labour').attr('data-value', 1);
            value = $('#labour').attr('data-value');
        } else{
            $('#labour').attr('data-value', 0);
            value = $('#labour').attr('data-value');
        }
        this.update_service_ajax(service_id, value);
    }
	function clicked_transport(){
        var value = $('#transport').attr('data-value');
        var service_id = $('#transport').attr('data-service');
        if( value == 0){
            $('#transport').attr('data-value', 1);
            value = $('#transport').attr('data-value');
        } else{
            $('#transport').attr('data-value', 0);
            value = $('#transport').attr('data-value');
        }
        this.update_service_ajax(service_id, value);
    }


</script>
@endif
@endsection