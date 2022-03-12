@extends('layouts.template')

@section('title', 'Manage Data Koran Harian')
@section('content')
    <div class="card">
        <div class="card-header">
            <a href="{{route('addKoranManage')}}" class="btn btn-primary btn-sm"><i class="fa fa-plus-square"></i> Tambah Data</a>
            <div class="card-header-right">
                <i class="icofont icofont-rounded-down"></i>
                <i class="icofont icofont-refresh"></i>
                <i class="icofont icofont-close-circled"></i>
            </div>
            <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#import"><i class="fa fa-upload"></i> Import Excel</button>
            <div class="dropdown-success dropdown open">
                <button class="btn btn-success dropdown-toggle waves-effect waves-light btn-sm" type="button" id="dropdown-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"><i class="fa fa-download"></i> Export</button>
                <div class="dropdown-menu" aria-labelledby="dropdown-5" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                    <a class="dropdown-item waves-light waves-effect" href="{{route('exportKoranHariantoExcel')}}" target="_blank"><i class="fa fa-file-excel-o"></i> Export Ke Excel</a>
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
                    <th>Kode Koran</th>
                    <th>Nama Koran</th>
                    <th>Koran Masuk</th>
                    <th>Koran Terkirim</th>
                    <th>Koran Sisa</th>
                    <th>Tanggal Masuk</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($stocks as $stock)                
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{$stock->kode_koran}}</td>
                    <td>{{$stock->nama_koran}}</td>
                    <td class="text-center">{{$stock->koran_masuk}} Eksemplar</td>
                    <td class="text-center">
                        @if ($stock->koran_terkirim == null)
                            <span class="btn btn-mini btn-danger"><i class="fa fa-exclamation-circle"></i>Not Delivered</span>
                        @else
                            {{$stock->koran_terkirim}} Eksemplar    
                        @endif
                    </td>
                    <td class="text-center">
                        @if ($stock->koran_sisa == null)
                            <span class="btn btn-mini btn-danger"><i class="fa fa-exclamation-circle"></i>Not Delivered</span>
                        @else
                            {{$stock->koran_sisa}} Eksemplar    
                        @endif
                    </td>
                    <td>{{$stock->tanggal_masuk}}</td>
                    <td class="d-flex justify-content-center">
                        <a class="btn btn-warning btn-sm" href="/admin/koran-management/edit-data/{{$stock->id_input}}"><i class="fa fa-edit"></i>Edit</a>
                        &nbsp;
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteData{{$stock->id}}"><i class="fa fa-trash"></i>Hapus</button>
                    </td>
                </tr>
                @endforeach
            </table>
            </div>
    </div>
</div>
<!-- MODAL TAMBAH DATA KORAN -->
<div class="modal fade" id="tambahData" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Data Koran Harian</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-b-0">
                <form method="POST" action="{{route('tambahKoran')}}">
                    @csrf
                    <div class="form-group row">
                        <div class="col-sm-1 col-form-label">Items</div>
                        <div class="col-sm-5 justify-content-start d-flex">
                            {{-- <input type="text" class="form-control" id="items" name="items[]"> --}}
                            <select class="form-select" aria-label="Default select example" name="items[]">
                                @foreach ($koran as $np)                                    
                                    <option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-sm-1 col-form-label justify-content-end d-flex">Qty</div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="qty" name="qty[]">
                        </div>
                        <div class="col-sm-1 justify-content-end d-flex">
                            <a href="#" class="addKoran btn btn-success">+ Add</a>
                        </div>         
                    </div>
                    <div class="mb-3">
                        <label for="nama_koran" class="form-label">Nama Koran</label>
                        <input type="text" class="form-control @error('nama_koran') is-invalid form-control-danger @enderror" value="{{ old('nama_koran')}}" id="nama_koran" placeholder="Nama Koran" name="nama_koran" >
                        <div class="invalid-feedback text-danger">
                            @error('nama_koran')
                                <div class="help-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control @error('harga') is-invalid form-control-danger @enderror" value="{{ old('harga')}}" id="harga" placeholder="Harga" name="harga" >
                        <div class="invalid-feedback text-danger">
                            @error('harga')
                                <div class="help-block">{{$message}}</div>
                            @enderror
                        </div>
                    </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
        </div>
    </div>
</div>
<!-- ./END MODAL TAMBAH DATA KORAN -->

<!-- MODAL DELETE DATA KORAN HARIAN -->
@foreach ($stocks as $stock)
<div class="modal fade" id="deleteData{{$stock->id}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{$stock->nama_koran}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin Menghapus Data Ini ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="/admin/koran-management/delete/{{ $stock->id }}" class="btn btn-danger">Delete</a>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ./END MODAL DELETE DATA KORAN HARIAN -->

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
        <form action="{{route('importKoranHarian')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="col-form-label">Upload File Excel</label>
                    <input type="file" class="form-control" name="excelKoranMasuk">
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
        <a href="" class="btn btn-primary waves-effect waves-light" target="_blank" onclick="this.href='/admin/manage-koran/export-pdf/' + document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value">Cetak Laporan</a>
    </div>
    </div>
    </div>
</div>
<!-- END EXPPORT DATA -->



<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript">
    $('.addKoran').on('click', function() {
        addKoran();
    });
    function addKoran() {
        var koran = '<div class="form-group row mt-4"><div class="col-sm-1 col-form-label">Items</div><div class="col-sm-5 justify-content-start d-flex"><select class="form-select" aria-label="Default select example" name="items[]">@foreach ($koran as $np)<option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>@endforeach</select></div><div class="col-sm-1 col-form-label justify-content-end d-flex">Qty</div><div class="col-sm-4"><input type="text" class="form-control" id="qty" name="qty[]"></div><div class="col-sm-1 justify-content-end d-flex"><a href="#" class="removeKoran btn btn-danger">- Delete</a></div></div>';
        $('.koran').append(koran);
    };
    $('.removeKoran').live('click', function() {
        $(this).parent().parent().remove();
    });
</script>

@endsection

