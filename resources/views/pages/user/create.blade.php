@extends('layouts.guest.main')

@section('content')

    <!-- Hero Section -->
    <section class="py-4 text-white" style="background: linear-gradient(135deg, #ec709f 0%, #db548a 100%);">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="fw-bold mb-2">
                        <i class="bi bi-person-plus me-2"></i>Tambah Data User
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">

                {{-- CARD TAMBAH USER --}}
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-pink text-white text-center py-4 rounded-top-4">
                        <h4 class="fw-bold mb-0">
                            <i class="bi bi-person-plus-fill me-2"></i> Tambah Data User
                        </h4>
                    </div>

                    <div class="card-body px-4 pb-4">
                        @if ($errors->any())
                            <div class="alert alert-danger rounded-3">
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

                        <form action="{{ route('user.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label fw-semibold text-pink">Nama</label>
                                <input type="text" name="name" id="name"
                                    class="form-control form-control-lg rounded-3 border-pink"
                                    placeholder="Masukkan nama lengkap" required>
                            </div>

                            <div class="mb-3">
                                <label for="username" class="form-label fw-semibold text-pink">Username</label>
                                <input type="text" name="username" id="username"
                                    class="form-control form-control-lg rounded-3 border-pink"
                                    placeholder="Masukkan username" required>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label fw-semibold text-pink">Email</label>
                                <input type="email" name="email" id="email"
                                    class="form-control form-control-lg rounded-3 border-pink"
                                    placeholder="Masukkan alamat email" required>
                            </div>

                            <div class="mb-4">
                                <label for="password" class="form-label fw-semibold text-pink">Password</label>
                                <input type="password" name="password" id="password"
                                    class="form-control form-control-lg rounded-3 border-pink"
                                    placeholder="Minimal 4 karakter" required>
                                <div class="form-text text-muted">
                                    <i class="bi bi-info-circle me-1"></i>Password harus minimal 4 karakter
                                </div>
                            </div>

                            <div class="d-grid">
                                <div class="mb-3">
                                    <label for="status" class="form-label fw-semibold text-pink">Status User</label>
                                    <select name="status" id="status"
                                        class="form-select form-select-lg rounded-3 border-pink" required>
                                        <option value="aktif">Aktif</option>
                                        <option value="nonaktif">Nonaktif</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="role" class="form-label fw-semibold text-pink">Role User</label>
                                    <select name="role" id="role"
                                        class="form-select form-select-lg rounded-3 border-pink" required>
                                        <option value="admin">Admin</option>
                                        <option value="user" selected>User</option>
                                    </select>
                                </div>

                                <button type="submit" class="btn btn-pink text-white btn-lg rounded-3">
                                    <i class="bi bi-check-circle me-1"></i> Simpan Data User
                                </button>
                            </div>
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
            background-color: #ffffff;
            border-radius: 20px;
            transition: all 0.3s ease-in-out;
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

        /* Hero Section */
        .py-4 {
            padding-top: 2rem !important;
            padding-bottom: 2rem !important;
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

            .form-control-lg {
                font-size: 0.9rem;
                padding: 0.6rem 0.8rem;
            }
        }

        @media (max-width: 576px) {
            .card-header h4 {
                font-size: 1.2rem;
            }

            .btn-lg {
                padding: 0.75rem 1rem;
                font-size: 1rem;
            }
        }
    </style>
@endsection
