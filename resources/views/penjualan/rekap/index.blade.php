@extends('layouts.main-layout')

@section('title', 'Rekap Penjualan')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Rekap Penjualan</div>
<div class="row">
  <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
    <h4 class="pt-4 pb-3">Rekap Data Penjualan</h4>
    <div class="row">
        <div class="col-12">
            <form id="between" action="{{ route('rekapPenjualan.filter') }}" method="GET">
                @csrf
                <div class="col-12 col-md-6 d-flex mb-4">
                    <div class="form-group">
                        <div class="input-group date" id="startDate">
                            <input type="text" class="form-control" name="startDate">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <span class="mx-3">-</span>
                    <div class="form-group">
                        <div class="input-group date" id="endDate">
                            <input type="text" class="form-control" name="endDate">
                            <span class="input-group-append">
                                <span class="input-group-text bg-white d-block">
                                    <i class="fa fa-calendar"></i>
                                </span>
                            </span>
                        </div>
                    </div>
                    <button class="btn simpan-btn btn-primary ms-3">
                        <i class="fa-solid fa-magnifying-glass"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
    $(function() {
            $('#startDate').datepicker({
                orientation: 'bottom left',
                format: 'yyyy-mm-dd'
            });
    });

    $(function() {
            $('#endDate').datepicker({
                orientation: 'bottom left',
                format: 'yyyy-mm-dd'
            });
    });
</script>

@endsection