<?php

namespace App\Http\Controllers;

use App\Models\HargaProduct;
use Illuminate\Http\Request;

class HargaProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = HargaProduct::paginate(20);
        return view('stok.produk_jadi.harga.index', compact('data'), ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', HargaProduct::class);

        return view('stok.produk_jadi.harga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', HargaProduct::class);

        $validations = $request->validate([
            'merk' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        HargaProduct::create($validations);
        return redirect()->route('harga.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', HargaProduct::class);

        $data = HargaProduct::findOrFail($id);
        return view('stok.produk_jadi.harga.edit', compact('data'));
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
        $this->authorize('update', HargaProduct::class);

        $validations = $request->validate([
            'merk' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        $data = HargaProduct::findOrFail($id);

        $data->update($validations);
        return redirect()->route('harga.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', HargaProduct::class);

        $data = HargaProduct::findOrFail($id);
        $data->delete();
        return redirect()->route('harga.index');
    }
}
