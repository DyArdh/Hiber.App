<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_faktur',
        'merk_id',
        'varian',
        'kuantitas',
        'harga_satuan'
    ];
    public $timestamps = false;

    public function hargaProduct()
    {
        return $this->belongsTo(HargaProduct::class, 'merk_id');
    }
}
