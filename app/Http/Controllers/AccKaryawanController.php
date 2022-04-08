<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AccKaryawanController extends Controller
{
    public function index() {

        $data = User::where('role', '=','Karyawan')->get();
        return view('accounts.karyawan.index', compact('data'));
    }

    public function edit($id) {
       
        $data = User::find($id);
        return view('accounts.karyawan.edit', compact('data'));
    }

    public function editData(Request $request, $id) {
       
        $data = User::find($id);
        $data->update($request->all());
        return redirect()->route('karyawanAcc');
    }

    public function createData() {

        return view('accounts.karyawan.tambah');
    }

    public function createDataAcc(Request $request) {

        User::create($request->all());
        return redirect()->route('karyawanAcc');
    }

    public function delete($id) {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('karyawanAcc');
    }
}
