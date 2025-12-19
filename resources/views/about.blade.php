@extends('layouts.guest.main')

@section('content')

<!-- Hero Section dengan Pink Soft -->
<section class="simple-hero py-5 text-white" style="background: linear-gradient(rgba(236, 112, 159, 0.8), rgba(219, 84, 138, 0.8)), url('https://i.pinimg.com/736x/fe/ff/fe/fefffebfea7b01c3ec836b2436c2fbde.jpg') center/cover;">
    <div class="container">
        <div class="row justify-content-center text-center">
            <div class="col-lg-8">
                <h1 class="display-4 fw-bold mb-4">
                    <i class="bi bi-building me-3"></i>Portal Desa Digital
                </h1>
                <p class="lead mb-0">
                    Platform Informasi Modern untuk Kemajuan Desa Bersama
                </p>
            </div>
        </div>
    </div>
</section>

<!-- About Content Section -->
<section class="about-content py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Tentang Portal -->
                <div class="card shadow-sm border-0 mb-5">
                    <div class="card-body p-5">
                        <h2 class="text-pink fw-bold mb-4">
                            <i class="bi bi-info-circle me-2"></i>Tentang Portal Desa
                        </h2>
                        <p class="lead text-dark mb-4">
                            <strong>Portal Desa Digital</strong> merupakan platform inovatif yang dirancang untuk
                            memudahkan akses informasi, meningkatkan transparansi, dan memperkuat partisipasi
                            masyarakat dalam pembangunan desa.
                        </p>
                        <p class="text-dark mb-4">
                            Dengan teknologi terkini, portal ini menyajikan berbagai informasi penting
                            seperti data kependudukan, agenda kegiatan, berita desa, galeri dokumentasi,
                            dan laporan keuangan secara transparan dan mudah diakses oleh seluruh warga.
                        </p>

                        <div class="row mt-4">
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-check-circle-fill text-pink me-3 fs-5"></i>
                                    <span class="fw-semibold text-dark">Informasi Real-time</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-check-circle-fill text-pink me-3 fs-5"></i>
                                    <span class="fw-semibold text-dark">Akses Mudah 24 Jam</span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-check-circle-fill text-pink me-3 fs-5"></i>
                                    <span class="fw-semibold text-dark">Data Terintegrasi</span>
                                </div>
                                <div class="d-flex align-items-center mb-3">
                                    <i class="bi bi-check-circle-fill text-pink me-3 fs-5"></i>
                                    <span class="fw-semibold text-dark">Transparansi Penuh</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Fitur Utama -->
                <div class="row mb-5">
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-newspaper text-pink fs-1 mb-3"></i>
                                <h5 class="fw-bold text-dark">Berita & Informasi</h5>
                                <p class="text-muted">
                                    Update terbaru seputar kegiatan, pengumuman, dan perkembangan desa.
                                    Informasi aktual untuk warga tetap terhubung.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-calendar-event text-pink fs-1 mb-3"></i>
                                <h5 class="fw-bold text-dark">Agenda Kegiatan</h5>
                                <p class="text-muted">
                                    Jadwal kegiatan desa, dari rapat rutin hingga event khusus.
                                    Tidak ada lagi yang terlewat informasi penting.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body text-center p-4">
                                <i class="bi bi-images text-pink fs-1 mb-3"></i>
                                <h5 class="fw-bold text-dark">Galeri Dokumentasi</h5>
                                <p class="text-muted">
                                    Momen-momen berharga melalui galeri foto kegiatan desa.
                                    Dokumentasi lengkap dan terorganisir.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tujuan & Manfaat -->
                <div class="row">
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="text-pink fw-bold mb-3">
                                    <i class="bi bi-target me-2"></i>Tujuan Portal
                                </h4>
                                <p class="text-dark mb-3">
                                    Memberikan akses informasi yang mudah dan transparan bagi masyarakat desa,
                                    termasuk data warga, kegiatan, dan berita terbaru.
                                </p>
                                <ul class="list-unstyled">
                                    <li class="mb-2">
                                        <i class="bi bi-check text-pink me-2"></i>
                                        Digitalisasi informasi desa
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-pink me-2"></i>
                                        Transparansi pengelolaan desa
                                    </li>
                                    <li class="mb-2">
                                        <i class="bi bi-check text-pink me-2"></i>
                                        Partisipasi aktif warga
                                    </li>
                                    <li>
                                        <i class="bi bi-check text-pink me-2"></i>
                                        Efisiensi layanan publik
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-0 shadow-sm">
                            <div class="card-body p-4">
                                <h4 class="text-pink fw-bold mb-3">
                                    <i class="bi bi-people me-2"></i>Manfaat bagi Warga
                                </h4>
                                <div class="mb-3">
                                    <h6 class="fw-bold text-dark mb-1">Akses Informasi Mudah</h6>
                                    <p class="text-muted small mb-3">Dapatkan informasi desa kapan saja dan di mana saja</p>
                                </div>
                                <div class="mb-3">
                                    <h6 class="fw-bold text-dark mb-1">Transparansi Data</h6>
                                    <p class="text-muted small mb-3">Monitor perkembangan desa secara terbuka dan jujur</p>
                                </div>
                                <div class="mb-3">
                                    <h6 class="fw-bold text-dark mb-1">Partisipasi Aktif</h6>
                                    <p class="text-muted small mb-0">Ikut berperan dalam pembangunan desa melalui informasi yang tersedia</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Cara Menggunakan -->
                <div class="card border-0 shadow-sm mt-5">
                    <div class="card-body p-5">
                        <h3 class="text-pink fw-bold mb-4 text-center">
                            <i class="bi bi-play-circle me-2"></i>Cara Menggunakan Portal
                        </h3>
                        <div class="row">
                            <div class="col-md-4 text-center mb-4">
                                <div class="step-number bg-pink text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <h4 class="mb-0">1</h4>
                                </div>
                                <h5 class="fw-bold text-dark">Akses Portal</h5>
                                <p class="text-muted small">Buka website Portal Desa melalui browser favorit Anda</p>
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <div class="step-number bg-pink text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <h4 class="mb-0">2</h4>
                                </div>
                                <h5 class="fw-bold text-dark">Jelajahi Menu</h5>
                                <p class="text-muted small">Pilih menu yang diinginkan (Berita, Agenda, Galeri, Profil, dll)</p>
                            </div>
                            <div class="col-md-4 text-center mb-4">
                                <div class="step-number bg-pink text-white rounded-circle d-inline-flex align-items-center justify-content-center mb-3" style="width: 60px; height: 60px;">
                                    <h4 class="mb-0">3</h4>
                                </div>
                                <h5 class="fw-bold text-dark">Dapatkan Info</h5>
                                <p class="text-muted small">Baca dan manfaatkan informasi yang tersedia untuk kebutuhan Anda</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contact CTA -->
