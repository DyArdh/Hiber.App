<?php

namespace App\Http\Controllers;

use App\Models\StokGudang;
use Illuminate\Http\Request;

class StokPenggilinganController extends Controller
{
    public function index()
    {
        $data = StokGudang::where('status', '=', 'Penggilingan')->get();
        return view('stok.penggilingan.index', compact('data'));
    }

    public function createData()
    {
        return view('stok.penggilingan.tambah');
    }

    public function createDataPenggilingan(Request $request)
    {
        StokGudang::create($request->all());
        return redirect()->route('stok-penggilingan')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id)
    {

        $data = StokGudang::find($id);
        return view('stok.penggilingan.edit', compact('data'));
    }

    public function editData(Request $request, $id)
    {

        $data = StokGudang::find($id);
        $data->update($request->all());
        return redirect()->route('stok-penggilingan')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $data = StokGudang::find($id);
        $data->delete();
        return redirect()->route('stok-penggilingan');
    }
}
