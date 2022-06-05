@extends('layouts.main-layout')

@section('title', 'Edit Penjualan')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3 d-flex justify-content-center">
    Edit Data Penjualan
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
  <div class="card-group">
    <div class="card">
      <div class="card-body">
        <h5>Nomor Faktur</h5>
        <p class="card-text">{{ $data['penjualan']['nomor_faktur'] }}</p>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5>Tanggal</h5>
        <p class="card-text">{{ date('d F Y', strtotime($data['penjualan']['created_at'])) }}</p>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5>Total</h5>
        <p id="totalHarga" class="card-text text-success">Rp. {{ number_format($data['penjualan']['total_harga'], 0, ',', '.') }}</p>
      </div>
    </div>
    <div class="card">
      <div class="card-body">
        <h5>Penanggung Jawab</h5>
        <p class="card-text">{{ $data['penjualan']['user']['nama'] }}</p>
      </div>
    </div>
  </div>
</div>
<div class="row mt-4 mx-3 d-flex justify-content-center">
    <div class="add-admin col-12 bg-white">
        <form action="{{ route('penjualan.update', $data['penjualan']['nomor_faktur']) }}" class="px-md-3" method="post" enctype="multipart/form-data">
          @method('PUT')
          @csrf
            <input type="hidden" id="nomor_faktur" name="nomor_faktur" value="{{ $data['penjualan']['nomor_faktur'] }}">
            <div id="newProduct">
              @foreach ($data['detailPenjualan'] as $row)
                <div class="form-group row mb-4 px-3 rounded-3" id="row" style="background-color: #d2d5e6">
                  <div class="col-md-8">
                    <div class="merk my-3 ">
                      <div class="col-md-4">
                        <input type="hidden" id="id" name="id[]" value="{{ $row['id'] }}">
                        <select class="form-select" aria-label="select-role" id="merk_id" name="merk_id[]">
                          <option value="">Pilih Merk</option>
                          @foreach ($data['harProduct'] as $product)
                            <option data-price="{{ $product->harga }}" value="{{ $product->id }}" @if ($product->id == $row->merk_id) selected @endif>{{ $product->merk }}</option>
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
                            <option value="5" data-weight="5" @if ($row->varian == 5) selected @endif>5</option>                        
                            <option value="10" data-weight="10" @if ($row->varian == 10) selected @endif>10</option>                          
                            <option value="20" data-weight="20" @if ($row->varian == 20) selected @endif>20</option>  
                            <option value="50" data-weight="50" @if ($row->varian == 50) selected @endif>50</option> 
                          </select>
                        </div>

                        <p id="totalStok" class="mt-2">Total stok: 0</p>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-1"></div>
                  <div class="col-md-3 my-auto">
                    <input type="text" class="form-control @error('jumlah.*') is-invalid @enderror" id="jumlah" name="jumlah[]" placeholder="Jumlah..." value={{ $row->kuantitas }} required>
                    @if ($loop->last && count($data['detailPenjualan']) > 1)
                      <button id="deleteRowData" type="button" class="btn btn-danger mt-3">Delete</button>
                    @endif
                    @error('jumlah.*')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
              @endforeach
            </div>

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
                  <input type="hidden" name="id[]" value="0">
                  <select class="form-select" aria-label="select-role" id="merk_id" name="merk_id[]">
                    <option value="">Pilih Merk</option>
                    @foreach ($data['harProduct'] as $row)
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

    $('#newProduct').on('click', '#deleteRowData', function(){
      var id = $(this).closest('#row').find('#id').val();
      var varian = $(this).closest('#row').find('#varian').val();
      var merk_id = $(this).closest('#row').find('#merk_id').val();

      $('#newProduct').append(`
        <input type="hidden" name="id[]" value=${id}>
        <input type="hidden" name="varian[]" value=${varian}>
        <input type="hidden" name="merk_id[]" value=${merk_id}>
        <input type="hidden" name="jumlah[]" value="0">
      `);

      $(this).closest('#row').remove();

      var totalJumlah = 0;
      
      $('#newProduct .form-group').find('#jumlah').each(function(){
        var parent = $(this).parent().parent();
        var harga = parent.find('#merk_id').find(':selected').data('price');
        var jumlah = $(this).val();
        var total = harga * jumlah;
        totalJumlah += total;
      });

      var rupiah = totalJumlah.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      $('#totalHarga').text('Rp. ' + rupiah);
    });

    $('#newProduct').on('click', '#deleteRow', function(){
      $(this).closest('#row').remove();

      var totalJumlah = 0;
      
      $('#newProduct .form-group').find('#jumlah').each(function(){
        var parent = $(this).parent().parent();
        var harga = parent.find('#merk_id').find(':selected').data('price');
        var jumlah = $(this).val();
        var total = harga * jumlah;
        totalJumlah += total;
      });

      var rupiah = totalJumlah.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      $('#totalHarga').text('Rp. ' + rupiah);
    });
    
    $('#newProduct .form-group').find('#merk_id').each(function(){
      var parent = $(this).parent().parent().parent();
      var merk_id = $(this).val();
      var varian = parent.find('#varian').find(':selected').val();
      var nomor_faktur = $('#nomor_faktur').val();

      $.ajax({
        url: "{{ route('penjualan.getStok') }}",
        type: "GET",
        data: {
          merk_id: merk_id,
          varian: varian,
          nomor_faktur: nomor_faktur
        },
        success: function(data){
          parent.find('#totalStok').text('Total stok: ' + data + ' kg');
        }
      });
    }).trigger('change');

    $('#newProduct').on('change', '#merk_id', function(){
      var parent = $(this).parent().parent().parent();
      var merk_id = $(this).val();
      var varian = parent.find('#varian').find(':selected').val();
      var nomor_faktur = $('#nomor_faktur').val();

      $.ajax({
        url: "{{ route('penjualan.getStok') }}",
        type: "GET",
        data: {
          merk_id: merk_id,
          varian: varian,
          nomor_faktur: nomor_faktur
        },
        success: function(data){
          parent.find('#totalStok').text('Total stok: ' + data + ' kg');
        }
      });
    });

    $('#newProduct').on('change', '#varian', function(){
      var parent = $(this).parent().parent().parent().parent().parent();
      var merk_id = parent.find('#merk_id').val();
      var varian = $(this).find(':selected').val();
      var nomor_faktur = $('#nomor_faktur').val();

      $.ajax({
        url: "{{ route('penjualan.getStok') }}",
        type: "GET",
        data: {
          merk_id: merk_id,
          varian: varian,
          nomor_faktur: nomor_faktur
        },
        success: function(data){
          parent.find('#totalStok').text('Total stok: ' + data + ' kg');
        }
      });
    });

    $('#newProduct').on('change', '#jumlah', function(){
      var totalJumlah = 0;
      
      $('#newProduct .form-group').find('#jumlah').each(function(){
        var parent = $(this).parent().parent();
        var harga = parent.find('#merk_id').find(':selected').data('price');
        var jumlah = $(this).val();
        var total = harga * jumlah;
        totalJumlah += total;
      });

      var rupiah = totalJumlah.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
      $('#totalHarga').text('Rp. ' + rupiah);
    });
  });
</script>
@endsection