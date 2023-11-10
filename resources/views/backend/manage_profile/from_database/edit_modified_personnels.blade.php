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
<style>
    .select2-container .select2-selection--single {
      height: 35px;
    }
</style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark">{{ !empty($editData)? "Update":"Add" }} Modified Personnels</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Modified Personnel')</li>
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
          @lang('Update') @lang('Modified Personnel')
          @else
          @lang('Add') @lang('Modified Personnel')
          @endif
          <a class="btn btn-sm btn-success float-right" href="{{route('manage_profile.from_database.updated_list_in_faculty_api')}}"><i class="fa fa-list"></i> @lang('All') @lang('Modified Personnels')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData)?route('manage_profile.from_database.update_modified_personnels',$editData->bup_no):route('manage_profile.from_database.update_modified_personnels',$editData->bup_no)}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="faculty_id" @if(@$apiDatas[0]['FacultyId'] != @$editData->faculty_id) style="color:red;" @endif>@lang('Faculty Name') {{-- <span class="text-red">*</span> --}}</label>
                @php
                 $faculties = App\Models\Faculty::all();
                @endphp
                <select name="faculty_id" class="form-control select2 @error('faculty_id') is-invalid @enderror">
                  <option disabled selected value="">@lang('Select')</option>
                  @foreach ($faculties as $faculty )
                      <option value="{{@$faculty->ucam_faculty_id}}" {{(@$editData->faculty_id == @$faculty->ucam_faculty_id)?"selected":""}}>{{@$faculty->name}}</option>
                  @endforeach
                </select>
                 @error('faculty_id')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror
              </div>
              {{-- @php
                dd(@$apiDatas[0]['FacultyId']);
              @endphp --}}
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['FacultyId'] != @$editData->faculty_id) style="color:red;" @endif>@lang('Faculty Name from API') {{-- <span class="text-red">*</span> --}}</label>
                {{-- <select disabled name="" class="form-control select2">
                  <option value="{{@$apiDatas[0]['FacultyId']}}" selected>{{@$apiDatas[0]['Faculty']}}</option>
                </select> --}}
                <input id="" type="text" name="" class="form-control" value="{{@$apiDatas[0]['Faculty']}}" placeholder="" readonly>
              </div>
              @php
                $departments = App\Models\Department::all();
              @endphp
              <div class="form-group col-md-6">
                <label for="department_id" @if(@$apiDatas[0]['DepartmentId'] != @$editData->department_id) style="color:red;" @endif>@lang('Department Name') {{-- <span class="text-red">*</span> --}}</label>
                <select name="department_id" class="form-control select2 @error('department_id') is-invalid @enderror">
                  <option disabled selected value="">@lang('Select')</option>
                  @foreach ($departments as $department )
                      <option value="{{@$department->ucam_department_id}}" {{(@$editData->department_id == @$department->ucam_department_id)?"selected":""}}>{{@$department->name}}</option>
                  @endforeach
                </select>
                 @error('department_id')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['DepartmentId'] != @$editData->department_id) style="color:red;" @endif>@lang('Department Name from API') {{-- <span class="text-red">*</span> --}}</label>
                {{-- <select disabled name="" class="form-control select2">
                  <option value="{{@$apiDatas[0]['DepartmentId']}}" selected>{{@$apiDatas[0]['Department']}}</option>
                </select> --}}
                <input id="" type="text" name="" class="form-control" value="{{@$apiDatas[0]['Department']}}" placeholder="" readonly>
              </div>
              @php
                $offices = App\Models\Office::all();
              @endphp
              <div class="form-group col-md-6">
                <label for="office_id" @if(@$apiDatas[0]['OfficeId'] != @$editData->office_id) style="color:red;" @endif>@lang('Office Name') {{-- <span class="text-red">*</span> --}}</label>
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
              </div>
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['OfficeId'] != @$editData->office_id) style="color:red;" @endif>@lang('Office Name from API') {{-- <span class="text-red">*</span> --}}</label>
                {{-- <select disabled name="" class="form-control select2">
                  <option value="{{@$apiDatas[0]['OfficeId']}}" selected>{{@$apiDatas[0]['Office']}}</option>
                </select> --}}
                <input id="" type="text" name="" class="form-control" value="{{@$apiDatas[0]['Office']}}" placeholder="" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="bup_no" @if(@$apiDatas[0]['BupNo'] != @$editData->bup_no) style="color:red;" @endif>@lang('BUP No')</label>
                <input id="bup_no" type="text" name="bup_no" class="form-control  @error('bup_no') is-invalid @enderror" value="{{@$editData->bup_no}}" placeholder="">
                 @error('bup_no')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['BupNo'] != @$editData->bup_no) style="color:red;" @endif>@lang('BUP No from API') {{-- <span class="text-red">*</span> --}}</label>
                <input id="" type="text" name="" class="form-control" value="{{@$apiDatas[0]['BupNo']}}" placeholder="" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="nameEn" @if(@$apiDatas[0]['NameEng'] != @$editData->nameEn) style="color:red;" @endif>@lang('Name (English)')</label>
                <input id="nameEn" type="text" name="nameEn" class="form-control  @error('nameEn') is-invalid @enderror" value="{{@$editData->nameEn}}" placeholder="">
                 @error('nameEn')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['NameEng'] != @$editData->nameEn) style="color:red;" @endif>@lang('Name (English) from API') {{-- <span class="text-red">*</span> --}}</label>
                <input id="" type="text" name="" class="form-control" value="{{@$apiDatas[0]['NameEng']}}" placeholder="" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="nameBn" @if(@$apiDatas[0]['NameBng'] != @$editData->nameBn) style="color:red;" @endif>@lang('Name (Bangla)')</label>
                <input id="nameBn" type="text" name="nameBn" class="form-control  @error('nameBn') is-invalid @enderror" value="{{@$editData->nameBn}}" placeholder="">
                 @error('nameBn')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['NameBng'] != @$editData->nameBn) style="color:red;" @endif>@lang('Name (Bangla) from API') {{-- <span class="text-red">*</span> --}}</label>
                <input id="" type="text" name="" class="form-control" value="{{@$apiDatas[0]['NameBng']}}" placeholder="" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="email" @if(@$apiDatas[0]['Email'] != @$editData->email) style="color:red;" @endif>@lang('Email')</label>
                <input id="email" type="email" name="email" class="form-control  @error('email') is-invalid @enderror" value="{{@$editData->email}}" placeholder="">
                 @error('email')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['Email'] != @$editData->email) style="color:red;" @endif>@lang('Email from API') {{-- <span class="text-red">*</span> --}}</label>
                <input id="" type="text" name="" class="form-control" value="{{@$apiDatas[0]['Email']}}" placeholder="" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="designation" @if(@$apiDatas[0]['Designation'] != @$editData->designation) style="color:red;" @endif>@lang('Designation')</label>
                <input id="designation" type="text" name="designation" class="form-control  @error('designation') is-invalid @enderror" value="{{@$editData->designation}}" placeholder="">
                 @error('designation')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['Designation'] != @$editData->designation) style="color:red;" @endif>@lang('Designation from API') {{-- <span class="text-red">*</span> --}}</label>
                <input id="" type="text" name="" class="form-control" value="{{@$apiDatas[0]['Designation']}}" placeholder="" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="phone" @if(@$apiDatas[0]['Phone'] != @$editData->phone) style="color:red;" @endif>@lang('Phone')</label>
                <input id="phone" type="text" name="phone" class="form-control  @error('phone') is-invalid @enderror" value="{{@$editData->phone}}" placeholder="">
                 @error('phone')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['Phone'] != @$editData->phone) style="color:red;" @endif>@lang('Phone from API') {{-- <span class="text-red">*</span> --}}</label>
                <input id="" type="text" name="" class="form-control" value="{{@$apiDatas[0]['Phone']}}" placeholder="" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="mobile" @if(@$apiDatas[0]['Mobile'] != @$editData->mobile) style="color:red;" @endif>@lang('Mobile')</label>
                <input id="mobile" type="text" name="mobile" class="form-control  @error('mobile') is-invalid @enderror" value="{{@$editData->mobile}}" placeholder="">
                 @error('mobile')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['Mobile'] != @$editData->mobile) style="color:red;" @endif>@lang('Mobile from API') {{-- <span class="text-red">*</span> --}}</label>
                <input id="" type="text" name="" class="form-control" value="{{@$apiDatas[0]['Mobile']}}" placeholder="" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="blood_group" @if(@$apiDatas[0]['BloodGroup'] != @$editData->blood_group) style="color:red;" @endif>@lang('Blood Group')</label>
                <input id="blood_group" type="text" name="blood_group" class="form-control  @error('blood_group') is-invalid @enderror" value="{{@$editData->blood_group}}" placeholder="">
                 @error('blood_group')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['BloodGroup'] != @$editData->blood_group) style="color:red;" @endif>@lang('Blood Group from API') {{-- <span class="text-red">*</span> --}}</label>
                <input id="" type="text" name="" class="form-control" value="{{@$apiDatas[0]['BloodGroup']}}" placeholder="" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="rank" @if(@$apiDatas[0]['Rank'] != @$editData->rank) style="color:red;" @endif>@lang('Rank')</label>
                <input id="rank" type="text" name="rank" class="form-control  @error('rank') is-invalid @enderror" value="{{@$editData->rank}}" placeholder="">
                 @error('rank')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['Rank'] != @$editData->rank) style="color:red;" @endif>@lang('Rank from API') {{-- <span class="text-red">*</span> --}}</label>
                <input id="" type="text" name="" class="form-control" value="{{@$apiDatas[0]['Rank']}}" placeholder="" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="appointment_type" @if(@$apiDatas[0]['AppointmentType'] != @$editData->appointment_type) style="color:red;" @endif>@lang('Appointment Type')</label>
                <input id="appointment_type" type="text" name="appointment_type" class="form-control  @error('appointment_type') is-invalid @enderror" value="{{@$editData->appointment_type}}" placeholder="">
                 @error('appointment_type')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['AppointmentType'] != @$editData->appointment_type) style="color:red;" @endif>@lang('Appointment Type from API') {{-- <span class="text-red">*</span> --}}</label>
                <input id="" type="text" name="" class="form-control" value="{{@$apiDatas[0]['AppointmentType']}}" placeholder="" readonly>
              </div>
              <div class="form-group col-md-6">
                <label for="detail_education" @if(@$apiDatas[0]['DetailEducation'] != @$editData->detail_education) style="color:red;" @endif>@lang('Detail Education')</label>
                <textarea id="detail_education" name="detail_education" class="form-control  @error('detail_education') is-invalid @enderror">{{@$editData->detail_education}}</textarea>
                 @error('detail_education')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for="" @if(@$apiDatas[0]['DetailEducation'] != @$editData->detail_education) style="color:red;" @endif>@lang('Detail Education from API') {{-- <span class="text-red">*</span> --}}</label>
                <textarea id="" name="" class="form-control" readonly>{{@$apiDatas[0]['DetailEducation']}}</textarea>
              </div>
              <div class="form-group col-md-6">
                <label for="experience" @if(@$apiDatas[0]['Experience'] != @$editData->experience) style="color:red;" @endif>@lang('Experience')</label>
                <textarea id="experience" name="experience" class="form-control  @error('experience') is-invalid @enderror">{{@$editData->experience}}</textarea>
                 @error('experience')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-6">
                <label for=""  @if(@$apiDatas[0]['Experience'] != @$editData->experience) style="background:red;" @endif>@lang('Experience from API') {{-- <span class="text-red">*</span> --}}</label>
                <textarea id="" name="" class="form-control" readonly>{{@$apiDatas[0]['Experience']}}</textarea>
              </div>
              <div class="form-group col-md-3">
                <label for="photo_path">@lang('New Photo')</label>
                <input type="file" name="photo_path" class="form-control @error('photo_path') is-invalid @enderror" id="photo_path">
                @error('photo_path')
                <span class="text-red">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-md-3">
                <label for="" @if(@$apiDatas[0]['PhotoPath'] != @$editData->photo_path) style="color: red;" @endif>@lang('Current Photo')</label>
                @if(explode("/",@$editData->photo_path)[0] == "http:" || explode("/",@$editData->photo_path)[0] == "https:")
                    <img src="{{@$editData->photo_path}}" style="height: 80px;" @if(@$apiDatas[0]['PhotoPath'] != @$editData->photo_path) style="background:red;" @endif>
                @else
                    <img src="{{asset('public/upload/profile_images/'.@$editData->photo_path) }}" style="height: 80px; width: 80px;" @if(@$apiDatas[0]['PhotoPath'] != @$editData->photo_path) style="background:red;" @endif>
                @endif
              </div>
              <div class="form-group col-md-3">
                <label @if(@$apiDatas[0]['PhotoPath'] != @$editData->photo_path) style="color: red;" @endif>@lang('Photo From API')</label>
                  <img src="{{@$apiDatas[0]['PhotoPath']}}" style="height: 80px;">
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
              </div>
            </div>
            </div>
          </div>
        </form>
      <!--Form End-->
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
                        $('#department_id').append('<option value ="'+subcatObj.id+'">'+subcatObj.name +'</option>');
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

<script type="text/javascript">
    $(document).ready(function(){
      var a1 = CKEDITOR.replace('long_title_en');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
      var a1 = CKEDITOR.replace('long_title_bn');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('textarea').each(function(){
              $(this).val($(this).val().trim());
          }
      );

      $('#myForm').validate({
        ignore : [],
        debug : false,
        rules: {
          date: {
            required: true,
          },
          short_title_en: {
            required: true,
          },
          short_title_bn: {
            required: true,
          },
          long_title_en: {
            required: true,
          },
          long_title_bn: {
            required: true,
          },
          status: {
            required: true,
          }
        },
        messages: {

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>

@endsection
