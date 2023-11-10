@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        {{-- <h1 class="m-0 text-dark">Manage Banner</h1> --}}
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item"><a href="{{route('site-setting.banner.add')}}">Banner</a></li>
          <li class="breadcrumb-item active">Banner Image</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="card card-outline card-primary">
          <div class="card-header">
            <h5> Manage Banner Image
              <a href="{{ route('site-setting.banner.add') }}" class="btn btn-sm btn-primary float-right"><i
                  class="fas fa-plus"></i> Add Banner</a>
            </h5>
          </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Title</th>
                  <th>Banner Image</th>
                  <th>Discription</th>
                  <th width="80">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach($banners as $p)
                <tr>
                  <td> {{$loop->iteration}}</td>
                  <td> {{$p->title}}</td>
                  <td><img src="{{asset('public/upload/banner/'.$p['image']) }}" height="80"></td>
                  <td>{!! $p['description'] !!}</td>
                  <td><a
                      href="{{ route('site-setting.banner.edit', $p->id) }}"
                      class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="banners"><i
                        class="fas fa-edit"></i></a> | <a class="delete btn btn-danger btn-flat btn-sm"
                      data-route="{{ route('site-setting.banner.delete') }}" id="delete" data-token={{csrf_token()}} data-id="{{ $p->id }}"><i
                        class="fas fa-trash"></i></a>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
  <!--/. container-fluid -->
</section>
@endsection