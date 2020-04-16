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
          <a href="#">{{ $title }}</a>
        </li>
      </ul>
      <div class="ml-auto">
        <a href="{{ route('lowongan.create') }}" class="btn btn-primary">Tambah Lowongan</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            @if (session()->has('success'))
                <div class="alert alert-success" role="alert">
                  {{ session('success') }}
                </div>
            @endif
            <table class="table table-light" width="100%">
              <thead class="thead-light">
                <tr>
                  <td width="2%">#</td>
                  <td width="10%">Bagian</td>
                  <td width="5%">Salary</td>
                  {{-- <td width="20%">Kualifikasi</td> --}}
                  <td width="10%">Tanggal Buka</td>
                  <td width="5%">Status</td>
                  <td width="5%">aksi</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($items as $item)
                  <tr>
                    <td style="font-size: 12px;">{{ $no++ }}</td>
                    <td style="font-size: 12px;">{{ $item['lowongan_bagian'] }}</td>
                    <td style="font-size: 12px;">Rp. {{ number_format($item['lowongan_salary_max']) }}</td>
                    {{-- <td style="font-size: 12px;">{!! $item['lowongan_kualifikasi'] !!}</td> --}}
                    <td style="font-size: 12px;">{{ date('d-m-Y',strtotime($item['lowongan_tanggal_open'])).' - '.date('d-m-Y',strtotime($item['lowongan_tanggal_close']))  }}</td>
                    <td style="font-size: 12px;">{{ $item['lowongan_status']  }}</td>
                    <td style="font-size: 12px;">
                      <a href="{{ route('lowongan.edit', ['lowongan' => $item['id']]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                      <button type="button" onclick="return confirmDelete('{{ route('lowongan.destroy', ['lowongan' => $item['id']]) }}');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>

@include('components.modal_confirm')
@endsection

@push('script')
<script>
  $(document).on('click', '#btn-delete', function () {
    let url = $(this).data('url')
    document.location = url
  })

  function confirmDelete(params) {
    // let modalId = document.getElementById('confirm-modal')
    $('#confirm-modal').modal('show')
    $('#form-confirm').attr('action', params)
  }
</script>
@endpush
