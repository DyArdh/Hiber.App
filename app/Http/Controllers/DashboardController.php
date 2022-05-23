<?php

namespace App\Http\Controllers;

use App\Models\StokGudang;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {

        $user = DB::table('users')->count();
        $gudang = StokGudang::where('status', 'gabah')->count();
        $pengeringan = StokGudang::where('status', 'pengeringan')->count();
        $penggilingan = StokGudang::where('status', 'penggilingan')->count();
        $sortir1 = StokGudang::where('status', 'penyortiran')
        ->where(function ($query) {
            $query->where('jenis', 'Polos')
            ->orWhere('jenis', 'Medium');
        })->count();
        $sortir2 = StokGudang::where('status', 'penyortiran')
        ->where(function ($query) {
            $query->where('jenis', 'Super');
        })->count();
        $produk = StokGudang::where('status', 'Produk Jadi')->count();

        $total = DB::table('harga_products')->count();

        $gudangs = StokGudang::where('status', 'gabah')->sum('berat');
        $pengeringans = StokGudang::where('status', 'pengeringan')->sum('berat');
        $penggilingans = StokGudang::where('status', 'penggilingan')->sum('berat');
        $sortirs1 = StokGudang::where('status', 'penyortiran')
                ->where(function ($query) {
                    $query->where('jenis', 'Polos')
                    ->orWhere('jenis', 'Medium');
                })->sum('berat');
        $sortirs2 = StokGudang::where('status', 'penyortiran')
                ->where(function ($query) {
                    $query->where('jenis', 'Super');
                })->sum('berat');
        $produks = StokGudang::where('status', 'Produk Jadi')->sum('berat');
        
        return view('dashboard.index',compact('user', 'gudang', 'pengeringan', 'penggilingan', 'sortir1', 'sortir2', 'produk', 'total', 'gudangs', 'pengeringans', 'penggilingans', 'sortirs1', 'sortirs2', 'produks'));
    }
}
