@extends('layouts.admin')

@section('active-menu', 'active')

@section('content')
  <div class="container">
    <div class="panel-header bg-primary-gradient">
      <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
          <div>
            <h2 class="text-white pb-2 fw-bold">Recruitment System</h2>
            <h5 class="text-white op-7 mb-2">Selamat Datang {{ auth()->user()->name }} di Program Recruitmen MSD HRIS</h5>
          </div>
          {{-- <div class="ml-md-auto py-2 py-md-0">
            <a href="#" class="btn btn-white btn-border btn-round mr-2">Manage</a>
            <a href="#" class="btn btn-secondary btn-round">Add Customer</a>
          </div> --}}
        </div>
      </div>
    </div>
    <div class="page-inner mt--5">
      <div class="card">
        <div class="card-body mx-auto">
          <img src="{{ asset('assets/server/img/welcome.svg') }}" alt="welcome" width="400">
        </div>
      </div>
    </div>
  </div>
@endsection
