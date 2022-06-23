@extends('layouts.main-layout')

@section('title', 'Penjualan')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Penjualan</div>
<div class="row">
  <div class="col-md-12 d-flex justify-content-between">
    @can('create', \App\Models\Penjualan::class)
      <a href="{{ route('penjualan.create') }}">
        <button type="button" class="btn btn-primary my-4" id="tambah-gabah">
          <i class="fa-solid fa-pencil"></i>
          <span class="ps-2 fw-bolder"> Tambah Penjualan</span>
        </button>
      </a>
    @endcan
  </div>
</div>
<div class="row">
  <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
    <h4 class="pt-4 pb-3">Daftar Data Penjualan</h4>
    @if (session('success'))
      <div class="modal fade success" id="modal-success" tabindex="-1" aria-labelledby="modal-successLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="modal-successLabel">Informasi</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              @foreach (session('success') as $message)
                <div class="alert alert-info">
                  {{ $message }}
                </div>
              @endforeach
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
    @endif
  
    <div class="table-responsive w-auto">
      <table class="table table-bordered">
        <thead>
          <th style="width: 15%" scope="col">No. Faktur</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Total Harga</th>
          <th scope="col">Penanggung Jawab</th>
          <th scope="col">Aksi</th>
        </thead>
        <tbody class="align-middle">
          @foreach ($data as $row)
          <tr>
            <td>{{ $row->nomor_faktur }}</td>
            <td>{{ date('d F Y - h:i A', strtotime($row->created_at)) }}</td>
            <td>Rp. {{ number_format($row->total_harga, 0, ',', '.') }}</td>
            <td>{{ $row->user->nama }}</td>
            <td>         
              <a href="{{ route('penjualan.show', $row->nomor_faktur) }}" class="btn btn-sm btn-primary">
                <i class="fa-solid fa-eye"></i>
              </a>
              @can('update', $row)
                <a href="{{ route('penjualan.edit', $row->nomor_faktur) }}" class="btn btn-sm btn-warning">
                  <i class="fa-solid fa-pencil"></i>
                </a>
              @endcan
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      {{ $data->links() }}
    </div>
  </div>
</div>
@endsection

@section('scripts')
<script>
  $(document).ready(function(){
    if ($('.success').length) {
      $('#modal-success').modal('show');
    }
  });
</script>
@endsection