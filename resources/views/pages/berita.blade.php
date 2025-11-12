@extends('layouts.guest.main')

@section('content')
<div class="berita-container">
    <!-- Header Section -->
    <div class="berita-header">
        <h1 class="berita-title">
            <i class="fas fa-newspaper"></i>
            Berita Terkini
        </h1>
        <p class="berita-subtitle">Informasi dan berita terbaru dari Desa Kami</p>

        <!-- Filter Section -->
        <div class="filter-section">
            <div class="filter-group">
                <label for="kategoriFilter"><i class="fas fa-filter"></i> Filter Kategori:</label>
                <select id="kategoriFilter" class="filter-select">
                    <option value="all">Semua Kategori</option>
                    <option value="pemerintahan">Pemerintahan Desa</option>
                    <option value="pembangunan">Pembangunan</option>
                    <option value="masyarakat">Kegiatan Masyarakat</option>
                    <option value="pertanian">Pertanian</option>
                </select>
            </div>
            <div class="filter-group">
                <label for="sortFilter"><i class="fas fa-sort"></i> Urutkan:</label>
                <select id="sortFilter" class="filter-select">
                    <option value="terbaru">Terbaru</option>
                    <option value="terlama">Terlama</option>
                    <option value="populer">Populer</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="berita-stats">
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-file-alt"></i>
            </div>
            <div class="stat-info">
                <span class="stat-number">156</span>
                <span class="stat-label">Total Berita</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-eye"></i>
            </div>
            <div class="stat-info">
                <span class="stat-number">2.4K</span>
                <span class="stat-label">Pembaca Hari Ini</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-calendar-check"></i>
            </div>
            <div class="stat-info">
                <span class="stat-number">24</span>
                <span class="stat-label">Berita Bulan Ini</span>
            </div>
        </div>
        <div class="stat-card">
            <div class="stat-icon">
                <i class="fas fa-pencil-alt"></i>
            </div>
            <div class="stat-info">
                <span class="stat-number">8</span>
                <span class="stat-label">Penulis Aktif</span>
            </div>
        </div>
    </div>

    <!-- Featured News -->
    <div class="featured-section">
        <h2 class="section-title">
            <i class="fas fa-star"></i>
            Berita Utama
        </h2>
        <div class="featured-news">
            <div class="featured-card">
                <div class="featured-image">
                    <img src="https://images.unsplash.com/photo-1585829365295-ab7cd400c63e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="Featured News">
                    <div class="featured-badge">Utama</div>
                </div>
                <div class="featured-content">
                    <div class="news-meta">
                        <span class="news-category">Pemerintahan Desa</span>
                        <span class="news-date"><i class="far fa-clock"></i> 2 Jam yang lalu</span>
                    </div>
                    <h3 class="news-title">Peluncuran Program Bantuan Langsung Tunai untuk Warga Terdampak</h3>
                    <p class="news-excerpt">Pemerintah desa meluncurkan program bantuan langsung tunai untuk membantu warga yang terdampak ekonomi. Program ini akan menyentuh 500 kepala keluarga...</p>
                    <div class="news-footer">
                        <div class="news-author">
                            <i class="fas fa-user"></i>
                            Admin Desa
                        </div>
                        <a href="#" class="read-more">
                            Baca Selengkapnya
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- News Grid -->
    <div class="news-section">
        <h2 class="section-title">
            <i class="fas fa-list"></i>
            Semua Berita
        </h2>
        <div class="news-grid">
            <!-- Berita 1 -->
            <div class="news-card">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1542744173-8e7e53415bb0?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="News Image">
                    <div class="news-status published">Published</div>
                </div>
                <div class="news-content">
                    <div class="news-meta">
                        <span class="news-category">Pembangunan</span>
                        <span class="news-date"><i class="far fa-clock"></i> 1 Hari yang lalu</span>
                    </div>
                    <h3 class="news-title">Pembangunan Jembatan Desa Selesai, Akses Transportasi Semakin Lancar</h3>
                    <p class="news-excerpt">Pembangunan jembatan penghubung antar dusun telah selesai dikerjakan. Jembatan sepanjang 25 meter ini akan memudahkan akses transportasi warga...</p>
                    <div class="news-footer">
                        <div class="news-author">
                            <i class="fas fa-user"></i>
                            Budi Santoso
                        </div>
                        <div class="news-actions">
                            <span class="news-views">
                                <i class="far fa-eye"></i>
                                245
                            </span>
                            <a href="#" class="read-more">
                                Baca
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Berita 2 -->
            <div class="news-card">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1466692476868-aef1dfb1e735?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="News Image">
                    <div class="news-status published">Published</div>
                </div>
                <div class="news-content">
                    <div class="news-meta">
                        <span class="news-category">Kegiatan Masyarakat</span>
                        <span class="news-date"><i class="far fa-clock"></i> 2 Hari yang lalu</span>
                    </div>
                    <h3 class="news-title">Festival Budaya Desa Tahun 2025 Sukses Digelar</h3>
                    <p class="news-excerpt">Festival budaya desa yang digelar selama tiga hari berhasil menarik ribuan pengunjung. Berbagai kesenian tradisional ditampilkan dalam acara ini...</p>
                    <div class="news-footer">
                        <div class="news-author">
                            <i class="fas fa-user"></i>
                            Siti Rahayu
                        </div>
                        <div class="news-actions">
                            <span class="news-views">
                                <i class="far fa-eye"></i>
                                189
                            </span>
                            <a href="#" class="read-more">
                                Baca
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Berita 3 -->
            <div class="news-card">
                <div class="news-image">
                    <img src="https://images.unsplash.com/photo-1577896851231-70ef18881754?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80" alt="News Image">
                    <div class="news-status draft">Draft</div>
                </div>
                <div class="news-content">
                    <div class="news-meta">
                        <span class="news-category">Kesehatan</span>
                        <span class="news-date"><i class="far fa-clock"></i> 4 Hari yang lalu</span>
                    </div>
                    <h3 class="news-title">Posyandu Desa Catat Penurunan Angka Stunting</h3>
                    <p class="news-excerpt">Berkat program intervensi gizi yang konsisten, posyandu desa berhasil mencatat penurunan angka stunting sebesar 15% dalam enam bulan terakhir...</p>
                    <div class="news-footer">
                        <div class="news-author">
                            <i class="fas fa-user"></i>
                            Dr. Maya Sari
                        </div>
                        <div class="news-actions">
                            <span class="news-views">
                                <i class="far fa-eye"></i>
                                98
                            </span>
                            <a href="#" class="read-more">
                                Baca
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

    <!-- Pagination -->
    <div class="pagination">
        <button class="page-btn active">1</button>
        <button class="page-btn">2</button>
        <button class="page-btn">3</button>
        <button class="page-btn next">
            Next
            <i class="fas fa-chevron-right"></i>
        </button>
    </div>
