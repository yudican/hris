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
        Silahkan masukkan data pengalaman kerja sebelumnya.
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
                    <div class="row">
                      <div class="col-md-6 pr-0">
                        <div class="form-group form-show-validation {{ $errors->has('bp_perusahan1') ? 'has-error' : '' }}">
                          <label for="bp_perusahan1">Perusahaan</label>
                            <input id="bp_perusahan1" class="form-control" type="text" name="bp_perusahan1" placeholder="Perusahaan" value="{{ old('bp_perusahan1') }}">
                            {!! $errors->first('bp_perusahan1', '<label id="bp_perusahan1-error" class="error" for="bp_perusahan1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-6 pl-0">
                        <div class="form-group form-show-validation {{ $errors->has('bp_jabatan1') ? 'has-error' : '' }}">
                          <label for="bp_jabatan1">Posisi Jabatan</label>
                            <input id="bp_jabatan1" class="form-control" type="text" name="bp_jabatan1" placeholder="ex: Costummer Service" value="{{ old('bp_jabatan1') }}">
                            {!! $errors->first('bp_jabatan1', '<label id="bp_jabatan1-error" class="error" for="bp_jabatan1">:message</label>') !!}
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-0">
                        <div class="form-group form-show-validation {{ $errors->has('bp_kota1') ? 'has-error' : '' }}">
                          <label for="bp_kota1">Kota</label>
                            <input id="bp_kota1" class="form-control" type="text" placeholder="kota tempat bekerja" name="bp_kota1" value="{{ old('bp_kota1') }}">
                            {!! $errors->first('bp_kota1', '<label id="bp_kota1-error" class="error" for="bp_kota1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12 col-12 pl-0">
                        <div class="row">
                          <div class="col-sm-6 col-6" style="padding-right: 0;">
                            <div class="form-group form-show-validation {{ $errors->has('bp_mulai1') ? 'has-error' : '' }}">
                              <label for="bp_mulai1">Mulai</label>
                              <input onclick="return showStartDate('first')" id="bp-mulai-first" class="form-control" type="text" name="bp_mulai1" placeholder="Mulai Bekerja" value="{{ old('bp_mulai1') }}">
                              {!! $errors->first('bp_mulai1', '<label id="bp_mulai1-error" class="error" for="bp_mulai1">:message</label>') !!}
                            </div>
                          </div>
                          <div class="col-sm-6 col-6" style="padding-left: 0;">
                            <div class="form-group form-show-validation {{ $errors->has('bp_akhir1') ? 'has-error' : '' }}">
                              <label for="bp_akhir1">Akhir</label>
                              <input onfocus="return showEndDate('first');" id="bp-akhir-first" class="form-control " type="text" name="bp_akhir1" placeholder="Akhir Bekerja" value="{{ old('bp_akhir1') }}" {{ old('bp_akhir1') == 'Masih Bekerja' ? 'readonly' : '' }}>
                              {!! $errors->first('bp_akhir1', '<label id="bp_akhir1-error" class="error" for="bp_akhir1">:message</label>') !!}
                            </div>
                          </div>
                        </div>
                        <div style="padding-left: 10px;">
                          <input onchange="return toggleStatus(this.value, 'first')" {{ old('bp_akhir1') == 'Masih Bekerja' ? 'checked' : '' }} id="checkbox-first" type="checkbox" data-toggle="toggle" data-onstyle="primary" data-size="xs" data-off="Sedang Bekerja Disini" data-on="Tidak Sedang Bekerja Disini">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4" style="padding-right: 0;">
                        <div class="form-group form-show-validation {{ $errors->has('bp_gaji_terakhir1') ? 'has-error' : '' }}">
                          <label for="bp_gaji_terakhir1">Gaji Terakhir</label>
                            <input id="bp_gaji_terakhir1" class="form-control" type="text" name="bp_gaji_terakhir1" placeholder="Gaji Terakhir" value="{{ old('bp_gaji_terakhir1') }}">
                            {!! $errors->first('bp_gaji_terakhir1', '<label id="bp_gaji_terakhir1-error" class="error" for="bp_gaji_terakhir1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-4" style="padding-left: 0;padding-right: 0;">
                        <div class="form-group form-show-validation {{ $errors->has('bp_nama_atasan1') ? 'has-error' : '' }}">
                          <label for="bp_nama_atasan1">Nama Atasan</label>
                            <input id="bp_nama_atasan1" class="form-control" type="text" name="bp_nama_atasan1" placeholder="Nama Atasan" value="{{ old('bp_nama_atasan1') }}">
                            {!! $errors->first('bp_nama_atasan1', '<label id="bp_nama_atasan1-error" class="error" for="bp_nama_atasan1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-4" style="padding-left: 0;">
                        <div class="form-group form-show-validation {{ $errors->has('bp_nomor_tlp_atasan1') ? 'has-error' : '' }}">
                          <label for="bp_nomor_tlp_atasan1">Kontak Atasan</label>
                            <input id="bp_nomor_tlp_atasan1" class="form-control" type="text" name="bp_nomor_tlp_atasan1" placeholder="Kontak Atasan" value="{{ old('bp_nomor_tlp_atasan1') }}">
                            {!! $errors->first('bp_nomor_tlp_atasan1', '<label id="bp_nomor_tlp_atasan1-error" class="error" for="bp_nomor_tlp_atasan1">:message</label>') !!}
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-12">
                        <div class="form-group form-show-validation {{ $errors->has('bp_alasan_berhenti1') ? 'has-error' : '' }}">
                          <label for="bp_alasan_berhenti1">Alasan berhenti</label>
                            <input id="bp_alasan_berhenti1" class="form-control" type="text" name="bp_alasan_berhenti1" placeholder="Alasan berhenti" value="{{ old('bp_alasan_berhenti1') }}">
                            {!! $errors->first('bp_alasan_berhenti1', '<label id="bp_alasan_berhenti1-error" class="error" for="bp_alasan_berhenti1">:message</label>') !!}
                        </div>
                      </div>
  
                      <div class="col-md-12 col-sm-12 col-12">
                        <div class="form-group form-show-validation {{ $errors->has('bp_jobdesc1') ? 'has-error' : '' }}">
                          <label for="bp_jobdesc1">Deskripsi</label>
                            <textarea id="bp-jobdesc-first" class="form-control" name="bp_jobdesc1">{{ old('bp_jobdesc1') }}</textarea>
                            {!! $errors->first('bp_jobdesc1', '<label id="bp_jobdesc1-error" class="error" for="bp_jobdesc1">:message</label>') !!}
                        </div>
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <button type="submit" value="next" name="simpandanlanjutkan" class="btn btn-success">Simpan</button>
                      {{-- @if (count($rows) > 0)
                        <a href="{{ route('biodata-ortu.create', ['biodata_ortu' => request()->segment(3)]) }}" class="btn btn-primary">Selanjutnya</a>
                      @endif --}}
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
            <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                <form action="{{ route('biodata-pengalaman-kerja.update') }}" method="POST">
                  @csrf
                  <input type="hidden" name="_method" value="PUT">
                  <input type="hidden" name="nomor_ktp" value="{{ $dataKtp->ktp_nomor }}">
                  <h2>Data Pengalaman Kerja</h2>
                  @foreach ($rows as $key =>  $row)
                  <input type="hidden" name="id[]" value="{{ $row->id }}">
                  <div>
                    <div class="row">
                      <div class="col-md-6 pr-0">
                        <div class="form-group form-show-validation {{ $errors->has('bp_perusahan.'.$key) ? 'has-error' : '' }}">
                          <label for="bp_perusahan1">Perusahaan</label>
                            <input id="bp_perusahan1" class="form-control" type="text" name="bp_perusahan[]" placeholder="Perusahaan" value="{{ old('bp_perusahan.'.$key, optional($row)->bp_perusahan) }}">
                            {!! $errors->first('bp_perusahan.'.$key, '<label id="bp_perusahan1-error" class="error" for="bp_perusahan1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-6 pl-0">
                        <div class="form-group form-show-validation {{ $errors->has('bp_jabatan.'.$key) ? 'has-error' : '' }}">
                          <label for="bp_jabatan1">Posisi Jabatan</label>
                            <input id="bp_jabatan1" class="form-control" type="text" name="bp_jabatan[]" placeholder="ex: Costummer Service" value="{{ old('bp_jabatan.'.$key, optional($row)->bp_jabatan) }}">
                            {!! $errors->first('bp_jabatan.'.$key, '<label id="bp_jabatan1-error" class="error" for="bp_jabatan1">:message</label>') !!}
                        </div>
                      </div>
                      
                    </div>
                    <div class="row">
                      <div class="col-md-6 pr-0">
                        <div class="form-group form-show-validation {{ $errors->has('bp_kota.'.$key) ? 'has-error' : '' }}">
                          <label for="bp_kota1">Kota</label>
                            <input id="bp_kota1" class="form-control" type="text" placeholder="kota tempat bekerja" name="bp_kota[]" value="{{ old('bp_kota.'.$key, optional($row)->bp_kota) }}">
                            {!! $errors->first('bp_kota.'.$key, '<label id="bp_kota1-error" class="error" for="bp_kota1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-6 col-sm-12 col-12 pl-0">
                        <div class="row">
                          <div class="col-sm-6 col-6" style="padding-right: 0;">
                            <div class="form-group form-show-validation {{ $errors->has('bp_mulai.'.$key) ? 'has-error' : '' }}">
                              <label for="bp_mulai1">Mulai</label>
                              <input onclick="return showStartDate({{$row->id}})" id="bp-mulai-{{$row->id}}" class="form-control" type="text" name="bp_mulai[]" placeholder="Mulai Bekerja" value="{{ old('bp_mulai.'.$key, optional($row)->bp_mulai) }}">
                              {!! $errors->first('bp_mulai.'.$key, '<label id="bp_mulai1-error" class="error" for="bp_mulai1">:message</label>') !!}
                            </div>
                          </div>
                          <div class="col-sm-6 col-6" style="padding-left: 0;">
                            <div class="form-group form-show-validation {{ $errors->has('bp_akhir.'.$key) ? 'has-error' : '' }}">
                              <label for="bp_akhir.{{$key}}">Akhir</label>
                              <input onfocus="return showEndDate('{{$row->id}}');" id="bp-akhir-{{$row->id}}" class="form-control" type="text" name="bp_akhir[]" placeholder="Akhir Bekerja" value="{{ old('bp_akhir.'.$key, optional($row)->bp_akhir) }}" {{ old('bp_akhir.'.$key, optional($row)->bp_akhir) == 'Masih Bekerja' ? 'readonly' : '' }}>
                              {!! $errors->first('bp_akhir.'.$key, '<label id="bp_akhir1-error" class="error" for="bp_akhir1">:message</label>') !!}
                            </div>
                          </div>
                        </div>
                        <div style="padding-left: 10px;">
                          <input onchange="return toggleStatus('{{ old('bp_akhir.'.$key, optional($row)->bp_akhir) }}', {{ $row->id }})" {{ old('bp_akhir.'.$key, optional($row)->bp_akhir) == 'Masih Bekerja' ? 'checked' : '' }} id="checkbox-first" type="checkbox" data-toggle="toggle" data-onstyle="primary" data-size="xs" data-off="Sedang Bekerja Disini" data-on="Tidak Sedang Bekerja Disini">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-4" style="padding-right: 0;">
                        <div class="form-group form-show-validation {{ $errors->has('bp_gaji_terakhir.'.$key) ? 'has-error' : '' }}">
                          <label for="bp_gaji_terakhir1">Gaji Terakhir</label>
                            <input id="bp_gaji_terakhir1" class="form-control" type="text" name="bp_gaji_terakhir[]" placeholder="Gaji Terakhir" value="{{ old('bp_gaji_terakhir.'.$key, optional($row)->bp_gaji_terakhir) }}">
                            {!! $errors->first('bp_gaji_terakhir.'.$key, '<label id="bp_gaji_terakhir1-error" class="error" for="bp_gaji_terakhir1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-4" style="padding-left: 0;padding-right: 0;">
                        <div class="form-group form-show-validation {{ $errors->has('bp_nama_atasan.'.$key) ? 'has-error' : '' }}">
                          <label for="bp_nama_atasan1">Nama Atasan</label>
                            <input id="bp_nama_atasan1" class="form-control" type="text" name="bp_nama_atasan[]" placeholder="Nama Atasan" value="{{ old('bp_nama_atasan.'.$key, optional($row)->bp_nama_atasan) }}">
                            {!! $errors->first('bp_nama_atasan.'.$key, '<label id="bp_nama_atasan1-error" class="error" for="bp_nama_atasan1">:message</label>') !!}
                        </div>
                      </div>
                      <div class="col-md-4" style="padding-left: 0;">
                        <div class="form-group form-show-validation {{ $errors->has('bp_nomor_tlp_atasan.'.$key) ? 'has-error' : '' }}">
                          <label for="bp_nomor_tlp_atasan1">Kontak Atasan</label>
                            <input id="bp_nomor_tlp_atasan1" class="form-control" type="text" name="bp_nomor_tlp_atasan[]" placeholder="Kontak Atasan" value="{{ old('bp_nomor_tlp_atasan.'.$key, optional($row)->bp_nomor_tlp_atasan) }}">
                            {!! $errors->first('bp_nomor_tlp_atasan.'.$key, '<label id="bp_nomor_tlp_atasan1-error" class="error" for="bp_nomor_tlp_atasan1">:message</label>') !!}
                        </div>
                      </div>
                    </div>
                    
                    <div class="row">
                      <div class="col-md-12 col-sm-12 col-12">
                        <div class="form-group form-show-validation {{ $errors->has('bp_alasan_berhenti.'.$key) ? 'has-error' : '' }}">
                          <label for="bp_alasan_berhenti1">Alasan berhenti</label>
                            <input id="bp_alasan_berhenti1" class="form-control" type="text" name="bp_alasan_berhenti[]" placeholder="Alasan berhenti" value="{{ old('bp_alasan_berhenti.'.$key, optional($row)->bp_alasan_berhenti) }}">
                            {!! $errors->first('bp_alasan_berhenti.'.$key, '<label id="bp_alasan_berhenti1-error" class="error" for="bp_alasan_berhenti1">:message</label>') !!}
                        </div>
                      </div>
  
                      <div class="col-md-12 col-sm-12 col-12">
                        <div class="form-group form-show-validation {{ $errors->has('bp_jobdesc.'.$key) ? 'has-error' : '' }}">
                          <label for="bp_jobdesc1">Deskripsi</label>
                            <textarea id="bp-jobdesc-{{$row->id}}" class="form-control" name="bp_jobdesc[]">{{ old('bp_jobdesc.'.$key, optional($row)->bp_jobdesc) }}</textarea>
                            {!! $errors->first('bp_jobdesc.'.$key, '<label id="bp_jobdesc1-error" class="error" for="bp_jobdesc1">:message</label>') !!}
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
  <script src={{ asset('assets/server/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}></script>
  <script src="{{ asset('assets/server/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
  <script src="{{ asset('assets/server/js/plugin/summernote/summernote-bs4.min.js') }}"></script>
  @foreach ($rows as $key => $row)
      <script>
        $('#bp-jobdesc-{{$row->id}}').summernote({
          placeholder: 'Silahkan masukkan deskripsi pekerjaan anda sebelumnya',
          fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
          tabsize: 2,
          height: 200
        });
      </script>
  @endforeach
  <script>
    $('#bp-jobdesc-first').summernote({
      placeholder: 'Silahkan masukkan deskripsi pekerjaan anda sebelumnya',
      fontNames: ['Arial', 'Arial Black', 'Comic Sans MS', 'Courier New'],
      tabsize: 2,
      height: 200
    });
    function showStartDate(type) {
      $('#bp-mulai-'+type).datetimepicker({
          format: 'MM-YYYY'
      }).datetimepicker('show');
    }
    function showEndDate(type) {
      $('#bp-akhir-'+type).datetimepicker({
          format: 'MM-YYYY'
      }).datetimepicker('show');
    }
  </script>
  <script>
    function toggleStatus(value, type, ) {
      const status = document.getElementById('bp-akhir-'+type)
      if (!status.checked) {
        status.value = status.value === 'Masih Bekerja' ? value : 'Masih Bekerja'
        status.readOnly = status.value === 'Masih Bekerja' ? true : false
      }
    }
  </script>
@endpush