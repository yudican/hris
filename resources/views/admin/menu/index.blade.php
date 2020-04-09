@extends('layouts.admin')

@push('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.css">
    <style>
      .dd-handle {
        display: block;
        height: auto;
        margin: 5px 0;
        padding: 10px 10px;
        color: #333;
        text-decoration: none;
        font-weight: 700;
        border: 1px solid #ccc;
        background: #fff;
        border-radius: 3px;
        box-sizing: border-box;
        cursor: move;
      }

      .dd-item>button{
        color: #fff
      }
      .dd{
        max-width: 100%;
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
        <div class="ml-auto">
          <a href="{{ route('menu.create') }}" class="btn btn-primary">Buat Menu Baru</a>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <div class="col-md-12">
                <div class="dd mt-4">
                  <ol class="dd-list">
                    @foreach($menus as $menu)
                      <li class="dd-item" data-id="{{ $menu->id }}">
                        <div class="pull-right" style="position: relative;top: 5px;right: 5px;">
                          <a href="{{ route('menu.edit', ['menu' => $menu->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                          <a href="{{ route('menu.destroy', ['menu' => $menu->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                        </div>
                        <div class='dd-handle'>{{ $menu->name }}</div>
                        <ol class="dd-list">
                          @foreach($menu->children as $cats)
                            <li class='dd-item' data-id="{{ $cats->id }}">
                              <div class="pull-right" style="position: relative;top: 5px;right: 5px;">
                                <a href="{{ route('menu.edit', ['menu' => $cats->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                <a href="{{ route('menu.destroy', ['menu' => $cats->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                              </div>
                              <div class='dd-handle'>{{ $cats->name }}</div>
                              <ol class="dd-list">
                                @foreach($cats->children as $cat)
                                <li class='dd-item' data-id="{{ $cat->id }}">
                                  <div class="pull-right" style="position: relative;top: 5px;right: 5px;">
                                    <a href="{{ route('menu.edit', ['menu' => $cat->id]) }}" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="{{ route('menu.destroy', ['menu' => $cat->id]) }}" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> Delete</a>
                                  </div>
                                  <div class='dd-handle'>{{ $cat->name }}</div>
                                </li>
                                @endforeach
                              </ol>
                            </li>
                          @endforeach
                        </ol>
                      </li>
                      @endforeach
                  </ol>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/nestable2/1.6.0/jquery.nestable.min.js"></script>
    <script>
      $(function(){
        // alert('ok')
        $('.dd').nestable({
          maxDepth: 3
        }).on('change', function(e) {
          var menu = $(".dd").nestable("serialize");
          console.log(JSON.stringify(menu))
            var data = {data: menu, _token: '{{ csrf_token() }}'};
            $.ajax({
                url: `{{ route('menu.change') }}`,
                type: "post",
                dataType: "json",
                data: data,
                beforeSend: function() { },
                success: function(result) {
                    if (result['status'] == "success") {
                        // alert("Priority Updated!");
                    } 
                }
            });
        });
      })
    </script>
@endpush