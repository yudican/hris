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
                  <input type="hidden" name="_method" value="{{ $method }}">
                  <input type="hidden" name="nomor_ktp" value="{{ $dataKtp->ktp_nomor }}">
                    
                    @foreach ($rows as $key => $row)
                    <input type="hidden" name="id[]" value="{{ optional($row)->id }}">
                    <div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group  form-show-validation {{ $errors->has('ortu_jenis.'.$key) ? 'has-error' : '' }}">
                            <label for="ortu_jenis">Jenis Orang Tua</label>
                              <select id="ortu_jenis" class="form-control" name="ortu_jenis[]">
                                @if ($key == 0)
                                  <option value="Ayah" {{ (old('ortu_jenis.'.$key, optional($row)->ortu_jenis) == 'Ayah') ? 'selected' : '' }}>Ayah</option>
                                  <option value="Ibu" {{ (old('ortu_jenis.'.$key, optional($row)->ortu_jenis) == 'Ibu') ? 'selected' : '' }}>Ibu</option>
                                @else
                                  <option value="Ibu" {{ (old('ortu_jenis.'.$key, optional($row)->ortu_jenis) == 'Ibu') ? 'selected' : '' }}>Ibu</option>
                                  <option value="Ayah" {{ (old('ortu_jenis.'.$key, optional($row)->ortu_jenis) == 'Ayah') ? 'selected' : '' }}>Ayah</option>
                                @endif
                              </select>
                              {!! $errors->first('ortu_jenis.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                          </div>
                        {{-- nama lengkap orang tua --}}
                          <div class="form-group form-show-validation {{ $errors->has('ortu_nama.'.$key) ? 'has-error' : '' }}">
                            <label for="ortu_nama">Nama Lengkap {{ $key == 0 ? 'Ayah' : 'Ibu' }}</label>
                              <input id="ortu_nama" class="form-control" type="text" name="ortu_nama[]" placeholder="Nama {{ $key == 0 ? 'Ayah' : 'Ibu' }}" value="{{ old('ortu_nama.'.$key, optional($row)->ortu_nama) }}">
                              {!! $errors->first('ortu_nama.'.$key, '<label id="nama-error" class="error" for="ortu_nama">:message</label>') !!}
                          </div>
                        {{-- tanggal lahir orang tua --}}
                          <div class="form-group form-show-validation {{ $errors->has('ortu_tanggal_lahir.'.$key) ? 'has-error' : '' }}">
                            <label for="ortu_tanggal_lahir">Tanggal Lahir {{ $key == 0 ? 'Ayah' : 'Ibu' }}</label>
                              <input id="ortu_tanggal_lahir" class="form-control" type="date" name="ortu_tanggal_lahir[]" placeholder="Tanggal Lahir" value="{{ old('ortu_tanggal_lahir.'.$key, optional($row)->ortu_tanggal_lahir) }}">
                              {!! $errors->first('ortu_tanggal_lahir.'.$key, '<label id="ortu_tanggal_lahir-error" class="error" for="ortu_tanggal_lahir">:message</label>') !!}
                          </div>
                        {{-- pendidikan terakhir orang tua --}}
                          <div class="form-group form-show-validation {{ $errors->has('ortu_lulusan.'.$key) ? 'has-error' : '' }}">
                            <label for="ortu_lulusan">Pendidikan terakhir {{ $key == 0 ? 'Ayah' : 'Ibu' }}</label>
                              <input id="ortu_lulusan" class="form-control" type="text" name="ortu_lulusan[]" placeholder="Pendidikan terakhir" value="{{ old('ortu_lulusan.'.$key, optional($row)->ortu_lulusan) }}">
                              {!! $errors->first('ortu_lulusan.'.$key, '<label id="ortu_lulusan-error" class="error" for="ortu_lulusan">:message</label>') !!}
                          </div>
                        {{-- bidang pekerjaan orang tua --}}
                          <div class="form-group form-show-validation {{ $errors->has('ortu_pekerjaan.'.$key) ? 'has-error' : '' }}">
                            <label for="ortu_pekerjaan">Pekerjaan {{ $key == 0 ? 'Ayah' : 'Ibu' }}</label>
                              <input id="ortu_pekerjaan" class="form-control" type="text" name="ortu_pekerjaan[]" placeholder="Pekerjaan" value="{{ old('ortu_pekerjaan.'.$key, optional($row)->ortu_pekerjaan) }}">
                              {!! $errors->first('ortu_pekerjaan.'.$key, '<label id="ortu_pekerjaan-error" class="error" for="ortu_pekerjaan">:message</label>') !!}
                          </div>
                        </div>
                        {{-- alamat orang tua --}}
                        <div class="col-md-6">
                          <div class="form-group form-show-validation {{ $errors->has('ortu_alamat.'.$key) ? 'has-error' : '' }}">
                            <label for="ortu_alamat">Alamat {{ $key == 0 ? 'Ayah' : 'Ibu' }}</label>
                              <input id="ortu_alamat" class="form-control" type="text" name="ortu_alamat[]" placeholder="Alamat" value="{{ old('ortu_alamat.'.$key, optional($row)->ortu_alamat) }}">
                              {!! $errors->first('ortu_alamat.'.$key, '<label id="ortu_alamat-error" class="error" for="ortu_alamat">:message</label>') !!}
                          </div>
                        {{-- Alamat RT/RW orang tua --}}
                          <div class="row">
                            <div class="col-sm-6">
                              <div class="form-group form-show-validation {{ $errors->has('ortu_rt.'.$key) ? 'has-error' : '' }}">
                                <label for="ortu_rt">RT</label>
                                  <input id="ortu_rt" class="form-control" type="text" name="ortu_rt[]" placeholder="RT" value="{{ old('ortu_rt.'.$key, optional($row)->ortu_rt) }}">
                                  {!! $errors->first('ortu_rt.'.$key, '<label id="ortu_rt-error" class="error" for="ortu_rt">:message</label>') !!}
                              </div>
                            </div>
                            <div class="col-sm-6">
                              <div class="form-group form-show-validation {{ $errors->has('ortu_rw.'.$key) ? 'has-error' : '' }}">
                                <label for="ortu_rw">RW</label>
                                  <input id="ortu_rw" class="form-control" type="text" name="ortu_rw[]" placeholder="RW" value="{{ old('ortu_rw.'.$key, optional($row)->ortu_rw) }}">
                                  {!! $errors->first('ortu_rw.'.$key, '<label id="ortu_rw-error" class="error" for="ortu_rw">:message</label>') !!}
                              </div>
                            </div>
                          </div>
                          {{-- provinsi --}}
                          <div class="form-group form-show-validation {{ $errors->has('ortu_propinsi.'.$key) ? 'has-error' : '' }}">
                            <label for="ortu_propinsi">Provinsi</label>
                            <select name="ortu_propinsi[]" class="form-control" id="ortu_propinsi_{{ $key == 0 ? 'Ayah' : 'Ibu' }}" onchange="getAlamat(this.value, 'kabupaten', 'city', '{{ $key == 0 ? 'Ayah' : 'Ibu' }}')">
                              <option value="">Pilih Provinsi</option>
                              @foreach ($provinces as $province)
                                <option value="{{ $province->province_name }}" {{ (old('ortu_propinsi.'.$key, optional($row)->ortu_propinsi) == $province->province_name) ? 'selected' : '' }}>{{ $province->province_name }} </option>
                              @endforeach
                            </select>
                            {!! $errors->first('ortu_propinsi.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                          </div>
                          {{-- kabupaten --}}
                          <div class="form-group form-show-validation {{ $errors->has('ortu_kabupaten.'.$key) ? 'has-error' : '' }}">
                            <label for="ortu_kabupaten">Kabupaten</label>
                            <select name="ortu_kabupaten[]" class="form-control" id="ortu_kabupaten_{{ $key == 0 ? 'Ayah' : 'Ibu' }}" onchange="getAlamat(this.value, 'kecamatan', 'sub_district', '{{ $key == 0 ? 'Ayah' : 'Ibu' }}')">
                              <option value="">Pilih Kabupaten</option>
                              @if (old('ortu_kabupaten.'.$key, optional($row)->ortu_kabupaten))
                              <option value="{{ old('ortu_kabupaten.'.$key, optional($row)->ortu_kabupaten) }}" selected>{{ old('ortu_kabupaten.'.$key, optional($row)->ortu_kabupaten) }}</option>
                              @endif
                            </select>
                            {!! $errors->first('ortu_kabupaten.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                          </div>
                          {{-- kecamatan --}}
                          <div class="form-group form-show-validation {{ $errors->has('ortu_kecamatan.'.$key) ? 'has-error' : '' }}">
                            <label for="ortu_kecamatan">Kecamatan</label>
                            <select name="ortu_kecamatan[]" class="form-control" id="ortu_kecamatan_{{ $key == 0 ? 'Ayah' : 'Ibu' }}" onchange="getAlamat(this.value, 'kelurahan', 'urban', '{{ $key == 0 ? 'Ayah' : 'Ibu' }}')">
                              <option value="">Pilih Kecamatan</option>
                              @if (old('ortu_kecamatan.'.$key, optional($row)->ortu_kecamatan))
                              <option value="{{ old('ortu_kecamatan.'.$key, optional($row)->ortu_kecamatan) }}" selected>{{ old('ortu_kecamatan.'.$key, optional($row)->ortu_kecamatan) }}</option>
                              @endif
                            </select>
                            {!! $errors->first('ortu_kecamatan.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                          </div>
                          {{-- kelurahan --}}
                          <div class="form-group form-show-validation {{ $errors->has('ortu_kelurahan.'.$key) ? 'has-error' : '' }}">
                            <label for="ortu_kelurahan">Kelurahan</label>
                            <select name="ortu_kelurahan[]" class="form-control" id="ortu_kelurahan_{{ $key == 0 ? 'Ayah' : 'Ibu' }}">
                              <option value="">Pilih Kelurahan</option>
                              @if (old('ortu_kelurahan.'.$key, optional($row)->ortu_kelurahan))
                              <option value="{{ old('ortu_kelurahan.'.$key, optional($row)->ortu_kelurahan) }}" selected>{{ old('ortu_kelurahan.'.$key, optional($row)->ortu_kelurahan) }}</option>
                              @endif
                            </select>
                            {!! $errors->first('ortu_kelurahan.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                          </div>
                        </div>
                      </div>
                      <hr>
                    </div>
                    @endforeach
                    
                    <div class="col-md-12">
                      <button type="submit" value="next" class="btn btn-primary">Simpan & Lanjutkan</button>
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
  function getAlamat(params, type, column, tipes) {
      $(`#ortu_${type}_${tipes}`).html(`<option value="">Pilih ${type.toLowerCase()}</option>`)
      resetForm(type, tipes)
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
          $(`#ortu_${type}_${tipes}`).append(`<option value="${row}">${row}</option>`)
        }
      });
    }

    function resetForm(type, tipes) {
      switch (type) {
        case 'kabupaten':
          $('#ortu_kecamatan_'+tipes).html(`<option value="">Pilih Kecamatan</option>`)
          $('#ortu_kelurahan_'+tipes).html(`<option value="">Pilih Kelurahan</option>`)
        case 'kecamatan':
          $('#ortu_kelurahan_'+tipes).html(`<option value="">Pilih Kelurahan</option>`)
        default:
          break;
      }
    }
</script>
@endpush