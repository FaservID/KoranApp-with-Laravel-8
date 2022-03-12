@extends('layouts.template')

@section('title', 'Sample Page')

@section('content')
<div class="card">
<div class="card-header">
        FORM ORDER
    </div>
    <div class="card-block">
        <form action="{{route('addOrder')}}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal_langganan">
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
                        <td>1</td>
                        <td>
                            <select class="form-select form-control" aria-label="Default select example" name="items[]">
                                @foreach ($koran as $np)                                    
                                    <option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            <input type="text" name="koran_masuk" class="form-control" id="koran_masuk" placeholder="Jumlah Koran Masuk">
                        </td>
                        <td>
                            <input type="text" name="koran_terkirim" id="koran_terkirim" class="form-control" placeholder="Jumlah Koran terkirim" readonly>
                        </td>
                        <td>
                            <input type="text" name="koran_sisa" id="koran_sisa" class="form-control" readonly placeholder="Jumlah Koran Sisa">
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
            <button class="btn btn-primary">Simpan</button>
        </div>
    </div>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript">
    var i = 0;
    $("#addItems").click(function(){
    ++i;
    $("#multipleInputs").append('<tr><td><?php $i=2; $i+1;?></td><td><select class="form-select form-control" aria-label="Default select example" name="items[]">@foreach ($koran as $np)<option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>@endforeach</select></td><td><input type="text" name="koran_masuk" class="form-control" id="koran_masuk"></td><td><input type="text" name="koran_terkirim" id="koran_terkirim" class="form-control"></td><td><input type="text" name="koran_sisa" id="koran_sisa" class="form-control"></td><td><button type="button" class="btn btn-danger btn-sm removeItems">- Hapus</button></td></tr>');
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
        var orders = '<tr><td></td><td><select class="form-select form-control" aria-label="Default select example" name="items[]">@foreach ($koran as $np)<option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>@endforeach</select></td><td><input type="text" name="koran_masuk" class="form-control" id="koran_masuk"></td><td><input type="text" name="koran_terkirim" id="koran_terkirim" class="form-control"></td><td><input type="text" name="koran_sisa" id="koran_sisa" class="form-control"></td><td><a href="#" class="removeOrder btn btn-danger">Hapus</a></td></tr>';
        $('.orders').append(orders);
    };
    $('.removeOrder').live('click', function() {
        $(this).parents('tr').remove();
    });
</script>
@endsection