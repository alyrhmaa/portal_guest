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

{{-- Tabel warga hanya muncul jika ada data --}}
@if(isset($warga) && $warga->isNotEmpty())
<div class="container mt-5">
    <h3 class="text-center mb-4">Data Warga</h3>
    <table class="table table-bordered table-striped align-middle shadow-sm">
        <thead class="table-primary">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Pekerjaan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($warga as $key => $item)
            <tr>
                <td>{{ $key + 1 }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jenis_kelamin }}</td>
                <td>{{ $item->pekerjaan }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endif

<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.btn-primary, .btn-outline-primary {
    transition: all 0.3s ease;
}

.btn-primary:hover, .btn-outline-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(74, 123, 200, 0.3);
}
</style>
@endsection
