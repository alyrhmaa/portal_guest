<header id="header" class="header d-flex align-items-center fixed-top bg-white shadow-sm">
    <div class="container d-flex align-items-center justify-content-between">
        <a href="{{ route('about') }}" class="logo d-flex align-items-center text-decoration-none">
            <h1 class="sitename mb-0 text-dark fw-bold">Portal Desa</h1>
        </a>

        <nav id="navbar" class="navbar">
            <ul>
                {{-- Tentang --}}
                <li>
                    <a class="nav-link {{ request()->routeIs('about') ? 'active' : '' }}" href="{{ route('about') }}">
                        Tentang
                    </a>
                </li>

                {{-- Home --}}
                <li>
                    <a class="nav-link {{ request()->routeIs('beranda') ? 'active' : '' }}"
                        href="{{ route('beranda') }}">
                        Home
                    </a>
                </li>

                {{-- Profil --}}
                <li>
                    <a class="nav-link {{ request()->routeIs('profil.index') ? 'active' : '' }}"
                        href="{{ route('profil.index') }}">
                        Profil
                    </a>
                </li>

                {{-- Kategori --}}
                <li>
                    <a class="nav-link {{ request()->routeIs('kategori.index') ? 'active' : '' }}"
                        href="{{ route('kategori.index') }}">
                        Kategori Berita
                    </a>
                </li>

                {{-- Berita --}}
                <li>
                    <a class="nav-link {{ request()->routeIs('berita.index') ? 'active' : '' }}"
                        href="{{ route('berita.index') }}">
                        Berita
                    </a>
                </li>

                {{-- Agenda --}}
                <li>
                    <a class="nav-link {{ request()->routeIs('agenda.index') ? 'active' : '' }}"
                        href="{{ route('agenda.index') }}">
                        Agenda
                    </a>
                </li>

                {{-- Galeri --}}
                <li>
                    <a class="nav-link {{ request()->routeIs('galeri.index') ? 'active' : '' }}"
                        href="{{ route('galeri.index') }}">
                        Galeri
                    </a>
                </li>

                {{-- Dropdown Tambah Data --}}
                <li class="dropdown position-relative">
                    <a href="#"
                        class="nav-link dropdown-toggle {{ request()->routeIs('user.create') || request()->routeIs('warga.tambah') ? 'active' : '' }}">
                        Tambah Data
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('user.create') }}">Data User</a></li>
                        <li><a href="{{ route('warga.tambah') }}">Data Warga</a></li>
                    </ul>
                </li>

                {{-- Login --}}
                <li>
                    <a class="nav-link {{ request()->routeIs('login') ? 'active' : '' }}"
                        href="{{ route('login') }}">
                        Login
                    </a>
                </li>
            </ul>

            {{-- Mobile Toggle Icon --}}
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
    </div>
</header>


{{-- ==== DROPDOWN STYLE ==== --}}
<style>
    .navbar ul li.dropdown {
        position: relative;
    }

    .navbar ul li .dropdown-menu {
        display: none;
        position: absolute;
        left: 0;
        top: 100%;
        background: #fff;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        border-radius: 6px;
        list-style: none;
        padding: 8px 0;
        z-index: 999;
        min-width: 180px;
    }

    .navbar ul li .dropdown-menu li a {
        display: block;
        padding: 10px 20px;
        color: #333;
        text-decoration: none;
        transition: 0.3s;
    }

    .navbar ul li .dropdown-menu li a:hover {
        background: #f8f9fa;
        color: #007bff;
    }

    /* Hover untuk desktop */
    .navbar ul li.dropdown:hover>.dropdown-menu {
        display: block;
    }

    /* Klik mode (mobile) */
    .navbar ul li.dropdown.open>.dropdown-menu {
        display: block;
    }
</style>


{{-- ==== DROPDOWN CLICK FIX ==== --}}
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const dropdownToggles = document.querySelectorAll('.navbar .dropdown-toggle');

        dropdownToggles.forEach(toggle => {
            toggle.addEventListener('click', function(e) {
                e.preventDefault();
                const parent = this.closest('.dropdown');

                // Tutup dropdown lain
                document.querySelectorAll('.navbar .dropdown').forEach(drop => {
                    if (drop !== parent) drop.classList.remove('open');
                });

                // Toggle dropdown yang diklik
                parent.classList.toggle('open');
            });
        });

        // Klik di luar dropdown -> tutup semua
        document.addEventListener('click', function(e) {
            if (!e.target.closest('.dropdown')) {
                document.querySelectorAll('.navbar .dropdown').forEach(drop => drop.classList.remove('open'));
            }
        });

        // Klik link dropdown tetap pindah halaman
        const dropdownLinks = document.querySelectorAll('.navbar .dropdown-menu a');
        dropdownLinks.forEach(link => {
            link.addEventListener('click', function() {
                const parentDropdown = this.closest('.dropdown');
                if (parentDropdown) parentDropdown.classList.remove('open');
            });
        });
    });
</script>


{{-- ==== MOBILE SIDEBAR TOGGLE (FIX HP TIDAK BISA KELUAR MENU) ==== --}}
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.querySelector(".mobile-nav-toggle");
        const navbar = document.querySelector("#navbar");

        if (toggleBtn && navbar) {
            toggleBtn.addEventListener("click", function() {
                navbar.classList.toggle("navbar-mobile");
            });
        }
    });
</script>
