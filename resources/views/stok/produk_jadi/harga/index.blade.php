@extends('layouts.main-layout')

@section('title', 'Daftar Harga')
@section('content')
 
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3">
  <div class="row my-2">
    <div class="col-6">
        <span class="ms-3">Harga Produk</span>
    </div>
    <div class="col-6">
        <a href="{{ route('produkJadi.index') }}">
            <span class="float-end me-3 bg-light text-dark rounded-1 px-3 py-1 fs-6">
                <i class="fa-solid fa-arrow-left-long"></i>
                Kembali
            </span>
        </a>
    </div>
  </div>
</div>
    <div class="row">
      @can('create', \App\Models\HargaProduct::class)
        <a href="{{ route('harga.create') }}">
          <button type="button" class="btn btn-primary my-4" id="tambah-acc" data-bs-toggle="modal" data-bs-target="#popupTambahAcc">
            <i class="fa-solid fa-pencil"></i>
            <span class="ps-2 fw-bolder"> Tambah Daftar Harga</span>
          </button>
        </a>   
      @endcan
    </div>
    <div class="row">
        <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
        <h4 class="pt-4 pb-3">Daftar Harga Produk</h4>
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
            <thead>
              <th style="width: 10%" scope="col">No.</th>
              <th scope="col">Merk</th>
              <th scope="col">Harga</th>
              @can('update', \App\Models\HargaProduct::class)
                <th scope="col">Action</th>
              @endcan
            </thead>
            <tbody class="align-middle">
                @foreach ($data as $row => $value)
                    <tr>
                        <td>{{ $row+1 }}</td>
                        <td> {{ $value->merk }} </td>
                        <td>Rp. {{ number_format($value->harga, 0, ',', '.') }}</td>                  
                        @can('update', \App\Models\HargaProduct::class)
                          <td class="d-flex">
                            <a href="{{ route('harga.edit', $value->id) }}"><button type="button" class="edit-btn rounded-3 ms-2 my-1"><i class="fa-solid fa-pen-to-square"></i></button></a>  
                            <button type="submit" value="delete" class="delete-btn rounded-3 ms-2 my-1" data-id="{{ $value->id }}"><i class="fa-solid fa-trash-can"></i></button>                  
                          </td>
                        @endcan
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

  $(document).ready(function(){
    if ($('.success').length) {
      $('#modal-success').modal('show');
    }
    
    $('.delete-btn').click(function () {
      var user_id = $(this).attr('data-id')
      swal({
            // title: "Are you sure?",
            text: "Apakah anda ingin menghapus data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/stock/produkJadi/harga/"+user_id+"/delete"
          swal("Data berhasil dihapus!", {
            icon: "success",
          });
        } else {
          swal("Data tidak dihapus!");
        }
      });
    });
  });
</script>

@endsection