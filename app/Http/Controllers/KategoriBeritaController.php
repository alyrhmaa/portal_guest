<?php

namespace App\Http\Controllers;

use App\Models\KategoriBerita;
use App\Models\Berita;   // ← Tambahkan model Berita
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class KategoriBeritaController extends Controller
{
    // ==========================
    // 🌸 INDEX LIST KATEGORI
    // ==========================
    public function index()
    {
        // ambil semua kategori + hitung berita per kategori
        $kategori = KategoriBerita::withCount('berita')->get();

        $totalKategori = KategoriBerita::count();
        $totalBerita = Berita::count();
        $beritaBulanIni = Berita::whereMonth('created_at', now()->month)->count();

        return view('pages.kategori-berita.index', compact(
            'kategori',
            'totalKategori',
            'totalBerita',
            'beritaBulanIni'
        ));
    }

    // ==========================
    // 🌸 FORM TAMBAH
    // ==========================
    public function create()
    {
        return view('pages.kategori-berita.create');
    }

    // ==========================
    // 🌸 SIMPAN DATA
    // ==========================
    public function store(Request $request)
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

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan!');
    }

    // ==========================
    // 🌸 EDIT
    // ==========================
    public function edit($id)
    {
        $kategori = KategoriBerita::findOrFail($id);
        return view('pages.kategori-berita.edit', compact('kategori'));
    }

    // ==========================
    // 🌸 UPDATE
    // ==========================
    public function update(Request $request, $id)
    {
        $request->validate([
        'nama' => 'required',
        'deskripsi' => 'nullable',
    ]);

    $kategori = KategoriBerita::findOrFail($id);

    $kategori->update([
        'nama' => $request->nama,
        'slug' => Str::slug($request->nama),
        'deskripsi' => $request->deskripsi,
    ]);

    return redirect()->route('kategori.index')
        ->with('success', 'Kategori berhasil diperbarui.');
}

    // ==========================
    // 🌸 DELETE
    // ==========================
    public function destroy($id)
    {
        $kategori = KategoriBerita::findOrFail($id);
    $kategori->delete();

    return redirect()->route('kategori.index')
        ->with('success', 'Kategori berhasil dihapus.');
    }
}
