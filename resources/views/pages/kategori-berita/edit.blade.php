@extends('layouts.guest.main')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 fw-bold text-primary">Edit Kategori Berita</h2>

        <form action="{{ route('kategori.update', $kategori->kategori_id) }}" method="POST">
            @csrf
           
            <div class="mb-3">
                <label>Nama Kategori</label>
                <input type="text" name="nama" class="form-control" value="{{ $kategori->nama }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Deskripsi</label>
                <textarea name="deskripsi" class="form-control" required>{{ $kategori->deskripsi }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">🔄 Update</button>
            <a href="{{ route('kategori.index') }}" class="btn btn-secondary">⬅️ Kembali</a>
        </form>

    </div>
@endsection
