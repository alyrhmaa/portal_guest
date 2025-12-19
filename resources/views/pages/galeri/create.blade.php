@extends('layouts.guest.main')

@section('content')

<div class="container py-4">

    <h3 class="fw-bold mb-4 text-pink">Tambah Galeri</h3>

    <div class="card shadow-sm rounded-4 p-4 border-0">
        <form action="{{ route('galeri.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-semibold">Judul Galeri</label>
                <input type="text" name="judul" class="form-control rounded-pill" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Deskripsi</label>
                <textarea name="deskripsi" class="form-control rounded-4" rows="4" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-semibold">Upload Foto</label>
                {{-- Multiple Upload --}}
                <input type="file" name="foto[]" class="form-control rounded-pill" multiple accept="image/*">
                <small class="text-muted">Bisa pilih banyak foto sekaligus.</small>
            </div>

            <button type="submit" class="btn btn-primary rounded-pill px-4 w-100 mt-3">

                <i class="bi bi-save me-2"></i> Simpan
            </button>
        </form>
    </div>

</div>

@endsection
