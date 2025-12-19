<?php
namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    // BERANDA
    public function beranda()
    {
        return view('pages.beranda');
    }

    // LIST WARGA
    public function index(Request $request)
    {
        if (! auth()->check()) {
            return redirect()->route('login')->with('error', 'Silakan login dulu');
        }

        $search = $request->search;

        $warga = Warga::filter($request->only('search'))
            ->paginate(5)
            ->withQueryString();

        return view('pages.warga.index', compact('warga'));
    }

    // FORM TAMBAH
    public function wargaTambah()
    {
        return view('pages.warga.create');
    }

    // SIMPAN DATA
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

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil ditambahkan!');
    }

    // EDIT FORM
    public function wargaEdit(string $id)
    {
        $warga = Warga::findOrFail($id);
        return view('pages.warga.edit', compact('warga'));
    }

    // UPDATE DATA
    public function wargaUpdate(Request $request, string $id)
    {
        $warga = Warga::findOrFail($id);
        $warga->update($request->all());

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui!');
    }

    // HAPUS DATA
    public function wargaHapus(string $id)
    {
        Warga::findOrFail($id)->delete();

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus!');
    }
}
