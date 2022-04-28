@extends('layouts.main-layout')

@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Ubah Data Stok Penyortiran 2
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form action="{{ route('penyortiran2.update', $data->id) }}" class="pt-5 px-md-3" method="post" enctype="multipart/form-data">
            @method('PUT')
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
                <label for="merk" class="form-label col-md-3">Merk</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="merk" name="merk" value="{{ $data->merk }}">
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="harga" class="form-label col-md-3">Harga</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="harga" name="harga" value="{{ $data->harga }}">
                </div>
            </div>
            <input type="hidden" id="penanggung_jawab" name="penanggung_jawab" value="{{ Auth::User()->nama }}">
            <div class="form-group row mb-4 px-3">
                <label for="jenis" class="form-label col-md-3">Jenis</label>
                <div class="col-md-9">
                    <select class="form-select" aria-label="select-role" id="jenis" name="jenis" required/>
                        <option value="Polos" @if($data->jenis == 'Polos') selected @endif>Polos</option>
                        <option value="Medium" @if($data->jenis == 'Medium') selected @endif>Medium</option>
                        <option value="Super" @if($data->jenis == 'Super') selected @endif>Super</option>
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="status" class="form-label col-md-3">Status</label>
                <div class="col-md-9">
                    <select class="form-select" aria-label="select-role" @error('status') is-invalid @enderror id="status" name="status">
                        <option value="Penyortiran" @if($data->status == 'Penyortiran') selected @endif>Penyortiran</option>
                        <option value="Produk Jadi" @if($data->status == 'Produk Jadi') selected @endif>Produk Jadi</option>
                    </select>

                    @error('status')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="{{ route('penyortiran2.index') }}"><button type="button" class="btn back-btn me-3">
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