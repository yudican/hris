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
        <a href="{{ route('roles.create') }}" class="btn btn-primary">Tambah Role</a>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-light" width="100%">
              <thead class="thead-light">
                <tr>
                  <td width="2%">#</td>
                  <td width="10%">Nama Role</td>
                  <td width="5%">aksi</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($roles as $role)
                  <tr>
                    <td style="font-size: 12px;">{{ $no++ }}</td>
                    <td style="font-size: 12px;">{{ $role['name'] }}</td>
                    <td style="font-size: 12px;">
                      <a href="{{ route('roles.edit', ['role' => $role['id']]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                      <button type="button" onclick="return confirmDelete('{{ route('roles.destroy', ['role' => $role['id']]) }}');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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
