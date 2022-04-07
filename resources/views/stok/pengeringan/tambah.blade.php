@extends('layouts.main-layout')

@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Tambah Data Pengeringan
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form action="/stock/pengeringan/createData" class="pt-5 px-md-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-4 px-3">
                <label for="nama" class="form-label col-md-3">Berat</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="berat" name="berat" required/>
                </div>
                <div class="invalid-feedback">
                    Berat tidak boleh kosong
                </div>
            </div>
            <input type="hidden" id="penanggung_jawab" name="penanggung_jawab" value="{{ Auth::User()->nama }}">
            <div class="form-group row mb-4 px-3">
                <label for="status" class="form-label col-md-3" >Status</label>
                <div class="col-md-9">
                    <select class="form-select" aria-label="select-role" id="status" name="status">
                        <option value="Pengeringan" selected>
                            Pengeringan
                        </option>
                        <option value="Penggilingan">
                            Penggilingan
                        </option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="/stok/pengeringan"><button type="button" class="btn back-btn me-3">
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