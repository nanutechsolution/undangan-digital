<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\Admin\ThemeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RsvpController; // Pastikan ini juga di-import

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda.
| Rute-rute ini dimuat oleh RouteServiceProvider dalam grup yang
| berisi grup middleware "web". Sekarang buat sesuatu yang hebat!
|
*/

// Rute Halaman Utama (Welcome Page)
Route::get('/', function () {
    return view('welcome');
});

// Rute Dashboard (Spesifik, harus di atas rute publik)
Route::get('/dashboard', DashboardController::class)
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

// Rute untuk user yang sudah login (Authenticated User Routes)
Route::middleware(['auth'])->group(function () {
    // Rute Profil Pengguna (Breeze default)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Rute untuk membuat undangan baru
    Route::get('/invitations/create', [InvitationController::class, 'create'])->name('invitations.create');
    Route::get('/invitations/{invitation}/edit', [InvitationController::class, 'edit'])->name('invitations.edit');
    Route::put('/invitations/{invitation}', [InvitationController::class, 'update'])->name('invitations.update');
    Route::delete('/invitations/{invitation}', [InvitationController::class, 'destroy'])->name('invitations.destroy');

    // Rute untuk menyimpan undangan baru
    Route::post('/invitations', [InvitationController::class, 'store'])->name('invitations.store');
    // Rute untuk menampilkan daftar RSVP sebuah undangan
    Route::get('/invitations/{invitation}/rsvps', [RsvpController::class, 'index'])->name('invitations.rsvps.index');
    // Rute untuk galeri
    Route::get('/invitations/{invitation}/galleries', [GalleryController::class, 'index'])->name('invitations.galleries.index');
    Route::post('/invitations/{invitation}/galleries', [GalleryController::class, 'store'])->name('galleries.store');
    Route::delete('/galleries/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy');

    // Rute untuk halaman berbagi undangan massal
    Route::get('/invitations/{invitation}/share', [InvitationController::class, 'share'])->name('invitations.share');
});

// Rute untuk Admin Panel (Manajemen Tema) - Dilindungi middleware 'auth'
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::resource('themes', ThemeController::class);
});
require __DIR__ . '/auth.php';
// Rute untuk proses RSVP tamu (POST request, juga spesifik untuk slug + /rsvp)
// Posisi di sini sudah benar, di atas rute {slug} agar tidak tertangkap sebagai slug
Route::post('/{slug}/rsvp', [InvitationController::class, 'storeRsvp'])->name('invitations.store-rsvp');
// Rute untuk menampilkan undangan publik (Catch-all for slugs)
// Ini harus menjadi rute terakhir atau paling bawah yang umum
// Agar rute spesifik di atasnya tidak tertimpa
Route::get('/{slug}', [InvitationController::class, 'show'])->name('invitations.show');
// File rute autentikasi bawaan Breeze