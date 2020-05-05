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
        Pastikan alamat domisili anda benar.
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
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="id" value="{{ $row->id }}">
                  <div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group form-show-validation {{ $errors->has('pelamar_alamat') ? 'has-error' : '' }}">
                                <label for="pelamar_alamat">Alamat</label>
                                <input id="pelamar_alamat" class="form-control" type="text" name="pelamar_alamat" placeholder="Jl. mawar no. 10" value="{{ old('pelamar_alamat', $row->pelamar_alamat) }}">
                                {!! $errors->first('pelamar_alamat', '<label id="name-error" class="error" for="name">:message</label>') !!}
                            </div>
                            <div class="form-group form-show-validation {{ $errors->has('pelamar_provinsi') ? 'has-error' : '' }}">
                            <label for="pelamar_provinsi">Provinsi</label>
                                <select name="pelamar_provinsi" class="form-control" id="pelamar_provinsi" onchange="getAlamat(this.value, 'kabupaten', 'city')">
                                <option value="">Pilih Provinsi</option>
                                @foreach ($provinces as $province)
                                    <option value="{{ $province->province_name }}" {{ (old('pelamar_provinsi', $row->pelamar_provinsi) == $province->province_name) ? 'selected' : '' }}>{{ $province->province_name }} </option>
                                @endforeach
                                </select>
                            {!! $errors->first('pelamar_provinsi', '<label id="name-error" class="error" for="name">:message</label>') !!}
                            </div>
                            <div class="form-group form-show-validation {{ $errors->has('pelamar_kecamatan') ? 'has-error' : '' }}">
                                <label for="pelamar_kecamatan">Kecamatan</label>
                                <select name="pelamar_kecamatan" class="form-control" id="pelamar_kecamatan" onchange="getAlamat(this.value, 'kelurahan', 'urban')">
                                  <option value="">Pilih Kecamatan</option>
                                  @foreach ($districts as $distrct)
                                        <option value="{{ $distrct->sub_district }}" {{ (old('pelamar_kecamatan', $row->pelamar_kecamatan) == $distrct->sub_district) ? 'selected' : '' }}>{{ $distrct->sub_district }} </option>
                                  @endforeach
                                </select>
                                {!! $errors->first('pelamar_kecamatan', '<label id="name-error" class="error" for="name">:message</label>') !!}
                            </div>
                            <div class="form-group form-show-validation {{ $errors->has('pelamar_kodepos') ? 'has-error' : '' }}">
                                <label for="pelamar_kodepos">Kode Pos</label>
                                <select name="pelamar_kodepos" class="form-control" id="pelamar_kodepos">
                                  <option value="">Pilih Kode Pos</option>
                                    @foreach ($postalKode as $post)
                                        <option value="{{ $post->postal_code }}" {{ (old('pelamar_kodepos', $row->pelamar_kodepos) == $post->postal_code) ? 'selected' : '' }}>{{ $post->postal_code }} </option>
                                    @endforeach
                                </select>
                                {!! $errors->first('pelamar_kodepos', '<label id="name-error" class="error" for="name">:message</label>') !!}
                            </div>
                            <div class="form-group form-show-validation {{ $errors->has('pelamar_jenis_tinggal') ? 'has-error' : '' }}">
                                <label for="pelamar_jenis_tinggal">Jenis Tinggal</label>
                                <select name="pelamar_jenis_tinggal" id="pelamar_jenis_tinggal" class="form-control">
                                  <option value="">Pilih Jenis Tinggal</option>
                                  <option value="Kost" {{ (old('pelamar_jenis_tinggal', $row->pelamar_jenis_tinggal) == 'Kost') ? 'selected' : '' }}>Kost</option>
                                  <option value="Kontrak" {{ (old('pelamar_jenis_tinggal', $row->pelamar_jenis_tinggal) == 'Kontrak') ? 'selected' : '' }}>Kontrak</option>
                                  <option value="Rumah" {{ (old('pelamar_jenis_tinggal', $row->pelamar_jenis_tinggal) == 'Rumah') ? 'selected' : '' }}>Rumah</option>
                                  <option value="Apartement" {{ (old('pelamar_jenis_tinggal', $row->pelamar_jenis_tinggal) == 'Apartement') ? 'selected' : '' }}>Apartement</option>
                                </select>
                                {!! $errors->first('pelamar_jenis_tinggal', '<label id="name-error" class="error" for="name">:message</label>') !!}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group form-show-validation {{ $errors->has('pelamar_rt') ? 'has-error' : '' }}">
                                    <label for="pelamar_rt">RT</label>
                                    <input id="pelamar_rt" class="form-control" type="text" name="pelamar_rt" placeholder="RT" value="{{ old('pelamar_rt', $row->pelamar_rt) }}">
                                    {!! $errors->first('pelamar_rt', '<label id="name-error" class="error" for="name">:message</label>') !!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group form-show-validation {{ $errors->has('pelamar_rw') ? 'has-error' : '' }}">
                                    <label for="pelamar_rw">RW</label>
                                    <input id="pelamar_rw" class="form-control" type="text" name="pelamar_rw" placeholder="RW" value="{{ old('pelamar_rw', $row->pelamar_rw) }}">
                                    {!! $errors->first('pelamar_rw', '<label id="name-error" class="error" for="name">:message</label>') !!}
                                    </div>
                                </div>
                            </div>
                            <div class="form-group form-show-validation {{ $errors->has('pelamar_kabupaten') ? 'has-error' : '' }}">
                                <label for="pelamar_kabupaten">Kabupaten/Kota</label>
                                <select name="pelamar_kabupaten" class="form-control" id="pelamar_kabupaten" onchange="getAlamat(this.value, 'kecamatan', 'sub_district')">
                                    <option value="">Pilih Kabupaten</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city->city }}" {{ (old('pelamar_kabupaten', $row->pelamar_kabupaten) == $city->city) ? 'selected' : '' }}>{{ $city->city }} </option>
                                    @endforeach
                                </select>
                                {!! $errors->first('pelamar_kabupaten', '<label id="name-error" class="error" for="name">:message</label>') !!}
                            </div>
                            <div class="form-group form-show-validation {{ $errors->has('pelamar_kelurahan') ? 'has-error' : '' }}">
                              <label for="pelamar_kelurahan">Kelurahan/Desa</label>
                              <select name="pelamar_kelurahan" class="form-control" id="pelamar_kelurahan" onchange="getAlamat(this.value, 'kodepos', 'postal_code')">
                                <option value="">Pilih Kelurahan</option>
                                @foreach ($urbans as $urban)
                                    <option value="{{ $urban->urban }}" {{ (old('pelamar_kelurahan', $row->pelamar_kelurahan) == $urban->urban) ? 'selected' : '' }}>{{ $urban->urban }} </option>
                                @endforeach
                              </select>
                              {!! $errors->first('pelamar_kelurahan', '<label id="name-error" class="error" for="name">:message</label>') !!}
                            </div>
                            <div class="form-group form-show-validation {{ $errors->has('pelamar_tinggal_dengan') ? 'has-error' : '' }}">
                                <label for="pelamar_tinggal_dengan">Status Tinggal </label>
                                <select name="pelamar_tinggal_dengan" id="pelamar_tinggal_dengan" class="form-control">
                                  <option value="">Pilih Status Tinggal</option>
                                  <option value="Sendiri" {{ (old('pelamar_tinggal_dengan', $row->pelamar_tinggal_dengan) == 'Sendiri') ? 'selected' : '' }}>Sendiri</option>
                                  <option value="Teman" {{ (old('pelamar_tinggal_dengan', $row->pelamar_tinggal_dengan) == 'Teman') ? 'selected' : '' }}>Teman</option>
                                  <option value="Saudara" {{ (old('pelamar_tinggal_dengan', $row->pelamar_tinggal_dengan) == 'Saudara') ? 'selected' : '' }}>Saudara</option>
                                  <option value="Orang Tua" {{ (old('pelamar_tinggal_dengan', $row->pelamar_tinggal_dengan) == 'Orang Tua') ? 'selected' : '' }}>Orang Tua</option>
                                </select>
                                {!! $errors->first('pelamar_tinggal_dengan', '<label id="name-error" class="error" for="name">:message</label>') !!}
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

