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
                <p class="lead mb-0">Jadwal kegiatan, pertemuan, dan acara penting yang akan diselenggarakan oleh Desa.</p>
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
                    <h3 class="fw-bold text-pink mb-1">1</h3>
                    <p class="text-muted mb-0">Agenda Aktif</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stat-card bg-white rounded-4 shadow-sm p-4 text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-people text-pink fs-1"></i>
                    </div>
                    <h3 class="fw-bold text-pink mb-1">3</h3>
                    <p class="text-muted mb-0">Hari Kegiatan</p>
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="stat-card bg-white rounded-4 shadow-sm p-4 text-center">
                    <div class="stat-icon mb-3">
                        <i class="bi bi-plus-circle text-pink fs-1"></i>
                    </div>
                    <h3 class="fw-bold text-pink mb-1">+</h3>
                    <p class="text-muted mb-0">Tambah Agenda</p>
                </div>
            </div>
        </div>

        <!-- Agenda List -->
        <div class="row">
            @php
                $formatTanggal = function($tanggal) {
                    return \Carbon\Carbon::parse($tanggal)->translatedFormat('d F Y');
                };

                $agenda_items = [
                    [
                        'judul' => 'Pelatihan Digital Marketing untuk UMKM',
                        'lokasi' => 'Aula Serbaguna',
                        'tanggal_mulai' => '2025-12-05',
                        'tanggal_selesai' => '2025-12-07',
                        'penyelenggara' => 'Dinas Koperasi dan UKM',
                        'deskripsi' => 'Pelatihan intensif selama 3 hari bagi pelaku UMKM agar mampu memasarkan produk secara daring.',
                        'poster' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
                    ],
                ];
            @endphp

            @foreach($agenda_items as $agenda)
            <div class="col-12">
                <div class="agenda-card card border-0 shadow-sm mb-4">
                    <div class="card-header bg-pink text-white py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h4 class="mb-0 fw-bold">
                                <i class="bi bi-megaphone me-2"></i>{{ $agenda['judul'] }}
                            </h4>
                            <span class="badge bg-white text-pink">
                                <i class="bi bi-clock me-1"></i>3 Hari
                            </span>
                        </div>
                    </div>

                    <div class="card-body p-4">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="text-center mb-3">
                                    <img src="{{ $agenda['poster'] }}" class="img-fluid rounded-3 shadow-sm" alt="Poster Agenda" style="max-height: 200px; width: 100%; object-fit: cover;">
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
                                                        {{ $formatTanggal($agenda['tanggal_mulai']) }} s/d<br>
                                                        {{ $formatTanggal($agenda['tanggal_selesai']) }}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="d-flex align-items-center mb-2">
                                                <i class="bi bi-geo-alt text-pink me-3 fs-5"></i>
                                                <div>
                                                    <strong class="text-dark">Lokasi:</strong><br>
                                                    <span class="text-muted">{{ $agenda['lokasi'] }}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="d-flex align-items-center mb-3">
                                        <i class="bi bi-building text-pink me-3 fs-5"></i>
                                        <div>
                                            <strong class="text-dark">Penyelenggara:</strong><br>
                                            <span class="text-muted">{{ $agenda['penyelenggara'] }}</span>
                                        </div>
                                    </div>

                                    <div class="agenda-description mb-4">
                                        <strong class="text-dark d-block mb-2">Deskripsi Kegiatan:</strong>
                                        <p class="text-muted mb-0">{{ $agenda['deskripsi'] }}</p>
                                    </div>

                                    <div class="text-end">
                                        <a href="#" class="btn btn-pink text-white rounded-pill px-4">
                                            Baca Selengkapnya <i class="bi bi-chevron-right ms-1"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            @if(count($agenda_items) === 0)
            <div class="col-12">
                <div class="card border-0 shadow-sm text-center py-5">
                    <div class="card-body">
                        <i class="bi bi-calendar-x display-4 text-muted mb-3"></i>
                        <h4 class="text-muted mb-3">Belum ada agenda saat ini</h4>
                        <p class="text-muted mb-4">Tidak ada kegiatan yang terjadwal dalam waktu dekat.</p>
                        <a href="#" class="btn btn-pink text-white rounded-pill px-4">
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
/* Warna Pink */
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

/* Stat Cards */
.stat-card {
    transition: all 0.3s ease;
    border: none;
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

/* Agenda Cards */
.agenda-card {
    transition: all 0.3s ease;
    border-radius: 15px;
    overflow: hidden;
}

.agenda-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(236, 112, 159, 0.2) !important;
}

.agenda-details {
    padding: 10px 0;
}

.agenda-description {
    border-left: 3px solid #ec709f;
    padding-left: 15px;
    background: rgba(236, 112, 159, 0.05);
    padding: 15px;
    border-radius: 8px;
}

/* Badges */
.badge {
    font-size: 0.75rem;
    font-weight: 600;
    padding: 0.5em 0.75em;
}

/* Responsive */
@media (max-width: 768px) {
    .display-5 {
        font-size: 2rem;
    }

    .agenda-card .row {
        flex-direction: column;
    }

    .agenda-card .col-md-3 {
        margin-bottom: 1rem;
    }

    .agenda-card .col-md-9 {
        padding-left: 0;
    }

    .text-end {
        text-align: center !important;
    }

    .btn {
        width: 100%;
        max-width: 250px;
    }
}

@media (max-width: 576px) {
    .card-header h4 {
        font-size: 1.1rem;
    }

    .agenda-details .row {
        flex-direction: column;
    }

    .agenda-details .col-md-6 {
        margin-bottom: 1rem;
    }
}
</style>
@endsection
