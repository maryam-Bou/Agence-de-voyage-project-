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
                    <div class="d-flex justify-content-end align-items-center pb-3">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">Add Tour Package</button>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Image</th>
                                        <th>Tour Name</th>
                                        <th>Location</th>
                                        <th>Duration</th>
                                        <th>Price</th>
                                        <th>Max Guests</th>
                                        <th>Departure</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($destinations as $destination)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($destination->image != null)
                                                    <img src="{{ asset($destination->image) }}"
                                                        alt="{{ $destination->name }}" class="img-fluid"
                                                        style="max-width: 100px;">
                                                @else
                                                    No image
                                                @endif
                                            </td>
                                            <td>{{ $destination->name }}</td>
                                            <td>{{ $destination->location->name }}</td>
                                            <td>{{ $destination->duration }} days</td>
                                            <td>DH {{ number_format($destination->price, 0, ',', '.') }}</td>
                                            <td>{{ $destination->max_guests }}</td>
                                            <td>{{ \Carbon\Carbon::parse($destination->departure_date)->format('d M Y') }}</td>
                                            <td>
                                                @if($destination->status === 'upcoming')
                                                    <span class="badge bg-success">Upcoming</span>
                                                @else
                                                    <span class="badge bg-danger">Past</span>
                                                @endif
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#viewModal-{{ $destination->id }}">
                                                    View
                                                </button>
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $destination->id }}">
                                                    Edit
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm" onclick="deleteData({{ $destination->id }})">Delete</button>
                                            </td>
                                        </tr>

                                        <!-- View Modal -->
                                        <div class="modal fade" id="viewModal-{{ $destination->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Tour Package Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <img src="{{ asset($destination->image) }}" alt="{{ $destination->name }}" class="img-fluid">
                                                            </div>
                                                            <div class="col-md-6">
                                                                <h4>{{ $destination->name }}</h4>
                                                                <p><strong>Location:</strong> {{ $destination->location->name }}</p>
                                                                <p><strong>Duration:</strong> {{ $destination->duration }} days</p>
                                                                <p><strong>Price:</strong> DH {{ number_format($destination->price, 0, ',', '.') }}</p>
                                                                <p><strong>Max Guests:</strong> {{ $destination->max_guests }}</p>
                                                                <p><strong>Departure:</strong> {{ \Carbon\Carbon::parse($destination->departure_date)->format('d M Y') }}</p>
                                                                <p><strong>Return:</strong> {{ \Carbon\Carbon::parse($destination->return_date)->format('d M Y') }}</p>
                                                                <p><strong>Transportation:</strong> {{ $destination->transportation }}</p>
                                                                <p><strong>Accommodation:</strong> {{ $destination->accommodation }}</p>
                                                                <p><strong>Meals:</strong> {{ $destination->meals }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <h5>Description</h5>
                                                                <p>{{ $destination->description }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <h5>Included Services</h5>
                                                                <p>{{ $destination->included_services }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <h5>Highlights</h5>
                                                                <p>{{ $destination->highlights }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row mt-3">
                                                            <div class="col-12">
                                                                <h5>Itinerary</h5>
                                                                <p>{{ $destination->itinerary }}</p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Edit Modal -->
                                        <div class="modal fade" id="editModal-{{ $destination->id }}" tabindex="-1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Edit Tour Package</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('destinations.update', ['destination' => $destination->id]) }}" method="POST" enctype="multipart/form-data">
                                                        @csrf
                                                        @method('PUT')
                                                        <div class="modal-body">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Tour Name</label>
                                                                        <input type="text" class="form-control" name="name" value="{{ $destination->name }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Location</label>
                                                                        <select class="form-select" name="location_id" required>
                                                                            @foreach($locations as $location)
                                                                                <option value="{{ $location->id }}" {{ $destination->location_id == $location->id ? 'selected' : '' }}>{{ $location->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Duration (days)</label>
                                                                        <input type="number" class="form-control" name="duration" value="{{ $destination->duration }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Price</label>
                                                                        <input type="number" class="form-control" name="price" value="{{ $destination->price }}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Max Guests</label>
                                                                        <input type="number" class="form-control" name="max_guests" value="{{ $destination->max_guests }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Image</label>
                                                                        <input type="file" class="form-control" name="image">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="departure_date">Departure Date</label>
                                                                        <input type="date" class="form-control" id="departure_date" name="departure_date" value="{{ $destination->departure_date }}" min="{{ date('Y-m-d') }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <label for="return_date">Return Date (Calculated)</label>
                                                                        <input type="text" class="form-control" id="return_date" value="{{ \Carbon\Carbon::parse($destination->return_date)->format('d M Y') }}" readonly>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Transportation</label>
                                                                        <input type="text" class="form-control" name="transportation" value="{{ $destination->transportation }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Accommodation</label>
                                                                        <input type="text" class="form-control" name="accommodation" value="{{ $destination->accommodation }}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Meals</label>
                                                                        <input type="text" class="form-control" name="meals" value="{{ $destination->meals }}" required>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Description</label>
                                                                <textarea class="form-control" name="description" rows="3" required>{{ $destination->description }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Included Services</label>
                                                                <textarea class="form-control" name="included_services" rows="3" required>{{ $destination->included_services }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Highlights</label>
                                                                <textarea class="form-control" name="highlights" rows="3" required>{{ $destination->highlights }}</textarea>
                                                            </div>
                                                            <div class="mb-3">
                                                                <label class="form-label">Itinerary</label>
                                                                <textarea class="form-control" name="itinerary" rows="3" required>{{ $destination->itinerary }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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

    <!-- Add Modal -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add Tour Package</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('destinations.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Tour Name</label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Location</label>
                                    <select class="form-select" name="location_id" required>
                                        @foreach($locations as $location)
                                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Duration (days)</label>
                                    <input type="number" class="form-control" name="duration" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Price</label>
                                    <input type="number" class="form-control" name="price" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Max Guests</label>
                                    <input type="number" class="form-control" name="max_guests" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" class="form-control" name="image" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="departure_date">Departure Date</label>
                                    <input type="date" class="form-control" id="departure_date" name="departure_date" min="{{ date('Y-m-d') }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="return_date">Return Date (Calculated)</label>
                                    <input type="text" class="form-control" id="return_date" value="{{ \Carbon\Carbon::parse($destination->return_date)->format('d M Y') }}" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Transportation</label>
                                    <input type="text" class="form-control" name="transportation" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Accommodation</label>
                                    <input type="text" class="form-control" name="accommodation" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label class="form-label">Meals</label>
                                    <input type="text" class="form-control" name="meals" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea class="form-control" name="description" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Included Services</label>
                            <textarea class="form-control" name="included_services" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Highlights</label>
                            <textarea class="form-control" name="highlights" rows="3" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Itinerary</label>
                            <textarea class="form-control" name="itinerary" rows="3" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Tour Package</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('script')
    <script>
        // Add event listener to calculate return date when departure date or duration changes
        document.addEventListener('DOMContentLoaded', function() {
            const departureDateInput = document.getElementById('departure_date');
            const durationInput = document.querySelector('input[name="duration"]');
            const returnDateInput = document.getElementById('return_date');

            function calculateReturnDate() {
                if (departureDateInput.value && durationInput.value) {
                    const departureDate = new Date(departureDateInput.value);
                    const duration = parseInt(durationInput.value);
                    const returnDate = new Date(departureDate);
                    returnDate.setDate(departureDate.getDate() + duration - 1);
                    
                    // Format the date as "dd MMM yyyy"
                    const options = { day: '2-digit', month: 'short', year: 'numeric' };
                    returnDateInput.value = returnDate.toLocaleDateString('en-US', options);
                }
            }

            departureDateInput.addEventListener('change', calculateReturnDate);
            durationInput.addEventListener('change', calculateReturnDate);
        });

        function deleteData(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: `/destinations/${id}`,
                        type: 'DELETE',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success) {
                                Swal.fire(
                                    'Deleted!',
                                    response.message,
                                    'success'
                                ).then(() => {
                                    window.location.reload();
                                });
                            } else {
                                Swal.fire(
                                    'Error!',
                                    response.message,
                                    'error'
                                );
                            }
                        },
                        error: function(xhr) {
                            Swal.fire(
                                'Error!',
                                'Something went wrong while deleting the tour package.',
                                'error'
                            );
                        }
                    });
                }
            });
        }
    </script>
@endpush