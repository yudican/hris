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
                        <div class="form-group  form-show-validation {{ $errors->has('pendidikan_jenjang1') ? 'has-error' : '' }}">
                          <label for="pendidikan_jenjang">Jenis Pendidikan</label>
                            <select id="pendidikan_jenjang" class="form-control" name="pendidikan_jenjang1">
                              <option value="">Pilih Jenis Pendidikan</option>
                              <option value="SD" {{ (old('pendidikan_jenjang1') == 'SD') ? 'selected' : '' }}>SD</option>
                              <option value="SMP/MTS" {{ (old('pendidikan_jenjang1') == 'SMP/MTS') ? 'selected' : '' }}>SMP/MTS</option>
                              <option value="SMA/SMK/MA" {{ (old('pendidikan_jenjang1') == 'SMA/SMK/MA') ? 'selected' : '' }}>SMA/SMK/MA</option>
                              <option value="D1" {{ (old('pendidikan_jenjang1') == 'D1') ? 'selected' : '' }}>D1</option>
                              <option value="D2" {{ (old('pendidikan_jenjang1') == 'D2') ? 'selected' : '' }}>D2</option>
                              <option value="D3" {{ (old('pendidikan_jenjang1') == 'D3') ? 'selected' : '' }}>D3</option>
                              <option value="D4" {{ (old('pendidikan_jenjang1') == 'D4') ? 'selected' : '' }}>D4</option>
                              <option value="S1" {{ (old('pendidikan_jenjang1') == 'S1') ? 'selected' : '' }}>S1</option>
                              <option value="S2" {{ (old('pendidikan_jenjang1') == 'S2') ? 'selected' : '' }}>S2</option>
                              <option value="S3" {{ (old('pendidikan_jenjang1') == 'S3') ? 'selected' : '' }}>S3</option>
                            </select>
                            {!! $errors->first('pendidikan_jenjang1', '<label id="name-error" class="error" for="name">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('pendidikan_nama1') ? 'has-error' : '' }}">
                          <label for="pendidikan_nama1">Nama Institusi</label>
                            <input id="pendidikan_nama1" class="form-control" type="text" name="pendidikan_nama1" placeholder="Nama Institusi" value="{{ old('pendidikan_nama1') }}">
                            {!! $errors->first('pendidikan_nama1', '<label id="pendidikan_nama1-error" class="error" for="pendidikan_nama1">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('pendidikan_jurusan1') ? 'has-error' : '' }}">
                          <label for="pendidikan_jurusan1">Jurusan</label>
                            <input id="pendidikan_jurusan1" class="form-control" type="text" name="pendidikan_jurusan1" placeholder="Nama Jurusan" value="{{ old('pendidikan_jurusan1') }}">
                            {!! $errors->first('pendidikan_jurusan1', '<label id="pendidikan_jurusan1-error" class="error" for="pendidikan_jurusan1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-show-validation {{ $errors->has('pendidikan_kota1') ? 'has-error' : '' }}">
                          <label for="pendidikan_kota1">Kota Tempat Pendidikan</label>
                            <input id="pendidikan_kota1" class="form-control" type="text" name="pendidikan_kota1" placeholder="Nama Kota Tempat Pendidikan" value="{{ old('pendidikan_kota1') }}">
                            {!! $errors->first('pendidikan_kota1', '<label id="pendidikan_kota1-error" class="error" for="pendidikan_kota1">:message</label>') !!}
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group form-show-validation {{ $errors->has('pendidikan_mulai1') ? 'has-error' : '' }}">
                              <label for="pendidikan_mulai1">Tahun Mulai</label>
                                <input id="pendidikan_mulai1" class="form-control" type="text" name="pendidikan_mulai1" placeholder="2010" maxlength="4" value="{{ old('pendidikan_mulai1') }}">
                                {!! $errors->first('pendidikan_mulai1', '<label id="pendidikan_mulai1-error" class="error" for="pendidikan_mulai1">:message</label>') !!}
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group form-show-validation {{ $errors->has('pendidikan_lulus1') ? 'has-error' : '' }}">
                              <label for="pendidikan_lulus1">Tahun Selesai</label>
                                <input id="pendidikan_lulus1" class="form-control" type="text" name="pendidikan_lulus1" placeholder="2014" maxlength="4" value="{{ old('pendidikan_lulus1') }}">
                                {!! $errors->first('pendidikan_lulus1', '<label id="pendidikan_lulus1-error" class="error" for="pendidikan_lulus1">:message</label>') !!}
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group form-show-validation {{ $errors->has('pendidikan_fakultas1') ? 'has-error' : '' }}">
                              <label for="pendidikan_fakultas1">Fakultas Pendidikan</label>
                                <input id="pendidikan_fakultas1" class="form-control" type="text" name="pendidikan_fakultas1" placeholder="Nama Fakulltas" value="{{ old('pendidikan_fakultas1') }}">
                                {!! $errors->first('pendidikan_fakultas1', '<label id="pendidikan_fakultas1-error" class="error" for="pendidikan_fakultas1">:message</label>') !!}
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group form-show-validation {{ $errors->has('pendidikan_ipk1') ? 'has-error' : '' }}">
                              <label for="pendidikan_ipk1">IPK</label>
                                <input id="pendidikan_ipk1" class="form-control" type="text" name="pendidikan_ipk1" placeholder="Jumlah IPK" value="{{ old('pendidikan_ipk1') }}">
                                {!! $errors->first('pendidikan_ipk1', '<label id="pendidikan_ipk1-error" class="error" for="pendidikan_ipk1">:message</label>') !!}
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" value="next" name="simpandanlanjutkan" class="btn btn-success">Simpan</button>
                      @if (count($rows) > 0)
                        <a href="{{ route('biodata-pengalaman-kerja.create', ['biodata_pengalaman_kerja' => request()->segment(3)]) }}" class="btn btn-primary">Selanjutnya</a>
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
                <form action="{{ route('biodata-pendidikan.update') }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="nomor_ktp" value="{{ $dataKtp->ktp_nomor }}">
                  <h2>Riwayat Pendidikan</h2>
                  @foreach ($rows as $key => $row)
                  <input type="hidden" name="id[]" value="{{ $row->id }}">
                  <div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group  form-show-validation {{ $errors->has('pendidikan_jenjang.'.$key) ? 'has-error' : '' }}">
                          <label for="pendidikan_jenjang">Jenis Pendidikan</label>
                            <select id="pendidikan_jenjang" class="form-control" name="pendidikan_jenjang[]">
                              <option value="">Pilih Jenis Pendidikan</option>
                              <option value="SD" {{ (old('pendidikan_jenjang.'.$key, optional($row)->pendidikan_jenjang) == 'SD') ? 'selected' : '' }}>SD</option>
                              <option value="SMP/MTS" {{ (old('pendidikan_jenjang.'.$key, optional($row)->pendidikan_jenjang) == 'SMP/MTS') ? 'selected' : '' }}>SMP/MTS</option>
                              <option value="SMA/SMK/MA" {{ (old('pendidikan_jenjang.'.$key, optional($row)->pendidikan_jenjang) == 'SMA/SMK/MA') ? 'selected' : '' }}>SMA/SMK/MA</option>
                              <option value="D1" {{ (old('pendidikan_jenjang.'.$key, optional($row)->pendidikan_jenjang) == 'D1') ? 'selected' : '' }}>D1</option>
                              <option value="D2" {{ (old('pendidikan_jenjang.'.$key, optional($row)->pendidikan_jenjang) == 'D2') ? 'selected' : '' }}>D2</option>
                              <option value="D3" {{ (old('pendidikan_jenjang.'.$key, optional($row)->pendidikan_jenjang) == 'D3') ? 'selected' : '' }}>D3</option>
                              <option value="D4" {{ (old('pendidikan_jenjang.'.$key, optional($row)->pendidikan_jenjang) == 'D4') ? 'selected' : '' }}>D4</option>
                              <option value="S1" {{ (old('pendidikan_jenjang.'.$key, optional($row)->pendidikan_jenjang) == 'S1') ? 'selected' : '' }}>S1</option>
                              <option value="S2" {{ (old('pendidikan_jenjang.'.$key, optional($row)->pendidikan_jenjang) == 'S2') ? 'selected' : '' }}>S2</option>
                              <option value="S3" {{ (old('pendidikan_jenjang.'.$key, optional($row)->pendidikan_jenjang) == 'S3') ? 'selected' : '' }}>S3</option>
                            </select>
                            {!! $errors->first('pendidikan_jenjang.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('pendidikan_nama.'.$key) ? 'has-error' : '' }}">
                          <label for="pendidikan_nama1">Nama Institusi</label>
                            <input id="pendidikan_nama1" class="form-control" type="text" name="pendidikan_nama[]" placeholder="Nama Institusi" value="{{ old('pendidikan_nama.'.$key, optional($row)->pendidikan_nama) }}">
                            {!! $errors->first('pendidikan_nama.'.$key, '<label id="pendidikan_nama1-error" class="error" for="pendidikan_nama1">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('pendidikan_jurusan.'.$key) ? 'has-error' : '' }}">
                          <label for="pendidikan_jurusan1">Jurusan</label>
                            <input id="pendidikan_jurusan1" class="form-control" type="text" name="pendidikan_jurusan[]" placeholder="Nama Jurusan" value="{{ old('pendidikan_jurusan.'.$key, optional($row)->pendidikan_jurusan) }}">
                            {!! $errors->first('pendidikan_jurusan.'.$key, '<label id="pendidikan_jurusan1-error" class="error" for="pendidikan_jurusan1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-show-validation {{ $errors->has('pendidikan_kota.'.$key) ? 'has-error' : '' }}">
                          <label for="pendidikan_kota1">Kota Tempat Pendidikan</label>
                            <input id="pendidikan_kota1" class="form-control" type="text" name="pendidikan_kota[]" placeholder="Nama Kota Tempat Pendidikan" value="{{ old('pendidikan_kota.'.$key, optional($row)->pendidikan_kota) }}">
                            {!! $errors->first('pendidikan_kota.'.$key, '<label id="pendidikan_kota1-error" class="error" for="pendidikan_kota1">:message</label>') !!}
                        </div>
                        <div class="row">
                          <div class="col-md-6">
                            <div class="form-group form-show-validation {{ $errors->has('pendidikan_mulai.'.$key) ? 'has-error' : '' }}">
                              <label for="pendidikan_mulai1">Tahun Mulai</label>
                                <input id="pendidikan_mulai1" class="form-control" type="text" name="pendidikan_mulai[]" placeholder="2010" maxlength="4" value="{{ old('pendidikan_mulai.'.$key, optional($row)->pendidikan_mulai) }}">
                                {!! $errors->first('pendidikan_mulai.'.$key, '<label id="pendidikan_mulai1-error" class="error" for="pendidikan_mulai1">:message</label>') !!}
                            </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group form-show-validation {{ $errors->has('pendidikan_lulus.'.$key) ? 'has-error' : '' }}">
                              <label for="pendidikan_lulus1">Tahun Selesai</label>
                                <input id="pendidikan_lulus1" class="form-control" type="text" name="pendidikan_lulus[]" placeholder="2014" maxlength="4" value="{{ old('pendidikan_lulus.'.$key, optional($row)->pendidikan_lulus) }}">
                                {!! $errors->first('pendidikan_lulus.'.$key, '<label id="pendidikan_lulus1-error" class="error" for="pendidikan_lulus1">:message</label>') !!}
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-md-8">
                            <div class="form-group form-show-validation {{ $errors->has('pendidikan_fakultas.'.$key) ? 'has-error' : '' }}">
                              <label for="pendidikan_fakultas1">Fakultas Pendidikan</label>
                                <input id="pendidikan_fakultas1" class="form-control" type="text" name="pendidikan_fakultas[]" placeholder="Nama Fakulltas" value="{{ old('pendidikan_fakultas.'.$key, optional($row)->pendidikan_fakultas) }}">
                                {!! $errors->first('pendidikan_fakultas.'.$key, '<label id="pendidikan_fakultas1-error" class="error" for="pendidikan_fakultas1">:message</label>') !!}
                            </div>
                          </div>
                          <div class="col-md-4">
                            <div class="form-group form-show-validation {{ $errors->has('pendidikan_ipk.'.$key) ? 'has-error' : '' }}">
                              <label for="pendidikan_ipk1">IPK</label>
                                <input id="pendidikan_ipk1" class="form-control" type="text" name="pendidikan_ipk[]" placeholder="Jumlah IPK" value="{{ old('pendidikan_ipk.'.$key, optional($row)->pendidikan_ipk) }}">
                                {!! $errors->first('pendidikan_ipk.'.$key, '<label id="pendidikan_ipk1-error" class="error" for="pendidikan_ipk1">:message</label>') !!}
                            </div>
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
  <script src="{{ asset('assets/server/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
  <script>
    $('#keluarga_tanggal_lahir1').datetimepicker({
      format: 'YYYY-MM-DD',
    });
  </script>
@endpush