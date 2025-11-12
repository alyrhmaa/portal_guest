@extends('layouts.guest.main')

@section('content')
<div class="container mt-5">
    <h2 class="text-center fw-bold mb-4" style="color:#2c5aa0;">Data Warga</h2>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="text-end mb-4">
        <a href="{{ route('warga.tambah') }}" class="btn btn-primary rounded-3 px-3">
            <i class="fas fa-user-plus"></i> Tambah Warga
        </a>
    </div>

    @if($warga->isEmpty())
        <div class="text-center text-muted">
            <i class="fas fa-users fa-3x mb-3"></i>
            <p>Belum ada data warga yang terdaftar.</p>
        </div>
    @else
        <div class="row g-4">
            @foreach($warga as $item)
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm rounded-4 h-100 warga-card">
                        <div class="card-body">
                            <div class="d-flex align-items-center mb-3">
                                <div class="icon-circle bg-gradient">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div class="ms-3">
                                    <h5 class="fw-bold mb-0" style="color:#2c5aa0;">{{ $item->nama }}</h5>
                                    <small class="text-muted">{{ $item->pekerjaan }}</small>
                                </div>
                            </div>

                            <ul class="list-unstyled mb-3">
                                <li><strong>No KTP:</strong> {{ $item->no_ktp }}</li>
                                <li><strong>Jenis Kelamin:</strong> {{ $item->jenis_kelamin }}</li>
                                <li><strong>Agama:</strong> {{ $item->agama }}</li>
                                <li><strong>Telp:</strong> {{ $item->telp ?? '-' }}</li>
                                <li><strong>Email:</strong> {{ $item->email ?? '-' }}</li>
                            </ul>
                        </div>
                        <div class="card-footer d-flex justify-content-between bg-transparent border-0 pb-3 px-3">
                            <a href="{{ route('warga.edit', $item->warga_id) }}" class="btn btn-warning btn-sm rounded-3">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('warga.hapus', $item->warga_id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm rounded-3">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

<style>
    .icon-circle {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        background: linear-gradient(135deg, #4a7bc8, #2c5aa0);
    }

    .warga-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }

    .warga-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.15);
    }

    .btn-primary {
        background: linear-gradient(135deg, #4a7bc8, #2c5aa0);
        border: none;
    }
</style>
@endsection
