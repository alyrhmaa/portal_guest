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
</head>
