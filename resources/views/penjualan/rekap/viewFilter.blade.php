@extends('layouts.main-layout')

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
                            <input type="text" class="form-control" name="startDate" value="{{ $start }}">
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
                            <input type="text" class="form-control" name="endDate" {{ $end }}>
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
    @if (session('success'))
      <div class="modal fade success" id="modal-success" tabindex="-1" aria-labelledby="modal-successLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-successLabel">Informasi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              {{ session('success') }}
            </div>
            <div class="modal-footer">
              <button id="search" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    @endif
  
    <div class="table-responsive w-auto">
      <table class="table table-bordered">
        <thead>
          <th scope="col">No. Transaksi</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Merk</th>
          <th scope="col">Varian</th>
          <th scope="col">Berat (kg)</th>
          <th scope="col">Harga</th>
          <th scope="col">Total Harga</th>
        </thead>
        <tbody class="align-middle">
          @foreach ($data as $row)
          <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->updated_at }}</td>
            <td>{{ $row->hargaProduct->merk }}</td>
            <td>{{ $row->varian }}</td>
            <td>{{ $row->jumlah }}</td>
            <td>{{ $row->harga }}</td>
            <td>{{ $row->total_harga }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
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