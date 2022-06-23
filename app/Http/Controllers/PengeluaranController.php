<?php

namespace App\Http\Controllers;

use App\Models\JenisPengeluaran;
use App\Models\Pengeluaran;
use Illuminate\Http\Request;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Pengeluaran::class);

        $data = Pengeluaran::paginate(20);

        return view('keuangan.pengeluaran.index', compact('data'), ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Pengeluaran::class);

        $data = JenisPengeluaran::all();

        return view('keuangan.pengeluaran.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Pengeluaran::class);

        $validations = $request->validate([
            'jenis_id' => 'required',
            'keterangan' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        Pengeluaran::create($validations);

        return redirect()->route('keuangan.pengeluaran.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('update', Pengeluaran::class);

        $data = Pengeluaran::findOrFail($id);
        $jenis = JenisPengeluaran::all();

        return view('keuangan.pengeluaran.edit', compact('data', 'jenis'));
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
        $this->authorize('create', Pengeluaran::class);

        $validations = $request->validate([
            'jenis_id' => 'required|numeric',
            'keterangan' => 'required|max:255',
            'harga' => 'required|numeric|min:0',
        ]);

        $data = Pengeluaran::findOrFail($id);
        $data->update($validations);

        return redirect()->route('keuangan.pengeluaran.index')->with('success', 'Data berhasil diubah');
    }
}
