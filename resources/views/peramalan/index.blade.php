@extends('layouts.main-layout')

@section('title', 'Peramalan Penjualan')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Peramalan Penjualan</div>
<div class="row">
  <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
    <h4 class="pt-4 pb-3">Peramalan Penjualan</h4>
    <div class="row">
        <div class="col-12">
            <form action="" method="POST">
                @csrf
                <div class="row">
                    <div class="col-12 col-md-4 mb-4">
                        <div class="form-group">
                            <label for="produk_id" class="mb-2">Merk</label>
                            <select class="form-select" id="produk_id" name="produk_id">
                                @foreach ($merk as $row)
                                    <option value="{{ $row->id }}">{{ $row->merk }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-4">
                        <div class="form-group">
                            <label for="from" class="mb-2">Mulai</label>
                            <input class="form-control" type="month" id="from" name="from">
                        </div>
                    </div>

                    <div class="col-12 col-md-4 mb-4">
                        <div class="form-group">
                            <label for="to" class="mb-2">Batas</label>
                            <input class="form-control" type="month" id="to" name="to">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="d-grid">
                        <button class="btn uni-btn btn-primary mb-4">
                            <i class="fa-solid fa-magnifying-glass"></i>
                            <span class="ms-2 fw-bold">Cek Peramalan</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection