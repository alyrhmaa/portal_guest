<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\AuthController;

// ROUTES UNTUK HALAMAN TAMU (GUEST)
Route::get('/', [GuestController::class, 'dashboard'])->name('dashboard');
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


// ====================================================
// ✳️ CRUD DATA WARGA — tampil di halaman Home
// ====================================================

// Form tambah warga
Route::get('/warga/tambah', [GuestController::class, 'wargaTambah'])->name('warga.tambah');

// Simpan data baru
Route::post('/warga/simpan', [GuestController::class, 'wargaSimpan'])->name('warga.simpan');

// Edit data warga
Route::get('/warga/edit/{id}', [GuestController::class, 'wargaEdit'])->name('warga.edit');

// Update data warga
Route::post('/warga/update/{id}', [GuestController::class, 'wargaUpdate'])->name('warga.update');

// Hapus data warga
Route::delete('/warga/hapus/{id}', [GuestController::class, 'wargaHapus'])->name('warga.hapus');


// CRUD Kategori Berita
Route::get('/kategori', [GuestController::class, 'kategori'])->name('kategori.index');
Route::get('/kategori/tambah', [GuestController::class, 'kategoriTambah'])->name('kategori.tambah');
Route::post('/kategori/simpan', [GuestController::class, 'kategoriSimpan'])->name('kategori.simpan');
Route::get('/kategori/edit/{id}', [GuestController::class, 'kategoriEdit'])->name('kategori.edit');
Route::post('/kategori/update/{id}', [GuestController::class, 'kategoriUpdate'])->name('kategori.update');
Route::get('/kategori/hapus/{id}', [GuestController::class, 'kategoriHapus'])->name('kategori.hapus');
