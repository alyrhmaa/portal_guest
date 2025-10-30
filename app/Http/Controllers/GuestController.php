<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function dashboard()
    {
        return view('guest.dashboard');
    }

    public function profil()
    {
        return view('guest.profil');
    }

    public function kategori()
    {
        return view('guest.kategori');
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
}
