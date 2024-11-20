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
        Schema::create('produks', function (Blueprint $table) {
            $table->id(); // Primary key, tipe data unsignedBigInteger
            $table->string('name');
            $table->boolean('show_in_transaction');
            $table->boolean('use_stock');
            $table->integer('stock')->default(10);
            $table->string('code');
            $table->integer('basic_price')->default(5000);
            $table->integer('selling_price');
            $table->string('category')->nullable();
            $table->string('picture')->nullable();
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
