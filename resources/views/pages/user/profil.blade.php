@extends('layouts.guest.main')

@section('content')
    <!-- Hero Section -->
    <section class="py-4 text-white" style="background: linear-gradient(135deg, #ec709f 0%, #db548a 100%);">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="fw-bold mb-2">
                        <i class="bi bi-person-circle me-2"></i>Profil User
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0 shadow-sm rounded-4 profile-card">
                    <div class="card-header bg-pink text-white text-center py-4 rounded-top-4">
                        <h3 class="mb-0 fw-bold">
                            <i class="bi bi-person-badge me-2"></i>Profil Saya
                        </h3>
                    </div>

                    <div class="card-body p-4 text-center">
                        <div class="profile-avatar-wrapper mb-4">
                            <div class="profile-avatar mx-auto overflow-hidden">
                                @if ($user->profile_picture)
                                    <img src="{{ asset('storage/' . $user->profile_picture) }}?v={{ time() }}"
                                        alt="Foto Profil" class="w-100 h-100"
                                        style="object-fit: cover; border-radius: 50%;">
                                @else
                                    <div class="d-flex justify-content-center align-items-center w-100 h-100"
                                        style="border-radius:50%; font-size:40px; font-weight:600; color:#ec709f;">
                                        {{ strtoupper(substr($user->name, 0, 2)) }}
                                    </div>
                                @endif
                            </div>


                            <div class="status-dot"></div>
                        </div>

                        <h3 class="profile-name text-dark mb-2">{{ ucfirst($user->name) }}</h3>
                        <p class="profile-email text-muted mb-4">{{ $user->email }}</p>

                        <div class="profile-info mb-4">
                            <div class="row text-start">
                                <div class="col-12 mb-3">
                                    <div class="d-flex align-items-center p-3 rounded-3"
                                        style="background: rgba(236, 112, 159, 0.05);">
                                        <i class="bi bi-person text-pink me-3 fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Username</small>
                                            <strong class="text-dark">{{ $user->username }}</strong>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 mb-3">
                                    <div class="d-flex align-items-center p-3 rounded-3"
                                        style="background: rgba(236, 112, 159, 0.05);">
                                        <i class="bi bi-clock-history text-pink me-3 fs-5"></i>
                                        <div>
                                            <small class="text-muted d-block">Terakhir Login</small>
                                            <strong class="text-dark">
                                                {{ $user->last_login ? \Carbon\Carbon::parse($user->last_login)->format('d M Y H:i') : 'Belum login' }}
                                            </strong>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  

                        <div class="d-flex justify-content-center gap-3">
                            <a href="{{ route('profil.edit') }}" class="btn btn-pink text-white rounded-pill px-4">

                                <i class="bi bi-pencil-square me-2"></i> Edit Profil
                            </a>

                            <form method="POST" action="{{ route('logout') }}" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-outline-pink rounded-pill px-4">
                                    <i class="bi bi-box-arrow-right me-2"></i> Logout
                                </button>
                            </form>
                        </div>
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

        /* Profile Card */
        .profile-card {
            animation: fadeInUp 0.6s ease;
            border: none;
        }

        .profile-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(236, 112, 159, 0.15) !important;
        }

        .rounded-top-4 {
            border-top-left-radius: 20px !important;
            border-top-right-radius: 20px !important;
        }

        /* Profile Avatar */
        .profile-avatar-wrapper {
            position: relative;
            display: inline-block;
        }

        .profile-avatar {
            width: 120px;
            height: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background-color: rgba(236, 112, 159, 0.1);
            border: 4px solid rgba(236, 112, 159, 0.2);
        }

        .status-dot {
            position: absolute;
            bottom: 10px;
            right: 10px;
            width: 20px;
            height: 20px;
            background-color: #22c55e;
            border: 3px solid white;
            border-radius: 50%;
        }

        /* Profile Info */
        .profile-name {
            font-weight: 700;
            font-size: 1.8rem;
        }

        .profile-email {
            font-size: 1.1rem;
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
            .profile-card {
                margin: 0 15px;
            }

            .d-flex.justify-content-center {
                flex-direction: column;
                gap: 1rem;
            }

            .btn {
                width: 100%;
            }
        }

        @media (max-width: 576px) {
            .card-header h3 {
                font-size: 1.3rem;
            }

            .profile-name {
                font-size: 1.5rem;
            }

            .profile-avatar {
                width: 100px;
                height: 100px;
            }

            .profile-avatar i {
                font-size: 4rem !important;
            }
        }
    </style>
@endsection
