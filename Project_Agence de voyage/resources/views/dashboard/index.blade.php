@extends('dashboard.layouts.master')
@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">
                <!-- Page Title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                            <h4 class="mb-sm-0 font-size-18">Travel Agency Dashboard</h4>
                            <div class="page-title-right">
                                <ol class="breadcrumb m-0">
                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                    <li class="breadcrumb-item active">Travel Agency Dashboard</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="row">
                    <div class="col-xl-3 col-md-6">
                        <div class="card card-h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Destinations</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="{{ $activeDestinations }}">{{ $activeDestinations }}</span>
                                        </h4>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-soft-primary rounded-circle">
                                                <i class="bi bi-map font-size-20 text-primary"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card card-h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Bookings</span>
                                        <h4 class="mb-3">
                                            <span class="counter-value" data-target="{{ $totalBookings }}">{{ $totalBookings }}</span>
                                        </h4>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-soft-success rounded-circle">
                                                <i class="bi bi-calendar-check font-size-20 text-success"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card card-h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Total Revenue</span>
                                        <h4 class="mb-3">
                                            $<span class="counter-value" data-target="{{ number_format($totalRevenue, 2) }}">{{ number_format($totalRevenue, 2) }}</span>
                                        </h4>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-soft-info rounded-circle">
                                                <i class="bi bi-currency-dollar font-size-20 text-info"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-3 col-md-6">
                        <div class="card card-h-100">
                            <div class="card-body">
                                <div class="d-flex align-items-center">
                                    <div class="flex-grow-1">
                                        <span class="text-muted mb-3 lh-1 d-block text-truncate">Average Booking</span>
                                        <h4 class="mb-3">
                                            $<span class="counter-value" data-target="{{ number_format($averageBooking, 2) }}">{{ number_format($averageBooking, 2) }}</span>
                                        </h4>
                                    </div>
                                    <div class="flex-shrink-0 text-end">
                                        <div class="avatar-sm">
                                            <span class="avatar-title bg-soft-warning rounded-circle">
                                                <i class="bi bi-graph-up font-size-20 text-warning"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Recent Bookings and Top Destinations -->
                <div class="row">
                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Recent Bookings</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">User</th>
                                                <th scope="col">Destination</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($recentBookings as $booking)
                                            <tr>
                                                <td>{{ $booking->user->name ?? '-' }}</td>
                                                <td>{{ $booking->destination->name ?? '-' }}</td>
                                                <td>{{ $booking->check_in }}</td>
                                                <td>${{ number_format($booking->total_price, 2) }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xl-6">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title mb-0">Top Destinations</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-hover mb-0">
                                        <thead>
                                            <tr>
                                                <th scope="col">Destination</th>
                                                <th scope="col">Bookings</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($topDestinations as $destination)
                                            <tr>
                                                <td>{{ $destination->name }}</td>
                                                <td>
                                                    <span class="badge bg-primary">
                                                        {{ $destination->bookings_count > 0 ? $destination->bookings_count . ' bookings' : 'No bookings' }}
                                                    </span>
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
@endsection
