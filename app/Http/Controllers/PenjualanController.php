<?php

namespace App\Http\Controllers;

use App\Models\penjualan;
use Illuminate\Http\Request;
use App\Models\HargaProduct;

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

        $data = Penjualan::all();

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

        foreach ($request->merk_id as $key => $merk_id) {
            $data = new penjualan();
            $data->merk_id = $merk_id;
            $data->varian = $request->varian[$key];
            $data->jumlah = $request->jumlah[$key];
            $data->harga = $request->harga[$key];
            $data->total_harga = $request->total_harga[$key];
            $data->save();
        };
        return redirect()->route('penjualan.index')->with('success', 'Data berhasil ditambahkan');
    }
}
