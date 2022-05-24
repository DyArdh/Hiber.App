<?php

namespace App\Http\Controllers;

use App\Models\Pengeluaran;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\penjualan;

class LaporanKeuanganController extends Controller
{
    public function index ()
    {
        return view('keuangan.laporanKeuangan.index');
    }

    public function viewFilter (Request $request)
    {
        $from = $request->from;
        $to = $request->to;

        $start = Carbon::parse($from)->toDateTimeString();
        $end = Carbon::parse($to)->endOfMonth()->toDateTimeString();

        $sale = Penjualan::whereBetween('updated_at', [$start, $end])->sum('total_harga');
        $spending = Pengeluaran::whereBetween('updated_at', [$start, $end])->sum('harga');

        return view('keuangan.laporanKeuangan.viewFilter', compact('sale', 'spending', 'start', 'end', 'from', 'to'));
    }
}
