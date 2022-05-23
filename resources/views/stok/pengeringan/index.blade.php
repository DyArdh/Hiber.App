@extends('layouts.main-layout')

@section('title', 'Stok Pengeringan')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Stok Pengeringan</div>
<div class="row">
  <div class="add-admin col-xl-4 col-md-6">
    @can('create', \App\Models\StokGudang::class)
      <a href="/stock/pengeringan/create">
        <button type="button" class="btn btn-primary my-4" id="tambah-pengeringan">
          <i class="fa-solid fa-pencil"></i>
          <span class="ps-2 fw-bolder"> Tambah Stok Pengeringan</span>
        </button>
      </a>
    @endcan
  </div>
</div>
<div class="row">
  <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
    <h4 class="pt-4 pb-3">Daftar Stok Pengeringan</h4>
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
      <table class="table table-bordered">
        <thead>
          <th scope="col">Id</th>
          <th scope="col">Tanggal</th>
          <th scope="col">Berat (Kg)</th>
          <th scope="col">Status</th>
          <th scope="col">Penanggung Jawab</th>
          @can('update', \App\Models\StokGudang::class)
            <th scope="col">Action</th>
          @endcan
        </thead>
        <tbody class="align-middle">
          @foreach ($data as $row)
          <tr>
            <td>{{ $row->id }}</td>
            <td>{{ $row->created_at }}</td>
            <td>{{ $row->berat }}</td>
            <td>{{ $row->status }}</td>
            <td>{{ $row->penanggung_jawab }}</td>
            @can('update', $row)
              <td>
                <a href="/stock/pengeringan/{{ $row->id }}/edit"><button type="button" class="edit-btn rounded-3 ms-2 my-1"><i class="fa-solid fa-pen-to-square"></i></button></a>
                <button type="submit" value="delete" class="delete-btn rounded-3 ms-2 my-1" data-id="{{ $row->id }}"><i class="fa-solid fa-trash-can"></i></button>                    
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
    
    $('.delete-btn').click(function () {
      var pengeringan_id = $(this).attr('data-id')
      swal({
            // title: "Are you sure?",
            text: "Apakah anda ingin menghapus data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
      .then((willDelete) => {
        if (willDelete) {
          window.location = "/stock/pengeringan/"+pengeringan_id+"/delete"
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