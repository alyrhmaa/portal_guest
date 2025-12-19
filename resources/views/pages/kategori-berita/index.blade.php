@extends('layouts.guest.main')

@section('content')

    <!-- Hero Section -->
    <section class="kategori-hero py-5 text-white" style="background: linear-gradient(135deg, #ec709f 0%, #db548a 100%);">
        <div class="container">
            <div class="row justify-content-center text-center">
                <div class="col-lg-8">
                    <h1 class="display-5 fw-bold mb-3">
                        <i class="bi bi-folder me-2"></i>Kategori Berita
                    </h1>
                    <p class="lead mb-0">
                        Temukan berita berdasarkan kategori yang tersedia
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="kategori-content py-5 bg-light">
        <div class="container">

            <!-- Stats Section -->
            <div class="row mb-5">
                <div class="col-md-4 mb-3">
                    <div class="stat-card bg-white rounded-4 shadow-sm p-4 text-center">
                        <div class="stat-icon mb-3">
                            <i class="bi bi-layers-fill text-pink fs-1"></i>
                        </div>
                        <h3 class="fw-bold text-pink mb-1">{{ $totalKategori }}</h3>
                        <p class="text-muted mb-0">Total Kategori</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="stat-card bg-white rounded-4 shadow-sm p-4 text-center">
                        <div class="stat-icon mb-3">
                            <i class="bi bi-newspaper text-pink fs-1"></i>
                        </div>
                        <h3 class="fw-bold text-pink mb-1">{{ $totalBerita }}</h3>
                        <p class="text-muted mb-0">Total Berita</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="stat-card bg-white rounded-4 shadow-sm p-4 text-center">
                        <div class="stat-icon mb-3">
                            <i class="bi bi-calendar-check text-pink fs-1"></i>
                        </div>
                        <h3 class="fw-bold text-pink mb-1">{{ $beritaBulanIni }}</h3>
                        <p class="text-muted mb-0">Berita Bulan Ini</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="row mb-4">
                <div class="col-12">
                    <div class="d-flex justify-content-end gap-3 flex-wrap">
                        <a href="{{ route('berita.create') }}" class="btn btn-pink text-white rounded-pill px-4">
                            <i class="bi bi-plus-circle me-2"></i>Tambah Berita
                        </a>
                        <a href="{{ route('kategori.create') }}" class="btn btn-outline-pink rounded-pill px-4">
                            <i class="bi bi-folder-plus me-2"></i>Tambah Kategori
                        </a>

                    </div>
                </div>
            </div>

            <!-- Search + Reset -->
            <div class="d-flex gap-2 mb-4">
                <form method="GET" action="{{ route('kategori.index') }}" class="flex-grow-1">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control rounded-start-pill"
                            placeholder="Cari kategori..." value="{{ request('search') }}">

                        <button class="btn btn-pink text-white rounded-end-pill px-4" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>

                @if (request('search'))
                    <a href="{{ route('kategori.index') }}" class="btn btn-danger rounded-pill px-4">
                        Reset
                    </a>
                @endif
            </div>

            <!-- Kategori Grid -->
            <div class="row">
                @if ($kategori->isEmpty())
                    <div class="col-12">
                        <div class="card border-0 shadow-sm text-center py-5">
                            <div class="card-body">
                                <i class="bi bi-folder-x display-4 text-muted mb-3"></i>
                                <h4 class="text-muted mb-3">Belum ada data kategori</h4>
                                <a href="{{ route('kategori.tambah') }}" class="btn btn-pink text-white rounded-pill px-4">
                                    <i class="bi bi-folder-plus me-2"></i>Tambah Kategori Pertama
                                </a>
                            </div>
                        </div>
                    </div>
                @else
                    @foreach ($kategori as $kat)
                    {{-- row col-md-6 --}}
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="kategori-card card border-0 shadow-sm h-100">

                                <div class="card-header bg-pink text-white py-3">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center">
                                            <i class="bi bi-folder-fill me-2 fs-5"></i>
                                            <h5 class="mb-0 fw-bold">
                                                KAT-{{ str_pad($kat->kategori_id, 3, '0', STR_PAD_LEFT) }}
                                            </h5>
                                        </div>
                                        <span class="badge bg-white text-pink">{{ $kat->berita_count }} Berita</span>
                                    </div>
                                </div>

                                <div class="card-body p-4">
                                    <h4 class="fw-bold text-dark mb-2">{{ $kat->nama }}</h4>
                                    <span class="badge bg-light text-dark mb-3">{{ $kat->slug }}</span>
                                    <p class="text-muted mb-4">
                                        {{ $kat->deskripsi ?? 'Belum ada deskripsi untuk kategori ini.' }}
                                    </p>
                                </div>

                                <div class="card-footer bg-transparent border-0 p-4 pt-0">
                                    <div class="d-flex gap-2">
                                        <a href="{{ route('kategori.edit', $kat->kategori_id) }}"
                                            class="btn btn-outline-primary btn-sm rounded-pill flex-fill">
                                            <i class="bi bi-pencil me-1"></i>Edit
                                        </a>

                                        <form action="{{ route('kategori.destroy', $kat->kategori_id) }}" method="POST"
                                            class="flex-fill">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill w-100">
                                                <i class="bi bi-trash me-1"></i>Hapus
                                            </button>
                                        </form>

                                    </div>
                                </div>

                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

            <!-- Pagination -->
            <div class="mt-4 d-flex justify-content-center">
                {{ $kategori->links('pagination::bootstrap-5') }}
            </div>

        </div>
    </section>

    <style>
        .kategori-hero {
            padding: 80px 0;
        }

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(236, 112, 159, 0.15) !important;
        }

        .stat-icon {
            transition: transform 0.3s ease;
        }

        .stat-card:hover .stat-icon {
            transform: scale(1.1);
        }

        .kategori-card {
            transition: all 0.3s ease;
            border-radius: 15px;
        }

        .kategori-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(236, 112, 159, 0.2) !important;
        }

        .text-pink {
            color: #ec709f !important;
        }

        .bg-pink {
            background: linear-gradient(135deg, #ec709f 0%, #db548a 100%) !important;
        }

        .btn-pink {
            background: linear-gradient(135deg, #ec709f 0%, #db548a 100%) !important;
            border: none;
            transition: all 0.3s ease;
        }

        .btn-pink:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(236, 112, 159, 0.3);
        }

        .btn-outline-pink {
            color: #ec709f;
            border: 2px solid #ec709f;
            background: transparent;
            transition: all 0.3s ease;
        }

        .btn-outline-pink:hover {
            background: #ec709f;
            color: white;
            transform: translateY(-2px);
        }

        @media (max-width: 768px) {
            .kategori-hero {
                padding: 60px 0;
            }

            .display-5 {
                font-size: 2rem;
            }

            .d-flex.justify-content-end {
                justify-content: center !important;
            }

            .btn {
                width: 100%;
                max-width: 250px;
            }
        }
    </style>

@endsection
