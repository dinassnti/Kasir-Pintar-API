<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('manajemen_stoks', function (Blueprint $table) {
            $table->id('id_manajemen_stok');
            $table->unsignedBigInteger('id_produk'); // Foreign key, tipe data sesuai tabel produks
            $table->integer('perubahan');
            $table->string('keterangan', 100)->nullable();
            $table->timestamp('tanggal')->useCurrent();
            $table->foreign('id_produk')->references('id')->on('produks')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('manajemen_stoks');
    }
};
