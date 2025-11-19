@extends('layouts.guest.main')

@section('content')
<div class="container">
    <h2>Daftar Berita</h2>

    <a href="{{ route('berita.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Penulis</th>
                <th>Status</th>
                <th width="150px">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($berita as $b)
            <tr>
                <td>{{ $b->judul }}</td>
                <td>{{ $b->kategori->nama }}</td>
                <td>{{ $b->penulis }}</td>
                <td>{{ $b->status }}</td>
                <td>
                    <a href="{{ route('berita.edit', $b->berita_id) }}" class="btn btn-warning btn-sm">Edit</a>
                    <form action="{{ route('berita.destroy', $b->berita_id) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus berita?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
