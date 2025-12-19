<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>@yield('title', 'Portal Desa')</title>
    <meta name="description" content="@yield('description', 'Portal Informasi Desa Modern dan Responsif')">
    <meta name="keywords" content="@yield('keywords', 'portal desa, berita, galeri, profil, agenda')">

    <!-- Favicons -->
    <link href="{{ asset('assets-guest/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('assets-guest/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets-guest/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets-guest/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('assets-guest/css/main.css') }}" rel="stylesheet">

    @stack('styles')

    <style>
        /* --- Dropdown Navbar Custom (DESKTOP) --- */
        .navbar .dropdown {
            position: relative;
        }

        .navbar .dropdown ul {
            display: none;
            position: absolute;
            background: #fff;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-top: 10px;
            border-radius: 8px;
            list-style: none;
            padding: 10px 0;
            z-index: 99;
            min-width: 180px;
            top: 100%;
            /* Tambahkan ini */
            left: 0;
            /* Tambahkan ini */
        }

        /* Tambahkan gap untuk mencegah hilang terlalu cepat */
        .navbar .dropdown::after {
            content: '';
            position: absolute;
            top: 100%;
            left: 0;
            width: 100%;
            height: 10px;
            background: transparent;
        }

        .navbar .dropdown:hover>ul {
            display: block;
            animation: fadeDown 0.2s ease-in-out;
        }

        .navbar .dropdown ul li a {
            padding: 10px 20px;
            display: block;
            color: #333;
            transition: background 0.2s ease;
        }

        .navbar .dropdown ul li a:hover {
            background: #f8f9fa;
            color: #0d6efd;
        }

        .navbar .dropdown>a i {
            margin-left: 5px;
            font-size: 0.8em;
        }

        @keyframes fadeDown {
            from {
                opacity: 0;
                transform: translateY(-8px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ===========================================================
       ===   MOBILE NAVBAR FIX (AGAR MENU MUNCUL DI HP)   =======
       =========================================================== */

        .navbar-mobile {
            position: fixed;
            top: 60px;
            left: 0;
            right: 0;
            background: #fff;
            padding: 20px;
            overflow-y: auto;
            height: calc(100vh - 60px);
            z-index: 9999;
            transition: all 0.3s ease-in-out;
        }

        .navbar-mobile ul {
            display: block !important;
        }

        .navbar-mobile li {
            padding: 10px 0;
        }

        .navbar-mobile .dropdown ul {
            display: none;
            position: static;
            background: #fff;
            box-shadow: none;
            padding-left: 15px;
            margin-top: 8px;
        }

        .navbar-mobile .dropdown-active {
            display: block !important;
        }

        .logo-img {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            object-fit: cover;
            margin-right: 10px;
        }

        #header {
            height: 70px;
            padding: 10px 0;
        }

        .navbar ul li a {
            font-weight: 500;
        }

        .navbar ul li a.active {
            color: #007bff !important;
        }

        /* Footer */
        .footer-pink {
            background: linear-gradient(135deg, #fde2ec, #fbcfe8);
            color: #4a1d2e;
        }

        .footer-pink h5 {
            color: #9d174d;
        }

        .footer-list li {
            margin-bottom: 8px;
            font-size: 14px;
        }

        .footer-social a {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 36px;
            height: 36px;
            background: #ec4899;
            color: #fff;
            border-radius: 50%;
            margin-left: 6px;
            transition: 0.3s;
            text-decoration: none;
        }

        .footer-social a:hover {
            background: #be185d;
        }

        .footer-bottom {
            background: rgba(255, 255, 255, 0.4);
            color: #6b213c;
        }

        /*  */
        .text-pink {
            color: #ec709f !important;
        }

        .btn-pink {
            background: #ec709f;
            border-color: #ec709f;
        }

        .btn-pink:hover {
            background: #db548a;
        }

        .action-button-card {
            transition: all 0.3s ease;
        }

        .action-button-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(236, 112, 159, .2) !important;
        }

        /* Developer Section */

        .developer-photo {
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #ec709f;
        }

        .text-pink {
            color: #ec709f !important;
        }

        .btn-outline-pink {
            border: 1px solid #ec709f;
            color: #ec709f;
        }

        .btn-outline-pink:hover {
            background: #ec709f;
            color: #fff;
        }

        .text-justify {
            text-align: justify;
        }

        /* style profil */
        .profil-hero {
            background: linear-gradient(135deg, #ec709f, #db548a);
            position: relative;
        }

        .profil-hero .overlay {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .15);
        }

        .card-modern {
            border: none;
            border-radius: 14px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, .08);
        }

        .image-box {
            overflow: hidden;
            border-radius: 12px;
        }

        .image-box img {
            transition: .4s;
        }

        .image-box:hover img {
            transform: scale(1.1);
        }

        .info-box {
            display: flex;
            gap: 15px;
            padding: 15px;
            background: #fff;
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0, 0, 0, .06);
        }

        .info-box .icon {
            width: 45px;
            height: 45px;
            background: #ec709f;
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .accent-left {
            border-left: 5px solid #ec709f;
        }

        .bg-pink {
            background: linear-gradient(135deg, #ec709f, #db548a) !important;
        }

        .text-pink {
            color: #ec709f !important
        }

        .btn-pink {
            background: #ec709f;
            color: white;
            border-radius: 10px;
        }

        .btn-pink:hover {
            background: #db548a;
        }
    </style>
</head>
