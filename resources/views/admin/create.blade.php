@extends('layouts.admin')
@section('title')
	{{Auth::user()->firstname}}
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
        <div class="content">
                <div class="container-fluid">
                    <div class="row">
                            <div class="col-md-12">
                              <div class="card">
                                <div class="card-header card-header-primary">
                                  <h4 class="card-title">All Users</h4>
                                  <button type="button" class="btn bg-blue" data-toggle="modal" data-target="#modalCookie1">Add New User</button>
                                </div>
                                <div class="card-body">
                                        <div class="table-responsive">
                                                <table class="table" id="UsersTable">
                                                  <thead class=" text-primary">
                                                    <tr>
                                                        <th>
                                                      ID
                                                    </th>
                                                    <th>
                                                      Full Name
                                                    </th>
                                                    <th>
                                                      Email
                                                    </th>
                                                    <th>
                                                      Phone
                                                    </th>
                                                    <th>
                                                      Role
                                                    </th>
                                                    <th>
                                                      Status
                                                    </th>
                                                    <th>
                                                      Action
                                                    </th>
                                                  </tr></thead>
                                                  <tbody>
                                                      @php 
                                                        $index = 1;
                                                      @endphp
                                                @foreach($users as $user)
                                                    @if($user->id == Auth::user()->id)
                                                        @continue;
                                                    @endif
                                                    <tr>
                                                      <td>
                                                            {{ $index++ }}
                                                      </td>
                                                      <td>
                                                            {{ $user->first_name }} {{ $user->last_name }}
                                                      </td>
                                                      <td>
                                                            {{ $user->email }}
                                                      </td>
                                                      <td>
                                                            {{ $user->phone }}
                                                      </td>
                                                      <td class="text-primary">
                                                            {{ $user->role }}
                                                      </td>
                                                      <td class="text-primary">
                                                            <label class="badge badge-{{ $user->status == 'active' ? 'success' : 'danger' }}">
                                                                    {{ $user->status }}
                                                            </label>

                                                      </td>
                                                      <td>
                                                          @if($user->status == 'inactive')
                                                            <a href="{{ route('AdminActivate', $user->id) }}" class="btn btn-primary">
                                                             <i class="fa fa-check" aria-hidden="true"></i>
                                                          </a>
                                                          @else
                                                          <a href="{{ route('AdminDeactivate', $user->id) }}" class="btn btn-info">
                                                             <i class="fa fa-times" aria-hidden="true"></i>
                                                          </a>
                                                          @endif
                                                          <a href="{{ route('AdminDelete', $user->id) }}" class="btn btn-danger">
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                             </a>
                                                          
                                                      </td>
                                                    </tr>
                                                @endforeach
                                                  </tbody>
                                                </table>
                                        </div>

                                </div>
                              </div>
                            </div>
                    </div>
                  </div>
                </div>
              </div>
</div>
<div class="modal fade top" id="modalCookie1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="true">
  <div class="modal-dialog modal-frame modal-top modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
        <div class="mt-5 mb-5">
        <form method="POST" action="{{ route('AddNewUser') }}">
            @csrf

            <div class="form-group">
                <div class="col-md-8 offset-md-2">
                <label for="username" class="bmd-label-floating">{{ __('User Name') }}</label>

                    <input id="username" type="text" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" value="{{ old('username') }}" required>

                    @if ($errors->has('username'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('username') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 offset-md-2">
                <label for="first_name" class="bmd-label-floating">{{ __('First Name') }}</label>

                    <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required autofocus>

                    @if ($errors->has('first_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('first_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8 offset-md-2">
                <label for="last_name" class="bmd-label-floating">{{ __('Last Name') }}</label>

                    <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required autofocus>

                    @if ($errors->has('last_name'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('last_name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 offset-md-2">
                <label for="address" class="bmd-label-floating">{{ __('Address') }}</label>

                    <input id="address" type="text" class="form-control{{ $errors->has('address') ? ' is-invalid' : '' }}" name="address" value="{{ old('address') }}" required>

                    @if ($errors->has('address'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('address') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 offset-md-2">
                <label for="phone" class="bmd-label-floating">{{ __('Phone') }}</label>

                    <input id="phone" type="text" class="form-control{{ $errors->has('phone') ? ' is-invalid' : '' }}" name="phone" value="{{ old('phone') }}" required>

                    @if ($errors->has('phone'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 offset-md-2">
                <label for="email" class="bmd-label-floating">{{ __('E-Mail Address') }}</label>

                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 offset-md-2">
                <label for="password" class="bmd-label-floating">{{ __('Password') }}</label>

                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 offset-md-2">
                <label for="password-confirm" class="bmd-label-floating">{{ __('Confirm Password') }}</label>

                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-8 offset-md-2">
                <label for="password-confirm" class="bmd-label-floating">Select Role</label>

                    <select name="role" id="role" class="form-control">
                        <option value="user">User</option>
                        <option value="sp">Service Provider</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-8 offset-md-2">
                <label for="password-confirm" class="bmd-label-floating">Status</label>

                <select name="status" id="status" class="form-control">
                        <option value="active">Active</option>
                        <option value="sp">Inactive</option>
                    </select>
                </div>
            </div>
            <div class="col-md-8 offset-md-2 offset-md-4">

            <div class="form-group mb-0">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Register') }}
                    </button>
                </div>
            </div>
        </form>
    
</div>
</div>
</div>
</div>
<script>
				
</script>
@endsection