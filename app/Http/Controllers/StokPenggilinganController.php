<?php

namespace App\Http\Controllers;

use App\Models\StokGudang;
use Illuminate\Http\Request;

class StokPenggilinganController extends Controller
{
    public function index()
    {
        $data = StokGudang::where('status', 'Penggilingan')->paginate(20);
        return view('stok.penggilingan.index', compact('data'), ['data' => $data]);
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
        $this->authorize('update', StokGudang::class);

        $rules = [
            'berat' => 'required',
            'status' => 'required|max:255',
            'penanggung_jawab' => 'required|max:255',
        ];

        if ($request->status == 'Penyortiran') {
            $rules['jenis'] = 'required|max:255';
        }

        $validations = $request->validate($rules);

        $data = StokGudang::findOrFail($id);

        $data->update($validations);
        return redirect()->route('stok-penggilingan')->with('success', 'Data berhasil diubah');
    }

    public function delete($id)
    {
        $data = StokGudang::find($id);
        $data->delete();
        return redirect()->route('stok-penggilingan');
    }
}
