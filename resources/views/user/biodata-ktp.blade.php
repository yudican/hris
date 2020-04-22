@extends('layouts.admin')

@section('active-menu', 'active')

@section('content')
  <div class="container">
    <div class="panel-header bg-primary-gradient">
      <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          <div>
            <h2 class="text-white pb-2 fw-bold">{{ $title }}</h2>
            <h5 class="text-white op-7 mb-2">Selamat Datang {{ auth()->user()->name }} Silahkan input data diri anda.</h5>
          </div>
          {{-- <div class="ml-md-auto py-2 py-md-0">
            <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
            <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
          </div> --}}
        </div>
      </div>
    </div>
    <div class="page-inner mt--5">
      <div class="card">
        <div class="card-body">
          <form action="{{ $action }}" method="POST">
            @csrf
            {{ method_field($method) }}
            <div class="row">
              <div class="col-md-6 col-sm-12 col-12">
                <div class="form-group form-show-validation {{ $errors->has('ktp_nomor') ? 'has-error' : '' }}">
                  <label for="ktp_nomor">Nomor KTP/NIK</label>
                  <input id="ktp_nomor" class="form-control" type="text" value="{{ old('ktp_nomor', optional($row)->ktp_nomor) }}" name="ktp_nomor" placeholder="Masukkan Nomor Ktp">
                  {!! $errors->first('ktp_nomor', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('ktp_nama') ? 'has-error' : '' }}">
                  <label for="ktp_nama">Nama Lengkap</label>
                  <input id="ktp_nama" class="form-control" type="text" value="{{ old('ktp_nama', optional($row)->ktp_nama) }}" name="ktp_nama" placeholder="Masukkan Nama Lengkap">
                  {!! $errors->first('ktp_nama', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('ktp_tmp_lahir') ? 'has-error' : '' }}">
                  <label for="ktp_tmp_lahir">Tempat Lahir</label>
                  <input id="ktp_tmp_lahir" class="form-control" type="text" value="{{ old('ktp_tmp_lahir', optional($row)->ktp_tmp_lahir) }}" name="ktp_tmp_lahir" placeholder="Masukkan Tempat Lahir">
                  {!! $errors->first('ktp_tmp_lahir', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('ktp_tgl_lahir') ? 'has-error' : '' }}">
                  <label for="ktp_tgl_lahir">Tanggal Lahir</label>
                  <input id="ktp_tgl_lahir" class="form-control" type="text" value="{{ old('ktp_tgl_lahir', optional($row)->ktp_tgl_lahir) }}" name="ktp_tgl_lahir" placeholder="Masukkan Tanggal Lahir">
                  {!! $errors->first('ktp_tgl_lahir', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('ktp_gender') ? 'has-error' : '' }}">
                  <label for="ktp_gender">Jenis Kelamin</label>
                  <select name="ktp_gender" id="ktp_gender" class="form-control">
                    <option value="Laki-Laki" {{ (old('ktp_gender', optional($row)->ktp_gender) == 'Laki-Laki') ? 'Laki-Laki' : '' }}>Laki-Laki</option>
                    <option value="Perempuan" {{ (old('ktp_gender', optional($row)->ktp_gender) == 'Perempuan') ? 'Perempuan' : '' }}>Perempuan</option>
                  </select>
                  {!! $errors->first('ktp_gender', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('ktp_gol') ? 'has-error' : '' }}">
                  <label for="ktp_gol">Golongan Darah</label>
                  <input id="ktp_gol" class="form-control" type="text" value="{{ old('ktp_gol', optional($row)->ktp_gol) }}" name="ktp_gol" placeholder="Masukkan Golongan Darah">
                  {!! $errors->first('ktp_gol', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('ktp_agama') ? 'has-error' : '' }}">
                  <label for="ktp_agama">Agama</label>
                  <select name="ktp_agama" id="ktp_agama" class="form-control">
                    <option value="">Pilih Agama</option>
                    <option value="Islam" {{ (old('ktp_agama', optional($row)->ktp_agama) == 'Islam') ? 'Islam' : '' }}>Islam</option>
                    <option value="Kristen" {{ (old('ktp_agama', optional($row)->ktp_agama) == 'Kristen') ? 'Kristen' : '' }}>Kristen</option>
                    <option value="Protestan" {{ (old('ktp_agama', optional($row)->ktp_agama) == 'Protestan') ? 'Protestan' : '' }}>Protestan</option>
                    <option value="Hindu" {{ (old('ktp_agama', optional($row)->ktp_agama) == 'Hindu') ? 'Hindu' : '' }}>Hindu</option>
                    <option value="Budha" {{ (old('ktp_agama', optional($row)->ktp_agama) == 'Budha') ? 'Budha' : '' }}>Budha</option>
                  </select>
                  {!! $errors->first('ktp_agama', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('ktp_pekerjaan') ? 'has-error' : '' }}">
                  <label for="ktp_pekerjaan">Status Pekerjaan</label>
                  <input id="ktp_pekerjaan" class="form-control" type="text" value="{{ old('ktp_pekerjaan', optional($row)->ktp_pekerjaan) }}" name="ktp_pekerjaan" placeholder="Masukkan Pekrjaan">
                  {!! $errors->first('ktp_pekerjaan', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>
              <div class="col-md-6 col-sm-12 col-12">
                <div class="form-group form-show-validation {{ $errors->has('ktp_alamat') ? 'has-error' : '' }}">
                  <label for="ktp_alamat">Alamat Ktp</label>
                  <input id="ktp_alamat" class="form-control" type="text" value="{{ old('ktp_alamat', optional($row)->ktp_alamat) }}" name="ktp_alamat" placeholder="Masukkan Alamat">
                  {!! $errors->first('ktp_alamat', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <div class="form-group form-show-validation {{ $errors->has('ktp_rt') ? 'has-error' : '' }}">
                      <label for="ktp_rt">RT</label>
                      <input id="ktp_rt" class="form-control" type="text" name="ktp_rt" placeholder="RT" value="{{ old('ktp_rt', optional($row)->ktp_rt) }}">
                      {!! $errors->first('ktp_rt', '<label id="name-error" class="error" for="name">:message</label>') !!}
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <div class="form-group form-show-validation {{ $errors->has('ktp_rw') ? 'has-error' : '' }}">
                      <label for="ktp_rw">RW</label>
                      <input id="ktp_rw" class="form-control" type="text" name="ktp_rw" placeholder="RW" value="{{ old('ktp_rw', optional($row)->ktp_rw) }}">
                      {!! $errors->first('ktp_rw', '<label id="name-error" class="error" for="name">:message</label>') !!}
                    </div>
                  </div>
                </div>
                <div class="form-group form-show-validation {{ $errors->has('ktp_propinsi') ? 'has-error' : '' }}">
                  <label for="ktp_propinsi">Provinsi</label>
                  <select name="ktp_propinsi" class="form-control" id="ktp_propinsi" onchange="getAlamat(this.value, 'kabupaten', 'city')">
                    <option value="">Pilih Provinsi</option>
                    @foreach ($provinces as $province)
                      <option value="{{ $province->province_name }}" {{ (old('ktp_propinsi', optional($row)->ktp_propinsi) == $province->province_name) ? 'selected' : '' }}>{{ $province->province_name }} </option>
                    @endforeach
                  </select>
                  {!! $errors->first('ktp_propinsi', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('ktp_kabupaten') ? 'has-error' : '' }}">
                  <label for="ktp_kabupaten">Kabupaten</label>
                  <select name="ktp_kabupaten" class="form-control" id="ktp_kabupaten" onchange="getAlamat(this.value, 'kecamatan', 'sub_district')">
                    <option value="">Pilih Kabupaten</option>
                    @if (old('ktp_kabupaten', optional($row)->ktp_kabupaten))
                    <option value="{{ old('ktp_kabupaten', optional($row)->ktp_kabupaten) }}" selected>{{ old('ktp_kabupaten', optional($row)->ktp_kabupaten) }}</option>
                    @endif
                  </select>
                  {!! $errors->first('ktp_kabupaten', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('ktp_kecamatan') ? 'has-error' : '' }}">
                  <label for="ktp_kecamatan">Kecamatan</label>
                  <select name="ktp_kecamatan" class="form-control" id="ktp_kecamatan" onchange="getAlamat(this.value, 'kelurahan', 'urban')">
                    <option value="">Pilih Kecamatan</option>
                    @if (old('ktp_kecamatan', optional($row)->ktp_kecamatan))
                    <option value="{{ old('ktp_kecamatan', optional($row)->ktp_kecamatan) }}" selected>{{ old('ktp_kecamatan', optional($row)->ktp_kecamatan) }}</option>
                    @endif
                  </select>
                  {!! $errors->first('ktp_kecamatan', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('ktp_kelurahan') ? 'has-error' : '' }}">
                  <label for="ktp_kelurahan">Kelurahan</label>
                  <select name="ktp_kelurahan" class="form-control" id="ktp_kelurahan">
                    <option value="">Pilih Kelurahan</option>
                    @if (old('ktp_kelurahan', optional($row)->ktp_kelurahan))
                    <option value="{{ old('ktp_kelurahan', optional($row)->ktp_kelurahan) }}" selected>{{ old('ktp_kelurahan', optional($row)->ktp_kelurahan) }}</option>
                    @endif
                  </select>
                  {!! $errors->first('ktp_kelurahan', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('ktp_kewarganegaraan') ? 'has-error' : '' }}">
                  <label for="ktp_kewarganegaraan">Kewarganegaraan</label>
                  <select name="ktp_kewarganegaraan" id="ktp_kewarganegaraan" class="form-control">
                    <option value="WNI" {{ (old('ktp_kewarganegaraan', optional($row)->ktp_kewarganegaraan) == 'WNI') ? 'WNI' : '' }}>WNI</option>
                    <option value="WNA" {{ (old('ktp_kewarganegaraan', optional($row)->ktp_kewarganegaraan) == 'WNA') ? 'WNA' : '' }}>WNA</option>
                  </select>
                  {!! $errors->first('ktp_kewarganegaraan', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
                <div class="form-group form-show-validation {{ $errors->has('ktp_perkawinan') ? 'has-error' : '' }}">
                  <label for="ktp_perkawinan">Status Perkawinan</label>
                  <select name="ktp_perkawinan" id="ktp_perkawinan" class="form-control">
                    <option value="">Pilih Status Perkawinan</option>
                    <option value="Kawin" {{ (old('ktp_perkawinan', optional($row)->ktp_perkawinan) == 'Kawin') ? 'Kawin' : '' }}>Kawin</option>
                    <option value="Belum Kawin" {{ (old('ktp_perkawinan', optional($row)->ktp_perkawinan) == 'Belum Kawin') ? 'Belum Kawin' : '' }}>Belum Kawin</option>
                  </select>
                  {!! $errors->first('ktp_perkawinan', '<label id="name-error" class="error" for="name">:message</label>') !!}
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
  <script src="{{ asset('assets/server/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
  <script>
    function getAlamat(params, type, column) {
        $('#ktp_'+type).html(`<option value="">Pilih ${type.toLowerCase()}</option>`)
        resetForm(type)
        fetch(`http://localhost:8000/${type}/${btoa(params)}`, {
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
            $('#ktp_'+type).append(`<option value="${row}">${row}</option>`)
          }
        });
      }

      function resetForm(type) {
        switch (type) {
          case 'kabupaten':
            $('#ktp_kecamatan').html(`<option value="">Pilih Kecamatan</option>`)
            $('#ktp_kelurahan').html(`<option value="">Pilih Kelurahan</option>`)
          case 'kecamatan':
            $('#ktp_kelurahan').html(`<option value="">Pilih Kelurahan</option>`)
          default:
            break;
        }
      }

      $('#ktp_tgl_lahir').datetimepicker({
        format: 'YYYY-MM-DD',
      });
  </script>
@endpush
