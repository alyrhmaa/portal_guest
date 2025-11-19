<?php
namespace App\Http\Controllers;

use App\Models\Warga;
use Illuminate\Http\Request;

class WargaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function beranda()
    {
        return view('pages.beranda'); // tampilkan beranda khusus
    }

    public function index()
    {
        if (! Session::has('user')) {
            return redirect()->route('login')->with('error', 'Silakan login dulu');
        }
        
        $warga = Warga::all();
        return view('pages.warga.index', compact('warga'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function wargaTambah()
    {
        return view('pages.warga.create');
    }

    /**
     * Store a newly created resource in storage.
     */
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

    /**
     * Display the specified resource.
     */
    public function wargaEdit(string $id)
    {
        $warga = Warga::findOrFail($id);
        return view('pages.warga.edit', compact('warga'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function wargaUpdate(Request $request, string $id)
    {
        $warga = Warga::findOrFail($id);
        $warga->update($request->all());

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function wargaHapus(string $id)
    {
        Warga::findOrFail($id)->delete();

        return redirect()->route('warga.index')->with('success', 'Data warga berhasil dihapus!');
    }
}
