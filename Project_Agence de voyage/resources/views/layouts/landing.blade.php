<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title ?? 'TravelEase' }} - Find Ease in Family Vacation with Online Booking</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Arizonia&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Sweet Alert-->
    <link href="{{ asset('template_dashboard/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet"
        type="text/css" />

    <link rel="stylesheet" href="{{ asset('template/css/animate.css') }}">

    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ asset('template/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ asset('template/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-color: #F96D00;
            --primary-hover: #e05e00;
            --text-color: #333;
            --light-bg: #ffffff;
        }

        body {
            background-color: #ffffff;
        }

        .ftco-section {
            background-color: #ffffff;
        }

        .services-section {
            background-color: #ffffff;
        }

        .main-content {
            margin-top: 6rem;
            padding-top: 2rem;
            background-color: #ffffff;
        }

        .ftco-search {
            background-color: #ffffff;
        }

        .search-property-1 {
            background-color: #ffffff;
        }

        .navbar {
            background-color: #fff;
            box-shadow: none;
            padding: 1rem 0;
            position: fixed;
            width: 100%;
            top: 0;
            z-index: 1000;
        }

        .navbar-brand {
            font-weight: 700;
            color: var(--primary-color);
            font-size: 1.3rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand span {
            font-weight: 400;
            font-size: 1rem;
            color: var(--text-color);
        }

        .nav-link {
            color: var(--text-color);
            font-weight: 500;
            font-size: 0.95rem;
            padding: 0.5rem 1rem !important;
            margin: 0 0.3rem;
            border-radius: 6px;
            transition: all 0.3s ease;
            position: relative;
        }

        .nav-link:hover {
            color: var(--primary-color);
            background-color: rgba(249, 109, 0, 0.1);
        }

        .nav-link.active {
            color: var(--primary-color);
            background-color: rgba(249, 109, 0, 0.1);
        }

        .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 30px;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }

        .btn-login {
            background-color: var(--primary-color);
            color: white;
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-login:hover {
            background-color: var(--primary-hover);
            color: white;
            transform: translateY(-2px);
        }

        .btn-register {
            border: 2px solid var(--primary-color);
            color: var(--primary-color);
            padding: 0.5rem 1.2rem;
            border-radius: 6px;
            font-weight: 500;
            font-size: 0.95rem;
            transition: all 0.3s ease;
            background-color: transparent;
        }

        .btn-register:hover {
            background-color: var(--primary-color);
            color: white;
            transform: translateY(-2px);
        }

        @media (max-width: 991.98px) {
            .navbar-collapse {
                background-color: white;
                padding: 1rem;
                border-radius: 8px;
                box-shadow: 0 4px 6px rgba(0,0,0,.1);
                margin-top: 1rem;
            }
            
            .nav-link {
                margin: 0.3rem 0;
            }
        }

        .dropdown-item:hover, 
        .dropdown-item:focus {
            background-color: #F96D00 !important;
            color: white !important;
        }

        .dropdown-item:active {
            background-color: #e05e00 !important;
            color: white !important;
        }

        .dropdown-item button:hover,
        .dropdown-item button:focus {
            background-color: #F96D00 !important;
            color: white !important;
        }

        .dropdown-item button:active {
            background-color: #e05e00 !important;
            color: white !important;
        }

        .btn-orange {
            transition: all 0.3s ease;
        }

        .btn-orange:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(249, 109, 0, 0.3);
        }

        .btn-orange:active {
            transform: translateY(-1px);
        }

        /* Destination Card Animations */
        .project-wrap {
            transition: all 0.3s ease;
        }

        .project-wrap:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .destination-image img {
            transition: transform 0.5s ease;
        }

        .project-wrap:hover .destination-image img {
            transform: scale(1.05);
        }

        /* Book Now Button Animation */
        .btn-book-now {
            transition: all 0.3s ease;
        }

        .btn-book-now:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(249, 109, 0, 0.3);
        }

        .btn-book-now:active {
            transform: translateY(-1px);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container d-flex justify-content-end">
            <a class="navbar-brand me-auto" href="{{ route('landing-page.index') }}">
                <i class="bi bi-airplane-fill"></i>
                TravelEase<span>Travel Agency</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing-page.index') ? 'active' : '' }}" 
                           href="{{ route('landing-page.index') }}">
                           <i class="bi bi-house-door me-1"></i>Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('landing-page.destinations') ? 'active' : '' }}" 
                           href="{{ route('landing-page.destinations') }}">
                           <i class="bi bi-geo-alt me-1"></i>Destinations
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" 
                           href="{{ route('about') }}">
                           <i class="bi bi-info-circle me-1"></i>About Us
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('contact') ? 'active' : '' }}" 
                           href="{{ route('contact') }}">
                           <i class="bi bi-envelope me-1"></i>Contact Us
                        </a>
                    </li>
                    @auth
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('booking.history') ? 'active' : '' }}" 
                               href="{{ route('booking.history') }}">
                               <i class="bi bi-journal-text me-1"></i>My Bookings
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="bi bi-person-circle me-1"></i>
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <li>
                                    <a class="dropdown-item" href="{{ route('profile.edit') }}">
                                        <i class="bi bi-gear me-1"></i>Profile
                                    </a>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="bi bi-box-arrow-right me-1"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        <li class="nav-item">
                            <a class="nav-link btn-login" href="{{ route('login') }}">
                                <i class="bi bi-box-arrow-in-right me-1"></i>Login
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-register" href="{{ route('register') }}">
                                <i class="bi bi-person-plus me-1"></i>Register
                            </a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>
    <!-- END nav -->

    <main class="main-content">
        @yield('content')
    </main>

    <footer class="ftco-footer bg-bottom ftco-no-pt"
        style="background-image: url('{{ asset('template/images/bg_3.jpg') }}');">
        <div class="container">
            <div class="row mb-5">
                <div class="col-md pt-5">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">About</h2>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                        <ul class="ftco-footer-social list-unstyled float-md-left float-lft">
                            <li class="ftco-animate"><a href="#"><span class="fa fa-twitter"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-facebook"></span></a></li>
                            <li class="ftco-animate"><a href="#"><span class="fa fa-instagram"></span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4 ml-md-5">
                        <h2 class="ftco-heading-2">Information</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Online Inquiries</a></li>
                            <li><a href="#" class="py-2 d-block">General Inquiries</a></li>
                            <li><a href="#" class="py-2 d-block">Booking Terms</a></li>
                            <li><a href="#" class="py-2 d-block">Privacy and Policy</a></li>
                            <li><a href="#" class="py-2 d-block">Refund Policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Experience</h2>
                        <ul class="list-unstyled">
                            <li><a href="#" class="py-2 d-block">Adventure</a></li>
                            <li><a href="#" class="py-2 d-block">Hotels and Restaurants</a></li>
                            <li><a href="#" class="py-2 d-block">Beach</a></li>
                            <li><a href="#" class="py-2 d-block">Nature</a></li>
                            <li><a href="#" class="py-2 d-block">Camping</a></li>
                            <li><a href="#" class="py-2 d-block">Party</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md pt-5 border-left">
                    <div class="ftco-footer-widget pt-md-5 mb-4">
                        <h2 class="ftco-heading-2">Have a Question?</h2>
                        <div class="block-23 mb-3">
                            <ul>
                                <li><span class="icon fa fa-map-marker"></span><span class="text">ISTA ,Tiznit ,MOROCCO</span></li>
                                <li><a href="#"><span class="icon fa fa-phone"></span><span class="text">+212 775 203000</span></a></li>
                                <li><a href="#"><span class="icon fa fa-paper-plane"></span><span class="text">travelEase@gmail.com</span></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </footer>

    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4"
                stroke-miterlimit="10" stroke="#F96D00" />
        </svg>
    </div>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('template_dashboard/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    @if (session('success'))
        <script>
            Swal.fire("Success!", "{{ session('success') }}", "success");
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire("Failed!", "{{ session('error') }}", "error");
        </script>
    @endif

    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery-migrate-3.0.1.min.js') }}"></script>
    <script src="{{ asset('template/js/popper.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.easing.1.3.js') }}"></script>
    <script src="{{ asset('template/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.animateNumber.min.js') }}"></script>
    <script src="{{ asset('template/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ asset('template/js/scrollax.min.js') }}"></script>
    <script src="{{ asset('template/js/main.js') }}"></script>

    <script>
        $(document).ready(function() {
            // read url_video.json
            $.getJSON("{{ asset('json/url_video.json') }}", function(data) {
                // set video url
                $('#video-hero-section').attr('href', data.url);
            });
        })
    </script>

    @stack('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>