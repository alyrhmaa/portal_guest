@extends('layouts.guest.main')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-gradient text-white" style="background: linear-gradient(135deg, #4a7bc8, #2c5aa0);">
            <h3 class="mb-0 text-center fw-bold">Tambah Data Warga</h3>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('warga.simpan') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">No KTP</label>
                        <input type="text" name="no_ktp" class="form-control rounded-3" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Nama</label>
                        <input type="text" name="nama" class="form-control rounded-3" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select rounded-3" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Agama</label>
                        <input type="text" name="agama" class="form-control rounded-3" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control rounded-3" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold">Telepon</label>
                        <input type="text" name="telp" class="form-control rounded-3">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Email</label>
                    <input type="email" name="email" class="form-control rounded-3">
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary px-4 rounded-3">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                    <a href="{{ route('dashboard') }}" class="btn btn-secondary px-4 rounded-3">
                        <i class="fas fa-arrow-left"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .card {
        max-width: 800px;
        margin: 0 auto;
        animation: fadeInUp 0.6s ease;
    }

    .form-label {
        color: #2c5aa0;
    }

    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(30px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .btn-primary {
        background: linear-gradient(135deg, #4a7bc8, #2c5aa0);
        border: none;
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(74, 123, 200, 0.4);
    }

    .btn-secondary:hover {
        transform: translateY(-2px);
    }
</style>
@endsection
