@extends('layouts.template')

@section('title', 'Request Order')
@section('content')
    <div class="card">
        <div class="card-header">
           Form Request Order
            <div class="card-header-right">
                <i class="icofont icofont-rounded-down"></i>
                <i class="icofont icofont-refresh"></i>
                <i class="icofont icofont-close-circled"></i>
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
                        <td>{{$item->tanggal_langganan}}</td>
                        <td class="text-center">
                            <button class="btn btn-success btn-sm" data-toggle="modal" data-target="#detailOrder{{$item->id_cust}}"><i class="fa fa-check-circle"></i> Accept</button>
                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusOrder{{$item->id_cust}}"><i class="fa fa-exclamation-circle"></i> Decline</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        </div>
    </div>

<!-- MODAL EDIT DATA Order -->
@foreach ($custs as $item)
<div class="modal fade" id="detailOrder{{$item->id_cust}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Data Koran</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-b-0">
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" readonly value="{{$item->nama}}" class="form-control @error('nama') is-invalid form-control-danger @enderror" value="{{ old('nama')}}" id="kodeKoran" name="nama" placeholder="Kode Koran" >
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" readonly value="{{$item->phone}}" class="form-control @error('phone') is-invalid form-control-danger @enderror" value="{{ old('phone')}}" id="phone" placeholder="Nama Koran" name="phone" >
                </div>
                <div class="mb-3">
                    <label for="paket" class="form-label">paket</label>
                    <input type="text" readonly value="{{$item->paket}}" class="form-control @error('paket') is-invalid form-control-danger @enderror" value="{{ old('paket')}}" id="paket" placeholder="paket" name="paket" >
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="3" rows="3" class="form-control" readonly>{{$item->alamat}}</textarea>
                </div>
                <div class="row g-2">
                        <div class="col-sm-6">
                            Koran
                        </div>
                        <div class="col-sm-6">
                            Quantity
                        </div>
                        @foreach ($korans as $koran)
                            @if ($koran->id_order == $item->id_cust)
                                <div class="col-md-6 mb-2">
                                    <input type="text" readonly value="{{$koran->nama_koran}}" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" readonly value="{{$koran->qty}}" class="form-control">
                                </div> 
                            @endif
                        @endforeach
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="/admin/customers/accept/{{$item->id_cust}}" class="btn btn-success">Accept</a>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- ./END MODAL HAPUS REQUEST ORDER -->

@foreach ($custs as $item)
<div class="modal fade" id="hapusOrder{{$item->id_cust}}" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{strtoupper($item->nama)}}</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-b-0">
                <div class="mb-3">
                    Tolak Request Order ini ?
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                <a href="/admin/customers/decline/{{$item->id_cust}}" class="btn btn-success">Decline</a>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- ./END MODAL HAPUS REQUEST ORDER -->


@endsection