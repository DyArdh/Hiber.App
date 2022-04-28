@extends('layouts.main-layout')

@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Ubah Data Penggilingan
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form action="/stock/penggilingan/{{ $data->id }}/editData" class="pt-5 px-md-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-4 px-3">
                <label for="nama" class="form-label col-md-3">Berat</label>
                <div class="col-md-9">
                    <select class="form-select" aria-label="select-role" id="berat" name="berat">
                        <option value="5" @if($data->berat == 5) selected @endif>5</option>
                        <option value="10" @if($data->berat == 10) selected @endif>10</option>
                        <option value="20" @if($data->berat == 20) selected @endif>20</option>
                        <option value="50" @if($data->berat == 50) selected @endif>50</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="jenis" class="form-label col-md-3">Jenis</label>
                <div class="col-md-9">
                    <select class="form-select @error('jenis') is-invalid @enderror" name="jenis" id="jenis">
                        <option value="" selected>-</option>
                        <option value="Polos">Polos</option>
                        <option value="Medium">Medium</option>
                        <option value="Super">Super</option>
                    </select>

                    @error('jenis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <input type="hidden" id="penanggung_jawab" name="penanggung_jawab" value="{{ Auth::User()->nama }}">
            <div class="form-group row mb-4 px-3">
                <label for="status" class="form-label col-md-3" >Status</label>
                <div class="col-md-9">
                    <select class="form-select" aria-label="select-role" id="status" name="status">
                        <option value="Penggilingan" @if($data->status == 'Penggilingan') selected @endif>Penggilingan</option>
                        <option value="Penyortiran" @if($data->status == 'Penyortiran') selected @endif>Penyortiran</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="/stok/penggilingan"><button type="button" class="btn back-btn me-3">
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