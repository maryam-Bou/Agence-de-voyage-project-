@extends('layouts.landing')
@section('content')
    <div class="hero-wrap js-fullheight" style="background-image: url('{{ asset('template/images/bg_5.jpg') }}');">
      
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-center" data-scrollax-parent="true">
                <div class="col-md-7 ftco-animate">
                    <span class="subheading text-orange">Welcome to TravelEase</span>
                    <h1 class="mb-4 text-white">Discover Your Dream Destinations with Us</h1>
                    <p class="caps text-white">Travel anywhere in the world, hassle-free</p>
                </div>
            
            </div>
        </div>
    </div>

    <section class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="ftco-search d-flex justify-content-center">
                        <div class="row">
                            <div class="col-md-12 nav-link-wrap">
                                <div class="nav nav-pills text-center" id="v-pills-tab" role="tablist"
                                    aria-orientation="vertical">
                                    <a class="nav-link active mr-md-1" id="v-pills-1-tab" data-toggle="pill"
                                        href="#v-pills-1" role="tab" aria-controls="v-pills-1" aria-selected="true">Search
                                        Destination</a>
                                </div>
                            </div>
                            <div class="col-md-12 tab-wrap">
                                <div class="tab-content" id="v-pills-tabContent">
                                    <div class="tab-pane fade show active" id="v-pills-1" role="tabpanel"
                                        aria-labelledby="v-pills-nextgen-tab">
                                        <form action="{{ route('landing-page.index') }}#destination" method="GET" class="search-property-1" id="searchForm">
                                            <div class="row no-gutters">
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4 border-0">
                                                        <label for="search">Destination</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-search"></span>
                                                            </div>
                                                            <input type="text" class="form-control" name="search"
                                                                placeholder="Search destination" value="{{ request('search') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="departure_date">Departure Date</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-calendar"></span>
                                                            </div>
                                                            <input type="date" class="form-control" name="departure_date"
                                                                min="{{ date('Y-m-d') }}" value="{{ request('departure_date') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="return_date">Return Date</label>
                                                        <div class="form-field">
                                                            <div class="icon"><span class="fa fa-calendar"></span>
                                                            </div>
                                                            <input type="date" class="form-control" name="return_date"
                                                                min="{{ date('Y-m-d') }}" value="{{ request('return_date') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex">
                                                    <div class="form-group p-4">
                                                        <label for="max_price">Max. Price</label>
                                                        <div class="form-field">
                                                            <div class="select-wrap">
                                                                <div class="icon"><span class="fa fa-chevron-down"></span>
                                                                </div>
                                                                <select name="max_price" id="max_price" class="form-control">
                                                                    <option value="">Any Price</option>
                                                                    <option value="1000" {{ request('max_price') == '1000' ? 'selected' : '' }}>DH 1,000</option>
                                                                    <option value="2000" {{ request('max_price') == '2000' ? 'selected' : '' }}>DH 2,000</option>
                                                                    <option value="3000" {{ request('max_price') == '3000' ? 'selected' : '' }}>DH 3,000</option>
                                                                    <option value="5000" {{ request('max_price') == '5000' ? 'selected' : '' }}>DH 5,000</option>
                                                                    <option value="10000" {{ request('max_price') == '10000' ? 'selected' : '' }}>DH 10,000</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md d-flex">
                                                    <div class="form-group d-flex w-100 border-0">
                                                        <div class="form-field w-100 align-items-center d-flex">
                                                            <input type="submit" value="Search"
                                                                class="align-self-stretch form-control btn btn-orange">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>

    <section class="ftco-section services-section" id="about">
        <div class="container">
            <div class="row d-flex">
                <div class="col-md-6 order-md-last heading-section pl-md-5 ftco-animate d-flex align-items-center">
                    <div class="w-100">
                        <span class="subheading text-orange">Welcome to TravelEase</span>
                        <h2 class="mb-4">Start Your Adventure Today</h2>
                        <p>Experience the world's most beautiful destinations with our expert travel services. We specialize in creating unforgettable travel experiences tailored to your preferences.</p>
                        <p>From exotic beach getaways to cultural city tours, we offer a wide range of travel packages to suit every traveler's needs. Our experienced team ensures your journey is smooth, comfortable, and memorable.</p>
                        <p><a href="{{ route('landing-page.destinations') }}" class="btn btn-orange py-3 px-4">Explore Destinations</a></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-1 d-block img"
                                style="background-image: url('{{ asset('template/images/services-1.jpg') }}');">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-paragliding"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Adventure Tours</h3>
                                    <p>Experience thrilling adventures with our carefully curated tour packages</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-2 d-block img"
                                style="background-image: url('{{ asset('template/images/services-2.jpg') }}');">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-route"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Travel Planning</h3>
                                    <p>Let us handle all your travel arrangements for a stress-free journey</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-3 d-block img"
                                style="background-image: url('{{ asset('template/images/services-3.jpg') }}');">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-tour-guide"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Expert Guides</h3>
                                    <p>Discover hidden gems with our knowledgeable local guides</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6 d-flex align-self-stretch ftco-animate">
                            <div class="services services-1 color-4 d-block img"
                                style="background-image: url('{{ asset('template/images/services-4.jpg') }}');">
                                <div class="icon d-flex align-items-center justify-content-center"><span
                                        class="flaticon-map"></span></div>
                                <div class="media-body">
                                    <h3 class="heading mb-3">Destination Management</h3>
                                    <p>Comprehensive travel services for every destination</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



