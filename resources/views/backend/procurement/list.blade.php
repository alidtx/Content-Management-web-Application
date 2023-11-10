@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">List of Team Member</h1> --}}
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Procurement </li>
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
                            <h5 class="m-0 text-dark float-left">List of Procurement </h5>
                            <a href="{{url('procurements/procurement/add')}}" class="btn btn-sm btn-primary float-right"><i class="fas fa-plus"></i>
                                Add Procurement </a>
                        </div>

                        <div class="card-body">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="10%">Title</th>
                                        <th width="20%">Image</th>
                                        <th width="20%">Publish Date</th>
                                        <th width="5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($procurement as $item)
                                        <tr>
                                            <td> {{$loop->iteration }}</td>
                                            <td>{{ @$item->title}}</td>
                                            <td><img width="50px" src="{{asset('storage/app/public/media/procurement/'.$item->file)}}" alt=""></td>
                                            <td>{{ @$item->publish_date}}</td>
                                            <td><a href="{{url('procurements/procurement/add/'.$item->id)}}"
                                                    class="btn btn-primary btn-flat btn-sm edit" data-type="image"
                                                    data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> | <a href="{{url('procurements/procurement/delete/'.$item->id)}}"
                                                    class="delete btn btn-danger btn-flat btn-sm"
                                                    data-route=""
                                                    data-id="{{ $item->id }}"><i class="fas fa-trash"></i></a>
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
