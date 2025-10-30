@extends('layouts.main')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 fw-bold text-primary">Tambah Kategori Berita</h2>

    <form action="{{ route('kategori.simpan') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Nama Kategori</label>
            <input type="text" name="nama" class="form-control" required placeholder="Masukkan nama kategori">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" placeholder="Deskripsi singkat kategori (opsional)"></textarea>
        </div>

        <button type="submit" class="btn btn-success">💾 Simpan</button>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
    </form>
</div>
@endsection
