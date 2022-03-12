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
            <div class="form-group row mt-4 col-sm-12">
                <div class="col-sm-1 col-form-label">Koran</div>
                <div class="col-sm-5 justify-content-start d-flex">
                    {{-- <input type="text" class="form-control" id="items" name="items[]"> --}}
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
            </div>
            <div class="orders">

            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" id="nama" placeholder="Nama" name="nama">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" id="alamat" rows="3" class="form-control"></textarea>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email" placeholder="email" name="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">No HP</label>
                <input type="text" class="form-control" id="phone" placeholder="phone" name="phone">
            </div>
            <div class="mb-3">
                <label for="paket" class="form-label">Paket</label>
                <select class="form-select form-control" aria-label="Default select example" name="id_paket">
                    @foreach ($paket as $pkt)                                    
                        <option value="{{$pkt->id_paket}}">{{$pkt->paket}}</option>
                    @endforeach
                </select>
            </div> 

            
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
    $('.addOrder').on('click', function() {
        addOrder();
    });
    function addOrder() {
        var orders = '<div class="form-group row mt-4 col-sm-12"><div class="col-sm-1 col-form-label">Koran</div><div class="col-sm-5 justify-content-start d-flex"><select class="form-select form-control" aria-label="Default select example" name="items[]">@foreach ($koran as $np)<option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>@endforeach</select></div><div class="col-sm-1 col-form-label justify-content-end d-flex">Quantity</div><div class="col-sm-4"><input type="text" class="form-control" id="qty" name="qty[]" placeholder="Quantity"></div><div class="col-sm-1 justify-content-end d-flex"><a href="#" class="removeOrder btn btn-danger">Hapus</a></div></div>';
        $('.orders').append(orders);
    };
    $('.removeOrder').live('click', function() {
        $(this).parent().parent().remove();
    });
</script>
@endsection