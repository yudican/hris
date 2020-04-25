@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header">
        <p class="page-title"><a href="{{ route('biodata-ktp.edit', ['biodata_ktp' => request()->segment(3)]) }}" class="btn btn-primary">Kembali</a></p>
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
            <a href="#">Biodata</a>
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
              <div class="col-md-8 mx-auto">
                <form action="{{ $action }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="POST">
                  <input type="hidden" name="nomor_ktp" value="{{ $ktpNomor }}">
                  <div class="form-group  form-show-validation row {{ $errors->has('kehamilan_status') ? 'has-error' : '' }}">
                    <label for="kehamilan_status" class="col-sm-3 col-form-label">Status kehamilan</label>
                    <div class="col-sm-9">
                      <select id="kehamilan_status" class="form-control" onchange="return getStatus(this.value)" name="kehamilan_status">
                        <option value="">Pilih Status kehamilan</option>
                        <option value="Ya" {{ (old('kehamilan_status', optional($row)->kehamilan_status) == 'Ya') ? 'selected' : '' }}>Ya</option>
                        <option value="Tidak" {{ (old('kehamilan_status', optional($row)->kehamilan_status) == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                      </select>
                      {!! $errors->first('kehamilan_status', '<label id="name-error" class="error" for="name">:message</label>') !!}
                    </div>
                  </div>
                  <div class="form-group form-show-validation row {{ $errors->has('kehamilan_usia') ? 'has-error' : '' }}">
                    <label for="kehamilan_usia" class="col-sm-3 col-form-label">Usia Kehamilan</label>
                    <div class="col-sm-9">
                      <input id="kehamilan_usia" class="form-control" type="text" onkeyup="handleChange(this.value)" name="kehamilan_usia" placeholder="Usia Kehamilan 0-9" value="{{ old('kehamilan_usia', optional($row)->kehamilan_usia) }}" {{ (old('kehamilan_usia', optional($row)->kehamilan_usia) == 'Ya') ? '' : 'readonly' }}>
                      {!! $errors->first('kehamilan_usia', '<label id="kehamilan_usia-error" class="error" for="kehamilan_usia">:message</label>') !!}
                    </div>
                  </div>
                  <div class="form-group form-show-validation row {{ $errors->has('kehamilan_akhir') ? 'has-error' : '' }}">
                    <label for="kehamilan_akhir" class="col-sm-3 col-form-label">Tanggal Kehamilan</label>
                    <div class="col-sm-9">
                      <input id="kehamilan_akhir" class="form-control" type="text" onkeyup="handleChange(this.value)" name="kehamilan_akhir" placeholder="Tanggal kehamilan" value="{{ old('kehamilan_akhir', optional($row)->kehamilan_akhir) }}" {{ (old('kehamilan_usia', optional($row)->kehamilan_usia) == 'Ya') ? '' : 'readonly' }}>
                      {!! $errors->first('kehamilan_akhir', '<label id="kehamilan_akhir-error" class="error" for="kehamilan_akhir">:message</label>') !!}
                    </div>
                  </div>
                 
                  
                  <div class="form-group row">
                    <label for="slug" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                      <button type="submit" class="btn btn-primary">Simpan & Lanjutkan</button>
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
  <script src="{{ asset('assets/server/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
  <script>
    $('#kehamilan_akhir').datetimepicker({
      format: 'YYYY-MM-DD',
    });

    function getStatus(value){
      let usiaKehamilan = document.getElementById('kehamilan_usia')
      let akhirKehamilan = document.getElementById('kehamilan_akhir')

      if (value === 'Tidak' || value === '') {
        usiaKehamilan.readOnly = true
        akhirKehamilan.readOnly = true
        usiaKehamilan.value = ''
        akhirKehamilan.value = ''

        return
      }
      usiaKehamilan.readOnly = false
      akhirKehamilan.readOnly = false
    }
  </script>
@endpush