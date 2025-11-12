@extends('layouts.guest.main')

@section('content')
<div class="container py-5 text-center">
    <div class="card shadow-lg rounded-4 p-4" style="max-width: 700px; margin: 0 auto; animation: fadeInUp 0.8s ease;">
        <h1 class="fw-bold text-primary mb-3">Selamat Datang di Portal Desa</h1>
        <p class="text-muted mb-4">Silakan klik tombol di bawah untuk melihat data warga atau menambahkan warga baru.</p>

        <div class="d-flex justify-content-center gap-3">
            <a href="{{ route('warga.index') }}" class="btn btn-outline-primary btn-lg rounded-3">
                Lihat Data Warga
            </a>
            <a href="{{ route('warga.tambah') }}" class="btn btn-primary btn-lg rounded-3">
                Tambah Data Warga
            </a>
        </div>
    </div>
</div>
@endsection
