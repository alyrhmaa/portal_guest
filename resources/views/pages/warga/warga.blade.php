@extends('layouts.guest.main')

@section('content')
<div class="container mt-4">
    <h2>Data Warga</h2>
    <a href="{{ route('warga.tambah') }}" class="btn btn-primary mb-3">+ Tambah Warga</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>No KTP</th>
                <th>Nama</th>
                <th>Jenis Kelamin</th>
                <th>Agama</th>
                <th>Pekerjaan</th>
                <th>Telp</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($warga as $i => $w)
            <tr>
                <td>{{ $i+1 }}</td>
                <td>{{ $w->no_ktp }}</td>
                <td>{{ $w->nama }}</td>
                <td>{{ $w->jenis_kelamin }}</td>
                <td>{{ $w->agama }}</td>
                <td>{{ $w->pekerjaan }}</td>
                <td>{{ $w->telp }}</td>
                <td>{{ $w->email }}</td>
                <td>
                    <a href="{{ route('warga.edit', $w->warga_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <a href="{{ route('warga.hapus', $w->warga_id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus?')">Hapus</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
