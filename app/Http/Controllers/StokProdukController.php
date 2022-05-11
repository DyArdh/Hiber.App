<?php

namespace App\Http\Controllers;

use App\Models\StokProduk;
use App\Http\Requests\StoreStokProdukRequest;
use App\Http\Requests\UpdateStokProdukRequest;

class StokProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = StokProduk::all();

        return view('penjualan.penjualan.stok.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreStokProdukRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreStokProdukRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StokProduk  $stokProduk
     * @return \Illuminate\Http\Response
     */
    public function show(StokProduk $stokProduk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StokProduk  $stokProduk
     * @return \Illuminate\Http\Response
     */
    public function edit(StokProduk $stokProduk)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStokProdukRequest  $request
     * @param  \App\Models\StokProduk  $stokProduk
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateStokProdukRequest $request, StokProduk $stokProduk)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StokProduk  $stokProduk
     * @return \Illuminate\Http\Response
     */
    public function destroy(StokProduk $stokProduk)
    {
        //
    }
}
