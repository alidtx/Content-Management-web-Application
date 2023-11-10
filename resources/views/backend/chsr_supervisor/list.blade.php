@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark">Researcher Lists</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Supervisor List')</li>
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
          <h5>Supervisor List
            {{-- <a class="btn btn-sm btn-success float-right" href="{{ route('setup.manage_faculty.new_faculty_from_api') }}"><i class="fa fa-list"></i> PhD</a> --}}
            {{-- <a class="btn btn-sm btn-info float-right" href="{{ route('setup.manage_faculty.add') }}" style="margin-right: 2px;"><i class="fa fa-plus-circle"></i> MPhil</a> --}}
            <a class="btn btn-sm btn-primary float-right" href="{{ route('chsr.supervisor.create') }}" style="margin-right: 2px;"><i class="fa fa-plus-circle"></i> Add New</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Name')</th>
                  {{-- <th>@lang('Prgram')</th> --}}
                  <th>@lang('Program Category')</th>
                  <th style="width:10%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($supervisor_list as $list )
               <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$list->profile->nameEn}}</td>
                  <td>{{$list->program_category->program_category}}</td>
                  {{-- <td>{{$list->program_category->program_category}}</td> --}}
                  <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{route('chsr.supervisor.edit',$list->id)}}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-danger btn-sm delete" id="delete" title="Delete" data-id="{{ $list->id }}" data-token={{csrf_token()}} data-route="{{ route('chsr.supervisor.delete') }}"><i class="fa fa-trash"></i></a>
                    {{-- <a class="btn btn-sm btn-info" title="view" href="{{route('chsr.supervisor.view',$list->id)}}"><i class="fa fa-list"></i></a> --}}
                    {{-- <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$faculty->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.manage_faculty.delete')}}"><i class="fa fa-trash"></i></a> --}}
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
