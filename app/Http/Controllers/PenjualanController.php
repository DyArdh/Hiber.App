<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use Illuminate\Http\Request;
use App\Models\HargaProduct;
use App\Models\StokGudang;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Penjualan::class);

        $data = Penjualan::orderBy('created_at', 'ASC')->get();

        return view('penjualan.penjualan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Penjualan::class);

        $harProduct = HargaProduct::all();

        return view('penjualan.penjualan.create', compact('harProduct'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Penjualan::class);

        $totalFail = 0;
        $totalSuccess = 0;
        $message = [];

        foreach ($request->merk_id as $key => $merk_id) {
            $request->validate([
                'jumlah.*' => ['required', function ($attribute, $value, $fail) use ($request, $key) {
                    if (!is_numeric($value)) {
                        return $fail('Jumlah harus berupa angka');
                    }

                    if ($request->jumlah[$key] % $request->varian[$key] !== 0) {
                        return $fail('Jumlah harus kelipatan dari ' . $request->varian[$key]);
                    }
                }],
            ]);

            $totalStok = StokGudang::where('merk_id', $merk_id)
                ->where('berat', $request->varian[$key])
                ->where('status', 'Produk Jadi')
                ->sum('berat');

            if ($totalStok < $request->jumlah[$key]) {
                $totalFail++;
                $message['fail'] = $totalFail . ' data penjualan gagal ditambahkan';
                continue;
            }

            $stokTerjual = StokGudang::where('merk_id', $merk_id)
                ->where('berat', $request->varian[$key])
                ->where('status', 'Produk Jadi')
                ->take($request->jumlah[$key] / $request->varian[$key]);

            $stokTerjual->update([
                'status' => 'Terjual',
            ]);

            $merk = HargaProduct::find($merk_id);

            $data = new penjualan();
            $data->merk_id = $merk_id;
            $data->varian = $request->varian[$key];
            $data->jumlah = $request->jumlah[$key];
            $data->harga = $merk->harga;
            $data->total_harga = $data->jumlah * $data->harga;
            $data->save();

            $totalSuccess++;
            $message['success'] = $totalSuccess . ' data penjualan berhasil ditambahkan';
        };
        return redirect()->route('penjualan.index')->with('success', $message);
    }

    public function getStok(Request $request)
    {
        $id = $request->id;
        $varian = $request->varian;

        $stok = StokGudang::where('merk_id', $id)
            ->where('berat', $varian)
            ->where('status', 'Produk Jadi')
            ->sum('berat');

        return $stok;
    }
}
