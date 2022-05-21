<?php

namespace App\Models;

use App\Models\JenisPengeluaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pengeluarans';

    public function jenisPengeluaran()
    {
        return $this->belongsTo(JenisPengeluaran::class, 'jenis_id');
    }
}
