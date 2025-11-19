@extends('layouts.guest.main')

@section('content')

<!-- Banner Section -->
<div class="about-banner"
     style="
        background: url('https://i.pinimg.com/736x/fe/ff/fe/fefffebfea7b01c3ec836b2436c2fbde.jpg') center center / cover no-repeat;
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
<a href="https://wa.me/6285194727600?text=Halo%20Admin%20Desa,%20saya%20ingin%20bertanya%20tentang%20portal%20desa."
   class="whatsapp-float"
   target="_blank"
   title="Chat via WhatsApp">
   <i class="bi bi-whatsapp"></i>
</a>

<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.btn-primary, .btn-outline-primary {
    transition: all 0.3s ease;
}

.btn-primary:hover, .btn-outline-primary:hover {
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(74, 123, 200, 0.3);
}
/* 🌿 Floating WhatsApp Style */
.whatsapp-float {
    position: fixed;
    width: 60px;
    height: 60px;
    bottom: 25px;
    right: 25px;
    background-color: #25d366;
    color: #fff;
    border-radius: 50%;
    text-align: center;
    font-size: 32px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.2);
    z-index: 999;
    transition: all 0.3s ease;
    animation: floatIn 0.7s ease-out;
}

.whatsapp-float:hover {
    background-color: #20ba5a;
    transform: scale(1.1);
}

.whatsapp-float i {
    margin-top: 14px;
}

/* Animasi muncul halus dari bawah */
@keyframes floatIn {
    from {
        opacity: 0;
        transform: translateY(40px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>
@endsection
