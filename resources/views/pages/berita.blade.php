@extends('layouts.guest.main')

@section('content')

<style>
    /* ==== HERO TITLE ==== */
    .hero-title {
        font-size: 44px;
        font-weight: 800;
        text-align: center;
        margin-top: 20px;
        margin-bottom: 10px;
        color: #3a006d;
    }
    .hero-subtitle {
        text-align: center;
        color: #666;
        font-size: 16px;
        margin-bottom: 35px;
    }

    /* ==== FILTER SECTION ==== */
    .filter-box {
        background: #ffffff;
        padding: 20px 25px;
        border-radius: 18px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.08);
        display: inline-block;
        margin: 0 10px;
    }
    .filter-select {
        padding: 12px 20px;
        border-radius: 14px;
        border: 2px solid #dcd2ff;
        background: #faf7ff;
        font-size: 15px;
        transition: 0.2s ease;
    }
    .filter-select:focus {
        border-color: #7a00ff;
        box-shadow: 0 0 8px rgba(122,0,255,0.3);
    }

    .filter-section {
        text-align: center;
        margin-bottom: 45px;
    }

    /* ==== STATISTIC CARDS ==== */
    .stats-box {
        background: linear-gradient(135deg, #7b2ff7, #d11bfa);
        color: #fff;
        padding: 28px;
        border-radius: 22px;
        text-align: center;
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 25px;
        box-shadow: 0 6px 20px rgba(147, 0, 255, 0.25);
    }

    /* ==== NEWS CARD ==== */
    .news-card {
        display: flex;
        gap: 20px;
        background: #fff;
        padding: 25px;
        border-radius: 22px;
        margin-bottom: 28px;
        box-shadow: 0 6px 15px rgba(0,0,0,0.08);
        transition: 0.2s ease;
    }
    .news-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.12);
    }

    .news-img {
        width: 200px;
        height: 130px;
        object-fit: cover;
        border-radius: 18px;
    }

    .news-badge {
        background: #ff62b3;
        padding: 6px 14px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        color: white;
        margin-bottom: 8px;
        display: inline-block;
    }

    .news-title {
        font-size: 22px;
        font-weight: 700;
        margin-bottom: 4px;
        color: #2b0057;
    }

    .news-meta {
        font-size: 13px;
        color: #777;
        margin-bottom: 8px;
    }

    .read-more {
        color: #7200dd;
        font-weight: bold;
        font-size: 14px;
    }
</style>


<div class="container mb-5">

    <h2 class="hero-title">Berita Terkini</h2>
    <p class="hero-subtitle">Informasi dan berita terbaru dari Desa Kami</p>

    {{-- FILTER --}}
    <div class="filter-section">
        <div class="filter-box">
            <label><strong>Filter Kategori</strong></label><br>
            <select id="kategoriFilter" class="filter-select">
                <option value="all">Semua Kategori</option>
                @foreach ($kategori as $k)
                    <option value="{{ $k->kategori_berita_id }}">{{ $k->nama }}</option>
                @endforeach
            </select>
        </div>

        <div class="filter-box">
            <label><strong>Urutkan</strong></label><br>
            <select id="urutkan" class="filter-select">
                <option value="terbaru">Terbaru</option>
                <option value="terlama">Terlama</option>
            </select>
        </div>
    </div>

    {{-- STATISTIK --}}
    <div class="row text-center mb-4">
        <div class="col-md-6">
            <div class="stats-box">
                {{ $berita->count() }}<br> Total Berita
            </div>
        </div>
        <div class="col-md-6">
            <div class="stats-box">
                {{ $berita->where('created_at','>=', now()->startOfMonth())->count() }}<br> Berita Bulan Ini
            </div>
        </div>
    </div>


    <h3 class="mt-4 mb-3" style="font-weight:700;">Semua Berita</h3>

    {{-- LIST BERITA --}}
    @foreach ($berita as $b)
    <div class="news-card">

        {{-- GAMBAR BERITA --}}
        <img src="{{ $b->gambar ? asset('storage/' . $b->gambar) : asset('img/default-news.jpg') }}"
             class="news-img">

        <div style="flex: 1">
            <div class="news-badge">{{ $b->kategori->nama }}</div>

            <div class="news-title">{{ $b->judul }}</div>

            <div class="news-meta">
                {{ ucfirst($b->status) }} •
                {{ $b->created_at->diffForHumans() }} •
                Penulis: <b>{{ $b->penulis }}</b>
            </div>

            <p>{{ Str::limit($b->isi_berita, 150) }}</p>

            <a href="#" class="read-more">Baca Selengkapnya →</a>
        </div>
    </div>
    @endforeach

</div>

@endsection
