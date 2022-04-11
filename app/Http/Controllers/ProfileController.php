<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index() {
        return view('accounts.profile.index');
    }

    public function update(Request $request) {

        $this->authorize('update', User::class);

        $userDetails = Auth::user();

        $user = User::findOrFail($userDetails->id);

        $validations = $request->validate([
            'nama' => 'required|max:255',
            'alamat' => 'required|max:255',
            'email' => 'required|max:255',
            'password' => 'required|max:255',
            'no_hp' => 'required|numeric',
            'role' => 'required',
        ]);

        

        $user->update($validations);
        return back()->with('message', 'Data Profile Telah Diupdate');
    }
}
