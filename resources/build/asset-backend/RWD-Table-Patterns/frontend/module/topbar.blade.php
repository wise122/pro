@php
    $logo=asset(Storage::url('logo/'));
    $profile=asset(Storage::url('avatar/'));
    $users=\Auth::user();
@endphp
<div class="topbar">
    <div class="topbar-left">
        <a href="{{ url('/') }}" class="logo">
            <span class="logo-light">
                <img class="img-fluid" src="{{$logo.'/small_logo.png'}} " alt="" width="100">
            </span>
            <span class="logo-sm">
                <img class="img-fluid" src="{{$logo.'/favicon.png'}} " alt="" width="50">
            </span>
        </a>
    </div>

    <nav class="navbar-custom">
        <ul class="navbar-right list-inline float-right mb-0">
            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                    <img src="{{ asset('asset/images/flags/indonesia.png') }}" class="mr-2" height="12" alt=""> Indonesia <span class="mdi mdi-chevron-down"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated language-switch">
                    <a class="dropdown-item" href="#"><img src="{{ asset('asset/images/flags/us_flag.jpg') }}" alt="" height="16"><span> English </span></a>
                </div>
            </li>
            <!-- full screen -->
            <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                    <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                </a>
            </li>
            <li class="dropdown notification-list list-inline-item">
                <div class="dropdown notification-list nav-pro-img">
                    <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                        <img alt="image" src="{{(!empty($users->avatar)? $profile.'/'.$users->avatar : $profile.'/avatar.png')}}" class="rounded-circle mr-1">
                        <div class="d-sm-none d-lg-inline-block">{{__('Hi')}}, {{\Auth::user()->name}}</div>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <a href="{{ route('frontend.index')}}" class="dropdown-item has-icon" target="_blank">
                            <i class="mdi mdi-monitor"></i> Website
                        </a>
                        <a href="{{ route('user.profile')}}" class="dropdown-item has-icon">
                            <i class="mdi mdi-account-circle"></i> My profile
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item text-danger" href="{{ route('backend.logout') }}" content="{{ csrf_token() }}">
                            <i class="mdi mdi-power text-danger"></i> Logout
                        </a>
                    </div>
                </div>
            </li>
        </ul>
        <ul class="list-inline menu-left mb-0">
            <li class="float-left">
                <button class="button-menu-mobile open-left waves-effect">
                    <i class="mdi mdi-menu"></i>
                </button>
            </li>
        </ul>
    </nav>
</div>
