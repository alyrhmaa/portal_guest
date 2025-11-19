@extends('layouts.guest.main')

@section('content')
<div class="container mt-5">
    <h2 class="mb-4 fw-bold text-primary">Edit Berita</h2>

    <form action="{{ route('berita.update', $berita->berita_id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul Berita</label>
            <input type="text" name="judul" class="form-control" value="{{ $berita->judul }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori</label>
            <select name="kategori_id" class="form-control" required>
                @foreach($kategori as $kat)
                <option value="{{ $kat->kategori_id }}"
                    {{ $kat->kategori_id == $berita->kategori_id ? 'selected' : '' }}>
                    {{ $kat->nama }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Isi Berita</label>
            <textarea name="isi_html" class="form-control" rows="5" required>{{ $berita->isi }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">💾 Update</button>
        <a href="{{ route('berita.index') }}" class="btn btn-secondary">⬅ Kembali</a>
    </form>
</div>
@endsection
