@extends('layouts.guest.main')

@section('content')
    <div class="kategori-container">
        <div class="kategori-header">
            <h1 class="kategori-title">
                <i class="fas fa-folder-open"></i>
                Kategori Berita
            </h1>
            <p class="kategori-subtitle">Temukan berita berdasarkan kategori yang tersedia</p>
        </div>

        <div class="kategori-stats">
            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-layer-group"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number">{{ $totalKategori }}</span>
                    <span class="stat-label">Total Kategori</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-newspaper"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number">{{ $totalBerita }}</span>
                    <span class="stat-label">Total Berita</span>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <div class="stat-info">
                    <span class="stat-number">{{ $beritaBulanIni }}</span>
                    <span class="stat-label">Berita Bulan Ini</span>
                </div>
            </div>
        </div>

        {{-- =======================
            🔥 TOMBOL TAMBAH BERITA (DI LUAR CARD)
        ======================== --}}
        <div class="d-flex justify-content-end mb-4">
            <a href="{{ route('berita.create') }}" class="btn btn-success px-4 py-2" style="font-size: 1rem;">
                ➕ Tambah Berita
            </a>
        </div>

        <div class="d-flex justify-content-end mb-3">
            <a href="{{ route('kategori.tambah') }}" class="btn btn-success">
                ➕ Tambah Kategori
            </a>
        </div>


        <div class="kategori-grid">
            @if ($kategori->isEmpty())
                <div class="alert alert-info text-center w-100">
                    Belum ada data kategori.
                    <br>
                    <a href="{{ route('kategori.tambah') }}" class="btn btn-success mt-3">
                        ➕ Tambah Kategori
                    </a>
                </div>
            @else
                @foreach ($kategori as $kat)
                    <div class="kategori-card">
                        <div class="card-header">
                            <div class="category-icon">
                                <i class="fas fa-folder-open"></i>
                            </div>
                            <div class="category-badge">
                                KAT-{{ str_pad($kat->kategori_id, 3, '0', STR_PAD_LEFT) }}
                            </div>
                        </div>

                        <div class="card-body">
                            <h3 class="category-name">{{ $kat->nama }}</h3>
                            <span class="category-slug">{{ $kat->slug }}</span>
                            <p class="category-description">
                                {{ $kat->deskripsi ?? 'Belum ada deskripsi untuk kategori ini.' }}
                            </p>
                        </div>

                        <div class="card-footer">
                            <div class="news-count">
                                <i class="fas fa-file-alt"></i>
                                {{ $kat->berita_count }} Berita
                            </div>

                            <div class="d-flex gap-2">
                                {{-- Edit --}}
                                <a href="{{ route('kategori.edit', $kat->kategori_id) }}" class="btn btn-sm btn-primary">✏️
                                    Edit</a>

                                {{-- Hapus --}}
                                <form action="{{ url('kategori/hapus/' . $kat->kategori_id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('get')
                                    <button type="submit" class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus kategori ini?')">
                                        Hapus
                                    </button>
                                </form>

                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>

        {{-- =======================
            STYLE (TIDAK DIUBAH)
        ======================== --}}
        <style>
            .kategori-container {
                max-width: 1200px;
                margin: 0 auto;
                padding: 2rem;
            }

            .kategori-header {
                text-align: center;
                margin-bottom: 3rem;
            }

            .kategori-title {
                font-size: 2.5rem;
                font-weight: 700;
                color: #2c5aa0;
                margin-bottom: 0.5rem;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 1rem;
            }

            .kategori-title i {
                color: #f8a01d;
            }

            .kategori-subtitle {
                font-size: 1.1rem;
                color: #6c757d;
                margin-bottom: 0;
            }

            .kategori-stats {
                display: grid;
                grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
                gap: 1.5rem;
                margin-bottom: 3rem;
            }

            .stat-card {
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                color: white;
                padding: 1.5rem;
                border-radius: 15px;
                display: flex;
                align-items: center;
                gap: 1rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
                transition: transform 0.3s ease;
            }

            .stat-card:hover {
                transform: translateY(-5px);
            }

            .stat-icon {
                width: 60px;
                height: 60px;
                background: rgba(255, 255, 255, 0.2);
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                font-size: 1.5rem;
            }

            .stat-info {
                display: flex;
                flex-direction: column;
            }

            .stat-number {
                font-size: 2rem;
                font-weight: 700;
                line-height: 1;
            }

            .stat-label {
                font-size: 0.9rem;
                opacity: 0.9;
            }

            .kategori-grid {
                display: grid;
                grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
                gap: 2rem;
            }

            .kategori-card {
                background: white;
                border-radius: 20px;
                padding: 1.5rem;
                box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
                border: 1px solid #e9ecef;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }

            .kategori-card:hover {
                transform: translateY(-10px);
                box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
                border-color: #4a7bc8;
            }

            .kategori-card::before {
                content: '';
                position: absolute;
                top: 0;
                left: 0;
                width: 100%;
                height: 4px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            }

            .card-header {
                display: flex;
                justify-content: space-between;
                align-items: flex-start;
                margin-bottom: 1rem;
            }

            .category-icon {
                width: 60px;
                height: 60px;
                background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                border-radius: 15px;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                font-size: 1.5rem;
            }

            .category-badge {
                background: #f8f9fa;
                color: #6c757d;
                padding: 0.3rem 0.8rem;
                border-radius: 20px;
                font-size: 0.8rem;
                font-weight: 600;
                border: 1px solid #e9ecef;
            }

            .card-body {
                margin-bottom: 1.5rem;
            }

            .category-name {
                font-size: 1.3rem;
                font-weight: 700;
                color: #2c5aa0;
                margin-bottom: 0.5rem;
                line-height: 1.3;
            }

            .category-slug {
                display: inline-block;
                background: #e3f2fd;
                color: #1976d2;
                padding: 0.3rem 0.8rem;
                border-radius: 15px;
                font-size: 0.8rem;
                font-weight: 600;
                margin-bottom: 1rem;
            }

            .category-description {
                color: #6c757d;
                line-height: 1.6;
                margin-bottom: 0;
            }

            .card-footer {
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding-top: 1rem;
                border-top: 1px solid #e9ecef;
            }

            .news-count {
                display: flex;
                align-items: center;
                gap: 0.5rem;
                color: #6c757d;
                font-size: 0.9rem;
                font-weight: 500;
            }

            .news-count i {
                color: #4a7bc8;
            }
        </style>
    @endsection
