<?php

namespace App\Http\Controllers;

use App\Models\StokGudang;
use Illuminate\Http\Request;

class StokPengeringanController extends Controller
{
    public function index()
    {
        $data = StokGudang::where('status', '=', 'Pengeringan')->get();
        return view('stok.pengeringan.index', compact('data'));
    }

    public function createData()
    {
        return view('stok.pengeringan.tambah');
    }

    public function createDataPengeringan(Request $request)
    {
        StokGudang::create($request->all());
        return redirect()->route('stok-pengeringan')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {

        $data = StokGudang::find($id);
        return view('stok.pengeringan.edit', compact('data'));
    }

    public function editData(Request $request, $id)
    {
        $data = StokGudang::find($id);
        $data->update($request->all());
        return redirect()->route('stok-pengeringan')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $data = StokGudang::find($id);
        $data->delete();
        return redirect()->route('stok-pengeringan');
    }
}
