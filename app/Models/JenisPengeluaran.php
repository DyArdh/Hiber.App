<?php

namespace App\Models;

use App\Models\Pengeluaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
