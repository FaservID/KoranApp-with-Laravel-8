@extends('layouts.template')

@section('title', 'Manage Users')
@section('content')
<div class="card">
    <div class="card-header">
        <button type="submit" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahData"><i class="fa fa-plus-square"></i> Tambah User</button>
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
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Level</th>
                    <th>Created At</th>
                    <th>Foto</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=1; ?>
                @foreach ($users as $user)
                <tr>
                    <td><?= $i++; ?></td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->level}}</td>
                    <td>{{$user->created_at}}</td>
                    <td><img src="{{url('foto/')}}/{{$user->foto}}" width="50" alt="" class="img-thumbnail"></td>
                    <td class="d-flex justify-content-center">
                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editData{{$user->id}}"><i class="fa fa-edit"></i> Edit</button>
                        &nbsp; &nbsp;
                        <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#destroyData{{$user->id}}"><i class="fa fa-trash"></i>Hapus</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
            </table>
            </div>
    </div>
</div>
<!-- MODAL TAMBAH DATA -->

<div class="modal fade" id="tambahData" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Form Tambah User</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
        <form action="{{route('addUsers')}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone">
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-control" id="level" name="level" required>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="foto" class="form-label">Foto</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
    </div>
    </form> 
    </div>
    </div>
</div>

<!-- /END MODAL TAMBAH DATA -->

<!-- MODAL EDIT DATA -->
@foreach ($users as $user)
<div class="modal fade" id="editData{{ $user->id }}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">Form Edit User</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
        <form action="/manager/users/edit/{{ $user->id }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label for="name" class="form-label">Name</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Phone</label>
                <input type="text" class="form-control" id="phone" name="phone" value="{{ $user->phone }}">
            </div>
            <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-control" id="level" name="level" required>
                    <option value="admin">Admin</option>
                    <option value="manager">Manager</option>
                </select>
            </div>
            <div class="">
                <label for="foto" class="form-label">Foto</label><br>

            </div>
            <div class="mb-3 input-group">
                <img src="{{ asset('foto/') }}/{{ $user->foto }}" alt="" class="img-40 img-thumbnail img-fluid">
                <input type="file" class="form-control" id="foto" name="foto">

            </div>
    </div>
    <div class="modal-footer">
    <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
    <button type="submit" class="btn btn-primary waves-effect waves-light ">Save changes</button>
    </div>
    </form> 
    </div>
    </div>
</div>
@endforeach
<!-- /END MODAL EDIT DATA -->


<!-- START DESTROY DATA -->

@foreach ($users as $user)
<div class="modal fade" id="destroyData{{$user->id}}" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
    <div class="modal-header">
    <h4 class="modal-title">{{$user->name}}</h4>
    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>
    <div class="modal-body">
        Apakah Anda Ingin Menghapus Data Ini ??
    </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default waves-effect " data-dismiss="modal">Close</button>
        <a href="/manager/users/delete/{{$user->id}}" class="btn btn-primary waves-effect waves-light ">Hapus Data</a>
    </div>
    </div>
    </div>
</div>
@endforeach
<!-- END DESTROY DATA -->

@endsection