@extends('layouts.main')

@section('content')
<div class="container py-5">
    <h1 class="mb-4 text-center text-success fw-bold border-bottom pb-2">📅 Agenda Desa</h1>
    <p class="text-center text-muted mb-5">Jadwal kegiatan, pertemuan, dan acara penting yang akan diselenggarakan oleh Desa.</p>

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
                // ✅ Suasana pelatihan komputer/bisnis
                'poster' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80'
            ],
        ];
    @endphp

    <div class="row g-4">
        @foreach($agenda_items as $agenda)
        <div class="col-12 col-lg-6">
            <div class="card shadow-sm h-100 border-start border-success border-5 agenda-card transition-3d-hover">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img src="{{ $agenda['poster'] }}" class="img-fluid rounded-start object-fit-cover h-100" alt="Poster Agenda" style="min-height: 150px;">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body d-flex flex-column h-100">
                            <h5 class="card-title text-success fw-bold mb-2">
                                {{ $agenda['judul'] }}
                            </h5>
                            <ul class="list-unstyled small text-muted mb-3">
                                <li class="d-flex align-items-center mb-1">
                                    <i class="fas fa-calendar-alt me-2 text-primary"></i>
                                    @if($agenda['tanggal_mulai'] == $agenda['tanggal_selesai'])
                                        <strong>Tanggal:</strong> {{ $formatTanggal($agenda['tanggal_mulai']) }}
                                    @else
                                        <strong>Tanggal:</strong> {{ $formatTanggal($agenda['tanggal_mulai']) }} s/d {{ $formatTanggal($agenda['tanggal_selesai']) }}
                                    @endif
                                </li>
                                <li class="d-flex align-items-center mb-1">
                                    <i class="fas fa-map-marker-alt me-2 text-danger"></i>
                                    <strong>Lokasi:</strong> {{ $agenda['lokasi'] }}
                                </li>
                                <li class="d-flex align-items-center">
                                    <i class="fas fa-user-tie me-2 text-info"></i>
                                    <strong>Penyelenggara:</strong> {{ $agenda['penyelenggara'] }}
                                </li>
                            </ul>
                            <p class="card-text text-dark line-clamp-3 mt-auto">
                                {{ $agenda['deskripsi'] }}
                            </p>
                            <div class="text-end pt-2">
                                <a href="#" class="btn btn-sm btn-outline-success">
                                    Baca Selengkapnya <i class="fas fa-chevron-right ms-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @if(count($agenda_items) === 0)
    <div class="alert alert-warning text-center mt-5" role="alert">
        <h4 class="alert-heading">Tidak Ada Agenda Saat Ini</h4>
        <p>Belum ada kegiatan yang terjadwal dalam waktu dekat.</p>
    </div>
    @endif
</div>

<style>
    @import url('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css');

    .line-clamp-3 {
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .transition-3d-hover {
        transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
    }

    .transition-3d-hover:hover {
        transform: translateY(-5px);
        box-shadow: 0 1rem 3rem rgba(0, 0, 0, 0.1) !important;
    }

    .object-fit-cover {
        object-fit: cover;
    }

    .text-success { color: #28a745 !important; }
    .border-success { border-color: #28a745 !important; }
    .btn-outline-success {
        color: #28a745;
        border-color: #28a745;
    }
    .btn-outline-success:hover {
        background-color: #28a745;
        color: white;
    }
</style>

@endsection
