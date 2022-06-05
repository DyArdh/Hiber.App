@extends('layouts.main-layout')

@section('title', 'Laporan Keuangan')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Laporan Keuangan</div>
<div class="row">
    <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
      <h4 class="pt-4 pb-3">Laporan Keuangan</h4>
      <div class="row">
          <div class="col-12">
              <form id="between" action="{{ route('laporanKeuangan.filter') }}" method="GET">
                  @csrf
                  <div class="col-12 col-md-6 d-flex mb-4">
                      <div class="form-group">
                          <div class="input-group">
                              <input type="month" class="form-control" name="from" value="{{ $start }}">
                          </div>
                      </div>
                      <span class="mx-3">-</span>
                      <div class="form-group">
                          <div class="input-group">
                              <input type="month" class="form-control" name="to" value="{{ $end }}">
                          </div>
                      </div>
                      <button class="btn simpan-btn btn-primary ms-3">
                          <i class="fa-solid fa-magnifying-glass"></i>
                      </button>
                  </div>
              </form>
          </div>
      </div>

      <div class="row">
            <div class="col-12 mb-4">
                <div class="card" id="tableKeuangan">
                    <div class="card-body">
                        <h5 class="card-title text-center py-2">{{ $from }} s/d {{ $to }}</h5>
                        <div class="row">
                            <div class="col-4 mt-3">
                                <p>Pengeluaran</p>
                            </div>
                            <div class="col-1 mt-3">:</div>
                            <div class="col-7 mt-3">
                                <p class="text-end">Rp. {{ number_format($spending, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mt-3">
                                <p>Pendapatan</p>
                            </div>
                            <div class="col-1 mt-3">:</div>
                            <div class="col-7 mt-3">                                
                                <p class="text-end">Rp. {{ number_format($sale, 0, ',', '.') }}</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-4 mt-3">
                                <p>Keuntungan</p>
                            </div>
                            <div class="col-1 mt-3">:</div>
                            <div class="col-7 mt-3">
                                <p class="text-end fw-bold @if($sale < $spending) text-danger @else text-success @endif">Rp. {{ number_format($sale - $spending, 0, ',', '.') }}</p>
                            </div>
                        </div>
                    </div>
              </div>
          </div>
      </div>
    </div>
</div>

@endsection