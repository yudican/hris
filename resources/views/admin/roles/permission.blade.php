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
            <form action="{{ route('roles.setpermissions', ['role' => $id]) }}" method="POST">
              @csrf
              {{ method_field('POST') }}
              @foreach ($permissions as $permission)
                <div class="form-group row">
                  <label for="permission{{ $permission->id }}" class="col-sm-3 col-form-label text-right"></label>
                  <div class="col-sm-9">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" class="custom-control-input" name="permission[]" id="permission{{ $permission->id }}" {{ in_array($role->name, $permission->roles()->pluck('name')->toArray()) ? 'checked' : '' }} value="{{ $permission->name }}">
                      <label class="custom-control-label" for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                    </div>
                  </div>
                </div>
              @endforeach

              <div class="form-group row">
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

