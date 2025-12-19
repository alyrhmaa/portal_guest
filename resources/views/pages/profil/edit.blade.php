@extends('layouts.guest.main')

@section('content')

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow-lg border-0" style="border-radius: 15px;">
                <div class="card-body p-5">

                    <h3 class="mb-4 text-center fw-bold">Edit Profil Desa</h3>

                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    <form action="{{ route('profil.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        {{-- LOGO --}}
                        <div class="text-center mb-4">
                            <label class="fw-semibold fs-5 mb-2 d-block">Logo Desa</label>

                            @if ($profil?->logo)
                                <img src="{{ asset('storage/' . $profil->logo) }}"
                                     class="rounded shadow mb-2" width="130">
                            @else
                                <div class="bg-light rounded d-flex justify-content-center align-items-center"
                                    style="width:130px;height:130px;border:2px dashed #ccc;">
                                    <small class="text-muted">Belum Ada Logo</small>
                                </div>
                            @endif

                            <input type="file" name="logo" class="form-control mt-3 w-50 mx-auto">
                        </div>

                        <hr>

                        {{-- Input fields --}}
                        <div class="mb-3">
                            <label>Nama Desa</label>
                            <input type="text" name="nama_desa" class="form-control"
                                value="{{ $profil?->nama_desa }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control"
                                value="{{ $profil?->kecamatan }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Kabupaten</label>
                            <input type="text" name="kabupaten" class="form-control"
                                value="{{ $profil?->kabupaten }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Provinsi</label>
                            <input type="text" name="provinsi" class="form-control"
                                value="{{ $profil?->provinsi }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Alamat Kantor</label>
                            <textarea class="form-control" name="alamat_kantor" rows="2" required>{{ $profil?->alamat_kantor }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ $profil?->email }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Telepon</label>
                            <input type="text" name="telepon" class="form-control"
                                value="{{ $profil?->telepon }}" required>
                        </div>

                        <div class="mb-3">
                            <label>Visi</label>
                            <textarea class="form-control" name="visi" rows="3">{{ $profil?->visi }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label>Misi</label>
                            <textarea class="form-control" name="misi" rows="3">{{ $profil?->misi }}</textarea>
                        </div>

                        <button class="btn btn-primary w-100 py-2 fw-bold" style="border-radius: 10px;">
                            Simpan Profil
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection
