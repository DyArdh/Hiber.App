@extends('layouts.main-layout')

@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Edit Account
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form action="/account/admin/{{ $data->id }}/editData" class="pt-5 px-md-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-4 px-3">
                <label for="nama" class="form-label col-md-3">Nama Lengkap</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ $data->nama }}" required/>
                </div>
                <div class="invalid-feedback">
                    Nama lengkap tidak boleh kosong
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="alamat" class="form-label col-md-3">Alamat</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $data->alamat }}" required />  
                </div>
                <div class="invalid-feedback">
                    Alamat tidak boleh kosong
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="email" class="form-label col-md-3">Email</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" id="email" name="email" value="{{ $data->email }}" required />
                </div>
                <div class="invalid-feedback">
                    Email tidak boleh kosong
                </div>
            </div>
            <input type="hidden" class="form-control" id="password" name="password" value="{{ $data->password }}" />
            <div class="form-group row mb-4 px-3">
                <label for="no_hp" class="form-label col-md-3">No. HP</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $data->no_hp }}" required />
                </div>
                <div class="invalid-feedback">
                    No. HP tidak boleh kosong
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="role" class="form-label col-md-3" >Role</label>
                <div class="col-md-9">
                    <select class="form-select" aria-label="select-role" id="role" name="role">
                        <option selected>{{ $data->role }}</option>
                        <option value="Admin" selected>
                            Admin
                        </option>
                        <option value="Karyawan">
                            Karyawan
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="/account/admin"><button type="button" class="btn back-btn me-3">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </button></a>
                <button type="submit" class="btn simpan-btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>

@endsection