<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;
use App\Models\ManajemenStok;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        // Memanggil ManajemenStokSeeder
        $this->call(ManajemenStokSeeder::class);
    }
        // // User::factory(10)->create();
        // Produk::factory(10)->create();
        // \App\Models\ManajemenStok::factory(10)->create(); // Membuat 10 data secara acak
    
}
