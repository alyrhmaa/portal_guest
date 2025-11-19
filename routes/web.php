<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\KategoriBeritaController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WargaController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| PUBLIC ROUTE (Boleh tanpa login)
|--------------------------------------------------------------------------
*/

Route::get('/', [GuestController::class, 'beranda'])->name('beranda');

Route::get('/profil', [GuestController::class, 'profil'])->name('profil.index');
Route::get('/agenda', [GuestController::class, 'agenda'])->name('agenda.index');
Route::get('/galeri', [GuestController::class, 'galeri'])->name('galeri.index');
Route::get('/berita', [GuestController::class, 'berita'])->name('berita.index');

Route::get('/about', function () {
    return view('about');
})->name('about');

/*
|--------------------------------------------------------------------------
| AUTH ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.process');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.process');

/* LOGOUT WAJIB POST !!! */
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
})->name('logout.get');

/*
|--------------------------------------------------------------------------
| PROTECTED ROUTE (Wajib Login)
|--------------------------------------------------------------------------
*/

Route::middleware(['auth'])->group(function () {

    /* CRUD USER */
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/tambah', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/simpan', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/edit/{id}', [UserController::class, 'editUser'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'updateUser'])->name('user.update');
    Route::delete('/user/hapus/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    /* CRUD WARGA */
    Route::get('/warga', [WargaController::class, 'index'])->name('warga.index');
    Route::get('/warga/tambah', [WargaController::class, 'wargaTambah'])->name('warga.tambah');
    Route::post('/warga/simpan', [WargaController::class, 'wargaSimpan'])->name('warga.simpan');
    Route::get('/warga/edit/{id}', [WargaController::class, 'wargaEdit'])->name('warga.edit');
    Route::put('/warga/update/{id}', [WargaController::class, 'wargaUpdate'])->name('warga.update');
    Route::delete('/warga/hapus/{id}', [WargaController::class, 'wargaHapus'])->name('warga.hapus');

    /* CRUD KATEGORI BERITA */
    Route::get('/kategori', [KategoriBeritaController::class, 'index'])->name('kategori.index');
    Route::get('/kategori/tambah', [KategoriBeritaController::class, 'create'])->name('kategori.tambah');
    Route::post('/kategori/simpan', [KategoriBeritaController::class, 'store'])->name('kategori.simpan');
    Route::get('/kategori/edit/{id}', [KategoriBeritaController::class, 'edit'])->name('kategori.edit');
    Route::post('/kategori/update/{id}', [KategoriBeritaController::class, 'update'])->name('kategori.update');
    Route::get('/kategori/hapus/{id}', [KategoriBeritaController::class, 'destroy'])->name('kategori.hapus');

    /* CRUD BERITA */
    Route::get('/berita/create', [BeritaController::class, 'create'])->name('berita.create');
    Route::post('/berita', [BeritaController::class, 'store'])->name('berita.store');
    Route::get('/berita/{id}/edit', [BeritaController::class, 'edit'])->name('berita.edit');
    Route::put('/berita/{id}', [BeritaController::class, 'update'])->name('berita.update');
    Route::delete('/berita/{id}', [BeritaController::class, 'destroy'])->name('berita.destroy');
    Route::get('/berita/{id}', [GuestController::class, 'detail'])->name('berita.detail');

    /* PROFIL USER */
    Route::get('/profil/user', [UserController::class, 'profil'])->name('profil.user');
    Route::get('/profil/user/edit', [UserController::class, 'edit'])->name('profil.edit');
    Route::post('/profil/user/update', [UserController::class, 'update'])->name('profil.update');
});
