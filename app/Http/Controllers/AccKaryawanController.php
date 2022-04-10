<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;


class AccKaryawanController extends Controller
{
    public function index()
    {
        $this->authorize('viewKaryawan', User::class);

        $data = User::where('role', '=', 'Karyawan')->get();
        return view('accounts.karyawan.index', compact('data'));
    }

    public function edit($id)
    {
        $this->authorize('updateKaryawan', User::class);

        $data = User::find($id);
        return view('accounts.karyawan.edit', compact('data'));
    }

    public function editData(Request $request, $id)
    {
        $this->authorize('updateKaryawan', User::class);

        $data = User::find($id);
        $data->update($request->all());
        return redirect()->route('karyawanAcc')->with('success', 'Data berhasil diubah');
    }

    public function createData()
    {
        $this->authorize('createKaryawan', User::class);

        return view('accounts.karyawan.tambah');
    }

    public function createDataAcc(Request $request)
    {
        $this->authorize('createKaryawan', User::class);

        $validations = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|unique:users|email:dns|max:255',
            'no_hp' => 'required|max:255',
            'password' => 'required|max:255',
            'role' => 'required|max:255',
        ]);

        $validations['password'] = bcrypt($validations['password']);

        User::create($validations);
        return redirect()->route('karyawanAcc')->with('success', 'Data berhasil ditambahkan');
    }

    public function delete($id)
    {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('karyawanAcc');
    }
}
