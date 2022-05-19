<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisPengeluaran extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'jenis_pengeluarans';

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class);
    }
}