<section class="contact-cta py-4" style="background-color: #fce4ec;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <p class="mb-3 text-dark">
                    <strong>Butuh bantuan?</strong> Hubungi admin desa melalui WhatsApp
                </p>
                <a href="https://wa.me/6285194727600?text=Halo%20Admin%20Desa,%20saya%20ingin%20bertanya%20tentang%20portal%20desa."
                   class="btn btn-pink text-white btn-sm"
                   target="_blank">
                   <i class="bi bi-whatsapp me-2"></i>Chat WhatsApp
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Floating WhatsApp -->
<a href="https://wa.me/6285194727600?text=Halo%20Admin%20Desa,%20saya%20ingin%20bertanya%20tentang%20portal%20desa."
   class="whatsapp-float"
   target="_blank"
   title="Chat via WhatsApp">
   <i class="bi bi-whatsapp"></i>
</a>

<style>
.simple-hero {
    padding: 100px 0;
}

.about-content {
    background: #f8f9fa;
}

.card {
    border-radius: 15px;
    transition: transform 0.3s ease;
}

.card:hover {
    transform: translateY(-5px);
}

.step-number {
    font-weight: bold;
}

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
    display: flex;
    align-items: center;
    justify-content: center;
    text-decoration: none;
}

.whatsapp-float:hover {
    background-color: #20ba5a;
    transform: scale(1.1);
    color: #fff;
}

/* Warna Pink Soft */
.text-pink {
    color: #ec709f !important;
}

.bg-pink {
    background-color: #ec709f !important;
}

.btn-pink {
    background-color: #ec709f !important;
    border-color: #ec709f !important;
}

.btn-pink:hover {
    background-color: #db548a !important;
    border-color: #db548a !important;
}

/* Pastikan teks terbaca */
.text-dark {
    color: #333 !important;
}

.lead {
    color: #555 !important;
    font-size: 1.1rem;
}
</style>
@endsection
