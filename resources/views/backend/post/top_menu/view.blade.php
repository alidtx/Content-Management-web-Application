@extends('backend.layouts.app')
@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark">Manage Menu</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
            <li class="breadcrumb-item active">Top Menu</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <div class="content-header">
    <div class="conyainer-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h5 class="m-0 text-dark float-left">Top Menu</h5>
                        <a href="{{route('frontend-menu.top_menu.create')}}" class="btn btn-primary btn-sm float-right"><i class="fas fa-stream"></i> Add Menu Type</a>
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Menu Name</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menu_types as $menu_type)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$menu_type->menu_name}}</td>
                                    <td>
                                        <a href="{{route('frontend-menu.menu.view', $menu_type->id)}}" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></a>
                                    </td>
                                    <td>
                                        <a href="{{route('frontend-menu.top_menu.edit', $menu_type->id)}}" class="btn btn-success btn-sm"><i class="fas fa-edit"></i></a>
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
@endsection
