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
                        @foreach ($harProduct as $row)
                          <option data-price="{{ $row->harga }}" value="{{ $row->id }}">{{ $row->merk }}</option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="d-flex justify-content-between stok mb-2">
                    {{-- <div class="form-group row">
                      <label for="stok" class="form-label col-md-3">Stok </label>
                      <div class="col-md-8">
                        <input type="text" class="form-control-sm" id="stok" name="stok" disabled readonly/>
                      </div>
                    </div> --}}

                    <div class="form-group row mt-2">
                      <label for="stok" class="col-md-5 pe-5">Varian </label>
                      <div class="col-md-7">
                        <select class="form-select-sm" aria-label="select-role" id="varian" name="varian[]">
                          <option value="5" data-weight="5" selected>5</option>
                          <option value="10" data-weight="10">10</option>
                          <option value="20" data-weight="20">20</option>
                          <option value="50" data-weight="50">50</option>
                        </select>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-3 my-auto">
                  <input type="text" class="form-control" id="jumlah" name="jumlah[]" placeholder="Jumlah..." required>
                  <input type="hidden" class="form-control" id="harga" name="harga[]" required>
                  <input type="hidden" class="form-control" id="total_harga" name="total_harga[]" required>
                </div>
            </div>

            <div id="newProduct"></div>

            <div class="row">
              <div class="d-grid mb-5">
                <button class="btn btn-outline-secondary" id="addProduct" type="button">Tambah Produk</button>
              </div>
            </div>
            <div class="col-md-12 mb-4 pb-4 px-3 d-flex justify-content-end">
                <a href="{{ route('gabah.index') }}"><button type="button" class="btn back-btn me-3">
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
  $("#addProduct").click(function () {
            newRowAdd = 
            '<div class="form-group row mb-4 px-3 rounded-3" style="background-color: #d2d5e6">' +
                '<div class="col-md-8">' +
                  '<div class="merk my-3 ">' +
                    '<div class="col-md-4">' +
                      '<select class="form-select" aria-label="select-role" id="merk_id" name="merk_id[]">' +
                        '@foreach ($harProduct as $row)' +
                          '<option value="{{ $row->id }}">{{ $row->merk }}</option>' +
                        '@endforeach' +
                      '</select>' +
                    '</div>' +
                  '</div>' +
                  '<div class="d-flex justify-content-between stok mb-2">' +
                   ' <div class="form-group row mt-2">' +
                      '<label for="stok" class="col-md-5 pe-5">Varian </label>' +
                      '<div class="col-md-7">' +
                        '<select class="form-select-sm" aria-label="select-role" id="varian" name="varian[]">' +
                          '<option value="5" selected>5</option>' +
                          '<option value="10">10</option>' +
                          '<option value="20">20</option>' +
                          '<option value="50">50</option>' +
                        '</select>' +
                      '</div>' +
                    '</div>' +
                  '</div>' +
                '</div>' +
                '<div class="col-md-1"></div>'+
                '<div class="col-md-3 my-auto">' +
                  '<input type="text" class="form-control" id="jumlah" name="jumlah[]" placeholder="Jumlah..." required>' +
                  '<input type="hidden" class="form-control" id="harga" name="harga[]" required>' +
                  '<input type="hidden" class="form-control" id="total_harga" name="total_harga[]" required>' +
                '</div>' +
            '</div>';
  
            $('#newProduct').append(newRowAdd);
        });
  
        $("body").on("click", "#deleteRow", function () {
            $(this).parents("#row").remove();
        })

  let sel = document.getElementById('merk_id');
  sel.addEventListener('click', function (e) {
      let ber = document.getElementById('varian');
      let weight = ber.options[ber.selectedIndex].value;
      let jml = document.getElementById('jumlah').value;
      document.getElementById('jumlah').value = jml;
      let price = e.srcElement.selectedOptions["0"].dataset.price;
      document.getElementById('harga').value = price * weight;
      let harga = document.getElementById('harga').value;
      document.getElementById('total_harga').value = jml * harga;
  });
</script>
@endsection