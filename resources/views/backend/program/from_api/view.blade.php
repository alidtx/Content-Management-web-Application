@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark"> @lang('List of Programs')</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Program From Api')</li>
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
          <h5>@lang('Program') @lang('List') @lang('From') @lang('Api')
            <a class="btn btn-sm btn-primary float-right" href="{{ route('setup.program.program_from_api.store') }}"><i class="fa fa-plus-circle"></i> @lang('Program') @lang('Add') @lang('To DB')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Program Category')</th>
                  <th>@lang('Faculty')</th>
                  <th>@lang('Program Title')</th>
                  <th>@lang('Short Title')</th>
                  <th>@lang('Ucam Program ID')</th>
                  <th>@lang('Duration')</th>
                  <th>@lang('Total Credit')</th>
                  {{-- <th style="width:10%">@lang('Action')</th> --}}
                </tr>
              </thead>
              <tbody>
                @foreach($clientdata as $program)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$program['ProgramType']}}</td>
                  <td>{{@$program['FacultyId']}}</td>
                  <td>{{@$program['DetailName']}}</td>
                  <td>{{@$program['ShortName']}}</td>
                  <td>{{@$program['ProgramID']}}</td>
                  <td>{{@$program['Duration']}}</td>
                  <td>{{@$program['TotalCredit']}}</td>
                
                  {{-- <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{route('setup.program.edit',@$program->id)}}"><i class="fa fa-edit"></i></a>
                  </td> --}}
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>

@endsection
