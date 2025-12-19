<?php
namespace App\Http\Controllers;

use App\Models\Media;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    // HALAMAN PROFIL DESA (GUEST)
    public function index()
    {
        $profil = Profil::first();

        // Jika belum ada profil → arahkan ke halaman tambah profil
        if (! $profil) {
            return redirect()->route('profil.create');
        }

        $media = Media::where('ref_table', 'profil')
            ->where('ref_id', $profil->profil_id)
            ->get();

        return view('pages.profil.index', compact('profil', 'media'));
    }

    public function edit()
    {
        $profil = Profil::first();

        // Ambil media logo/foto desa
        $media = Media::where('ref_table', 'profil')
            ->where('ref_id', $profil?->profil_id)
            ->get();

        return view('pages.profil.edit', compact('profil', 'media'));
    }
    public function create()
    {
        return view('pages.profil.create');
    }

    public function storeMedia(Request $request)
    {
        $path = $request->file('file')->store('tmp/uploads', 'local');

        return response()->json([
            'name'          => basename($path),
            'original_name' => $request->file('file')->getClientOriginalName(),
        ]);
    }
    // UPDATE PROFIL DESA + MULTIPLE FILE UPLOAD
    public function update(Request $request)
    {
        $request->validate([
            'nama_desa'     => 'required',
            'kecamatan'     => 'required',
            'kabupaten'     => 'required',
            'provinsi'      => 'required',
            'alamat_kantor' => 'required',
            'email'         => 'required|email',
            'telepon'       => 'required',
            'visi'          => 'nullable',
            'misi'          => 'nullable',
            'logo'          => 'nullable|image|max:2048',
        ]);

        $profil = Profil::first();

        // JIKA KOSONG → CREATE
        if (! $profil) {
            $profil = Profil::create($request->except('logo'));
        } else {
            $profil->update($request->except('logo'));
        }

        // UPLOAD LOGO
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('profil/logo', 'public');

            $profil->update([
                'logo' => $path,
            ]);
        }

        return redirect()->route('profil.index')
            ->with('success', 'Profil Desa berhasil diperbarui!');
    }
}
