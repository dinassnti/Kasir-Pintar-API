<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Http\JsonResponse;

class JenisProdukController extends Controller
{
    /**
     * Meng-handle request untuk mengupdate bagian category dari produk.
     */
    public function update(Request $request, $id): JsonResponse
    {
        // Daftar kategori yang diizinkan
        $allowedCategories = ['Baju', 'Jaket', 'Celana'];

        // Mencari produk berdasarkan ID
        $produk = Produk::find($id);

        // Mengecek apakah produk ditemukan
        if (!$produk) {
            return response()->json([
                'error' => 'Produk tidak ditemukan.'
            ], 404);
        }

        // Mengecek apakah field 'category' ada dalam input
        if (!$request->has('category')) {
            return response()->json([
                'error' => 'Category tidak ditemukan dalam input.'
            ], 400);
        }

        // Memastikan category sesuai dengan daftar kategori yang diizinkan
        $category = $request->category;
        if (!in_array($category, $allowedCategories)) {
            return response()->json([
                'error' => 'Category tidak valid. Pilih salah satu dari: ' . implode(', ', $allowedCategories)
            ], 400);
        }

        // Menyimpan nilai category yang baru ke dalam produk
        $produk->category = $category;
        $produk->save();

        // Mengembalikan respons JSON dari produk yang telah diperbarui
        return response()->json([
            'data' => $produk
        ]);
    }
}
