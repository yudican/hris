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
      {{-- <div class="ml-auto">
        <a href="{{ route('users.create') }}" class="btn btn-primary">Tambah Role</a>
      </div> --}}
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <table class="table table-light" width="100%">
              <thead class="thead-light">
                <tr>
                  <td width="2%">#</td>
                  <td width="10%">Nama</td>
                  <td width="10%">Email</td>
                  <td width="10%">Role</td>
                  <td width="5%">aksi</td>
                </tr>
              </thead>
              <tbody>
                @foreach ($users as $user)
                  <tr>
                    <td style="font-size: 12px;">{{ $no++ }}</td>
                    <td style="font-size: 12px;">{{ $user['name'] }}</td>
                    <td style="font-size: 12px;">{{ $user['email'] }}</td>
                    <td style="font-size: 12px;">role</td>
                    <td style="font-size: 12px;">
                      <a href="{{ route('users.edit', ['user' => $user['id']]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                      {{-- <button type="button" onclick="return confirmDelete('{{ route('users.destroy', ['user' => $user['id']]) }}');" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button> --}}
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