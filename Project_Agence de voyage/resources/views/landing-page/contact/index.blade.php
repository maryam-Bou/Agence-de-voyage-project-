@extends('layouts.landing')

@section('content')
<div class="contact-section py-5" style="background-color: #fff5eb;">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mb-5">
                <h1 class="display-4 fw-bold text-orange">Contact Us</h1>
                <p class="lead text-muted">We'd love to hear from you. Send us a message and we'll respond as soon as possible.</p>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100 contact-card">
                    <div class="card-body p-4">
                        <h2 class="h3 mb-4 text-orange">Send us a Message</h2>
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('messages.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Your Name</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                                       id="name" name="name" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                                       id="email" name="email" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control @error('subject') is-invalid @enderror" 
                                       id="subject" name="subject" value="{{ old('subject') }}" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="message" class="form-label">Message</label>
                                <textarea class="form-control @error('message') is-invalid @enderror" 
                                          id="message" name="message" rows="5" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-orange">Send Message</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="card border-0 shadow-sm h-100 contact-card">
                    <div class="card-body p-4">
                        <h2 class="h3 mb-4 text-orange">Contact Information</h2>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <i class="bi bi-geo-alt text-orange fs-1"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h3 class="h5">Address</h3>
                                <p class="mb-0">ISTA, Tiznit, MOROCCO</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <i class="bi bi-telephone text-orange fs-1"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h3 class="h5">Phone</h3>
                                <p class="mb-0">+212 775 203000</p>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="flex-shrink-0">
                                <i class="bi bi-envelope text-orange fs-1"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h3 class="h5">Email</h3>
                                <p class="mb-0">travelEase@gmail.com</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <i class="bi bi-clock text-orange fs-1"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h3 class="h5">Business Hours</h3>
                                <p class="mb-0">Monday - Friday: 9:00 AM - 6:00 PM<br>
                                Saturday: 10:00 AM - 4:00 PM<br>
                                Sunday: Closed</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.contact-section {
    background-color: #fff5eb;
}

.text-orange {
    color: #ff6b00 !important;
}

.contact-card {
    transition: transform 0.3s ease;
    border: 1px solid rgba(255, 107, 0, 0.1);
}

.contact-card:hover {
    transform: translateY(-5px);
    border-color: #ff6b00;
}

.btn-orange {
    background-color: #ff6b00;
    border-color: #ff6b00;
    color: white;
    padding: 0.5rem 2rem;
    transition: all 0.3s ease;
}

.btn-orange:hover {
    background-color: #e05e00;
    border-color: #e05e00;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(255, 107, 0, 0.2);
}

.form-control:focus {
    border-color: #ff6b00;
    box-shadow: 0 0 0 0.2rem rgba(255, 107, 0, 0.25);
}

.bi {
    transition: transform 0.3s ease;
}

.contact-card:hover .bi {
    transform: scale(1.1);
}

@media (max-width: 768px) {
    .display-4 {
        font-size: 2.5rem;
    }
    
    .lead {
        font-size: 1.1rem;
    }
}
</style>
@endsection 