@extends('layouts.admin')

@push('style')
    <style>
      .col, .col-1, .col-10, .col-11, .col-12, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-auto, .col-lg, .col-lg-1, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-auto, .col-md, .col-md-1, .col-md-10, .col-md-11, .col-md-12, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-auto, .col-sm, .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-auto {
          position: relative;
          width: 100%;
          min-height: 1px;
          padding-right: 0;
          padding-left: 0;
      }
    </style>
@endpush

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
        Silahkan masukkan biodata susunan anak mulai dari anak pertama hingga anak terakhir <b>termasuk Anda</b>.
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
                  <input type="hidden" name="nomor_ktp1" value="{{ $dataKtp->ktp_nomor }}">
                  <div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group form-show-validation {{ $errors->has('bsa_nama1') ? 'has-error' : '' }}">
                          <label for="bsa_nama1">Nama Lengkap <span class="text-danger">*</span></label>
                            <input id="bsa_nama1" class="form-control" type="text" name="bsa_nama1" placeholder="Nama Lengkap" value="{{ old('bsa_nama1') }}">
                            {!! $errors->first('bsa_nama1', '<label id="bsa_nama1-error" class="error" for="bsa_nama1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group  form-show-validation {{ $errors->has('bsa_jenis_anak1') ? 'has-error' : '' }}">
                          <label for="pendidikan_jenjang">Jenis Hubungan <span class="text-danger">*</span></label>
                            <select id="pendidikan_jenjang" class="form-control" name="bsa_jenis_anak1">
                              <option value="">Pilih Jenis Hubungan</option>
                              <option value="Kakak" {{ (old('bsa_jenis_anak1') == 'Kakak') ? 'selected' : '' }}>Kakak</option>
                              <option value="Saya" {{ (old('bsa_jenis_anak1') == 'Saya') ? 'selected' : '' }}>Saya</option>
                              <option value="Adik" {{ (old('bsa_jenis_anak1') == 'Adik') ? 'selected' : '' }}>Adik</option>
                            </select>
                            {!! $errors->first('bsa_jenis_anak1', '<label id="name-error" class="error" for="name">:message</label>') !!}
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group form-show-validation {{ $errors->has('bsa_tanggal_lahir1') ? 'has-error' : '' }}">
                          <label for="bsa_tanggal_lahir1">Tanggal Lahir <span class="text-danger">*</span></label>
                            <input id="bsa_tanggal_lahir1" class="form-control" type="date" name="bsa_tanggal_lahir1" value="{{ old('bsa_tanggal_lahir1') }}">
                            {!! $errors->first('bsa_tanggal_lahir1', '<label id="bsa_tanggal_lahir1-error" class="error" for="bsa_tanggal_lahir1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group form-show-validation {{ $errors->has('bsa_pekerjaan1') ? 'has-error' : '' }}">
                          <label for="bsa_pekerjaan1">Pekerjaan <span class="text-danger">*</span></label>
                            <input id="bsa_pekerjaan1" class="form-control" type="text" name="bsa_pekerjaan1" placeholder="Nama Pekerjaan" value="{{ old('bsa_pekerjaan1') }}">
                            {!! $errors->first('bsa_pekerjaan1', '<label id="bsa_pekerjaan1-error" class="error" for="bsa_pekerjaan1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group  form-show-validation {{ $errors->has('bsa_pendidikan1') ? 'has-error' : '' }}">
                          <label for="pendidikan_jenjang">Pendidikan Terakhir <span class="text-danger">*</span></label>
                            <select id="pendidikan_jenjang" class="form-control" name="bsa_pendidikan1">
                              <option value="">Pilih Pendidikan Terakhir</option>
                              <option value="Belum Sekolah" {{ (old('bsa_pendidikan1') == 'Belum Sekolah') ? 'selected' : '' }}>Belum Sekolah</option>
                              <option value="Masih Sekolah" {{ (old('bsa_pendidikan1') == 'Masih Sekolah') ? 'selected' : '' }}>Masih Sekolah</option>
                              <option value="SD" {{ (old('bsa_pendidikan1') == 'SD') ? 'selected' : '' }}>SD</option>
                              <option value="SMP/MTS" {{ (old('bsa_pendidikan1') == 'SMP/MTS') ? 'selected' : '' }}>SMP/MTS</option>
                              <option value="SMA/SMK/MA" {{ (old('bsa_pendidikan1') == 'SMA/SMK/MA') ? 'selected' : '' }}>SMA/SMK/MA</option>
                              <option value="D1" {{ (old('bsa_pendidikan1') == 'D1') ? 'selected' : '' }}>D1</option>
                              <option value="D2" {{ (old('bsa_pendidikan1') == 'D2') ? 'selected' : '' }}>D2</option>
                              <option value="D3" {{ (old('bsa_pendidikan1') == 'D3') ? 'selected' : '' }}>D3</option>
                              <option value="D4" {{ (old('bsa_pendidikan1') == 'D4') ? 'selected' : '' }}>D4</option>
                              <option value="S1" {{ (old('bsa_pendidikan1') == 'S1') ? 'selected' : '' }}>S1</option>
                              <option value="S2" {{ (old('bsa_pendidikan1') == 'S2') ? 'selected' : '' }}>S2</option>
                              <option value="S3" {{ (old('bsa_pendidikan1') == 'S3') ? 'selected' : '' }}>S3</option>
                            </select>
                            {!! $errors->first('bsa_pendidikan1', '<label id="name-error" class="error" for="name">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-3">
                        <div class="form-group form-show-validation {{ $errors->has('bsa_nomor_hp1') ? 'has-error' : '' }}">
                          <label for="bsa_nomor_hp1">Nomor Telepon/HP <span class="text-danger">*</span></label>
                            <input id="bsa_nomor_hp1" class="form-control" type="text" name="bsa_nomor_hp1" placeholder="Nomor Telepon/HP" value="{{ old('bsa_nomor_hp1') }}">
                            {!! $errors->first('bsa_nomor_hp1', '<label id="bsa_nomor_hp1-error" class="error" for="bsa_nomor_hp1">:message</label>') !!}
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-8">
                        <div class="form-group form-show-validation {{ $errors->has('bsa_alamat1') ? 'has-error' : '' }}">
                          <label for="bsa_alamat1">Alamat <span class="text-danger">*</span></label>
                            <input id="bsa_alamat1" class="form-control" type="text" name="bsa_alamat1" placeholder="Alamat" value="{{ old('bsa_alamat1') }}">
                            {!! $errors->first('bsa_alamat1', '<label id="bsa_alamat1-error" class="error" for="bsa_alamat1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="form-group  form-show-validation {{ $errors->has('bsa_perkawinan1') ? 'has-error' : '' }}">
                          <label for="bsa_perkawinan1">Status Perkawinan <span class="text-danger">*</span></label>
                            <select id="bsa_perkawinan1" class="form-control" onchange="return statusPerkawinan(this.value, 'first')" name="bsa_perkawinan1">
                              <option value="">Pilih Status Perkawinan</option>
                              <option value="Kawin" {{ (old('bsa_perkawinan1') == 'Kawin') ? 'selected' : '' }}>Kawin</option>
                              <option value="Lajang" {{ (old('bsa_perkawinan1') == 'Lajang') ? 'selected' : '' }}>Lajang</option>
                            </select>
                            {!! $errors->first('bsa_perkawinan1', '<label id="name-error" class="error" for="name">:message</label>') !!}
                        </div>
                      </div>
                    </div>
                    <div id="pasangan-first" class="border-top {{ (old('bsa_perkawinan1') == 'Kawin') ? '' : 'd-none' }}">
                      <h3>Data Pasangan</h3>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group form-show-validation {{ $errors->has('bsap_nama1') ? 'has-error' : '' }}">
                            <label for="bsap_nama1">Nama Lengkap Pasangan</label>
                              <input id="bsap_nama1" class="form-control" type="text" name="bsap_nama1" placeholder="Nama Lengkap Pasangan" value="{{ old('bsap_nama1') }}">
                              {!! $errors->first('bsap_nama1', '<label id="bsap_nama1-error" class="error" for="bsap_nama1">:message</label>') !!}
                          </div>
                          <div class="form-group  form-show-validation {{ $errors->has('bsap_jenis1') ? 'has-error' : '' }}">
                            <label for="pendidikan_jenjang">Jenis Pasangan</label>
                              <select id="pendidikan_jenjang" class="form-control" name="bsap_jenis1">
                                <option value="">Pilih Jenis Pasangan</option>
                                <option value="Istri" {{ (old('bsap_jenis1') == 'Istri') ? 'selected' : '' }}>Istri</option>
                                <option value="Suami" {{ (old('bsap_jenis1') == 'Suami') ? 'selected' : '' }}>Suami</option>
                              </select>
                              {!! $errors->first('bsap_jenis1', '<label id="name-error" class="error" for="name">:message</label>') !!}
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-show-validation {{ $errors->has('bsap_pekerjaan1') ? 'has-error' : '' }}">
                            <label for="bsap_pekerjaan1">Pekerjaan Paasangan</label>
                              <input id="bsap_pekerjaan1" class="form-control" type="text" name="bsap_pekerjaan1" placeholder="Pekerjaan" value="{{ old('bsap_pekerjaan1') }}">
                              {!! $errors->first('bsap_pekerjaan1', '<label id="bsap_pekerjaan1-error" class="error" for="bsap_pekerjaan1">:message</label>') !!}
                          </div>
    
                          <div class="form-group form-show-validation {{ $errors->has('bsap_nomor_hp1') ? 'has-error' : '' }}">
                            <label for="bsap_nomor_hp1">Nomor Telepon/HP Paasangan</label>
                              <input id="bsap_nomor_hp1" class="form-control" type="text" name="bsap_nomor_hp1" placeholder="Nomor Telepon/HP" value="{{ old('bsap_nomor_hp1') }}">
                              {!! $errors->first('bsap_nomor_hp1', '<label id="bsap_nomor_hp1-error" class="error" for="bsap_nomor_hp1">:message</label>') !!}
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" value="next" name="simpandanlanjutkan" class="btn btn-success">Simpan</button>
                      @if (count($rows) > 0)
                        <a href="{{ route('biodata-pendidikan.create', ['biodata_pendidikan' => request()->segment(3)]) }}" class="btn btn-primary">Selanjutnya</a>
                      @endif
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                <form action="{{ route('biodata-susunan-anak.update') }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="nomor_ktp" value="{{ $dataKtp->ktp_nomor }}">
                  <h2>Biodata Susunan Anak</h2>
                  @foreach ($rows as $key =>  $row)
                  <input type="hidden" name="id[]" value="{{ $row->id }}">
                    <div>
                      <h4>Anak Ke-{{ $key+1 }}</>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group form-show-validation {{ $errors->has('bsa_nama.'.$key) ? 'has-error' : '' }}">
                            <label for="bsa_nama">Nama Lengkap <span class="text-danger">*</span></label>
                              <input id="bsa_nama" class="form-control" type="text" name="bsa_nama[]" placeholder="Nama Lengkap" value="{{ old('bsa_nama.'.$key, optional($row)->bsa_nama) }}">
                              {!! $errors->first('bsa_nama.'.$key, '<label id="bsa_nama-error" class="error" for="bsa_nama">:message</label>') !!}
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group  form-show-validation {{ $errors->has('bsa_jenis_anak.'.$key) ? 'has-error' : '' }}">
                            <label for="pendidikan_jenjang">Jenis Hubungan <span class="text-danger">*</span></label>
                              <select id="pendidikan_jenjang" class="form-control" name="bsa_jenis_anak[]">
                                <option value="">Pilih Jenis Hubungan</option>
                                <option value="Kakak" {{ (old('bsa_jenis_anak.'.$key, optional($row)->bsa_jenis_anak) == 'Kakak') ? 'selected' : '' }}>Kakak</option>
                                <option value="Saya" {{ (old('bsa_jenis_anak.'.$key, optional($row)->bsa_jenis_anak) == 'Saya') ? 'selected' : '' }}>Saya</option>
                                <option value="Adik" {{ (old('bsa_jenis_anak.'.$key, optional($row)->bsa_jenis_anak) == 'Adik') ? 'selected' : '' }}>Adik</option>
                              </select>
                              {!! $errors->first('bsa_jenis_anak.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-3">
                          <div class="form-group form-show-validation {{ $errors->has('bsa_tanggal_lahir.'.$key) ? 'has-error' : '' }}">
                            <label for="bsa_tanggal_lahir1">Tanggal Lahir <span class="text-danger">*</span></label>
                              <input id="bsa_tanggal_lahir1" class="form-control" type="date" name="bsa_tanggal_lahir[]" value="{{ old('bsa_tanggal_lahir.'.$key, optional($row)->bsa_tanggal_lahir) }}">
                              {!! $errors->first('bsa_tanggal_lahir.'.$key, '<label id="bsa_tanggal_lahir1-error" class="error" for="bsa_tanggal_lahir1">:message</label>') !!}
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group form-show-validation {{ $errors->has('bsa_pekerjaan.'.$key) ? 'has-error' : '' }}">
                            <label for="bsa_pekerjaan1">Pekerjaan <span class="text-danger">*</span></label>
                              <input id="bsa_pekerjaan1" class="form-control" type="text" name="bsa_pekerjaan[]" placeholder="Nama Pekerjaan" value="{{ old('bsa_pekerjaan.'.$key, optional($row)->bsa_pekerjaan) }}">
                              {!! $errors->first('bsa_pekerjaan.'.$key, '<label id="bsa_pekerjaan1-error" class="error" for="bsa_pekerjaan1">:message</label>') !!}
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group  form-show-validation {{ $errors->has('bsa_pendidikan.'.$key) ? 'has-error' : '' }}">
                            <label for="pendidikan_jenjang">Pendidikan Terakhir <span class="text-danger">*</span></label>
                              <select id="pendidikan_jenjang" class="form-control" name="bsa_pendidikan[]">
                                <option value="">Pilih Pendidikan Terakhir</option>
                                <option value="Belum Sekolah" {{ (old('bsa_pendidikan.'.$key, optional($row)->bsa_pendidikan) == 'Belum Sekolah') ? 'selected' : '' }}>Belum Sekolah</option>
                                <option value="Masih Sekolah" {{ (old('bsa_pendidikan.'.$key, optional($row)->bsa_pendidikan) == 'Masih Sekolah') ? 'selected' : '' }}>Masih Sekolah</option>
                                <option value="SD" {{ (old('bsa_pendidikan.'.$key, optional($row)->bsa_pendidikan) == 'SD') ? 'selected' : '' }}>SD</option>
                                <option value="SMP/MTS" {{ (old('bsa_pendidikan.'.$key, optional($row)->bsa_pendidikan) == 'SMP/MTS') ? 'selected' : '' }}>SMP/MTS</option>
                                <option value="SMA/SMK/MA" {{ (old('bsa_pendidikan.'.$key, optional($row)->bsa_pendidikan) == 'SMA/SMK/MA') ? 'selected' : '' }}>SMA/SMK/MA</option>
                                <option value="D1" {{ (old('bsa_pendidikan.'.$key, optional($row)->bsa_pendidikan) == 'D1') ? 'selected' : '' }}>D1</option>
                                <option value="D2" {{ (old('bsa_pendidikan.'.$key, optional($row)->bsa_pendidikan) == 'D2') ? 'selected' : '' }}>D2</option>
                                <option value="D3" {{ (old('bsa_pendidikan.'.$key, optional($row)->bsa_pendidikan) == 'D3') ? 'selected' : '' }}>D3</option>
                                <option value="D4" {{ (old('bsa_pendidikan.'.$key, optional($row)->bsa_pendidikan) == 'D4') ? 'selected' : '' }}>D4</option>
                                <option value="S1" {{ (old('bsa_pendidikan.'.$key, optional($row)->bsa_pendidikan) == 'S1') ? 'selected' : '' }}>S1</option>
                                <option value="S2" {{ (old('bsa_pendidikan.'.$key, optional($row)->bsa_pendidikan) == 'S2') ? 'selected' : '' }}>S2</option>
                                <option value="S3" {{ (old('bsa_pendidikan.'.$key, optional($row)->bsa_pendidikan) == 'S3') ? 'selected' : '' }}>S3</option>
                              </select>
                              {!! $errors->first('bsa_pendidikan.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                          </div>
                        </div>
                        <div class="col-md-3">
                          <div class="form-group form-show-validation {{ $errors->has('bsa_nomor_hp.'.$key) ? 'has-error' : '' }}">
                            <label for="bsa_nomor_hp1">Nomor Telepon/HP <span class="text-danger">*</span></label>
                              <input id="bsa_nomor_hp1" class="form-control" type="text" name="bsa_nomor_hp[]" placeholder="Nomor Telepon/HP" value="{{ old('bsa_nomor_hp.'.$key, optional($row)->bsa_nomor_hp) }}">
                              {!! $errors->first('bsa_nomor_hp.'.$key, '<label id="bsa_nomor_hp1-error" class="error" for="bsa_nomor_hp1">:message</label>') !!}
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="form-group form-show-validation {{ $errors->has('bsa_alamat.'.$key) ? 'has-error' : '' }}">
                            <label for="bsa_alamat1">Alamat <span class="text-danger">*</span></label>
                              <input id="bsa_alamat1" class="form-control" type="text" name="bsa_alamat[]" placeholder="Alamat" value="{{ old('bsa_alamat.'.$key, optional($row)->bsa_alamat) }}">
                              {!! $errors->first('bsa_alamat.'.$key, '<label id="bsa_alamat1-error" class="error" for="bsa_alamat1">:message</label>') !!}
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group  form-show-validation {{ $errors->has('bsa_perkawinan.'.$key) ? 'has-error' : '' }}">
                            <label for="bsa_perkawinan1">Status Perkawinan <span class="text-danger">*</span></label>
                              <select id="bsa_perkawinan1" class="form-control" onchange="return statusPerkawinan(this.value, {{$row->id}})" name="bsa_perkawinan[]">
                                <option value="">Pilih Status Perkawinan</option>
                                <option value="Kawin" {{ (old('bsa_perkawinan.'.$key, optional($row)->bsa_perkawinan) == 'Kawin') ? 'selected' : '' }}>Kawin</option>
                                <option value="Lajang" {{ (old('bsa_perkawinan.'.$key, optional($row)->bsa_perkawinan) == 'Lajang') ? 'selected' : '' }}>Lajang</option>
                              </select>
                              {!! $errors->first('bsa_perkawinan.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                          </div>
                        </div>
                      </div>
                      <div id="pasangan-{{$row->id}}" class="border-top {{ (old('bsa_perkawinan.'.$key, optional($row)->bsa_perkawinan) == 'Lajang') ? 'd-none' : '' }}">
                        <h3>Data Pasangan</h3>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group form-show-validation {{ $errors->has('bsap_nama.'.$key) ? 'has-error' : '' }}">
                              <label for="bsap_nama1">Nama Lengkap Pasangan</label>
                                <input id="bsap_nama1" class="form-control" type="text" name="bsap_nama[]" placeholder="Nama Lengkap Pasangan" value="{{ old('bsap_nama.'.$key, optional($row)->bsap_nama) }}">
                                {!! $errors->first('bsap_nama.'.$key, '<label id="bsap_nama1-error" class="error" for="bsap_nama1">:message</label>') !!}
                            </div>
                            <div class="form-group  form-show-validation {{ $errors->has('bsap_jenis.'.$key) ? 'has-error' : '' }}">
                              <label for="pendidikan_jenjang">Jenis Pasangan</label>
                                <select id="pendidikan_jenjang" class="form-control" name="bsap_jenis[]">
                                  <option value="">Pilih Jenis Pasangan</option>
                                  <option value="Istri" {{ (old('bsap_jenis.'.$key, optional($row)->bsap_jenis) == 'Istri') ? 'selected' : '' }}>Istri</option>
                                  <option value="Suami" {{ (old('bsap_jenis.'.$key, optional($row)->bsap_jenis) == 'Suami') ? 'selected' : '' }}>Suami</option>
                                </select>
                                {!! $errors->first('bsap_jenis.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group form-show-validation {{ $errors->has('bsap_pekerjaan.'.$key) ? 'has-error' : '' }}">
                              <label for="bsap_pekerjaan1">Pekerjaan Pasangan</label>
                                <input id="bsap_pekerjaan1" class="form-control" type="text" name="bsap_pekerjaan[]" placeholder="Pekerjaan" value="{{ old('bsap_pekerjaan.'.$key, optional($row)->bsap_pekerjaan) }}">
                                {!! $errors->first('bsap_pekerjaan.'.$key, '<label id="bsap_pekerjaan1-error" class="error" for="bsap_pekerjaan1">:message</label>') !!}
                            </div>
      
                            <div class="form-group form-show-validation {{ $errors->has('bsap_nomor_hp.'.$key) ? 'has-error' : '' }}">
                              <label for="bsap_nomor_hp1">Nomor Telepon/HP Paasangan</label>
                                <input id="bsap_nomor_hp1" class="form-control" type="text" name="bsap_nomor_hp[]" placeholder="Nomor Telepon/HP" value="{{ old('bsap_nomor_hp.'.$key, optional($row)->bsap_nomor_hp) }}">
                                {!! $errors->first('bsap_nomor_hp.'.$key, '<label id="bsap_nomor_hp1-error" class="error" for="bsap_nomor_hp1">:message</label>') !!}
                            </div>
                          </div>
                        </div>
                      </div>
                      <hr>
                    </div>
                  @endforeach
                  <div class="col-md-12">
                    <button type="submit" value="next" name="simpandanlanjutkan" class="btn btn-primary">Update</button>
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
    function statusPerkawinan(value, type) {
      const dataPasangan = document.getElementById('pasangan-'+type)
      value === 'Kawin' ? dataPasangan.classList.remove('d-none') : dataPasangan.classList.add('d-none')
    }
  </script>
@endpush