<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GuestController extends Controller
{
    public function dashboard()
    {
        $warga = Warga::all(); // ambil semua data dari tabel warga
        return view('guest.dashboard', compact('warga'));
    }

    public function profil()
    {
        return view('guest.profil');
    }

    public function kategori()
    {
        $kategori = KategoriBerita::all();

        // Hitung jumlah kategori & berita
        $totalKategori = KategoriBerita::count();
        $totalBerita = 0; // nanti diisi kalau sudah ada model Berita
        $beritaBulanIni = 0; // sementara kosong juga

        return view('guest.kategori', compact('kategori', 'totalKategori', 'totalBerita', 'beritaBulanIni'));
    }

    public function berita()
    {
        return view('guest.berita');
    }

    public function agenda()
    {
        return view('guest.agenda');
    }

    public function galeri()
    {
        return view('guest.galeri');
    }

    public function warga()
    {
        $warga = Warga::all();
        return view('guest.warga', compact('warga'));
    }

    public function wargaTambah()
    {
        return view('guest.warga-tambah');
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

        // Ubah redirect ke 'dashboard' karena data warga ditampilkan di halaman utama
        return redirect()->route('dashboard')->with('success', 'Data warga berhasil ditambahkan!');
    }

    public function wargaEdit($id)
    {
        $warga = Warga::findOrFail($id);
        return view('guest.warga-edit', compact('warga'));
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

    public function kategoriTambah()
    {
        return view('guest.kategori-tambah');
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
        return view('guest.kategori-edit', compact('kategori'));
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
