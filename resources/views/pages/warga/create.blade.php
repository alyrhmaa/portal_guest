@extends('layouts.guest.main')

@section('content')

<!-- Hero Section -->
<section class="py-4 text-white" style="background: linear-gradient(135deg, #ec709f 0%, #db548a 100%);">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="fw-bold mb-2">
                    <i class="bi bi-person-plus me-2"></i>Tambah Data Warga
                </h1>
            </div>
        </div>
    </div>
</section>

<div class="container mt-4 mb-5">
    <div class="card shadow-lg border-0 rounded-4">
        <div class="card-header bg-pink text-white text-center py-4 rounded-top-4">
            <h3 class="mb-0 fw-bold">
                <i class="bi bi-person-fill-add me-2"></i>Form Tambah Data Warga
            </h3>
        </div>

        <div class="card-body p-4">
            <form action="{{ route('warga.simpan') }}" method="POST">
                @csrf

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-pink">No KTP</label>
                        <input type="text" name="no_ktp" class="form-control rounded-3 border-pink" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-pink">Nama</label>
                        <input type="text" name="nama" class="form-control rounded-3 border-pink" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-pink">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-select rounded-3 border-pink" required>
                            <option value="">-- Pilih --</option>
                            <option value="Laki-laki">Laki-laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-pink">Agama</label>
                        <input type="text" name="agama" class="form-control rounded-3 border-pink" required>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-pink">Pekerjaan</label>
                        <input type="text" name="pekerjaan" class="form-control rounded-3 border-pink" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label fw-semibold text-pink">Telepon</label>
                        <input type="text" name="telp" class="form-control rounded-3 border-pink">
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label fw-semibold text-pink">Email</label>
                    <input type="email" name="email" class="form-control rounded-3 border-pink">
                </div>

                <div class="text-center mt-4">
                    <button type="submit" class="btn btn-pink text-white px-4 rounded-3 me-3">
                        <i class="bi bi-check-circle me-1"></i> Simpan
                    </button>
                    <a href="{{ route('warga.index') }}" class="btn btn-outline-pink px-4 rounded-3">
                        <i class="bi bi-arrow-left me-1"></i> Kembali
                    </a>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
/* Warna Pink */
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
    color: #ec709f;
    border: 2px solid #ec709f;
    background: transparent;
    transition: all 0.3s ease;
}

.btn-outline-pink:hover {
    background: #ec709f;
    color: white;
    transform: translateY(-2px);
}

.border-pink {
    border-color: #ec709f !important;
}

/* Card Styling */
.card {
    max-width: 800px;
    margin: 0 auto;
    animation: fadeInUp 0.6s ease;
    border: none;
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 35px rgba(236, 112, 159, 0.15) !important;
}

.rounded-top-4 {
    border-top-left-radius: 20px !important;
    border-top-right-radius: 20px !important;
}

/* Form Styling */
.form-control, .form-select {
    padding: 0.75rem 1rem;
    border: 2px solid #e9ecef;
    box-shadow: none;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #ec709f;
    box-shadow: 0 0 0 0.2rem rgba(236, 112, 159, 0.1);
}

.form-label {
    font-weight: 600;
    margin-bottom: 0.5rem;
}

/* Animations */
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

/* Responsive */
@media (max-width: 768px) {
    .container {
        padding-left: 15px;
        padding-right: 15px;
    }

    .card-body {
        padding: 1.5rem 1rem;
    }

    .form-control, .form-select {
        padding: 0.6rem 0.8rem;
    }

    .text-center .btn {
        width: 100%;
        margin-bottom: 10px;
    }

    .text-center .me-3 {
        margin-right: 0 !important;
    }
}

@media (max-width: 576px) {
    .card-header h3 {
        font-size: 1.3rem;
    }

    .btn {
        padding: 0.75rem 1rem;
        font-size: 1rem;
    }
}
</style>
@endsection
