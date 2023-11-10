@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark"> @lang("Staff List of Dean: "){{ @$dean_info->name }}</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Create New')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
<!-- /.content-header -->


<div class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card"> 
        <div class="card-header">
          <h5>
            <a class="btn btn-sm btn-info" href="{{ route('dean-office.information') }}"><i class="fa fa-list"></i> @lang('Deans List')</a>
            <a class="btn btn-sm btn-success float-right" href="{{ route('dean-office.staff_list.add',$dean_information_id) }}"><i class="fa fa-plus-circle"></i> @lang('Add Deans Staff')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('Sl')</th>
                  <th>@lang('Name')</th>
                  <th>@lang('Designation')</th> 
                  {{-- <th>@lang('Dean Name')</th> --}}
                  <th style="width:13%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allData as $data)
                <tr> 
                  <th>{{ $data->id }}</th>
                  <td>{{ $data->name }}</td>             
                  <td>{{ $data->designation }}</td>               
                  {{-- <td>{{ $data->dean_name }}</td>        --}}
                  <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{route('dean-office.staff_list.edit',['id' => $data->id, 'dean_information_id' => $dean_information_id])}}"><i class="fa fa-edit"></i></a>
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