@push('script')
  <script>
    function getAlamat(params, type, column) {
        $('#pelamar_'+type).html(`<option value="">Pilih ${type.toLowerCase()}</option>`)
        resetForm(type)
        fetch(`{{ url('${type}/${btoa(params)}') }}`, {
          method: "get"
        })
        .then(res => res.json())
        .then(response => { 
          let data = {...response[0]}
        //   $('#pelamar_'+type).html(`<option value="">Pilih ${type}</option>`)
          for (var key in data) {
            var row = '';
            switch (column) {
              case 'city':
                row = data[key].city
                break;
              case 'sub_district':
                row = data[key].sub_district
                break;
              case 'urban':
                row = data[key].urban
                break;
              case 'postal_code':
                row = data[key].postal_code
                break;
            }
            
            $('#pelamar_'+type).append(`<option value="${row}">${row}</option>`)
          }
        });
      }

      function resetForm(type) {
        switch (type) {
          case 'kabupaten':
            $('#pelamar_kecamatan').html(`<option value="">Pilih Kecamatan</option>`)
            $('#pelamar_kelurahan').html(`<option value="">Pilih Kelurahan</option>`)
            $('#pelamar_kodepos').html(`<option value="">Pilih Kode Pos</option>`)
          case 'kecamatan':
            $('#pelamar_kelurahan').html(`<option value="">Pilih Kelurahan</option>`)
            $('#pelamar_kodepos').html(`<option value="">Pilih Kode Pos</option>`)
          default:
            break;
        }
      }
  </script>
@endpush