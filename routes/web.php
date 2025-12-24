<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\AgendaController;
use App\Http\Controllers\ProfilController;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES (TANPA LOGIN)
|--------------------------------------------------------------------------
*/

// BERANDA
Route::get('/', [GuestController::class, 'beranda'])->name('beranda');
Route::get('/home', [GuestController::class, 'beranda'])->name('home');

// ABOUT
Route::get('/tentang', [GuestController::class, 'about'])->name('tentang');

// PROFIL DESA
Route::get('/profil', [ProfilController::class, 'index'])->name('profil.index');

// BERITA
Route::get('/berita', [GuestController::class, 'berita'])->name('berita.index');
Route::get('/berita/detail/{id}', [GuestController::class, 'detail'])->name('berita.detail');

// GALERI (PUBLIC)
Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri.index');

// AGENDA
Route::get('/agenda', [AgendaController::class, 'index'])->name('agenda.index');

// IDENTITAS
Route::get('/identitas', fn () => view('pages.identitas'))->name('identitas');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ROUTE LOGIN (ADMIN & USER) — VIEW ONLY
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    // USER
    Route::get('/user', [UserController::class, 'index'])->name('user.index');

    // WARGA (LIHAT DATA)
    Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');

    // KATEGORI
    Route::get('/kategori', [KategoriBeritaController::class, 'index'])->name('kategori.index');

    // BERITA MANAGE
    Route::get('/berita/manage', [BeritaController::class, 'index'])->name('berita.manage');

    // GALERI MANAGE
    Route::get('/galeri/manage', [GaleriController::class, 'index'])->name('galeri.manage');

    // AGENDA MANAGE
    Route::get('/agenda/manage', [AgendaController::class, 'manage'])->name('agenda.manage');
});

/*
|--------------------------------------------------------------------------
| ROUTE KHUSUS ADMIN (CRUD)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'role:admin'])->group(function () {

    // USER CRUD
    Route::get('/user/tambah', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/simpan', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'updateUser'])->name('user.update');
    Route::delete('/user/hapus/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // WARGA CRUD
    Route::get('/warga/tambah', [WargaController::class, 'wargaTambah'])->name('warga.tambah');
    Route::post('/warga/simpan', [WargaController::class, 'wargaSimpan'])->name('warga.simpan');
    Route::get('/warga/edit/{id}', [WargaController::class, 'wargaEdit'])->name('warga.edit');
    Route::put('/warga/update/{id}', [WargaController::class, 'wargaUpdate'])->name('warga.update');
    Route::delete('/warga/hapus/{id}', [WargaController::class, 'wargaHapus'])->name('warga.hapus');

    // KATEGORI CRUD
    Route::get('/kategori/tambah', [KategoriBeritaController::class, 'create'])->name('kategori.create');
    Route::post('/kategori/simpan', [KategoriBeritaController::class, 'store'])->name('kategori.store');
    Route::get('/kategori/edit/{id}', [KategoriBeritaController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori/update/{id}', [KategoriBeritaController::class, 'update'])->name('kategori.update');
    Route::delete('/kategori/hapus/{id}', [KategoriBeritaController::class, 'destroy'])->name('kategori.destroy');

    // BERITA CRUD
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');

    // GALERI CRUD
    Route::get('/galeri/create', [GaleriController::class, 'create'])->name('galeri.create');
    Route::post('/galeri', [GaleriController::class, 'store'])->name('galeri.store');
    Route::get('/galeri/{id}/edit', [GaleriController::class, 'edit'])->name('galeri.edit');
    Route::put('/galeri/{id}', [GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('/galeri/{id}', [GaleriController::class, 'destroy'])->name('galeri.destroy');
    Route::delete('/foto/{id}', [GaleriController::class, 'hapusFoto'])->name('galeri.deleteFoto');

    // PROFIL DESA
    Route::get('/profil/edit', [ProfilController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/update', [ProfilController::class, 'update'])->name('profil.update');

    // AGENDA CRUD
    Route::get('/agenda/create', [AgendaController::class, 'create'])->name('agenda.create');
    Route::post('/agenda/store', [AgendaController::class, 'store'])->name('agenda.store');
    Route::get('/agenda/edit/{id}', [AgendaController::class, 'edit'])->name('agenda.edit');
    Route::put('/agenda/update/{id}', [AgendaController::class, 'update'])->name('agenda.update');
    Route::delete('/agenda/hapus/{id}', [AgendaController::class, 'destroy'])->name('agenda.destroy');
});
