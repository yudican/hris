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
        Silahkan masukkan akun sosial media yang anda punya
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

                  <div class="form-group form-show-validation row {{ $errors->has('bioin_facebook') ? 'has-error' : '' }}">
                    <label for="bioin_facebook" class="col-sm-3 col-form-label">Facebook</label>
                    <div class="col-sm-9">
                      <input id="bioin_facebook" class="form-control" type="text" name="bioin_facebook" placeholder="facebook akun" value="{{ old('bioin_facebook', optional($row)->bioin_facebook) }}">
                      {!! $errors->first('bioin_facebook', '<label id="bioin_facebook-error" class="error" for="bioin_facebook">:message</label>') !!}
                    </div>
                  </div>
                  <div class="form-group form-show-validation row {{ $errors->has('bioin_instagram') ? 'has-error' : '' }}">
                    <label for="bioin_instagram" class="col-sm-3 col-form-label">Instagram</label>
                    <div class="col-sm-9">
                      <input id="bioin_instagram" class="form-control" type="text" name="bioin_instagram" placeholder="Instagram akun" value="{{ old('bioin_instagram', optional($row)->bioin_instagram) }}">
                      {!! $errors->first('bioin_instagram', '<label id="bioin_instagram-error" class="error" for="bioin_instagram">:message</label>') !!}
                    </div>
                  </div>
                  <div class="form-group form-show-validation row {{ $errors->has('bioin_twitter') ? 'has-error' : '' }}">
                    <label for="bioin_twitter" class="col-sm-3 col-form-label">Twitter</label>
                    <div class="col-sm-9">
                      <input id="bioin_twitter" class="form-control" type="text" name="bioin_twitter" placeholder="Twitter akun" value="{{ old('bioin_twitter', optional($row)->bioin_twitter) }}">
                      {!! $errors->first('bioin_twitter', '<label id="bioin_twitter-error" class="error" for="bioin_twitter">:message</label>') !!}
                    </div>
                  </div>
                  <div class="form-group form-show-validation row {{ $errors->has('bioin_linkedin') ? 'has-error' : '' }}">
                    <label for="bioin_linkedin" class="col-sm-3 col-form-label">Linkedin</label>
                    <div class="col-sm-9">
                      <input id="bioin_linkedin" class="form-control" type="text" name="bioin_linkedin" placeholder="Linkedin akun" value="{{ old('bioin_linkedin', optional($row)->bioin_linkedin) }}">
                      {!! $errors->first('bioin_linkedin', '<label id="bioin_linkedin-error" class="error" for="bioin_linkedin">:message</label>') !!}
                    </div>
                  </div>
                  <div class="form-group form-show-validation row {{ $errors->has('bioin_email') ? 'has-error' : '' }}">
                    <label for="bioin_email" class="col-sm-3 col-form-label">Email</label>
                    <div class="col-sm-9">
                      <input id="bioin_email" class="form-control" type="text" name="bioin_email" placeholder="Email akun" value="{{ old('bioin_email', optional($row)->bioin_email) }}">
                      {!! $errors->first('bioin_email', '<label id="bioin_email-error" class="error" for="bioin_email">:message</label>') !!}
                    </div>
                  </div>
                  <div class="form-group form-show-validation row {{ $errors->has('bioin_whatsapp') ? 'has-error' : '' }}">
                    <label for="bioin_whatsapp" class="col-sm-3 col-form-label">Whatsapp</label>
                    <div class="col-sm-9">
                      <input id="bioin_whatsapp" class="form-control" type="text" name="bioin_whatsapp" placeholder="Whatsapp akun" value="{{ old('bioin_whatsapp', optional($row)->bioin_whatsapp) }}">
                      {!! $errors->first('bioin_whatsapp', '<label id="bioin_whatsapp-error" class="error" for="bioin_whatsapp">:message</label>') !!}
                    </div>
                  </div>

                  <div class="form-group row ">
                    <label for="bioin_whatsapp" class="col-sm-3 col-form-label"></label>
                    <div class="col-sm-9">
                      <button type="submit" value="next" name="simpandanlanjutkan" class="btn btn-success">Simpan & Lanjutkan</button>
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
