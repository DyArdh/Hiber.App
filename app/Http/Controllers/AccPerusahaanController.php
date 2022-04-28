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

        $rule = [
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|email:dns|max:255|unique:users,email,' . $id,
            'no_hp' => 'required|numeric|digits_between:10,13|unique:users,no_hp,' . $id,
        ];

        $data = User::findOrFail($id);

        if ($data['password'] != $request->password) {
            $rule['password'] = 'required|min:8|max:255';

            $validations = $request->validate($rule);

            $validations['password'] = bcrypt($validations['password']);
        } else {
            $validations = $request->validate($rule);
        }

        User::findOrFail($id)->update($validations);

        return redirect()->route('perusahaan.index')->with('success', 'Data berhasil diubah');
    }
}
