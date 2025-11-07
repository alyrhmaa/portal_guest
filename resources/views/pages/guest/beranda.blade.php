@extends('layouts.guest.main')

@section('content')
<div class="container py-5 text-center">
    <h1 class="fw-bold text-primary">Selamat Datang di Portal Desa</h1>
    <p class="text-muted">Ini adalah halaman beranda (guest)</p>
</div>
    <div class="container mt-4">
    @if($warga->isEmpty())
        <p class="text-muted text-center">Belum ada data warga yang ditambahkan.</p>
    @else
        <table class="table table-bordered table-striped align-middle">
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
        <div class="text-end">
            <a href="{{ route('warga.index') }}" class="btn btn-outline-primary btn-sm">Lihat Semua Data</a>
        </div>
    @endif
</div>
@endsection
