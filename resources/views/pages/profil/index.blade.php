@extends('layouts.guest.main')

@section('content')

{{-- HERO --}}
<section class="profil-hero text-white">
    <div class="overlay"></div>
    <div class="container position-relative text-center py-5">
        <i class="bi bi-building display-4 mb-3"></i>
        <h1 class="fw-bold mb-2">Profil Desa</h1>
        <p class="lead mb-0">Informasi resmi dan identitas desa</p>
    </div>
</section>

{{-- EDIT BUTTON --}}
<div class="container mt-n4 mb-4">
    <div class="d-flex justify-content-end">
        <a href="{{ route('profil.edit') }}" class="btn btn-pink shadow-lg px-4 py-2">
            <i class="bi bi-pencil-square me-1"></i> Edit Profil
        </a>
    </div>
</div>

<section class="py-5 bg-light">
    <div class="container">

        @if ($profil)

            {{-- FOTO / LOGO --}}
            @if ($media->count())
                <div class="card card-modern mb-4">
                    <div class="card-header bg-pink text-white">
                        <h5 class="fw-bold mb-0">
                            <i class="bi bi-images me-2"></i> Foto / Logo Desa
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row g-3">
                            @foreach ($media as $m)
                                <div class="col-md-3 col-6">
                                    <div class="image-box">
                                        <img src="{{ asset('storage/' . $m->file_name) }}" class="img-fluid">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            {{-- INFORMASI DESA --}}
            <div class="card card-modern mb-4">
                <div class="card-header bg-pink text-white">
                    <h4 class="fw-bold mb-0">
                        <i class="bi bi-info-circle me-2"></i> Informasi Desa
                    </h4>
                </div>

                <div class="card-body p-4">
                    <div class="row g-4">

                        @php
                            $items = [
                                ['icon'=>'house','label'=>'Nama Desa','value'=>$profil->nama_desa],
                                ['icon'=>'geo-alt','label'=>'Kecamatan','value'=>$profil->kecamatan],
                                ['icon'=>'map','label'=>'Kabupaten','value'=>$profil->kabupaten],
                                ['icon'=>'globe','label'=>'Provinsi','value'=>$profil->provinsi],
                                ['icon'=>'pin-map','label'=>'Alamat Kantor','value'=>$profil->alamat_kantor],
                                ['icon'=>'envelope','label'=>'Email','value'=>$profil->email],
                                ['icon'=>'telephone','label'=>'Telepon','value'=>$profil->telepon],
                            ];
                        @endphp

                        @foreach ($items as $item)
                            <div class="col-md-6">
                                <div class="info-box">
                                    <div class="icon">
                                        <i class="bi bi-{{ $item['icon'] }}"></i>
                                    </div>
                                    <div>
                                        <small>{{ $item['label'] }}</small>
                                        <div class="fw-semibold">{{ $item['value'] }}</div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

            {{-- VISI & MISI --}}
            <div class="row g-4">
                <div class="col-md-6">
                    <div class="card card-modern accent-left h-100">
                        <div class="card-body">
                            <h5 class="fw-bold text-pink mb-3">
                                <i class="bi bi-eye me-2"></i> Visi
                            </h5>
                            {!! nl2br(e($profil->visi)) !!}
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-modern accent-left h-100">
                        <div class="card-body">
                            <h5 class="fw-bold text-pink mb-3">
                                <i class="bi bi-flag me-2"></i> Misi
                            </h5>
                            {!! nl2br(e($profil->misi)) !!}
                        </div>
                    </div>
                </div>
            </div>

        @else
            <div class="text-center py-5">
                <i class="bi bi-exclamation-triangle display-4 text-warning"></i>
                <h5 class="mt-3">Profil desa belum tersedia</h5>
            </div>
        @endif

    </div>
</section>


@endsection
