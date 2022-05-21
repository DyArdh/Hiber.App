@extends('layouts.main-layout')

@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Tambah Data Pengeluaran
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form action="{{ route('keuangan.pengeluaran.store') }}" class="pt-5 px-md-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-4 px-3">
                <label for="jenis_id" class="form-label col-md-3">Jenis Pengeluaran</label>
                <div class="col-md-9">
                    <select class="form-select" aria-label="select-role" id="jenis_id" name="jenis_id">
                        @foreach ($data as $row)
                            <option value="{{ $row->id }}">{{ $row->jenis }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row mb-4 px-3">
                <label for="keterangan" class="form-label col-md-3">Keterangan</label>
                <div class="col-md-9">
                    <textarea type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" name="keterangan" rows="3" required></textarea>
                    
                    @error('keterangan')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="form-group row mb-4 px-3">
                <label for="harga" class="form-label col-md-3">Harga</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" required>
                    
                    @error('harga')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="{{ route('keuangan.pengeluaran.index') }}"><button type="button" class="btn back-btn me-3">
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