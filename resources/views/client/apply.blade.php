@extends('layouts.client')

@push('style')
  <style>
    .sticky-sidebar {
      position: -webkit-sticky;
      position: sticky;
      top: 20px;
    }
    .form-control {
      height: auto;
      background: #fff !important;
      font-family: "Rubik", -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
    }
    .error{
      font-size: 12px;
      color: red;
      text-transform: lowercase;
    }
    .row-flex {
        display: flex;
        flex-wrap: wrap;
    }
    [class*="col-lg-"] {
      margin-bottom: 30px;
    }

    .content {
      height: 100%;
      padding: 20px 20px 10px;
      color: #000;
    }
  </style>
@endpush

@section('content')
<div class="container">
  <div class="row justify-content-start mb-2 mt-2">
    <div class="col-lg-4 mb-2 mt-2 mb-lg-0">
      <div class="block-heading-1">
        <h4></h4>
      </div>
    </div>
  </div>
  <form action="{{ route('karir.store', ['id' => request()->segment(3)]) }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row row-flex">
      <div class="col-lg-8">
        <div class="mb-3 bg-white p-3 content">
          {{-- <a href="#" class="blog-thumbnail"><img src="{{ url('assets/client/images/cargo_air_small.jpg') }}" alt="Image" class="img-fluid"></a> --}}
          <div class="blog-excerpt">
            <h5 class="d-block mb-3">Informasi Pribadi</h3>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group form-show-validation {{ $errors->has('pelamar_nik') ? 'has-error' : '' }}">
                  <label for="pelamar_nik">Nomor NIK</label>
                  <input id="pelamar_nik" class="form-control" type="text" name="pelamar_nik" maxlength="16" placeholder="masukkan nomor NIK" value="{{ old('pelamar_nik') }}">
                  {!! $errors->first('pelamar_nik', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <h5 class="d-block mt-3">Alamat Domisili</h3>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group form-show-validation {{ $errors->has('pelamar_rt') ? 'has-error' : '' }}">
                      <label for="pelamar_rt">RT</label>
                      <input id="pelamar_rt" class="form-control" type="text" name="pelamar_rt" placeholder="RT" value="{{ old('pelamar_rt') }}">
                      {!! $errors->first('pelamar_rt', '<label id="name-error" class="error" for="name">:message</label>') !!}
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group form-show-validation {{ $errors->has('pelamar_rw') ? 'has-error' : '' }}">
                      <label for="pelamar_rw">RW</label>
                      <input id="pelamar_rw" class="form-control" type="text" name="pelamar_rw" placeholder="RW" value="{{ old('pelamar_rw') }}">
                      {!! $errors->first('pelamar_rw', '<label id="name-error" class="error" for="name">:message</label>') !!}
                    </div>
                  </div>
                </div>
                <div class="form-group form-show-validation {{ $errors->has('pelamar_kabupaten') ? 'has-error' : '' }}">
                  <label for="pelamar_kabupaten">Kabupaten/Kota</label>
                  <select name="pelamar_kabupaten" class="form-control" id="pelamar_kabupaten" onchange="getAlamat(this.value, 'kecamatan', 'sub_district')">
                    <option value="">Pilih Kabupaten</option>
                    @if (old('pelamar_kabupaten'))
                    <option value="{{ old('pelamar_kabupaten') }}" selected>{{ old('pelamar_kabupaten') }}</option>
                    @endif
                  </select>
                  {!! $errors->first('pelamar_kabupaten', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('pelamar_kelurahan') ? 'has-error' : '' }}">
                  <label for="pelamar_kelurahan">Kelurahan/Desa</label>
                  <select name="pelamar_kelurahan" class="form-control" id="pelamar_kelurahan" onchange="getAlamat(this.value, 'kodepos', 'postal_code')">
                    <option value="">Pilih Kelurahan</option>
                    @if (old('pelamar_kelurahan'))
                    <option value="{{ old('pelamar_kelurahan') }}" selected>{{ old('pelamar_kelurahan') }}</option>
                    @endif
                  </select>
                  {!! $errors->first('pelamar_kelurahan', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group form-show-validation {{ $errors->has('pelamar_nama') ? 'has-error' : '' }}">
                  <label for="pelamar_nama">Nama Lengkap</label>
                  <input id="pelamar_nama" class="form-control" type="text" name="pelamar_nama" placeholder="Jhon Doe" value="{{ old('pelamar_nama') }}">
                  {!! $errors->first('pelamar_nama', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <h5 class="d-block mt-3 text-white">Alamat Domisili</h3>
                <div class="form-group form-show-validation {{ $errors->has('pelamar_provinsi') ? 'has-error' : '' }}">
                  <label for="pelamar_provinsi">Provinsi</label>
                    <select name="pelamar_provinsi" class="form-control" id="pelamar_provinsi" onchange="getAlamat(this.value, 'kabupaten', 'city')">
                      <option value="">Pilih Provinsi</option>
                      @foreach ($provinces as $province)
                        <option value="{{ $province->province_name }}" {{ (old('pelamar_provinsi') == $province->province_name) ? 'selected' : '' }}>{{ $province->province_name }} </option>
                      @endforeach
                    </select>
                  {!! $errors->first('pelamar_provinsi', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('pelamar_kecamatan') ? 'has-error' : '' }}">
                  <label for="pelamar_kecamatan">Kecamatan</label>
                  <select name="pelamar_kecamatan" class="form-control" id="pelamar_kecamatan" onchange="getAlamat(this.value, 'kelurahan', 'urban')">
                    <option value="">Pilih Kecamatan</option>
                    @if (old('pelamar_kecamatan'))
                    <option value="{{ old('pelamar_kecamatan') }}" selected>{{ old('pelamar_kecamatan') }}</option>
                    @endif
                  </select>
                  {!! $errors->first('pelamar_kecamatan', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('pelamar_kodepos') ? 'has-error' : '' }}">
                  <label for="pelamar_kodepos">Kode Pos</label>
                  <select name="pelamar_kodepos" class="form-control" id="pelamar_kodepos">
                    <option value="">Pilih Kode Pos</option>
                    @if (old('pelamar_kodepos'))
                    <option value="{{ old('pelamar_kodepos') }}" selected>{{ old('pelamar_kodepos') }}</option>
                    @endif
                  </select>
                  {!! $errors->first('pelamar_kodepos', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>
            </div>
            <div class="form-group form-show-validation {{ $errors->has('pelamar_alamat') ? 'has-error' : '' }}">
              <label for="pelamar_alamat">Alamat</label>
              <textarea id="pelamar_alamat" rows="3" class="form-control" placeholder="Jl. Mawar No. 10" name="pelamar_alamat">{{ old('pelamar_alamat') }}</textarea>
              {!! $errors->first('pelamar_alamat', '<label id="name-error" class="error" for="name">:message</label>') !!}
            </div>
          </div>
        </div>   
      </div>
      <div class="col-lg-4">
        <div class="mb-3 bg-white p-3 content sticky-sidebar">
          <div class="blog-excerpt ">
            <h5 class="d-block mb-3">Informasi Lainya</h3>
              {{-- informasi kontak --}}
            <div class="form-group form-show-validation {{ $errors->has('pelamar_hp') ? 'has-error' : '' }}">
              <label for="pelamar_hp">Nomor Telepon/Hp</label>
              <input id="pelamar_hp" class="form-control" type="text" placeholder="082238493422" value="{{ old('pelamar_hp') }}" name="pelamar_hp">
              {!! $errors->first('pelamar_hp', '<label id="name-error" class="error" for="name">:message</label>') !!}
            </div>
            <div class="form-group form-show-validation {{ $errors->has('pelamar_email') ? 'has-error' : '' }}">
              <label for="pelamar_email">Email</label>
              <input id="pelamar_email" class="form-control" type="text" placeholder="email@gmail.com" value="{{ old('pelamar_email') }}" name="pelamar_email">
              {!! $errors->first('pelamar_email', '<label id="name-error" class="error" for="name">:message</label>') !!}
            </div>
            {{-- informasi pendidikan --}}
            <div class="form-group form-show-validation {{ $errors->has('pelamar_major') ? 'has-error' : '' }}">
              <label for="pelamar_major">Major</label>
              <select name="pelamar_major" id="pelamar_major" class="form-control">
                <option value="">Pilih Major</option>
                <option value="SD" {{ (old('pelamar_major') == 'SD') ? 'selected' : '' }}>SD</option>
                <option value="SMP" {{ (old('pelamar_major') == 'SMP') ? 'selected' : '' }}>SMP</option>
                <option value="SMA" {{ (old('pelamar_major') == 'SMA') ? 'selected' : '' }}>SMA</option>
                <option value="D1" {{ (old('pelamar_major') == 'D1') ? 'selected' : '' }}>D1</option>
                <option value="D2" {{ (old('pelamar_major') == 'D2') ? 'selected' : '' }}>D2</option>
                <option value="D3" {{ (old('pelamar_major') == 'D3') ? 'selected' : '' }}>D3</option>
                <option value="D4" {{ (old('pelamar_major') == 'D4') ? 'selected' : '' }}>D4</option>
                <option value="S1" {{ (old('pelamar_major') == 'S1') ? 'selected' : '' }}>S1</option>
                <option value="S2" {{ (old('pelamar_major') == 'S2') ? 'selected' : '' }}>S2</option>
                <option value="S3" {{ (old('pelamar_major') == 'S3') ? 'selected' : '' }}>S3</option>
              </select>
              {!! $errors->first('pelamar_major', '<label id="name-error" class="error" for="name">:message</label>') !!}
            </div>
            <div class="form-group form-show-validation {{ $errors->has('pelamar_jurusan') ? 'has-error' : '' }}">
              <label for="pelamar_jurusan">Jurusan</label>
              <input id="pelamar_jurusan" class="form-control" type="text" placeholder="Teknik Informatika" value="{{ old('pelamar_jurusan') }}" name="pelamar_jurusan">
              {!! $errors->first('pelamar_jurusan', '<label id="name-error" class="error" for="name">:message</label>') !!}
            </div>
            <div class="form-group form-show-validation {{ $errors->has('pelamar_tanggal_lahir') ? 'has-error' : '' }}">
              <label for="pelamar_tanggal_lahir">Tanggal Lahir</label>
              <input id="pelamar_tanggal_lahir" class="form-control" type="date" placeholder="Tanggal Lahir" value="{{ old('pelamar_tanggal_lahir') }}" name="pelamar_tanggal_lahir">
              {!! $errors->first('pelamar_tanggal_lahir', '<label id="name-error" class="error" for="name">:message</label>') !!}
            </div>
            {{-- informasi foto --}}
            <div class="form-group form-show-validation {{ $errors->has('pelamar_foto') ? 'has-error' : '' }}">
              <label for="pelamar_foto">Upload Foto</label>
              <i><small>max 2mb</small></i>
              <div class="custom-file">
                <input id="my-input" class="custom-file-input" type="file" name="pelamar_foto" accept="image/*">
                <label for="my-input" class="custom-file-label">Pilih Foto </label>
              </div>
              {!! $errors->first('pelamar_foto', '<label id="name-error" class="error" for="name">:message</label>') !!}
            </div>
            
            <div class="form-group">
              <label for="my-input"></label>
              <button type="submit" class="btn btn-primary text-white mb-2">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection

@push('scripts')
    <script>
      document.querySelector('.custom-file-input').addEventListener('change',function(e){
        var fileName = document.getElementById("my-input").files[0].name;
        var label = document.getElementsByClassName('custom-file-label')
        var nextSibling = e.target.nextElementSibling
        nextSibling.innerText = fileName
      })

      function getAlamat(params, type, column) {
        $('#pelamar_'+type).html(`<option value="">Pilih ${type.toLowerCase()}</option>`)
        resetForm(type)
        fetch(` http://localhost:8000/${type}/${btoa(params)}`, {
          method: "get"
        })
        .then(res => res.json())
        .then(response => { 
          let data = {...response[0]}
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
            $('#pelamar_kodepos').html(`<option value="">Pilih Kodepos</option>`)
            break;
          case 'kecamatan':
            $('#pelamar_kelurahan').html(`<option value="">Pilih Kelurahan</option>`)
            $('#pelamar_kodepos').html(`<option value="">Pilih Kodepos</option>`)
            break;
          case 'kelurahan':
            $('#pelamar_kodepos').html(`<option value="">Pilih Kodepos</option>`)
            break;
        
          default:
            break;
        }
      }
    </script>
@endpush