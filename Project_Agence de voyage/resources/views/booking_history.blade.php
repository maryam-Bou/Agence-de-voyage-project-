@extends('layouts.landing')
@section('content')
    <div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('template/images/bg_4.jpg') }}');">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <span class="subheading">Thank you for booking with TravelEase</span>
                    <h1 class="mb-4">Explore Your Dream Destinations With Us</h1>
                    <p class="caps">Sit back and wait for your travel ticket</p>
                </div>
              
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center pb-4">
                <div class="col-md-12 heading-section text-center ftco-animate">
                    <span class="subheading">Your Booking History</span>
                    <h2 class="mb-4">Destination History</h2>
                </div>
            </div>
            <div class="row">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                            <th scope="col">Destination</th>
                            <th scope="col">Location</th>
                            <th scope="col">Total Guests</th>
                            <th scope="col">Total Price</th>
                            <th scope="col">Confirmation Status</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($bookings as $booking)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ \Carbon\Carbon::parse($booking->check_in)->isoFormat('dddd, D MMMM Y') }}</td>
                                <td>{{ \Carbon\Carbon::parse($booking->check_out)->isoFormat('dddd, D MMMM Y') }}</td>
                                <td>{{ $booking->destination->name }}</td>
                                <td>{{ $booking->destination->location->name }}</td>
                                <td>{{ $booking->total_guests }} Guests</td>
                                <td>DH {{ number_format($booking->total_price, 0, ',', '.') }}</td>
                                <td>
                                    @if ($booking->status == 'pending')
                                        <span class="badge badge-warning">Pending</span>
                                    @elseif ($booking->status == 'approved')
                                        <span class="badge badge-success">Approved</span>
                                    @else
                                        <span class="badge badge-danger">Rejected</span>
                                    @endif
                                </td>
                                <td>
                                    @if ($booking->status == 'pending')
                                        <form action="{{ route('booking.cancel', $booking->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to cancel this booking?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="bi bi-x-circle"></i> Cancel
                                            </button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="9" class="text-center">No data available</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
