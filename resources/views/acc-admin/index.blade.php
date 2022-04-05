@extends('layouts/acc-admin')

@section('acc-admin')

<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Account Admin</div>
    <div class="row">
        <div class="add-admin col-xl-3 col-md-6">
        <button type="button" class="btn btn-primary my-4" id="tambah-acc" data-bs-toggle="modal" data-bs-target="#popupTambahAcc">
            <i class="fa-solid fa-pencil"></i>
            <span class="ps-2 fw-bolder"> Tambah Akun</span>
        </button>
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
                    <th scope="row">{{ $row->id_user }}</th>
                    <th scope="row"> {{ $row->nama }} </th>
                    <th scope="row"> {{ $row->alamat }} </th>
                    <th scope="row"> {{ $row->email }} </th>
                    <th scope="row"> 0{{ $row->no_hp }} </th>
                    <th scope="row"> {{ $row->role }} </th>
                    <th scope="row">
                    <button type="button" class="edit-btn rounded-3 ms-2 my-1" data-bs-toggle="modal" data-bs-target="#popupEditAcc" 
                    data-id-user="{{ $row->id }}"
                    data-nama="{{ $row->nama }}"
                    data-alamat="{{ $row->alamat }}"
                    data-email="{{ $row->email }}"
                    data-no-hp="{{ $row->no_hp }}"
                    data-role="{{ $row->role }}">
                    <i class="fa-solid fa-pen-to-square"></i></button>
                    <button type="button" class="delete-btn rounded-3 ms-2 my-1" data-bs-toggle="modal" data-bs-target="#popupDeleteAcc"><i class="fa-solid fa-trash-can"></i></button>
                    </th>
                @endforeach
            </tbody>
            </table>
        </div>
        </div>
    </div>
@endsection

{{-- Modal Edit Akun --}}
<div class="modal fade" id="popupEditAcc">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-bold">Edit Account</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form action="/acc-admin/{id}" method="post" id="editAkun">
        
            @csrf

        <div class="modal-body mt-3">
            <div class="form-group row mb-4 px-3">
              <label for="nama" class="form-label col-3">Nama</label>
              <div class="col-9">
                <input type="text" class="form-control" id="nama" />
                <input type="hidden" id="id_user">
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="alamat" class="form-label col-3">Alamat</label>
              <div class="col-9">
                <input type="text" class="form-control" id="alamat" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="email" class="form-label col-3">Email</label>
              <div class="col-9">
                <input type="text" class="form-control" id="email" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="no_hp" class="form-label col-3">No. Hp</label>
              <div class="col-9">
                <input type="text" class="form-control" id="no_hp" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="role" class="form-label col-3">Role</label>
              <div class="col-9">
                <select class="form-select" aria-label="select-role" id="role">
                  <option value="Admin" selected>Admin</option>
                  <option value="Karyawan">Karyawan</option>
                </select>
              </div>
            </div>
          
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary editAkun-btn">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>  