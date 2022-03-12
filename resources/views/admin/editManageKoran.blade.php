@extends('layouts.template')

@section('title', 'Form Edit Data Koran Harian')

@section('content')
<div class="card">
    <div class="card-header">
        FORM EDIT DATA KORAN HARIAN
        <a href="#" data-toggle="modal" data-target="#info"><i class="fa fa-info-circle"></i></a>
    </div>

    <div class="card-block">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                <input type="text" class="form-control" value="{{$stock->tanggal_masuk}}" readonly id="exampleFormControlInput1" name="tanggal_masuk">
            </div> 
            <table class="table table-responsive w-100 d-block d-md-table col-sm-12" id="multipleInputs">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Koran</th>
                        <th>Koran Masuk</th>
                        <th>koran Terkirim</th>
                        <th>Koran Sisa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($stocks as $key => $item)     
                    <form action="{{route('updateKoranManage', [$item['id_input']])}}" method="POST">    
                        @csrf
                        <input type="hidden" name="id_input[]" value="{{$item->id_input}}">
                        <input type="hidden" name="id[]" value="{{ $item->id }}">
                    <tr>
                        <td>{{ $key }}</td>
                        <td>
                            <input type="text" name="items[]" class="form-control" id="items" readonly value="{{$item->nama_koran}}">
                        </td>
                        <td>
                            <input type="text" name="koran_masuk[]" class="form-control km" id="koran_masuk" placeholder="Jumlah Koran Masuk" readonly value="{{$item->koran_masuk}}">
                        </td>
                        <td>
                            <input type="text" name="koran_terkirim[]" id="koran_terkirim" class="form-control kt" placeholder="Jumlah Koran terkirim">
                        </td>
                        <td>
                            <input type="text" name="koran_sisa[]" id="koran_sisa" class="form-control ks"  placeholder="Jumlah Koran Sisa">
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end">
            <a href="{{route('koranManage')}}" class="btn btn-primary mr-2">Back</a>
            <button class="btn btn-primary">Simpan</button>
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


<!-- MODAL EDIT DATA KORAN -->
@foreach ($stocks as $item)
<div class="modal fade" id="editData{{$item->id_koran}}" tabindex="-1">
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
                    <label for="exampleFormControlInput1" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="exampleFormControlInput1" name="tanggal_masuk">
                </div> 
                <table class="table table-responsive w-100 d-block d-md-table col-sm-12" id="multipleInputs">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nama Koran</th>
                            <th>Koran Masuk</th>
                            <th>koran Terkirim</th>
                            <th>Koran Sisa</th>
                        </tr>
                    </thead>
                    <tbody>     
                        <form action="{{route('updateKoranManage', [$item['tanggal_masuk'],$item['id_input']])}}" method="POST">    
                            @csrf
                            <input type="hidden" name="id_input[]" value="{{$item->id_input}}">
                        <tr>
                            <td>1</td>
                            <td>
                                <input type="text" name="items[{{$item->id_input}}]" class="form-control" id="items" readonly value="{{$item->nama_koran}}">
                            </td>
                            <td>
                                <input type="text" name="koran_masuk[{{$item->id_input}}]" class="form-control" id="koran_masuk" placeholder="Jumlah Koran Masuk" readonly value="{{$item->koran_masuk}}">
                            </td>
                            <td>
                                <input type="text" name="koran_terkirim[{{$item->id_input}}]" id="koran_terkirim" class="form-control" placeholder="Jumlah Koran terkirim">
                            </td>
                            <td>
                                <input type="text" name="koran_sisa[{{$item->id_input}}]" id="koran_sisa" class="form-control"  placeholder="Jumlah Koran Sisa">
                            </td>
                        </tr>
                    </tbody>
                </table>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
        </div>
    </div>
</div>
@endforeach
<!-- ./END MODAL TAMBAH DATA KORAN -->


<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $(".km, .kt").keyup(function() {
            var koran_masuk  = $(".km").val();
            var koran_terkirim = $(".kt").val();

            var koran_sisa = parseInt(koran_masuk) - parseInt(koran_terkirim);
            $(".ks").val(koran_sisa);
        });
    });
</script>

@endsection