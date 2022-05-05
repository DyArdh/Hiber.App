@extends('layouts.main-layout')

@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Tambah Data Harga
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form action="{{ route('harga.store') }}" class="pt-5 px-md-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-4 px-3">
                <label for="merk" class="form-label col-md-3">Merk</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('merk') is-invalid @enderror" id="merk" name="merk" required/>
                    
                    @error('merk')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="berat" class="form-label col-md-3">Harga</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required/>
                    
                    @error('harga')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="{{ route('harga.index') }}"><button type="button" class="btn back-btn me-3">
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
