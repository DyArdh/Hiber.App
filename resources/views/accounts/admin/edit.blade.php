@extends('layouts.main-layout')

@section('title', 'Edit Akun Admin')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Edit Akun Admin
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form id="save-admin-form" action="{{ route('admin.update', $data->id) }}" class="pt-5 px-md-3" method="post" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group row mb-4 px-3">
                <label for="nama" class="form-label col-md-3">Nama</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $data->nama }}" required/>
                    
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
                    <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="3" required>{{ $data->alamat }}</textarea>  
                    
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
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $data->email }}" required />
                    
                    @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div> 
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="password" class="form-label col-md-3">Password</label>
                <div class="col-md-9">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ $data->password }}" required />
                    
                    @error('password')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>  
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="no_hp" class="form-label col-md-3">No. HP</label>
                <div class="col-md-9">
                    <input type="text" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" name="no_hp" value="{{ $data->no_hp }}" required />
                    
                    @error('no_hp')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <input type="hidden" id="role" name="role" value="Admin">
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="{{ route('admin.index') }}"><button type="button" class="btn back-btn me-3">
                    <i class="fa-solid fa-arrow-left"></i>
                    Kembali
                </button></a>
                <button onclick="return false" class="btn simpan-btn btn-primary">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function(){
        $('.simpan-btn').click(function () {
            swal({
                    text: "Apakah anda ingin menyimpan data?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
            .then((willSave) => {
                if (willSave) {
                    $('#save-admin-form').submit();
                } else {
                    swal("Data tidak disimpan!");
                }
            });
        });
    });
</script>
@endsection