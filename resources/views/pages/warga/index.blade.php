@extends('layouts.guest.main')

@section('content')
<div class="container mt-4">
    <h2 class="text-center mb-4">Data Warga</h2>

    @if (session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif

    <div class="text-center mb-4">
        <a href="{{ route('warga.tambah') }}" class="btn btn-primary">+ Tambah Warga</a>
    </div>

    @if($warga->isEmpty())
        <div class="text-center text-muted">
            <p>Belum ada data warga.</p>
        </div>
    @else
        <div class="row">
            @foreach ($warga as $w)
                <div class="col-md-4 mb-4">
                    <div class="card shadow-sm border-0 h-100">
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-primary">{{ $w->nama }}</h5>
                            <p class="card-text mb-1"><strong>No KTP:</strong> {{ $w->no_ktp }}</p>
                            <p class="card-text mb-1"><strong>Jenis Kelamin:</strong> {{ $w->jenis_kelamin }}</p>
                            <p class="card-text mb-1"><strong>Agama:</strong> {{ $w->agama }}</p>
                            <p class="card-text mb-1"><strong>Pekerjaan:</strong> {{ $w->pekerjaan }}</p>
                            <p class="card-text mb-1"><strong>Telp:</strong> {{ $w->telp }}</p>
                            <p class="card-text mb-3"><strong>Email:</strong> {{ $w->email }}</p>

                            <div class="d-flex justify-content-between">
                                <a href="{{ route('warga.edit', $w->warga_id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('warga.hapus', $w->warga_id) }}" method="POST" onsubmit="return confirm('Yakin hapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>

{{-- Tambahan animasi & efek hover agar tampil lebih modern --}}
<style>
.card {
    transition: all 0.3s ease;
}
.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 15px rgba(0, 0, 0, 0.15);
}
</style>
@endsection
