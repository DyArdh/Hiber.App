<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Penjualan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $table = 'penjualans';

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getRouteKeyName()
    {
        return 'nomor_faktur';
    }

    public static function getPeriode($request)
    {
        $array = array();
        $month = $request->from;
        $i = 0;
        while (date('Y-m', strtotime($month)) <= date('Y-m', strtotime($request->to))) {
            $array[$i] = $month;
            $month = date('Y-m', strtotime("+1 month", strtotime(date($month))));
            $i++;
        }
        return $array;
    }

    public static function getTotal($periode, $data)
    {
        $array = array();
        for ($i = 0; $i < count($periode); $i++) {
            for ($j = 0; $j < count($data); $j++) {
                if ($periode[$i] == $data[$j]['periode']) {
                    $array[$i] = intval($data[$j]['total']);
                    break;
                } else {
                    $array[$i] = 0;
                }
            }
        }
        return $array;
    }

    public static function getDataPenjualan($request)
    {
        $produk_id = $request->produk_id;
        $from = $request->from;
        $to = $request->to;

        $data = Penjualan::selectRaw('DATE_FORMAT(penjualans.created_at, "%Y-%m") AS periode, SUM(kuantitas) AS total')
            ->join('detail_penjualans', 'penjualans.nomor_faktur', '=', 'detail_penjualans.nomor_faktur')
            ->where('detail_penjualans.merk_id', $produk_id)
            ->whereRaw("DATE_FORMAT(penjualans.created_at, '%Y-%m') >= '$from' AND DATE_FORMAT(penjualans.created_at, '%Y-%m') <= '$to'")
            ->groupBy('periode')
            ->get();

        return $data;
    }

    public static function generateNomorFaktur()
    {
        $nomor_faktur = 'PJ' . date('ymd') . '-' . date('His');
        $count = Penjualan::where('nomor_faktur', $nomor_faktur)->count();
        if ($count > 0) {
            $nomor_faktur = 'PJ' . date('ymd') . '-' . date('His') . $count;
        }
        return $nomor_faktur;
    }
}
