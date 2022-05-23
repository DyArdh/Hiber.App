@extends('layouts.main-layout')

@section('title', 'Dashboard')
@section('content')
    <div class="page-header mt-4 mb-3">
        <h3>Dashboard</h3>
    </div>
    <div class="row">
        <div class="col-6 col-lg-3 col-md-6 pb-4">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="stats-icon purple">
                                <i class="fas fa-users"></i>                                
                            </div>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Total User</h6>
                            <h6 class="font-extrabold mb-0">{{ $user }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('gabah.index') }}">
                                <div class="stats-icon purple">
                                    <i class="fas fa-warehouse"></i>                                
                                </div>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Stok Gudang</h6>
                            <h6 class="font-extrabold mb-0">{{ $gudang }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('stok-pengeringan') }}">
                                <div class="stats-icon purple">
                                    <i class="fas fa-wheat-awn"></i>                                
                                </div>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Stok Pengeringan</h6>
                            <h6 class="font-extrabold mb-0">{{ $pengeringan }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('stok-penggilingan') }}">
                                <div class="stats-icon purple">
                                    <i class="fas fa-gears"></i>                                
                                </div>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Stok Penggilingan</h6>
                            <h6 class="font-extrabold mb-0">{{ $penggilingan }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Row 2 --}}
    <div class="row mt-4 mt-md-4 mt-lg-1">
        <div class="col-6 col-lg-3 col-md-6 pb-4">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('penyortiran.index') }}">
                                <div class="stats-icon purple">
                                    <i class="fas fa-1"></i>                                
                                </div>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Stok Sortir 1</h6>
                            <h6 class="font-extrabold mb-0">{{ $sortir1 }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('penyortiran2.index') }}">
                                <div class="stats-icon purple">
                                    <i class="fas fa-2"></i>                                
                                </div>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Stok Sortir 2</h6>
                            <h6 class="font-extrabold mb-0">{{ $sortir2 }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('produkJadi.index') }}">
                                <div class="stats-icon purple">
                                    <i class="fas fa-bowl-rice"></i>                                
                                </div>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Stok Produk</h6>
                            <h6 class="font-extrabold mb-0">{{ $produk }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 col-lg-3 col-md-6">
            <div class="card">
                <div class="card-body px-3 py-4-5">
                    <div class="row">
                        <div class="col-md-4">
                            <a href="{{ route('harga.index') }}">
                                <div class="stats-icon purple">
                                    <i class="fas fa-store"></i>                                
                                </div>
                            </a>
                        </div>
                        <div class="col-md-8">
                            <h6 class="text-muted font-semibold">Total Produk</h6>
                            <h6 class="font-extrabold mb-0">{{ $total }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- End row 2 --}}

    {{-- Row 3 --}}

    <div class="row mt-4 mt-md-4 mt-lg-1">
        <div class="col-md-9" id="table-process"></div>
        <div class="col-md-3 mt-4 mt-lg-0" id="calendar"></div>
    </div>

    {{-- End Row 3 --}}
@endsection

@section('scripts')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script>
    Highcharts.chart('table-process', {
    chart: {
        type: 'column'
    },
    title: {
        align: 'left',
        text: 'Total Berat Produk'
    },
    accessibility: {
        announceNewData: {
        enabled: true
        }
    },
    xAxis: {
        type: 'category'
    },
    yAxis: {
        title: {
        text: 'Total berat'
        }

    },
    legend: {
        enabled: false
    },
    plotOptions: {
        series: {
        borderWidth: 0,
        dataLabels: {
            enabled: true,
        }
        }
    },

    tooltip: {
        headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
        pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y} kg</b> of total<br/>'
    },

    series: [
        {
        name: "Stok",
        colorByPoint: true,
        data: [
            {
            name: "Gudang",
            y: {{ $gudangs }},
            },
            {
            name: "Pengeringan",
            y: {{ $pengeringans }},
            },
            {
            name: "Penggilingan",
            y: {{ $penggilingans }},
            },
            {
            name: "Penyortiran 1",
            y: {{ $sortirs1 }},
            },
            {
            name: "Penyortiran 2",
            y: {{ $sortirs2 }},
            },
            {
            name: "Produk Jadi",
            y: {{ $produks }},
            },
        ]
        }
    ]
    });
</script>

<script>
    $('#calendar').datepicker({
        inline: true,
        firstDay: 1,
        showOtherMonths: true,
        dayNamesMin: ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat']
    });
</script>
    
@endsection