<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
        $berita = Berita::with('kategori')->get();
        return view('pages.berita.index', compact('berita'));
    }

    public function create()
    {
        $kategori = KategoriBerita::all();
        return view('pages.berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'isi_html' => 'required',
            'kategori_id' => 'required|exists:kategori_berita,kategori_id',
            'status' => 'required',
        ]);

        Berita::create([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'kategori_id' => $request->kategori_id,
            'isi_html' => $request->isi_html,
            'status' => $request->status,
            'penulis' => auth()->user()->name ?? 'Admin',
            'terbit_at' => now(),
        ]);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dibuat.');
    }

    public function edit($id)
    {
        $berita = Berita::findOrFail($id);
        $kategori = KategoriBerita::all();

        return view('pages.berita.edit', compact('berita','kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul' => 'required',
            'isi_html' => 'required',
            'kategori_id' => 'required|exists:kategori_berita,kategori_id',
            'status' => 'required',
        ]);

        $berita = Berita::findOrFail($id);

        $berita->update([
            'judul' => $request->judul,
            'slug' => Str::slug($request->judul),
            'kategori_id' => $request->kategori_id,
            'isi_html' => $request->isi_html,
            'status' => $request->status,
            'penulis' => $request->penulis,
        ]);

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $berita = Berita::findOrFail($id);
        $berita->delete();

        return redirect()->route('berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }
}
