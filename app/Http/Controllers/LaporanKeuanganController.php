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
        $start = Carbon::parse(request()->startDate)->toDateString();
        $end = Carbon::parse(request()->endDate)->toDateString();
        $startDate = Carbon::parse(request()->startDate)->toDateTimeString();
        $endDate = Carbon::parse(request()->endDate)->addSeconds(86399)->toDateTimeString();

        $sale = Penjualan::whereBetween('updated_at', [$startDate, $endDate])->sum('total_harga');
        $spending = Pengeluaran::whereBetween('updated_at', [$startDate, $endDate])->sum('harga');

        return view('keuangan.laporanKeuangan.viewFilter', compact('sale', 'spending', 'start', 'end'));
    }
}
