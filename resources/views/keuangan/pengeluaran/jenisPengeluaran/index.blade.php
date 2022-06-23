@extends('layouts.main-layout')

@section('title', 'Jenis Pengeluaran')
@section('content')
 
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3">
  <div class="row my-2">
    <div class="col-6">
        <span class="ms-3">Jenis Pengeluran</span>
    </div>
    <div class="col-6">
        <a href="{{ route('keuangan.pengeluaran.index') }}">
            <span class="float-end me-3 bg-light text-dark rounded-1 px-3 py-1 fs-6">
                <i class="fa-solid fa-arrow-left-long"></i>
                Kembali
            </span>
        </a>
    </div>
  </div>
</div>
    <div class="row">
        <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
            <div class="row">
                <div class="col-6">
                    @can('create', \App\Models\JenisPengeluaran::class)
                        <a href="{{ route('jenis.create') }}">
                            <button type="button" class="btn btn-primary mt-4" id="tambah-acc" data-bs-toggle="modal" data-bs-target="#popupTambahAcc">
                                <i class="fa-solid fa-pencil"></i>
                                <span class="ps-2 fw-bolder"> Tambah Jenis Pengeluaran</span>
                            </button>
                        </a>   
                    @endcan
                </div>
            </div>
        <h4 class="pt-4 pb-3">Daftar Jenis Pengeluaran</h4>
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
              <th scope="col">Jenis Pengeluaran</th>
              @can('update', \App\Models\JenisPengeluaran::class)
                <th style="width: 30%" scope="col">Action</th>
              @endcan
            </thead>
            <tbody class="align-middle">
                @foreach ($data as $row => $value)
                    <tr>
                        <td>{{ $row+1 }}</td>
                        <td> {{ $value->jenis }} </td>
                        @can('update', \App\Models\JenisPengeluaran::class)
                          <td class="d-flex">
                            <a href="{{ route('jenis.edit', $value->id) }}"><button type="button" class="edit-btn rounded-3 ms-2 my-1"><i class="fa-solid fa-pen-to-square"></i></button></a>
                            <form id="delete-jenisPengeluaran-form" action="{{ route('jenis.destroy', $value->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button onclick="return false" class="delete-btn rounded-3 ms-2 my-1" data-id="{{ $value->id }}"><i class="fa-solid fa-trash-can"></i></button>  
                            </form>     
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

    $('.delete-btn').click(function () {
      swal({
            text: "Apakah anda ingin menghapus data?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
          })
      .then((willDelete) => {
        if (willDelete) {
          this.parentElement.submit();
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