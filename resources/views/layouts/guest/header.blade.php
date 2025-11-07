<header id="header" class="header d-flex align-items-center fixed-top bg-white shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ route('beranda') }}" class="logo d-flex align-items-center text-decoration-none">
            <h1 class="sitename mb-0 text-dark fw-bold">Portal Desa</h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                <li>
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        Tentang
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}" href="{{ route('beranda') }}">
                        Home
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('profil.index') ? 'active' : '' }}" href="{{ route('profil.index') }}">
                        Profil
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('kategori.index') ? 'active' : '' }}" href="{{ route('kategori.index') }}">
                        Kategori Berita
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('berita.index') ? 'active' : '' }}" href="{{ route('berita.index') }}">
                        Berita
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('agenda.index') ? 'active' : '' }}" href="{{ route('agenda.index') }}">
                        Agenda
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('galeri.index') ? 'active' : '' }}" href="{{ route('galeri.index') }}">
                        Galeri
                    </a>
                </li>
                <li>
                    <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}" href="{{ route('login') }}">
                        Login
                    </a>
                </li>
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>
