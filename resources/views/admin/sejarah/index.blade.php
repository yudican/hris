@extends('layouts.admin')
@section('content')
<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h4 class="page-title">{{ $tittle }}</h4>
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
          <a href="{{ route('lowongan.index') }}">Lowongan</a>
        </li>
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href="#">{{ $tittle }}</a>
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
            <form action="{{ route('sejarah-perusahaan.store') }}" method="POST" enctype="multipart/form-data">
              @csrf
              {{ method_field('POST') }}
              <div class="form-group form-show-validation row {{ $errors->has('foto') ? 'has-error' : '' }}">
                <label for="foto" class="col-sm-3 col-form-label">Banner</label>
                <div class="col-sm-9">
                  <div class="input-file input-file-image">
                    <img class="img-upload-preview" width="820" height="400" src="{{ isset($row->foto) ? asset('storage/'.$row->foto) : 'http://placehold.it/150x150' }}" alt="preview">
                    <input type="file" class="form-control form-control-file" id="foto" name="foto" accept="image/*">
                    <input type="hidden" name="path_foto" value="{{ old('path_foto', optional($row)->foto) }}">
                    <label for="foto" class="label-input-file btn btn-black btn-round">
                      <span class="btn-label">
                        <i class="fa fa-file-image"></i>
                      </span>
                      Upload a Image
                    </label>
                    {!! $errors->first('foto', '<label id="name-error" class="error" for="name">:message</label>') !!}
                  </div>
                </div>
              </div>

              <div class="form-group form-show-validation row {{ $errors->has('isi') ? 'has-error' : '' }}">
                <label for="isi" class="col-sm-3 col-form-label text-right">Isi</label>
                <div class="col-sm-9">
                  <textarea id="isi" class="form-control" name="isi">{{ old('isi', optional($row)->isi) }}</textarea>
                  {!! $errors->first('isi', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>

              <div class="form-group form-show-validation row {{ $errors->has('tanggal') ? 'has-error' : '' }}">
                <label for="tanggal" class="col-sm-3 col-form-label text-right">Tanggal</label>
                <div class="col-sm-9">
                  <input id="tanggal" value="{{ old('tanggal', optional($row)->tanggal) }}" class="form-control" type="text" name="tanggal">
                  {!! $errors->first('tanggal', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>

              <div class="form-group form-show-validation row {{ $errors->has('status') ? 'has-error' : '' }}">
                <label for="status" class="col-sm-3 col-form-label text-right">Tampilkan</label>
                <div class="col-sm-9">
                  <select name="status" id="status" class="form-control">
                    <option value="Ya" {{ (old('status', optional($row)->status) == 'Ya') ? 'selected' : '' }}>Ya</option>
                    <option value="Tidak" {{ (old('status', optional($row)->status) == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                  </select>
                  {!! $errors->first('status', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>

              <div class="form-group form-show-validation row">
                <label for="lowongan_deskripsi" class="col-sm-3 col-form-label text-right"></label>
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
@endsection

@push('script')
  <script src="{{ asset('assets/server/js/plugin/summernote/summernote-bs4.min.js') }}"></script>
  <script>
    $('#isi').summernote({
      placeholder: 'isi',
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
      tabsize: 2,
      height: 400
    });
    
    $('#tanggal').datetimepicker({
			format: 'YYYY-MM-DD',
		});
  </script>
@endpush
