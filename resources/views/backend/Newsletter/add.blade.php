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
            {{-- <h4 class="m-0 text-dark">Lab Center Add</h4>  --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Create')</li>
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
          @lang('Newsletter') @lang('Update')
          @else
          @lang('Newsletter') @lang('Add')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('news.newsletter.list')}}"><i class="fa fa-list"></i> @lang('Newsletter') @lang('Lists')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData) ? route('news.newsletter.update',$editData->id) : route('news.newsletter.store')}}" id="" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
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
                    <label for="clubName">Issue no</label>
                    <input type="text" name="issue_no" class="form-control @error('issue_no') is-invalid @enderror" placeholder="Issue No" value="{{ @$editData->issue_no}}" >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group col-sm-6" style="margin-bottom: 0;">
                    <label>Publish Date</label>
                    <input id="publish_date" type="text"
                        value="{{ !empty($editData->publish_date) ? date('d-m-Y', strtotime($editData->publish_date)) : old('publish_date') }}"
                        class="form-control singledatepicker @error('publish_date') is-invalid @enderror"
                        name="publish_date" placeholder="Date"> @error('publish_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label>Thumbnail image
                        <small style="color: brown"> (jpeg, jpg, gif, png, svg format only)</small>
                    </label>
                      @if(!empty($editData->image))
                        <img src="{{ asset('public/upload/newsletter/'. $editData->image) }}" style="width:200px;">
                      @else
                      @endif
                    <input id="attachment" type="file" value=""
                        class="form-control @error('image') is-invalid @enderror" name="image">
                    @error('attachment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label>File*
                        <small style="color: brown"> (*pdf only)</small>
                    </label>
                      @if(!empty($editData->attachment))
                      <a href="{{ asset('public/upload/newsletter/'. $editData->attachment) }}">Download PDF</a>
                      @else
                      @endif
                    <input id="attachment" type="file" value=""
                        class="form-control @error('attachment') is-invalid @enderror" name="attachment">
                    @error('attachment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
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
