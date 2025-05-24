<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenWaliController;
use App\Http\Controllers\PertemuanPerwalianController;

// Auth

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [AuthController::class, 'loginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/register', [AuthController::class, 'registerForm']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route::get('/dashboard', function () {
//     return view('dashboard'); // Buat file resources/views/dashboard.blade.php
// })->name('dashboard')->middleware('auth');



 
Route::get('/mahasiswa/perwalian', [PertemuanPerwalianController::class, 'riwayatPertemuanMahasiswa'])
    ->name('mahasiswa.perwalian.index');
  

Route::delete('/pertemuan/{id}', [PertemuanPerwalianController::class, 'destroy'])->name('pertemuan.destroy');
Route::put('/pertemuan/{id}', [PertemuanPerwalianController::class, 'update'])->name('pertemuan.update');
Route::post('/pertemuan', [PertemuanPerwalianController::class, 'store'])->name('pertemuan.store');


Route::get('/dosen/mahasiswa', [MahasiswaController::class, 'index'])
    ->name('mahasiswa.index');
Route::get('/dosen/mahasiswa/{id}', [MahasiswaController::class, 'show'])
    ->name('mahasiswa.show');
Route::get('/dosen/perwalian', [PertemuanPerwalianController::class, 'riwayatPertemuanDosen'])
    ->name('dosen.perwalian.index');
   



 // Route::get('/dosenwali', function () {
//      return view('dosenwali.index');
//  })->name('dosenwali.index');
  
// // Dashboard
// //Route::get('dashboard', function(){
//     return view('dashboard');
// //})->middleware('auth')->name('dashboard');

// // CRUD Mahasiswa (hanya mahasiswa & dosen boleh lihat)
// Route::middleware(['auth','role:mahasiswa,dosen'])
//      ->resource('mahasiswa', MahasiswaController::class);

// // CRUD Dosen Wali (hanya dosen)
// Route::middleware(['auth','role:dosen'])
//      ->resource('dosenwali', DosenWaliController::class);

     
