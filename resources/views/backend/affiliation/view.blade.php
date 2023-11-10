@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark"> @lang('List of Affiliation')</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Affiliation')</li>
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
          <h5>@lang('Affiliation') @lang('List')
            <a class="btn btn-sm btn-primary float-right" href="{{ route('setup.affiliation.add') }}"><i class="fa fa-plus-circle"></i> @lang('Affiliation') @lang('Add')</a>
            <a class="btn btn-sm btn-primary float-right" href="{{ route('affiliation.api') }}"  style="margin-right: 2px;"><i class="fa fa-plus-circle"></i> @lang('Affiliation') @lang('API')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Institute Name')</th>
                  <th>@lang('Institute Type')</th>
                  <th>@lang('Institute Location')</th>
                  <th>@lang('Logo')</th>
                  <th style="width:10%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
                @foreach($affiliations as $affiliation)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$affiliation->inst_name}}</td>
                  <td>{{@$affiliation->institution_type}}</td>
                  <td>{{@$affiliation->location}}</td>
                  <td><img src="{{asset('public/upload/affiliation/'.@$affiliation->image) }}" height="60"></td>
                  <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{route('setup.affiliation.edit',@$affiliation->id)}}"><i class="fa fa-edit"></i></a>
                    {{-- <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{@$affiliation->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.affiliation.delete')}}"><i class="fa fa-trash"></i></a> --}}
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
