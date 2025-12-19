<?php
namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    public function index()
    {
        $galeri = Galeri::with('media')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('pages.galeri.index', [
            'title'      => 'Galeri Desa',
            'galeri'     => $galeri,
            'totalAlbum' => Galeri::count(),
            'totalFoto'  => Media::where('ref_table', 'galeri')->count(),
        ]);
    }

    public function create()
    {
        return view('pages.galeri.create', [
            'title' => 'Tambah Galeri',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required',
            'deskripsi' => 'required',
            'foto.*'    => 'image|mimes:jpg,jpeg,png|max:2048',
        ]);

        // buat album
        $galeri = Galeri::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        // simpan foto ke tabel media
        if ($request->hasFile('foto')) {
            $this->saveMedia($request->file('foto'), $galeri->galeri_id);
        }

        return redirect()->route('galeri.index')
            ->with('success', 'Album galeri berhasil dibuat!');
    }

    public function edit($id)
    {
        $galeri = Galeri::with('media')->findOrFail($id);

        return view('pages.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, $id)
    {
        $galeri = Galeri::findOrFail($id);

        $galeri->update([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        // tambah foto baru
        if ($request->hasFile('foto')) {
            $this->saveMedia($request->file('foto'), $galeri->galeri_id);
        }

        return redirect()->route('galeri.index')
            ->with('success', 'Album berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $galeri = Galeri::with('media')->findOrFail($id);

        // hapus file fisik
        foreach ($galeri->media as $m) {
            File::delete(public_path('uploads/galeri/' . $m->file_name));
        }

        // hapus media DB
        Media::where('ref_table', 'galeri')
            ->where('ref_id', $id)
            ->delete();

        // hapus album
        $galeri->delete();

        return redirect()->route('galeri.index')
            ->with('success', 'Galeri berhasil dihapus');
    }

    public function hapusFoto($id)
    {
        $media = Media::findOrFail($id);

        // hapus file fisik
        $path = public_path('uploads/galeri/' . $media->file_name);
        if (file_exists($path)) {
            unlink($path);
        }

        $media->delete();

        return back()->with('success', 'Foto berhasil dihapus.');
    }

    private function saveMedia($files, $galeri_id)
    {
        foreach ($files as $i => $file) {
            $name = time() . '-' . uniqid() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads/galeri'), $name);

            Media::create([
                'ref_table'  => 'galeri',
                'ref_id'     => $galeri_id,
                'file_name'  => $name,
                'mime_type'  => $file->getClientMimeType(),
                'sort_order' => $i + 1,
            ]);
        }
    }
}
