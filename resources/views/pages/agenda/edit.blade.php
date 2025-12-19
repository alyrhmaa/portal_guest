@extends('layouts.guest.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-pink text-white py-3">
                    <h4 class="mb-0 fw-bold">
                        <i class="bi bi-pencil me-2"></i>Edit Agenda
                    </h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('agenda.update', $agenda->agenda_id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="judul" class="form-label">Judul Agenda <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $agenda->judul) }}" required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="penyelenggara" class="form-label">Penyelenggara <span class="text-danger">*</span></label>
                                <input type="text" class="form-control @error('penyelenggara') is-invalid @enderror" id="penyelenggara" name="penyelenggara" value="{{ old('penyelenggara', $agenda->penyelenggara) }}" required>
                                @error('penyelenggara')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_mulai" class="form-label">Tanggal Mulai <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" id="tanggal_mulai" name="tanggal_mulai" value="{{ old('tanggal_mulai', $agenda->tanggal_mulai->format('Y-m-d')) }}" required>
                                @error('tanggal_mulai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="tanggal_selesai" class="form-label">Tanggal Selesai <span class="text-danger">*</span></label>
                                <input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" id="tanggal_selesai" name="tanggal_selesai" value="{{ old('tanggal_selesai', $agenda->tanggal_selesai->format('Y-m-d')) }}" required>
                                @error('tanggal_selesai')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="lokasi" class="form-label">Lokasi <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('lokasi') is-invalid @enderror" id="lokasi" name="lokasi" value="{{ old('lokasi', $agenda->lokasi) }}" required>
                            @error('lokasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi <span class="text-danger">*</span></label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4" required>{{ old('deskripsi', $agenda->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="poster_dokumen" class="form-label">Poster/Dokumen</label>
                            <input type="file" class="form-control @error('poster_dokumen') is-invalid @enderror" id="poster_dokumen" name="poster_dokumen" accept="image/*">
                            @error('poster_dokumen')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Format: JPEG, PNG, JPG, GIF. Maksimal 2MB.</div>

                            @if($agenda->poster_dokumen)
                                <div class="mt-3">
                                    <p class="text-muted mb-2">Poster Saat Ini:</p>
                                    <img src="{{ asset('storage/agenda/' . $agenda->poster_dokumen) }}"
                                         alt="Current Poster"
                                         class="img-thumbnail"
                                         style="max-height: 200px;">
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" name="hapus_poster" id="hapus_poster" value="1">
                                        <label class="form-check-label text-danger" for="hapus_poster">
                                            Hapus poster saat ini
                                        </label>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('agenda.index') }}" class="btn btn-outline-secondary rounded-pill px-4">
                                <i class="bi bi-arrow-left me-1"></i>Kembali
                            </a>
                            <button type="submit" class="btn btn-pink text-white rounded-pill px-4">
                                <i class="bi bi-save me-1"></i>Update Agenda
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.text-pink {
    color: #ec709f !important;
}

.bg-pink {
    background: linear-gradient(135deg, #ec709f 0%, #db548a 100%) !important;
}

.btn-pink {
    background: linear-gradient(135deg, #ec709f 0%, #db548a 100%) !important;
    border: none;
    transition: all 0.3s ease;
}

.btn-pink:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(236, 112, 159, 0.3);
}

.btn-outline-pink {
    border: 2px solid #ec709f;
    color: #ec709f;
    transition: all 0.3s ease;
}

.btn-outline-pink:hover {
    background: #ec709f;
    color: white;
    transform: translateY(-2px);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const tanggalMulai = document.getElementById('tanggal_mulai');
    const tanggalSelesai = document.getElementById('tanggal_selesai');

    tanggalMulai.addEventListener('change', function() {
        if (this.value) {
            tanggalSelesai.min = this.value;
        }
    });

    // Validasi untuk hapus poster
    const hapusPoster = document.getElementById('hapus_poster');
    const fileInput = document.getElementById('poster_dokumen');

    if (hapusPoster) {
        hapusPoster.addEventListener('change', function() {
            if (this.checked) {
                fileInput.disabled = true;
                fileInput.value = '';
            } else {
                fileInput.disabled = false;
            }
        });
    }
});
</script>
@endsection
