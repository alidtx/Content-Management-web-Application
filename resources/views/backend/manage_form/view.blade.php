@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> @lang('List of Form')</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Form')</li>
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
          <h5>@lang('Form') @lang('List')
            <a class="btn btn-sm btn-success float-right" href="{{ route('setup.manage_department.new_department_from_api') }}"><i class="fa fa-plus-circle"></i> @lang('Form') @lang(' Api')</a>
            <a class="btn btn-sm btn-info float-right" href="{{ route('setup.manage_form.add') }}" style="margin-right: 2px;"><i class="fa fa-plus-circle"></i> @lang('Form') @lang('Add')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Title')</th>
                  <th>@lang('Publish Date')</th>
                  <th>@lang('Add More')</th>

                </tr>
              </thead>
              <tbody>

              @foreach($form as $item)
              <tr>
                <td>{{$loop->iteration}}</td>
                  <td>{{@$item->title}}</td>
                  <td>{{@$item->publish_date}}</td>
                  <td>
                      <a class="btn btn-sm btn-success" title="Edit" href="{{route('setup.manage_form.edit', $item->id)}}"><i class="fa fa-edit"></i></a>
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
