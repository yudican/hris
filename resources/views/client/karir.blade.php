@extends('layouts.client')

@section('content')
<div class="container">
  <div class="row justify-content-start mb-2 mt-2">
    <div class="col-lg-4 mb-2 mt-2 mb-lg-0">
      <div class="block-heading-1">
        <h4>Daftar Lowongan</h4>
      </div>
    </div>
  </div>
  <div class="row">
    {{-- <div class="col-lg-4">
      <div class="card">
        <div class="card-header">
          Header
        </div>
        <div class="card-body">
          <h5 class="card-title">Title</h5>
          <p class="card-text">Content</p>
        </div>
        <div class="card-footer">
          Footer
        </div>
      </div>
    </div> --}}
    <div class="col-lg-12">
      @foreach ($items as $karir)
        <div class="mb-5 d-flex blog-entry bg-white p-3">
          {{-- <a href="#" class="blog-thumbnail"><img src="{{ url('assets/client/images/cargo_air_small.jpg') }}" alt="Image" class="img-fluid"></a> --}}
          <div class="blog-excerpt">
            <h2 class="h4  mb-2">{{ $karir->lowongan_bagian }}</h2>
            <span class="d-block mb-2">Dibutuhkan {{ $karir->lowongan_karyawan }} Orang</span>
            <span class="d-block text-muted text-capitalize" style="padding-left:10px;"><i class="icon-map-marker text-danger"></i> {{ $karir->lowongan_wilayah }}</span>
            <span class="d-block text-success" style="padding-left:10px;"><i class="icon-dollar"></i> Rp. {{ number_format($karir->lowongan_salary_max) }}</span>
            <span class="d-block text-capitalize" style="padding-left:10px;"><i class="icon-calendar"></i> {{ $karir->lowongan_status }} {{ $karir->lowongan_status == 'Buka' ? '- '.$karir->lowongan_tanggal_close->formatLocalized("%A, %d %B %Y") : '' }}</span>

            <p class="mt-2">{{ substr(strip_tags($karir->lowongan_deskripsi), 0, 200) }}</p>
            <a href="{{ $karir->lowongan_status == 'Buka' ? route('karir.detail', ['id' => $karir->id, 'title' => str_replace(' ', '-', $karir->lowongan_bagian)]) : '#' }}" class="text-primary">Detail</a>
          </div>
        </div>   
      @endforeach
    </div>
  </div>
</div>
@endsection