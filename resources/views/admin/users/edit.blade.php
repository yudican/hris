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
              

              <div class="form-group row">
                <label for="multiple-role" class="col-sm-3">Role </label>
                <div class="col-sm-9">
                  <select id="multiple-role" class="custom-select" name="role[]" multiple="multiple">
                    <option>Pilih Role</option>
                    @foreach ($roles as $role)
                      <option value="{{ $role->name }}" {{ in_array($role->name, $users->roles()->pluck('name')->toArray()) ? 'selected' : '' }}>{{ $role->name }}</option>
                    @endforeach
                  </select>
                </div>
              </div>

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
<script src="{{ url('assets/server/js/plugin/select2/select2.full.min.js') }}"></script>
<script>
  $('#multiple-role').select2({
    theme: "bootstrap"
  });
</script>
@endpush

