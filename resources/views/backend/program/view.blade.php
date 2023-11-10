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
            <li class="breadcrumb-item active">@lang('Program')</li>
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
          <h5>@lang('Program') @lang('List')
            <a class="btn btn-sm btn-primary float-right" href="{{ route('setup.program.add') }}"><i class="fa fa-plus-circle"></i> @lang('Program') @lang('Add')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Program Category')</th>
                  <th>@lang('Faculty')</th>
                  <th>@lang('Department')</th>
                  <th>@lang('Program Title')</th>
                  <th>@lang('Ucam Program ID')</th>
                  <th>@lang('Admission ON/OFF')</th>
                  <th style="width:10%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
                @foreach($programs as $program)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$program->program_category->program_category}}</td>
                  <td>{{@$program->faculty->name}}</td>
                  <td>{{@$program->department->name}}</td>
                  <td>{{@$program->program_title}}</td>
                  <td>{{@$program->ucam_program_id}}</td>
                  <td>
                    @if(@$program->is_admission == 0)
                    <a onclick="event.preventDefault(); document.getElementById('approve_program_form{{@$program->id}}').submit();" class="btn btn-danger" style="background: #e99e9e;"><i class="fa fa-times"></i></a>
                    @else
                    <a onclick="event.preventDefault(); document.getElementById('approve_program_form{{@$program->id}}').submit();" class="btn btn-success" style="background: #8AC53C;"><i class="fa fa-check"></i></a>
                    @endif
                    <form style="display: none;" method="post" id="approve_program_form{{@$program->id}}" action="{{route('program.approve',@$program->id)}}">
                        @csrf
                        <input type="hidden" name="is_admission" @if(@$program->is_admission == 1) value="0" @else value="1" @endif>
                    </form>
                  </td>
                  <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{route('setup.program.edit',@$program->id)}}"><i class="fa fa-edit"></i></a>
                    {{-- <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{@$program->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.program.delete')}}"><i class="fa fa-trash"></i></a> --}}
                </td>
              </tr>
              @endforeach
              {{-- <tr>
                <td>1</td>
                <td>Program Category 1</td>
                <td>Faculty 1</td>
                <td>Department 1</td>
                <td>Program Title 1</td>
                <td>Ucam Program ID 1</td>
                <td></td>
              </tr> --}}
            </tbody>
          </table>
        </div>
      </div>
    </div>

@endsection
