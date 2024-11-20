<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ManajemenStok;
use App\Http\Requests\StoreManajemenStokRequest;
use App\Http\Requests\UpdateManajemenStokRequest;

class ManajemenStokController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua data dari tabel manajemen_stok
        $manajemenStok = ManajemenStok::all();

        // Kembalikan data dalam format JSON
        return response()->json($manajemenStok);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_produk' => 'required|exists:produks,id_produk',
            'perubahan' => 'required|integer',
            'keterangan' => 'nullable|string',
        ]);

        $manajemenStok = ManajemenStok::create($validated);

        return response()->json($manajemenStok, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(ManajemenStok $manajemenStok)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ManajemenStok $manajemenStok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateManajemenStokRequest $request, ManajemenStok $manajemenStok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ManajemenStok $manajemenStok)
    {
        //
    }
}
