<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AccAdminController extends Controller
{
    public function index() {

        $data = User::where('role', '=','Admin')->get();
        return view('acc-admin.index', compact('data'));
    }

    public function edit($id) {
       
        $data = User::find($id);
        return view('acc-admin.edit', compact('data'));
    }

    public function editData(Request $request, $id) {
       
        $data = User::find($id);
        $data->update($request->all());
        return redirect()->route('adminAcc');
    }

    public function createData() {

        return view('acc-admin.tambah');
    }

    public function createDataAcc(Request $request) {

        User::create($request->all());
        return redirect()->route('adminAcc');
    }

    public function delete($id) {
        $data = User::find($id);
        $data->delete();
        return redirect()->route('adminAcc');
    }
    
}
