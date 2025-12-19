@extends('layouts.guest.main')

@section('content')
    <!-- Hero Section -->
    <section class="py-4 text-white" style="background: linear-gradient(135deg, #ec709f 0%, #db548a 100%);">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="fw-bold mb-2">
                        <i class="bi bi-person-gear me-2"></i>Edit Profil
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-4 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow-sm border-0 rounded-4">
                    <div class="card-header bg-pink text-white text-center py-4 rounded-top-4">
                        <h4 class="mb-0 fw-bold">
                            <i class="bi bi-pencil-square me-2"></i>Edit Data Profil
                        </h4>
                    </div>

                    <div class="card-body text-center p-4">

                        <h4 class="fw-bold mb-4 text-dark">{{ $user->name }}</h4>

                        <!-- FORM EDIT PROFIL -->
                        <!-- FORM EDIT PROFIL -->
                        <form action="{{ route('user.update', $user->id) }}" method="POST" enctype="multipart/form-data"
                            class="text-start">
                            @csrf
                            @method('PUT')

                            {{-- Avatar --}}
                            <div class="profile-avatar-wrapper mb-4 text-center">

                                <img src="{{ $user->profile_picture
                                    ? asset('storage/' . $user->profile_picture)
                                    : 'https://ui-avatars.com/api/?name=' . urlencode($user->name) . '&background=ec709f&color=ffffff' }}"
                                    class="rounded-circle profile-avatar mb-2" width="120">

                                <div class="mt-3">
                                    <label class="form-label fw-semibold text-pink">Foto Profil</label>
                                    <input type="file" name="profile_picture" class="form-control rounded-3 border-pink">
                                </div>

                            </div>


                            <div class="mb-3">
                                <label class="form-label fw-semibold text-pink">Nama Lengkap</label>
                                <input type="text" name="name" value="{{ $user->name }}"
                                    class="form-control rounded-3 border-pink">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-pink">Email</label>
                                <input type="email" name="email" value="{{ $user->email }}"
                                    class="form-control rounded-3 border-pink">
                            </div>

                            <div class="mb-3">
                                <label class="form-label fw-semibold text-pink">Username</label>
                                <input type="text" name="username" value="{{ $user->username }}"
                                    class="form-control rounded-3 border-pink">
                            </div>

                            <div class="mb-4">
                                <label class="form-label fw-semibold text-pink">Password Baru (opsional)</label>
                                <input type="password" name="password" class="form-control rounded-3 border-pink">
                                <small class="text-muted">
                                    <i class="bi bi-info-circle me-1"></i>Kosongkan jika tidak ingin mengubah password
                                </small>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold text-pink">Role User</label>
                                <select name="role" class="form-select rounded-3 border-pink">
                                    <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                    <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option>
                                </select>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="{{ route('profil.index') }}" class="btn btn-outline-pink px-4 rounded-3">
                                    <i class="bi bi-arrow-left me-1"></i>Kembali
                                </a>
                                <button type="submit" class="btn btn-pink text-white px-4 rounded-3">
                                    <i class="bi bi-check-circle me-1"></i>Simpan Perubahan
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

        /* Avatar */
        .profile-avatar {
            width: 100px;
            height: 100px;
            border: 4px solid rgba(236, 112, 159, 0.2);
            object-fit: cover;
        }

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
    </style>
@endsection
