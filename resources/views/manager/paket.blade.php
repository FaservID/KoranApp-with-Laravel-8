@extends('layouts.template')

@section('title', 'Data Paket')
@section('content')
    <div class="card">
        <div class="card-header">   
            <a href="{{ route('getAllPaketPdf') }}" class="btn btn-danger btn-sm" target="_blank"><i class="fa fa-file-pdf-o"></i> Cetak Laporan PDF</a>
            <a class="btn btn-success btn-sm" href="{{ route('exportPaket') }}" target="_blank"><i class="fa fa-file-excel-o"></i> Cetak Laporan Excel</a>    
            {{-- <h5>List Data Paket</h5> --}}
            <div class="card-header-right">
                <i class="icofont icofont-rounded-down"></i>
                <i class="icofont icofont-refresh"></i>
                <i class="icofont icofont-close-circled"></i>
            </div>
        </div>
        <div class="card-block">
            @if (session('pesan'))
                <div class="alert alert-success border-success">
                    <strong>Success!</strong> {{session('pesan')}}
                </div>
            @endif
            <div class="dt-responsive table-responsive">
                <table id="simpletable" class="table table-striped table-bordered nowrap">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Paket</th>
                        <th>Total Hari</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($pakets as $paket)                
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$paket->paket}}</td>
                        <td>{{$paket->total_hari}} Hari</td>
                    </tr>
                    @endforeach
                </tbody>
                </table>
            </div>
        </div>
    </div>        


@endsection