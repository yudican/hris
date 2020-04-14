@extends('layouts.admin')

@push('style')
    <style>
      .table > tbody > tr > td, .table > tbody > tr > th {
          font-size: 12px;
      }
    </style>
@endpush

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
      {{-- <div class="ml-auto">
        <a href="{{ route('pelamar.create') }}" class="btn btn-primary">Tambah Lowongan</a>
      </div> --}}
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-light" width="100%" id="pelamar-table">
                <thead>
                  <tr>
                    {{-- <td width="2%">#</td> --}}
                    <td width="5%">Nik</td>
                    <td width="15%">Nama Lengkap</td>
                    {{-- <td width="20%">Alamat</td> --}}
                    <td width="7%">Email</td>
                    <td width="10%">Posisi</td>
                    <td width="3%">Foto</td>
                    <td width="2%">aksi</td>
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

@push('script')
<script src="{{ asset('assets/server/js/plugin/datatables/datatables.min.js') }}"></script>
<script>
  $('#pelamar-table').DataTable({
      autoWidth: false,
      processing: true,
      serverSide: true,
      ajax: '{{ route('pelamar.json', ['type' => $params]) }}',
      columns: [
          // {data: 'id', name: 'id', orderable: false},
          {data: 'pelamar_nik', name: 'pelamar.pelamar_nik', orderable: false},
          {data: 'pelamar_nama', name: 'pelamar.pelamar_nama', orderable: false},
          {data: 'pelamar_email', name: 'pelamar.pelamar_email', orderable: false},
          {data: 'jabatan', name: 'jabatan', orderable: false},
          {data: 'pelamar_foto', name: 'pelamar.pelamar_foto', orderable: false},
          {data: 'action', name: 'action', orderable: false, searchable: false}
      ]
  });
</script>

@endpush
