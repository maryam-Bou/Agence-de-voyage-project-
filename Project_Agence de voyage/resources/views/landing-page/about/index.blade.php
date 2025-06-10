@extends('layouts.landing')

@section('content')
<div class="about-section">
    <div class="container">
        <!-- Hero Section -->
        <div class="row mb-5">
            <div class="col-12 text-center">
                <span class="subheading text-orange">About Our Travel Agency</span>
                <h1 class="mb-4">Your Trusted Travel Partner</h1>
                <p class="lead text-muted">Discover the world with us - Your trusted travel partner since 2010</p>
            </div>
        </div>

        <!-- Story Section -->
        <div class="row mb-5 align-items-center">
            <div class="col-lg-6">
                <img src="https://images.unsplash.com/photo-1527631746610-bca00a040d60?w=800&h=600&fit=crop" 
                     alt="Our Story" 
                     class="img-fluid rounded-4 shadow">
            </div>
            <div class="col-lg-6">
                <div class="story-content p-4">
                    <h2 class="h3 mb-4 fw-bold">Our Story</h2>
                    <p class="text-muted mb-4">
                        Founded in 2010, our travel agency has been dedicated to creating unforgettable travel experiences. 
                        We started with a simple mission: to make travel accessible, enjoyable, and memorable for everyone.
                    </p>
                    <p class="text-muted">
                        Over the years, we've grown from a small local agency to a trusted name in travel, 
                        serving thousands of satisfied customers worldwide. Our journey has been marked by 
                        continuous innovation and a commitment to excellence in travel services.
                    </p>
                </div>
            </div>
        </div>

        <!-- Mission Section -->
        <div class="row mb-5">
            <div class="col-12 text-center mb-4">
                <span class="subheading text-orange">Our Mission</span>
                <h2 class="mb-4">What We Stand For</h2>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-wrapper mb-4">
                            <i class="bi bi-globe2 text-orange display-4"></i>
                        </div>
                        <h3 class="h5 mb-3 fw-bold">Global Reach</h3>
                        <p class="text-muted mb-0">
                            Connecting travelers with destinations worldwide through our extensive network of partners.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-wrapper mb-4">
                            <i class="bi bi-heart-fill text-orange display-4"></i>
                        </div>
                        <h3 class="h5 mb-3 fw-bold">Customer First</h3>
                        <p class="text-muted mb-0">
                            Putting our customers' needs first and ensuring their complete satisfaction.
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <div class="icon-wrapper mb-4">
                            <i class="bi bi-star-fill text-orange display-4"></i>
                        </div>
                        <h3 class="h5 mb-3 fw-bold">Quality Service</h3>
                        <p class="text-muted mb-0">
                            Delivering exceptional service and memorable travel experiences.
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Why Choose Us Section -->
        <div class="row mb-5">
            <div class="col-12 text-center mb-4">
                <span class="subheading text-orange">Why Choose Us</span>
                <h2 class="mb-4">What Makes Us Different</h2>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-box text-center p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="bi bi-shield-check text-orange display-4"></i>
                    </div>
                    <h3 class="h5 mb-3 fw-bold">Trusted Service</h3>
                    <p class="text-muted mb-0">Licensed and insured travel services you can trust.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-box text-center p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="bi bi-currency-dollar text-orange display-4"></i>
                    </div>
                    <h3 class="h5 mb-3 fw-bold">Best Prices</h3>
                    <p class="text-muted mb-0">Competitive prices and value for money packages.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-box text-center p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="bi bi-headset text-orange display-4"></i>
                    </div>
                    <h3 class="h5 mb-3 fw-bold">24/7 Support</h3>
                    <p class="text-muted mb-0">Round-the-clock customer support for your peace of mind.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="feature-box text-center p-4">
                    <div class="icon-wrapper mb-4">
                        <i class="bi bi-award text-orange display-4"></i>
                    </div>
                    <h3 class="h5 mb-3 fw-bold">Expert Guides</h3>
                    <p class="text-muted mb-0">Professional and experienced travel guides.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.about-section {
    background-color: #ffffff;
    padding: 60px 0;
}

.text-orange {
    color: #ff6b00 !important;
}

.subheading {
    font-size: 1.2rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    display: block;
    margin-bottom: 0.5rem;
}

.card {
    transition: transform 0.3s ease;
    border-radius: 12px;
    margin-bottom: 30px;
}

.card:hover {
    transform: translateY(-5px);
}

.feature-box {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: transform 0.3s ease;
    height: 100%;
    margin-bottom: 30px;
}

.feature-box:hover {
    transform: translateY(-5px);
}

.icon-wrapper {
    width: 70px;
    height: 70px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    background: rgba(255, 107, 0, 0.1);
    border-radius: 50%;
    transition: all 0.3s ease;
}

.card:hover .icon-wrapper,
.feature-box:hover .icon-wrapper {
    background: #ff6b00;
}

.card:hover .icon-wrapper i,
.feature-box:hover .icon-wrapper i {
    color: white !important;
}

.bi {
    line-height: 1;
    transition: all 0.3s ease;
}

.display-4 {
    font-weight: 600;
}

.lead {
    font-size: 1.25rem;
    font-weight: 300;
}

@media (max-width: 768px) {
    .display-4 {
        font-size: 2.5rem;
    }
    
    .lead {
        font-size: 1.1rem;
    }
    
    .feature-box {
        margin-bottom: 1.5rem;
    }
}
</style>
@endsection 