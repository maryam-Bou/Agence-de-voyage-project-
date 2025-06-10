@extends('dashboard.layouts.master')

@section('content')
<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Contact Messages</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Date</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Message</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($messages as $message)
                                    <tr class="{{ !$message->is_read ? 'table-warning' : '' }}">
                                        <td>{{ $message->created_at->format('M d, Y H:i') }}</td>
                                        <td>{{ $message->name }}</td>
                                        <td>
                                            <a href="mailto:{{ $message->email }}" class="text-primary">
                                                {{ $message->email }}
                                            </a>
                                        </td>
                                        <td>{{ $message->subject }}</td>
                                        <td>{{ Str::limit($message->message, 50) }}</td>
                                        <td>
                                            @if($message->is_read)
                                                <span class="badge bg-success">Read</span>
                                            @else
                                                <span class="badge bg-warning">Unread</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="d-flex gap-2">
                                                <!-- View Button -->
                                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#messageModal{{ $message->id }}">
                                                    <i class="bi bi-eye me-1"></i> View
                                                </button>

                                                <!-- Mark as Read Button -->
                                                @if(!$message->is_read)
                                                    <form action="{{ route('admin.messages.markAsRead', $message) }}" method="POST" class="d-inline">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info btn-sm">
                                                            <i class="bi bi-check-circle me-1"></i> Mark as Read
                                                        </button>
                                                    </form>
                                                @endif

                                                <!-- Delete Button -->
                                                <form action="{{ route('admin.messages.destroy', $message) }}" method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this message?')">
                                                        <i class="bi bi-trash me-1"></i> Delete
                                                    </button>
                                                </form>
                                            </div>

                                            <!-- Message Modal -->
                                            <div class="modal fade" id="messageModal{{ $message->id }}" tabindex="-1" aria-labelledby="messageModalLabel{{ $message->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="messageModalLabel{{ $message->id }}">Message from {{ $message->name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="mb-3">
                                                                <strong>From:</strong> {{ $message->name }} ({{ $message->email }})
                                                            </div>
                                                            <div class="mb-3">
                                                                <strong>Subject:</strong> {{ $message->subject }}
                                                            </div>
                                                            <div class="mb-3">
                                                                <strong>Date:</strong> {{ $message->created_at->format('F d, Y H:i') }}
                                                            </div>
                                                            <div class="mb-3">
                                                                <strong>Message:</strong>
                                                                <p class="mt-2">{{ $message->message }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="mailto:{{ $message->email }}" class="btn btn-primary">
                                                                <i class="bi bi-reply me-1"></i> Reply
                                                            </a>
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center">No messages found.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $messages->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table > :not(caption) > * > * {
        padding: 1rem;
    }
    .badge {
        padding: 0.5em 0.75em;
    }
    .btn-sm {
        padding: 0.25rem 0.5rem;
    }
    .d-flex.gap-2 {
        gap: 0.5rem !important;
    }
</style>
@endpush 