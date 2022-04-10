<?php

namespace App\Http\Controllers;

use App\Models\StokGudang;
use Illuminate\Http\Request;

class StokGabahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', StokGudang::class);

        $data = StokGudang::where('status', 'gabah')->get();

        return view('stok.gabah.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', StokGudang::class);

        return view('stok.gabah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', StokGudang::class);

        $validations = $request->validate([
            'berat' => 'required|numeric',
            'penanggung_jawab' => 'required|max:255',
        ]);

        $validations['status'] = 'gabah';

        StokGudang::create($validations);
        return redirect()->route('gabah.index')->with('success', 'Data berhasil ditambahkan');
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StokGudang  $stokGudang
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', StokGudang::class);

        $data = StokGudang::findOrFail($id);
        return view('stok.gabah.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StokGudang  $stokGudang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', StokGudang::class);

        $validations = $request->validate([
            'berat' => 'required|numeric',
            'status' => 'required|max:255',
            'penanggung_jawab' => 'required|max:255',
        ]);

        $data = StokGudang::findOrFail($id);

        $data->update($validations);
        return redirect()->route('gabah.index')->with('success', 'Data berhasil diubah');
    }
}
