<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Booking;
use App\Models\User;

class DashboardController extends Controller
{
    public function index() {
        $activeDestinations = Destination::count();
        $totalBookings = Booking::count();
        $totalRevenue = Booking::sum('total_price');
        $averageBooking = $totalBookings > 0 ? $totalRevenue / $totalBookings : 0;
        $recentBookings = Booking::with('user', 'destination')->latest()->take(5)->get();
        $topDestinations = Destination::withCount('bookings')->orderByDesc('bookings_count')->take(5)->get();
        $totalUsers = User::count();
        return view('dashboard.index', compact(
            'activeDestinations', 'totalBookings', 'totalRevenue', 'averageBooking',
            'recentBookings', 'topDestinations', 'totalUsers'
        ));
    }
}
