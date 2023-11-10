@extends('backend.layouts.app')
@section('content')
<style>
    .select2-container .select2-selection--single {
      height: 35px;
    }
  </style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark">{{ !empty($editData)? "Update":"Add" }} Personnels to Faculty</h4> --}}
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

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card card-outline card-info">
      <div class="card-header">
        <h5>
          @if(isset($editData))
          @lang('Update') @lang('Personnels to Faculty')
          @else
          @lang('Add') @lang('Personnels to Faculty')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('manage_profile.personnels_to_faculty')}}"><i class="fa fa-list"></i> @lang('View') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <div class="card-body">
        <form method="post" action="{{(@$editData)?route('manage_profile.personnels_to_faculty.update',$editData->id):route('manage_profile.personnels_to_faculty.store')}}" id="" enctype="multipart/form-data">
          @csrf
          <div>
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="profile_id">@lang('Personnels')</label>
                @php
                  $personnelsToFacultiesIds = App\Models\PersonnelsToFaculty::pluck('profile_id');
                  if(!empty($editData))
                  {
                    $profiles = App\Models\Profile::all();
                  }
                  else {
                    $profiles = App\Models\Profile::whereNotIn('id',$personnelsToFacultiesIds)->get();
                  }
                  //dd($editData);
                @endphp
                <select @if(!empty($editData)) disabled @endif name="profile_id" class="form-control select2 @error('profile_id') is-invalid @enderror">
                  <option disabled selected value="">@lang('Select')</option>
                  @foreach ($profiles as $profile )
                      <option value="{{@$profile->id}}" {{(@$editData->profile_id == @$profile->id)?"selected":""}}>{{@$profile->nameEn}}</option>
                  @endforeach
                </select>
                @if(!empty($editData))
                <input type="hidden" value="{{ $editData->profile_id }}">
                @endif
                @error('profile_id')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> 
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="faculty_id">@lang('Faculty Name') {{-- <span class="text-red">*</span> --}}</label>
                @php
                  $faculties = App\Models\Faculty::all();
                @endphp
                <select id="faculty_id" name="faculty_id" class="form-control select2 @error('faculty_id') is-invalid @enderror">
                  <option disabled selected value="">@lang('Select')</option>
                  @foreach ($faculties as $faculty )
                      <option value="{{@$faculty->id}}" {{(@$editData->faculty_id == @$faculty->id)?"selected":""}}>{{@$faculty->name}}</option>
                  @endforeach
                </select>
                  @error('faculty_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                  @enderror
              </div>
              <div class="form-group col-sm-6">

                @php
                if(!empty($editData) && !empty($editData->faculty_id))
                {
                    $departmentInfos = \App\Models\Department::where('faculty_id',$editData->faculty_id)->get();
                }
                @endphp

                <label class="control-label">Department</label>
                <select id="department_id" class="form-control form-control-sm select2" name="department_id">
                    <option disabled selected value="">@lang('Select')</option>
                    @if(!empty($editData) && !empty($departmentInfos))
                        @foreach($departmentInfos as $departmentInfo)
                            <option @if( !empty($editData) && $editData->department_id == $departmentInfo->id) selected @endif value="{{ $departmentInfo->ucam_department_id }}">{{ $departmentInfo->name }}</option>                 
                        @endforeach
                    @endif
                </select>
                @error('department_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                @enderror
            </div>
              {{-- <div class="form-group col-md-6">
                <label for="office_id">@lang('Office Name')</label>
                @php
                  $offices = App\Models\Office::all();
                @endphp
                <select name="office_id" class="form-control select2 @error('office_id') is-invalid @enderror">
                  <option disabled selected value="">@lang('Select')</option>
                  @foreach ($offices as $office )
                      <option value="{{@$office->ucam_office_id}}" {{(@$editData->office_id == @$office->ucam_office_id)?"selected":""}}>{{@$office->name}}</option>
                  @endforeach
                </select>
                  @error('office_id')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                  @enderror
              </div> --}}
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-info">{{(@$editData)?"Update":"Save"}}</button>
              </div>
            </div>
          </div>
        </form>
        <!--Form End-->
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
    
    $(document).on('select change','#faculty_id',function(){
        var faculty_id = $('#faculty_id').val();
        console.log(faculty_id);
        $.ajax({
            url: "{{ route('faculty_wise_department') }}",
            type: "GET",
            data: { faculty_id: faculty_id },
            success: function(data)
            {
                //console.log(data);
                if(data != 'fail')
                {
                    $('#department_id').empty();
                    $('#department_id').append('<option disabled selected value ="">Select Department</option>');
                    $.each(data,function(index,subcatObj){
                        $('#department_id').append('<option value ="'+subcatObj.ucam_department_id+'">'+subcatObj.name +'</option>');
                    });
                }
                else
                {
                    console.log('failed');
                }
            }
        });
    });
  
</script>


@endsection
