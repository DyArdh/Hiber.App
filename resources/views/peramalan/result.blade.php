@extends('layouts.main-layout')

@section('title', 'Peramalan Penjualan')
@section('content')
<div class="acc-header col-xl-3 col-md-6 py-2 mt-4 rounded-3">
    <div class="row my-2">
        <div class="col-6">
            <span class="ms-3">Peramalan Penjualan</span>
        </div>
        <div class="col-6">
            <a href="{{ route('peramalan.index') }}">
                <span class="float-end me-3 bg-light text-dark rounded-1 px-3 py-1 fs-6">
                    <i class="fa-solid fa-arrow-left-long"></i>
                    Kembali
                </span>
            </a>
        </div>
    </div>
</div>
<div class="row">
  <div class="col-12">
      <div id="chart" class="my-3 rounded-2"></div>
  </div>
</div>
<div class="row">
    <div class="tabel-adm col-xl-3 col-md-6 mx-auto">
        <div class="table-responsive w-auto my-3">
            <table class="table table-bordered" id="tableAdmin">
                <thead>
                    <th style="width: 10%" scope="col">No.</th>
                    <th scope="col">Periode</th>
                    <th scope="col">Penjualan</th>
                    <th scope="col">Peramalan</th>
                </thead>
                <tbody class="align-middle">
                    @foreach ($peramalan['hasil'] as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ date('M Y', strtotime($row['periode'])) }}</td>
                            <td>{{ $row['aktual'] }}</td>
                            @if ($loop->last)
                                <td>
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        {{ number_format($row['peramalan'], 2) }}
                                    </button>
                                </td>
                            @else
                                <td>{{ number_format($row['peramalan'], 2) }}</td>
                            @endif
                        </tr>   
                    @endforeach
                </tbody>
            </table>

            <?php
                $last_periode = $peramalan['hasil'][count($peramalan['hasil']) - 1]['periode'];
                $last_periode = date('M Y', strtotime($last_periode));
            ?>
            <p>Klik hasil peramalan pada bulan {{ $last_periode }} untuk detail informasi</p>
            <hr>
        </div>
    </div>
</div>

<div class="row mb-5">
    <div class="col-md-6 mt-3">
        <h5 class="text-center mb-3">Persentase Keakuratan Peramalan</h5>
        <div class="progress mx-auto" data-value='{{ 100 - number_format($peramalan['mape'], 0) }}'>
            <span class="progress-left">
                <span class="progress-bar border-primary"></span>
            </span>
            <span class="progress-right">
                <span class="progress-bar border-primary"></span>
            </span>
            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
              <div class="h2 font-weight-bold">{{ 100 - number_format($peramalan['mape'], 0) }}<sup class="small">%</sup></div>
            </div>
        </div>
    </div>

    <div class="col-md-6 mt-3">
        <h5 class="text-center mb-3">Persentase Kesalahan Peramalan</h5>
        <div class="progress mx-auto" data-value='{{ number_format($peramalan['mape'], 0) }}'>
            <span class="progress-left">
                <span class="progress-bar border-danger"></span>
            </span>
            <span class="progress-right">
                <span class="progress-bar border-danger"></span>
            </span>
            <div class="progress-value w-100 h-100 rounded-circle d-flex align-items-center justify-content-center">
              <div class="h2 font-weight-bold">{{ number_format($peramalan['mape'], 0) }}<sup class="small">%</sup></div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Detail Hasil Peramalan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="fw-bolder">Produk yang diramal</h6>
                        <p>{{ $peramalan['produk']['merk'] }}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="fw-bolder">Keakuratan peramalan</h6>
                        <p class="text-success">{{ 100 - number_format($peramalan['mape'], 5) }}%</p>
                    </div>
                    <div class="col-md-6">
                        <h6 class="fw-bolder">Kesalahan peramalan (MAPE)</h6>
                        <p class="text-danger">{{ number_format($peramalan['mape'], 5) }}%</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <h6 class="fw-bolder">Jumlah Produk Terjual</h6>
                        <p class="text-success">{{ number_format($row['peramalan'], 0) }}</p>
                    </div>
                </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>

<script>
    Highcharts.chart('chart', {
        chart: {
            type: 'areaspline'
        },
        title: {
            text: 'Grafik Perhitungan Peramalan' + '<br>' + '{{ $peramalan['produk']['merk'] }}',
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 100,
            y: 70,
            floating: true,
            borderWidth: 1,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
        },
        xAxis: {
            categories: [
                @foreach ($peramalan['hasil'] as $row)
                    '{{ date('M Y', strtotime($row['periode'])) }}',
                @endforeach
            ],
        },
        tooltip: {
            shared: true,
            valueSuffix: ' produk'
        },
        credits: {
            enabled: false
        },
        plotOptions: {
            areaspline: {
                fillOpacity: 0.5
            }
        },
        series: [{
            name: 'Peramalan',
            data: [
                @foreach ($peramalan['hasil'] as $row)
                    {{ number_format($row['peramalan'], 2) }},
                @endforeach
            ]
        }, {
            name: 'Aktual',
            data: [
                @foreach ($peramalan['hasil'] as $row)
                    {{ $row['aktual'] }},
                @endforeach
            ]
        }]
    });

    $(".progress").each(function() {
        var value = $(this).attr('data-value');
        var left = $(this).find('.progress-left .progress-bar');
        var right = $(this).find('.progress-right .progress-bar');

        if (value > 0) {
            if (value <= 50) {
                right.css('transform', 'rotate(' + percentageToDegrees(value) + 'deg)')
            } else {
                right.css('transform', 'rotate(180deg)')
                left.css('transform', 'rotate(' + percentageToDegrees(value - 50) + 'deg)')
            }
        }
    });

    function percentageToDegrees(percentage) {
        return percentage / 100 * 360
    }
</script>
    
@endsection