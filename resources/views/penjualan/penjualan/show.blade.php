@extends('layouts.main-layout')

@section('title', 'Detail Penjualan')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Detail Penjualan</div>
<div class="row mt-4 d-flex justify-content-center">
  <div class="card-group">
    <div class="card">
      <div class="card-body">
        <h5>Nomor Faktur</h5>
        <p class="card-text">{{ $data['penjualan']['nomor_faktur'] }}</p>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5>Tanggal</h5>
        <p class="card-text">{{ date('d F Y', strtotime($data['penjualan']['created_at'])) }}</p>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5>Total</h5>
        <p id="totalHarga" class="card-text text-success">Rp. {{ number_format($data['penjualan']['total_harga'], 0, ',', '.') }}</p>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5>Penanggung Jawab</h5>
        <p class="card-text">{{ $data['penjualan']['user']['nama'] }}</p>
      </div>
    </div>
  </div>
</div>
<div class="row">
  <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
    <h4 class="pt-4 pb-3">Daftar Detail Data Penjualan</h4>
    
    <div class="table-responsive w-auto">
      <table class="table table-bordered">
        <thead>
          <th style="width: 15%" scope="col">No.</th>
          <th scope="col">Merk</th>
          <th scope="col">Kuantitas</th>
          <th scope="col">Harga</th>
          <th scope="col">Subtotal</th>
        </thead>
        <tbody class="align-middle">
          @foreach ($data['detailPenjualan'] as $row)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $row->hargaProduct->merk }}</td>
            <td>{{ $row->kuantitas }}</td>
            <td>Rp. {{ number_format($row->hargaProduct->harga, 0, ',', '.') }}</td>
            <td>Rp. {{ number_format($row->kuantitas * $row->hargaProduct->harga, 0, ',', '.') }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection