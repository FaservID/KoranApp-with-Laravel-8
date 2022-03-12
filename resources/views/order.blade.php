<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                FORM ORDER
            </div>
            <div class="card-body">
                <form action="{{route('addOrder')}}" method="POST">
                    @csrf
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
                        <select class="form-select" aria-label="Default select example" name="id_paket">
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
                            <select class="form-select" aria-label="Default select example" name="items[]">
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
                </div>
            <div class="card-footer">
                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary">Simpan</button>
                </div>
            </div>
            </form>
        </div>
        <a href="" class="btn btn-primary mt-4">Back</a>

    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>

    <script type="text/javascript">
        $('.addOrder').on('click', function() {
            addOrder();
        });
        function addOrder() {
            var orders = '<div class="form-group row mt-4"><div class="col-sm-1 col-form-label">Items</div><div class="col-sm-5 justify-content-start d-flex"><select class="form-select" aria-label="Default select example" name="items[]">@foreach ($koran as $np)<option value="{{$np->id_koran}}">{{$np->nama_koran}}</option>@endforeach</select></div><div class="col-sm-1 col-form-label justify-content-end d-flex">Qty</div><div class="col-sm-4"><input type="text" class="form-control" id="qty" name="qty[]"></div><div class="col-sm-1 justify-content-end d-flex"><a href="#" class="removeOrder btn btn-danger">- Delete</a></div></div>';
            $('.orders').append(orders);
        };
        $('.removeOrder').live('click', function() {
            $(this).parent().parent().remove();
        });
    </script>

    <!-- Optional JavaScript; choose one of the two! -->
    
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>