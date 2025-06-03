<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserPosController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\LaporanController;

Route::get('/home', [HomeController::class, 'index'])->name('home');


Route::get('/kasir', [TransactionController::class, 'index'])->name('kasir.index');



Route::resource('user_pos', UserPosController::class);

// Route::resource('user_pos', UserPosController::class)->parameters([
//     'user_pos' => 'user',
// ]);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [App\Http\Controllers\LoginController::class, 'authenticate'])->name('user.login');

Route::post('/kasir/store', [TransactionController::class, 'store'])->name('kasir.store');

// Logout route
Route::post('/logout', function () {
    Session::forget('user');
    return redirect('/login'); // atau route ke halaman login kamu
})->name('logout');


// laporan

// routes/web.php
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');






Route::get('/receipt/{id}', [TransactionController::class, 'showReceipt'])->name('receipt.show');

    

Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Route untuk menyimpan produk baru
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');


Route::get('/products/{id}/update', [ProductController::class, 'showUpdateForm'])->name('products.update.form');


Route::put('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPDF'])->name('laporan.export.pdf');
Route::get('/laporan/export/excel', [LaporanController::class, 'exportExcel'])->name('laporan.export.excel');

Route::get('/laporan/download-pdf', [LaporanController::class, 'downloadPDF'])->name('laporan.downloadPDF');
Route::get('/laporan/download-excel', [LaporanController::class, 'downloadExcel'])->name('laporan.downloadExcel');

Route::get('/riwayat-transaksi', [TransactionController::class, 'riwayat'])->name('riwayat.transaksi');



