@extends('layouts.main-layout')

@section('content')
 
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Pengeluaran</div>
    <div class="row">
        <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
            <div class="row">
                <div class="col-6">
                    @can('create', \App\Models\Pengeluaran::class)
                        <a href="{{ route('keuangan.pengeluaran.create') }}">
                            <button type="button" class="btn btn-primary mt-4" id="tambah-acc" data-bs-toggle="modal" data-bs-target="#popupTambahAcc">
                                <i class="fa-solid fa-pencil"></i>
                                <span class="ps-2 fw-bolder"> Tambah Data Pengeluaran</span>
                            </button>
                        </a>   
                    @endcan
                </div>
                <div class="col-6">
                    @can('view', \App\Models\JenisPengeluaran::class)
                    <a href="{{ route('jenis.index') }}" class="float-end">
                        <button type="button" class="btn btn-primary mt-4" id="tambah-acc" data-bs-toggle="modal" data-bs-target="#popupTambahAcc">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span class="ps-2 fw-bolder"> Jenis Pengeluaran</span>
                        </button>
                    </a>   
                    @endcan
                </div>
            </div>
            
        <h4 class="pt-4 pb-3">Daftar Pengeluaran</h4>
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
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
          </div>
        @endif

        <div class="table-responsive w-auto">
          <table class="table table-bordered" id="tableAdmin">
            @php
               $number = 1 
            @endphp
            <thead>
              <th style="width: 10%" scope="col">No.</th>
              <th style="width: 20%" scope="col">Tanggal</th>
              <th style="width: 15%" scope="col">Jenis Pengeluaran</th>
              <th style="width: 15%" scope="col">Harga</th>
              <th scope="col">Keterangan</th>
              @can('update', \App\Models\Pengeluaran::class)
                <th style="width: 15%" scope="col">Action</th>
              @endcan
            </thead>
            <tbody class="align-middle">
              @foreach ($data as $row)
              <tr>
                  <td>{{ $row->id }}</td>
                  <td> {{ $row->created_at }} </td>
                  <td> {{ $row->jenisPengeluaran->jenis }} </td>
                  <td> {{ $row->harga }} </td>
                  <td> {{ $row->keterangan }} </td>
                  @can('update', \App\Models\Pengeluaran::class)
                    <td class="d-flex">
                      <a href="{{ route('keuangan.pengeluaran.edit', $row->id) }}">
                        <button type="button" class="edit-btn rounded-3 ms-2 my-1"><i class="fa-solid fa-pen-to-square"></i></button>
                      </a>
                    </td>
                  @endcan
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
  $(document).ready(function(){
    if ($('.success').length) {
      $('#modal-success').modal('show');
    }
  });
</script>

@endsection