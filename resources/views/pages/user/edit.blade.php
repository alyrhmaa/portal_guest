@extends('layouts.guest.main')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body text-center">
                    {{-- Avatar (sementara default) --}}
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=random"
                         alt="Avatar"
                         class="rounded-circle mb-3"
                         width="100" height="100">

                    <h4 class="fw-bold mb-4">{{ $user->name }}</h4>

                    <form action="{{ route('profil.update') }}" method="POST" class="text-start">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Nama Lengkap</label>
                            <input type="text" name="name" value="{{ $user->name }}" class="form-control rounded-3">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Email</label>
                            <input type="email" name="email" value="{{ $user->email }}" class="form-control rounded-3">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold">Password Baru (opsional)</label>
                            <input type="password" name="password" class="form-control rounded-3">
                            <small class="text-muted">Kosongkan jika tidak ingin mengubah password</small>
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('profil.index') }}" class="btn btn-outline-secondary px-4">Kembali</a>
                            <button type="submit" class="btn btn-success px-4">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
