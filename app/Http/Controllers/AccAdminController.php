<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccAdminController extends Controller
{
    public function index() {

        $data = User::All();
        return view('acc-admin.index', compact('data'));
    }

    public function updateData(Request $request, $id) {

        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'no_hp' => 'required',
            'role' => 'required',
        ]);
        
        $data = User::find($id);

        $data->nama = $request->input('nama');
        $data->alamat = $request->input('alamat');
        $data->email = $request->input('email');
        $data->no_hp = $request->input('no_hp');
        $data->role = $request->input('role');

        $data->update($request->all());

        return redirect('/acc-admin');
    }
}
