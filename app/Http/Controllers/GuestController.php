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
        return view('pages.guest.beranda');
    }

    // ==========================
    // 🌸 HALAMAN PROFIL DESA
    // ==========================
    public function profil()
    {
        return view('pages.guest.profil');
    }

    public function about()
{
    return view('pages.guest.about');
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

        return view('pages.guest.kategori', compact('kategori', 'totalKategori', 'totalBerita', 'beritaBulanIni'));
    }

    // ==========================
    // 🌸 HALAMAN BERITA
    // ==========================
    public function berita()
    {
        return view('pages.guest.berita');
    }

    // ==========================
    // 🌸 HALAMAN AGENDA
    // ==========================
    public function agenda()
    {
        return view('pages.guest.agenda');
    }

    // ==========================
    // 🌸 HALAMAN GALERI
    // ==========================
    public function galeri()
    {
        return view('pages.guest.galeri');
    }

    // ==========================
    // 🌸 CRUD DATA WARGA
    // ==========================
    public function warga()
    {
        $warga = Warga::all();
        return view('pages.guest.warga', compact('warga'));
    }

    public function wargaTambah()
    {
        return view('pages.guest.warga-tambah');
    }

    public function wargaSimpan(Request $request)
    {
        $request->validate([
            'no_ktp' => 'required|unique:warga',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
        ]);

        Warga::create($request->all());

        return redirect()->route('dashboard')->with('success', 'Data warga berhasil ditambahkan!');
    }

    public function wargaEdit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('pages.guest.warga-edit', compact('warga'));
    }

    public function wargaUpdate(Request $request, $id)
    {
        $warga = Warga::findOrFail($id);
        $request->validate([
            'no_ktp' => 'required|unique:warga,no_ktp,' . $id . ',warga_id',
            'nama' => 'required',
            'jenis_kelamin' => 'required',
            'agama' => 'required',
            'pekerjaan' => 'required',
        ]);

        $warga->update($request->all());
        return redirect()->route('dashboard')->with('success', 'Data warga berhasil diperbarui!');
    }

    public function wargaHapus($id)
    {
        $warga = Warga::findOrFail($id);
        $warga->delete();
        return redirect()->route('dashboard')->with('success', 'Data warga berhasil dihapus!');
    }

    // ==========================
    // 🌸 CRUD KATEGORI BERITA
    // ==========================
    public function kategoriTambah()
    {
        return view('pages.guest.kategori-tambah');
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
        return view('pages.guest.kategori-edit', compact('kategori'));
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
