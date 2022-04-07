<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StokPengeringan extends Controller
{
    public function index() {
        return view('stok.pengeringan.index');
    }
}
