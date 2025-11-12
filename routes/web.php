<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\WargaController;


Route::get('/profil', [GuestController::class, 'profil'])->name('profil.index');
Route::get('/kategori', [GuestController::class, 'kategori'])->name('kategori.index');
Route::get('/berita', [GuestController::class, 'berita'])->name('berita.index');
Route::get('/agenda', [GuestController::class, 'agenda'])->name('agenda.index');
Route::get('/galeri', [GuestController::class, 'galeri'])->name('galeri.index');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/about', function () {
    return view('about');
})->name('about');


// CRUD Form tambah warga
Route::get('/', [WargaController::class, 'index'])->name('beranda');
Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');
Route::get('/warga/tambah', [WargaController::class, 'wargaTambah'])->name('warga.tambah');
Route::post('/warga/simpan', [WargaController::class, 'wargaSimpan'])->name('warga.simpan');
Route::get('/warga/edit/{id}', [WargaController::class, 'wargaEdit'])->name('warga.edit');
Route::put('/warga/update/{id}', [WargaController::class, 'wargaUpdate'])->name('warga.update');
Route::delete('/warga/hapus/{id}', [WargaController::class, 'wargaHapus'])->name('warga.hapus');


// CRUD Kategori Berita
Route::get('/kategori', [GuestController::class, 'kategori'])->name('kategori.index');
Route::get('/kategori/tambah', [GuestController::class, 'kategoriTambah'])->name('kategori.tambah');
Route::post('/kategori/simpan', [GuestController::class, 'kategoriSimpan'])->name('kategori.simpan');
Route::get('/kategori/edit/{id}', [GuestController::class, 'kategoriEdit'])->name('kategori.edit');
Route::post('/kategori/update/{id}', [GuestController::class, 'kategoriUpdate'])->name('kategori.update');
Route::get('/kategori/hapus/{id}', [GuestController::class, 'kategoriHapus'])->name('kategori.hapus');

