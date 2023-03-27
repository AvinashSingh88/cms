<div class="header">
    <div class="header-left">
        <a href="index.html" class="logo">
            BLog
            <!-- <img src="assets/img/hotel_logo.png" alt="logo"> -->
        </a>

    </div>
    <a href="javascript:void(0);" id="toggle_btn"> <i class="fe fe-text-align-left"></i> </a>
    <a class="mobile_btn" id="mobile_btn"> <i class="fas fa-bars"></i> </a>
    <ul class="nav user-menu">
        
        <li class="nav-item dropdown has-arrow">
            <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown"> <span class="user-img"><img class="rounded-circle" src="assets/img/profiles/avatar-01.jpg" width="31" alt="{{session('LoggedUser')->first_name}}"></span> </a>
            <div class="dropdown-menu">
                <div class="user-header">
                    <div class="avatar avatar-sm"> <img src="{{ static_asset('assets/assets_admin/img/profiles/avatar-01.jpg') }}" alt="User Image" class="avatar-img rounded-circle"> </div>
                    <div class="user-text">
                        <h6>{{session('LoggedUser')->first_name}}</h6>
                        <p class="text-muted mb-0">{{session('LoggedUser')->userType}}</p>
                    </div>
                </div> 
                @if(false)
                    <a class="dropdown-item" href="profile.html">My Profile</a> 
                    <a class="dropdown-item" href="settings.html">Account Settings</a> 
                @endif
                <a class="dropdown-item" href="{{ url('admin/logout') }}">Logout</a> </div>
        </li>
    </ul>
</div>
