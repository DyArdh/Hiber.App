@extends('layouts.main-layout')

@section('content')

<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Account Admin</div>
    <div class="row">
        <a href="/account/admin/create"><div class="add-admin col-xl-3 col-md-6">
        <button type="button" class="btn btn-primary my-4" id="tambah-acc" data-bs-toggle="modal" data-bs-target="#popupTambahAcc">
            <i class="fa-solid fa-pencil"></i>
            <span class="ps-2 fw-bolder"> Tambah Akun</span>
        </button></a>
        </div>
    </div>
    <div class="row">
        <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
        <h4 class="pt-4 pb-3">Daftar Akun Admin</h4>
        <div class="table-responsive w-auto">
            <table class="table table-bordered" id="tableAdmin">
            <thead>
                <th scope="col">Id</th>
                <th scope="col">Nama Lengkap</th>
                <th scope="col">Alamat</th>
                <th scope="col">Email</th>
                <th scope="col">No. HP</th>
                <th scope="col">Role</th>
                <th scope="col">Action</th>
            </thead>
            <tbody class="align-middle">
                @foreach ($data as $row)
                <tr>
                    <th>{{ $row->id }}</th>
                    <th> {{ $row->nama }} </th>
                    <th> {{ $row->alamat }} </th>
                    <th> {{ $row->email }} </th>
                    <th> 0{{ $row->no_hp }} </th>
                    <th> {{ $row->role }} </th>
                    <th class="d-flex">
                    <a href="/account/admin/{{ $row->id }}/edit"><button type="button" class="edit-btn rounded-3 ms-2 my-1"><i class="fa-solid fa-pen-to-square"></i></button></a>
                    <button type="submit" value="delete" class="delete-btn rounded-3 ms-2 my-1" data-id="{{ $row->id }}" data-nama="{{ $row->nama }}"><i class="fa-solid fa-trash-can"></i></button>                    
                    </th>
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
  $('.delete-btn').click(function () {
    var user_id = $(this).attr('data-id')
    var user_nama = $(this).attr('data-nama')
    swal({
          // title: "Are you sure?",
          text: "Apakah anda ingin menghapus data?",
          icon: "warning",
          buttons: true,
          dangerMode: true,
        })
    .then((willDelete) => {
      if (willDelete) {
        window.location = "/account/admin/"+user_id+"/delete"
        swal("Data berhasil dihapus!", {
          icon: "success",
        });
      } else {
        swal("Data tidak dihapus!");
      }
    });
      });
</script>
    
@endsection