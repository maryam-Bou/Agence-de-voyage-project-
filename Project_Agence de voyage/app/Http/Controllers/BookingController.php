<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    public function user_booking(Request $request)
    {
        $auth = Auth::user();

        $validator = Validator::make($request->all(), [
            'id_destinasi_pesan'    => 'required|exists:destinations,id',
            'email'                 => $auth ? 'nullable' : 'required|email|unique:users,email',
            'fullname'              => $auth ? 'nullable' : 'required',
            'check_in'              => 'required',
            'check_out'             => 'required',
            'total_guests'          => 'required|min:0'
        ], [
            'id_destinasi_pesan.required'   => 'Destination must be selected',
            'id_destinasi_pesan.exists'     => 'Destination not found',
            'email.required'                => 'Email is required',
            'email.email'                   => 'Email is not valid',
            'email.unique'                  => 'Email is already registered, please use another email!',
            'fullname.required'             => 'Full name is required',
            'check_in.required'             => 'Check-in date is required',
            'check_out.required'            => 'Check-out date is required',
            'total_guests.required'         => 'Number of guests is required',
            'total_guests.min'              => 'Number of guests must be at least 0'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('error', $validator->errors()->first());
        }

        if (!$auth) {
            $user = User::where('email', $request->email)->first();
            if ($user) {
                return redirect()->back()->with('error', 'Email sudah terdaftar, silahkan gunakan email lain!');
            }

            $create_visitor = User::insertGetId([
                'name'      => $request->fullname,
                'email'     => $request->email,
                'password'  => bcrypt('12345')
            ]);

            Auth::loginUsingId($create_visitor);
        }

        $insert_booking = Booking::insert([
            'user_id'           => $auth->id ?? $create_visitor,
            'destination_id'    => $request->id_destinasi_pesan,
            'check_in'          => $request->check_in,
            'check_out'         => $request->check_out,
            'total_guests'      => $request->total_guests,
            'total_price'       => $request->total_price
        ]);

        if ($insert_booking) {
            return redirect()->back()->with('success', 'Booking successful');
        } else {
            return redirect()->back()->with('error', 'Booking failed');
        }
    }

    public function history() {
        $auth = Auth::user();
        $data['title'] = 'Riwayat Pemesanan';
        $data['bookings'] = Booking::with('destination', 'destination.location')->where('user_id', $auth->id)->orderByDesc('id')->get();

        return view('booking_history', $data);
    }

    public function store(Request $request)
    {
        $auth = Auth::user();

        $validator = Validator::make($request->all(), [
            'destination_id'    => 'required|exists:destinations,id',
            'check_in'         => 'required|date',
            'check_out'        => 'required|date|after:check_in',
            'guests'           => 'required|integer|min:1',
            'transportation'   => 'required|in:Bus,Train,Plane',
            'accommodation'    => 'required|in:Hotel,Resort,Villa',
            'meals'           => 'required|in:Breakfast,Half Board,Full Board',
            'special_requests' => 'nullable|string|max:500'
        ], [
            'destination_id.required'   => 'Destination must be selected',
            'destination_id.exists'     => 'Destination not found',
            'check_in.required'         => 'Departure date is required',
            'check_in.date'             => 'Invalid departure date format',
            'check_out.required'        => 'Return date is required',
            'check_out.date'            => 'Invalid return date format',
            'check_out.after'           => 'Return date must be after departure date',
            'guests.required'           => 'Number of guests is required',
            'guests.integer'            => 'Number of guests must be a whole number',
            'guests.min'                => 'Number of guests must be at least 1',
            'transportation.required'   => 'Transportation type is required',
            'transportation.in'         => 'Invalid transportation type',
            'accommodation.required'    => 'Accommodation type is required',
            'accommodation.in'          => 'Invalid accommodation type',
            'meals.required'           => 'Meal plan is required',
            'meals.in'                 => 'Invalid meal plan',
            'special_requests.max'      => 'Special requests cannot exceed 500 characters'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $destination = \App\Models\Destination::findOrFail($request->destination_id);
        $duration = \Carbon\Carbon::parse($request->check_in)->diffInDays($request->check_out);
        $total_price = $destination->price * $request->guests * $duration;

        $booking = Booking::create([
            'user_id'           => $auth->id,
            'destination_id'    => $request->destination_id,
            'check_in'          => $request->check_in,
            'check_out'         => $request->check_out,
            'total_guests'      => $request->guests,
            'total_price'       => $total_price,
            'transportation'    => $request->transportation,
            'accommodation'     => $request->accommodation,
            'meals'            => $request->meals,
            'special_requests'  => $request->special_requests,
            'status'           => 'pending'
        ]);

        if ($booking) {
            return redirect()->route('booking.history')->with('success', 'Booking successful! We will process your request shortly.');
        } else {
            return redirect()->back()->with('error', 'Booking failed. Please try again.')->withInput();
        }
    }

    public function create($destinationId)
    {
        $destination = \App\Models\Destination::findOrFail($destinationId);
        return view('bookings.create', compact('destination'));
    }

    public function cancel(Booking $booking)
    {
        // Check if the booking belongs to the authenticated user
        if ($booking->user_id !== auth()->id()) {
            return redirect()->back()->with('error', 'You are not authorized to cancel this booking.');
        }

        // Check if the booking is still pending
        if ($booking->status !== 'pending') {
            return redirect()->back()->with('error', 'Only pending bookings can be cancelled.');
        }

        // Delete the booking
        $booking->delete();

        return redirect()->route('booking.history')->with('success', 'Booking cancelled successfully.');
    }
}
