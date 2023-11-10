@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark"> @lang('Personnels to Faculty')</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Personnels to Faculty')</li>
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
          <h5>@lang('Personnels to Faculty List')
            <a class="btn btn-sm btn-primary float-right" href="{{ route('manage_profile.personnels_to_faculty.add') }}"><i class="fa fa-plus-circle"></i> @lang('Add ') @lang('New')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Name')</th>
                  <th>@lang('Faculty')</th>
                  <th>@lang('Department')</th>
                  <th style="width:13%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($profiles as $profile)
              @php
              // dd($profile->faculty);
              @endphp
               <tr>
                  <td>{{@$loop->iteration}}</td>
                  <td>{{@$profile->profile->nameEn}}</td>
                  <td>{{@$profile->faculty->name}}</td>
                  <td>{{@$profile->department->name}}</td>
                  <td>
                      <a class="btn btn-sm btn-primary" title="Edit" href="{{ route('manage_profile.personnels_to_faculty.edit',@$profile['id']) }}"><i class="fa fa-edit"></i></a>
                      @if(@$profile->status == 1)
                      <a class="statuschange btn btn-sm btn-success" title="Active" data-id="{{@$profile->id}}" data-action="0" data-route="{{route('personnels_to_faculty.status_change')}}" data-token="{{csrf_token()}}" href="">
                        <i class="fa fa-check" aria-hidden="true"></i>
                          Active
                      </a>
                      @else
                      <a class="statuschange btn btn-sm btn-danger" title="Inactive" data-id="{{@$profile->id}}" data-action="1" data-route="{{route('personnels_to_faculty.status_change')}}" data-token="{{csrf_token()}}" href="">
                        <i class="fa fa-ban" aria-hidden="true"></i>
                          Inactive
                      </a>
                      @endif
                    {{-- <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{@$profile['id']}}" data-token="{{csrf_token()}}" data-route="{{route('manage_profile.personnels_to_faculty.delete')}}"><i class="fa fa-trash"></i></a> --}}
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
