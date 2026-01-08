@extends('layouts.guest.main')

@section('content')

    <!-- Hero Section -->
    <section class="berita-page">
        <div class="container">
            <div class="row text-center">
                <div class="col-12">
                    <h1 class="fw-bold mb-3">Berita Terkini</h1>
                    <p class="lead">Informasi dan berita terbaru dari Desa Kami</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content Section -->
    <section class="py-5 bg-light-pink">
        <div class="container">

            <!-- Filter & Stats -->
            <div class="row mb-5">

                <!-- Stats -->
                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card border-0 bg-white shadow-sm text-center p-4">
                                <i class="bi bi-newspaper text-pink fs-1 mb-3"></i>
                                <h3 class="text-pink fw-bold">{{ $berita->count() }}</h3>
                                <p class="text-muted mb-0">Total Berita</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-0 bg-white shadow-sm text-center p-4">
                                <i class="bi bi-calendar-check text-pink fs-1 mb-3"></i>
                                <h3 class="text-pink fw-bold">{{ $berita->where('status', 'publish')->count() }}</h3>
                                <p class="text-muted mb-0">Berita Publik</p>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card border-0 bg-pink text-white shadow-sm text-center p-4">
                                <a href="{{ route('berita.create') }}" class="text-white text-decoration-none">
                                    <i class="bi bi-plus-circle fs-1 mb-3"></i>
                                    <h3 class="fw-bold">+</h3>
                                    <p class="mb-0">Tambah Berita</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filter -->
                <div class="col-md-4">
                    <div class="card border-0 shadow-sm h-100">
                        <div class="card-body">
                            <form method="GET" action="{{ route('berita.index') }}">

                                <h6 class="text-pink fw-bold mb-3">
                                    <i class="bi bi-funnel me-2"></i>Filter Kategori
                                </h6>

                                <div class="d-flex flex-wrap gap-2">
                                    <a href="{{ route('berita.index') }}"
                                        class="kategori-card {{ request('kategori') == null ? 'active' : '' }}">
                                        Semua
                                    </a>

                                    @foreach ($kategori as $k)
                                        <a href="{{ route('berita.index', ['kategori' => $k->id, 'urutkan' => request('urutkan')]) }}"
                                            class="kategori-card {{ request('kategori') == $k->id ? 'active' : '' }}">
                                            {{ $k->nama }}
                                        </a>
                                    @endforeach
                                </div>

                                <option value="">Semua Kategori</option>
                                @foreach ($kategori as $k)
                                    <option value="{{ $k->id }}"
                                        {{ request('kategori') == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama }}
                                    </option>
                                @endforeach
                                </select>

                                <h6 class="text-pink fw-bold mb-2">
                                    <i class="bi bi-sort-down me-2"></i>Urutan
                                </h6>
                                <select name="urutkan" class="form-select form-select-sm" onchange="this.form.submit()">
                                    <option value="terbaru" {{ request('urutkan') == 'terbaru' ? 'selected' : '' }}>
                                        Terbaru
                                    </option>
                                    <option value="terlama" {{ request('urutkan') == 'terlama' ? 'selected' : '' }}>
                                        Terlama
                                    </option>
                                </select>

                            </form>
                        </div>
                    </div>
                </div>


            </div>

            <!-- Action Button -->
            <div class="row mb-4">
                <div class="col-12 text-end">
                    <a href="{{ route('berita.create') }}" class="btn btn-pink px-4">
                        <i class="bi bi-plus-circle me-2"></i>Tambah Berita
                    </a>
                </div>
            </div>

            <!-- Berita Table -->
            <div class="card border-0 shadow-sm">
                <div class="card-header bg-pink text-white py-3">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-list-ul me-2"></i>Semua Berita
                    </h5>
                </div>

                <div class="card-body p-0">
                    @if ($berita->isEmpty())
                        <div class="text-center py-5">
                            <i class="bi bi-newspaper display-4 text-muted mb-3"></i>
                            <h4 class="text-muted mb-3">Belum ada berita</h4>
                            <a href="{{ route('berita.create') }}" class="btn btn-pink px-4">
                                <i class="bi bi-plus-circle me-2"></i>Tambah Berita Pertama
                            </a>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead class="table-light">
                                    <tr>
                                        <th class="ps-4">Foto</th>
                                        <th>Judul Berita</th>
                                        <th>Kategori</th>
                                        <th>Penulis</th>
                                        <th>Status</th>
                                        <th width="120" class="text-center">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($berita as $b)
                                        <tr>
                                            <td class="ps-4">
                                                @php $media = $b->media->first(); @endphp
                                                <img src="{{ $media ? asset('storage/berita/' . $media->file_name) : asset('assets-guest/img/dummy-news.jpg') }}"
                                                    alt="{{ $b->judul }}" style="width:70px;border-radius:10px;">
                                            </td>

                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <i class="bi bi-file-text text-pink me-3"></i>
                                                    <div>
                                                        <h6 class="mb-0 fw-bold">{{ $b->judul }}</h6>
                                                        <small class="text-muted">
                                                            {{ \Carbon\Carbon::parse($b->created_at)->format('d M Y') }}
                                                        </small>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <span class="badge bg-light text-dark">
                                                    {{ $b->kategori->nama }}
                                                </span>
                                            </td>

                                            <td>
                                                <i class="bi bi-person-circle text-pink me-2"></i>{{ $b->penulis }}
                                            </td>

                                            <td>
                                                <span
                                                    class="badge {{ $b->status == 'publish' ? 'bg-success' : 'bg-warning' }} rounded-pill">
                                                    {{ ucfirst($b->status) }}
                                                </span>
                                            </td>

                                            <td class="text-center">
                                                <div class="d-flex gap-2 justify-content-center">
                                                    <a href="{{ route('berita.detail', $b->berita_id) }}"
                                                        class="btn btn-outline-info btn-sm rounded-pill px-3">
                                                        <i class="bi bi-eye"></i>
                                                    </a>
                                                    <a href="{{ route('berita.edit', $b->berita_id) }}"
                                                        class="btn btn-outline-pink btn-sm rounded-pill px-3">
                                                        <i class="bi bi-pencil"></i>
                                                    </a>
                                                    <form action="{{ route('berita.destroy', $b->berita_id) }}"
                                                        method="POST">
                                                        @csrf @method('DELETE')
                                                        <button class="btn btn-outline-danger btn-sm rounded-pill px-3"
                                                            onclick="return confirm('Hapus berita?')">
                                                            <i class="bi bi-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>



@endsection
