@extends('layouts.guest.main')

@section('content')
<section class="py-5" style="background: linear-gradient(135deg, #fdecef, #ffffff);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-8">

                <div class="card border-0 shadow-sm rounded-4 p-4 p-md-5">

                    {{-- HEADER --}}
                    <div class="text-center mb-4">
                        <img src="{{ asset('images/developer.jpeg') }}"
                             alt="Foto Pengembang"
                             class="developer-photo mb-3">

                        <h3 class="fw-bold mb-1">Aliya Rahma</h3>
                        <p class="text-muted mb-2">Mahasiswi / Web Developer</p>

                        <hr class="mx-auto" style="width: 120px;">
                    </div>

                    {{-- TENTANG SAYA --}}
                    <div class="mb-4">
                        <h5 class="fw-semibold mb-3 text-center">
                            <i class="bi bi-person-circle text-pink me-1"></i>
                            Tentang Saya
                        </h5>

                        <p class="text-muted text-justify">
                            Saya adalah <strong>Aliya Rahma</strong>, mahasiswi Program Studi
                            <strong>Sistem Informasi</strong> di Politeknik Caltex Riau.
                            Website <strong>Portal Desa</strong> ini dikembangkan sebagai
                            <strong>proyek perkuliahan</strong> yang bertujuan untuk
                            mengimplementasikan pengetahuan dan keterampilan di bidang
                            <em>pengembangan web</em>.
                        </p>

                        <p class="text-muted text-justify">
                            Dalam proyek ini, saya berperan sebagai <strong>Web Developer</strong>
                            yang bertanggung jawab dalam perancangan, pengembangan,
                            serta implementasi sistem agar mampu menyajikan informasi desa
                            secara informatif, terstruktur, dan mudah diakses oleh masyarakat.
                        </p>
                    </div>

                    {{-- BIODATA --}}
                    <div class="row mt-4">
                        <div class="col-md-6 mb-3">
                            <p class="mb-2">
                                <i class="bi bi-card-text text-pink me-2"></i>
                                <strong>NIM:</strong> 2457301008
                            </p>
                            <p class="mb-2">
                                <i class="bi bi-mortarboard text-pink me-2"></i>
                                <strong>Prodi:</strong> Sistem Informasi
                            </p>
                        </div>

                        <div class="col-md-6 mb-3">
                            <p class="mb-2">
                                <i class="bi bi-envelope text-pink me-2"></i>
                                <strong>Email:</strong> aliya24si@mahasiswa.pcr.ac.id
                            </p>
                            <p class="mb-2">
                                <i class="bi bi-building text-pink me-2"></i>
                                <strong>Institusi:</strong> Politeknik Caltex Riau
                            </p>
                        </div>
                    </div>

                    {{-- SOSIAL MEDIA --}}
                    <div class="text-center mt-4">
                        <a href="https://www.linkedin.com/" target="_blank"
                           class="btn btn-outline-pink btn-sm rounded-circle me-2"
                           title="LinkedIn">
                            <i class="bi bi-linkedin"></i>
                        </a>

                        <a href="https://github.com/alyrhmaa" target="_blank"
                           class="btn btn-outline-dark btn-sm rounded-circle me-2"
                           title="GitHub">
                            <i class="bi bi-github"></i>
                        </a>

                        <a href="https://www.instagram.com/aliyaa.rahmaaa" target="_blank"
                           class="btn btn-outline-danger btn-sm rounded-circle me-2"
                           title="Instagram">
                            <i class="bi bi-instagram"></i>
                        </a>

                        <a href="mailto:aliya24si@mahasiswa.pcr.ac.id"
                           class="btn btn-outline-secondary btn-sm rounded-circle"
                           title="Email">
                            <i class="bi bi-envelope-fill"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
