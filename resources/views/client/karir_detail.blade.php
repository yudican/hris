@extends('layouts.client')

@push('style')
  <style>
    .sticky-sidebar {
      position: -webkit-sticky;
      position: sticky;
      top: 20px;
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
  <div class="row">
    <div class="col-lg-8">
      <div class="mb-5 d-flex blog-entry bg-white p-3">
        {{-- <a href="#" class="blog-thumbnail"><img src="{{ url('assets/client/images/cargo_air_small.jpg') }}" alt="Image" class="img-fluid"></a> --}}
        <div class="blog-excerpt">
          <h2 class="h4  mb-1"><a href="single.html">{{ $karir->lowongan_bagian }}</a></h2>
          <span class="d-block pb-2">{{ $data->perusahaan_nama }}</span>

          <h5 class="d-block mt-4">Deskripsi Pekerjaan</h3>
          <p class="">{!! $karir->lowongan_deskripsi !!}</p>

          <h5 class="d-block mt-4">Kualifikasi</h3>
            <p class="">{!! $karir->lowongan_kualifikasi !!}</p>
          {{-- <a><a href="single.html" class="text-primary">Read More</a></a> --}}
        </div>
      </div>   
    </div>
    <div class="col-lg-4">
      <div class="mb-5 d-flex blog-entry bg-white p-3 sticky-sidebar">
        <div class="blog-excerpt">
          <h5 class="d-block">Informasi</h3>
          <span class="d-block text-muted text-capitalize pb-2" style="padding-left:10px;"><i class="icon-map-marker text-danger"></i> {{ $karir->lowongan_wilayah }}</span>
          <span class="d-block text-success pb-2" style="padding-left:10px;"><i class="icon-dollar"></i> Rp. {{ number_format($karir->lowongan_salary_max) }}</span>
          <span class="d-block text-capitalize pb-2" style="padding-left:10px;"><i class="icon-calendar"></i> {{ $karir->lowongan_status }} {{ $karir->lowongan_status == 'Buka' ? '- '.$karir->lowongan_tanggal_close->formatLocalized("%A, %d %B %Y") : '' }}</span>
          <span class="d-block text-capitalize pb-2" style="padding-left:10px;"><i class="icon-users"></i> Karyawan Diperlukan {{ $karir->lowongan_karyawan }} Orang</span>
            
          <a href="{{ route('karir.apply', ['id' => $karir->id, 'title' => str_replace(' ', '-', $karir->lowongan_bagian)]) }}" class="btn btn-primary text-white mt-4">Apply Now</a>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection