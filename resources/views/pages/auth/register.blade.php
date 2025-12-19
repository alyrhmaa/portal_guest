@extends('layouts.guest.main')

@section('content')

<!-- Hero Section -->
<section class="py-4 text-white" style="background: linear-gradient(135deg, #ec709f 0%, #db548a 100%);">
    <div class="container">
        <div class="row text-center">
            <div class="col-12">
                <h1 class="fw-bold mb-2">
                    <i class="bi bi-person-plus me-2"></i>Daftar Akun Baru
                </h1>
            </div>
        </div>
    </div>
</section>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-header bg-pink text-white text-center py-4 rounded-top-4">
                    <h3 class="mb-0 fw-bold">
                        <i class="bi bi-person-fill-add me-2"></i>Form Pendaftaran
                    </h3>
                </div>

                <div class="card-body p-4">
                    @if ($errors->any())
                        <div class="alert alert-danger rounded-3 mb-4">
                            <strong class="d-block mb-2">
                                <i class="bi bi-exclamation-triangle me-1"></i>Terjadi kesalahan:
                            </strong>
                            <ul class="mb-0 mt-2 ps-3">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-pink">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ old('name') }}"
                                   class="form-control rounded-3 border-pink" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-pink">Email</label>
                            <input type="email" name="email" value="{{ old('email') }}"
                                   class="form-control rounded-3 border-pink" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-pink">Username</label>
                            <input type="text" name="username" value="{{ old('username') }}"
                                   class="form-control rounded-3 border-pink" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-pink">Password</label>
                            <input type="password" name="password"
                                   class="form-control rounded-3 border-pink" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-pink">Konfirmasi Password</label>
                            <input type="password" name="password_confirmation"
                                   class="form-control rounded-3 border-pink" required>
                        </div>

                        <button type="submit" class="btn btn-pink text-white w-100 rounded-3 py-2 fw-semibold">
                            <i class="bi bi-person-plus me-2"></i>Daftar
                        </button>

                        <p class="mt-4 text-center text-muted mb-0">
                            Sudah punya akun?
                            <a href="{{ route('login') }}" class="text-decoration-none fw-semibold text-pink">
                                Login di sini
                            </a>
                        </p>
                    </form>
                </div>
            </div>
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

.border-pink {
    border-color: #ec709f !important;
}

/* Card Styling */
.card {
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
.form-control {
    padding: 0.75rem 1rem;
    border: 2px solid #e9ecef;
    box-shadow: none;
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #ec709f;
    box-shadow: 0 0 0 0.2rem rgba(236, 112, 159, 0.1);
}

.form-label {
    font-weight: 600;
    margin-bottom: 0.5rem;
}

/* Alert Styling */
.alert {
    border: none;
    border-radius: 12px;
    border-left: 4px solid #dc3545;
}

.alert-danger {
    background: rgba(220, 53, 69, 0.05);
    color: #721c24;
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

    .col-md-6 {
        padding: 0 10px;
    }

    .card-body {
        padding: 1.5rem 1rem;
    }

    .form-control {
        padding: 0.6rem 0.8rem;
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

    .py-5 {
        padding-top: 2rem !important;
        padding-bottom: 2rem !important;
    }
}
</style>
@endsection
