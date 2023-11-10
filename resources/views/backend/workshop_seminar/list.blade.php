@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->




<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        {{-- <h1 class="m-0 text-dark">List of Working Shop Seminar</h1> --}}
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
          <li class="breadcrumb-item active">Office Working Shop Seminar</li>
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
          <h5 class="m-0 text-dark float-left">List of Working Shop Seminar</h5>
          <a href="{{ route('manage_workshop_seminar.add') }}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i> Add Working Shop Seminar</a>
        </div>

        <div class="card-body">
          <table id="dataTable" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th width="5%">#</th>
                <th width="10%">training</th>
                <th width="20%">Work Shop</th>
                <th width="20%">Participant</th>
                <th width="5%">Action</th>
              </tr>
            </thead>
            <tbody>
              @foreach($traningList as $item)
              <tr>
                <td> {{$loop->iteration}}</td>
                <td>{{@$item->traning}}</td>
                <td>{{@$item->work_shop}}</td>
                <td>{{@$item->participant}}</td>
                {{-- <td>{{ @$officehome['description'] }}</td> --}}
                <td><a href="{{ route('manage_workshop_seminar.edit',$item->id) }}" class="btn btn-primary btn-flat btn-sm edit" data-type="image" data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | 
                  <a id="delete" class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('manage_workshop_seminar.delete') }}" data-id="{{ $item->id }}" data-token={{csrf_token()}} ><i class="fas fa-trash"></i></a>
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

