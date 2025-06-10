@extends('layouts.landing')

@section('content')
<div class="container py-5 mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-lg">
                <div class="card-header bg-orange text-white py-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h3 class="mb-0">Book Your Dream Vacation</h3>
                            <p class="mb-0 mt-2">{{ $destination->name }}</p>
                        </div>
                        <div class="col-md-4 text-end">
                            <span class="badge bg-light text-orange fs-6">Starting from ${{ number_format($destination->price, 2) }}</span>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('bookings.store') }}" method="POST">
                        @csrf
                        <input type="hidden" name="destination_id" value="{{ $destination->id }}">

                        <!-- Travel Dates Section -->
                        <div class="booking-section mb-4">
                            <h5 class="section-title mb-3">
                                <i class="bi bi-calendar-check me-2"></i>Travel Dates
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control-plaintext" 
                                               value="{{ \Carbon\Carbon::parse($destination->departure_date)->format('F d, Y') }}" 
                                               readonly>
                                        <label>Departure Date</label>
                                        <input type="hidden" name="check_in" value="{{ $destination->departure_date }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control-plaintext" 
                                               value="{{ \Carbon\Carbon::parse($destination->return_date)->format('F d, Y') }}" 
                                               readonly>
                                        <label>Return Date</label>
                                        <input type="hidden" name="check_out" value="{{ $destination->return_date }}">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Travel Details Section -->
                        <div class="booking-section mb-4">
                            <h5 class="section-title mb-3">
                                <i class="bi bi-people me-2"></i>Travel Details
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <input type="number" class="form-control @error('guests') is-invalid @enderror" 
                                               id="guests" name="guests" 
                                               min="1" max="{{ $destination->max_guests }}" 
                                               value="{{ old('guests', 1) }}" required>
                                        <label for="guests">Number of Guests</label>
                                        <div class="form-text">Maximum {{ $destination->max_guests }} guests allowed</div>
                                        @error('guests')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('transportation') is-invalid @enderror" 
                                                id="transportation" name="transportation" required>
                                            <option value="">Select Transportation</option>
                                            <option value="Bus" {{ old('transportation') == 'Bus' ? 'selected' : '' }}>Bus</option>
                                            <option value="Train" {{ old('transportation') == 'Train' ? 'selected' : '' }}>Train</option>
                                            <option value="Plane" {{ old('transportation') == 'Plane' ? 'selected' : '' }}>Plane</option>
                                        </select>
                                        <label for="transportation">Transportation</label>
                                        @error('transportation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Accommodation Section -->
                        <div class="booking-section mb-4">
                            <h5 class="section-title mb-3">
                                <i class="bi bi-house-door me-2"></i>Accommodation & Meals
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('accommodation') is-invalid @enderror" 
                                                id="accommodation" name="accommodation" required>
                                            <option value="">Select Accommodation</option>
                                            <option value="Hotel" {{ old('accommodation') == 'Hotel' ? 'selected' : '' }}>Hotel</option>
                                            <option value="Resort" {{ old('accommodation') == 'Resort' ? 'selected' : '' }}>Resort</option>
                                            <option value="Villa" {{ old('accommodation') == 'Villa' ? 'selected' : '' }}>Villa</option>
                                        </select>
                                        <label for="accommodation">Accommodation Type</label>
                                        @error('accommodation')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <select class="form-select @error('meals') is-invalid @enderror" 
                                                id="meals" name="meals" required>
                                            <option value="">Select Meal Plan</option>
                                            <option value="Breakfast" {{ old('meals') == 'Breakfast' ? 'selected' : '' }}>Breakfast</option>
                                            <option value="Half Board" {{ old('meals') == 'Half Board' ? 'selected' : '' }}>Half Board</option>
                                            <option value="Full Board" {{ old('meals') == 'Full Board' ? 'selected' : '' }}>Full Board</option>
                                        </select>
                                        <label for="meals">Meal Plan</label>
                                        @error('meals')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Special Requests Section -->
                        <div class="booking-section mb-4">
                            <h5 class="section-title mb-3">
                                <i class="bi bi-chat-square-text me-2"></i>Special Requests
                            </h5>
                            <div class="form-floating">
                                <textarea class="form-control @error('special_requests') is-invalid @enderror" 
                                          id="special_requests" name="special_requests" 
                                          style="height: 100px" 
                                          placeholder="Any special requirements or requests?">{{ old('special_requests') }}</textarea>
                                <label for="special_requests">Special Requests</label>
                                @error('special_requests')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-between align-items-center mt-4">
                            <a href="{{ route('landing-page.index') }}" class="btn btn-outline-orange">
                                <i class="bi bi-arrow-left me-2"></i>Back to Destinations
                            </a>
                            <button type="submit" class="btn btn-orange btn-lg">
                                <i class="bi bi-check-circle me-2"></i>Confirm Booking
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
:root {
    --orange: #F96D00;
    --orange-hover: #e05e00;
}

.bg-orange {
    background-color: var(--orange) !important;
}

.text-orange {
    color: var(--orange) !important;
}

.btn-orange {
    background-color: var(--orange);
    border-color: var(--orange);
    color: white;
}

.btn-orange:hover {
    background-color: var(--orange-hover);
    border-color: var(--orange-hover);
    color: white;
}

.btn-outline-orange {
    color: var(--orange);
    border-color: var(--orange);
}

.btn-outline-orange:hover {
    background-color: var(--orange);
    border-color: var(--orange);
    color: white;
}

.booking-section {
    background-color: #fff;
    border-radius: 10px;
    padding: 20px;
    border: 1px solid #e9ecef;
}

.section-title {
    color: var(--orange);
    font-weight: 600;
    border-bottom: 2px solid #e9ecef;
    padding-bottom: 10px;
}

.form-floating > .form-control,
.form-floating > .form-select {
    height: calc(3.5rem + 2px);
    line-height: 1.25;
}

.form-floating > textarea.form-control {
    height: 100px;
}

.form-floating > label {
    padding: 1rem 0.75rem;
}

.btn-lg {
    padding: 0.75rem 2rem;
}

.form-control:focus,
.form-select:focus {
    border-color: var(--orange);
    box-shadow: 0 0 0 0.25rem rgba(249, 109, 0, 0.25);
}
</style>

@push('script')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkInInput = document.getElementById('check_in');
        const checkOutInput = document.getElementById('check_out');

        checkInInput.addEventListener('change', function() {
            checkOutInput.min = this.value;
            if (checkOutInput.value && checkOutInput.value < this.value) {
                checkOutInput.value = this.value;
            }
        });
    });
</script>
@endpush
@endsection 