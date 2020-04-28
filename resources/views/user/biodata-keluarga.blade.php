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
                <form action="{{ $action }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="POST">
                  <input type="hidden" name="nomor_ktp1" value="{{ $dataKtp->ktp_nomor }}">
                  <div>
                    
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group  form-show-validation {{ $errors->has('keluarga_jenis1') ? 'has-error' : '' }}">
                          <label for="keluarga_jenis1">Jenis Keluarga</label>
                            <select id="keluarga_jenis1" class="form-control" name="keluarga_jenis1">
                              <option value="">Pilih Jenis Keluarga</option>
                              <option value="Istri" {{ (old('keluarga_jenis1') == 'Istri') ? 'selected' : '' }}>Istri</option>
                              <option value="Anak" {{ (old('keluarga_jenis1') == 'Anak') ? 'selected' : '' }}>Anak</option>
                            </select>
                            {!! $errors->first('keluarga_jenis1', '<label id="name-error" class="error" for="name">:message</label>') !!}
                        </div>
                        <div class="form-group  form-show-validation {{ $errors->has('keluarga_gender1') ? 'has-error' : '' }}">
                          <label for="keluarga_gender1">Jenis Kelamin</label>
                          <select id="keluarga_gender1" class="form-control" name="keluarga_gender1">
                            <option value="">Pilih Jenis Kelamin</option>
                            <option value="Laki-Laki" {{ (old('keluarga_gender1') == 'Laki-Laki') ? 'selected' : '' }}>Laki-Laki</option>
                            <option value="Perempuan" {{ (old('keluarga_gender1') == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                          </select>
                          {!! $errors->first('keluarga_gender1', '<label id="keluarga_gender1-error" class="error" for="keluarga_gender">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group form-show-validation {{ $errors->has('keluarga_nama1') ? 'has-error' : '' }}">
                          <label for="keluarga_nama1">Nama Keluarga</label>
                            <input id="keluarga_nama1" class="form-control" type="text" name="keluarga_nama1" placeholder="Nama Keluarga" value="{{ old('keluarga_nama1') }}">
                            {!! $errors->first('keluarga_nama1', '<label id="keluarga_nama1-error" class="error" for="keluarga_nama1">:message</label>') !!}
                        </div>
                        <div class="form-group form-show-validation {{ $errors->has('keluarga_tanggal_lahir1') ? 'has-error' : '' }}">
                          <label for="keluarga_tanggal_lahir1">Tanggal Lahir</label>
                            <input id="keluarga_tanggal_lahir1" class="form-control" type="text" name="keluarga_tanggal_lahir1" placeholder="Tanggal kehamilan" value="{{ old('keluarga_tanggal_lahir1') }}">
                            {!! $errors->first('keluarga_tanggal_lahir1', '<label id="keluarga_tanggal_lahir1-error" class="error" for="keluarga_tanggal_lahir1">:message</label>') !!}
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <button type="submit" value="next" name="simpandanlanjutkan" class="btn btn-success">Simpan</button>
                      @if (count($rows) > 0)
                        <a href="{{ route('biodata-ortu.create', ['biodata_ortu' => request()->segment(3)]) }}" class="btn btn-primary">Selanjutnya</a>
                      @endif
                    </div>
                    <hr>
                  </div>
                </form>
                <form action="{{ route('biodata-keluarga.update') }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="nomor_ktp" value="{{ $dataKtp->ktp_nomor }}">
                  @foreach ($rows as $key => $row)
                    <input type="hidden" name="id[]" value="{{ $row->id }}">
                    <div>
                      {{-- {{ $no++ }} --}}
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group  form-show-validation {{ $errors->has('keluarga_jenis.'.$key) ? 'has-error' : '' }}">
                            <label for="keluarga_jenis">Jenis Keluarga</label>
                              <select id="keluarga_jenis" class="form-control" name="keluarga_jenis[]">
                                <option value="">Pilih Jenis Keluarga</option>
                                <option value="Istri" {{ (old('keluarga_jenis.'.$key, optional($row)->keluarga_jenis) == 'Istri') ? 'selected' : '' }}>Istri</option>
                                <option value="Anak" {{ (old('keluarga_jenis.'.$key, optional($row)->keluarga_jenis) == 'Anak') ? 'selected' : '' }}>Anak</option>
                              </select>
                              {!! $errors->first('keluarga_jenis.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                          </div>
                        
                          <div class="form-group  form-show-validation {{ $errors->has('keluarga_gender.'.$key) ? 'has-error' : '' }}">
                            <label for="keluarga_gender">Jenis Kelamin</label>
                            <select id="keluarga_gender" class="form-control" name="keluarga_gender[]">
                              <option value="">Pilih Jenis Kelamin</option>
                              <option value="Laki-Laki" {{ (old('keluarga_gender.'.$key, optional($row)->keluarga_gender) == 'Laki-Laki') ? 'selected' : '' }}>Laki-Laki</option>
                              <option value="Perempuan" {{ (old('keluarga_gender.'.$key, optional($row)->keluarga_gender) == 'Perempuan') ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            {!! $errors->first('keluarga_gender.'.$key, '<label id="keluarga_gender-error" class="error" for="keluarga_gender">:message</label>') !!}
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group form-show-validation {{ $errors->has('keluarga_nama.'.$key) ? 'has-error' : '' }}">
                            <label for="keluarga_nama">Nama Keluarga</label>
                              <input id="keluarga_nama" class="form-control" type="text" name="keluarga_nama[]" placeholder="Nama Keluarga" value="{{ old('keluarga_nama.'.$key, optional($row)->keluarga_nama) }}">
                              {!! $errors->first('keluarga_nama.'.$key, '<label id="nama-error" class="error" for="keluarga_nama">:message</label>') !!}
                          </div>
                          <div class="form-group form-show-validation {{ $errors->has('keluarga_tanggal_lahir.'.$key) ? 'has-error' : '' }}">
                            <label for="keluarga_tanggal_lahir">Tanggal Lahir</label>
                              <input id="keluarga_tanggal_lahir" class="form-control" type="text" name="keluarga_tanggal_lahir[]" placeholder="Tanggal Lahir" value="{{ old('keluarga_tanggal_lahir.'.$key, optional($row)->keluarga_tanggal_lahir) }}">
                              {!! $errors->first('keluarga_tanggal_lahir.'.$key, '<label id="keluarga_tanggal_lahir-error" class="error" for="keluarga_tanggal_lahir">:message</label>') !!}
                          </div>
                        </div>
                      </div>
                      <hr>
                    </div>
                    @endforeach
                    <div class="col-md-12">
                      <button type="submit" value="next" class="btn btn-primary">Update</button>
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