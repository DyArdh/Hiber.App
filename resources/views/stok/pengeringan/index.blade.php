@extends('layouts.dashboard-template')

@section('content')
<div id="layoutSidenav_content">
  <main>
    <div class="container-fluid px-4">
      <div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">Stok</div>
      <div class="row">
        <div class="add-admin col-xl-4 col-md-6">
          <button type="button" class="btn btn-primary my-4" id="tambah-acc" data-bs-toggle="modal" data-bs-target="#popupTambahAcc">
            <i class="fa-solid fa-pencil"></i>
            <span class="ps-2 fw-bolder"> Tambah Stok Pengeringan</span>
          </button>
        </div>
      </div>
      <div class="row">
        <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
          <h4 class="pt-4 pb-3">Daftar Stok Pengeringan</h4>
          <div class="table-responsive w-auto">
            <table class="table table-bordered">
              <thead>
                <th scope="col">Id</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Berat</th>
                <th scope="col">Status</th>
                <th scope="col">Penanggung Jawab</th>
                <th scope="col">Action</th>
              </thead>
              <tbody class="align-middle">
                <th scope="row">1</th>
                <th scope="row">05/04/2022</th>
                <th scope="row">5 kg</th>
                <th scope="row">Pengeringan</th>
                <th scope="row">Andiko Yoga</th>
                <th scope="row">
                  <button type="button" class="view-btn rounded-3 ms-2 my-1" data-bs-toggle="modal" data-bs-target="#popupViewAcc"><i class="fa-solid fa-eye"></i></button>
                  <button type="button" class="edit-btn rounded-3 ms-2 my-1"><i class="fa-solid fa-pen-to-square"></i></button>
                  <button type="button" class="delete-btn rounded-3 ms-2 my-1" data-bs-toggle="modal" data-bs-target="#popupDeleteAcc"><i class="fa-solid fa-trash-can"></i></button>
                </th>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Popup Delete Account -->
  <div class="modal fade" id="popupDeleteAcc">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-body">
          <h6>Apakah Anda Ingin Menghapus Data Ini?</h6>
        </div>
        <div class="modal-footer">
          <button type="button" class="cancel-btn rounded-3" data-bs-dismiss="modal">Tutup</button>
          <button type="submit" class="conf-delete-btn rounded-3">Hapus</button>
        </div>
      </div>
    </div>
  </div>

  <!-- Popup  View Stok-->
  <div class="modal fade" id="popupViewAcc">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-bold">Detail Stok</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="container">
            <div class="row mx-1">
              <div class="col-3">
                <p class="fw-bold">Tanggal</p>
              </div>
              <div class="col-3">
                <p class="fw-bold">:</p>
              </div>
              <div class="col-6 text-end">
                <p>05/04/2022</p>
              </div>
            </div>

            <div class="row mx-1">
              <div class="col-3">
                <p class="fw-bold">Berat</p>
              </div>
              <div class="col-3">
                <p class="fw-bold">:</p>
              </div>
              <div class="col-6 text-end">
                <p>5 kg</p>
              </div>
            </div>

            <div class="row mx-1">
              <div class="col-3">
                <p class="fw-bold">Status</p>
              </div>
              <div class="col-3">
                <p class="fw-bold">:</p>
              </div>
              <div class="col-6 text-end">
                <p>Pengeringan</p>
              </div>
            </div>

            <div class="row mx-1">
              <div class="col-3">
                <p class="fw-bold">Penanggung Jawab</p>
              </div>
              <div class="col-3">
                <p class="fw-bold">:</p>
              </div>
              <div class="col-6 text-end">
                <p>Andiko Yoga</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Tambah Akun -->
  <div class="modal fade" id="popupTambahAcc">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-bold">Tambah Stok Pengeringan</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body mt-3">
          <form action="">
            <div class="form-group row mb-4 px-3">
              <label for="form-tanggal" class="form-label col-3">Tanggal</label>
              <div class="col-9">
                <input type="text" class="form-control" id="form-tanggal" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-berat" class="form-label col-3">Berat</label>
              <div class="col-9">
                <input type="text" class="form-control" id="form-berat" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-status" class="form-label col-3">Status</label>
              <div class="col-9">
                <select class="form-select" aria-label="select-status" id="form-status">
                  <option value="Admin" selected>Pengeringan</option>
                  <option value="Karyawan">Penggilingan</option>
                </select>
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-pj" class="form-label col-3">Penanggung Jawab</label>
              <div class="col-9">
                <select class="form-select" aria-label="select-pj" id="form-pj">
                  <option value="Admin" selected>Andiko Yoga</option>
                </select>
              </div>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection