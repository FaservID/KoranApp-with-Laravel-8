@extends('layouts.template')

@section('title', 'Profile')
@section('content')
<div class="card">
    <div class="main-body user-profile">
    <div class="page-wrapper">
    <div class="page-body">
        @if (session('pesan'))
                <div class="alert alert-success border-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <i class="icofont icofont-close-line-circled"></i>
                        </button>
                    <strong>Success!</strong> {{session('pesan')}}
                </div>
    @endif
    <div class="row">
    <div class="col-lg-12">
    <div class="cover-profile">
    <div class="profile-bg-img">
    <img class="profile-bg-img img-fluid" src="{{asset('template/default/')}}/assets/images/user-profile/bg-img1.jpg" alt="bg-img">
    <div class="card-block user-info">
    <div class="col-md-12">
    <div class="media-left">
    <a href="#" class="profile-image">
    <img class="user-img img-circle img-100" src="{{asset('foto/')}}/{{Auth::user()->foto}}" alt="user-img">
    </a>
    </div>
    <div class="media-body row">
    <div class="col-lg-12">
    <div class="user-title">
    <h2>{{Auth::user()->name}}</h2>
    <span class="text-white">{{strtoupper(Auth::user()->level)}}</span>
    </div>
    </div>
    <div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    </div>
    
    <div class="row">
    <div class="col-lg-12">   
    <div class="tab-content">
    <div class="tab-pane active" id="personal" role="tabpanel">
    
    <div class="card">
    <div class="card-header">
    <h5 class="card-header-text">About Me</h5>
    <button id="edit-btn" type="button" class="btn btn-sm btn-primary waves-effect waves-light f-right">
    <i class="icofont icofont-edit"></i>
    </button>
    </div>
    <div class="card-block">
    <div class="view-info">
    <div class="row">
    <div class="col-lg-12">
    <div class="general-info">
    <div class="row">
    <div class="col-lg-12 col-xl-6">
    <table class="table m-0">
    <tbody>
    <tr>
        <th scope="row">Name</th>
        <td>{{Auth::user()->name}}</td>
    </tr>
    <tr>
        <th scope="row">Level</th>
        <td>{{Auth::user()->level}}</td>
    </tr>
    <tr>
        <th scope="row">Alamat</th>
        <td>{{Auth::user()->alamat}}</td>
    </tr>
    </tbody>
    </table>
    </div>
    
    <div class="col-lg-12 col-xl-6">
    <table class="table">
    <tbody>
    <tr>
        <th scope="row">Email</th>
        <td>{{Auth::user()->email}}</td>
    </tr>
    <tr>
        <th scope="row">Mobile Number</th>
        <td>{{Auth::user()->phone}}</td>
    </tr>
    <tr>
        <th scope="row">Created At</th>
        <td>{{Auth::user()->created_at}}</td>
    </tr>
    </tbody>
    </table>
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    <div class="edit-info">
    <div class="row">
    <div class="col-lg-12">
    <div class="general-info">
    <div class="row">
    <div class="col-lg-6">
<form action="/manager/profile/{{Auth::user()->id}}" method="POST" enctype="multipart/form-data">
    @csrf
    <table class="table">
    <tbody>
    <tr>
    <td>
    <div class="input-group">
    <span class="input-group-addon"><i class="icofont icofont-user"></i></span>
    <input type="text" class="form-control" placeholder="Nama" name="name" value="{{Auth::user()->name}}">
    </div>
    </td>
    </tr>
    <tr>
    <td>
    <div class="input-group">
    <span class="input-group-addon"><i class="icofont icofont-location-pin"></i></span>
    <input type="text" class="form-control" placeholder="Address" name="alamat" value="{{Auth::user()->alamat}}">
    </div>
    </td>
    </tr>
    <tr>
        <td>
        <div class="input-group">
        <span class="input-group-addon"><i class="ti-camera"></i></span>
        <input type="file" class="form-control" placeholder="Address" value="{{Auth::user()->alamat}}" name="foto">
        <img src="{{asset('foto/')}}/{{Auth::user()->foto}}" class="img-40 img-thumbnail img-fluid" alt="">
        </div>
        </td>
        </tr>
    </tbody>
    </table>
    </div>
    
    <div class="col-lg-6">
    <table class="table">
    <tbody>
    <tr>
    <td>
    <div class="input-group">
    <span class="input-group-addon"><i class="icofont icofont-mobile-phone"></i></span>
    <input type="text" class="form-control" placeholder="Mobile Number" value="{{Auth::user()->phone}}" name="phone">
    </div>
    </td>
    </tr>
    <tr>
    <td>
    <div class="input-group">
    <span class="input-group-addon"><i class="ti-email"></i></span>
    <input type="text" class="form-control" placeholder="Email" value="{{Auth::user()->email}}" name="email">
    </div>
    </td>
    </tr>
    <tr>
        <td>
        <div class="input-group">
        <span class="input-group-addon"><i class="ti-lock"></i></span>
        <input type="password" class="form-control" placeholder="*******" name="password">
        </div>
        </td>
        </tr>
    </tbody>
    </table>
    </div>
    
    </div>
    
    <div class="text-center">
    <button type="submit" class="btn btn-primary waves-effect waves-light m-r-20">Save</button>
    <a href="#!" id="edit-cancel" class="btn btn-default waves-effect">Cancel</a>
    </div>
    </div>
</form>   
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    
    </div>
    </div>
    </div>
    
    </div>
    </div>
    
    </div>
    </div>
@endsection