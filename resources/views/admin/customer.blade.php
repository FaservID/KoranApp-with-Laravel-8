@extends('layouts.template')

@section('title', 'List Customers')

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ route('addCust') }}" class="btn btn-sm btn-primary"><i class="fa fa-plus-square"></i> Tambah Data</a>
        <div class="card-header-right">
            <i class="icofont icofont-rounded-down"></i>
            <i class="icofont icofont-refresh"></i>
            <i class="icofont icofont-close-circled"></i>
        </div>
        {{-- <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#import"><i class="fa fa-upload"></i> Import Excel</button> --}}
        <div class="dropdown-success dropdown open">
            <button class="btn btn-success dropdown-toggle waves-effect waves-light btn-sm" type="button" id="dropdown-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-download"></i> Export</button>
            <div class="dropdown-menu" aria-labelledby="dropdown-5" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                <a class="dropdown-item waves-light waves-effect" href="{{route('exportCustomer')}}" target="_blank"><i class="fa fa-file-excel-o"></i> Export Ke Excel</a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item waves-light waves-effect" href="" data-toggle="modal" data-target="#export"><i class="fa fa-file-pdf-o"></i> Export Ke PDF</a>
            </div>
        </div>
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
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Paket</th>
                        <th>Status</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i=1; ?>
                    @foreach ($custs as $item)                            
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$item->nama}}</td>
                        <td>{{$item->alamat}}</td>
                        <td>{{$item->phone}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->paket}}</td>
                        <td class="d-flex justify-content-center"><span class="btn btn-mini {{($item->status_langganan == "aktif") ? 'bg-success' : 'bg-danger'}}"><i class="{{($item->status_langganan == "aktif") ? 'fa fa-check-circle' : 'fa fa-exclamation-circle'}}"></i>{{$item->status_langganan}}</span></td>
                        <td>{{$item->tanggal_langganan}}</td>
                        <td class="">
                            <a href="/admin/customers/edit/{{ $item->id_cust }}" class="btn btn-warning btn-sm">Edit</a>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteData{{$item->id_cust}}">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- MODAL DELETE DATA PAKET -->
@foreach ($custs as $item)
<div class="modal fade" id="deleteData{{$item->id_cust}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$item->nama}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Menghapus Data Ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="/admin/customers/delete/{{$item->id_cust}}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ./END MODAL DELETE DATA PAKET -->

    <!-- START IMPORT DATA -->
    <div class="modal fade" id="import" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title">Import Data</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <form action="{{route('importCustomer')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label class="col-form-label">Upload File Excel</label>
                        <input type="file" class="form-control" name="excelCustomer">
                </div>
        </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary waves-effect waves-light ">Import</button>
        </form>
        </div>
        </div>
        </div>
    </div>
<!-- END IMPORT DATA -->

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
        <a href="" class="btn btn-primary waves-effect waves-light" target="_blank" onclick="this.href='/admin/customers/export-pdf/' + document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value">Cetak Laporan</a>
    </div>
    </div>
    </div>
</div>
<!-- END EXPPORT DATA -->




@endsection
