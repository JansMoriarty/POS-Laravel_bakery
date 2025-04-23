<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;

Route::get('/',[HomeController::class, 'index']);

// Route::get('/', [ProductController::class, 'index'])->name('home');


// Route untuk menampilkan form tambah produk
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');

// Route untuk menyimpan produk baru
Route::post('/products', [ProductController::class, 'store'])->name('products.store');


Route::get('/products', [ProductController::class, 'index'])->name('products.index');


Route::get('/products/{id}/update', [ProductController::class, 'showUpdateForm'])->name('products.update.form');


Route::post('/products/{id}/update', [ProductController::class, 'update'])->name('products.update');

Route::delete('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
