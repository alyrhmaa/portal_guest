<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Media;
use App\Models\Profil;

class GuestController extends Controller
{
    // ==========================
    // 🌸 HALAMAN BERANDA (HOME)
    // ==========================
    public function beranda()
    {
        return view('pages.beranda');
    }

    // ==========================
    // 🌸 HALAMAN PROFIL DESA
    // ==========================
    public function profil()
    {
        // Ambil data profil dari database
        $profil = \App\Models\Profil::first();

        return view('pages.profil', compact('profil'));
    }

    // ==========================
    // 🌸 HALAMAN ABOUT
    // ==========================
    public function about()
    {
        return view('about');
    }

    // ==========================
    // 🌸 HALAMAN KATEGORI (HANYA TAMPIL, BUKAN CRUD)
    // ==========================
    public function kategori()
    {
        $kategori       = Kategori::withCount('berita')->get();
        $totalKategori  = Kategori::count();
        $totalBerita    = Berita::count();
        $beritaBulanIni = Berita::whereMonth('created_at', now()->month)->count();

        return view('pages.kategori-berita.index', compact(
            'kategori',
            'totalKategori',
            'totalBerita',
            'beritaBulanIni'
        ));
    }

    // ==========================
    // 🌸 HALAMAN BERITA
    // ==========================
    public function berita()
    {
        $berita   = Berita::with('kategori')->latest()->get();
        $kategori = KategoriBerita::all();
        $monthly  = Berita::whereMonth('created_at', now()->month)->count();

        return view('pages.berita', compact('berita', 'kategori', 'monthly'));
    }

    public function detail($id)
    {
        $berita = Berita::with('kategori')->findOrFail($id);

        $media = Media::where('ref_table', 'berita')
            ->where('ref_id', $id)
            ->orderBy('sort_order')
            ->get();

        return view('pages.berita.detail', compact('berita', 'media'));
    }

    // ==========================
    // 🌸 HALAMAN AGENDA
    // ==========================
    public function agenda()
    {
        return view('pages.agenda');
    }

    // ==========================
    // 🌸 HALAMAN GALERI
    // ==========================
    public function galeri()
    {
        $totalAlbum = \App\Models\Galeri::count();
        $totalFoto  = \App\Models\Media::where('ref_table', 'galeri')->count();

        $galeri = \App\Models\Galeri::with('media')->get();

        return view('pages.galeri.index', [
            'title'      => 'Galeri Desa',
            'totalAlbum' => $totalAlbum,
            'totalFoto'  => $totalFoto,
            'galeri'     => $galeri,
        ]);

    }

}
