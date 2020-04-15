@extends('layouts.admin')
@section('content')
<div class="container container-full">
  <form action="{{ route('perusahaan.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ old('id', optional($row)->id) }}">
    <div class="page-navs bg-white">
      <div class="nav-scroller">
        <div class="nav nav-tabs nav-line nav-color-secondary d-flex align-items-center justify-contents-center w-100">
          <a class="nav-link active show" data-toggle="tab" href="#tab2" role="tab" aria-controls="tab2" aria-selected="true"><i class="fas fa-fax"></i> informasi alamat perusahaan</a>
            <a class="nav-link" data-toggle="tab" href="#tab1" role="tab" aria-controls="tab1" aria-selected="true">
              <i class="fas fa-map-marker-alt"></i> Kontak Perusahaan
            </a>
          <a class="nav-link mr-5" data-toggle="tab" href="#tab3" role="tab" aria-controls="tab3" aria-selected="true"><i class="fas fa-mobile-alt"></i> sosial media</a>
          <a class="nav-link mr-5" data-toggle="tab" href="#tab4" role="tab" aria-controls="tab4" aria-selected="true"><i class="fas fa-image"></i> logo & icon</a>
          <div class="ml-auto">
            <button type="submit" class="btn btn-success">Simpan</button>
          </div>
        </div>
      </div>
    </div>
    <div class="page-inner">
      <div class="card">
        <div class="card-body">
          @if ($errors->any())
            <div class="alert alert-danger" role="alert">
                <ul>
                  @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                  @endforeach
                </ul>
            </div>
          @endif
          <div class="tab-content" id="myTabContent">
            {{-- informasi alamat perusahaan --}}
            <div class="tab-pane fade show active" id="tab2" role="tabpanel" aria-labelledby="tab2-tab">
              <div class="row">
                <div class="col-md-10 mx-auto">
                  <div class="form-group row">
                    <label for="perusahaan_nama" class="col-sm-3 col-form-label">Nama Perusahaan</label>
                    <div class="col-sm-9">
                      <input id="perusahaan_nama" placeholder="Nama perusahaan" value="{{ old('perusahaan_nama', optional($row)->perusahaan_nama) }}" class="form-control" type="text" name="perusahaan_nama">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="perusahaan_provinsi" class="col-sm-3 col-form-label">Provinsi</label>
                    <div class="col-sm-9">
                      <select name="perusahaan_provinsi" class="form-control" id="perusahaan_provinsi" onchange="getAlamat(this.value, 'kabupaten', 'city')">
                        <option value="">Pilih Provinsi</option>
                        @foreach ($provinces as $province)
                          <option value="{{ $province->province_name }}" {{ (old('perusahaan_provinsi', optional($row)->perusahaan_provinsi) == $province->province_name) ? 'selected' : '' }}>{{ $province->province_name }} </option>
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="perusahaan_kabupaten" class="col-sm-3 col-form-label">Kabupaten</label>
                    <div class="col-sm-9">
                      <select name="perusahaan_kabupaten" class="form-control" id="perusahaan_kabupaten" onchange="getAlamat(this.value, 'kecamatan', 'sub_district')">
                        <option value="">Pilih Kabupaten</option>
                        @if (old('perusahaan_kabupaten', optional($row)->perusahaan_kabupaten))
                        <option value="{{ old('perusahaan_kabupaten', optional($row)->perusahaan_kabupaten) }}" selected>{{ old('perusahaan_kabupaten', optional($row)->perusahaan_kabupaten) }}</option>
                        @endif
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="perusahaan_kecamatan" class="col-sm-3 col-form-label">Kecamatan</label>
                    <div class="col-sm-9">
                      <select name="perusahaan_kecamatan" class="form-control" id="perusahaan_kecamatan" onchange="getAlamat(this.value, 'kelurahan', 'urban')">
                        <option value="">Pilih Kecamatan</option>
                        @if (old('perusahaan_kecamatan', optional($row)->perusahaan_kecamatan))
                        <option value="{{ old('perusahaan_kecamatan', optional($row)->perusahaan_kecamatan) }}" selected>{{ old('perusahaan_kecamatan', optional($row)->perusahaan_kecamatan) }}</option>
                        @endif
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="perusahaan_kelurahan" class="col-sm-3 col-form-label">Kelurahan</label>
                    <div class="col-sm-9">
                      <select name="perusahaan_kelurahan" class="form-control" id="perusahaan_kelurahan" onchange="getAlamat(this.value, 'kodepos', 'postal_code')">
                        <option value="">Pilih Kelurahan</option>
                        @if (old('perusahaan_kelurahan', optional($row)->perusahaan_kelurahan))
                        <option value="{{ old('perusahaan_kelurahan', optional($row)->perusahaan_kelurahan) }}" selected>{{ old('perusahaan_kelurahan', optional($row)->perusahaan_kelurahan) }}</option>
                        @endif
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="perusahaan_kodepos" class="col-sm-3 col-form-label">Kode Pos</label>
                    <div class="col-sm-9">
                      <select name="perusahaan_kodepos" class="form-control" id="perusahaan_kodepos">
                        <option value="">Pilih Kode Pos</option>
                        @if (old('perusahaan_kodepos', optional($row)->perusahaan_kodepos))
                        <option value="{{ old('perusahaan_kodepos', optional($row)->perusahaan_kodepos) }}" selected>{{ old('perusahaan_kodepos', optional($row)->perusahaan_kodepos) }}</option>
                        @endif
                      </select>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="perusahaan_alamat" class="col-sm-3 col-form-label">Alamat Perusahaan</label>
                    <div class="col-sm-9">
                      <textarea id="perusahaan_alamat" class="form-control" placeholder="Alamat Perusahaan" name="perusahaan_alamat" rows="3">{{ old('perusahaan_alamat', optional($row)->perusahaan_alamat) }}</textarea>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            {{-- informasi kontak perusahaan --}}
            <div class="tab-pane fade" id="tab1" role="tabpanel" aria-labelledby="tab1-tab">
              <div class="col-md-10 mx-auto">
                <div class="form-group row">
                  <label for="perusahaan_email" class="col-sm-3 col-form-label">Email Perusahaan</label>
                  <div class="col-sm-9">
                    <input id="perusahaan_email" value="{{ old('perusahaan_email', optional($row)->perusahaan_email) }}" class="form-control" type="text" name="perusahaan_email">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="perusahaan_fax" class="col-sm-3 col-form-label">Nomor Fax Perusahaan</label>
                  <div class="col-sm-9">
                    <input id="perusahaan_fax" value="{{ old('perusahaan_fax', optional($row)->perusahaan_fax) }}" class="form-control" type="text" name="perusahaan_fax">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="perusahaan_telepon" class="col-sm-3 col-form-label">Telepon Perusahaan</label>
                  <div class="col-sm-9">
                    <input id="perusahaan_telepon" value="{{ old('perusahaan_telepon', optional($row)->perusahaan_telepon) }}" class="form-control" type="text" name="perusahaan_telepon">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="perusahaan_website" class="col-sm-3 col-form-label">Website Perusahaan</label>
                  <div class="col-sm-9">
                    <input id="perusahaan_website" value="{{ old('perusahaan_website', optional($row)->perusahaan_website) }}" class="form-control" type="text" name="perusahaan_website">
                  </div>
                </div>
              </div>
            </div>
            {{-- informasi sosial media perusahaan --}}
            <div class="tab-pane fade" id="tab3" role="tabpanel" aria-labelledby="tab3-tab">
              <div class="col-md-10 mx-auto">
                <div class="form-group row">
                  <label for="perusahaan_twitter" class="col-sm-3 col-form-label">Twitter</label>
                  <div class="col-sm-9">
                    <input id="perusahaan_twitter" value="{{ old('perusahaan_twitter', optional($row)->perusahaan_twitter) }}" class="form-control" type="text" name="perusahaan_twitter">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="perusahaan_facebook" class="col-sm-3 col-form-label">Facebook</label>
                  <div class="col-sm-9">
                    <input id="perusahaan_facebook" value="{{ old('perusahaan_facebook', optional($row)->perusahaan_facebook) }}" class="form-control" type="text" name="perusahaan_facebook">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="perusahaan_instagram" class="col-sm-3 col-form-label">Instagram</label>
                  <div class="col-sm-9">
                    <input id="perusahaan_instagram" value="{{ old('perusahaan_instagram', optional($row)->perusahaan_instagram) }}" class="form-control" type="text" name="perusahaan_instagram">
                  </div>
                </div>
              </div>
            </div>
            {{-- pengaturan logo  icon website perusahaan --}}
            <div class="tab-pane fade" id="tab4" role="tabpanel" aria-labelledby="tab4-tab">
              <div class="col-md-10 mx-auto">
                <div class="form-group row">
                  <label for="perusahaan_logo" class="col-sm-3 col-form-label">Logo Perusahaan</label>
                  <div class="col-sm-9">
                    <div class="input-file input-file-image">
                      <img class="img-upload-preview" width="150" src="{{ isset($row->perusahaan_logo) ? asset('storage/'.$row->perusahaan_logo) : 'http://placehold.it/150x150' }}" alt="preview">
                      <input type="file" class="form-control form-control-file" id="perusahaan_logo" name="perusahaan_logo" accept="image/*">
                      <input type="hidden" name="logo" value="{{ old('logo', optional($row)->perusahaan_logo) }}">
                      <label for="perusahaan_logo" class="label-input-file btn btn-black btn-round">
                        <span class="btn-label">
                          <i class="fa fa-file-image"></i>
                        </span>
                        Upload a Image
                      </label>
                    </div>
                  </div>
                </div>
                <div class="form-group row">
                  <label for="perusahaan_favicon" class="col-sm-3 col-form-label">Favicon Website</label>
                  <div class="col-sm-9">
                    <div class="input-file input-file-image">
                      <img class="img-upload-preview" width="150" src="{{ isset($row->perusahaan_favicon) ? asset('storage/'.$row->perusahaan_favicon) : 'http://placehold.it/150x150' }}" alt="preview">
                      <input type="file" class="form-control form-control-file" id="perusahaan_favicon" name="perusahaan_favicon" accept="image/*">
                      <input type="hidden" name="favicon" value="{{ old('favicon', optional($row)->perusahaan_favicon) }}">
                      <label for="perusahaan_favicon" class="label-input-file btn btn-black btn-round">
                        <span class="btn-label">
                          <i class="fa fa-file-image"></i>
                        </span>
                        Upload a Image
                      </label>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</div>
@endsection

@push('script')
  <script>
    function getAlamat(params, type, column) {
        $('#perusahaan_'+type).html(`<option value="">Pilih ${type.toLowerCase()}</option>`)
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
            $('#perusahaan_'+type).append(`<option value="${row}">${row}</option>`)
          }
        });
      }

      function resetForm(type) {
        switch (type) {
          case 'kabupaten':
            $('#perusahaan_kecamatan').html(`<option value="">Pilih Kecamatan</option>`)
            $('#perusahaan_kelurahan').html(`<option value="">Pilih Kelurahan</option>`)
            $('#perusahaan_kodepos').html(`<option value="">Pilih Kodepos</option>`)
            break;
          case 'kecamatan':
            $('#perusahaan_kelurahan').html(`<option value="">Pilih Kelurahan</option>`)
            $('#perusahaan_kodepos').html(`<option value="">Pilih Kodepos</option>`)
            break;
          case 'kelurahan':
            $('#perusahaan_kodepos').html(`<option value="">Pilih Kodepos</option>`)
            break;
        
          default:
            break;
        }
      }
  </script>
@endpush
