<?php
namespace App\Http\Controllers;

use App\Models\Berita;
use App\Models\KategoriBerita;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
    public function index()
    {
         $query = Berita::with(['kategori', 'media']);

        // 🔎 Filter Kategori
        if ($request->filled('kategori')) {
            $query->where('kategori_id', $request->kategori);
        }

        // 🔃 Urutkan
        if ($request->urutkan === 'terlama') {
            $query->orderBy('created_at', 'asc');
        } else {
            // default: terbaru
            $query->orderBy('created_at', 'desc');
        }

        $berita = $query->get();
        $kategori = Kategori::all();

        return view('pages.berita.index', compact('berita', 'kategori'));
    }

    public function create()
    {
        $kategori = KategoriBerita::all();
        return view('pages.berita.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'       => 'required',
            'isi_html'    => 'required',
            'kategori_id' => 'required',
            'penulis'     => 'required',
            'status'      => 'required',
        ]);

        // ======== FIX SLUG DUPLIKAT =========
        $slug = \Str::slug($request->judul);

        // Jika slug sudah ada → tambahkan waktu agar unik
        if (Berita::where('slug', $slug)->exists()) {
            $slug = $slug . '-' . time();
        }
        // ====================================

        // SIMPAN BERITA
        $berita = Berita::create([
            'judul'       => $request->judul,
            'slug'        => $slug, // <-- pakai slug unik
            'kategori_id' => $request->kategori_id,
            'isi_html'    => $request->isi_html,
            'penulis'     => $request->penulis,
            'status'      => $request->status,
            'terbit_at'   => $request->status == 'publish' ? now() : null,
        ]);

        // PROSES UPLOAD TANPA STORAGE
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $index => $file) {

                // Buat nama file unik
                $filename = time() . rand(1000, 9999) . '.' . $file->getClientOriginalExtension();

                // Simpan langsung ke public/berita
                $file->storeAs('public/berita', $filename);

                // Simpan data ke tabel media
                Media::create([
                    'ref_table'  => 'berita',
                    'ref_id'     => $berita->berita_id,
                    'file_name'  => $filename,
                    'caption'    => '',
                    'mime_type'  => $file->getClientMimeType(),
                    'sort_order' => $index,
                ]);
            }
        }

        return redirect()->route('berita.index')->with('success', 'Berita berhasil dibuat.');
    }

    public function edit($id)
    {
        $berita   = Berita::findOrFail($id);
        $kategori = KategoriBerita::all();

        return view('pages.berita.edit', compact('berita', 'kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'judul'       => 'required',
            'isi_html'    => 'required',
            'kategori_id' => 'required|exists:kategori_berita,kategori_id',
            'status'      => 'required|in:draft,publish',
            'penulis'     => 'required',
            'files.*'     => 'nullable|file|max:3072',
        ]);

        $berita = Berita::findOrFail($id);

        $berita->update([
            'judul'       => $request->judul,
            'slug'        => Str::slug($request->judul),
            'kategori_id' => $request->kategori_id,
            'isi_html'    => $request->isi_html,
            'status'      => $request->status,
            'penulis'     => $request->penulis,
            'terbit_at'   => $request->status == 'publish' && ! $berita->terbit_at
                ? now()
                : $berita->terbit_at,
        ]);

        // Tambah media baru jika ada upload
        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $i => $file) {

                $filename = time() . '_' . $file->getClientOriginalName();
                $file->storeAs('public/berita', $filename);

                Media::create([
                    'ref_table'  => 'berita',
                    'ref_id'     => $id,
                    'file_name'  => $filename,
                    'mime_type'  => $file->getMimeType(),
                    'sort_order' => $i,
                ]);
            }
        }

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
