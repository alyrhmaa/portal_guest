@extends('layouts.guest.main')

@section('content')

<!-- Banner Section -->
<div class="about-banner"
     style="
        background: url('https://akcdn.detik.net.id/visual/2021/04/09/desa-dieng-di-wonosobo_169.jpeg?w=1200') center center / cover no-repeat;
        height: 100vh;
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-shadow: 2px 2px 6px rgba(0,0,0,0.6);
     ">
    <div style="background: rgba(0,0,0,0.4); padding: 20px 40px; border-radius: 10px;">
        <h1 class="fw-bold display-3">Tentang Portal Desa</h1>
    </div>
</div>

<!-- Konten Utama -->
<div class="container py-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary">
            <i class="fa-solid fa-circle-info"></i> Tentang Portal Desa
        </h2>
        <p class="text-muted">Menjelaskan tujuan, alur, dan manfaat dari portal ini.</p>
    </div>

    <div class="row justify-content-center align-items-center">
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
