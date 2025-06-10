@extends('layouts.landing')

@section('content')
<section class="ftco-section" id="destination">
    <div class="container">
        <div class="row justify-content-center pb-4">
            <div class="col-md-12 heading-section text-center ftco-animate">
                <span class="subheading">Destinations</span>
                <h2 class="mb-4">Popular Destinations</h2>
            </div>
        </div>

        <!-- Location Filter -->
        <div class="row mb-4">
            <div class="col-md-6 mx-auto">
                <form action="{{ route('landing-page.destinations') }}" method="GET" class="d-flex gap-2">
                    <select name="location_id" class="form-select" onchange="this.form.submit()">
                        <option value="">All Locations</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}" {{ request('location_id') == $location->id ? 'selected' : '' }}>
                                {{ $location->name }}
                            </option>
                        @endforeach
                    </select>
                    @if(request('location_id'))
                        <a href="{{ route('landing-page.destinations') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-x-lg"></i> Clear Filter
                        </a>
                    @endif
                </form>
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
                                    <img src="{{ asset($destination->image) }}" 
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


@endsection





