@extends('layouts.template')

@section('title', 'Koran Harian')
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="align-middle">Tabel Data Manajemen Koran</h5>
        <button type="submit" class="btn btn-danger btn-sm float-right ml-2" data-toggle="modal" data-target="#export"><i class="fa fa-file-pdf-o"></i> Cetak Laporan PDF</button>
        <a class="btn btn-success btn-sm float-right ml-2" href="{{ route('exportKoranHariantoExcel') }}" target="_blank"><i class="fa fa-file-excel-o"></i> Cetak Laporan Excel</a>
    </div>
    <div class="card-block">
        @if (session('pesan'))
            <div class="alert alert-success border-success">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <i class="icofont icofont-close-line-circled"></i>
                    </button>
                <strong>Success!</strong> {{session('pesan')}}
            </div>
        @endif
        <div class="dt-responsive table-responsive">
            <table id="simpletable" class="table table-striped table-bordered nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Kode Koran</th>
                    <th>Nama Koran</th>
                    <th>Koran Masuk</th>
                    <th>Koran Terkirim</th>
                    <th>Koran Sisa</th>
                    <th>Tanggal koran Masuk</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($stocks as $stock)                
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$stock->kode_koran}}</td>
                    <td>{{$stock->nama_koran}}</td>
                    <td>{{$stock->koran_masuk}} Eksemplar</td>
                    <td>{{$stock->koran_terkirim}} Eksemplar</td>
                    <td>{{$stock->koran_sisa}} Eksemplar</td>
                    <td>{{$stock->tanggal_masuk}}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th colspan="2" class="text-center">Jumlah</th>
                    <th>{{$koran_masuk}} </th>
                    <th>{{$koran_terkirim}} </th>
                    <th>{{$koran_sisa}} </th>
                    <th>Tanggal Masuk</th>
                </tr>
            </tfoot>
            </table>
            </div>
    </div>
</div>


<!-- START EXPORT DATA -->

<div class="modal fade" id="export" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Export Data</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
        <div class="form-group">
            <div class="mt-2">
                <label for="tgl_awal">Tanggal Awal </label>
                <input type="date" name="tgl_awal" id="tgl_awal" class="form-control" required>
            </div>
            <div class="mt-2">
                <label for="tgl_lahir">Tanggal Akhir </label>
                <input type="date" name="tgl_akhir" id="tgl_akhir" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
        <a href="" class="btn btn-primary waves-effect waves-light" target="_blank" onclick="this.href='/admin/manage-koran/export-pdf/' + document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value">Cetak Laporan</a>
    </div>
    </div>
    </div>
</div>
<!-- END EXPPORT DATA -->
@endsection