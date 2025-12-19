@extends('layouts.guest.main')

@section('content')
    <!-- Hero Section -->
    <section class="py-4 text-white" style="background: linear-gradient(135deg, #ec709f 0%, #db548a 100%);">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="fw-bold mb-2">
                        <i class="bi bi-people me-2"></i>Data User
                    </h1>
                </div>
            </div>
        </div>
    </section>

    <div class="container mt-4">

        {{-- PROFIL USER LOGIN --}}
        @php
            $currentUser = Session::get('user');
        @endphp

        @if ($currentUser)
            <div class="card user-profile-card mb-4 shadow-sm border-0">
                <div class="card-body d-flex align-items-center justify-content-between flex-wrap">
                    <div class="d-flex align-items-center mb-3 mb-md-0">
                        <div class="profile-avatar me-3">
                            <i class="bi bi-person-circle text-pink" style="font-size: 3rem;"></i>
                        </div>
                        <div>
                            <h5 class="mb-1 fw-bold">{{ $currentUser->name }}</h5>
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
                        <a href="{{ route('user.edit', $currentUser->id) }}" class="btn btn-pink text-white btn-sm">
                            <i class="bi bi-pencil-square me-1"></i> Edit Profil
                        </a>
                    </div>
                </div>
            </div>
        @endif

        {{-- ALERT SUCCESS --}}
        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-check-circle me-2"></i>
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- ALERT ERROR --}}
        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-triangle me-2"></i>{{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif


        {{-- ⭐ FILTER STATUS DIPINDAH KE SINI (DI LUAR TABLE) --}}
        <form method="GET" action="{{ route('user.index') }}" class="mb-3 px-3 pt-3">
            <div class="row">

                <div class="col-md-3 mt-2 mt-md-0">
                    <select name="role" class="form-select" onchange="this.form.submit()">
                        <option value="">Semua Role</option>
                        <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="user" {{ request('role') == 'user' ? 'selected' : '' }}>User</option>
                    </select>
                </div>

            </div>
        </form>


        {{-- DATA USER --}}
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-pink text-white py-3">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="mb-0 fw-bold">
                        <i class="bi bi-list-ul me-2"></i>Data User
                    </h4>
                    <span class="badge bg-white text-pink">{{ count($users) }} User</span>
                </div>
            </div>

            <div class="card-body p-0">

                <div class="table-responsive">
                    <table class="table table-hover mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Tanggal Login</th>
                                <th width="150" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $key => $user)
                                <tr>
                                    <td class="ps-4 fw-bold">{{ $users->firstItem() + $key }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">

                                            {{-- Foto Profil --}}
                                            @if ($user->profile_picture)
                                                <img src="{{ asset('storage/' . $user->profile_picture) }}"
                                                    class="rounded-circle me-2"
                                                    style="width:40px; height:40px; object-fit:cover;">
                                            @else
                                                <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=ec709f&color=fff"
                                                    class="rounded-circle me-2"
                                                    style="width:40px; height:40px; object-fit:cover;">
                                            @endif

                                            <span>{{ $user->name }}</span>
                                        </div>
                                    </td>


                                    <td>
                                        <span class="badge bg-light text-dark">{{ $user->username }}</span>
                                    </td>

                                    <td>{{ $user->email }}</td>

                                    <td>
                                        <small class="text-muted">
                                            {{ $user->last_login ? \Carbon\Carbon::parse($user->last_login)->format('d M Y H:i') : '-' }}
                                        </small>
                                    </td>

                                    <td class="text-center">
                                        <div class="d-flex gap-2 justify-content-center">

                                            <a href="{{ route('user.edit', $user->id) }}"
                                                class="btn btn-outline-primary btn-sm rounded-pill px-3">
                                                <i class="bi bi-pencil"></i> Edit
                                            </a>

                                            @if ($currentUser && $currentUser->id == $user->id)
                                                <button class="btn btn-outline-secondary btn-sm rounded-pill px-3" disabled>
                                                    <i class="bi bi-trash"></i> Hapus (Aktif)
                                                </button>
                                            @else
                                                <form action="{{ route('user.destroy', $user->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-outline-danger btn-sm rounded-pill px-3"
                                                        onclick="return confirm('Yakin ingin menghapus user ini?')">
                                                        <i class="bi bi-trash"></i> Hapus
                                                    </button>
                                                </form>
                                            @endif

                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <!-- PAGINATION -->
                <div class="mt-3 px-3">
                    {{ $users->links('pagination::bootstrap-5') }}
                </div>

            </div>
        </div>

        <!-- Add User Button -->
        <div class="row mt-4">
            <div class="col-12 text-end">
                <a href="{{ route('user.create') }}" class="btn btn-pink text-white rounded-pill px-4">
                    <i class="bi bi-person-plus me-2"></i>Tambah User Baru
                </a>
            </div>
        </div>

    </div>


    {{-- STYLE --}}
    <style>
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
    </style>
@endsection
