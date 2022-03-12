@extends('layouts.template')

@section('title', 'Data Paket')
@section('content')
<div class="row">
<div class="col-md-8">
<div class="card">
<div class="card-header">   
<h5>List Data Paket</h5>
{{-- <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus-square"></i> Tambah Data</button> --}}
{{-- <button type="button" class="btn btn-success btn-sm" id="pnotify-success">Click here! <i class="icofont icofont-play-alt-2"></i></button>
<button type="button" class="btn btn-success btn-sm" id="pnotify-desktop-success">Click here! <i class="icofont icofont-play-alt-2"></i></button> --}}
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
<th class="text-center">Action</th>
</tr>
</thead>
<tbody>
<?php $i=1; ?>
@foreach ($pakets as $paket)                
<tr>
<td>{{$i++}}</td>
<td>{{$paket->paket}}</td>
<td>{{$paket->total_hari}}</td>
<td class="text-center">
<button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editData{{$paket->id_paket}}">Edit</button>
<button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteData{{$paket->id_paket}}">Delete</button>
</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>        
</div>
<div class="col-md-4">
<div class="card">
<div class="card-header">
<h5>Form Tambah Paket</h5>
<div class="card-header-right">
<i class="icofont icofont-rounded-down"></i>
<i class="icofont icofont-refresh"></i>
<i class="icofont icofont-close-circled"></i>
</div>
</div>
<div class="card-block">
<form method="POST" action="{{route('addPaket')}}">
@csrf
<div class="mb-3">
<label for="paket" class="form-label">Paket</label>
<input type="text" class="form-control @error('paket') is-invalid form-control-danger @enderror" value="{{ old('paket')}}" id="kodeKoran" name="paket" placeholder="Paket" >
<div class="invalid-feedback text-danger">
@error('paket')
<div class="help-block">{{$message}}</div>
@enderror
</div>
</div>
<div class="mb-3">
<label for="total_hari" class="form-label">Jumlah Total Hari</label>
<input type="number" class="form-control @error('total_hari') is-invalid form-control-danger @enderror" value="{{ old('total_hari')}}" id="total_hari" placeholder="Jumlah Total Hari" name="total_hari" >
<div class="invalid-feedback text-danger">
@error('total_hari')
<div class="help-block">{{$message}}</div>
@enderror
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
</div>


<!-- MODAL TAMBAH DATA KORAN -->
<div class="modal fade" id="tambahData" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Tambah Data Paket</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body p-b-0">
<form method="POST" action="{{route('addPaket')}}">
@csrf
<div class="mb-3">
<label for="paket" class="form-label">Paket</label>
<input type="text" class="form-control @error('paket') is-invalid form-control-danger @enderror" value="{{ old('paket')}}" id="kodeKoran" name="paket" placeholder="Paket" >
<div class="invalid-feedback text-danger">
@error('paket')
<div class="help-block">{{$message}}</div>
@enderror
</div>
</div>
<div class="mb-3">
<label for="total_hari" class="form-label">Jumlah Total Hari</label>
<input type="text" class="form-control @error('total_hari') is-invalid form-control-danger @enderror" value="{{ old('total_hari')}}" id="total_hari" placeholder="Jumlah Total Hari" name="total_hari" >
<div class="invalid-feedback text-danger">
@error('total_hari')
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

<!-- MODAL DELETE DATA PAKET -->
@foreach ($pakets as $paket)
<div class="modal fade" id="deleteData{{$paket->id_paket}}" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">{{$paket->paket}}</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body">
Apakah Anda Yakin Ingin Menghapus Data Ini ?
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<a href="/admin/paket/delete/{{$paket->id_paket}}" class="btn btn-danger">Delete</a>
</div>
</div>
</div>
</div>
@endforeach
<!-- ./END MODAL DELETE DATA PAKET -->


<!-- MODAL EDIT PAKET -->
@foreach ($pakets as $paket)
<div class="modal fade" id="editData{{$paket->id_paket}}" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Edit Data Paket</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body p-b-0">
<form method="POST" action="/admin/paket/edit/{{$paket->id_paket}}">
@csrf
<div class="mb-3">
<label for="paket" class="form-label">Paket</label>
<input type="text" value="{{$paket->paket}}" class="form-control @error('paket') is-invalid form-control-danger @enderror" value="{{ old('paket')}}" id="kodeKoran" name="paket" placeholder="Kode Koran" >
<div class="invalid-feedback text-danger">
@error('paket')
<div class="help-block">{{$message}}</div>
@enderror
</div>
</div>
<div class="mb-3">
<label for="total_hari" class="form-label">Total Hari</label>
<input type="text" value="{{$paket->total_hari}}" class="form-control @error('total_hari') is-invalid form-control-danger @enderror" value="{{ old('total_hari')}}" id="total_hari" placeholder="Nama Koran" name="total_hari" >
<div class="invalid-feedback text-danger">
@error('total_hari')
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
<!-- ./END MODAL EDIT PAKET -->

@endsection