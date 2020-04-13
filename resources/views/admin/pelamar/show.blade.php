@extends('layouts.admin')

@section('content')
<div class="container">
  <div class="page-inner">
    <div class="page-header">
      <h4 class="page-title">{{ $title }}</h4>
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
          <a href="{{ route('pelamar.index') }}">Pelamar</a>
        </li>
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href="#">{{ $title }}</a>
        </li>
      </ul>
      <div class="ml-auto">
        <form action="{{ route('pelamar.update', ['pelamar' => $data->id]) }}" method="post">
          @csrf
          {{ method_field('PUT') }}
          <button type="submit" class="btn btn-primary">Panggil Interview</button>
          <a href="{{ route('pelamar.index') }}" class="btn btn-danger">Kembali</a>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-light" width="60%" id="pelamar-table">
                <thead>
                  <tr>
                    <td width="3%">Jabatan yang dilamar</td>
                    <td width="15%">{{ $data->lowongan()->first()->lowongan_bagian }}</td>
                  </tr>
                  <tr>
                    <td width="3%">Nik Pelamar</td>
                    <td width="15%">{{ $data->pelamar_nik }}</td>
                  </tr>
                  <tr>
                    <td width="3%">Nama Lengkap Pelamar</td>
                    <td width="15%">{{ $data->pelamar_nama }}</td>
                  </tr>
                  <tr>
                    <td width="3%">Alamat Lengkap Pelamar</td>
                    <td width="15%" class="text-lowercase">{{ $data->pelamar_alamat.' rt/rw '.$data->pelamar_rt.'/'.$data->pelamar_rw.', '.$data->pelamar_provinsi.', '.$data->pelamar_kabupaten.', '.$data->pelamar_kecamatan.', '.$data->pelamar_kelurahan.' '.$data->pelamar_kodepos }}</td>
                  </tr>
                  <tr>
                    <td width="3%">Telepeon/Hp Pelamar</td>
                    <td width="15%">{{ $data->pelamar_hp }}</td>
                  </tr>
                  <tr>
                    <td width="3%">Email Pelamar</td>
                    <td width="15%">{{ $data->pelamar_email }}</td>
                  </tr>
                  <tr>
                    <td width="3%">Major</td>
                    <td width="15%">{{ $data->pelamar_major }}</td>
                  </tr>
                  <tr>
                    <td width="3%">Jurusan</td>
                    <td width="15%">{{ $data->pelamar_jurusan }}</td>
                  </tr>
                  <tr>
                    <td width="3%">Foto Pelamar</td>
                    <td width="15%"><img style="padding: 10;" src="{{ asset('storage/'.$data->pelamar_foto) }}" alt="{{ $data->pelamar_nama }}" width="150"></td>
                  </tr>
                </thead>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>

@endsection

