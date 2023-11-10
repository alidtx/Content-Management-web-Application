@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark"> @lang('List of Faculties')</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Faculty')</li>
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
          <h5>@lang('Faculty') @lang('List')
            <a class="btn btn-sm btn-success float-right" href="{{ route('setup.manage_faculty.new_faculty_from_api') }}"><i class="fa fa-list"></i> @lang('New Faculty') @lang('from Api')</a>
            <a class="btn btn-sm btn-primary float-right" href="{{ route('setup.manage_faculty.add') }}" style="margin-right: 2px;"><i class="fa fa-plus-circle"></i> @lang('Faculty') @lang('Add')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Faculty Name')</th>
                  <th>@lang('Ucam Faculty ID')</th>
                  <th>@lang('Image')</th>
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
              @foreach ($data as $faculty )
               <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{$faculty->name}}</td>
                  <td>{{$faculty->ucam_faculty_id}}</td>
                  <td><img src="{{asset('public/upload/faculty/'.$faculty['image']) }}" width="80" height="80"></td>
                  <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{route('setup.manage_faculty.edit',$faculty->id)}}"><i class="fa fa-edit"></i></a>
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
