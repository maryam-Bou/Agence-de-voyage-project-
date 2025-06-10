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
                            Add Visitor
                        </button>
                    </div>
                    <div class="card">
                        <div class="card-body">

                            <table id="datatable" class="table table-bordered dt-responsive  nowrap w-100">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($visitors as $visitor)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $visitor->name }}</td>
                                            <td>{{ $visitor->email }}</td>
                                            <td>
                                                <button class="btn btn-danger btn-sm" onclick="deleteData('{{ base64_encode($visitor->id) }}')">Delete</button>
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

    <!-- Modal Add -->
    <div class="modal fade" id="addModal" tabindex="-1" aria-labelledby="addModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addModalLabel">Add Visitor</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('visitor.store') }}" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="row">
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" required
                                        placeholder="Enter visitor name" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" required
                                        placeholder="Enter visitor email" />
                                </div>
                            </div>
                            <div class="col-12">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password <sup
                                            style="font-style: italic">(Optional - default: 12345)</sup></label>
                                    <input type="text" class="form-control" id="password" name="password"
                                        placeholder="Enter password" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Create Visitor</button>
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
                title: "Are you sure you want to delete this visitor?",
                showDenyButton: true,
                confirmButtonText: "Delete",
                denyButtonText: "Cancel"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: "{{ route('visitor.destroy', '') }}/" + id,
                        type: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data: {
                            "_token": "{{ csrf_token() }}",
                            "_method": "DELETE"
                        },
                        success: function(res) {
                            Swal.fire({
                                icon: "success",
                                title: "Visitor Deleted Successfully!",
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload()
                                }
                            });
                        },
                        error: function(err) {
                            console.error('Delete error:', err);
                            Swal.fire({
                                icon: "error",
                                title: "Failed to Delete Visitor!",
                                text: err.responseJSON?.message || 'An error occurred while deleting the visitor.'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    location.reload()
                                }
                            });
                        }
                    })
                }
            });
        }
    </script>
@endpush