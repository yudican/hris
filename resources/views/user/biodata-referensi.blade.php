@extends('layouts.admin')

@section('content')
  <div class="container">
    <div class="page-inner">
      <div class="page-header">
        <p class="page-title"><a href="{{ $previews }}" class="btn btn-primary">Kembali</a></p>
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

      {{-- start alert --}}
      <div class="alert alert-info" role="alert">
        Adakah saudara atau kenalan yang bekerja di Perusahaan Kami yang merekomendasikan Anda. Jika tidak ada maka isi Status Referensi Tidak.
      </div>
      <div class="alert alert-danger" role="alert">
        Kolom Bertanda <span class="text-danger">*</span> Wajib Diisi
      </div>
      {{-- end alert --}}

      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                @if (session()->has('error'))
                <div class="alert alert-danger" role="alert">
                  {{ session('error') }}
                </div>
                @endif
                <form action="{{ $action }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="POST">
                  <input type="hidden" name="nomor_ktp" value="{{ $dataKtp->ktp_nomor }}">
                  <div>
                    <div class="row">
                      <div class="col-md-6 pr-0">
                        <div class="form-group  form-show-validation {{ $errors->has('br_status') ? 'has-error' : '' }}">
                          <label for="pendidikan_jenjang">Status Referensi</label>
                            <select id="pendidikan_jenjang" class="form-control" name="br_status">
                              <option value="">Pilih Status Referensi</option>
                              <option value="Tidak" {{ (old('br_status', optional($row)->br_status) == 'Tidak') ? 'selected' : '' }}>Tidak</option>
                              <option value="Ya" {{ (old('br_status', optional($row)->br_status) == 'Ya') ? 'selected' : '' }}>Ya</option>
                            </select>
                            {!! $errors->first('br_status', '<label id="name-error" class="error" for="name">:message</label>') !!}
                        </div>
                        <div class="form-group  form-show-validation {{ $errors->has('br_hubungan') ? 'has-error' : '' }}">
                          <label for="pendidikan_jenjang">Hubungan Referensi</label>
                            <select id="pendidikan_jenjang" class="form-control" name="br_hubungan">
                              <option value="">Pilih Hubungan Referensi</option>
                              <option value="Saudara" {{ (old('br_hubungan', optional($row)->br_hubungan) == 'Saudara') ? 'selected' : '' }}>Saudara</option>
                              <option value="Keluarga" {{ (old('br_hubungan', optional($row)->br_hubungan) == 'Keluarga') ? 'selected' : '' }}>Keluarga</option>
                              <option value="Teman" {{ (old('br_hubungan', optional($row)->br_hubungan) == 'Teman') ? 'selected' : '' }}>Teman</option>
                            </select>
                            {!! $errors->first('br_hubungan', '<label id="name-error" class="error" for="name">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('br_jabatan') ? 'has-error' : '' }}">
                          <label for="br_jabatan1">Posisi/Jabatan</label>
                            <input id="br_jabatan1" class="form-control" type="text" name="br_jabatan" placeholder="Posisi/Jabatan" value="{{ old('br_jabatan', optional($row)->br_jabatan) }}">
                            {!! $errors->first('br_jabatan', '<label id="br_jabatan1-error" class="error" for="br_jabatan1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-6 pl-0">
                        <div class="form-group form-show-validation {{ $errors->has('br_nama') ? 'has-error' : '' }}">
                          <label for="br_nama1">Nama Referensi</label>
                            <input id="br_nama1" class="form-control" type="text" name="br_nama" placeholder="Nama Referensi" value="{{ old('br_nama', optional($row)->br_nama) }}">
                            {!! $errors->first('br_nama', '<label id="br_nama1-error" class="error" for="br_nama1">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('br_cabang') ? 'has-error' : '' }}">
                          <label for="br_cabang1">Cabang</label>
                            <input id="br_cabang1" class="form-control" type="text" name="br_cabang" placeholder="Cabang" value="{{ old('br_cabang', optional($row)->br_cabang) }}">
                            {!! $errors->first('br_cabang', '<label id="br_cabang1-error" class="error" for="br_cabang1">:message</label>') !!}
                        </div>
                      </div>
                    </div>
                  </div>
                    
                  <div class="col-md-12">
                    <button type="submit" value="next" name="simpandanlanjutkan" class="btn btn-success">Simpan & Lanjutkan</button>
                    {{-- @if (count($rows) > 0)
                      <a href="{{ route('biodata-darurat.create', ['biodata_darurat' => request()->segment(3)]) }}" class="btn btn-primary">Selanjutnya</a>
                    @endif --}}
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
