<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccPerusahaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewPerusahaan', User::class);

        $data = User::where('role', 'Owner')->get();
        return view('accounts.perusahaan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('createPerusahaan', User::class);

        return view('accounts.perusahaan.tambah');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('createPerusahaan', User::class);

        $validations = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|unique:users|email:dns|max:255',
            'no_hp' => 'required|max:255',
            'password' => 'required|max:255',
        ]);

        $validations['role'] = 'Owner';
        $validations['password'] = bcrypt($validations['password']);

        User::create($validations);
        return redirect()->route('perusahaan.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('updatePerusahaan', User::class);

        $data = User::findOrFail($id);

        return view('accounts.perusahaan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->authorize('updatePerusahaan', User::class);

        $validations = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email:dns|max:255|unique:users,email,' . $id,
            'no_hp' => 'required|max:12',
            'password' => 'required|max:255',
            'role' => 'required|max:255',
        ]);

        $validations['password'] = bcrypt($validations['password']);

        User::findOrFail($id)->update($validations);

        return redirect()->route('perusahaan.index')->with('success', 'Data berhasil diubah');
    }
}
