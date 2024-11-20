<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ManajemenStok;

class ManajemenStok extends Model
{
    /** @use HasFactory<\Database\Factories\ManajemenStokFactory> */
    use HasFactory;

    protected $table = 'manajemen_stoks';
    protected $primaryKey = 'id_manajemen_stok';
    protected $fillable = ['id_produk', 'perubahan', 'keterangan'];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }
}
