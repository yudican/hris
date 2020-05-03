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
        Silahkan masukkan keahlian yang anda miliki contoh: Ms-office, Ms-exel dll
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
                    <div class="form-group form-show-validation row {{ $errors->has('keahlian_nama1') ? 'has-error' : '' }}">
                      <label for="keahlian_nama1" class="col-sm-3 col-form-label text-right">Skill</label>
                      <div class="col-sm-9">
                        <input id="keahlian_nama1" value="{{ old('keahlian_nama1') }}" class="form-control" type="text" name="keahlian_nama1">
                        {!! $errors->first('keahlian_nama1', '<label id="name-error" class="error" for="name">:message</label>') !!}
                      </div>
                    </div>
                    <div class="form-group form-show-validation row {{ $errors->has('keahlian_nilai1') ? 'has-error' : '' }}">
                      <label for="keahlian_nilai1" class="col-sm-3 col-form-label text-right">Nilai</label>
                      <div class="col-sm-9 d-flex justify-content-center align-items-center">
                        <span>20</span>
                          <input type="hidden" name="keahlian_nilai1" id="nilai-first" value="20">
                          <input onclick="return $(this).tooltip('hide')" onmousemove="return $(this).tooltip('show')" value="20" onchange="return getRange(this.value, 'first')" id="keahlian-nilai-first" class="custom-range p-2" type="range" name="keahlian" min="20" max="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="0%">
                        <span>100</span>
                        {!! $errors->first('keahlian_nilai1', '<label id="name-error" class="error" for="name">:message</label>') !!}
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <button type="submit" value="next" name="simpandanlanjutkan" class="btn btn-success">Simpan</button>
                      {{-- @if (count($rows) > 0)
                        <a href="{{ route('biodata-pengalaman-kerja.create', ['biodata_ortu' => request()->segment(3)]) }}" class="btn btn-primary">Selanjutnya</a>
                      @endif --}}
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
                <form action="{{ route('biodata-keahlian.update') }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="nomor_ktp" value="{{ $dataKtp->ktp_nomor }}">
                  <h2>Data Keahlian</h2>
                  @foreach ($rows as $key =>  $row)
                  <input type="hidden" name="id[]" value="{{ $row->id }}">
                  <div>
                    <div class="form-group form-show-validation row {{ $errors->has('keahlian_nama.'.$key) ? 'has-error' : '' }}">
                      <label for="keahlian_nama" class="col-sm-3 col-form-label text-right">Skill</label>
                      <div class="col-sm-9">
                        <input id="keahlian_nama" value="{{ old('keahlian_nama.'.$key, optional($row)->keahlian_nama) }}" class="form-control" type="text" name="keahlian_nama[]">
                        {!! $errors->first('keahlian_nama.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                      </div>
                    </div>
                    <div class="form-group form-show-validation row {{ $errors->has('keahlian_nilai.'.$key) ? 'has-error' : '' }}">
                      <label for="keahlian_nilai1" class="col-sm-3 col-form-label text-right">Nilai</label>
                      <div class="col-sm-9 d-flex justify-content-center align-items-center">
                        <span>20</span>
                          <input type="hidden" name="keahlian_nilai[]" id="nilai-{{$row->id}}" value="{{$row->keahlian_nilai}}">
                          <input onclick="return $(this).tooltip('hide')" onmousemove="return $(this).tooltip('show')" value="{{$row->keahlian_nilai}}" onchange="return getRange(this.value, '{{$row->id}}')" id="keahlian-nilai-{{$row->id}}" class="custom-range p-2" type="range" name="keahlian" min="20" max="100" data-toggle="tooltip" data-placement="top" title="" data-original-title="{{$row->keahlian_nilai}}%">
                        <span>100</span>
                      </div>
                      {!! $errors->first('keahlian_nilai.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
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

@push('script')
  <script>
    function getRange(value, type) {
      let input = document.getElementById('keahlian-nilai-'+type)
      let nilai = document.getElementById('nilai-'+type)
      input.setAttribute('data-original-title', value+'%')
      nilai.value = value
    }
  </script>
@endpush
