<?php

namespace App\Http\Controllers;

use App\Models\JenisPengeluaran;
use Illuminate\Http\Request;

class JenisPengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $this->authorize('view', JenisPengeluaran::class);

        $data = JenisPengeluaran::all();

        return view('keuangan.pengeluaran.jenisPengeluaran.create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', JenisPengeluaran::class);

        return view('keuangan.pengeluaran.jenisPengeluaran.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPengeluaran  $jenisPengeluaran
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPengeluaran $jenisPengeluaran)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPengeluaran  $jenisPengeluaran
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisPengeluaran $jenisPengeluaran)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\JenisPengeluaran  $jenisPengeluaran
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JenisPengeluaran $jenisPengeluaran)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPengeluaran  $jenisPengeluaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPengeluaran $jenisPengeluaran)
    {
        //
    }
}
