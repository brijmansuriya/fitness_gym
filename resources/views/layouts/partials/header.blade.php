<div class="header-container">
    <!--<ul class="nav-left">
        <li>
            <a class="side-nav-toggle" href="javascript:void(0);">
                <i class="ti-view-grid"></i>
            </a>
        </li>
        <li class="search-box">
            <a class="search-toggle no-pdd-right" href="javascript:void(0);">
                <i class="search-icon ti-search pdd-right-10"></i>
                <i class="search-icon-close ti-close pdd-right-10"></i>
            </a>
        </li>
    </ul>-->
    <ul class="nav-right">
        <li class="user-profile dropdown" style="margin-right:45px;">
            <a href="" class="dropdown-toggle" data-toggle="dropdown">
                <img class="profile-img img-fluid" src="{{auth()->user()->image_url}}" alt="">
                <div class="user-info">
                    <span class="name pdd-right-5">{!! auth()->user()->name !!}</span>
                    <i class="ti-angle-down font-size-10"></i>
                </div>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="{{ route('profile.index') }}">
                        <i class="ti-user pdd-right-10"></i>
                        <span>Profile</span>
                    </a>
                </li>
                <li role="separator" class="divider"></li>
                <li>
                    <a href="{{route('logout')}}">
                        <i class="ti-power-off pdd-right-10"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </li>

    </ul>
</div>
