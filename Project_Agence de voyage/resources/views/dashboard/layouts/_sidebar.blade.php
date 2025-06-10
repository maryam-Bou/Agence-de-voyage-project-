<!-- ========== Left Sidebar Start ========== -->
<div class="vertical-menu">

    <div data-simplebar class="h-100">

        <!--- Sidemenu -->
        <div id="sidebar-menu">
            <!-- Left Menu Start -->
            <ul class="metismenu list-unstyled" id="side-menu">
                <li class="menu-title" key="t-menu">Menu</li>

                <li>
                    <a href="{{ route('dashboard.index') }}" class="waves-effect">
                        <i class="bx bx-home-circle"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                {{-- <li>
                    <a href="javascript: void(0);" class="has-arrow waves-effect">
                        <i class="bx bx-grid-alt"></i>
                        <span key="t-master">Master Data</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li><a href="#" key="t-tui-location">Data Lokasi</a></li>
                        <li><a href="#" key="t-tui-destination">Data Destinasi</a></li>
                        <li><a href="#" key="t-tui-visitor">Data Pengunjung</a></li>
                    </ul>
                </li> --}}

                <li>
                    <a href="{{ route('locations.index') }}" class="waves-effect">
                        <i class="bx bx-map-pin"></i>
                        <span>Locations</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('destinations.index') }}" class="waves-effect">
                        <i class="bx bx-map"></i>
                        <span>Destinations</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('visitor.index') }}" class="waves-effect">
                        <i class="bx bx-user-circle"></i>
                        <span>Visitors</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.bookings.index') }}" class="waves-effect">
                        <i class="bx bx-calendar"></i>
                        <span>Bookings</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('user-admin.index') }}" class="waves-effect">
                        <i class="bx bx-user"></i>
                        <span>Admin Users</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.messages.index') }}" class="waves-effect">
                        <i class="bx bx-envelope"></i>
                        <span>Messages</span>
                        @php
                            $unreadCount = \App\Models\Message::where('is_read', false)->count();
                        @endphp
                        @if($unreadCount > 0)
                            <span class="badge bg-danger rounded-pill ms-2">{{ $unreadCount }}</span>
                        @endif
                    </a>
                </li>
            </ul>
        </div>
        <!-- Sidebar -->
    </div>
</div>
<!-- Left Sidebar End -->