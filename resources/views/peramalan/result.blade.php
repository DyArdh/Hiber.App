@extends('layouts.main-layout')

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
                    <tr>
                        <td>1</td>
                        <td>Test</td>
                        <td>Test</td>
                        <td>Test</td>
                    </tr>
                </tbody>
            </table>
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
            text: 'Average fruit consumption during one week'
        },
        legend: {
            layout: 'vertical',
            align: 'left',
            verticalAlign: 'top',
            x: 150,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor:
                Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF'
        },
        xAxis: {
            categories: [
                'Monday',
                'Tuesday',
                'Wednesday',
                'Thursday',
                'Friday',
                'Saturday',
                'Sunday'
            ],
            plotBands: [{ // visualize the weekend
                from: 4.5,
                to: 6.5,
                color: 'rgba(68, 170, 213, .2)'
            }]
        },
        yAxis: {
            title: {
                text: 'Fruit units'
            }
        },
        tooltip: {
            shared: true,
            valueSuffix: ' units'
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
            name: 'John',
            data: [3, 4, 3, 5, 4, 10, 12]
        }, {
            name: 'Jane',
            data: [1, 3, 4, 3, 3, 5, 4]
        }]
    });
</script>
    
@endsection