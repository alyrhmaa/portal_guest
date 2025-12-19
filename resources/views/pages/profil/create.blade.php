@extends('layouts.guest.main')

@section('content')

<div class="container py-5">
    <h3 class="fw-bold mb-4">Tambah Profil Desa</h3>

    <form action="{{ route('profil.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @include('pages.profil.form')
        <!-- form input yang sama dengan edit -->

        <button class="btn btn-pink mt-3">
            <i class="bi bi-plus-circle me-1"></i> Simpan Profil Baru
        </button>
    </form>
</div>

@endsection
