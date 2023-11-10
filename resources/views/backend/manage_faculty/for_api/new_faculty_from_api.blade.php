@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark"> @lang('New Faculties from API')</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('New Faculties')</li>
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
      <div class="card">
        <div class="card-header">
          <h5>@lang('New Faculties') @lang('List from API')
            @if(!empty($clientdatas))
            <a class="btn btn-sm btn-info float-right" href="{{ route('setup.manage_faculty.insert_all_faculty_to_db') }}"><i class="fa fa-plus-circle"></i> @lang('Insert All to') @lang('DB')</a>
            @endif
            <a style="margin-right: 3px;" class="btn btn-sm btn-success float-right" href="{{ route('setup.manage_faculty') }}"><i style="margin-right: 3px;" class="fa fa-list"></i>All Faculty</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('Sl')</th>
                  <th>@lang('Faculty ID')</th>
                  <th>@lang('Faculty Name')</th>
                  {{-- <th style="width:13%">@lang('Action')</th> --}}
                </tr>
              </thead>
              <tbody>
              @foreach ($clientdatas as $clientdata )
               <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$clientdata['FacultyId']}}</td>
                  <td>{{@$clientdata['Faculty']}}</td>
                  {{-- <td>
                    <a class="btn btn-sm btn-success" title="View" href="{{ route('manage_profile.from_api.view_single_profile',@$clientdata['BupNo']) }}"><i class="fa fa-eye"></i></a>
                    <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$faculty->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.manage_faculty.delete')}}"><i class="fa fa-trash"></i></a>         
                  </td> --}}
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
