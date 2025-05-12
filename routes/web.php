<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/home', [AdminController::class, 'index'])->middleware(['auth', 'verified'])->name('index');

Route::middleware('auth')->group(function () {
    Route::delete('/karyawan/{karyawan}', [AdminController::class, 'destroy'])->name('karyawan.destroy');
    Route::get('/karyawan/{karyawan}/edit', [AdminController::class, 'edit'])->name('karyawan.edit');
    Route::put('/karyawan/{karyawan}', [AdminController::class, 'update'])->name('karyawan.update');

    // Admin
    Route::get('/datakaryawan', [AdminController::class, 'datakaryawan'])->middleware(['auth', 'verified'])->name('datakaryawan');
    Route::post('/datakaryawan', [AdminController::class, 'store'])->middleware(['auth', 'verified'])->name('datakaryawan.store');
    Route::get('/dataabsensi', [AdminController::class, 'absensi'])->middleware(['auth', 'verified'])->name('dataabsensi');
    Route::get('/gaji', [AdminController::class, 'gaji'])->middleware(['auth', 'verified'])->name('gaji');
    Route::get('/gaji-tambahan', [AdminController::class, 'gajiTambahan'])->name('gaji.tambahan');
    Route::get('/cetak', [AdminController::class, 'cetak'])->middleware(['auth', 'verified'])->name('cetak');

    // Karyawan
    Route::get('/absensi', [KaryawanController::class, 'absensi'])->middleware(['auth', 'verified'])->name('absensi');
    Route::get('/pengajuan', [KaryawanController::class, 'pengajuan'])->middleware(['auth', 'verified'])->name('pengajuan');
    Route::post('/absensi/masuk', [KaryawanController::class, 'presensiMasuk'])->name('absensi.masuk');
    Route::post('/absensi/keluar', [KaryawanController::class, 'presensiKeluar'])->name('absensi.keluar');
    Route::post('/pengajuan', [KaryawanController::class, 'store'])->name('pengajuan.store');
    Route::post('/pengajuan/{id}/accept', [AdminController::class, 'acceptPengajuan'])->name('pengajuan.accept');
    Route::post('/pengajuan/{id}/reject', [AdminController::class, 'rejectPengajuan'])->name('pengajuan.reject');


});

require __DIR__.'/auth.php';
