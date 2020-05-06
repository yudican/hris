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
        Silahkan isi quisioner berikut untuk melengkapi berkas lamaran anda. 
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
                    @foreach ($rows as $key => $row)
                    <input type="hidden" name="id[]" value="{{ $row->id }}">
                      {{-- @foreach ($row->jawaban()->get() as $jawaban) --}}
                      <div class="form-group form-show-validation {{ $errors->has('jawaban_pertanyaan.'.$key) ? 'has-error' : '' }}">
                        <div class="d-flex">
                          <p>{{ $no++ }} </p>
                          <p for=""> .{{ $row->pertanyaan_isi }}</p>
                        </div>
                        <textarea class="form-control" name="jawaban_pertanyaan[]" placeholder="masukkan jawaban kamu" cols="30" rows="2">{{ optional($row->jawaban()->first())->jawaban_pertanyaan }}</textarea>
                        {!! $errors->first('jawaban_pertanyaan.'.$key, '<label id="name-error" class="error" for="name">:message</label>') !!}
                      </div>
                      {{-- @endforeach --}}
                    <hr>
                    @endforeach
                    <div class="form-group">
                        <label label for=""></label>
                        <button class="btn btn-primary">Submit</button>
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
  </div>
@endsection


