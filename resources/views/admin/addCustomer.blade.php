@extends('layouts.template')

@section('title', 'Tambah Data Customers')
@section('content')
    
    <div class="card">
        <div class="card-header">
            <h5>FORM TAMBAH DATA</h5>
            <div class="card-header-right">
                <i class="icofont icofont-rounded-down"></i>
                <i class="icofont icofont-refresh"></i>
                <i class="icofont icofont-close-circled"></i>
            </div>
        </div>
        <div class="card-block">
            <form action="{{route('createCust')}}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control @error('nama') is-invalid form-control-danger @enderror" id="nama" placeholder="Nama" name="nama">
                    <div class="invalid-feedback text-danger">
                        @error('nama')
                            <div class="help-block">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" placeholder="Alamat" class="form-control @error('alamat') is-invalid form-control-danger @enderror"></textarea>
                    <div class="invalid-feedback text-danger">
                        @error('alamat')
                            <div class="help-block">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid form-control-danger @enderror" id="email" placeholder="email" name="email">
                    <div class="invalid-feedback text-danger">
                        @error('email')
                            <div class="help-block">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No HP</label>
                    <input type="text" class="form-control @error('phone') is-invalid form-control-danger @enderror" id="phone" placeholder="phone" name="phone">
                    <div class="invalid-feedback text-danger">
                        @error('phone')
                            <div class="help-block">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="paket" class="form-label">Paket</label>
                    <select class="form-select form-control @error('id_paket') is-invalid form-control-danger @enderror" aria-label="Default select example" name="id_paket">
                        <div class="invalid-feedback text-danger">
                            @error('id_paket')
                                <div class="help-block">{{$message}}</div>
                            @enderror
                        </div>
                        @foreach ($paket as $pkt)                                    
                            <option value="{{$pkt->id_paket}}">{{$pkt->paket}}</option>
                        @endforeach
                    </select>
                </div> 
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal_langganan">
                </div> 
                <div class="form-group row">
                    <div class="col-sm-1 col-form-label">Items</div>
                    <div class="col-sm-5 justify-content-start d-flex">
                        {{-- <input type="text" class="form-control" id="items" name="items[]"> --}}
                        <select class="form-select form-control" aria-label="Default select example" name="items[]">
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
                        <a href="#" class="addOrder btn btn-success">+ Add</a>
                    </div>         
                </div>
                <div class="orders">
                </div>
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>


<!-- SCRIPT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript">
    $('.addOrder').on('click', function() {
        addOrder();
    });
    function addOrder() {
        var orders = '<div class="form-group row mt-4"><div class="col-sm-1 col-form-label">Items</div><div class="col-sm-5 justify-content-start d-flex"><select class="form-select form-control" aria-label="Default select example" name="items[]">@foreach ($koran as $np)<option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>@endforeach</select></div><div class="col-sm-1 col-form-label justify-content-end d-flex">Qty</div><div class="col-sm-4"><input type="text" class="form-control" id="qty" name="qty[]"></div><div class="col-sm-1 justify-content-end d-flex"><a href="#" class="removeOrder btn btn-danger">- Delete</a></div></div>';
        $('.orders').append(orders);
    };
    $('.removeOrder').live('click', function() {
        $(this).parent().parent().remove();
    });
</script>
@endsection