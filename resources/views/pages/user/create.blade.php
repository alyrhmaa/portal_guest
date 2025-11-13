@extends('layouts.guest.main')

@section('content')
<div class="container mt-5 mb-5">

    <div class="row justify-content-center">
        <div class="col-md-6">

            {{-- CARD TAMBAH USER --}}
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-header bg-white border-0 text-center py-4">
                    <h4 class="fw-bold text-primary mb-0">
                        <i class="bi bi-person-plus-fill me-2"></i> Tambah Data User
                    </h4>
                </div>

                <div class="card-body px-4 pb-4">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <strong>Terjadi kesalahan:</strong>
                            <ul class="mb-0 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nama</label>
                            <input type="text" name="name" id="name" class="form-control form-control-lg rounded-3"
                                   placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label fw-semibold">Username</label>
                            <input type="text" name="username" id="username" class="form-control form-control-lg rounded-3"
                                   placeholder="Masukkan username" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" id="email" class="form-control form-control-lg rounded-3"
                                   placeholder="Masukkan alamat email" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" name="password" id="password" class="form-control form-control-lg rounded-3"
                                   placeholder="Minimal 4 karakter" required>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-success btn-lg rounded-3">
                                <i class="bi bi-check-circle me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

</div>

@push('styles')
<style>
    .card {
        background-color: #ffffff;
        border-radius: 20px;
        transition: all 0.3s ease-in-out;
    }
    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.08);
    }
    .form-control {
        padding: 0.75rem 1rem;
        border: 1px solid #dee2e6;
        box-shadow: none;
    }
    .form-control:focus {
        border-color: #6c63ff;
        box-shadow: 0 0 0 0.2rem rgba(108,99,255,0.1);
    }
    .btn-success {
        background-color: #28a745;
        border: none;
        transition: all 0.2s;
    }
    .btn-success:hover {
        background-color: #218838;
    }
</style>
@endpush
@endsection
