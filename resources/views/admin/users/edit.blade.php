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
          <a href="{{ route('users.index') }}">users</a>
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
            <form action="{{ route('users.update', ['user' => $id]) }}" method="POST">
              @csrf
              {{ method_field('PUT') }}
              @foreach ($roles as $role)
                <div class="form-check">
                  <div class="row">
                    <label class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-right"></span></label>
                    <div class="col-lg-4 col-md-9 col-sm-8 d-flex align-items-center">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="role_{{ $role->name }}" name="role_name" value="{{ $role->name }}">
                        <label class="custom-control-label" for="role_{{ $role->name }}">{{ $role->name }}</label>
                      </div>
                    </div>
                  </div>
                </div>
              @endforeach

              <div class="form-group form-show-validation row">
                <label for="lowongan_deskripsi" class="col-sm-3 col-form-label text-right"></label>
                <div class="col-sm-9">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="{{ route('users.index') }}" class="btn btn-danger">Batal</a>
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

@push('script')
    <script>
      $('.custom-checkbox input:checkbox').click(function() {
        $('.custom-checkbox input:checkbox').not(this).prop('checked', false);
    });
    </script>
@endpush

