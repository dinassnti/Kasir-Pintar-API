<?php

namespace Database\Factories;

use App\Models\ManajemenStok;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\Factory;

class ManajemenStokFactory extends Factory
{
    /**
     * Nama model yang digunakan oleh Factory.
     *
     * @var string
     */
    protected $model = ManajemenStok::class;

    /**
     * Mendefinisikan blueprint untuk ManajemenStok.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_produk' => Produk::inRandomOrder()->first()->id_produk, // Memilih produk secara acak
            'perubahan' => $this->faker->numberBetween(-50, 50),        // Perubahan stok (positif untuk restock, negatif untuk penjualan)
            'keterangan' => $this->faker->sentence(6),                // Keterangan singkat
            'tanggal' => $this->faker->dateTimeBetween('-1 year', 'now'), // Tanggal perubahan stok
        ];
    }
}
