<?php

namespace App\Http\Controllers;

use App\Models\StokGudang;
use Illuminate\Http\Request;

class StokPenyortiranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', StokGudang::class);

        $data = StokGudang::where('status', 'penyortiran')->get();

        return view('stok.penyortiran.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', StokGudang::class);

        return view('stok.penyortiran.create');
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
            'jenis' => 'required|max:255',
            'penanggung_jawab' => 'required|max:255',
        ]);

        $validations['status'] = 'penyortiran';

        StokGudang::create($validations);
        return redirect()->route('penyortiran.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', StokGudang::class);

        $data = StokGudang::findOrFail($id);
        return view('stok.penyortiran.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('update', StokGudang::class);

        $validations = $request->validate([
            'berat' => 'required|numeric',
            'jenis' => 'required|max:255',
            'merk' => 'numeric|max:255',
            'harga' => 'numeric|max:255',
            'status' => 'required|max:255',
            'penanggung_jawab' => 'required|max:255',
        ]);

        $data = StokGudang::findOrFail($id);

        $data->update($validations);
        return redirect()->route('penyortiran.index')->with('success', 'Data berhasil diubah');
    }
}
