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
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
                            Add Location
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Image</th>
                                        <th>Location</th>
                                        <th>Description</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($locations as $location)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>
                                                @if ($location->image != null)
                                                    <img src="{{ $location->image }}" alt="{{ $location->name }}"
                                                        class="img-fluid" style="max-width: 100px;">
                                                @else
                                                    No image
                                                @endif
                                            </td>
                                            <td>{{ $location->name }}</td>
                                            <td>{{ $location->description ?? '-' }}</td>
                                            <td>
                                                <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                                    data-bs-target="#editModal-{{ $location->id }}">
                                                    Edit
                                                </button>
                                                <button class="btn btn-danger btn-sm"
                                                    onclick="deleteData('{{ base64_encode($location->id) }}')">Delete</button>
                                            </td>
                                        </tr>

                                        <!-- Modal Edit -->
                                        <div class="modal fade" id="editModal-{{ $location->id }}" tabindex="-1"
                                            aria-labelledby="editModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="editModalLabel">Edit Location</h1>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form
                                                        action="{{ route('locations.update', base64_encode($location->id)) }}"
                                                        method="post" enctype="multipart/form-data">
                                                        <div class="modal-body">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="location"
                                                                            class="form-label">Location</label>
                                                                        <input type="text" class="form-control"
                                                                            id="location" name="location" required
                                                                            placeholder="Enter location name"
                                                                            value="{{ $location->name }}" />
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    <div class="mb-3">
                                                                        <label for="description"
                                                                            class="form-label">Description <sup
                                                                                style="font-style: italic">(Optional)</sup></label>
                                                                        <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description">{{ $location->description }}</textarea>
                                                                    </div>
                                                                </div>
                                                                <div class="col-12">
                                                                    @if ($location->image)
                                                                        <div class="pb-2">
                                                                            <img src="{{ $location->image }}"
                                                                                alt="{{ $location->name }}"
                                                                                style="width: 100px;">
                                                                        </div>
                                                                    @endif
                                                                    <div class="mb-3">
                                                                        <label for="image" class="form-label">Image
                                                                            <sup
                                                                                style="font-style: italic">(Optional)</sup></label>
                                                                        <input class="form-control" type="file"
                                                                            id="image" name="image" />
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
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

    <!-- Modal Add -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Location</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('locations.store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="location" class="form-label">Location</label>
                                    <input type="text" class="form-control" id="location" name="location" required
                                        placeholder="Enter location name" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="description" class="form-label">Description <sup
                                            style="font-style: italic">(Optional)</sup></label>
                                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description"></textarea>
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image <sup
                                            style="font-style: italic">(Optional)</sup></label>
                                    <input class="form-control" type="file" id="image" name="image" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        function deleteData(id) {
            Swal.fire({
                icon: "question",
                title: "Are you sure you want to delete this location?",
                showDenyButton: true,
                confirmButtonText: "Delete",
                denyButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ url('locations/delete/') }}" + '/' + id,
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        success: function(res) {
                            Swal.fire({
                                icon: "success",
                                title: "Location Deleted Successfully!",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload()
                                }
                            });
                        },
                        error: function(err) {
                            console.error('Delete error:', err);
                            let errorMessage = 'An error occurred while deleting the location.';
                            if (err.responseJSON && err.responseJSON.message) {
                                errorMessage = err.responseJSON.message;
                            }
                            Swal.fire({
                                icon: "error",
                                title: "Failed to Delete Location!",
                                text: errorMessage
                            });
                        }
                    })
                }
            });
        }
    </script>
@endpush
