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
          {{-- <h4 class="m-0 text-dark">Club Add</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Member Add')</li>
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
          @lang('Member') @lang('Update')
          @else
          @lang('Member') @lang('Add')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('club.member.list')}}"><i class="fa fa-list"></i> @lang('Member') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData) ? route('club.member.update',$editData->id) : route('club.member.store')}}" id="" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                 <label for="clubName">Student Name</label>
                 <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Name" value="{{ @$editData->name}}" >
                 @error('name')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              <div class="form-group col-md-6">
                 <label for="clubName">Student ID</label>
                 <input type="text" name="student_id" class="form-control @error('student_id') is-invalid @enderror" placeholder="Student ID" value="{{ @$editData->student_id}}" >
                 @error('student_id')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
{{--
              <div class="form-group col-md-6">
                 <label for="clubName">Club Name</label>
                 @php
                 $clubs = App\Models\Club::all();
                 @endphp
                <select name="club_id" class="form-control @error('club_id') is-invalid @enderror">
                  <option value="">@lang('Select')</option>
                  @foreach ($clubs as $club )
                      <option value="{{@$club->id}}" {{(@$editData->club_id == @$club->id)?"selected":""}}>{{@$club->name}}</option>
                  @endforeach
                </select>
                 @error('club_id')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div> --}}
              {{-- <div class="form-group col-md-6">
                <label for="clubName">Club Designation</label>
                @php
                $club_designations = App\Models\ClubDesignation::all();
                @endphp
               <select name="club_designation_id" class="form-control @error('club_designation_id') is-invalid @enderror">
                 <option value="">@lang('Select')</option>
                 @foreach ($club_designations as $club_designation )
                     <option value="{{@$club_designation->id}}" {{(@$editData->club_id == @$club_designation->id)?"selected":""}}>{{@$club_designation->name}}</option>
                 @endforeach
               </select>
                @error('club_designation_id')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
             </div> --}}
             <div class="form-group col-md-6">
                <label for="faculty_name">@lang('Faculty Name')</label>
                @php
                 $faculties = App\Models\Faculty::all();
                @endphp
                <select name="faculty_id" class="form-control @error('faculty_id') is-invalid @enderror" id="faculty_id">
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
                <label for="department_id">@lang('Department Name')</label>
                @php
                $departments = App\Models\Department::all();
               @endphp
                  <select class="form-control" id="department_id" name="department_id" aria-label=".form-select-lg example" id="department_id">
                   @if(@$editData)
                    @foreach ($departments as $department )
                       <option value="{{@$department->id}}" {{(@$editData->department_id == @$department->id)?"selected":""}}>{{@$department->name}}</option>
                    @endforeach
                    @endif
                 </select>
                 @error('department_id')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              <div class="form-group col-md-12">
                <label for="">@lang('Short Description')</label>
                <textarea name="short_description" class="textarea" id="" cols="30" rows="10"> {{ @$editData->short_description}} </textarea>
                 @error('short_description')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
{{--
              <div class="form-group col-md-6">
                <label for="">Join Date</label>
                <input type="" name="join_date" class="form-control singledatepicker" value="{{@$editData->join_date}}">
              </div> --}}
              <div class="form-group col-md-6">
                <label for="">Image</label>
                <input type="file" name="image" id="image" class="form-control form-control-sm @error('image') is-invalid @enderror" autocomplete="off">
                 @error('image')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              <div class="form-group col-md-6">

              </div>

              <div class="form-group col-md-6">
                  <img id="showImage" class="img-fluid" src="{{(!empty(@$editData->image)) ? url('public/upload/banner/'.@$editData->image) : url('upload/no_image.png')}}">
                  @error('image')
                  <span class="text-red">{{ $message }}</span>
                  @enderror
              </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-info">{{(@$editData)?"Update":"Submit"}}</button>
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
    $(document).ready(function(){
      var a1 = CKEDITOR.replace('description');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
      var a1 = CKEDITOR.replace('mission');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
      var a1 = CKEDITOR.replace('vision');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
    });
  </script>
  <script>
      $('#faculty_id').on('change',function() {
        var faculty_id = $(this).val();
        var url = "{{route('get-department','')}}"+"/"+faculty_id;
            $.ajax({
                url:url,
                type:'get',
                dataType:'json',
                success:function(data){
                    if(data){
                        $('#department_id').empty();
                        $('#department_id').append('<option hidden>Choose Department</option>');
                        $.each(data, function(key, department){
                            console.log(key)
                            // let geo_pos= district.lat+"-"+ district.lon
                            $('select[name="department_id"]').append('<option value="'+ department.id+'">' + department.name+ '</option>');
                        });

                    }else{
                        $('#department_id').empty();
                    }
                }
            });
        });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function (e) { //show Image before upload
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#showImage').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        });
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
          name: {
            required: true,
          },
          member_list: {
            required: true,
          },
          faculty_id: {
            required: true,
          },
          department_id: {
            required: true,
          },
          description1: {
            required: true,
          },
          mission1: {
            required: true,
          },
          vision1: {
            required: true,
          },
          motto: {
            required: true,
          },
          banner: {
            required: true,
          },
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
