@extends('layouts.admin')

@push('style')
    <link rel="stylesheet" href="{{ asset('iconpicker/dist/css/fontawesome-iconpicker.min.css') }}">
    <script src="{{ asset('iconpicker/dist/js/fontawesome-iconpicker.min.js') }}"></script>
@endpush

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
            <a href="{{ route('menu.index') }}">Menu</a>
          </li>
          <li class="separator">
            <i class="flaticon-right-arrow"></i>
          </li>
          <li class="nav-item">
            <a href="#">{{ $title }}</a>
          </li>
        </ul>
        <div class="ml-auto">
          <a href="{{ route('menu.index') }}" class="btn btn-primary">Menu</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="col-md-8 mx-auto">
                <form action="{{ $action }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                  <div class="form-group row">
                    <label for="parent_id" class="col-sm-3 col-form-label">Menu Utama</label>
                    <div class="col-sm-9">
                      <select id="parent_id" class="form-control" name="parent_id">
                        <option value="#">Pilih Menu Utama</option>
                          @foreach ($menus as $men)
                            <option value="{{ $men->id }}" {{ (old('parent_id', optional($menu)->parent_id) == $men->id) ? 'selected' : '' }}>{{ $men->name }}</option>
                          @endforeach
                      </select>
                      <small class="text-muted" for="slug">Note: Pilih Menu Utama Untuk Membuat Sub Menu</small>
                    </div>
                  </div>
                  <div class="form-group form-show-validation row {{ $errors->has('name') ? 'has-error' : '' }}">
                    <label for="name" class="col-sm-3 col-form-label">Nama Menu</label>
                    <div class="col-sm-9">
                      <input id="name" class="form-control" type="text" onkeyup="handleChange(this.value)" name="name" placeholder="Dashboard" value="{{ old('name', optional($menu)->name) }}">
                      {!! $errors->first('name', '<label id="name-error" class="error" for="name">:message</label>') !!}
                    </div>
                  </div>
                  <div class="form-group form-show-validation row {{ $errors->has('controller') ? 'has-error' : '' }}">
                    <label for="controller" class="col-sm-3 col-form-label">Nama Controller</label>
                    <div class="col-sm-9">
                      <input id="controller" class="form-control" type="text" name="controller" placeholder="App\Http\Controllers\UserController" value="{{ old('controller', optional($menu)->controller) }}">
                      {!! $errors->first('controller', '<label id="controller-error" class="error" for="controller">:message</label>') !!}
                    </div>
                  </div>
                  <div class="form-group form-show-validation row {{ $errors->has('url') ? 'has-error' : '' }}">
                    <label for="url" class="col-sm-3 col-form-label">Menu Url</label>
                    <div class="col-sm-9">
                      <input id="url" class="form-control" type="text" name="url" placeholder="menu.index" value="{{ old('url', optional($menu)->url) }}">
                      {!! $errors->first('url', '<label id="url-error" class="error" for="url">:message</label>') !!}
                    </div>
                  </div>
                  <div class="form-group form-show-validation row {{ $errors->has('icon') ? 'has-error' : '' }}">
                    <label for="icon" class="col-sm-3 col-form-label">Menu Icon</label>
                    <div class="col-sm-9">
                      <input id="icon" class="form-control" type="text" name="icon" placeholder="fa fa-menu" value="{{ old('icon', optional($menu)->icon) }}">
                      {!! $errors->first('icon', '<label id="icon-error" class="error" for="icon">:message</label>') !!}
                    </div>
                  </div>
                  <div class="form-group form-show-validation row {{ $errors->has('show') ? 'has-error' : '' }}">
                    <label for="show" class="col-sm-3 col-form-label">Tampilkan</label>
                    <div class="col-sm-9">
                      <select id="show" class="form-control" name="show">
                          <option value="Ya" {{ (old('show', optional($menu)->show) == 'Ya') ? 'selected' : '' }}>Ya</option>
                          <option value="Tidak" {{ (old('show', optional($menu)->show) == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                      </select>
                      {!! $errors->first('show', '<label id="show-error" class="error" for="show">:message</label>') !!}
                    </div>
                  </div>
                  
                  <div class="form-group row">
                    <label for="slug" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                      <button type="submit" class="btn btn-primary">Simpan</button>
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
@endsection

@push('script')
    <script>
      $('#icon').iconpicker({animation: false});
    </script>
    <script>
      function handleChange(values) {
        var url = document.getElementById('url')
        url.value = getUrlvalues)
      }

      function getUrlvalue) {
        return value.replace(/\s+/g, '-').toLowerCase()
      }
    </script>
@endpush