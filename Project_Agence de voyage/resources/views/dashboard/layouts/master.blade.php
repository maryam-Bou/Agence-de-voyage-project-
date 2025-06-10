<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>{{ $title ?? 'Dashboard' }} | Jalankuy Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Jalankuy - Cari Kemudahan Liburan Bersama Keluarga Dengan Pemesanan Secara Online"
        name="description" />
    <meta content="Ahmad Shaleh Kurniawan" name="author" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('template_dashboard/images/favicon.ico') }}">

    <!-- Sweet Alert-->
    <link href="{{ asset('template_dashboard/libs/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- DataTables -->
    <link href="{{ asset('template_dashboard/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template_dashboard/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Responsive datatable examples -->
    <link href="{{ asset('template_dashboard/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Css -->
    <link href="{{ asset('template_dashboard/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('template_dashboard/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('template_dashboard/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        .vertical-menu {
            transition: all 0.3s ease;
        }
        .main-content {
            transition: all 0.3s ease;
        }
        .navbar-brand-box {
            transition: all 0.3s ease;
        }
        .vertical-menu.hide-menu {
            width: 70px;
        }
        .vertical-menu.hide-menu .logo-txt,
        .vertical-menu.hide-menu span:not(.bi) {
            display: none;
        }
        .main-content.expanded {
            margin-left: 70px;
        }
        .navbar-brand-box.hide-brand {
            width: 70px;
        }
        .navbar-brand-box.hide-brand .logo-txt {
            display: none;
        }
        @media (max-width: 992px) {
            .vertical-menu {
                display: none;
                position: fixed;
                top: 70px;
                left: 0;
                bottom: 0;
                width: 250px;
                z-index: 1000;
                background: #fff;
                box-shadow: 0 0 10px rgba(0,0,0,0.1);
            }
            .vertical-menu.show {
                display: block;
            }
            .main-content {
                margin-left: 0 !important;
            }
            .navbar-brand-box {
                width: auto !important;
            }
            .logo-sm {
                display: none !important;
            }
        }
    </style>

</head>

<body data-sidebar="dark" data-layout-mode="light">

    <!-- <body data-layout="horizontal" data-topbar="dark"> -->

    <!-- Begin page -->
    <div id="layout-wrapper">


        @include('dashboard.layouts._header')

        @include('dashboard.layouts._sidebar')



        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">
            <!-- Alert Messages -->
            <div class="container-fluid">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        {{ session('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        {{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if (session('info'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>

            @yield('content')
           
        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- Right bar overlay-->
    <div class="rightbar-overlay"></div>

    <!-- JAVASCRIPT -->
    <!-- JAVASCRIPT -->
    <script src="{{ asset('template_dashboard/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('template_dashboard/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('template_dashboard/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('template_dashboard/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('template_dashboard/libs/node-waves/waves.min.js') }}"></script>

    <!-- Required datatable js -->
    <script src="{{ asset('template_dashboard/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('template_dashboard/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

    <!-- Responsive examples -->
    <script src="{{ asset('template_dashboard/libs/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('template_dashboard/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js') }}"></script>

    <!-- apexcharts -->
    <script src="{{ asset('template_dashboard/libs/apexcharts/apexcharts.min.js') }}"></script>

    <!-- Sweet Alerts js -->
    <script src="{{ asset('template_dashboard/libs/sweetalert2/sweetalert2.min.js') }}"></script>

    <!-- dashboard init -->
    <script src="{{ asset('template_dashboard/js/pages/dashboard.init.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('template_dashboard/js/app.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#datatable').DataTable();

            // Menu toggle functionality
            $('#menu-toggle').click(function() {
                if ($(window).width() > 992) {
                    // Desktop behavior
                    $('.vertical-menu').toggleClass('hide-menu');
                    $('.main-content').toggleClass('expanded');
                    $('.navbar-brand-box').toggleClass('hide-brand');
                } else {
                    // Mobile behavior
                    $('.vertical-menu').toggleClass('show');
                }
            });

            // Keep menu collapsed on desktop when clicking menu items
            if ($(window).width() > 992) {
                $('.vertical-menu a').click(function() {
                    if ($('.vertical-menu').hasClass('hide-menu')) {
                        return true; // Allow navigation but keep menu collapsed
                    }
                });
            }
        });
    </script>

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

    @stack('script')
</body>

</html>
