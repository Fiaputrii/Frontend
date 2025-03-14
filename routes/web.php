<?php

use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenWaliController;
use App\Http\Controllers\PertemuanPerwalianController;
use App\Http\Controllers\NotifikasiController;

Route::get('/', function () {
    return view('login');
})->name('login');

// Rute untuk Halaman Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');  // Pastikan view ini ada di resources/views/dashboard.blade.php
});

// Rute untuk CRUD Mahasiswa
Route::get('/mahasiswa', [MahasiswaController::class, 'index'])->name('mahasiswa.index');  // Tampilkan daftar mahasiswa
Route::resource('mahasiswa', MahasiswaController::class);

Route::get('/dosenwali', [DosenWaliController::class, 'index'])->name('dosenwali.index');  // Tampilkan daftar dosen wali
Route::resource('dosenwali', DosenWaliController::class);

Route::get('/pertemuanperwalian', [PertemuanPerwalianController::class, 'index'])->name('pertemuanperwalian.index');  // Tampilkan daftar pertemuan perwalian
Route::resource('pertemuanperwalian', PertemuanPerwalianController::class);

Route::get('/notifikasi', [NotifikasiController::class, 'index'])->name('notifikasi.index');  // Tampilkan daftar pertemuan perwalian
Route::resource('notifikasi', NotifikasiController::class);