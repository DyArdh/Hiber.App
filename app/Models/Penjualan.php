<?php

namespace App\Models;

use App\Models\StokGudang;
use App\Models\HargaProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'penjualans';

    public function stokProduct()
    {
        return $this->belongsTo(StokProduk::class, 'produk_id');
    }

    public function hargaProduct()
    {
        return $this->belongsTo(HargaProduct::class, 'merk_id');
    }
}
