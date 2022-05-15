@extends('layouts.main-layout')

@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Tambah Data Penjualan
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form action="{{ route('penjualan.store') }}" class="pt-5 px-md-3" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group row mb-4 px-3 rounded-3" id="row" style="background-color: #d2d5e6">
                <div class="col-md-8">
                  <div class="merk my-3 ">
                    <div class="col-md-4">
                      <select class="form-select" aria-label="select-role" id="merk_id" name="merk_id[]">
                        <option value="">Pilih Merk</option>
                        @foreach ($harProduct as $row)
                          <option data-price="{{ $row->harga }}" value="{{ $row->id }}">{{ $row->merk }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between stok mb-2">
                    <div class="form-group row mt-2">
                      <label for="stok" class="col-md-4">Varian </label>
                      <div class="col-md-8">
                        <select class="form-select-sm" aria-label="select-role" id="varian" name="varian[]">
                          <option value="">Pilih Varian</option>
                          <option value="5" data-weight="5">5 kg</option>
                          <option value="10" data-weight="10">10 kg</option>
                          <option value="20" data-weight="20">20 kg</option>
                          <option value="50" data-weight="50">50 kg</option>
                        </select>
                      </div>

                      <p id="totalStok" class="mt-2">Total stok: 0</p>
                    </div>
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3 my-auto">
                  <input type="text" class="form-control @error('jumlah.*') is-invalid @enderror" id="jumlah" name="jumlah[]" placeholder="Jumlah..." required>

                  @error('jumlah.*')
                  <div class="invalid-feedback">
                      {{ $message }}
                  </div>
                  @enderror
                </div>
            </div>

            <div id="newProduct"></div>

            <div class="row">
              <div class="d-grid mb-5">
                <button class="btn btn-outline-secondary" id="addProduct" type="button">Tambah Produk</button>
              </div>
            </div>
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="{{ route('penjualan.index') }}"><button type="button" class="btn back-btn me-3">
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

@section('scripts')
<script>
  $(document).ready(function(){
    $('#addProduct').click(function(){
      $('#newProduct').append(`
        <div class="form-group row mb-4 px-3 rounded-3" id="row" style="background-color: #d2d5e6">
            <div class="col-md-8">
              <div class="merk my-3 ">
                <div class="col-md-4">
                  <select class="form-select" aria-label="select-role" id="merk_id" name="merk_id[]">
                    <option value="">Pilih Merk</option>
                    @foreach ($harProduct as $row)
                      <option data-price="{{ $row->harga }}" value="{{ $row->id }}">{{ $row->merk }}</option>
                    @endforeach
                  </select>
                </div>
              </div>
              <div class="d-flex justify-content-between stok mb-2">
                <div class="form-group row mt-2">
                  <label for="stok" class="col-md-4">Varian </label>
                  <div class="col-md-8">
                    <select class="form-select-sm" aria-label="select-role" id="varian" name="varian[]">
                      <option value="">Pilih Varian</option>
                      <option value="5" data-weight="5">5 kg</option>
                      <option value="10" data-weight="10">10 kg</option>
                      <option value="20" data-weight="20">20 kg</option>
                      <option value="50" data-weight="50">50 kg</option>
                    </select>
                  </div>

                  <p id="totalStok" class="mt-2">Total stok: 0</p>
                </div>
              </div>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3 my-auto">
              <input type="text" class="form-control" id="jumlah" name="jumlah[]" placeholder="Jumlah..." required>
              <button id="deleteRow" type="button" class="btn btn-danger mt-3">Delete</button>
            </div>
        </div>
      `);
    });

    $('#newProduct').on('click', '#deleteRow', function(){
      $(this).closest('#row').remove();
    });

    $('#merk_id').on('change', function(){
      var parent = $(this).parent().parent().parent();
      var id = $(this).val();
      var varian = parent.find('#varian').find(':selected').val();

      $.ajax({
        url: "{{ route('penjualan.getStok') }}",
        type: "GET",
        data: {
          id: id,
          varian: varian
        },
        success: function(data){
          parent.find('#totalStok').text('Total stok: ' + data + ' kg');
        }
      });
    });

    $('#varian').on('change', function(){
      var parent = $(this).parent().parent().parent().parent().parent();
      var id = parent.find('#merk_id').val();
      var varian = $(this).find(':selected').val();

      $.ajax({
        url: "{{ route('penjualan.getStok') }}",
        type: "GET",
        data: {
          id: id,
          varian: varian
        },
        success: function(data){
          parent.find('#totalStok').text('Total stok: ' + data + ' kg');
        }
      });
    });

    $('#newProduct').on('change', '#merk_id', function(){
      var parent = $(this).parent().parent().parent();
      var id = $(this).val();
      var varian = parent.find('#varian').find(':selected').val();

      $.ajax({
        url: "{{ route('penjualan.getStok') }}",
        type: "GET",
        data: {
          id: id,
          varian: varian
        },
        success: function(data){
          parent.find('#totalStok').text('Total stok: ' + data + ' kg');
        }
      });
    });

    $('#newProduct').on('change', '#varian', function(){
      var parent = $(this).parent().parent().parent().parent().parent();
      var id = parent.find('#merk_id').val();
      var varian = $(this).find(':selected').val();

      $.ajax({
        url: "{{ route('penjualan.getStok') }}",
        type: "GET",
        data: {
          id: id,
          varian: varian
        },
        success: function(data){
          parent.find('#totalStok').text('Total stok: ' + data + ' kg');
        }
      });
    });
  });
</script>
@endsection