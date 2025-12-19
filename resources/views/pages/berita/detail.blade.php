@extends('layouts.guest.main')

@section('content')
<div class="container">

    <h2>{{ $berita->judul }}</h2>
    <small>Kategori: {{ $berita->kategori->nama }}</small>

    <div class="mt-3">
        {!! $berita->isi_html !!}
    </div>

    <hr>

    <h4>Media / Foto Pendukung:</h4>
    @forelse ($media as $m)
        @if (str_contains($m->mime_type, 'image'))
            <img src="{{ asset('berita/' . $m->file_name) }}"
                 style="width:250px; margin:10px;">
        @else
            <a href="{{ asset('storage/berita/' . $m->file_name) }}" target="_blank">
                📄 {{ $m->file_name }}
            </a><br>
        @endif
    @empty
        <p class="text-muted">Tidak ada media untuk berita ini.</p>
    @endforelse

</div>
@endsection
