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
        $this->authorize('view', JenisPengeluaran::class);

        $data = JenisPengeluaran::all();

        return view('keuangan.pengeluaran.jenisPengeluaran.index', compact('data'));
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
        $this->authorize('create', JenisPengeluaran::class);

        $validations = $request->validate([
            'jenis' => 'required|max:255',
        ]);

        JenisPengeluaran::create($validations);

        return redirect()->route('jenis.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', JenisPengeluaran::class);

        $data = JenisPengeluaran::findOrFail($id);
        return view('keuangan.pengeluaran.jenisPengeluaran.edit', compact('data'));
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
        $this->authorize('update', JenisPengeluaran::class);

        $validations = $request->validate([
            'jenis' => 'required|max:255',
        ]);

        $data = JenisPengeluaran::findOrFail($id);
        $data->update($validations);

        return redirect()->route('jenis.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('delete', JenisPengeluaran::class);

        $data = JenisPengeluaran::findOrFail($id);
        $data->delete();

        return redirect()->route('jenis.index');
    }
}
