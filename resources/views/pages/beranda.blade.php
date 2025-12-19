@extends('layouts.guest.main')

@section('content')

<!-- Hero Section Simple -->
<section class="home-hero py-5 text-white" style="background: linear-gradient(135deg, #ec709f 0%, #db548a 100%);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 mx-auto text-center">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold mb-4">
                        🌸 Selamat Datang di Portal Desa
                    </h1>
                    <p class="lead mb-4 fs-5">
                        Sistem informasi desa modern untuk mengelola data warga dan informasi desa secara terintegrasi
                    </p>

                    <div class="row justify-content-center text-dark">
                        <div class="col-md-3 col-6 mb-3">
                            <div class="bg-white rounded-3 p-3 shadow-sm">
                                <h4 class="fw-bold text-pink mb-1">500+</h4>
                                <small class="text-muted">Warga</small>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="bg-white rounded-3 p-3 shadow-sm">
                                <h4 class="fw-bold text-pink mb-1">10+</h4>
                                <small class="text-muted">RT</small>
                            </div>
                        </div>
                        <div class="col-md-3 col-6 mb-3">
                            <div class="bg-white rounded-3 p-3 shadow-sm">
                                <h4 class="fw-bold text-pink mb-1">50+</h4>
                                <small class="text-muted">Kegiatan</small>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

<!-- Main Actions -->
<section class="main-actions py-5 bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">

                <div class="text-center mb-5">
                    <h2 class="fw-bold text-pink mb-3">📊 Kelola Data Warga</h2>
                    <p class="text-muted">
                        Silakan klik tombol di bawah untuk melihat atau menambahkan data warga
                    </p>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-4 mb-4">
                        <div class="action-button-card p-4 bg-white rounded-4 shadow-sm text-center h-100">
                            <i class="bi bi-people-fill display-4 text-pink mb-3"></i>
                            <h4 class="fw-bold mb-3">Lihat Data Warga</h4>
                            <p class="text-muted mb-4">Akses database lengkap data warga desa</p>
                            <a href="{{ route('warga.index') }}" class="btn btn-pink rounded-pill px-4 text-white">
                                <i class="bi bi-eye me-2"></i>Lihat
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="action-button-card p-4 bg-white rounded-4 shadow-sm text-center h-100">
                            <i class="bi bi-person-plus-fill display-4 text-pink mb-3"></i>
                            <h4 class="fw-bold mb-3">Tambah Warga</h4>
                            <p class="text-muted mb-4">Input data warga baru dengan mudah</p>
                            <a href="{{ route('warga.tambah') }}" class="btn btn-pink rounded-pill px-4 text-white">
                                <i class="bi bi-plus-circle me-2"></i>Tambah
                            </a>
                        </div>
                    </div>

                    <div class="col-md-4 mb-4">
                        <div class="action-button-card p-4 bg-white rounded-4 shadow-sm text-center h-100">
                            <i class="bi bi-person-check-fill display-4 text-pink mb-3"></i>
                            <h4 class="fw-bold mb-3">Data User</h4>
                            <p class="text-muted mb-4">Kelola akun pengguna sistem</p>
                            <a href="{{ route('user.index') }}" class="btn btn-pink rounded-pill px-4 text-white">
                                <i class="bi bi-people me-2"></i>User
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

@endsection
