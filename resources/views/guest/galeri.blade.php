@extends('layouts.main')

@section('content')
<div class="container-fluid py-4">
    <h1 class="mb-4 text-center text-primary fw-bold border-bottom pb-2">🖼️ Galeri Desa</h1>
    <p class="text-center text-muted mb-5">Jelajahi keindahan dan kegiatan desa kami melalui koleksi foto-foto terbaik.</p>

    @php
        $galeri_items = [
            [
                'judul' => 'Peresmian Balai Desa',
                'deskripsi' => 'Momen peresmian Balai Desa yang dihadiri oleh seluruh elemen masyarakat.',
                // ✅ Gambar acara peresmian / rapat masyarakat
                'foto' => 'https://images.unsplash.com/photo-1593113598332-cd288d649433?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
            ],
            [
                'judul' => 'Pelatihan UMKM Desa',
                'deskripsi' => 'Sesi pelatihan untuk mengembangkan potensi Usaha Mikro Kecil dan Menengah di desa.',
                'foto' => 'https://images.unsplash.com/photo-1517048676732-d65bc937f952?q=80&w=2070&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D'
            ],
        ];
    @endphp

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
        @foreach($galeri_items as $item)
        <div class="col">
            <div class="card shadow-lg h-100 border-0 transition-3d-hover">
                <img src="{{ $item['foto'] }}" class="card-img-top object-fit-cover rounded-top" alt="{{ $item['judul'] }}" style="height: 200px;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-dark fw-bold text-truncate" title="{{ $item['judul'] }}">
                        {{ $item['judul'] }}
                    </h5>
                    <p class="card-text text-secondary mb-3 small line-clamp-2">
                        {{ $item['deskripsi'] }}
                    </p>
                    <div class="mt-auto text-end">
                        <a href="#" class="btn btn-sm btn-primary shadow-sm stretched-link">
                            <i class="fas fa-search-plus me-1"></i> Lihat Detail
                        </a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if(count($galeri_items) === 0)
    <div class="alert alert-info text-center mt-5" role="alert">
        <h4 class="alert-heading">Belum Ada Foto Galeri</h4>
        <p>Saat ini belum ada foto yang diunggah di Galeri Desa.</p>
    </div>
    @endif
</div>

<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');
    .line-clamp-2 {
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }
    .transition-3d-hover {
        transition: transform 0.4s cubic-bezier(0.25, 0.46, 0.45, 0.94), box-shadow 0.4s ease-in-out;
    }
    .transition-3d-hover:hover {
        transform: translateY(-8px);
        box-shadow: 0 1.5rem 4rem rgba(0, 0, 0, 0.25) !important;
    }
    .object-fit-cover { object-fit: cover; }
    .text-primary { color: #007bff !important; }
    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
        transition: background-color 0.3s;
    }
    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        console.log('Galeri Desa loaded with enhanced styling.');
    });
</script>

@endsection
