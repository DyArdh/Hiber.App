<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AccAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAdmin', User::class);

        $data = User::where('role', 'Admin')->get();
        return view('accounts.admin.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('createAdmin', User::class);

        return view('accounts.admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('createAdmin', User::class);

        $validations = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|unique:users|email:dns|max:255',
            'no_hp' => 'required|numeric|digits_between:10,13|unique:users',
            'password' => 'required|min:8|max:255',
            'role' => 'required|max:255',
        ]);

        $validations['password'] = bcrypt($validations['password']);

        User::create($validations);
        return redirect()->route('admin.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->authorize('updateAdmin', User::class);

        $data = User::findOrFail($id);
        return view('accounts.admin.edit', compact('data'));
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
        $this->authorize('updateAdmin', User::class);

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

        return redirect()->route('admin.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->authorize('destroyAdmin', User::class);

        $data = User::findOrFail($id);

        $data->delete();
        return redirect()->route('admin.index');
    }
}
