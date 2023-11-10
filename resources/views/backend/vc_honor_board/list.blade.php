@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark"> VC's Honor Board Member</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">VC's Honor Board Member</li>
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
          <h5>VC's Honor Board Member
            <a class="btn btn-sm btn-primary float-right" href="{{ route('vc.honor.board.create') }}" style="margin-right: 2px;"><i class="fa fa-plus-circle"></i> @lang('Add New')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Name')</th>
                  <th>@lang('Designation')</th>
                  <th>@lang('Start Date')</th>
                  <th>@lang('End Date')</th>
                  <th style="width:13%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($vc_honor_board_list as $member )
               <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$member->name}}</td>
                  <td>{{$member->designation}}</td>
                  <td>{{$member->start_date}}</td>
                  <td>{{$member->end_date}}</td>
                  <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{route('vc.honor.board.edit',$member->id)}}"><i class="fa fa-edit"></i></a>
                    {{-- <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$faculty->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.manage_faculty.delete')}}"><i class="fa fa-trash"></i></a>                     --}}
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
