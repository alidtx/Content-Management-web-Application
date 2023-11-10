@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark"> @lang('New Personnels from API')</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('New Personnels')</li>
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
          <h5>@lang('New Personnels') @lang('List from API')
            @if(!empty($clientdatas))
            <a class="btn btn-sm btn-info float-right" href="{{ route('manage_profile.from_api.insertAllToDB') }}"><i class="fa fa-plus-circle"></i> @lang('Insert All to') @lang('DB')</a>
            @endif
            <a style="margin-right: 3px;" class="btn btn-sm btn-success float-right" href="{{ route('manage_profile.from_database') }}"><i style="margin-right: 3px;" class="fa fa-list"></i>All Personnels</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SI')</th>
                  <th>@lang('Bup No.')</th>
                  <th>@lang('Name')</th>
                  <th>@lang('Email')</th>
                  <th style="width:13%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
                {{-- @foreach($user as $u)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$u['name']}}</td>
                  <td>{{$u['email']}}</td>
                  <td>{{@$u['user_roles']['role_details']['name']}}</td>
                  <td><span class="badge {{ $u['status'] == 1 ? 'badge-success' : 'badge-danger' }}">{{ $u['status'] == 1 ? (session()->get('language') == 'en' ? 'Active' : 'Active') : (session()->get('language') == 'en' ? 'Inactive' : 'Inactive') }}</span></td>
                  <td>
                    <a class="btn btn-sm btn-success" title="Edit" href="{{route('user.edit',$u->id)}}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$u->id}}" data-token="{{csrf_token()}}" href="{{route('user.delete')}}"><i class="fa fa-trash"></i></a>
                    <a class="delete btn btn-sm btn-danger" data-id="{{$u['id']}}" data-table="users"><i class="fa fa-trash"></i></a>
                </td>
              </tr>
              @endforeach --}}
              {{-- @foreach ($data as $faculty )
               <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$faculty->name}}</td>
                  <td>{{$faculty->ucam_faculty_id}}</td>
                  <td>
                    <a class="btn btn-sm btn-success" title="Edit" href="{{route('setup.manage_faculty.edit',$faculty->id)}}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$faculty->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.manage_faculty.delete')}}"><i class="fa fa-trash"></i></a>                    
                  </td>
              </tr> 
              @endforeach --}}
              @foreach ($clientdatas as $clientdata )
               <tr>
                  {{-- <td>{{@$clientdata['$id']}}</td> --}}
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$clientdata['BupNo']}}</td>
                  <td>{{@$clientdata['NameEng']}}</td>
                  <td>{{@$clientdata['Email']}}</td>
                  <td>
                    @if(@$clientdata['BupNo'])
                      <a class="btn btn-sm btn-success" title="View" href="{{ route('manage_profile.from_api.view_single_profile',@$clientdata['BupNo']) }}"><i class="fa fa-eye"></i></a>
                    @else
                      <a class="btn btn-sm btn-success" title="View" href="{{ route('manage_profile.from_api.view_single_profile',@$clientdata['NameEng']) }}"><i class="fa fa-eye"></i></a>
                      @endif
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
