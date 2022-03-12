@extends('layouts.template')

@section('title', 'List Data Tagihan')

@section('content')

<div class="card">
<div class="card-header">
<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus-square"></i> Kirim Tagihan</button>
<div class="card-header-right">
<i class="icofont icofont-rounded-down"></i>
<i class="icofont icofont-refresh"></i>
<i class="icofont icofont-close-circled"></i>
</div>
</div>
<div class="card-block">
@if (session('pesan'))
<div class="alert alert-success icons-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<i class="icofont icofont-close-line-circled"></i>
</button>
<strong>Success!</strong> {{session('pesan')}}                
</div>
@endif
<div class="alert alert-info icons-alert">
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<i class="icofont icofont-close-line-circled"></i>
</button>
<p><strong>{{$date}}</strong>, Tagihan Harus di kirimkan ke pelanggan sebelum <code>tanggal 10</code> </p>
</div>
<div class="dt-responsive table-responsive">
<table id="simpletable" class="table table-striped table-bordered nowrap">
<thead>
<tr>
<th>#</th>
<th>Nama</th>
<th>Phone</th>
<th>Email</th>
<th>Paket</th>
<th>Total Tagihan</th>
</tr>
</thead>
<tbody>
<?php $i=1; ?>
@foreach ($customers as $customer)                            
<tr>
<td>{{$i++}}</td>
<td>{{$customer->nama}}</td>
<td>{{$customer->phone}}</td>
<td>{{$customer->email}}</td>
<td>{{$customer->paket}}</td>
<td>Rp. {{ $customer->prices }}</td>
</tr>
@endforeach
</tbody>
</table>
</div>
</div>
</div>


<!-- MODAL KIRIM DATA KORAN -->
<div class="modal fade" id="tambahData" tabindex="-1">
<div class="modal-dialog" role="document">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Kirim Tagihan</h5>
<button type="button" class="close" data-dismiss="modal" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
<div class="modal-body p-b-0">
<form method="POST" action="{{route('kirimTagihan')}}">
@csrf
<div class="mb-3">
@foreach ($customers as $item)                            
<input type="checkbox" name="email[]" id="email" value="{{$item->email}}"> {{$item->email}} <br>
@endforeach
</div>
</div>
<div class="modal-footer">
<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
<button type="submit" class="btn btn-primary" data-target="_Blank">Save</button>
</div>
</form>
</div>
</div>
</div>
<!-- ./END MODAL KIRIM DATA KORAN -->

@endsection