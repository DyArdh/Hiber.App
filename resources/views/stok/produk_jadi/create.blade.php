@extends('layouts.main-layout')

@section('title', 'Tambah Stok Produk Jadi')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Tambah Data Stok Produk jadi
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form id="save-produk-form" action="{{ route('produkJadi.store') }}" class="pt-5 px-md-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-4 px-3">
                <label for="berat" class="form-label col-md-3">Berat</label>
                <div class="col-md-9">
                    <select class="form-select" aria-label="select-role" id="berat" name="berat">
                        <option value="5" data-weight="5" selected>5</option>
                        <option value="10" data-weight="10">10</option>
                        <option value="20" data-weight="20">20</option>
                        <option value="50" data-weight="50">50</option> 
                    </select>
                </div>
            </div>
            <div class="form-group row mb-4 px-3">
                <label for="jenis" class="form-label col-md-3">Jenis</label>
                <div class="col-md-9">
                    <select class="form-select @error('merk_id') is-invalid @enderror" id="jenis" name="jenis" required>
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
            <div class="form-group row mb-4 px-3">
                <label for="merk_id" class="form-label col-md-3">Merk</label>
                <div class="col-md-9">
                    <select class="form-select @error('merk_id') is-invalid @enderror" id="merk_id" name="merk_id" required>
                        <option data-price="0" value="">---</option>
                        @foreach ($data as $row)
                            <option data-price="{{ $row->harga }}" value="{{ $row->id }}">{{ $row->merk }}</option>
                        @endforeach    
                    </select>
                    
                    @error('merk_id')
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
            <input type="hidden" id="penanggung_jawab" name="penanggung_jawab" value="{{ Auth::User()->nama }}"/>
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="{{ route('produkJadi.index') }}"><button type="button" class="btn back-btn me-3">
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
                    $('#save-produk-form').submit();
                } else {
                    swal("Data tidak disimpan!");
                }
            });
        });
    });

    let sel = document.getElementById('merk_id');
    sel.addEventListener('click', function (e) {
        let ber = document.getElementById('berat')
        let weight = ber.options[ber.selectedIndex].value;
        let price = e.srcElement.selectedOptions["0"].dataset.price;
        document.getElementById('harga').value = price * weight;
    });
</script>
@endsection