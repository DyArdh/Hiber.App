<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StokProduk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'stok_produks';

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class);
    }
}
