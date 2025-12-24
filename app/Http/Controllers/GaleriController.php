<?php

namespace App\Http\Controllers;

use App\Models\Galeri;
use App\Models\Media;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class GaleriController extends Controller
{
    /**
     * PUBLIC & MANAGE VIEW
     */
    public function index()
    {
        $galeri = Galeri::with('media')
            ->orderBy('created_at', 'desc')
            ->paginate(10); // WAJIB paginate, bukan get()

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

        $galeri = Galeri::create([
            'judul'     => $request->judul,
            'deskripsi' => $request->deskripsi,
        ]);

        if ($request->hasFile('foto')) {
            $this->saveMedia($request->file('foto'), $galeri->galeri_id);
        }

        return redirect()->route('galeri.manage')
            ->with('success', 'Album galeri berhasil dibuat');
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

        if ($request->hasFile('foto')) {
            $this->saveMedia($request->file('foto'), $galeri->galeri_id);
        }

        return redirect()->route('galeri.manage')
            ->with('success', 'Galeri berhasil diperbarui');
    }

    public function destroy($id)
    {
        $galeri = Galeri::with('media')->findOrFail($id);

        foreach ($galeri->media as $media) {
            File::delete(public_path('uploads/galeri/' . $media->file_name));
        }

        Media::where('ref_table', 'galeri')
            ->where('ref_id', $id)
            ->delete();

        $galeri->delete();

        return redirect()->route('galeri.manage')
            ->with('success', 'Galeri berhasil dihapus');
    }

    public function hapusFoto($id)
    {
        $media = Media::findOrFail($id);

        $path = public_path('uploads/galeri/' . $media->file_name);
        if (file_exists($path)) {
            unlink($path);
        }

        $media->delete();

        return back()->with('success', 'Foto berhasil dihapus');
    }

    /**
     * Simpan multiple foto
     */
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
