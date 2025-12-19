@extends('layouts.guest.main')

@section('content')
    <div class="container py-4">

        <h3 class="fw-bold mb-4 text-pink">Edit Galeri</h3>

        <div class="card shadow-sm rounded-4 p-4 border-0">

            <!-- FORM UPDATE GALERI -->
            <form action="{{ route('galeri.update', $galeri->galeri_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <!-- JUDUL -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Judul Galeri</label>
                    <input type="text" name="judul" class="form-control rounded-pill" required
                        value="{{ $galeri->judul }}">
                </div>

                <!-- DESKRIPSI -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="deskripsi" class="form-control rounded-4" rows="4" required>{{ $galeri->deskripsi }}</textarea>
                </div>

                <hr>

                <!-- FOTO SAAT INI -->
                <h5 class="fw-bold mb-3">Foto Saat Ini</h5>

                <div class="row">
                    @foreach ($galeri->media as $m)
                        <div class="col-md-3 mb-4 text-center">

                            <div class="shadow-sm rounded-4 overflow-hidden mb-2">
                                <img src="{{ asset('uploads/galeri/' . $m->file_name) }}" class="w-100"
                                    style="height:130px; object-fit:cover;">
                            </div>

                            <!-- BUTTON HAPUS FOTO -->
                            @auth
                                @if (auth()->user()->role === 'admin')
                                    <button type="button"
                                        class="btn btn-sm btn-danger rounded-pill px-3 w-100"
                                        onclick="hapusFoto('{{ route('galeri.deleteFoto', $m->media_id) }}')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                @endif
                            @endauth

                        </div>
                    @endforeach
                </div>

                <hr>

                <!-- TAMBAH FOTO BARU -->
                <div class="mb-3">
                    <label class="form-label fw-semibold">Tambah Foto Baru</label>
                    <input type="file" name="foto[]" class="form-control rounded-pill" multiple>
                </div>

                <!-- TOMBOL SIMPAN -->
                <button type="submit" class="btn btn-pink text-white rounded-pill px-4 w-100 mt-3">
                    <i class="bi bi-save me-2"></i> Simpan Perubahan
                </button>

            </form>

        </div>

    </div>

    <!-- SCRIPT HAPUS FOTO -->
    <script>
        function hapusFoto(url) {
            if (confirm("Yakin ingin menghapus foto ini?")) {

                let form = document.createElement("form");
                form.action = url;
                form.method = "POST";

                let csrf = document.createElement("input");
                csrf.type = "hidden";
                csrf.name = "_token";
                csrf.value = "{{ csrf_token() }}";

                let method = document.createElement("input");
                method.type = "hidden";
                method.name = "_method";
                method.value = "DELETE";

                form.appendChild(csrf);
                form.appendChild(method);

                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>

@endsection
