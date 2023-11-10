@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark"> @lang('Modified Personnels in API')</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Modified Personnels')</li>
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
          <h5>@lang('Modified Personnels') @lang('List in API')
            <a class="btn btn-sm btn-success float-right" href="{{ route('manage_profile.from_database') }}"><i style="margin-right: 3px;" class="fa fa-list"></i>All Personnels</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('ID')</th>
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
                @php
                $profileFromDB = DB::table('profiles')->where('bup_no',@$clientdata['BupNo'])->first();
                @endphp
                @if(@$profileFromDB->bup_no == @$clientdata['BupNo'] && @$profileFromDB->faculty_id == @$clientdata['FacultyId'] && @$profileFromDB->department_id == @$clientdata['DepartmentId'] && @$profileFromDB->nameEn == @$clientdata['NameEng'] && @$profileFromDB->nameBn == @$clientdata['NameBng'] && @$profileFromDB->email == @$clientdata['Email'] && @$profileFromDB->designation == @$clientdata['Designation'] && @$profileFromDB->phone == @$clientdata['Phone'] && @$profileFromDB->mobile == @$clientdata['Mobile'] && @$profileFromDB->blood_group == @$clientdata['BloodGroup'] && @$profileFromDB->rank == @$clientdata['Rank'] && @$profileFromDB->appointment_type == @$clientdata['AppointmentType'] && @$profileFromDB->detail_education == @$clientdata['DetailEducation'] && @$profileFromDB->experience == @$clientdata['Experience'] && @$profileFromDB->photo_path == @$clientdata['PhotoPath'])
                  {{-- Nothing Here --}}
                @else
                {{-- <pre>@php print_r(@$profileFromDB); @endphp</pre>
                <pre>@php print_r(@$clientdata); @endphp</pre> --}}
                  <tr>
                    <td>{{@$clientdata['$id']}}</td>
                    <td>{{@$clientdata['BupNo']}}</td>
                    <td>{{@$clientdata['NameEng']}}</td>
                    <td>{{@$clientdata['Email']}}</td>
                    <td style="width: 15%;">
                        {{-- <a class="btn btn-sm btn-info" title="Changed">Changed</a> --}}
                        {{-- <a class="btn btn-sm btn-success" title="Edit"><i class="fa fa-edit"></i></a> --}}
                        <a class="btn btn-sm btn-success" title="Edit" href="{{ route('manage_profile.from_database.edit_modified_personnels',@$profileFromDB->bup_no) }}"><i class="fa fa-edit"></i></a>
                      {{-- <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$faculty->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.manage_faculty.delete')}}"><i class="fa fa-trash"></i></a>                     --}}
                    </td>
                  </tr> 
                @endif
              @endforeach

            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

@endsection
