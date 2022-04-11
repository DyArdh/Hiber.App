@extends('layouts.main-layout')

@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Edit Account
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form action="{{ route('perusahaan.update', $data->id) }}" class="pt-5 px-md-3" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group row mb-4 px-3">
                <label for="nama" class="form-label col-md-3">Nama Lengkap</label>
                <div class="col-md-9">
                  <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $data->nama) }}" required />

                  @error('nama')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="alamat" class="form-label col-md-3">Alamat</label>
                <div class="col-md-9">
                  <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" value="{{ old('alamat', $data->alamat) }}" required />

                  @error('alamat')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="email" class="form-label col-md-3">Email</label>
                <div class="col-md-9">
                  <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $data->email) }}" required />

                  @error('email')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
            </div>
            <input type="hidden" class="form-control" id="password" name="password" value="{{ $data->password }}" />
            <div class="form-group row mb-4 px-3">
                <label for="no_hp" class="form-label col-md-3">No. HP</label>
                <div class="col-md-9">
                  <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ old('no_hp', $data->no_hp) }}" required />

                  @error('no_hp')
                    <div class="invalid-feedback">
                      {{ $message }}
                    </div>
                  @enderror
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="role" class="form-label col-md-3" >Role</label>
                <div class="col-md-9">
                    <select class="form-select" aria-label="select-role" id="role" name="role">
                      <option value="Owner" @if($data->role == 'Owner') selected @endif>Owner</option>
                      <option value="Admin" @if($data->role == 'Admin') selected @endif>Admin</option>
                      <option value="Karyawan" @if($data->role == 'Karyawan') selected @endif>Karyawan</option>
                    </select>
                </div>
            </div>
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="{{ route('perusahaan.index') }}"><button type="button" class="btn back-btn me-3">
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