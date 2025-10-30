@extends('layouts.main')

@section('content')
<div class="container py-5">
    <h2 class="text-center mb-4">Login ke Akun Anda</h2>

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('login') }}" method="POST" class="w-50 mx-auto">
        @csrf
        <div class="mb-3">
            <label>Username</label>
            <input type="text" name="username" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Password</label>
            <input type="password" name="password" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success w-100">Login</button>
        <p class="mt-3 text-center">Belum punya akun? <a href="{{ route('register') }}">Daftar di sini</a></p>
    </form>
</div>
@endsection
