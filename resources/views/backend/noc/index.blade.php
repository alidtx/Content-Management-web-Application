@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark"> @lang('NOC')</h4>
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
            <a class="btn btn-sm btn-success float-right" href="{{ route('noc.add') }}"><i class="fa fa-plus-circle"></i> @lang('NOC') @lang('Add')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('Sl')</th>
                  <th>@lang('Name')</th> 
                  <th>@lang('title')</th> 
                  <th>@lang('Departments')</th>
                  <th>@lang('Date')</th>
                  <th>@lang('Status')</th>
                  <th style="width:13%">@lang('Action')</th>
                </tr>
              </thead>
               
              </thead>
		                <tbody>
                       @foreach($allData as $officeOrder)
                        <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{$officeOrder['pname']}} </td>
                          <td>{{$officeOrder['title']}} </td>
                          <td>{{$officeOrder['dname']}}</td> 
                          <td>{{date('d/m/Y',strtotime($officeOrder['publish_date']))}}</td> 
                          <td><span class="badge {{ $officeOrder['status'] == 1 ? 'badge-success' : 'badge-danger' }}">{{ $officeOrder['status'] == 1 ? 'Active' : 'Inactive' }}</span></td>
                          <td><a href="{{ route('noc.edit',$officeOrder->id) }}" class="btn btn-primary btn-flat btn-sm">
                                <i class="fas fa-edit"></i>
                              </a>  
                              @if($officeOrder['status'] == 1)
                                <a class="statuschange btn btn-sm btn-success" title="Inactive" data-id="{{$officeOrder->id}}" data-action="0" data-route="{{route('noc.status_change')}}" data-token="{{csrf_token()}}" href="">
                                  <i class="fa fa-check" aria-hidden="true"></i>
                                    Acitve
                                </a>
                                @else
                                <a class="statuschange btn btn-sm btn-danger" title="Inactive" data-id="{{$officeOrder->id}}" data-action="1" data-route="{{route('noc.status_change')}}" data-token="{{csrf_token()}}" href="">
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
