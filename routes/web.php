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
