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
        Silahkan masukkan kontak yang dapat dihubungi jika dalam keadaan darurat (kecuali data keluarga yang sudah diinput)
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
                      <div class="col-md-6 pr-0">
                        <div class="form-group  form-show-validation {{ $errors->has('bd_jenis1') ? 'has-error' : '' }}">
                          <label for="pendidikan_jenjang">Jenis Kontak Darurat <span class="required-label">*</span></label>
                            <select id="pendidikan_jenjang" class="form-control" name="bd_jenis1">
                              <option value="">Pilih Jenis Kontak Darurat</option>
                              <option value="Teman" {{ (old('bd_jenis1') == 'Teman') ? 'selected' : '' }}>Teman</option>
                              <option value="Saudara" {{ (old('bd_jenis1') == 'Saudara') ? 'selected' : '' }}>Saudara</option>
                            </select>
                            {!! $errors->first('bd_jenis1', '<label id="name-error" class="error" for="name">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('bd_pekerjaan1') ? 'has-error' : '' }}">
                          <label for="bd_pekerjaan1">Pekerjaan <span class="required-label">*</span></label>
                            <input id="bd_pekerjaan1" class="form-control" type="text" name="bd_pekerjaan1" placeholder="Pekerjaan" value="{{ old('bd_pekerjaan1') }}">
                            {!! $errors->first('bd_pekerjaan1', '<label id="bd_pekerjaan1-error" class="error" for="bd_pekerjaan1">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('bd_posisi1') ? 'has-error' : '' }}">
                          <label for="bd_posisi1">Posisi</label>
                            <input id="bd_posisi1" class="form-control" type="text" name="bd_posisi1" placeholder="Di kampung" value="{{ old('bd_posisi1') }}">
                            {!! $errors->first('bd_posisi1', '<label id="bd_posisi1-error" class="error" for="bd_posisi1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-6 pl-0">
                        <div class="form-group form-show-validation {{ $errors->has('bd_nama1') ? 'has-error' : '' }}">
                          <label for="bd_nama1">Nama Kontak Darurat <span class="required-label">*</span></label>
                            <input id="bd_nama1" class="form-control" type="text" name="bd_nama1" placeholder="Nama Kontak Darurat" value="{{ old('bd_nama1') }}">
                            {!! $errors->first('bd_nama1', '<label id="bd_nama1-error" class="error" for="bd_nama1">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('bd_domisili1') ? 'has-error' : '' }}">
                          <label for="bd_domisili1">Alamat Domisili <span class="required-label">*</span></label>
                            <input id="bd_domisili1" class="form-control" type="text" name="bd_domisili1" placeholder="Alamat Domisili" value="{{ old('bd_domisili1') }}">
                            {!! $errors->first('bd_domisili1', '<label id="bd_domisili1-error" class="error" for="bd_domisili1">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('bd_telepon1') ? 'has-error' : '' }}">
                          <label for="bd_telepon1">Nomor HP/Telepon <span class="required-label">*</span></label>
                            <input id="bd_telepon1" class="form-control" type="text" name="bd_telepon1" placeholder="Nomor HP/Telepon" value="{{ old('bd_telepon1') }}">
                            {!! $errors->first('bd_telepon1', '<label id="bd_telepon1-error" class="error" for="bd_telepon1">:message</label>') !!}
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <button type="submit" value="next" name="simpandanlanjutkan" class="btn btn-success">Simpan</button>
                      @if (count($rows) > 0)
                        <a href="{{ route('biodata-keahlian.create', ['biodata_keahlian' => request()->segment(3)]) }}" class="btn btn-primary">Selanjutnya</a>
                      @endif
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
            @if (count($rows) > 0)
            <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                <form action="{{ route('biodata-darurat.update') }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="nomor_ktp" value="{{ $dataKtp->ktp_nomor }}">
                  <h2>Data Kontak Darurat</h2>
                  @foreach ($rows as $key =>  $row)
                  <input type="hidden" name="id[]" value="{{ $row->id }}">
                  <div>
                    <div class="row">
                      <div class="col-md-6 pr-0">
                        <div class="form-group  form-show-validation {{ $errors->has('bd_jenis.'.$key) ? 'has-error' : '' }}">
                          <label for="pendidikan_jenjang">Jenis Kontak Darurat <span class="required-label">*</span></label>
                            <select id="pendidikan_jenjang" class="form-control" name="bd_jenis[]">
                              <option value="">Pilih Jenis Kontak Darurat</option>
                              <option value="Teman" {{ (old('bd_jenis.'.$key, optional($row)->bd_jenis) == 'Teman') ? 'selected' : '' }}>Teman</option>
                              <option value="Saudara" {{ (old('bd_jenis.'.$key, optional($row)->bd_jenis) == 'Saudara') ? 'selected' : '' }}>Saudara</option>
                            </select>
                            {!! $errors->first('bd_jenis.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('bd_pekerjaan.'.$key) ? 'has-error' : '' }}">
                          <label for="bd_pekerjaan1">Pekerjaan <span class="required-label">*</span></label>
                            <input id="bd_pekerjaan1" class="form-control" type="text" name="bd_pekerjaan[]" placeholder="Pekerjaan" value="{{ old('bd_pekerjaan.'.$key, optional($row)->bd_pekerjaan) }}">
                            {!! $errors->first('bd_pekerjaan.'.$key, '<label id="bd_pekerjaan1-error" class="error" for="bd_pekerjaan1">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('bd_posisi.'.$key) ? 'has-error' : '' }}">
                          <label for="bd_posisi">Posisi <span class="required-label">*</span></label>
                            <input id="bd_posisi" class="form-control" type="text" name="bd_posisi[]" placeholder="Di kampung" value="{{ old('bd_posisi.'.$key, optional($row)->bd_posisi) }}">
                            {!! $errors->first('bd_posisi.'.$key, '<label id="bd_posisi-error" class="error" for="bd_posisi">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-6 pl-0">
                        <div class="form-group form-show-validation {{ $errors->has('bd_nama.'.$key) ? 'has-error' : '' }}">
                          <label for="bd_nama1">Nama Kontak Darurat <span class="required-label">*</span></label>
                            <input id="bd_nama1" class="form-control" type="text" name="bd_nama[]" placeholder="Nama Kontak Darurat" value="{{ old('bd_nama.'.$key, optional($row)->bd_nama) }}">
                            {!! $errors->first('bd_nama.'.$key, '<label id="bd_nama1-error" class="error" for="bd_nama1">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('bd_domisili.'.$key) ? 'has-error' : '' }}">
                          <label for="bd_domisili1">Alamat Domisili <span class="required-label">*</span></label>
                            <input id="bd_domisili1" class="form-control" type="text" name="bd_domisili[]" placeholder="Alamat Domisili" value="{{ old('bd_domisili.'.$key, optional($row)->bd_domisili) }}">
                            {!! $errors->first('bd_domisili.'.$key, '<label id="bd_domisili1-error" class="error" for="bd_domisili1">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('bd_telepon.'.$key) ? 'has-error' : '' }}">
                          <label for="bd_telepon1">Nomor HP/Telepon <span class="required-label">*</span></label>
                            <input id="bd_telepon1" class="form-control" type="text" name="bd_telepon[]" placeholder="Nomor HP/Telepon" value="{{ old('bd_telepon.'.$key, optional($row)->bd_telepon) }}">
                            {!! $errors->first('bd_telepon.'.$key, '<label id="bd_telepon1-error" class="error" for="bd_telepon1">:message</label>') !!}
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
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
