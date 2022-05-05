<?php

namespace App\Models;

use App\Models\StokGudang;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HargaProduct extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'harga_products';

    public function stokgudang()
    {
        return $this->hasMany(StokGudang::class);
    }
}
