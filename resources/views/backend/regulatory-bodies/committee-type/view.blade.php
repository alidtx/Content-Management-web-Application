@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark">List of Committee Type</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Department')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
<!-- /.content-header -->
@if ($errors->any())
  @foreach ($errors->all() as $error)
  <script type="text/javascript">
    $(function () {
      $.notify("{{$error}}", {globalPosition: 'top right', className: 'error'});
    });
  </script>
  @endforeach
  @endif
<div class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h5>Committee Type
            <a class="btn btn-sm btn-primary float-right" href="{{ route('regulatory_bodies.committe.type.create') }}"><i class="fa fa-plus-circle"></i> Committee Type Add</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Committee Type</th>
                  <th style="width:10%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($committee as $comitte)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$comitte->name}}</td>
                  <td>
                    <a href="{{route('regulatory_bodies.committe.type.edit',['id'=>$comitte->id])}}" class="btn btn-sm btn-primary"><i class="fa fa-edit"></i></a>
                    {{-- <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> --}}
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

@endsection
