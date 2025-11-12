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
    /* --- Dropdown Navbar Custom --- */
    .navbar .dropdown ul {
        display: none;
        position: absolute;
        background: #fff;
        box-shadow: 0 4px 10px rgba(0,0,0,0.1);
        margin-top: 10px;
        border-radius: 8px;
        list-style: none;
        padding: 10px 0;
        z-index: 99;
        min-width: 180px;
    }

    .navbar .dropdown:hover > ul {
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

    .navbar .dropdown > a i {
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
  </style>
</head>
