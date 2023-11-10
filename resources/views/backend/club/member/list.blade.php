@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark"> @lang('List of Club')</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Club')</li>
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
          <h5>@lang('Club Member') @lang('Lists')
            <a class="btn btn-sm btn-primary float-right" href="{{ route('club.member.add') }}"><i class="fa fa-plus-circle"></i> @lang('Member') @lang('Add')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Student Name')</th>
                  <th>@lang('ID')</th>
                  <th>@lang('Club Name')</th>
                  <th>@lang('Designation')</th>
                  <th>@lang('Status')</th>
                  <th>@lang('Image')</th>
                  <th style="width:8%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
                @php
                    $i=1
                @endphp
                @foreach($club_members as $index => $club_member)
                  @if(count($club_member->member_detail) > 0)
                    @foreach ($club_member->member_detail as $detail)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $club_member->name }}</td>
                        <td>{{ $club_member->student_id }}</td>
                        {{-- <td>{{ optional($club_member->member_detail)->name }}</td> --}}
                        <td>{{ !empty($detail->c_name) ? $detail->c_name : 'Not Assign' }}</td>
                        <td>{{ isset($detail->d_name) ? $detail->d_name : 'Not Assign'}}</td>
                        <td>{{ $club_member->status == 1 ? 'Active' : 'Inactive' }}</td>
                        <td>
                            <img src="{{asset('public/upload/club/member/image/'.$club_member->image)}}" onerror="this.onerror=null;this.src='{{asset('public/upload/no_image.jpg')}}';" alt="club_member_image">
                        </td>
                        <td>
                            {{-- <a href="" class="btn btn-primary btn-sm" title="Event List"><i class="fa fa-list"></i></a> --}}
                            <a href="{{route('club.member.edit',$club_member->id)}}" class="btn btn-primary btn-sm" title="Edit Club"><i class="fa fa-edit"></i></a>
                        </td>
                    </tr>
                    @endforeach
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
