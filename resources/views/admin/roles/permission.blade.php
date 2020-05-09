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
          <a href="{{ route('roles.index') }}">Roles</a>
        </li>
        <li class="separator">
          <i class="flaticon-right-arrow"></i>
        </li>
        <li class="nav-item">
          <a href="#">{{ $title }}</a>
        </li>
      </ul>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-body">
            <form action="{{ route('roles.setpermissions', ['role' => $id]) }}" method="POST">
              @csrf
              {{ method_field('POST') }}
              <table class="table table-light" width="100%">
                <thead class="thead-light">
                  <tr>
                    <th>#</th>
                    <th>Menu</th>
                    <th colspan="2" align="center">Permission</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($menupermissions as $menu)
                    <tr>
                      <td width="5%">{{ $no++ }}</td>
                      <td width="25%">{{ $menu->name }}</td>
                      <td width="5%">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($menu->permissions()->get() as $permission)
                          @if ($i++ %2 == 1)
                          </td>
                            <td>
                          @endif
                          @if ($menu->parent_id)
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" class="custom-control-input" name="permission[]" id="permission_{{ $permission->name }}" {{ in_array($role->name, $permission->roles()->pluck('name')->toArray()) ? 'checked' : '' }} value="{{ $permission->name }}">
                              <label class="custom-control-label" for="permission_{{ $permission->name }}">{{ explode(' ', $permission->name)[1] }}</label>
                            </div> 
                            @if ($i++ %2 == 1)
                          </td>
                            <td>
                          @endif
                            @else
                              {{-- @if ($menu->show == 'Tidak')
                              @endif --}}
                                  <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" name="permission[]" id="permission_{{ $permission->name }}" {{ in_array($role->name, $permission->roles()->pluck('name')->toArray()) ? 'checked' : '' }} value="{{ $permission->name }}">
                                    <label class="custom-control-label" for="permission_{{ $permission->name }}">{{ explode(' ', $permission->name)[1] }}</label>
                                  </div> 
                                  @if ($i++ %2 == 1)
                            </td>
                              <td>
                            @endif
                          @endif
                          
                        @endforeach
                      
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <button type="submit" class="btn btn-primary">Simpan</button>
              <a href="{{ route('roles.index') }}" class="btn btn-danger">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </div>
    
  </div>
</div>
@endsection

