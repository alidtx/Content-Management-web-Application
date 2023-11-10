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
            <h4 class="m-0 text-dark">Dean's Staff Add</h4> 
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
          @if(isset($editData))
          @lang('') @lang('Update')
          @else
          @lang('New') @lang('Add')
          @endif
          <a class="btn btn-sm btn-success float-right" href="{{route('dean-office.staff_list',$dean_information_id)}}"><i class="fa fa-list"></i> @lang('Dean Staff') @lang('Lists')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData) ? route('dean-office.staff_list.update',$editData->id) : route('dean-office.staff_list.store')}}" id="" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
              <input type="hidden" name="dean_information_id" value="{{ $dean_information_id }}">
                <div class="form-group col-md-12">
                    <label for="clubName">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ @$editData->name}}" >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror
                </div>

                <div class="form-group col-md-6">
                    <label for="clubName">Email</label>
                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ @$editData->email}}" >
                    @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror
                </div>
                 
                <div class="form-group col-md-6">
                    <label for="clubName">Phone</label>
                    <input type="phone" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone" value="{{ @$editData->phone}}" >
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror
                </div>
 
                <div class="form-group col-sm-6">
                    <label>Profile image  
                        <small style="color: brown"> (jpeg, jpg, gif, png, svg format only)</small>
                    </label>
                      @if(!empty($editData->image))
                        <img src="{{ asset('public/upload/dean_information/'. $editData->image) }}" style="height:150px;">
                      @else
                      @endif
                    <input  type="file"
                        class="form-control @error('image') is-invalid @enderror" name="image">
                    @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
               
                <div class="form-group col-md-6">
                    <label for="clubName">Designation</label>
                    <input type="text" name="designation" class="form-control @error('designation') is-invalid @enderror" placeholder="Designation" value="{{ @$editData->designation}}" >
                    @error('phone')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="clubName">Rank</label>
                    <input type="text" name="rank" class="form-control @error('rank') is-invalid @enderror" placeholder="Rank" value="{{ @$editData->rank}}" >
                    @error('rank')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror
                </div>
                
                <div class="form-group col-md-6">
                    <label for="clubName">Facebook</label>
                    <input type="text" name="facebook" class="form-control @error('facebook') is-invalid @enderror" placeholder="Facebook" value="{{ @$editData->facebook}}" >
                   
                </div>
                <div class="form-group col-md-6">
                    <label for="clubName">Twitter</label>
                    <input type="text" name="twitter" class="form-control @error('twitter') is-invalid @enderror" placeholder="Twitter" value="{{ @$editData->twitter}}" >
                 
                </div>

                <div class="form-group col-md-6">
                  <label for="linkedin">LinkedIn</label>
                  <input type="text" name="linkedin" class="form-control @error('linkedin') is-invalid @enderror" placeholder="LinkedIn" value="{{ @$editData->linkedin}}" >
               
              </div>

                <div class="form-group col-md-6">
                    <label for="clubName">Appointment type</label>
                    <input type="text" name="appointment_type" class="form-control @error('appointment_type') is-invalid @enderror" placeholder="Appointment Type" value="{{ @$editData->appointment_type}}" >
                   
                </div>
                <div class="form-group col-md-6">
                    <label for="clubName">Website</label>
                    <input type="text" name="website" class="form-control @error('website') is-invalid @enderror" placeholder="https://" value="{{ @$editData->website}}" >
                 
                </div>
              
                <div class="form-group col-md-12"> 
                    <label for="">@lang('Details of education') </label>
                    <textarea name="details_education" class="textarea" cols="30" rows="10">@if(!empty($editData)){{ $editData->details_education }}@endif</textarea>
                    @error('details_education')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror 
                </div> 
                <div class="form-group col-md-12"> 
                    <label for="">@lang('Experience')  </label>
                    <textarea name="experience" class="textarea" cols="30" rows="10">@if(!empty($editData)){{ $editData->experience }}@endif</textarea>
                    @error('experience')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror 
                </div> 
                <div class="form-group col-md-12"> 
                    <label for="">@lang('Publications')  </label>
                    <textarea name="publications" class="textarea" cols="30" rows="10">@if(!empty($editData)){{ $editData->publications }}@endif</textarea>
                    @error('publications')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror 
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
