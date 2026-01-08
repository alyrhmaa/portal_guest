@extends('layouts.guest.main')

@section('content')
<div class="container my-5">

    <h2 class="text-center fw-bold mb-4">Data Warga</h2>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="text-center mb-4">
        <a href="{{ route('warga.tambah') }}" class="btn btn-primary px-4 py-2 rounded-pill">
            + Tambah Warga
        </a>
    </div>

    {{-- Search --}}
    <form method="GET" action="{{ route('warga.index') }}" class="mb-5">
        <div class="input-group input-group-lg">
            <input type="text"
                   name="search"
                   class="form-control search-input"
                   placeholder="Cari nama / KTP / Laki-laki / Perempuan"
                   value="{{ request('search') }}">
            <button class="btn btn-primary search-btn px-4">🔍</button>
        </div>
    </form>

    {{-- Data --}}
    @if ($warga->isEmpty())
        <p class="text-center text-muted">Belum ada data warga.</p>
    @else
        <div class="warga-stack">
            @foreach ($warga as $w)
                <div class="warga-box">

                    <div class="warga-header">
                        {{ $w->nama }}
                    </div>

                    <div class="warga-body">
                        <div><strong>No KTP</strong><span>{{ $w->no_ktp }}</span></div>
                        <div><strong>Jenis Kelamin</strong><span>{{ $w->jenis_kelamin }}</span></div>
                        <div><strong>Agama</strong><span>{{ $w->agama }}</span></div>
                        <div><strong>Pekerjaan</strong><span>{{ $w->pekerjaan }}</span></div>
                        <div><strong>Telp</strong><span>{{ $w->telp }}</span></div>
                        <div><strong>Email</strong><span>{{ $w->email }}</span></div>
                    </div>

                    <div class="warga-footer">
                        <a href="{{ route('warga.edit', $w->warga_id) }}" class="btn btn-edit">
                            Edit
                        </a>

                        <form action="{{ route('warga.hapus', $w->warga_id) }}"
                              method="POST"
                              onsubmit="return confirm('Yakin hapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-hapus">
                                Hapus
                            </button>
                        </form>
                    </div>

                </div>
            @endforeach
        </div>

        <div class="mt-5 d-flex justify-content-center">
            {{ $warga->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection
