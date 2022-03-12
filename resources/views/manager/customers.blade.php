@extends('layouts.template')

@section('title', 'Data Koran Langganan')
@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="align-middle">Tabel Data Koran Langganan</h5>
        <button type="submit" class="btn btn-danger btn-sm float-right ml-2" data-toggle="modal" data-target="#export"><i class="fa fa-file-pdf-o"></i> Cetak Laporan PDF</button>
        <a class="btn btn-success btn-sm float-right ml-2" href="{{ route('exportCustomer') }}" target="_blank"><i class="fa fa-file-excel-o"></i> Cetak Laporan Excel</a>
    </div>
    <div class="card-block">
        <div class="dt-responsive table-responsive">
            <table id="simpletable" class="table table-striped table-bordered nowrap">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nama Instansi / Pribadi</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Tanggal Langganan</th>
                    <th>Status</th>
                    <th>Detail Order</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($npCustomers as $npCustomer)                
                <tr>
                    <td>{{$i++}}</td>
                    <td>{{ $npCustomer->nama }}</td>
                    <td>{{ $npCustomer->phone }}</td>
                    <td>{{ $npCustomer->email }}</td>
                    <td>{{ $npCustomer->tanggal_langganan }}</td>
                    <td class="d-flex justify-content-center"><span class="btn btn-mini {{($npCustomer->status_langganan == "aktif") ? 'bg-success' : 'bg-danger'}}"><i class="{{($npCustomer->status_langganan == "aktif") ? 'fa fa-check-circle' : 'fa fa-exclamation-circle'}}"></i>{{$npCustomer->status_langganan}}</span></td>
                    <td class="text-center"><button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#detailData{{$npCustomer->id_cust}}"><i class="ti-eye"></i>Detail</button></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>

<!-- MODAL DETAIL CUSTOMER -->
@foreach ($npCustomers as $npCustomer)
<div class="modal fade" id="detailData{{$npCustomer->id_cust}}" tabindex="-1">
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
                    <input type="text" readonly value="{{$npCustomer->nama}}" class="form-control @error('nama') is-invalid form-control-danger @enderror" value="{{ old('nama')}}" id="kodeKoran" name="nama" placeholder="Kode Koran" >
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">Phone</label>
                    <input type="text" readonly value="{{$npCustomer->phone}}" class="form-control @error('phone') is-invalid form-control-danger @enderror" value="{{ old('phone')}}" id="phone" placeholder="Nama Koran" name="phone" >
                </div>
                <div class="mb-3">
                    <label for="paket" class="form-label">paket</label>
                    <input type="text" readonly value="{{$npCustomer->paket}}" class="form-control @error('paket') is-invalid form-control-danger @enderror" value="{{ old('paket')}}" id="paket" placeholder="paket" name="paket" >
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" cols="3" rows="3" class="form-control" readonly>{{$npCustomer->alamat}}</textarea>
                </div>
                <div class="row g-2">
                        <div class="col-sm-6">
                            Koran
                        </div>
                        <div class="col-sm-6">
                            Quantity
                        </div>
                        @foreach ($korans as $koran)
                            @if ($koran->id_order == $npCustomer->id_cust)
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach
<!-- END DETAIL CUSTOMER -->
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