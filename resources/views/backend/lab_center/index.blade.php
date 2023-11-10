@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark"> @lang('Lab Center Management')</h4>
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
            <a class="btn btn-sm btn-success float-right" href="{{ route('lab-center.add') }}"><i class="fa fa-plus-circle"></i> @lang('Lab') @lang('Add')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('Sl')</th>
                  <th>@lang('title')</th>
                  <th>@lang('Description')</th>
                  <th>@lang('Departments')</th>
                  <th>@lang('Faculties')</th>
                  <th style="width:13%">@lang('Action')</th>
                </tr>
              </thead>
               
              <tbody>
                @foreach($allData as $data)
                <tr> 
                  <th>{{ $data->id }}</th>
                  <td>{{ $data->lcname }}</td>             
                  <td>{!! $data->description !!}</td>                 
                  <td>{{ $data->dname }}</td>               
                  <td>{{ $data->fname }}</td> 
                  <td>
                    <a class="btn btn-sm btn-success" title="Edit" href="{{route('lab-center.edit',$data->id)}}"><i class="fa fa-edit"></i></a> 
                    @if($data->status == 1)
                    <a class="statuschange btn btn-sm btn-success" title="Inactive" data-id="{{$data->id}}" data-action="0" data-route="{{route('lab-center.status_change')}}" data-token="{{csrf_token()}}" href="">
                      <i class="fa fa-check" aria-hidden="true"></i>
                        Acitve
                    </a>
                    @else
                    <a class="statuschange btn btn-sm btn-danger" title="Inactive" data-id="{{$data->id}}" data-action="1" data-route="{{route('lab-center.status_change')}}" data-token="{{csrf_token()}}" href="">
                      <i class="fa fa-ban" aria-hidden="true"></i>
                        Inacitve
                    </a>
                    @endif
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
