@extends('layouts.guest.main')

@section('content')
<div class="container mt-4">
    <h2>Edit Data Warga</h2>

    {{-- Form Update --}}
    <form action="{{ route('warga.update', $warga->warga_id) }}" method="POST">
        @csrf
        @method('PUT') {{-- penting supaya Laravel tahu ini UPDATE --}}

        <div class="mb-3">
            <label>No KTP</label>
            <input type="text" name="no_ktp" class="form-control" value="{{ $warga->no_ktp }}" required>
        </div>

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" class="form-control" value="{{ $warga->nama }}" required>
        </div>

        <div class="mb-3">
            <label>Jenis Kelamin</label>
            <select name="jenis_kelamin" class="form-control" required>
                <option value="Laki-laki" {{ $warga->jenis_kelamin == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $warga->jenis_kelamin == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-3">
            <label>Agama</label>
            <input type="text" name="agama" class="form-control" value="{{ $warga->agama }}" required>
        </div>

        <div class="mb-3">
            <label>Pekerjaan</label>
            <input type="text" name="pekerjaan" class="form-control" value="{{ $warga->pekerjaan }}" required>
        </div>

        <div class="mb-3">
            <label>Telp</label>
            <input type="text" name="telp" class="form-control" value="{{ $warga->telp }}">
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" class="form-control" value="{{ $warga->email }}">
        </div>

        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
        <a href="{{ route('warga.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection
