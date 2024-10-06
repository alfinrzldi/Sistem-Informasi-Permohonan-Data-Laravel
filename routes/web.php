<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataMasukController;

Route::get('/', function () {
    return view('dashboard');
});

// Menampilkan form input user
Route::get('/inputuser', [UserController::class, 'create'])->name('users.create');
Route::get('/users/{email}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{email}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::post('/users/{email}/update', [UserController::class, 'update'])->name('users.update');


// Menyimpan user baru ke database
Route::post('/users/store', [UserController::class, 'store'])->name('users.store');

//Menampilkan jumlah data pada Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

// Menampilkan daftar user
Route::get('/daftaruser', [UserController::class, 'index'])->name('users.index');

// Route untuk halaman index (menampilkan daftar permohonan)
Route::get('/permohonanbaru', [DataMasukController::class, 'index'])->name('permohonanbaru.index');

// Route untuk halaman create (menampilkan form buat permohonan baru)
Route::get('/permohonanbaru/create', [DataMasukController::class, 'create'])->name('permohonanbaru.create');

// Route untuk menyimpan permohonan baru (store)
Route::post('/permohonanbaru', [DataMasukController::class, 'store'])->name('permohonanbaru.store');

// Route untuk menampilkan detail permohonan (show)
Route::get('/permohonanbaru/{id}', [DataMasukController::class, 'show'])->name('permohonanbaru.show');

// Route untuk halaman edit permohonan (menampilkan form edit)
Route::get('/permohonanbaru/{id}/edit', [DataMasukController::class, 'edit'])->name('permohonanbaru.edit');

// Route untuk menyimpan perubahan permohonan (update)
Route::put('/permohonanbaru/{id}', [DataMasukController::class, 'update'])->name('permohonanbaru.update');


// Route untuk menghapus permohonan pada permohonan proses dan permohonan selesai
Route::delete('/permohonan/hapus/{id}', [DataMasukController::class, 'destroy'])->name('permohonan.destroy');


Route::get('/permohonanproses', [DataMasukController::class, 'permohonanProses'])->name('permohonanproses.index');
Route::get('/permohonanproses/{id}', [DataMasukController::class, 'showProses'])->name('permohonanproses.show');

Route::get('/permohonanselesai', [DataMasukController::class, 'permohonanSelesai'])->name('permohonanselesai.index');
Route::post('/permohonan/change-status/{id}', [DataMasukController::class, 'changeStatus'])->name('permohonan.changeStatus');
