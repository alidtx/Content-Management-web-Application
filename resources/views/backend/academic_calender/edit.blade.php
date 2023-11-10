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
          <h4 class="m-0 text-dark">Academic Calendar Edit</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Academic Calendar')</li>
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
          @lang('Academic Calendar') @lang('Update')
          @else
          @lang('Academic Calendar') @lang('Add')
          @endif
          <a class="btn btn-sm btn-success float-right" href="{{route('setup.academic_calender')}}"><i class="fa fa-list"></i> @lang('Academic Calendar') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{route('setup.academic_calender.update',$editData->id)}}"   id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="card-body">

            <div class="form-row">

                <div class="form-group col-sm-4">
                    <label>Academic Type</label>
                    <select name="type_id" class="form-control form-control-sm select2">
                        <option value="">Select Type</option>
                        <option {{ !empty($editData) && $editData->type_id == 1 ? "selected" : ""}} value="1">Routine</option>
                        <option {{ !empty($editData) && $editData->type_id == 2 ? "selected" : ""}} value="2">Result</option>
                        <option {{ !empty($editData) && $editData->type_id == 3 ? "selected" : ""}} value="3">Calender</option>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label class="control-label">Select Faculty</label>
                    <select id="faculty_id" @if(!empty($editData)) @endif class="form-control form-control-sm select2" name="faculty_id">
                        <option value="" selected>Select Faculty</option>

                        @foreach($faculties as $faculty)
                        <option @if( !empty($editData) && $editData->faculty_id == $faculty->id) selected @endif value="{{ $faculty->id }}">{{ $faculty->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-sm-4">
                    <label class="control-label">Select Department</label>
                    <select id="department_id" @if(!empty($editData)) @endif class="form-control form-control-sm select2" name="department_id">
                        <option value="" selected>Select Department</option>

                        @foreach($departments as $department)
                        <option @if( !empty($editData) && $editData->department_id == $department->id) selected @endif value="{{ $department->id }}">{{ $department->name }}</option>
                        @endforeach
                    </select>
                </div>


                <div class="form-group col-sm-4">
                    <label class="control-label">Select Program</label>
                    <select id="program_id" @if(!empty($editData)) @endif class="form-control form-control-sm select2" name="program_id">
                        <option value="" selected>Select Program</option>

                        @foreach($programs as $program)
                        <option @if( !empty($editData) && $editData->program_id == $program->id) selected @endif value="{{ $program->id }}">{{ $program->program_title }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label>Session</label>
                    <input type="text" class="form-control @error('session') is-invalid @enderror" name="session" autocomplete="off" value="{{ !empty($editData->session)? $editData->session : old('session') }}">
                    @error('session')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-sm-4">
                    <label>Title</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" id="title" autocomplete="off" value="{{!empty($editData->title)? $editData->title : old('title')}}">
                    @error('title')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group col-sm-4">
                    <label>Status</label>
                    <select name="status" class="form-control form-control-sm select2">
                        <option value="">Select Type</option>
                        <option {{ !empty($editData) && $editData->status == 1 ? "selected" : ""}} value="1">Active</option>
                        <option {{ !empty($editData) && $editData->status == 0 ? "selected" : ""}} value="0">Inactive</option>
                    </select>
                </div>


                <div class="form-group col-sm-12">
                        <label>Upload New Attachment<small style="color: brown"> (Max 2 mb)</small></label>
                        <input id="file" type="file" value="" multiple="multiple" class="form-control @error('file') is-invalid @enderror" name="file"> @error('file')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                 


                </div>
            </div>



            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">Update</button>
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
