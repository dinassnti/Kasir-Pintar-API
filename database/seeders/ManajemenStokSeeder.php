<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; 
use App\Models\ManajemenStok;
use Carbon\Carbon;

class ManajemenStokSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manajemen_stoks')->insert([
            [
                'id_produk' => 1, // ID Produk yang ada di tabel produk
                'perubahan' => 10,
                'keterangan' => 'Stok masuk',
                'tanggal' => Carbon::now(), // Menggunakan waktu saat ini
            ],
            [
                'id_produk' => 2, // ID Produk yang ada di tabel produk
                'perubahan' => -5,
                'keterangan' => 'Stok keluar',
                'tanggal' => Carbon::now(),
            ],
            // Tambahkan data lainnya sesuai kebutuhan
        ]);
    }
}


