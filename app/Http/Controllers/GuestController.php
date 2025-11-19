<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\KategoriBerita;
use App\Models\Berita;

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
        return view('pages.profil');
    }

    // ==========================
    // 🌸 HALAMAN ABOUT
    // ==========================
    public function about()
    {
        return view('pages.about');
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
        return view('pages.berita-detail', compact('berita'));
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
        return view('pages.galeri');
    }
}
