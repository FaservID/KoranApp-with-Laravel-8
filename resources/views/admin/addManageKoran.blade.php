@extends('layouts.template')

@section('title', 'Form Tambah Data Koran Harian')

@section('content')
<div class="card">
    <div class="card-header">
        FORM TAMBAH DATA KORAN HARIAN
        <a href="#" data-toggle="modal" data-target="#info"><i class="fa fa-info-circle"></i></a>
    </div>

    <div class="card-block">
        <form action="{{route('createKoranManage')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                <input type="date" class="form-control @error('tanggal_masuk') is-invalid form-control-danger @enderror" id="exampleFormControlInput1" name="tanggal_masuk">
                <div class="invalid-feedback text-danger">
                    @error('tanggal_masuk')
                        <div class="help-block">{{$message}}</div>
                    @enderror
                </div>
            </div> 
            <table class="table table-responsive w-100 d-block d-md-table col-sm-12" id="multipleInputs">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Koran</th>
                        <th>Koran Masuk</th>
                        <th>koran Terkirim</th>
                        <th>Koran Sisa</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>#</td>
                        <td>
                            <select class="form-select form-control @error('items') is-invalid form-control-danger @enderror" aria-label="Default select example" name="items[]">
                                <div class="invalid-feedback text-danger">
                                    @error('items')
                                        <div class="help-block">{{$message}}</div>
                                    @enderror
                                </div>
                                @foreach ($koran as $np)                                    
                                    <option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" name="koran_masuk[]" class="form-control @error('koran_masuk') is-invalid form-control-danger @enderror" id="koran_masuk" placeholder="Jumlah Koran Masuk">
                            <div class="invalid-feedback text-danger">
                                @error('koran_masuk')
                                    <div class="help-block">{{$message}}</div>
                                @enderror
                            </div>
                        </td>
                        <td>
                            <input type="text" name="koran_terkirim[]" id="koran_terkirim" class="form-control" placeholder="Jumlah Koran terkirim" readonly>
                        </td>
                        <td>
                            <input type="text" name="koran_sisa[]" id="koran_sisa" class="form-control" readonly placeholder="Jumlah Koran Sisa">
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" id="addItems">+ Add</button>
                        </td>
                    </tr>
                </tbody>
            </table>
            {{-- <div class="form-group row mt-4 col-sm-12">
                <div class="col-sm-1 col-form-label">Koran</div>
                <div class="col-sm-5 justify-content-start d-flex">
                    <select class="form-select form-control" aria-label="Default select example" name="items[]">
                        @foreach ($koran as $np)                                    
                            <option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-1 col-form-label justify-content-end d-flex">Quantity</div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="qty" name="qty[]" placeholder="Quantity">
                </div>
                <div class="col-sm-1 justify-content-end d-flex">
                    <a href="#" class="addOrder btn btn-success">+ Add</a>
                </div>         
            </div> --}}
            {{-- <div class="orders">

            </div> --}}


            
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <a href="{{route('koranManage')}}" class="btn btn-primary mr-2">Back</a>
            <button class="btn btn-primary"><i class="ti-save"></i>Simpan</button>
        </div>
    </div>
    </form>
</div>

<!-- MODAL TAMBAH DATA KORAN -->
<div class="modal fade" id="info" tabindex="-1">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body p-b-0">
                Prosedur Pengisian Data Koran Harian
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">close</button>
                    </div>
            </div>
        </div>
    </div>
</div>
<!-- ./END MODAL TAMBAH DATA KORAN -->


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript">
    var i = 0;
    $("#addItems").click(function(){
    ++i;
    $("#multipleInputs").append('<tr><td><?php $i=2; $i+1;?></td><td><select class="form-select form-control" aria-label="Default select example" name="items[]">@foreach ($koran as $np)<option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>@endforeach</select></td><td><input type="text" name="koran_masuk[]" class="form-control" id="koran_masuk"></td><td><input type="text" name="koran_terkirim[]" id="koran_terkirim" class="form-control" placeholder="Jumlah Koran terkirim" readonly></td><td><input type="text" placeholder="Jumlah Koran sisa" readonly name="koran_sisa[]" id="koran_sisa" class="form-control"></td><td><button type="button" class="btn btn-danger btn-sm removeItems">- Hapus</button></td></tr>');
    });
    $(document).on('click', '.removeItems', function(){  
    $(this).parents('tr').remove();
    });  
</script>

<script type="text/javascript">
    $('.addOrder').on('click', function() {
        addOrder();
    });
    function addOrder() {
        var orders = '<tr><td></td><td><select class="form-select form-control" aria-label="Default select example" name="items[]">@foreach ($koran as $np)<option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>@endforeach</select></td><td><input type="text" name="koran_masuk" class="form-control" id="koran_masuk"></td><td><input type="text" name="koran_terkirim" id="koran_terkirim" class="form-control" readonly placeholder="Jumlah Koran terkirim"></td><td><input type="text" readonly name="koran_sisa" id="koran_sisa" placeholder="Jumlah Koran sisa" class="form-control"></td><td><a href="#" class="removeOrder btn btn-danger">Hapus</a></td></tr>';
        $('.orders').append(orders);
    };
    $('.removeOrder').live('click', function() {
        $(this).parents('tr').remove();
    });
</script>
@endsection