<section class="ftco-section" id="destination">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading text-orange">Destinations</span>
                <h2 class="mb-4">Popular Destinations</h2>
            </div>
        </div>

        @if ($destinations->count())
            <div class="row row-cols-1 row-cols-md-3 g-4">
                @foreach ($destinations as $destination)
                <div class="col">
                    <div class="project-wrap h-100 d-flex flex-column">
                        <div class="img-container">
                            <div class="destination-image">
                                @if($destination->image)
                                    <img src="{{ $destination->image }}" 
                                         alt="{{ $destination->name }}"
                                         class="img-fluid w-100"
                                         style="height: 250px; object-fit: cover;">
                                @else
                                    <img src="{{ asset('template/images/destination-2.jpg') }}" 
                                         alt="{{ $destination->name }}"
                                         class="img-fluid w-100"
                                         style="height: 250px; object-fit: cover;">
                                @endif
                                <span class="price position-absolute top-0 start-0 m-3 px-3 py-2 fs-5 rounded-pill bg-orange text-white">
                                    DH {{ number_format($destination->price, 0, '.', ',') }}
                                </span>
                                <div class="image-actions position-absolute top-0 end-0 m-3">
                                    <a href="https://www.google.com/search?q={{ urlencode($destination->name . ' tourism') }}"
                                        target="_blank" class="btn btn-info btn-sm opacity-75">
                                        <i class="bi bi-search"></i> More Info
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text p-4 flex-grow-1 d-flex flex-column justify-content-between">
                            <div>
                                <h3><a href="#">{{ $destination->name }}</a></h3>
                                <p class="location mb-2"><span class="bi bi-geo-alt-fill me-1 text-orange"></span>
                                    {{ $destination->location->name }}
                                </p>
                                <p class="mb-3 text-secondary" style="font-size: 0.95rem;">
                                    {{ Str::limit($destination->description, 100) }}
                                </p>

                                <div class="tour-details mb-3">
                                    <div class="row g-2">
                                        <div class="col-6">
                                            <div class="tour-detail-item d-flex align-items-center mb-1">
                                                <i class="bi bi-clock me-2 text-orange"></i>
                                                <span>{{ $destination->duration }} Days</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="tour-detail-item d-flex align-items-center mb-1">
                                                <i class="bi bi-calendar-check me-2 text-orange"></i>
                                                <span>{{ \Carbon\Carbon::parse($destination->departure_date)->format('d M Y') }}</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="tour-detail-item d-flex align-items-center mb-1">
                                                <i class="bi bi-truck me-2 text-orange"></i>
                                                <span>{{ $destination->transportation ?? 'Not Included' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="tour-detail-item d-flex align-items-center mb-1">
                                                <i class="bi bi-house me-2 text-orange"></i>
                                                <span>{{ $destination->accommodation ?? 'Not Included' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="tour-detail-item d-flex align-items-center mb-1">
                                                <i class="bi bi-cup-hot me-2 text-orange"></i>
                                                <span>{{ $destination->meals_plan ?? 'Not Included' }}</span>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="tour-detail-item d-flex align-items-center mb-1">
                                                <i class="bi bi-people me-2 text-orange"></i>
                                                <span>Max {{ $destination->max_guests }} Guests</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="text-center">
                                @auth
                                    <a href="{{ route('bookings.create', $destination->id) }}"
                                        class="btn btn-orange w-75 mt-3 py-2 rounded-pill shadow">
                                        <i class="bi bi-book-fill me-2"></i>Book Now
                                    </a>
                                @else
                                    <a href="{{ route('login', ['redirect' => route('bookings.create', $destination->id)]) }}"
                                        class="btn btn-orange w-75 mt-3 py-2 rounded-pill shadow">
                                        <i class="bi bi-box-arrow-in-right me-2"></i>Login to Book
                                    </a>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <div class="row">
                <div class="col-md-12 text-center">
                    <h3>No destinations available</h3>
                </div>
            </div>
        @endif
    </div>
</section>


    <section class="ftco-intro ftco-section ftco-no-pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <div class="img" style="background-image: url('{{ asset('template/images/bg_2.jpg') }}');">
                        <div class="overlay"></div>
                        <h2>We Are TravelEase Travel Agency</h2>
                        <p>We can help you manage your dream trip. A small river named Duden flows by their place and supplies it with the necessary regelialia.</p>
                        <p class="mb-0"><a href="#" class="btn btn-orange px-4 py-3">Request a Quote</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Pesan (Booking) -->
    <div class="modal fade" id="bookingModal" tabindex="-1" aria-labelledby="bookingModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="bookingModalLabel">Book Destination</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('bookings.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="destination_id" id="destination_id">
                    <div class="modal-body">
                        @guest
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Full Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter your full name" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Enter your email" required>
                                    </div>
                                </div>
                            </div>
                        @endguest
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Departure Date</label>
                                    <p class="form-control-plaintext" id="display_departure_date"></p>
                                    <input type="hidden" name="check_in" id="check_in">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Return Date</label>
                                    <p class="form-control-plaintext" id="display_return_date"></p>
                                    <input type="hidden" name="check_out" id="check_out">
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="guests">Number of Guests</label>
                                    <input type="number" class="form-control" id="guests" name="guests" required
                                        min="1" max="10">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="transportation">Transportation</label>
                                    <select class="form-control" id="transportation" name="transportation" required>
                                        <option value="">Select Transportation</option>
                                        <option value="Bus">Bus</option>
                                        <option value="Train">Train</option>
                                        <option value="Plane">Plane</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="accommodation">Accommodation</label>
                                    <select class="form-control" id="accommodation" name="accommodation" required>
                                        <option value="">Select Accommodation</option>
                                        <option value="Hotel">Hotel</option>
                                        <option value="Resort">Resort</option>
                                        <option value="Villa">Villa</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="meals">Meal Plan</label>
                                    <select class="form-control" id="meals" name="meals" required>
                                        <option value="">Select Meal Plan</option>
                                        <option value="Breakfast">Breakfast</option>
                                        <option value="Half Board">Half Board</option>
                                        <option value="Full Board">Full Board</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="special_requests">Special Requests</label>
                                    <textarea class="form-control" id="special_requests" name="special_requests" rows="3"
                                        placeholder="Any special requirements or requests?"></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-orange">Book Now</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
function openBookingModal(destination) {
    document.getElementById('destination_id').value = destination.id;
    document.getElementById('guests').max = destination.max_guests;
    
    // Format dates for display
    const departureDate = new Date(destination.departure_date);
    const returnDate = new Date(destination.return_date);
    
    // Display formatted dates
    document.getElementById('display_departure_date').textContent = departureDate.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    document.getElementById('display_return_date').textContent = returnDate.toLocaleDateString('en-US', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
    
    // Set hidden input values
    document.getElementById('check_in').value = destination.departure_date;
    document.getElementById('check_out').value = destination.return_date;
    
    $('#bookingModal').modal('show');
}

// Form validation
document.querySelector('#bookingModal form').addEventListener('submit', function(e) {
    const guests = document.getElementById('guests').value;
    const maxGuests = document.getElementById('guests').max;
    const transportation = document.getElementById('transportation').value;
    const accommodation = document.getElementById('accommodation').value;
    const meals = document.getElementById('meals').value;
    
    if (guests < 1 || guests > maxGuests) {
        e.preventDefault();
        alert(`Number of guests must be between 1 and ${maxGuests}`);
        return;
    }
    
    if (!transportation) {
        e.preventDefault();
        alert('Please select a transportation type');
        return;
    }
    
    if (!accommodation) {
        e.preventDefault();
        alert('Please select an accommodation type');
        return;
    }
    
    if (!meals) {
        e.preventDefault();
        alert('Please select a meal plan');
        return;
    }
});

function openImageModal(imageUrl, destinationName) {
    // This function would typically open a larger image in a modal.
    // You can implement a Bootstrap modal here, or use a lightbox library.
    console.log('Opening modal for:', destinationName, 'Image:', imageUrl);
    alert('Imagine a beautiful modal showing ' + destinationName + ' image here!');
}

// Handle scroll to destination section after search
document.addEventListener('DOMContentLoaded', function() {
    // Check if we have search parameters in the URL
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.toString() && window.location.hash === '#destination') {
        // Smooth scroll to the destination section
        document.getElementById('destination').scrollIntoView({ 
            behavior: 'smooth',
            block: 'start'
        });
    }
});
</script>
@endpush

<style>
.text-orange {
    color: #ff6b00 !important;
}

.bg-orange {
    background-color: #ff6b00 !important;
}

.btn-orange {
    background-color: #ff6b00;
    border-color: #ff6b00;
    color: white;
    transition: all 0.3s ease;
}

.btn-orange:hover {
    background-color: #e05e00;
    border-color: #e05e00;
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 4px 8px rgba(255, 107, 0, 0.2);
}

.project-wrap {
    transition: transform 0.3s ease;
    border: 1px solid rgba(255, 107, 0, 0.1);
}

.project-wrap:hover {
    transform: translateY(-5px);
    border-color: #ff6b00;
    box-shadow: 0 4px 15px rgba(255, 107, 0, 0.1);
}

.services {
    transition: transform 0.3s ease;
}

.services:hover {
    transform: translateY(-5px);
}

.form-control:focus {
    border-color: #ff6b00;
    box-shadow: 0 0 0 0.2rem rgba(255, 107, 0, 0.25);
}

.hero-wrap .overlay {
    background: rgba(0, 0, 0, 0.5);
}

.ftco-intro .overlay {
    background: rgba(0, 0, 0, 0.5);
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
