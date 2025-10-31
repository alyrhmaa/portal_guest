@extends('layouts.guest.main')

@section('content')
<div class="container py-5">
    <div class="text-center mb-4">
        <h1 class="fw-bold text-primary">
            <i class="fa-solid fa-circle-info"></i> Tentang Portal Desa
        </h1>
        <p class="text-muted">Menjelaskan tujuan, alur, dan manfaat dari portal ini.</p>
    </div>

    <div class="row justify-content-center align-items-center">
        <div class="col-md-6">
            {{-- Pastikan gambar ini ada di public/images/about-desa.jpg --}}
            <img src="{{ asset('images/team/about-desa.jpg') }}"
                 alt="Tentang Desa"
                 class="img-fluid rounded shadow"
                 style="max-width: 100%; height: auto; border: 3px solid #f8b6cc;">
        </div>

        <div class="col-md-6">
            <h3 class="fw-semibold">
                <i class="fa-solid fa-seedling text-success"></i> Tujuan
            </h3>
            <p>
                Portal Desa ini bertujuan untuk memberikan akses informasi yang mudah bagi masyarakat desa,
                termasuk data warga, kegiatan, dan berita terbaru. Dengan tampilan modern dan interaktif,
                warga dapat berpartisipasi aktif dalam perkembangan desa.
            </p>

            <h3 class="fw-semibold mt-4">
                <i class="fa-solid fa-route text-info"></i> Alur Akses
            </h3>
            <ol>
                <li>Pengguna membuka halaman utama (Beranda).</li>
                <li>Melihat profil desa, berita, galeri, dan kegiatan.</li>
                <li>Admin dapat login dan mengelola data melalui dashboard.</li>
            </ol>
        </div>
    </div>
</div>
@endsection
