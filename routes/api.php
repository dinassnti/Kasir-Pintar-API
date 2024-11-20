<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\V1\ProdukController;
use App\Http\Controllers\API\V1\JenisProdukController;
use App\Http\Controllers\API\V1\ManajemenStokController;

Route::prefix('v1')->group(function () {
    // Routes untuk API Resource Produk
    Route::apiResource('produk', ProdukController::class);

    // Routes individual untuk ProdukController
    Route::get('/produks', [ProdukController::class, 'index']); // Menampilkan semua produk
    Route::get('/produks/{id}', [ProdukController::class, 'show']); // Menampilkan satu produk berdasarkan ID
    Route::post('/produks', [ProdukController::class, 'store']); // Menambahkan produk baru
    Route::put('/produks/{id}', [ProdukController::class, 'update']); // Mengupdate produk
    Route::delete('/produks/{id}', [ProdukController::class, 'destroy']); // Menghapus produk
    
    // Route untuk update kategori produk dengan metode PATCH
    Route::patch('/produks/{id}/category', [JenisProdukController::class, 'update']); // Mengubah sebagian (category)

    // Route Manajemen Stok
    Route::apiResource('manajemen_stoks', ManajemenStokController::class);
});
