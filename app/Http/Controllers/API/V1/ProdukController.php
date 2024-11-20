<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Http\Requests\StoreProdukRequest;
use App\Http\Requests\UpdateProdukRequest;
use App\Http\Resources\ProdukResource;
class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProdukResource::collection(Produk::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi data yang masuk
        $request->validate([
            'name' => 'required|string|max:255',
            'show_in_transaction' => 'nullable|boolean',
            'use_stock' => 'nullable|boolean',
            'stock' => 'required|integer',
            'code' => 'required|string|max:10|unique:produks,code', // Tambahkan unique agar kode tidak duplikat
            'basic_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'category' => 'nullable|string|max:255|in:Baju,Jaket,Celana',
            'picture' => 'nullable|string', // Sesuaikan dengan tipe data yang sesuai
        ]);
    
        // Membuat produk baru
        $produk = Produk::create([
            'id' => $request->id,
            'name' => $request->name,
            'show_in_transaction' => $request->show_in_transaction ?? 0, // Default 0 jika tidak diisi
            'use_stock' => $request->use_stock ?? 0, // Default 0 jika tidak diisi
            'stock' => $request->stock,
            'code' => $request->code,
            'basic_price' => $request->basic_price,
            'selling_price' => $request->selling_price,
            'category' => $request->category,
            'picture' => $request->picture,
        ]);
    
        // Kembalikan response dalam bentuk JSON
        return response()->json([
            'message' => 'Produk berhasil ditambahkan',
            'data' => $produk,
        ], 201);
    }
    

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $produk = Produk::find($id);

        // Cek jika data tidak ditemukan
        if (!$produk) {
            return response()->json(['message' => 'Produk tidak ditemukan'], 404);
        }

        // Pastikan mengirimkan data ke ProdukResource
        return new ProdukResource($produk);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
    // Validasi data input
    $validatedData = $request->validate([
        'name' => 'required|string|max:255',
        'show_in_transaction' => 'required|boolean',
        'use_stock' => 'required|boolean',
        'stock' => 'required|integer',
        'code' => 'required|string|unique:produks,code,' . $id,
        'basic_price' => 'required|numeric',
        'selling_price' => 'required|numeric',
        'category' => 'required|string|max:255',
        'picture' => 'nullable|string|url', // Validasi untuk URL gambar
    ]);

    // Mencari produk berdasarkan ID
    $produk = Produk::find($id);

    // Cek jika produk ada
    if (!$produk) {
        return response()->json([
            'message' => 'Produk tidak ditemukan'
        ], 404);
    }

    // Melakukan update pada produk yang ditemukan
    $produk->update($validatedData);

    return response()->json([
        'message' => 'Produk updated successfully',
        'data' => $produk
    ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari produk berdasarkan ID yang diberikan
        $produk = Produk::find($id); // Gunakan model Produk
    
        // Periksa apakah produk ada
        if ($produk) {
            $produk->delete(); // Hapus produk dari database
    
            return response()->json([
                'message' => 'Data deleted'
            ]);
        } else {
            // Jika produk tidak ditemukan, kembalikan error 404
            return response()->json([
                'message' => 'Produk tidak ditemukan'
            ], 404);
        }
    }
}
