<?php

namespace Database\Seeders;

use App\Models\Booking;
use App\Models\User;
use App\Models\Destination;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class BookingSeeder extends Seeder
{
    public function run(): void
    {
        // Get some users and destinations for the bookings
        $users = User::take(3)->get();
        $destinations = Destination::take(3)->get();

        if ($users->isEmpty() || $destinations->isEmpty()) {
            return;
        }

        $bookings = [
            [
                'user_id' => $users[0]->id,
                'destination_id' => $destinations[0]->id,
                'check_in' => Carbon::now()->addDays(10),
                'check_out' => Carbon::now()->addDays(17),
                'total_guests' => 2,
                'total_price' => 1500,
                'transportation' => 'Plane',
                'accommodation' => 'Hotel',
                'meals' => 'Full Board',
                'special_requests' => 'Window seat preferred',
                'status' => 'pending',
            ],
            [
                'user_id' => $users[1]->id,
                'destination_id' => $destinations[1]->id,
                'check_in' => Carbon::now()->addDays(15),
                'check_out' => Carbon::now()->addDays(22),
                'total_guests' => 4,
                'total_price' => 2800,
                'transportation' => 'Train',
                'accommodation' => 'Resort',
                'meals' => 'Half Board',
                'special_requests' => 'Family room required',
                'status' => 'approved',
            ],
            [
                'user_id' => $users[2]->id,
                'destination_id' => $destinations[2]->id,
                'check_in' => Carbon::now()->addDays(20),
                'check_out' => Carbon::now()->addDays(27),
                'total_guests' => 3,
                'total_price' => 2100,
                'transportation' => 'Bus',
                'accommodation' => 'Villa',
                'meals' => 'Breakfast',
                'special_requests' => 'Vegetarian meals required',
                'status' => 'rejected',
            ],
        ];

        foreach ($bookings as $booking) {
            Booking::create($booking);
        }
    }
} 