@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark"> @lang("Dean's Honor Board")</h4>
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
            <a class="btn btn-sm btn-success float-right" href="{{ route('dean-office.honor_board.add') }}"><i class="fa fa-plus-circle"></i> @lang('Add') @lang('New')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('Sl')</th>
                  <th>@lang('Name')</th>
                  <th>@lang('Designation')</th>
                  <th>@lang('Faculties')</th>
                  <th>@lang('Departments')</th>
                  <th style="width:13%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allData as $key => $data)
                @php
                // if($key == 0)
                // {
                //   dd($data);
                // }
                @endphp
                <tr>
                  <th>{{ $loop->iteration }}</th>
                  <td>{{ @$data->name }}</td>
                  <td>{{ @$data->designation }}</td>
                  <td>{{ @$data->fname }}</td>
                  <td>{{ @$data->dname }}</td>
                  <td>
                    <a class="btn btn-sm btn-success" title="Edit" href="{{route('dean-office.honor_board.edit',@$data->id)}}"><i class="fa fa-edit"></i></a>
                    @if(@$data->status == 1)
                    <a class="statuschange btn btn-sm btn-success" title="Inactive" data-id="{{@$data->id}}" data-action="0" data-route="{{route('dean-office.honor_board.status_change')}}" data-token="{{csrf_token()}}" href="">
                      <i class="fa fa-check" aria-hidden="true"></i>
                        Active
                    </a>
                    @else
                    <a class="statuschange btn btn-sm btn-danger" title="Inactive" data-id="{{@$data->id}}" data-action="1" data-route="{{route('dean-office.honor_board.status_change')}}" data-token="{{csrf_token()}}" href="">
                      <i class="fa fa-ban" aria-hidden="true"></i>
                        Inactive
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
