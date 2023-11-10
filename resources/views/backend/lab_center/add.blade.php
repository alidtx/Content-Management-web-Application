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
            <h4 class="m-0 text-dark">Lab Center Add</h4> 
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Create')</li>
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
          @if(isset($singleData))
          @lang('Lab Center') @lang('Update')
          @else
          @lang('New Lab Center') @lang('Add')
          @endif
          <a class="btn btn-sm btn-success float-right" href="{{route('lab-center.list')}}"><i class="fa fa-list"></i> @lang('Lab Center') @lang('Lists')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$singleData) ? route('lab-center.update',$singleData->id) : route('lab-center.store')}}" id="" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="clubName">Title</label>
                    <input type="text" name="title" class="form-control @error('name') is-invalid @enderror" placeholder="Lab Center Name" value="{{ @$singleData->title}}" >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="faculty_name">@lang('Faculty Name') {{-- <span class="text-red">*</span> --}}</label>
                    @php
                    $faculties = App\Models\Faculty::all();
                    @endphp
                    <select name="faculty_id" class="form-control @error('faculty_id') is-invalid @enderror" id="faculty_id">
                    <option value="">@lang('Select')</option>
                    @foreach ($faculties as $faculty )
                        <option value="{{@$faculty->ucam_faculty_id}}" {{(@$singleData->faculty_id == @$faculty->ucam_faculty_id)?"selected":""}}>{{@$faculty->name}}</option>
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
                    if(!empty($singleData) && !empty($singleData->faculty_id))
                    {
                        $departmentInfos = \App\Models\Department::where('faculty_id',$singleData->faculty_id)->get();
                    }
                    @endphp

                    <label class="control-label">Department Name</label>
                    <select id="department_id" class="form-control form-control-sm select2" name="department_id">
                        <option value="">Select Department</option>
                        @if(!empty($singleData) && !empty($departmentInfos))
                            @foreach($departmentInfos as $departmentInfo)
                                <option @if( !empty($singleData) && $singleData->department_id == $departmentInfo->ucam_department_id) selected @endif value="{{ $departmentInfo->ucam_department_id }}">{{ $departmentInfo->name }}</option>                 
                            @endforeach
                        @endif
                    </select>
                    @error('department_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>


                <div class="form-group col-md-6">
                    <label for="clubName">Gallery ID</label>
                    <input type="number" name="gallery_id" class="form-control @error('student_id') is-invalid @enderror" placeholder="Gallery ID" value="{{ @$singleData->gallery_id}}" >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror
                </div>
                <div class="form-group col-md-12"> 
                    <label for="">@lang('Description') {{-- <span class="text-red">*</span> --}}</label>
                    <textarea name="description" class="textarea" cols="30" rows="10">@if(!empty($singleData)){{ $singleData->description }}@endif</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror 
                </div>
               
              
 
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">{{(@$singleData)?"Update":"Submit"}}</button>
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
  {{-- <script>
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
                            $('select[name="department_id"]').append('<option value="'+ department.id+'">' + department.name+ '</option>');
                        });

                    }else{
                        $('#department_id').empty();
                    }
                }
            });
        });
  </script> --}}

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
                console.log(data);
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
