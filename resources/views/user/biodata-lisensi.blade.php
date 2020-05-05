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
        Masukkan jenis lisensi yang anda miliki
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
                    <div class="form-group form-show-validation row {{ $errors->has('bil_kategori1') ? 'has-error' : '' }}">
                      <label for="bil_kategori1" class="col-sm-3 col-form-label text-right">Kategori <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <select id="bil_kategori" class="form-control" name="bil_kategori1">
                            <option value="">Pilih Kategori</option>
                            <option value="Kendaraan" {{ (old('bil_kategori1') == 'Kendaraan') ? 'selected' : '' }}>Kendaraan</option>
                            <option value="Kesehatan" {{ (old('bil_kategori1') == 'Kesehatan') ? 'selected' : '' }}>Kesehatan</option>
                            <option value="Lainnya" {{ (old('bil_kategori1') == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                          </select>
                        {!! $errors->first('bil_kategori1', '<label id="name-error" class="error" for="name">:message</label>') !!}
                      </div>
                    </div>

                    <div class="form-group form-show-validation row {{ $errors->has('bil_jenis1') ? 'has-error' : '' }}">
                      <label for="bil_jenis1" class="col-sm-3 col-form-label text-right">Jenis <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <select id="bil_kategori" class="form-control" name="bil_jenis1">
                            <option value="">Pilih Jenis</option>
                            <option value="SIM A" {{ (old('bil_jenis1') == 'SIM A') ? 'selected' : '' }}>SIM A</option>
                            <option value="SIM B I" {{ (old('bil_jenis1') == 'SIM B I') ? 'selected' : '' }}>SIM B I</option>
                            <option value="SIM B II" {{ (old('bil_jenis1') == 'SIM B II') ? 'selected' : '' }}>SIM B II</option>
                            <option value="SIM C" {{ (old('bil_jenis1') == 'SIM C') ? 'selected' : '' }}>SIM C</option>
                            <option value="SIM D" {{ (old('bil_jenis1') == 'BPJS Kesehatan') ? 'selected' : '' }}>BPJS Kesehatan</option>
                            <option value="BPJS Kesehatan" {{ (old('bil_jenis1') == 'SIM D') ? 'selected' : '' }}>SIM D</option>
                            <option value="BPJS" {{ (old('bil_jenis1') == 'BPJS') ? 'selected' : '' }}>BPJS</option>
                            <option value="Ketenagakerjaan" {{ (old('bil_jenis1') == 'Ketenagakerjaan') ? 'selected' : '' }}>Ketenagakerjaan</option>
                            <option value="Lainnya" {{ (old('bil_jenis1') == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                          </select>
                        {!! $errors->first('bil_jenis1', '<label id="name-error" class="error" for="name">:message</label>') !!}
                      </div>
                    </div>

                    <div class="form-group form-show-validation row {{ $errors->has('bil_nomor1') ? 'has-error' : '' }}">
                        <label for="bil_nomor1" class="col-sm-3 col-form-label text-right">Nomor Lisensi <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                          <input id="bil_nomor1" class="form-control" type="text" name="bil_nomor1" placeholder="Nomor Lisensi" value="{{ old('bil_nomor1') }}">
                          {!! $errors->first('bil_nomor1', '<label id="bil_nomor1-error" class="error" for="bil_nomor1">:message</label>') !!}
                        </div>
                    </div>
                    <div class="form-group form-show-validation row">
                        <label for="bil_nomor1" class="col-sm-3 col-form-label text-right"></label>
                        <div class="col-sm-9">
                          <button type="submit" value="next" name="simpandanlanjutkan" class="btn btn-success">Simpan</button>
                          @if (count($rows) > 0)
                            <a href="{{ route('biodata-lisensi.create', ['biodata_lisensi' => request()->segment(3)]) }}" class="btn btn-primary">Selanjutnya</a>
                          @endif
                        </div>
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
                <form action="{{ route('biodata-lisensi.update') }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="nomor_ktp" value="{{ $dataKtp->ktp_nomor }}">
                  <h2>Data Lisensi</h2>
                  @foreach ($rows as $key => $row)
                  <input type="hidden" name="id[]" value="{{ $row->id }}">
                  <div>
                    <div class="form-group form-show-validation row {{ $errors->has('bil_kategori.'.$key) ? 'has-error' : '' }}">
                      <label for="bil_kategori" class="col-sm-3 col-form-label text-right">Kategori <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <select id="bil_kategori" class="form-control" name="bil_kategori[]">
                            <option value="">Pilih Kategori</option>
                            <option value="Kendaraan" {{ (old('bil_kategori.'.$key, $row->bil_kategori) == 'Kendaraan') ? 'selected' : '' }}>Kendaraan</option>
                            <option value="Kesehatan" {{ (old('bil_kategori.'.$key, $row->bil_kategori) == 'Kesehatan') ? 'selected' : '' }}>Kesehatan</option>
                            <option value="Lainnya" {{ (old('bil_kategori.'.$key, $row->bil_kategori) == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                          </select>
                        {!! $errors->first('bil_kategori.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                      </div>
                    </div>

                    <div class="form-group form-show-validation row {{ $errors->has('bil_jenis.'.$key, $row->bil_jenis) ? 'has-error' : '' }}">
                      <label for="bil_jenis" class="col-sm-3 col-form-label text-right">Jenis <span class="text-danger">*</span></label>
                      <div class="col-sm-9">
                        <select id="bil_kategori" class="form-control" name="bil_jenis[]">
                            <option value="">Pilih Jenis</option>
                            <option value="SIM A" {{ (old('bil_jenis.'.$key, $row->bil_jenis) == 'SIM A') ? 'selected' : '' }}>SIM A</option>
                            <option value="SIM B I" {{ (old('bil_jenis.'.$key, $row->bil_jenis) == 'SIM B I') ? 'selected' : '' }}>SIM B I</option>
                            <option value="SIM B II" {{ (old('bil_jenis.'.$key, $row->bil_jenis) == 'SIM B II') ? 'selected' : '' }}>SIM B II</option>
                            <option value="SIM C" {{ (old('bil_jenis.'.$key, $row->bil_jenis) == 'SIM C') ? 'selected' : '' }}>SIM C</option>
                            <option value="SIM D" {{ (old('bil_jenis.'.$key, $row->bil_jenis) == 'BPJS Kesehatan') ? 'selected' : '' }}>BPJS Kesehatan</option>
                            <option value="BPJS Kesehatan" {{ (old('bil_jenis.'.$key, $row->bil_jenis) == 'SIM D') ? 'selected' : '' }}>SIM D</option>
                            <option value="BPJS" {{ (old('bil_jenis.'.$key, $row->bil_jenis) == 'BPJS') ? 'selected' : '' }}>BPJS</option>
                            <option value="Ketenagakerjaan" {{ (old('bil_jenis.'.$key, $row->bil_jenis) == 'Ketenagakerjaan') ? 'selected' : '' }}>Ketenagakerjaan</option>
                            <option value="Lainnya" {{ (old('bil_jenis.'.$key, $row->bil_jenis) == 'Lainnya') ? 'selected' : '' }}>Lainnya</option>
                          </select>
                        {!! $errors->first('bil_jenis.'.$key, $row->bil_jenis, '<label id="name-error" class="error" for="name">:message</label>') !!}
                      </div>
                    </div>

                    <div class="form-group form-show-validation row {{ $errors->has('bil_nomor.'.$key) ? 'has-error' : '' }}">
                        <label for="bil_nomor" class="col-sm-3 col-form-label text-right">Nomor Lisensi <span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                          <input id="bil_nomor" class="form-control" type="text" name="bil_nomor[]" placeholder="Nomor Lisensi" value="{{ old('bil_nomor.'.$key, optional($row)->bil_nomor) }}">
                          {!! $errors->first('bil_nomor.'.$key, '<label id="bil_nomor-error" class="error" for="bil_nomor">:message</label>') !!}
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

