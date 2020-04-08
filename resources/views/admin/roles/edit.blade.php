@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h4 class="page-title">{{ $title }}</h4>
      <ul class="breadcrumbs">
        <li class="nav-home">
          <a href="#">
            <i class="flaticon-home"></i>
          </a>
        </li>
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href="{{ route('roles.index') }}">Roles</a>
        </li>
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href="#">{{ $title }}</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                  {{ session('error') }}
                </div>
            @endif
            <form action="{{ route('roles.update', ['role' => $id]) }}" method="POST">
              @csrf
              {{ method_field('PUT') }}
              <div class="form-group form-show-validation row {{ $errors->has('name') ? 'has-error' : '' }}">
                <label for="name" class="col-sm-3 col-form-label text-right">Nama Role</label>
                <div class="col-sm-9">
                  <input id="name" value="{{ old('name', optional($role)->name) }}" class="form-control" type="text" name="name">
                  {!! $errors->first('name', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>

              <div class="form-group form-show-validation row">
                <label for="lowongan_deskripsi" class="col-sm-3 col-form-label text-right"></label>
                <div class="col-sm-9">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="{{ route('roles.index') }}" class="btn btn-danger">Batal</a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
@endsection

