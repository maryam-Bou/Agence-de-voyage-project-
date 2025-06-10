@extends('dashboard.layouts.master')
@section('content')
    <div class="vertical-menu">
        <div data-simplebar class="h-100">
            <div id="sidebar-menu">
                <ul class="metismenu list-unstyled" id="side-menu">
                    <li>
                        <a href="{{ route('dashboard.index') }}" class="waves-effect">
                            <i class="bi bi-house-door"></i>
                            <span>Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('locations.index') }}" class="waves-effect">
                            <i class="bi bi-geo-alt"></i>
                            <span>Locations</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('destinations.index') }}" class="waves-effect">
                            <i class="bi bi-map"></i>
                            <span>Destinations</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('visitor.index') }}" class="waves-effect">
                            <i class="bi bi-people"></i>
                            <span>Visitors</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.bookings.index') }}" class="waves-effect">
                            <i class="bi bi-calendar-check"></i>
                            <span>Bookings</span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('user-admin.index') }}" class="waves-effect">
                            <i class="bi bi-person-badge"></i>
                            <span>Admin Users</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection 