@extends('layouts.template')
@section('title', 'Dashboard')
    
@section('content')
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card client-blocks dark-primary-border">
            <div class="card-block">
                <h5>Jenis Koran</h5>
                    <ul>
                        <li>
                            <i class="icofont icofont-document-folder"></i>
                            </li>
                            <li class="text-right">
                            {{$koran}}
                        </li>
                    </ul>
            </div>
        </div>
    </div>
    
    
    <div class="col-md-6 col-xl-3">
        <div class="card client-blocks warning-border">
            <div class="card-block">
                <h5>Jumlah Request Pesanan</h5>
                    <ul>
                        <li>
                            <i class="fa fa-shopping-bag text-warning"></i>
                            </li>
                            <li class="text-right text-warning">
                            {{$reqorder}}
                        </li>
                    </ul>
                </div>
        </div>
    </div>
    
    
    <div class="col-md-6 col-xl-3">
        <div class="card client-blocks success-border">
            <div class="card-block">
                <h5>Jumlah Pelanggan</h5>
                    <ul>
                        <li>
                            <i class="icofont icofont-files text-success"></i>
                            </li>
                            <li class="text-right text-success">
                            {{$customers}}
                        </li>
                </ul>
            </div>
        </div>
    </div>
    
    
    <div class="col-md-6 col-xl-3">
        <div class="card client-blocks">
            <div class="card-block">
                <h5>Data Koran Masuk</h5>
                    <ul>
                        <li>
                            <i class="icofont icofont-ui-folder text-primary"></i>
                            </li>
                            <li class="text-right text-primary">
                            {{$koranharian}}
                        </li>
                    </ul>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
            <div class="card">
                <div id="container"></div>
            </div>
            <script src="https://code.highcharts.com/highcharts.js"></script>

            <script>
                Highcharts.chart('container', {
                    chart: {
                        type: 'column'
                    },
                    title: {
                        text: 'Statistik Koran Masuk'
                    },
                    xAxis: {
                        categories: {!!json_encode($dataKoran)!!},
                        crosshair: true
                    },
                    yAxis: {
                        min: 0,
                        title: {
                            text: 'Jumlah'
                        }
                    },
                    tooltip: {
                        headerFormat: '<span style="font-size:10px">{point.key}</span><table><br>',
                        footerFormat: '</table>',
                        shared: true,
                        useHTML: true
                    },
                    plotOptions: {
                        column: {
                            pointPadding: 0.2,
                            borderWidth: 0
                        }
                    },
                    series: [{
                        name: 'Daftar Koran',
                        data: [{{$kompas}}, {{$sripos}}, {{$tribun}}, {{$sumeks}}, {{$palpos}}, {{$hrmuba}},{{$radar}}, {{$palpres}}, {{$medias}}, {{$suara}}]

                    }]
                });
            </script>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div id="pie"></div>
        </div>
        <script src="https://code.highcharts.com/highcharts.js"></script>

        <script>
            Highcharts.chart('pie', {
                chart: {
                    plotBackgroundColor: null,
                    plotBorderWidth: null,
                    plotShadow: false,
                    type: 'pie'
                },
                title: {
                    text: 'Koran Favorit Pelanggan'
                },
                tooltip: {
                    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                },
                accessibility: {
                    point: {
                        valueSuffix: '%'
                    }
                },
                plotOptions: {
                    pie: {
                        allowPointSelect: true,
                        cursor: 'pointer',
                        dataLabels: {
                            enabled: true,
                            format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                        }
                    }
                },
                series: [{
                    name: 'Status',
                    colorByPoint: true,
                    data: [{
                        name: 'Kompas',
                        y: {{$kompas}},
                        sliced: true,
                        selected: true
                    },
                    {
                        name: 'Sriwijaya Post',
                        y: {{$sripos}},
                    },
                    {
                        name: 'Tribun',
                        y: {{$tribun}},
                    },
                    {
                        name: 'Sumatera Express',
                        y: {{$sumeks}},
                    },
                    {
                        name: 'Palembang Pos',
                        y: {{$palpos}},
                    },
                    {
                        name: 'HR Muba',
                        y: {{$hrmuba}},
                    },
                    {
                        name: 'Palembang Express',
                        y: {{$palpres}},
                    },
                    {
                        name: 'Media Sriwijaya',
                        y: {{$medias}},
                    },
                    {
                        name: 'Suara Nusantara',
                        y: {{$suara}},
                    },
                ]
                }]
            });
        </script>
</div>
</div>
@endsection