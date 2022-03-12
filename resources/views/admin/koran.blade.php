@extends('layouts.template')

@section('title', 'Daftar Koran')
@section('content')
    
    <div class="card">
        <div class="card-header">
            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus-square"></i> Tambah Data</button>
            <div class="card-header-right">
                <i class="icofont icofont-rounded-down"></i>
                <i class="icofont icofont-refresh"></i>
                <i class="icofont icofont-close-circled"></i>
            </div>
            <button type="submit" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#import"><i class="fa fa-upload"></i> Import Excel</button>
            <a class="btn btn-success btn-sm" href="{{route('exportKoran')}}" target="_blank"><i class="fa fa-file-excel-o"></i> Export Ke Excel</a>

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
                            <th>Harga</th>
                            <th>Foto</th>
                            <th>Aksi</th>
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
                            <td class="">
                                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editData{{$item->id_koran}}">Edit</button>
                                <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteData{{$item->id_koran}}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- MODAL TAMBAH DATA KORAN -->
    <div class="modal fade" id="tambahData" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Tambah Data Koran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-b-0">
                    <form method="POST" action="{{route('tambahKoran')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_koran" class="form-label">Kode Koran</label>
                            <input type="text" class="form-control @error('kode_koran') is-invalid form-control-danger @enderror" value="{{ old('kode_koran')}}" id="kodeKoran" name="kode_koran" placeholder="Kode Koran" >
                            <div class="invalid-feedback text-danger">
                                @error('kode_koran')
                                    <div class="help-block">{{$message}}</div>
                                @enderror
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
                        <div class="mb-3">
                            <label for="logo_brand" class="form-label">Foto</label>
                            <input type="file" class="form-control @error('logo_brand') is-invalid form-control-danger @enderror" value="{{ old('logo_brand')}}" id="logo_brand" placeholder="logo_brand" name="logo_brand" >
                            <div class="invalid-feedback text-danger">
                                @error('logo_brand')
                                    <div class="help-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary"><i class="ti-save"></i>Simpan</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    <!-- ./END MODAL TAMBAH DATA KORAN -->

    <!-- MODAL EDIT DATA KORAN -->
    @foreach ($koran as $item)
    <div class="modal fade" id="editData{{$item->id_koran}}" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Koran</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body p-b-0">
                    <form method="POST" action="/admin/koran/edit/{{$item->id_koran}}" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="kode_koran" class="form-label">Kode Koran</label>
                            <input type="text" readonly value="{{$item->kode_koran}}" class="form-control @error('kode_koran') is-invalid form-control-danger @enderror" value="{{ old('kode_koran')}}" id="kodeKoran" name="kode_koran" placeholder="Kode Koran" >
                            <div class="invalid-feedback text-danger">
                                @error('kode_koran')
                                    <div class="help-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="nama_koran" class="form-label">Nama Koran</label>
                            <input type="text" value="{{$item->nama_koran}}" class="form-control @error('nama_koran') is-invalid form-control-danger @enderror" value="{{ old('nama_koran')}}" id="nama_koran" placeholder="Nama Koran" name="nama_koran" >
                            <div class="invalid-feedback text-danger">
                                @error('nama_koran')
                                    <div class="help-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="harga" class="form-label">Harga</label>
                            <input type="text" value="{{$item->harga}}" class="form-control @error('harga') is-invalid form-control-danger @enderror" value="{{ old('harga')}}" id="harga" placeholder="Harga" name="harga" >
                            <div class="invalid-feedback text-danger">
                                @error('harga')
                                    <div class="help-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="logo_brand" class="form-label">Foto</label>     
                            <input type="file" value="{{$item->logo_brand}}" class="form-control @error('logo_brand') is-invalid form-control-danger @enderror" value="{{ old('logo_brand')}}" id="logo_brand" placeholder="logo_brand" name="logo_brand" >
                            <img src="{{asset('foto/koran/')}}/{{$item->logo_brand}}" class="img-40 img-thumbnail img-fluid" alt="">
                            <div class="invalid-feedback text-danger">
                                @error('logo_brand')
                                    <div class="help-block">{{$message}}</div>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
            </div>
        </div>
    </div>
    @endforeach
    <!-- ./END MODAL TAMBAH DATA KORAN -->

    <!-- MODAL DELETE DATA KORAN -->
    @foreach ($koran as $item)
    <div class="modal fade" id="deleteData{{$item->id_koran}}" tabindex="-1">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">{{$item->nama_koran}}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah Anda Yakin Ingin Menghapus Data Ini ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <a href="/admin/koran/delete/{{$item->id_koran}}" class="btn btn-danger">Delete</a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
    <!-- ./END MODAL DELETE DATA KORAN -->


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
                <form action="{{route('importKoran')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="col-form-label">Upload File Excel</label>
                            <input type="file" class="form-control" name="excelKoran">
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
        <a href="" class="btn btn-primary waves-effect waves-light" target="_blank" onclick="this.href='/admin/koran/export-pdf/' + document.getElementById('tgl_awal').value + '/' + document.getElementById('tgl_akhir').value">Cetak Laporan</a>
    </div>
    </div>
    </div>
</div>
<!-- END EXPPORT DATA -->

@endsection