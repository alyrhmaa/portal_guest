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

        /* STYLE DATA WARGA */
        :root {
            --pink-soft: #f8a1c4;
            --pink-dark: #f07aa8;
            --pink-light: #fde4ee;
        }

        h2 {
            color: var(--pink-dark);
        }

        /* Search */
        .search-input {
            border-radius: 50px 0 0 50px !important;
            border: 2px solid var(--pink-soft);
        }

        .search-btn {
            border-radius: 0 50px 50px 0 !important;
        }

        /* Stack Layout */
        .warga-stack {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(320px, 1fr));
            gap: 24px;
        }

        .warga-box {
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 10px 28px rgba(248, 161, 196, .25);
            padding: 20px;
            display: flex;
            flex-direction: column;
        }

        /* Header */
        .warga-header {
            font-size: 18px;
            font-weight: 700;
            color: var(--pink-dark);
            padding-bottom: 10px;
            border-bottom: 2px dashed var(--pink-light);
            margin-bottom: 14px;
        }

        /* Body */
        .warga-body {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 10px 18px;
            font-size: 14px;
            color: #555;
        }

        .warga-body div {
            display: flex;
            flex-direction: column;
        }

        .warga-body strong {
            font-size: 12px;
            color: #999;
        }

        /* Footer */
        .warga-footer {
            margin-top: auto;
            display: flex;
            justify-content: flex-end;
            gap: 10px;
            padding-top: 16px;
        }

        .btn-edit {
            background: #ffd1e6;
            border: none;
            border-radius: 20px;
            padding: 6px 16px;
            color: #7a003c;
        }

        .btn-hapus {
            background: #ff7aa2;
            border: none;
            border-radius: 20px;
            padding: 6px 16px;
            color: #fff;
        }

        .btn-primary {
            background-color: var(--pink-soft) !important;
            border-color: var(--pink-soft) !important;
            color: #fff !important;
        }

        .btn-primary:hover,
        .btn-primary:focus {
            background-color: var(--pink-dark) !important;
            border-color: var(--pink-dark) !important;
            box-shadow: 0 6px 18px rgba(240, 122, 168, 0.45) !important;
        }

        /* ===============================
            SEARCH BUTTON (ICON 🔍)
           ================================ */

        .search-btn {
            background-color: var(--pink-soft) !important;
            border: 2px solid var(--pink-soft) !important;
            color: #fff !important;
        }

        .search-btn:hover {
            background-color: var(--pink-dark) !important;
            border-color: var(--pink-dark) !important;
        }

        /* Input focus lebih halus */
        .search-input:focus {
            border-color: var(--pink-dark) !important;
            box-shadow: 0 0 0 0.15rem rgba(248, 161, 196, 0.45) !important;
        }

        /* BERITA */
        :root {
            --pink: #f48fb1;
            --pink-dark: #ec407a;
            --pink-light: #fde4ee;
        }

        .hero-pink {
            background: linear-gradient(135deg, var(--pink-dark), var(--pink));
        }

        .bg-light-pink {
            background-color: var(--pink-light);
        }

        .text-pink {
            color: var(--pink-dark) !important;
        }

        .bg-pink {
            background: linear-gradient(135deg, var(--pink-dark), var(--pink)) !important;
        }

        .btn-pink {
            background: linear-gradient(135deg, var(--pink-dark), var(--pink));
            color: #fff;
            border: none;
            border-radius: 10px;
            transition: .3s;
        }

        .btn-pink:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 18px rgba(244, 143, 177, .45);
        }

        .btn-outline-pink {
            color: var(--pink-dark);
            border-color: var(--pink);
        }

        .btn-outline-pink:hover {
            background-color: var(--pink);
            color: #fff;
        }

        .table th {
            border-bottom: 2px solid var(--pink);
        }

        .table-hover tbody tr:hover {
            background-color: rgba(244, 143, 177, 0.08);
        }

        /* =========================================================
   FIX WARNA BERITA (TANPA GANGGU BAGIAN LAIN)
   ========================================================= */

        /* Variabel KHUSUS BERITA (tidak pakai :root global) */
        .berita-page {
            --berita-pink-main: #ec709f;
            --berita-pink-dark: #db548a;
            --berita-pink-soft: #f7c6d9;
            --berita-pink-light: #fde8f1;
        }

        /* Hero */
        .berita-page .hero-pink {
            background: linear-gradient(135deg,
                    var(--berita-pink-soft),
                    var(--berita-pink-main)) !important;
        }

        /* Background section */
        .berita-page .bg-light-pink {
            background-color: var(--berita-pink-light) !important;
        }

        /* Text */
        .berita-page .text-pink {
            color: var(--berita-pink-main) !important;
        }

        /* Card header */
        .berita-page .bg-pink {
            background: linear-gradient(135deg,
                    var(--berita-pink-main),
                    var(--berita-pink-dark)) !important;
            color: #fff !important;
        }

        /* Button pink */
        .berita-page .btn-pink {
            background: linear-gradient(135deg,
                    var(--berita-pink-main),
                    var(--berita-pink-dark)) !important;
            color: #fff !important;
            border: none !important;
            border-radius: 12px;
            transition: all .3s ease;
        }

        .berita-page .btn-pink:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(236, 112, 159, 0.35);
        }

        /* Outline pink */
        .berita-page .btn-outline-pink {
            color: var(--berita-pink-main) !important;
            border-color: var(--berita-pink-main) !important;
        }

        .berita-page .btn-outline-pink:hover {
            background-color: var(--berita-pink-main) !important;
            color: #fff !important;
        }

        /* Table */
        .berita-page .table th {
            border-bottom: 2px solid var(--berita-pink-main) !important;
        }

        .berita-page .table-hover tbody tr:hover {
            background-color: rgba(236, 112, 159, 0.08) !important;
        }

        /* Badge kategori */
        .berita-page .badge.bg-light {
            background-color: var(--berita-pink-light) !important;
            color: var(--berita-pink-dark) !important;
        }
    </style>
</head>
