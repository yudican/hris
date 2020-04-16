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
            <form action="{{ $action }}" method="POST">
              @csrf
              {{ method_field($method) }}
              <div class="form-group form-show-validation row {{ $errors->has('lowongan_bagian') ? 'has-error' : '' }}">
                <label for="lowongan_bagian" class="col-sm-3 col-form-label text-right">Bidang Pekerjaan</label>
                <div class="col-sm-9">
                  <input id="lowongan_bagian" value="{{ old('lowongan_bagian', optional($row)->lowongan_bagian) }}" class="form-control" type="text" name="lowongan_bagian">
                  {!! $errors->first('lowongan_bagian', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>

              <div class="form-group form-show-validation row {{ $errors->has('lowongan_karyawan') ? 'has-error' : '' }}">
                <label for="lowongan_karyawan" class="col-sm-3 col-form-label text-right">Karyawan Dibutuhkan</label>
                <div class="col-sm-9">
                  <input id="lowongan_karyawan" value="{{ old('lowongan_karyawan', optional($row)->lowongan_karyawan) }}" class="form-control" type="number" name="lowongan_karyawan">
                  {!! $errors->first('lowongan_karyawan', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>

              <div class="form-group form-show-validation row {{ $errors->has('lowongan_salary_max') ? 'has-error' : '' }}">
                <label for="lowongan_salary_max" class="col-sm-3 col-form-label text-right">Gaji Yang Ditawarkan</label>
                <div class="col-sm-9">
                  <input id="lowongan_salary_max" value="{{ old('lowongan_salary_max', optional($row)->lowongan_salary_max) }}" class="form-control" type="text" name="lowongan_salary_max">
                  {!! $errors->first('lowongan_salary_max', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>

              <div class="form-group form-show-validation row {{ $errors->has('lowongan_wilayah') ? 'has-error' : '' }}">
                <label for="lowongan_wilayah" class="col-sm-3 col-form-label text-right">Wilayah Penempatan</label>
                <div class="col-sm-9">
                  <input id="lowongan_wilayah" value="{{ old('lowongan_wilayah', optional($row)->lowongan_wilayah) }}" class="form-control" type="text" name="lowongan_wilayah">
                  {!! $errors->first('lowongan_wilayah', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>

              <div class="form-group form-show-validation row {{ $errors->has('lowongan_status') ? 'has-error' : '' }}">
                <label for="lowongan_status" class="col-sm-3 col-form-label text-right">Status Lowongan</label>
                <div class="col-sm-9">
                  <select name="lowongan_status" id="lowongan_status" class="form-control">
                    <option value="Buka" {{ (old('lowongan_status', optional($row)->lowongan_status) == 'Buka') ? 'Buka' : '' }}>Buka</option>
                    <option value="Tutup" {{ (old('lowongan_status', optional($row)->lowongan_status) == 'Tutup') ? 'Tutup' : '' }}>Tutup</option>
                  </select>
                  {!! $errors->first('lowongan_status', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>

              <div class="form-group form-show-validation row {{ $errors->has('lowongan_tanggal_open') ? 'has-error' : '' }}">
                <label for="lowongan_tanggal_open" class="col-sm-3 col-form-label text-right">Tanggal Lowongan Dibuka</label>
                <div class="col-sm-9">
                  <input id="lowongan_tanggal_open" value="{{ old('lowongan_tanggal_open', optional($row)->lowongan_tanggal_open) }}" class="form-control" type="text" name="lowongan_tanggal_open">
                  {!! $errors->first('lowongan_tanggal_open', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>

              <div class="form-group form-show-validation row {{ $errors->has('lowongan_tanggal_close') ? 'has-error' : '' }}">
                <label for="lowongan_tanggal_close" class="col-sm-3 col-form-label text-right">Tanggal Lowongan Selesai</label>
                <div class="col-sm-9">
                  <input id="lowongan_tanggal_close" value="{{ old('lowongan_tanggal_close', optional($row)->lowongan_tanggal_close) }}" class="form-control" type="text" name="lowongan_tanggal_close">
                  {!! $errors->first('lowongan_tanggal_close', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>

              <div class="form-group form-show-validation row {{ $errors->has('lowongan_kualifikasi') ? 'has-error' : '' }}">
                <label for="lowongan_kualifikasi" class="col-sm-3 col-form-label text-right">Kualifikasi Pelamar</label>
                <div class="col-sm-9">
                  <textarea id="lowongan_kualifikasi" class="form-control" name="lowongan_kualifikasi">{{ old('lowongan_kualifikasi', optional($row)->lowongan_kualifikasi) }}</textarea>
                  {!! $errors->first('lowongan_kualifikasi', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>

              <div class="form-group form-show-validation row {{ $errors->has('lowongan_deskripsi') ? 'has-error' : '' }}">
                <label for="lowongan_deskripsi" class="col-sm-3 col-form-label text-right">Deskripsi Pekerjaan</label>
                <div class="col-sm-9">
                  <textarea id="lowongan_deskripsi" class="form-control" name="lowongan_deskripsi">{{ old('lowongan_deskripsi', optional($row)->lowongan_deskripsi) }}</textarea>
                  {!! $errors->first('lowongan_deskripsi', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>

              <div class="form-group form-show-validation row">
                <label for="lowongan_deskripsi" class="col-sm-3 col-form-label text-right"></label>
                <div class="col-sm-9">
                  <button type="submit" class="btn btn-primary">Simpan</button>
                  <a href="{{ route('lowongan.index') }}" class="btn btn-danger">Batal</a>
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
  <script src="{{ asset('assets/server/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
  <script>
    $('#lowongan_deskripsi').summernote({
      placeholder: 'Lowongan Deskripsi',
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
      tabsize: 2,
      height: 400
    });
    $('#lowongan_kualifikasi').summernote({
      placeholder: 'Lowongan Kualifikasi',
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
      tabsize: 2,
      height: 300
    });
    $('#lowongan_tanggal_close').datetimepicker({
			format: 'YYYY-MM-DD',
		});
    $('#lowongan_tanggal_open').datetimepicker({
			format: 'YYYY-MM-DD',
		});
  </script>
@endpush
