<!DOCTYPE html>
<html lang="en">
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

<body class="@yield('body-class', 'index-page')">

  <!-- ======= Header ======= -->
  <header id="header" class="header d-flex align-items-center fixed-top bg-white shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">
      <a href="{{ route('dashboard') }}" class="logo d-flex align-items-center text-decoration-none">
        <h1 class="sitename mb-0 text-dark fw-bold">Portal Desa</h1>
      </a>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">Home</a></li>
          <li><a class="nav-link {{ request()->routeIs('profil.index') ? 'active' : '' }}" href="{{ route('profil.index') }}">Profil</a></li>
          <li><a class="nav-link {{ request()->routeIs('kategori.index') ? 'active' : '' }}" href="{{ route('kategori.index') }}">Kategori Berita</a></li>
          <li><a class="nav-link {{ request()->routeIs('berita.index') ? 'active' : '' }}" href="{{ route('berita.index') }}">Berita</a></li>
          <li><a class="nav-link {{ request()->routeIs('agenda.index') ? 'active' : '' }}" href="{{ route('agenda.index') }}">Agenda</a></li>
          <li><a class="nav-link {{ request()->routeIs('galeri.index') ? 'active' : '' }}" href="{{ route('galeri.index') }}">Galeri</a></li>
          <li> <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
        Login
    </a></li>
          <li><a class="nav-link scrollto" href="#contact">Kontak</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav>
    </div>
  </header>
  <!-- End Header -->

  <main id="main" style="margin-top: 100px;">
    @yield('content')
  </main>

  <footer class="footer text-center py-4 mt-5 bg-light border-top">
    <p class="mb-0 small">© {{ date('Y') }} <strong>Portal Desa</strong>. All Rights Reserved.</p>
  </footer>

  <!-- Vendor JS Files -->
  <script src="{{ asset('assets-guest/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets-guest/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('assets-guest/vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('assets-guest/vendor/swiper/swiper-bundle.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('assets-guest/js/main.js') }}"></script>

  @stack('scripts')
</body>
</html>
