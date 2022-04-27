<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewKaryawan', User::class);

        $data = User::where('role', 'Karyawan')->get();
        return view('accounts.karyawan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('createKaryawan', User::class);

        return view('accounts.karyawan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return redirect()->route('karyawan.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('updateKaryawan', User::class);

        $data = User::findOrFail($id);
        return view('accounts.karyawan.edit', compact('data'));
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
        $this->authorize('updateKaryawan', User::class);

        $validations = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email:dns|max:255|unique:users,email,'. $id,
            'no_hp' => 'required|max:255',
            'password' => 'required|max:255',
            'role' => 'required|max:255',
        ]);

        $validations['password'] = bcrypt($validations['password']);

        $data = User::findOrFail($id);

        $data->update($validations);
        return redirect()->route('karyawan.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('destroyKaryawan', User::class);

        $data = User::findOrFail($id);

        $data->delete();
        return redirect()->route('karyawan.index');
    }
}
