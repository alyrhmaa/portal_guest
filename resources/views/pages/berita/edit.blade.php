@extends('layouts.guest.main')

@section('content')
    <div class="container mt-5">
        <h2 class="mb-4 fw-bold text-primary">Edit Berita</h2>

        {{-- Tampilkan error validation --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $err)
                        <li>{{ $err }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('berita.update', $berita->berita_id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Judul Berita</label>
                <input type="text" name="judul" class="form-control" value="{{ old('judul', $berita->judul) }}" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $berita->penulis) }}"
                    required>
            </div>

            <div class="mb-3">
                <label class="form-label">Kategori</label>
                <select name="kategori_id" class="form-control" required>
                    @foreach ($kategori as $kat)
                        <option value="{{ $kat->kategori_id }}"
                            {{ $kat->kategori_id == old('kategori_id', $berita->kategori_id) ? 'selected' : '' }}>
                            {{ $kat->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Isi Berita</label>
                <textarea name="isi_html" class="form-control" rows="5" required>{{ old('isi_html', $berita->isi_html) }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label">Status</label>
                <select name="status" class="form-control" required>
                    <option value="draft" {{ old('status', $berita->status) == 'draft' ? 'selected' : '' }}>Draft</option>
                    <option value="publish" {{ old('status', $berita->status) == 'publish' ? 'selected' : '' }}>Publish
                    </option>
                </select>
            </div>
            {{-- Multiple Upload --}}
            <div class="mb-3">
                <label>Upload Foto/Media Tambahan</label>
                <input type="file" name="files[]" class="form-control" multiple>
            </div>

            <button type="submit" class="btn btn-primary">💾 Update</button>
            <a href="{{ route('berita.index') }}" class="btn btn-secondary">⬅ Kembali</a>
        </form>
    </div>
@endsection
