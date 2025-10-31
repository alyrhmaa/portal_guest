@extends('layouts.guest.main')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Daftar Akun Baru</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul>
        </div>
    @endif

    <form action="{{ route('register') }}" method="POST" class="w-50 mx-auto">
        @csrf
        <div class="mb-3">
            <label>Nama Lengkap</label>
            <input type="text" name="name" value="{{ old('name') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Email</label>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" value="{{ old('username') }}" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Konfirmasi Password</label>
            <input type="password" name="password_confirmation" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary w-100">Daftar</button>
        <p class="mt-3 text-center">Sudah punya akun? <a href="{{ route('login') }}">Login di sini</a></p>
    </form>
</div>
@endsection
