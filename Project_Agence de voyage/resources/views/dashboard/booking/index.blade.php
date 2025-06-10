@extends('dashboard.layouts.master')
@section('content')
    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0 font-size-18">{{ $title }}</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                                <li class="breadcrumb-item active">{{ $title }}</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title">Bookings</h4>
                        </div>
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th scope="col">No.</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Check In</th>
                                        <th scope="col">Check Out</th>
                                        <th scope="col">Destination</th>
                                        <th scope="col">Location</th>
                                        <th scope="col">Guests</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($bookings as $booking)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $booking->user->email }}</td>
                                            <td>{{ \Carbon\Carbon::parse($booking->check_in)->isoFormat('ddd, D MMMM Y') }}</td>
                                            <td>{{ \Carbon\Carbon::parse($booking->check_out)->isoFormat('ddd, D MMMM Y') }}</td>
                                            <td>{{ $booking->destination->name }}</td>
                                            <td>{{ $booking->destination->location->name }}</td>
                                            <td>{{ $booking->total_guests }} Guests</td>
                                            <td>{{ format_currency($booking->total_price) }}</td>
                                            <td>
                                                @if ($booking->status == 'pending')
                                                    <span class="badge text-bg-warning">Pending</span>
                                                @elseif ($booking->status == 'approved')
                                                    <span class="badge text-bg-success">Approved</span>
                                                @else
                                                    <span class="badge text-bg-danger">Rejected</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($booking->status == 'pending')
                                                    <button type="button" class="btn btn-warning btn-sm"
                                                        onclick="confirmBooking('{{ $booking->id }}', 'approved')">
                                                        Approve
                                                    </button>
                                                    <button type="button" class="btn btn-danger btn-sm"
                                                        onclick="confirmBooking('{{ $booking->id }}', 'rejected')">
                                                        Reject
                                                    </button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div> <!-- end col -->
            </div> <!-- end row -->
        </div>
        <!-- container-fluid -->
    </div>
    <!-- End Page-content -->
@endsection
@push('script')
    <script>
        function confirmBooking(id, status) {
            const actionText = status === 'approved' ? 'approve' : 'reject';
            
            Swal.fire({
                title: `${actionText.charAt(0).toUpperCase() + actionText.slice(1)} Booking`,
                text: `Are you sure you want to ${actionText} this booking?`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: `${actionText.charAt(0).toUpperCase() + actionText.slice(1)}`
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `{{ route('admin.bookings.confirm') }}`,
                        type: 'POST',
                        data: {
                            _token: '{{ csrf_token() }}',
                            status: status,
                            id: id
                        },
                        success: function(response) {
                            Swal.fire(
                                'Success!',
                                response.message,
                                'success'
                            ).then(() => {
                                window.location.reload();
                            })
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Failed!',
                                xhr.responseJSON.message,
                                'error'
                            ).then(() => {
                                window.location.reload();
                            })
                        }
                    });
                }
            })
        }
    </script>
@endpush
