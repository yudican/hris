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
        Saya menerangkan bahwa semua yang saya isi adalah benar. Bila ternyata ada bagian dalam keterangan tersebut yang tidak benar, Saya bersedia mempertanggungjawabkannya dan diberhentikan tanpa syarat.
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
                  <input type="hidden" name="nomor_ktp" value="{{ $dataKtp->ktp_nomor }}">
                  <div>
                        <div class="form-group  form-show-validation row {{ $errors->has('bittd_kota') ? 'has-error' : '' }}">
                          <label for="pendidikan_jenjang" class="col-sm-3 col-form-label text-right">Kota Sekarang <span class="text-danger">*</span></label>
                          <div class="col-sm-9">
                            <select id="basic" class="form-control" name="bittd_kota">
                              <option value="">Pilih Kota Sekarang</option>
                              @foreach ($cities as $city)
                              <option value="{{ $city->city }}" {{ (old('bittd_kota', optional($row)->bittd_kota) == $city->city) ? 'selected' : '' }}>{{ $city->city }}</option>
                              @endforeach
                            </select>
                            {!! $errors->first('bittd_kota', '<label id="name-error" class="error" for="name">:message</label>') !!}
                          </div>  
                        </div>
                        <div class="form-group form-show-validation row {{ $errors->has('bittd_tanggal') ? 'has-error' : '' }}">
                          <label for="bittd_tanggal" class="col-sm-3 col-form-label text-right">Tanggal <span class="text-danger">*</span></label>
                          <div class="col-sm-9">
                            <input id="bittd_tanggal" class="form-control" type="text" name="bittd_tanggal" placeholder="pilih tnggal" value="{{ old('bittd_tanggal', optional($row)->bittd_tanggal) }}">
                            {!! $errors->first('bittd_tanggal', '<label id="bittd_tanggal1-error" class="error" for="bittd_tanggal1">:message</label>') !!}
                          </div>  
                        </div>
                        <div class="form-group form-show-validation row {{ $errors->has('bittd_nama') ? 'has-error' : '' }}">
                          <label for="bittd_nama" class="col-sm-3 col-form-label text-right">Yang membuat pernyataan <span class="text-danger">*</span></label>
                          <div class="col-sm-9">
                            <input id="bittd_nama" class="form-control" type="text" name="bittd_nama" placeholder="Nama" value="{{ old('bittd_nama', optional($dataKtp)->ktp_nama) }}" readonly>
                            {!! $errors->first('bittd_nama', '<label id="bittd_nama1-error" class="error" for="bittd_nama1">:message</label>') !!}
                          </div>  
                        </div>
                        <input id="bittd_persetujuan" class="form-control" type="hidden" name="bittd_persetujuan" placeholder="Cabang" value="Ya, Saya telah menginput dengan benar.">
                        <div class="form-group row">
                          <label for="bittd_nama" class="col-sm-3 col-form-label text-right"></label>
                          <div class="col-sm-9">
                            <button type="submit" value="next" name="simpandanlanjutkan" class="btn btn-success">Simpan & Lanjutkan</button>
                            {{-- @if (count($rows) > 0)
                              <a href="{{ route('biodata-darurat.create', ['biodata_darurat' => request()->segment(3)]) }}" class="btn btn-primary">Selanjutnya</a>
                            @endif --}}
                          </div>  
                        </div>
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
<script src="{{ asset('assets/server/js/plugin/select2/select2.full.min.js') }}"></script>
<script src="{{ asset('assets/server/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
<script>
  $('#bittd_tanggal').datetimepicker({
      format: 'YYYY-MM-DD',
  });

  $('#basic').select2({
    theme: "bootstrap"
  });
</script>
@endpush
