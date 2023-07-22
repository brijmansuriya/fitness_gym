@php
    $routeArray = request()->route()->getAction();
    $controllerAction = class_basename($routeArray['controller']);
    list($controllerName, $actionName) = explode('@', $controllerAction);
   // echo $controllerName."==".$actionName;
@endphp
<div class="side-nav-logo">
    <a href="{{route('dashboard')}}">
        <div class="logo logo-dark" style="background-image: url('/back/images/fitness.png'); background-size:150px 60px;"></div>
        <div class="logo logo-white" style="background-image: url('assets/images/logo/logo-white.png')"></div>
    </a>
    <div class="mobile-toggle side-nav-toggle">
        <a href="">
            <i class="ti-arrow-circle-left"></i>
        </a>
    </div>
</div>

<ul class="side-nav-menu scrollable">
    <li class="nav-item {{ request()->is('dashboard*') ? 'active' : '' }}">
        <a class="mrg-top-30" href="{{route('dashboard')}}">
            <span class="icon-holder">
                <i class="ti-home"></i>
            </span>
            <span class="title">Dashboard</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('users*') ? 'active' : '' }}">
        <a href="{{route('users.index')}}">
            <span class="icon-holder">
                <i class="ti-user"></i>
            </span>
            <span class="title">Users</span>
        </a>
    </li>
	<li class="nav-item {{ request()->is('registrations*') ? 'active' : '' }}">
        <a href="{{route('registrations.index')}}">
            <span class="icon-holder">
                <i class="ti-receipt"></i>
            </span>
            <span class="title">Registrations</span>
        </a>
    </li>
	<li class="nav-item {{ request()->is('payments*') ? 'active' : '' }}">
        <a href="{{route('payments.index')}}">
            <span class="icon-holder">
                <i class="ti-id-badge"></i>
            </span>
            <span class="title">Payment</span>
        </a>
    </li>
	<li class="nav-item {{ request()->is('reports*') ? 'active' : '' }}">
        <a href="{{route('reports.index')}}">
            <span class="icon-holder">
                <i class="ti-layers-alt"></i>
            </span>
            <span class="title">Report</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('expense*') ? 'active' : '' }}">
        <a href="{{route('expense.index')}}">
            <span class="icon-holder">
                <i class="ti-panel"></i>
            </span>
            <span class="title">Expense</span>
        </a>
    </li>
    <li class="nav-item {{ request()->is('nutritions*') ? 'active' : '' }}">
        <a href="{{route('nutritions.index')}}">
            <span class="icon-holder">
                <i class="ti-panel"></i>
            </span>
            <span class="title">Nutritions</span>
        </a>
    </li>
</ul>