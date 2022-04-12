@extends('layouts.main-layout')

@section('content')

<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Edit Profile
</div>

<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form action="{{ route('profile.update') }}" class="pt-5 px-md-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-4 px-3">
                <label for="nama" class="form-label col-md-3">Nama Lengkap</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', Auth::user()->nama) }}" required/>
                </div>
                <div class="invalid-feedback">
                    Nama lengkap tidak boleh kosong
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="alamat" class="form-label col-md-3">Alamat</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ old('alamat', Auth::user()->alamat) }}" required />  
                </div>
                <div class="invalid-feedback">
                    Alamat tidak boleh kosong
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="email" class="form-label col-md-3">Email</label>
                <div class="col-md-9">
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', Auth::user()->email) }}" required />
                </div>
                <div class="invalid-feedback">
                    Email tidak boleh kosong
                </div>
            </div>
            <input type="hidden" class="form-control" id="password" name="password" value="{{ old('password', Auth::user()->password) }}" />
            <div class="form-group row mb-4 px-3">
                <label for="no_hp" class="form-label col-md-3">No. HP</label>
                <div class="col-md-9">
                    <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ old('no_hp', Auth::user()->no_hp) }}" required />
                </div>
                <div class="invalid-feedback">
                    No. HP tidak boleh kosong
                </div>
            </div>
            <input type="hidden" id="role" name="role" value="{{ old('role', Auth::user()->role) }}">
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="{{ route('profile') }}"><button type="button" class="btn back-btn me-3">
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