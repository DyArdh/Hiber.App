<?php

namespace App\Http\Controllers;

use App\Models\StokGudang;
use Illuminate\Http\Request;

class StokPengeringanController extends Controller
{
    public function index() {
        $data = StokGudang::where('status', '=','Pengeringan')->get();
        return view('stok.pengeringan.index',compact('data'));
    }

    public function createData() {
        return view('stok.pengeringan.tambah');
    }

    public function createDataPengeringan(Request $request) {
        StokGudang::create($request->all());
        return redirect()->route('stok-pengeringan');
    }

    public function delete($id) {
        $data = StokGudang::find($id);
        $data->delete();
        return redirect()->route('stok-pengeringan');
    }
}
