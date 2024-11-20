<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produk;

class produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'show_in_transaction',
        'use_stock',
        'stock',
        'code',
        'basic_price',
        'selling_price',
        'category',
        'picture',
    ];

    public function manajemenStok()
    {
    return $this->hasMany(ManajemenStok::class, 'id_produk');
    }
}
