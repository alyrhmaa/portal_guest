@extends('layouts.guest.main')

@section('content')
    <!-- Hero Section -->
    <section class="py-5 text-white modern-hero">
        <div class="container text-center">
            <h1 class="fw-bold mb-3">
                <i class="bi bi-images me-2"></i>Galeri Desa
            </h1>
            <p class="lead mb-0">Jelajahi keindahan dan kegiatan desa kami melalui koleksi foto terbaik.</p>

            <a href="{{ route('galeri.create') }}" class="btn btn-light text-pink fw-bold mt-4 rounded-pill px-4 shadow-sm">
                <i class="bi bi-plus-circle me-2"></i>Tambah Galeri Baru
            </a>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-5 bg-light">
        <div class="container">

            <!-- Stats Section -->
            <div class="row mb-5 justify-content-center">
                <div class="col-md-6 mb-3">
                    <div class="stat-card bg-white rounded-4 shadow-sm p-4 text-center">
                        <i class="bi bi-image text-pink fs-1 mb-2 d-block"></i>
                        <h3 class="fw-bold text-pink mb-1">{{ $totalAlbum }}</h3>
                        <p class="text-muted mb-0">Album Galeri</p>
                    </div>
                </div>

                <div class="col-md-6 mb-3">
                    <div class="stat-card bg-white rounded-4 shadow-sm p-4 text-center">
                        <i class="bi bi-camera text-pink fs-1 mb-2 d-block"></i>
                        <h3 class="fw-bold text-pink mb-1">{{ $totalFoto }}</h3>
                        <p class="text-muted mb-0">Total Foto</p>
                    </div>
                </div>
            </div>

            <!-- Galeri Grid -->
                <div class="row justify-content-center">
                    @forelse($galeri as $item)
                        @php
                            $cover = $item->media->first()->file_name ?? null;
                            $jumlahFoto = $item->media->count();
                        @endphp

                    <div class="col-lg-6 mb-4">
                        <div class="galeri-card card border-0 shadow-sm h-100 overflow-hidden rounded-4">

                            <div class="galeri-cover position-relative">
                                @if ($cover)
                                    <img src="{{ asset('uploads/galeri/' . $cover) }}" class="w-100 galeri-image">
                                @else
                                    <div
                                        class="no-image bg-secondary text-white d-flex align-items-center justify-content-center">
                                        Tidak ada foto
                                    </div>
                                @endif

                                <span class="badge badge-count">
                                    <i class="bi bi-images me-1"></i>{{ $jumlahFoto }} Foto
                                </span>

                                <span class="badge badge-date">
                                    <i class="bi bi-calendar me-1"></i>{{ $item->created_at->format('d M Y') }}
                                </span>
                            </div>

                            <div class="card-body d-flex flex-column p-4">
                                <h4 class="fw-bold text-dark">
                                    <i class="bi bi-folder text-pink me-2"></i>{{ $item->judul }}
                                </h4>

                                <div class="galeri-description mt-2 mb-3">
                                    {{ $item->deskripsi }}
                                </div>

                                <div class="mt-auto d-flex gap-2">
                                    <a href="#" class="btn btn-pink text-white rounded-pill flex-fill">
                                        <i class="bi bi-eye me-2"></i>Lihat Detail
                                    </a>

                                    <a href="{{ route('galeri.edit', $item->galeri_id) }}"
                                        class="btn btn-outline-pink rounded-pill px-3">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-4">
                {{ $galeri->links('pagination::bootstrap-5') }}
            </div>
            @if ($galeri->count() == 0)
                <div class="text-center">
                    <div class="card border-0 shadow-sm rounded-4 py-5">
                        <i class="bi bi-images display-4 text-muted mb-3"></i>
                        <h4 class="text-muted mb-3">Belum ada galeri foto</h4>
                        <p class="text-muted">Saat ini belum ada foto yang diunggah.</p>

                        <a href="{{ route('galeri.create') }}" class="btn btn-pink text-white rounded-pill px-4 mt-2">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Galeri Pertama
                        </a>
                    </div>
                </div>
            @endif

        </div>
    </section>

    <style>
        .modern-hero {
            background: linear-gradient(135deg, #ec709f 0%, #db548a 100%);
        }

        .galeri-card {
            transition: 0.3s ease;
        }

        .galeri-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(236, 112, 159, 0.22) !important;
        }

        .galeri-image {
            height: 260px;
            object-fit: cover;
            border-bottom: 4px solid rgba(236, 112, 159, 0.4);
        }

        .badge-count,
        .badge-date {
            position: absolute;
            background: rgba(0, 0, 0, 0.55);
            color: #fff;
            backdrop-filter: blur(3px);
            padding: 5px 12px;
            border-radius: 30px;
            font-size: 0.85rem;
        }

        .badge-count {
            top: 15px;
            right: 15px;
        }

        .badge-date {
            bottom: 15px;
            left: 15px;
        }

        .galeri-description {
            background: rgba(236, 112, 159, 0.07);
            border-left: 4px solid #ec709f;
            padding: 15px;
            border-radius: 8px;
        }

        .text-pink {
            color: #ec709f !important;
        }

        .btn-pink {
            background: linear-gradient(135deg, #ec709f, #db548a);
            border: none;
            transition: 0.3s;
        }

        .btn-pink:hover {
            transform: scale(1.03);
        }

        .btn-outline-pink {
            border: 2px solid #ec709f;
            color: #ec709f;
            transition: 0.3s;
        }

        .btn-outline-pink:hover {
            background: #ec709f;
            color: #fff;
        }
    </style>
@endsection
