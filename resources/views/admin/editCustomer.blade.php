@extends('layouts.template')

@section('title', 'Edit Data Customers')
@section('content')
    
    <div class="card">
        <div class="card-header">
            <h5>FORM EDIT DATA</h5>
            <div class="card-header-right">
                <i class="icofont icofont-rounded-down"></i>
                <i class="icofont icofont-refresh"></i>
                <i class="icofont icofont-close-circled"></i>
            </div>
        </div>
        <div class="card-block">
            <form action="/admin/customers/edit/{{ $customers->id_cust }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" value="{{ $customers->nama }}" class="form-control @error('nama') is-invalid form-control-danger @enderror" id="nama" placeholder="Nama" name="nama">
                    <div class="invalid-feedback text-danger">
                        @error('nama')
                            <div class="help-block">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" placeholder="Alamat" class="form-control @error('alamat') is-invalid form-control-danger @enderror">{{ $customers->alamat }}</textarea>
                    <div class="invalid-feedback text-danger">
                        @error('alamat')
                            <div class="help-block">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" value="{{ $customers->email }}" class="form-control @error('email') is-invalid form-control-danger @enderror" id="email" placeholder="email" name="email">
                    <div class="invalid-feedback text-danger">
                        @error('email')
                            <div class="help-block">{{$message}}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="phone" class="form-label">No HP</label>
                    <input type="text" value="{{ $customers->phone }}" class="form-control @error('phone') is-invalid form-control-danger @enderror" id="phone" placeholder="phone" name="phone">
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
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal_langganan" value="{{ $customers->tanggal_langganan }}">
                </div> 
                <div class="form-group row">
                    @foreach ($orders as $order)
                        @if ($customers->id_cust == $order->id_order)
                        <input type="hidden" name="id[]" value="{{ $order->id }}">
                        <input type="hidden" name="id_order[]" value="{{ $order->id_order }}">
                        <div class="col-sm-1 col-form-label mb-3">Items</div>
                        <div class="col-sm-5 justify-content-start d-flex mb-3">
                            {{-- <input type="text" class="form-control" id="items" name="items[]"> --}}
                            <input type="text" name="items[]" class="form-control" value="{{ $order->item }}">
                            <button type="button" class="btn btn-secondary" data-toggle="tooltip" data-placement="right" 
                            title="
                                [ 1. Kompas ] [ 2. Sriwijaya Post ] [ 3. Tribun ] [ 4. Sumeks ] [ 5. Palpos ] [ 6. HR. Muba ] [ 7. Radar ] [ 8. Palpres ] [ 9. Media S ] [ 10. Suara N ]">
                                <i class="fa fa-info-circle"></i>
                            </button>
                            {{-- <select class="form-select form-control" aria-label="Default select example" name="items[]">
                                    <option disabled selected value="{{ $order->item }}">{{ $order->nama_koran }}</option>
                                @foreach ($koran as $np)                                    
                                    <option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>
                                @endforeach
                            </select> --}}
                        </div>
                        <div class="col-sm-1 col-form-label justify-content-end d-flex">Qty</div>
                        <div class="col-sm-4">
                            <input type="text" class="form-control" id="qty" name="qty[]" value="{{ $order->qty }}">
                        </div>
                        <div class="col-sm-1">
                            <a href="#" id="remove" class="removeOrder remove btn btn-danger btn-sm">-</a>
                            <a href="#" class="addOrder btn btn-primary btn-sm">+</a>
                        </div>
                        @endif
                    @endforeach
                </div>
                <div class="orders">
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{ route('customers') }}" class="btn btn-primary mr-2">Back</a>
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>


<!-- SCRIPT -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

<script type="text/javascript">
var i = $('input.field').size() + 1;
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

    $('.remove').click(function() {
        if(i > 1) {
            $('.field:last').remove();
            i--;
        }
    });
</script>
@endsection