<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
    <div class="logo">
    <a href="{{url('profile')}}" class="simple-text logo-normal">
        Property Admin Panel
      </a>
    </div>
    <div class="sidebar-wrapper">
      <ul class="nav">
      <li class="nav-item @if(Request::route()->getName() == 'Dashboard') active @endif">
          <a class="nav-link" href="{{route('Dashboard')}}">
            <i class="material-icons">dashboard</i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item @if(Request::route()->getName() == 'ListingList') active @endif">
            <a class="nav-link" href="{{route('ListingList')}}">
                <i class="material-icons">fullscreen</i>
                <p>All Listings</p>
              </a>
            </li>
        <hr>
        <li class="nav-item @if(Request::route()->getName() == 'ListingAreaList') active @endif">
        <a class="nav-link" href="{{route('ListingAreaList')}}">
            <i class="material-icons">train</i>
            <p>Areas</p>
          </a>
        </li>
        <li class="nav-item @if(Request::route()->getName() == 'SectorList') active @endif ">
        <a class="nav-link" href="{{route('SectorList')}}">
            <i class="material-icons">business</i>
            <p>Sectors</p>
          </a>
        </li>
        <li class="nav-item @if(Request::route()->getName() == 'CityList') active @endif ">
        <a class="nav-link" href="{{route('CityList')}}">
            <i class="material-icons">add_location</i>
            <p>Cities</p>
          </a>
        </li>
        <li class="nav-item @if(Request::route()->getName() == 'Profile') active @endif ">
          <a class="nav-link" href="{{route('Profile')}}">
            <i class="material-icons">person</i>
            <p>User Profile</p>
          </a>
        </li>
        <li class="nav-item @if(Request::route()->getName() == 'AdminUsers') active @endif ">
          <a class="nav-link" href="{{route('AdminUsers')}}">
            <i class="material-icons">people</i>
            <p>Manage Users</p>
          </a>
        </li>
      </ul>
    </div>
  </div>