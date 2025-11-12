<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    // ==========================
    // 🌸 HALAMAN BERANDA (HOME)
    // ==========================
    public function beranda()
    {

    $warga = Warga::all(); // ambil semua data warga
    return view('pages.beranda', compact('warga'));
    }

    // ==========================
    // 🌸 HALAMAN PROFIL DESA
    // ==========================
    public function profil()
    {
        return view('pages.profil');
    }

    public function about()
{
    return view('pages.about');
}

    // ==========================
    // 🌸 HALAMAN KATEGORI BERITA
    // ==========================
    public function kategori()
    {
        $kategori = KategoriBerita::all();

        $totalKategori = KategoriBerita::count();
        $totalBerita = 0; // sementara kosong
        $beritaBulanIni = 0;

        return view('pages.kategori-berita.index', compact('kategori', 'totalKategori', 'totalBerita', 'beritaBulanIni'));
    }

    // ==========================
    // 🌸 HALAMAN BERITA
    // ==========================
    public function berita()
    {
        return view('pages.berita');
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


    // ==========================
    // 🌸 CRUD KATEGORI BERITA
    // ==========================
    public function kategoriTambah()
    {
        return view('pages.kategori-berita.create');
    }

    public function kategoriSimpan(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
        ]);

        KategoriBerita::create([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil ditambahkan!');
    }

    public function kategoriEdit($id)
    {
        $kategori = KategoriBerita::findOrFail($id);
        return view('pages.kategori-berita.edit', compact('kategori'));
    }

    public function kategoriUpdate(Request $request, $id)
    {
        $kategori = KategoriBerita::findOrFail($id);

        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $kategori->update([
            'nama' => $request->nama,
            'slug' => Str::slug($request->nama),
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil diperbarui!');
    }

    public function kategoriHapus($id)
    {
        $kategori = KategoriBerita::findOrFail($id);
        $kategori->delete();

        return redirect()->route('kategori.index')->with('success', 'Kategori berhasil dihapus!');
    }
}
