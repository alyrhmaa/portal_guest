<?php

namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    // LIST WARGA (ADMIN & USER LOGIN)
    public function index(Request $request)
    {
        $warga = Warga::filter($request->only('search'))
            ->paginate(5)
            ->withQueryString();

        return view('pages.warga.index', compact('warga'));
    }

    // FORM TAMBAH (ADMIN)
    public function wargaTambah()
    {
        return view('pages.warga.create');
    }

    // SIMPAN DATA (ADMIN)
    public function wargaSimpan(Request $request)
    {
        $request->validate([
            'no_ktp'        => 'required|unique:warga,no_ktp',
            'nama'          => 'required',
            'jenis_kelamin' => 'required',
            'agama'         => 'required',
            'pekerjaan'     => 'required',
            'telp'          => 'required',
            'email'         => 'required|email',
        ]);

        Warga::create($request->all());

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil ditambahkan!');
    }

    // FORM EDIT (ADMIN)
    public function wargaEdit(string $id)
    {
        $warga = Warga::findOrFail($id);
        return view('pages.warga.edit', compact('warga'));
    }

    // UPDATE DATA (ADMIN)
    public function wargaUpdate(Request $request, string $id)
    {
        $warga = Warga::findOrFail($id);
        $warga->update($request->all());

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil diperbarui!');
    }

    // HAPUS DATA (ADMIN)
    public function wargaHapus(string $id)
    {
        Warga::findOrFail($id)->delete();

        return redirect()->route('warga.index')
            ->with('success', 'Data warga berhasil dihapus!');
    }
}
