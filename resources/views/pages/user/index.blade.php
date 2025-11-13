@extends('layouts.guest.main')

@section('content')
<div class="container mt-5">

    {{-- PROFIL USER LOGIN --}}
    @php
        $currentUser = Session::get('user');
    @endphp

    @if ($currentUser)
    <div class="card user-profile-card mb-4 shadow-sm border-0">
        <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
            <div class="d-flex align-items-center mb-3 mb-md-0">
                <div class="profile-avatar me-3">
                    <i class="bi bi-person-circle" style="font-size: 3rem; color: #6c63ff;"></i>
                </div>
                <div>
                    <h5 class="mb-1">{{ $currentUser->name }}</h5>
                    <p class="mb-0 text-muted">{{ $currentUser->email }}</p>
                    <small class="text-secondary">Username: {{ $currentUser->username }}</small>
                </div>
            </div>
            <div class="text-md-end">
                <p class="text-muted mb-2">
                    <i class="bi bi-clock-history"></i>
                    Terakhir login:
                    {{ $currentUser->last_login ? \Carbon\Carbon::parse($currentUser->last_login)->format('d M Y H:i') : '-' }}
                </p>
                <a href="{{ route('user.edit', $currentUser->id) }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-pencil-square"></i> Edit Profil
                </a>
            </div>
        </div>
    </div>
    @endif

    {{-- ALERT --}}
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    {{-- DATA USER --}}
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <h4 class="mb-3">Data User</h4>
            <div class="table-responsive">
                <table class="table table-striped align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Tanggal Login</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $key => $user)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    {{ $user->last_login ? \Carbon\Carbon::parse($user->last_login)->format('d M Y H:i') : '-' }}
                                </td>
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-sm btn-primary">Edit</a>

                                    @if ($currentUser && $currentUser->id == $user->id)
                                        <button class="btn btn-sm btn-danger" disabled>Hapus (Aktif)</button>
                                    @else
                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"
                                                onclick="return confirm('Yakin ingin menghapus user ini?')">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- CSS KHUSUS HALAMAN INI --}}
@push('styles')
<style>
    .user-profile-card {
        background: #f8f9fa;
        border-radius: 15px;
        transition: 0.3s;
    }
    .user-profile-card:hover {
        background: #f3f4ff;
        box-shadow: 0 4px 12px rgba(0,0,0,0.08);
    }
    .profile-avatar {
        width: 60px;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 50%;
        background-color: #e9ecef;
    }
</style>
@endpush

@endsection
