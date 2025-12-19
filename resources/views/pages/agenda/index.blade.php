@extends('layouts.guest.main')

@section('content')
    <!-- Hero Section -->
    <section class="py-5 text-white" style="background: linear-gradient(135deg, #ec709f 0%, #db548a 100%);">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="fw-bold mb-3">
                        <i class="bi bi-calendar-event me-2"></i>Agenda Desa
                    </h1>
                    <p class="lead mb-0">Jadwal kegiatan, pertemuan, dan acara penting yang akan diselenggarakan oleh Desa.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <section class="py-5 bg-light">
        <div class="container">

            <!-- Stats Section -->
            <div class="row mb-5">
                <div class="col-md-4 mb-3">
                    <div class="stat-card bg-white rounded-4 shadow-sm p-4 text-center">
                        <div class="stat-icon mb-3">
                            <i class="bi bi-calendar-check text-pink fs-1"></i>
                        </div>
                        <h3 class="fw-bold text-pink mb-1">{{ $agenda->where('tanggal_selesai', '>=', now())->count() }}
                        </h3>
                        <p class="text-muted mb-0">Agenda Aktif</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="stat-card bg-white rounded-4 shadow-sm p-4 text-center">
                        <div class="stat-icon mb-3">
                            <i class="bi bi-people text-pink fs-1"></i>
                        </div>
                        <h3 class="fw-bold text-pink mb-1">{{ $agenda->count() }}</h3>
                        <p class="text-muted mb-0">Total Agenda</p>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="stat-card bg-white rounded-4 shadow-sm p-4 text-center">
                        <div class="stat-icon mb-3">
                            <i class="bi bi-plus-circle text-pink fs-1"></i>
                        </div>
                        <h3 class="fw-bold text-pink mb-1">+</h3>
                        <p class="text-muted mb-0">
                            <a href="{{ route('agenda.create') }}" class="text-decoration-none text-muted">Tambah Agenda</a>
                        </p>
                    </div>
                </div>
            </div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Agenda List -->
            <div class="row">

                {{-- Tambahan WAJIB agar tidak error --}}
                @php
                    $formatTanggal = function ($tanggal) {
                        return \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y');
                    };
                @endphp

                @foreach ($agenda as $item)
                    {{-- DEBUG MEDIA (SEMENTARA) --}}
                    {{-- <pre>
                    {{ dd($item->media) }}
                     </pre> --}}

                    @php
                        $hariKegiatan =
                            \Carbon\Carbon::parse($item->tanggal_mulai)->diffInDays($item->tanggal_selesai) + 1;
                        // Multiple Upload
                        $firstMedia = $item->media->first();
                        $posterUrl = $firstMedia
                            ? asset('uploads/agenda/' . $firstMedia->file_name)
                            : 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?auto=format&fit=crop&w=1200&q=80';
                    @endphp

                    <div class="col-12">
                        <div class="agenda-card card border-0 shadow-sm mb-4">
                            <div class="card-header bg-pink text-white py-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <h4 class="mb-0 fw-bold">
                                        <i class="bi bi-megaphone me-2"></i>{{ $item->judul }}
                                    </h4>
                                    <span class="badge bg-white text-pink">
                                        <i class="bi bi-clock me-1"></i>{{ $hariKegiatan }} Hari
                                    </span>
                                </div>
                            </div>

                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="text-center mb-3">
                                            <img src="{{ $posterUrl }}" class="img-fluid rounded-3 shadow-sm"
                                                alt="Poster Agenda"
                                                style="max-height: 200px; width: 100%; object-fit: cover;">
                                        </div>
                                    </div>
                                    <div class="col-md-9">
                                        <div class="agenda-details">

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <i class="bi bi-calendar-date text-pink me-3 fs-5"></i>
                                                        <div>
                                                            <strong class="text-dark">Tanggal:</strong><br>
                                                            <span class="text-muted">
                                                                {{ $formatTanggal($item->tanggal_mulai) }} s/d<br>
                                                                {{ $formatTanggal($item->tanggal_selesai) }}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="d-flex align-items-center mb-2">
                                                        <i class="bi bi-geo-alt text-pink me-3 fs-5"></i>
                                                        <div>
                                                            <strong class="text-dark">Lokasi:</strong><br>
                                                            <span class="text-muted">{{ $item->lokasi }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex align-items-center mb-3">
                                                <i class="bi bi-building text-pink me-3 fs-5"></i>
                                                <div>
                                                    <strong class="text-dark">Penyelenggara:</strong><br>
                                                    <span class="text-muted">{{ $item->penyelenggara }}</span>
                                                </div>
                                            </div>

                                            <div class="agenda-description mb-4">
                                                <strong class="text-dark d-block mb-2">Deskripsi Kegiatan:</strong>
                                                <p class="text-muted mb-0">{{ $item->deskripsi }}</p>
                                            </div>

                                            <div class="d-flex justify-content-between align-items-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('agenda.edit', $item->agenda_id) }}"
                                                        class="btn btn-pink text-white rounded-pill px-4">
                                                        <i class="bi bi-pencil me-1"></i>Edit Agenda
                                                    </a>
                                                </div>
                                                <form action="{{ route('agenda.destroy', $item->agenda_id) }}"
                                                    method="POST" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger rounded-pill px-4"
                                                        onclick="return confirm('Apakah Anda yakin ingin menghapus agenda ini?')">
                                                        <i class="bi bi-trash me-1"></i>Hapus
                                                    </button>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                @endforeach

                <div class="mt-4">
                    {{ $agenda->links('pagination::bootstrap-5') }}
                </div>

                @if ($agenda->count() === 0)
                    <div class="col-12">
                        <div class="card border-0 shadow-sm text-center py-5">
                            <div class="card-body">
                                <i class="bi bi-calendar-x display-4 text-muted mb-3"></i>
                                <h4 class="text-muted mb-3">Belum ada agenda saat ini</h4>
                                <p class="text-muted mb-4">Tidak ada kegiatan yang terjadwal dalam waktu dekat.</p>
                                <a href="{{ route('agenda.create') }}" class="btn btn-pink text-white rounded-pill px-4">
                                    <i class="bi bi-plus-circle me-2"></i>Tambah Agenda Pertama
                                </a>
                            </div>
                        </div>
                    </div>
                @endif

            </div>
        </div>
    </section>

    <style>
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
            border: 2px solid #ec709f;
            color: #ec709f;
            transition: all 0.3s ease;
        }

        .btn-outline-pink:hover {
            background: #ec709f;
            color: white;
            transform: translateY(-2px);
        }

        .stat-card {
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(236, 112, 159, 0.15) !important;
        }

        .agenda-card {
            transition: all 0.3s ease;
            border-radius: 15px;
            overflow: hidden;
        }

        .agenda-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(236, 112, 159, 0.2) !important;
        }

        .agenda-description {
            border-left: 3px solid #ec709f;
            padding-left: 15px;
            background: rgba(236, 112, 159, 0.05);
            padding: 15px;
            border-radius: 8px;
        }
    </style>
@endsection
