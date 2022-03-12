@extends('layouts.template')

@section('title', 'Rekapitulasi Data Koran')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{ route('exportKoranPdf') }}" target="_blank" class="btn btn-danger btn-sm"><i class="fa fa-file-pdf-o"></i> Cetak Laporan PDF</a>
            <a class="btn btn-success btn-sm" href="{{ route('exportKoran') }}" target="_blank"><i class="fa fa-file-excel-o"></i> Cetak Laporan Excel</a>
            <div class="card-header-right">
                <i class="icofont icofont-rounded-down"></i>
                <i class="icofont icofont-refresh"></i>
                <i class="icofont icofont-close-circled"></i>
            </div>
        </div>
        <div class="card-block">
            <div class="dt-responsive table-responsive">
                <table id="simpletable" class="table table-striped table-bordered nowrap">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Kode Koran</th>
                            <th>Nama Koran</th>
                            <th>Harga</th>
                            <th>Foto</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1; ?>
                        @foreach ($koran as $item)                            
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$item->kode_koran}}</td>
                            <td>{{$item->nama_koran}}</td>
                            <td>Rp. {{$item->harga}} -</td>
                            <td><img src="{{asset('foto/koran/')}}/{{$item->logo_brand}}" alt="" class="img-thumbnail img-100"></td>
                        </tr>
                        @endforeach
                    </tbody>
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
        <a href="" class="btn btn-primary waves-effect waves-light" target="_blank" onclick="this.href='/admin/koran/export-pdf/' + document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value">Cetak Laporan</a>
    </div>
    </div>
    </div>
</div>
<!-- END EXPPORT DATA -->

@endsection