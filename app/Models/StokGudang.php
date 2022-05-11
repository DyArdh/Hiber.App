<?php

namespace App\Models;

use App\Models\HargaProduct;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StokGudang extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'stok_gudangs';

    public function hargaProduct()
    {
        return $this->belongsTo(HargaProduct::class, 'merk_id');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
