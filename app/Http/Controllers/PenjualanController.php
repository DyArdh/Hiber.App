<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use App\Models\HargaProduct;
use App\Models\StokGudang;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('view', Penjualan::class);

        $data = Penjualan::orderBy('created_at', 'ASC')->with('user')->get();

        return view('penjualan.penjualan.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', Penjualan::class);

        $data = [
            'nomor_faktur' => Penjualan::generateNomorFaktur(),
            'tanggal' => date('d F Y'),
            'user' => auth()->user(),
            'harProduct' => HargaProduct::all()
        ];

        return view('penjualan.penjualan.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('create', Penjualan::class);

        $totalFail = 0;
        $totalSuccess = 0;
        $totalHarga = 0;
        $message = [];

        foreach ($request->merk_id as $key => $merk_id) {
            $request->validate([
                'jumlah.*' => ['required', function ($attribute, $value, $fail) use ($request, $key) {
                    if (!is_numeric($value)) {
                        return $fail('Jumlah harus berupa angka');
                    }

                    if ($request->jumlah[$key] % $request->varian[$key] !== 0) {
                        return $fail('Jumlah harus kelipatan dari ' . $request->varian[$key]);
                    }
                }],
            ]);

            $totalStok = StokGudang::where('merk_id', $merk_id)
                ->where('berat', $request->varian[$key])
                ->where('status', 'Produk Jadi')
                ->sum('berat');

            if ($totalStok < $request->jumlah[$key]) {
                $totalFail++;
                $message['fail'] = $totalFail . ' data penjualan gagal ditambahkan';
                continue;
            }

            $stokTerjual = StokGudang::where('merk_id', $merk_id)
                ->where('berat', $request->varian[$key])
                ->where('status', 'Produk Jadi')
                ->take($request->jumlah[$key] / $request->varian[$key]);

            $stokTerjual->update([
                'status' => 'Terjual',
            ]);

            $merk = HargaProduct::find($merk_id);
            $totalHarga += $merk->harga * $request->jumlah[$key];

            DetailPenjualan::create([
                'nomor_faktur' => $request->nomor_faktur,
                'merk_id' => $merk_id,
                'varian' => $request->varian[$key],
                'kuantitas' => $request->jumlah[$key],
                'harga_satuan' => $merk->harga,
            ]);

            $totalSuccess++;
            $message['success'] = $totalSuccess . ' data penjualan berhasil ditambahkan';
        };

        Penjualan::create([
            'nomor_faktur' => $request->nomor_faktur,
            'total_harga' => $totalHarga,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('penjualan.index')->with('success', $message);
    }

    /**
     * Display the specified resource.
     *
     * @param  str  $nomor_faktur
     * @return \Illuminate\Http\Response
     */
    public function show($nomor_faktur)
    {
        $this->authorize('view', Penjualan::class);

        $data = [
            'penjualan' => Penjualan::where('nomor_faktur', $nomor_faktur)->with('user')->first(),
            'detailPenjualan' => DetailPenjualan::where('nomor_faktur', $nomor_faktur)->with('hargaProduct')->get(),
        ];

        return view('penjualan.penjualan.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  str  $nomor_faktur
     * @return \Illuminate\Http\Response
     */
    public function edit($nomor_faktur)
    {
        $this->authorize('update', Penjualan::class);

        $data = [
            'penjualan' => Penjualan::where('nomor_faktur', $nomor_faktur)->with('user')->first(),
            'detailPenjualan' => DetailPenjualan::where('nomor_faktur', $nomor_faktur)->with('hargaProduct')->get(),
            'harProduct' => HargaProduct::all()
        ];

        return view('penjualan.penjualan.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  str  $nomor_faktur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nomor_faktur)
    {
        $this->authorize('update', Penjualan::class);

        $totalSuccess = 0;
        $totalHarga = 0;
        $message = [];

        foreach ($request->merk_id as $key => $merk_id) {
            $request->validate([
                'jumlah.*' => ['required', function ($attribute, $value, $fail) use ($request, $key) {
                    if (!is_numeric($value)) {
                        return $fail('Jumlah harus berupa angka');
                    }

                    if ($request->jumlah[$key] % $request->varian[$key] !== 0) {
                        return $fail('Jumlah harus kelipatan dari ' . $request->varian[$key]);
                    }
                }],
            ]);

            $stokPenjualan = DetailPenjualan::where('nomor_faktur', $request->nomor_faktur)
                ->where('merk_id', $merk_id)
                ->where('varian', $request->varian[$key])
                ->sum('kuantitas');

            $totalStok = StokGudang::where('merk_id', $merk_id)
                ->where('berat', $request->varian[$key])
                ->where('status', 'Produk Jadi')
                ->sum('berat');

            $totalJumlah = 0;

            foreach ($request->jumlah as $i => $jumlah) {
                if ($request->merk_id[$i] === $merk_id && $request->varian[$i] === $request->varian[$key]) {
                    $totalJumlah += $jumlah;
                }
            }

            if (($totalStok + $stokPenjualan) < $totalJumlah) {
                $message['fail'] = 'data penjualan gagal ditambahkan';
                return redirect()->route('penjualan.index')->with('success', $message);
            }

            $detailPenjualan = DetailPenjualan::where('nomor_faktur', $nomor_faktur)
                ->where('id', $request->id[$key])
                ->where('merk_id', $merk_id)
                ->where('varian', $request->varian[$key])
                ->first();

            if ($detailPenjualan) {
                if ($detailPenjualan->kuantitas != $request->jumlah[$key]) {
                    if ($request->jumlah[$key] == 0) {
                        $detailPenjualan->delete();

                        $stokTerjual = StokGudang::where('merk_id', $merk_id)
                            ->where('berat', $request->varian[$key])
                            ->where('status', 'Terjual')
                            ->take($detailPenjualan->kuantitas / $detailPenjualan->varian);

                        $stokTerjual->update([
                            'status' => 'Produk Jadi',
                        ]);
                    } else if ($detailPenjualan->kuantitas > $request->jumlah[$key]) {
                        $stokTerjual = StokGudang::where('merk_id', $merk_id)
                            ->where('berat', $request->varian[$key])
                            ->where('status', 'Terjual')
                            ->take(($detailPenjualan->kuantitas - $request->jumlah[$key]) / $detailPenjualan->varian);

                        $stokTerjual->update([
                            'status' => 'Produk Jadi',
                        ]);
                    } else if ($detailPenjualan->kuantitas < $request->jumlah[$key]) {
                        $stokTerjual = StokGudang::where('merk_id', $merk_id)
                            ->where('berat', $request->varian[$key])
                            ->where('status', 'Produk Jadi')
                            ->take(($request->jumlah[$key] - $detailPenjualan->kuantitas) / $detailPenjualan->varian);

                        $stokTerjual->update([
                            'status' => 'Terjual',
                        ]);
                    }

                    $merk = HargaProduct::find($merk_id);

                    $detailPenjualan->update([
                        'kuantitas' => $request->jumlah[$key],
                        'harga_satuan' => $merk->harga,
                    ]);

                    $totalSuccess++;
                }
            } else {
                $stokTerjual = StokGudang::where('merk_id', $merk_id)
                    ->where('berat', $request->varian[$key])
                    ->where('status', 'Produk Jadi')
                    ->take($request->jumlah[$key] / $request->varian[$key]);

                $stokTerjual->update([
                    'status' => 'Terjual',
                ]);

                $merk = HargaProduct::find($merk_id);

                DetailPenjualan::create([
                    'nomor_faktur' => $request->nomor_faktur,
                    'merk_id' => $merk_id,
                    'varian' => $request->varian[$key],
                    'kuantitas' => $request->jumlah[$key],
                    'harga_satuan' => $merk->harga,
                ]);

                $totalSuccess++;
            }
        };

        $detailPenjualan = DetailPenjualan::where('nomor_faktur', $nomor_faktur)->get();

        foreach ($detailPenjualan as $key => $value) {
            $totalHarga += $value->kuantitas * $value->harga_satuan;
        }

        $penjualan = Penjualan::where('nomor_faktur', $nomor_faktur)->first();

        $penjualan->update([
            'total_harga' => $totalHarga,
        ]);

        $message['success'] = $totalSuccess . ' data penjualan berhasil diubah';

        return redirect()->route('penjualan.index')->with('success', $message);
    }

    public function getStok(Request $request)
    {
        $stok = StokGudang::where('merk_id', $request->merk_id)
            ->where('berat', $request->varian)
            ->where('status', 'Produk Jadi')
            ->sum('berat');

        if ($request->nomor_faktur) {
            $stokPenjualan = DetailPenjualan::where('nomor_faktur', $request->nomor_faktur)
                ->where('merk_id', $request->merk_id)
                ->where('varian', $request->varian)
                ->sum('kuantitas');

            $stok += $stokPenjualan;
        }

        return $stok;
    }
}