</div>

<style>
    .berita-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 2rem;
    }

    .berita-header {
        text-align: center;
        margin-bottom: 3rem;
    }

    .berita-title {
        font-size: 2.5rem;
        font-weight: 700;
        color: #2c5aa0;
        margin-bottom: 0.5rem;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 1rem;
    }

    .berita-title i {
        color: #f8a01d;
    }

    .berita-subtitle {
        font-size: 1.1rem;
        color: #6c757d;
        margin-bottom: 2rem;
    }

    .filter-section {
        display: flex;
        justify-content: center;
        gap: 2rem;
        flex-wrap: wrap;
        margin-top: 2rem;
    }

    .filter-group {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .filter-group label {
        font-weight: 600;
        color: #2c5aa0;
        white-space: nowrap;
    }

    .filter-select {
        padding: 0.5rem 1rem;
        border: 2px solid #e9ecef;
        border-radius: 25px;
        background: white;
        color: #495057;
        font-size: 0.9rem;
        cursor: pointer;
        transition: all 0.3s ease;
    }

    .filter-select:focus {
        outline: none;
        border-color: #4a7bc8;
        box-shadow: 0 0 0 3px rgba(74, 123, 200, 0.1);
    }

    /* Stats Section */
    .berita-stats {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
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
        width: 50px;
        height: 50px;
        background: rgba(255, 255, 255, 0.2);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .stat-info {
        display: flex;
        flex-direction: column;
    }

    .stat-number {
        font-size: 1.8rem;
        font-weight: 700;
        line-height: 1;
    }

    .stat-label {
        font-size: 0.8rem;
        opacity: 0.9;
    }

    /* Section Titles */
    .section-title {
        font-size: 1.5rem;
        font-weight: 600;
        color: #2c5aa0;
        margin-bottom: 1.5rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    .section-title i {
        color: #f8a01d;
    }

    /* Featured News */
    .featured-section {
        margin-bottom: 3rem;
    }

    .featured-news {
        background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
        border-radius: 20px;
        overflow: hidden;
        box-shadow: 0 15px 35px rgba(0, 0, 0, 0.1);
    }

    .featured-card {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 0;
    }

    .featured-image {
        position: relative;
        height: 100%;
        min-height: 300px;
    }

    .featured-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .featured-badge {
        position: absolute;
        top: 1rem;
        left: 1rem;
        background: #ff6b6b;
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        font-size: 0.8rem;
        font-weight: 600;
    }

    .featured-content {
        padding: 2rem;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    /* News Grid */
    .news-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
        gap: 2rem;
        margin-bottom: 3rem;
    }

    .news-card {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        border: 1px solid #e9ecef;
        transition: all 0.3s ease;
        position: relative;
    }

    .news-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
    }

    .news-image {
        position: relative;
        height: 200px;
        overflow: hidden;
    }

    .news-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.3s ease;
    }

    .news-card:hover .news-image img {
        transform: scale(1.1);
    }

    .news-status {
        position: absolute;
        top: 1rem;
        right: 1rem;
        padding: 0.3rem 0.8rem;
        border-radius: 15px;
        font-size: 0.7rem;
        font-weight: 600;
        text-transform: uppercase;
    }

    .news-status.published {
        background: #51cf66;
        color: white;
    }

    .news-status.draft {
        background: #ffd43b;
        color: #495057;
    }

    .news-content {
        padding: 1.5rem;
    }

    .news-meta {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1rem;
        font-size: 0.8rem;
    }

    .news-category {
        background: #e3f2fd;
        color: #1976d2;
        padding: 0.3rem 0.8rem;
        border-radius: 15px;
        font-weight: 600;
    }

    .news-date {
        color: #6c757d;
        display: flex;
        align-items: center;
        gap: 0.3rem;
    }

    .news-title {
        font-size: 1.1rem;
        font-weight: 700;
        color: #2c5aa0;
        margin-bottom: 0.8rem;
        line-height: 1.4;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-excerpt {
        color: #6c757d;
        line-height: 1.6;
        margin-bottom: 1.5rem;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
    }

    .news-footer {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .news-author {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        color: #6c757d;
        font-size: 0.8rem;
        font-weight: 500;
    }

    .news-actions {
        display: flex;
        align-items: center;
        gap: 1rem;
    }

    .news-views {
        display: flex;
        align-items: center;
        gap: 0.3rem;
        color: #6c757d;
        font-size: 0.8rem;
    }

    .read-more {
        background: linear-gradient(135deg, #4a7bc8 0%, #2c5aa0 100%);
        color: white;
        padding: 0.5rem 1rem;
        border-radius: 20px;
        text-decoration: none;
        font-weight: 600;
        font-size: 0.8rem;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
    }

    .read-more:hover {
        transform: translateX(5px);
        box-shadow: 0 5px 15px rgba(74, 123, 200, 0.4);
        color: white;
        text-decoration: none;
    }

    /* Pagination */
    .pagination {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 0.5rem;
        margin-top: 3rem;
    }

    .page-btn {
        padding: 0.7rem 1.2rem;
        border: 2px solid #e9ecef;
        background: white;
        color: #495057;
        border-radius: 10px;
        cursor: pointer;
        transition: all 0.3s ease;
        font-weight: 600;
    }

    .page-btn:hover {
        border-color: #4a7bc8;
        color: #4a7bc8;
    }

    .page-btn.active {
        background: #4a7bc8;
        border-color: #4a7bc8;
        color: white;
    }

    .page-btn.next {
        display: flex;
        align-items: center;
        gap: 0.5rem;
    }

    /* Responsive Design */
    @media (max-width: 768px) {
        .berita-container {
            padding: 1rem;
        }

        .berita-title {
            font-size: 2rem;
            flex-direction: column;
            gap: 0.5rem;
        }

        .filter-section {
            flex-direction: column;
            align-items: center;
            gap: 1rem;
        }

        .filter-group {
            flex-direction: column;
            align-items: flex-start;
            width: 100%;
            max-width: 300px;
        }

        .berita-stats {
            grid-template-columns: repeat(2, 1fr);
        }

        .featured-card {
            grid-template-columns: 1fr;
        }

        .featured-image {
            min-height: 200px;
        }

        .news-grid {
            grid-template-columns: 1fr;
        }

        .news-footer {
            flex-direction: column;
            gap: 1rem;
            align-items: flex-start;
        }

        .news-actions {
            width: 100%;
            justify-content: space-between;
        }
    }

    @media (max-width: 480px) {
        .berita-stats {
            grid-template-columns: 1fr;
        }

        .stat-card {
            padding: 1rem;
        }
    }

    /* Animation */
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

    .news-card {
        animation: fadeInUp 0.6s ease-out;
    }

    .news-card:nth-child(2) { animation-delay: 0.1s; }
    .news-card:nth-child(3) { animation-delay: 0.2s; }
    .news-card:nth-child(4) { animation-delay: 0.3s; }
    .news-card:nth-child(5) { animation-delay: 0.4s; }
    .news-card:nth-child(6) { animation-delay: 0.5s; }
</style>

<script>
    // Filter functionality
    document.addEventListener('DOMContentLoaded', function() {
        const kategoriFilter = document.getElementById('kategoriFilter');
        const sortFilter = document.getElementById('sortFilter');
        const newsCards = document.querySelectorAll('.news-card');

        // Filter by category
        kategoriFilter.addEventListener('change', function() {
            const selectedCategory = this.value;

            newsCards.forEach(card => {
                const category = card.querySelector('.news-category').textContent.toLowerCase();

                if (selectedCategory === 'all' || category.includes(selectedCategory)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });

        // Add hover effects
        newsCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.transform = 'translateY(-10px) scale(1.02)';
            });

            card.addEventListener('mouseleave', function() {
                this.style.transform = 'translateY(0) scale(1)';
            });
        });
    });
</script>
@endsection
