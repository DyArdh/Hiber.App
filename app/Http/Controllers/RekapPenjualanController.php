<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RekapPenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Penjualan::class);

        return view('penjualan.rekap.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function viewFilter(Request $request)
    {
        $this->authorize('view', Penjualan::class);

        $from = $request->from;
        $to = $request->to;

        $start = Carbon::parse($from)->toDateTimeString();
        $end = Carbon::parse($to)->endOfMonth()->toDateTimeString();

        $data = Penjualan::whereBetween('created_at', [$start, $end])
            ->with('user')
            ->orderBy('created_at', 'ASC')
            ->get();

        return view('penjualan.rekap.viewFilter', compact('data', 'from', 'to'));
    }
}
