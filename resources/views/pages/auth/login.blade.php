@extends('layouts.guest.main')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            {{-- Card login --}}
            <div class="card border-0 shadow-sm rounded-4">
                <div class="card-body p-4">
                    <h3 class="text-center mb-4 fw-bold">Login ke Akun Anda</h3>

                    {{-- Alert --}}
                    @if (session('error'))
                        <div class="alert alert-danger mb-3">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success mb-3">{{ session('success') }}</div>
                    @endif

                    {{-- Form --}}
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Email</label>
                            <input type="text" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Password</label>
                            <input type="password" id="password" name="password" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100 fw-semibold">
                            Login
                        </button>
                    </form>

                    <p class="text-center mt-3 mb-0">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="text-decoration-none fw-semibold text-success">
                            Daftar di sini
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
