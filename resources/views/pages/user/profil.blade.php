@extends('layouts.guest.main')

@section('content')
<style>
    body {
        background: linear-gradient(-45deg, #6a11cb, #2575fc, #43cea2, #185a9d);
        background-size: 400% 400%;
        animation: gradientShift 12s ease infinite;
    }

    @keyframes gradientShift {
        0% {background-position: 0% 50%;}
        50% {background-position: 100% 50%;}
        100% {background-position: 0% 50%;}
    }

    .profile-section {
        min-height: 85vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding: 40px 0;
    }

    .profile-card {
        backdrop-filter: blur(14px);
        background: rgba(255, 255, 255, 0.15);
        border-radius: 25px;
        padding: 40px 35px;
        width: 430px;
        text-align: center;
        box-shadow: 0 15px 35px rgba(0,0,0,0.25);
        color: #fff;
        transform: translateY(20px);
        opacity: 0;
        animation: fadeUp 0.8s ease forwards;
    }

    @keyframes fadeUp {
        from {opacity: 0; transform: translateY(30px);}
        to {opacity: 1; transform: translateY(0);}
    }

    .profile-avatar {
        border-radius: 50%;
        width: 130px;
        height: 130px;
        object-fit: cover;
        border: 4px solid #fff;
        box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        transition: all 0.3s ease;
        position: relative;
    }

    .profile-avatar:hover {
        transform: scale(1.05);
    }

    .status-dot {
        position: absolute;
        bottom: 10px;
        right: 18px;
        width: 18px;
        height: 18px;
        background-color: #22c55e;
        border: 3px solid #fff;
        border-radius: 50%;
    }

    .profile-name {
        font-weight: 700;
        font-size: 1.7rem;
        margin-top: 18px;
        color: #fff;
    }

    .profile-email {
        font-size: 1rem;
        color: #f1f1f1;
        margin-bottom: 30px;
    }

    .btn-custom {
        border-radius: 30px;
        padding: 10px 25px;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-custom:hover {
        transform: scale(1.05);
        box-shadow: 0 5px 15px rgba(255,255,255,0.2);
    }
</style>

<div class="profile-section">
    <div class="profile-card">
        <div class="d-flex justify-content-center position-relative">
            <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=ffffff&color=5563DE&size=128"
                 alt="Avatar"
                 class="profile-avatar">
            <div class="status-dot"></div>
        </div>

        <h3 class="profile-name mt-3">{{ ucfirst($user->name) }}</h3>
        <p class="profile-email">{{ $user->email }}</p>

        <div class="d-flex justify-content-center gap-3 mt-4">
            <a href="{{ route('profil.edit') }}" class="btn btn-light btn-custom text-primary">
                <i class="bi bi-pencil-square"></i> Edit Profil
            </a>
            <a href="{{ route('logout') }}" class="btn btn-danger btn-custom">
                <i class="bi bi-box-arrow-right"></i> Logout
            </a>
        </div>
    </div>
</div>
@endsection
