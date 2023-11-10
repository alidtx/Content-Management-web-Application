@extends('backend.layouts.app')
@section('content')
<style type="text/css">
  .i-style{
        display: inline-block;
        padding: 10px;
        width: 2em;
        text-align: center;
        font-size: 2em;
        vertical-align: middle;
        color: #444;
  }
  .demo-icon{cursor: pointer; }
</style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark">View Profile</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('View Profile')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5>
          @if(isset($editData))
          @lang('View') @lang('Profile')
          @else
          @lang('View') @lang('Profile')
          @endif
          <a class="btn btn-sm btn-success float-right" href="{{route('manage_profile.from_api')}}"><i class="fa fa-list"></i> @lang('Profile') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData)?route('setup.manage_faculty.update',$editData->id):route('setup.manage_faculty.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            {{-- <div class="form-row">
              <div class="form-group col-md-6">
                <label for="faculty_name">@lang('Faculty Name')</label>
                <input id="faculty_name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{@$editData->name}}" placeholder="Faculty Name">
                 @error('name')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="ucam_faculty_id">@lang('Ucam Faculty ID')</label>
                <input id="ucam_faculty_id" type="text" name="ucam_faculty_id" class="form-control  @error('ucam_faculty_id') is-invalid @enderror" value="{{@$editData->ucam_faculty_id}}" placeholder="Ucam Faculty ID">
                 @error('ucam_faculty_id')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
              </div>
            </div> --}}
            {{-- @php dd(@$clientdatas[0]['BupNo']); @endphp --}}
            <b style="display: inline;">Id: </b><p style="display: inline;">{{ @$clientdatas[0]['$id'] }}</p><br>
            <b style="display: inline;">BupNo: </b><p style="display: inline;">{{ @$clientdatas[0]['BupNo'] }}</p><br>
            <b style="display: inline;">NameEng: </b><p style="display: inline;">{{ @$clientdatas[0]['NameEng'] }}</p><br>
            <b style="display: inline;">NameBng: </b><p style="display: inline;">{{ @$clientdatas[0]['NameBng'] }}</p><br>
            <b style="display: inline;">Email: </b><p style="display: inline;">{{ @$clientdatas[0]['Email'] }}</p><br>
            <b style="display: inline;">Designation: </b><p style="display: inline;">{{ @$clientdatas[0]['Designation'] }}</p><br>
            <b style="display: inline;">Phone: </b><p style="display: inline;">{{ @$clientdatas[0]['Phone'] }}</p><br>
            <b style="display: inline;">Mobile: </b><p style="display: inline;">{{ @$clientdatas[0]['Mobile'] }}</p><br>
            <b style="display: inline;">BloodGroup: </b><p style="display: inline;">{{ @$clientdatas[0]['BloodGroup'] }}</p><br>
            <b style="display: inline;">Rank: </b><p style="display: inline;">{{ @$clientdatas[0]['Rank'] }}</p><br>
            <b style="display: inline;">AppointmentType: </b><p style="display: inline;">{{ @$clientdatas[0]['AppointmentType'] }}</p><br>
            <b style="display: inline;">Department: </b><p style="display: inline;">{{ @$clientdatas[0]['Department'] }}</p><br>
            <b style="display: inline;">DetailEducation: </b><p style="display: inline;">{{ @$clientdatas[0]['DetailEducation'] }}</p><br>
            <b style="display: inline;">Experience: </b><p style="display: inline;">{{ @$clientdatas[0]['Experience'] }}</p><br>
            <b style="display: inline;">PhotoPath: </b><img src="{{ @$clientdatas[0]['PhotoPath'] }}"><br>
            <b style="display: inline;">DepartmentId: </b><p style="display: inline;">{{ @$clientdatas[0]['DepartmentId'] }}</p><br>
            <b style="display: inline;">FacultyId: </b><p style="display: inline;">{{ @$clientdatas[0]['FacultyId'] }}</p><br>
            <b style="display: inline;">Faculty: </b><p style="display: inline;">{{ @$clientdatas[0]['Faculty'] }}</p><br>
            {{-- <b>Journal:</b><br>
            @foreach(@$clientdatas[0]['Journal'] as $journal)
            <b style="display: inline; margin-left: 30px;">Id: </b><p style="display: inline;">{{ $journal['$id']}}</p><br>
            <b style="display: inline; margin-left: 30px;">Sl: </b><p style="display: inline;">{{ $journal['Sl']}}</p><br>
            <b style="display: inline; margin-left: 30px;">NoOfJournal: </b><p style="display: inline;">{{ $journal['NoOfJournal']}}</p><br>
            <b style="display: inline; margin-left: 30px;">JournalDetail: </b><p style="display: inline;">{!! $journal['JournalDetail']!!}</p><br>
            @endforeach --}}
          </div>
        </form>
      <!--Form End-->
    </div>
  </div>
</div>

<script type="te  
@endsection
