<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengeluaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'pengeluarans';

    public function jenisPengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class, 'jenis_id');
    }
}
