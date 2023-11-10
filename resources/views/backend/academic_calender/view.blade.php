@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark"> @lang('List of Academic Calendar')</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Academic Calendar')</li>
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
          <h5>@lang('Academic Calendar') @lang('List')
            {{-- <a class="btn btn-sm btn-success float-right" href="{{ route('setup.manage_department.new_department_from_api') }}"><i class="fa fa-plus-circle"></i> @lang('Academic Calendar') @lang(' Api')</a> --}}
            <a class="btn btn-sm btn-info float-right" href="{{ route('setup.academic_calender.add') }}" style="margin-right: 2px;"><i class="fa fa-plus-circle"></i> @lang('Academic Calendar') @lang('Add')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th width="5%">@lang('SL')</th>
                  <th width="20%">@lang('Title')</th>
                  <th width="30%">@lang('Program')</th>
                  <th width="30%">@lang('Program Title')</th>
                  <th width="10%">@lang('Add More')</th>

                </tr>
              </thead>
              <tbody>

              @foreach($academics as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                  <td>{{@$item->title}}</td>
                  <td>{{@$item->program->program_title}}</td>
                  <td>{{@$item->department->name}}</td>
                  {{-- <td>{{@$item->publish_date}}</td> --}}
                  <td>
                      <a class="btn btn-sm btn-primary" title="Edit" href="{{route('setup.academic_calender.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
                      {{-- <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$dept->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.manage_department.delete')}}"><i class="fa fa-trash"></i></a> --}}
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
