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
          {{-- <h4 class="m-0 text-dark">Department Add</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Department')</li>
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
          @lang('Department') @lang('Update')
          @else
          @lang('Department') @lang('Add')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('setup.manage_department')}}"><i class="fa fa-list"></i> @lang('Department') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData)?route('setup.manage_department.update',$editData->id):route('setup.manage_department.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="faculty_name">@lang('Faculty Name') {{-- <span class="text-red">*</span> --}}</label>
                @php
                 $faculties = App\Models\Faculty::all();
                @endphp
                <select name="faculty_id" class="form-control @error('faculty_id') is-invalid @enderror">
                  <option value="">@lang('Select')</option>
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
              <div class="form-group col-md-6">

              </div>
              <div class="form-group col-md-6">
                <label for="department_name">@lang('Department Name') {{-- <span class="text-red">*</span> --}}</label>
                 <input id="department_name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{@$editData->name}}" placeholder="Department Name">
                 @error('name')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="ucam_department_id">@lang('Ucam Department ID')</label>
                <input id="ucam_department_id" type="text" name="ucam_department_id" class="form-control  @error('ucam_department_id') is-invalid @enderror" value="{{@$editData->ucam_department_id}}" placeholder="Ucam Department ID">
                 @error('ucam_department_id')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              @php
                $profiles = \App\Models\Profile::where('personnel_type',1)->get();
              @endphp
              <div class="form-group col-md-4">
                <label class="control-label">Department Head</label>
                <select id="" class="form-control form-control-sm select2" name="profile_id">
                    <option disabled selected value="">Select</option>
                    @foreach($profiles as $profile)
                        <option @if( !empty($editData) && $editData->profile_id == $profile->id) selected @endif value="{{ $profile->id }}">{{ $profile->nameEn }}</option>
                    @endforeach
                </select>
                @error('')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              @php
              $sliderMasters = \App\Models\SliderMaster::all();
              //dd($sliderMasters);
              @endphp
              <div class="form-group col-md-4">
                <label class="control-label">Slider</label>
                <select id="slider_id" class="form-control form-control-sm select2" name="slider_id">
                    <option disabled selected value="">Select</option>
                    {{-- <option value="1">Slider 1</option>
                    <option value="2">Slider 2</option> --}}
                    @foreach($sliderMasters as $sliderMaster)
                        <option @if( !empty($editData) && $editData->slider_id == $sliderMaster->id) selected @endif value="{{ $sliderMaster->id }}">{{ $sliderMaster->name }}</option>
                    @endforeach
                </select>
                @error('slider_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-md-4">
                <label for="location">@lang('Location')</label>
                <input id="location" type="text" name="location" class="form-control  @error('location') is-invalid @enderror" value="{{@$editData->location}}" placeholder="">
                 @error('location')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              <div class="form-group col-md-4">
                <label for="contact">@lang('Contact Number')</label>
                <input id="contact" type="text" name="contact" class="form-control  @error('contact') is-invalid @enderror" value="{{@$editData->contact}}" placeholder="">
                 @error('contact')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              <div class="form-group col-md-4">
                <label for="sort_order">@lang('Sort Order')</label>
                <input id="sort_order" type="number" name="sort_order" class="form-control  @error('sort_order') is-invalid @enderror" value="{{@$editData->sort_order}}" placeholder="">
                 @error('sort_order')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              <div class="form-group col-md-4">
                <label class="control-label">Status</label>
                <select id="status" class="form-control form-control-sm select2" name="status">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                @error('status')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
              <div class="form-group col-sm-12">
                <label>About</label>
                <textarea id="about" type="text" class="form-control @error('about') is-invalid @enderror textarea" name="about">{{ !empty($editData->about)? $editData->about : old('about') }}</textarea>
                @error('about')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-info">{{(@$editData)?"Update":"Submit"}}</button>
              </div>
            </div>
          </div>
        </form>
      <!--Form End-->
    </div>
  </div>
</div>

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
