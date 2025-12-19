<header id="header" class="header d-flex align-items-center fixed-top bg-white shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">

        <a href="{{ route('beranda') }}" class="logo d-flex align-items-center text-decoration-none">
            <img src="{{ asset('assets-guest/img/logo-desa.jpg') }}" alt="Logo Desa" class="logo-img">
            <h1 class="sitename mb-0 text-dark fw-bold">Portal Desa</h1>
        </a>

        <!-- Navbar -->
        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link {{ request()->routeIs('tentang') ? 'active' : '' }}"
                        href="{{ route('tentang') }}">Tentang</a></li>

                <li><a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}"
                        href="{{ route('home') }}">Home</a></li>

                <li><a class="nav-link {{ request()->routeIs('identitas') ? 'active' : '' }}"
                        href="{{ route('identitas') }}">Identitas</a></li>

                <li><a class="nav-link {{ request()->routeIs('profil.index') ? 'active' : '' }}"
                        href="{{ route('profil.index') }}">Profil</a></li>

                <li><a class="nav-link {{ request()->routeIs('kategori.index') ? 'active' : '' }}"
                        href="{{ route('kategori.index') }}">Kategori Berita</a></li>

                <li><a class="nav-link {{ request()->routeIs('berita.index') ? 'active' : '' }}"
                        href="{{ route('berita.index') }}">Berita</a></li>

                <li><a class="nav-link {{ request()->routeIs('agenda.index') ? 'active' : '' }}"
                        href="{{ route('agenda.index') }}">Agenda</a></li>

                <li><a class="nav-link {{ request()->routeIs('galeri.index') ? 'active' : '' }}"
                        href="{{ route('galeri.index') }}">Galeri</a></li>

                <li class="dropdown">
                    <a href="#" class="nav-link dropdown-toggle">Tambah Data</a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('user.create') }}">Data User</a></li>
                        <li><a href="{{ route('warga.tambah') }}">Data Warga</a></li>
                    </ul>
                </li>

                @guest
                    <li>
                        <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                            href="{{ route('login') }}">Login</a>
                    </li>
                @endguest

                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST" class="d-inline">
                            @csrf
                            <button type="submit" class="nav-link bg-transparent border-0 p-0" style="cursor:pointer;">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth

            </ul>

            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>

    </div>
</header>
