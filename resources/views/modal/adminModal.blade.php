@extends('layouts/acc-admin')

@section('tmbh-admin')
{{-- Modal Tambah Data Admin --}}
<div class="modal fade" id="popupTambahAcc">
    <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title fw-bold">Tambah Account</h4>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <form action="" method="POST">
        <div class="modal-body mt-3">
            <div class="form-group row mb-4 px-3">
              <label for="form-alamat" class="form-label col-3">Alamat</label>
              <div class="col-9">
                <input type="text" class="form-control" id="form-alamat" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-kecamatan" class="form-label col-3">Kecamatan</label>
              <div class="col-9">
                <input type="text" class="form-control" id="form-kecamatan" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-kabupaten" class="form-label col-3">Kabupaten</label>
              <div class="col-9">
                <input type="text" class="form-control" id="form-kabupaten" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-kode-pos" class="form-label col-3">Kode Pos</label>
              <div class="col-9">
                <input type="text" class="form-control" id="form-kode-pos" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-email" class="form-label col-3">Email</label>
              <div class="col-9">
                <input type="email" class="form-control" id="form-email" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-password" class="form-label col-3">Password</label>
              <div class="col-9">
                <input type="password" class="form-control" id="form-password" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-no-tlp" class="form-label col-3">No. Telp</label>
              <div class="col-9">
                <input type="text" class="form-control" id="form-no-tlp" />
              </div>
            </div>
            <div class="form-group row mb-4 px-3">
              <label for="form-role" class="form-label col-3">Role</label>
              <div class="col-9">
                <select class="form-select" aria-label="select-role" id="form-role">
                  <option value="Admin" selected>Admin</option>
                  <option value="Karyawan">Karyawan</option>
                </select>
              </div>
            </div>
          
        </div>

        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
</div>  

@endsection

@section('view-data')

<div class="modal fade" id="popupViewAcc">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title fw-bold">Detail Account</h4>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <div class="container">
          <div class="row mx-1">
            <div class="col-3">
              <p class="fw-bold">Nama Lengkap</p>
            </div>
            <div class="col-3">
              <p class="fw-bold">:</p>
            </div>
            <div class="col-6 text-end">
              <p> Andiko Yoga </p>
            </div>
          </div>

          <div class="row mx-1">
            <div class="col-3">
              <p class="fw-bold">Alamat</p>
            </div>
            <div class="col-3">
              <p class="fw-bold">:</p>
            </div>
            <div class="col-6 text-end">
              <p></p>
            </div>
          </div>

          <div class="row mx-1">
            <div class="col-3">
              <p class="fw-bold">Email</p>
            </div>
            <div class="col-3">
              <p class="fw-bold">:</p>
            </div>
            <div class="col-6 text-end">
              <p>rizuna30@gmail.com</p>
            </div>
          </div>

          <div class="row mx-1">
            <div class="col-3">
              <p class="fw-bold">Nomor Telepon</p>
            </div>
            <div class="col-3">
              <p class="fw-bold">:</p>
            </div>
            <div class="col-6 text-end">
              <p>085157506552</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection