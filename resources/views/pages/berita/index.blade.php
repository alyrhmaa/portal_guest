@extends('layouts.guest.main')

@section('content')

    <!-- Hero Section -->
    <section class="py-5 text-white" style="background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%);">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="fw-bold mb-3">Berita Terkini</h1>
                    <p class="lead">Informasi dan berita terbaru dari Desa Kami</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-5 bg-light">
        <div class="container">

            <!-- Filter & Stats -->
            <div class="row mb-5">

                <!-- Stats -->
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card border-0 bg-white shadow-sm text-center p-4">
                                <i class="bi bi-newspaper text-primary fs-1 mb-3"></i>
                                <h3 class="text-primary fw-bold">{{ $berita->count() }}</h3>
                                <p class="text-muted mb-0">Total Berita</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-0 bg-white shadow-sm text-center p-4">
                                <i class="bi bi-calendar-check text-primary fs-1 mb-3"></i>
                                <h3 class="text-primary fw-bold">{{ $berita->where('status', 'publish')->count() }}</h3>
                                <p class="text-muted mb-0">Berita Publik</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-0 bg-primary text-white shadow-sm text-center p-4">
                                <a href="{{ route('berita.create') }}" class="text-white text-decoration-none">
                                    <i class="bi bi-plus-circle fs-1 mb-3"></i>
                                    <h3 class="fw-bold">+</h3>
                                    <p class="mb-0">Tambah Berita</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <h6 class="text-primary fw-bold mb-3"><i class="bi bi-funnel me-2"></i>Filter Kategori</h6>
                            <select class="form-select form-select-sm mb-3">
                                <option>Semua Kategori</option>
                            </select>

                            <h6 class="text-primary fw-bold mb-3"><i class="bi bi-sort-down me-2"></i>Urutan</h6>
                            <select class="form-select form-select-sm">
                                <option>Terbaru</option>
                                <option>Terlama</option>
                            </select>
                        </div>
                    </div>
                </div>

            </div>

            <!-- Action Button -->
            <div class="row mb-4">
                <div class="col-12 text-end">
                    <a href="{{ route('berita.create') }}" class="btn btn-primary text-white px-4">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Berita
                    </a>
                </div>
            </div>

            <!-- Berita Table -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-primary text-white py-3">
                    <h5 class="mb-0 fw-bold"><i class="bi bi-list-ul me-2"></i>Semua Berita</h5>
                </div>

                <div class="card-body p-0">
                    @if ($berita->isEmpty())
                        <div class="text-center py-5">
                            <i class="bi bi-newspaper display-4 text-muted mb-3"></i>
                            <h4 class="text-muted mb-3">Belum ada berita</h4>
                            <a href="{{ route('berita.create') }}" class="btn btn-primary px-4 text-white">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Berita Pertama
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-4">Foto</th>
                                        <th>Judul Berita</th>
                                        <th>Kategori</th>
                                        <th>Penulis</th>
                                        <th>Status</th>
                                        <th width="120" class="text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($berita as $b)
                                        <tr>

                                            <!-- FOTO -->
                                            <td class="ps-4">
                                                @php
                                                    $media = $b->media->first();
                                                @endphp

                                                <img src="{{ $media ? asset('storage/ber
                                                ita/' . $media->file_name) : asset('assets-guest/img/dummy-news.jpg') }}"
                                                    alt="{{ $b->judul }}">

                                            </td>

                                            <!-- JUDUL -->
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-file-text text-primary me-3"></i>
                                                    <div>
                                                        <h6 class="mb-0 fw-bold">{{ $b->judul }}</h6>
                                                        <small class="text-muted">
                                                            {{ \Carbon\Carbon::parse($b->created_at)->format('d M Y') }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>

                                            <!-- KATEGORI -->
                                            <td><span class="badge bg-light text-dark">{{ $b->kategori->nama }}</span></td>

                                            <!-- PENULIS -->
                                            <td><i class="bi bi-person-circle text-primary me-2"></i>{{ $b->penulis }}
                                            </td>

                                            <!-- STATUS -->
                                            <td>
                                                <span
                                                    class="badge {{ $b->status == 'publish' ? 'bg-success' : 'bg-warning' }} rounded-pill">
                                                    <i
                                                        class="bi bi-{{ $b->status == 'publish' ? 'check-circle' : 'clock' }} me-1"></i>
                                                    {{ ucfirst($b->status) }}
                                                </span>
                                            </td>

                                            <!-- AKSI -->
                                            <td class="text-center">
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a href="{{ route('berita.detail', $b->berita_id) }}"
                                                        class="btn btn-outline-info btn-sm rounded-pill px-3"><i
                                                            class="bi bi-eye"></i></a>
                                                    <a href="{{ route('berita.edit', $b->berita_id) }}"
                                                        class="btn btn-outline-primary btn-sm rounded-pill px-3"><i
                                                            class="bi bi-pencil"></i></a>

                                                    <form action="{{ route('berita.destroy', $b->berita_id) }}"
                                                        method="POST">
                                                        @csrf @method('DELETE')
                                                        <button type="submit"
                                                            class="btn btn-outline-danger btn-sm rounded-pill px-3"
                                                            onclick="return confirm('Hapus berita?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>

                                        </tr>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>

    <style>
        .text-primary {
            color: #4e54c8 !important;
        }

        .bg-primary {
            background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%) !important;
        }

        .btn-primary {
            background: linear-gradient(135deg, #4e54c8 0%, #8f94fb 100%) !important;
            border: none;
            border-radius: 8px;
            transition: .3s;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(78, 84, 200, 0.3);
        }

        .table th {
            border-bottom: 2px solid #4e54c8;
            font-weight: 600;
        }

        .table-hover tbody tr:hover {
            background-color: rgba(78, 84, 200, 0.05);
        }
    </style>

@endsection
