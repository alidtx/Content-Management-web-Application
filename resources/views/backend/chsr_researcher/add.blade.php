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
          {{-- <h4 class="m-0 text-dark">Researcher Add</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Researcher')</li>
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
          @lang('Researcher') @lang('Update')
          @else
          @lang('Researcher') @lang('Add')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('chsr.researcher.list')}}"><i class="fa fa-list"></i> @lang('Researcher') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData)?route('chsr.researcher.update',$editData->id):route('chsr.researcher.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="program_category">@lang('Name') <span class="text-red">*</span></label>
                <select name="profile_id" class="form-control select2 @error('profile_id') is-invalid @enderror">
                  <option value="">@lang('Select')</option>
                  @foreach($profiles as $profile)
                  <option value="{{ $profile->id }}" {{(@$editData->profile_id == $profile->id)?"selected":""}}>{{ @$profile->nameEn }}</option>
                  @endforeach
                </select>
                @error('profile_id')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="program_category">Program Category<span class="text-red">*</span></label>
                <select name="program_category_id" class="form-control select2 @error('program_category_id') is-invalid @enderror" id="program_category_id">
                  <option value="">@lang('Select')</option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{(@$editData->program_category_id==$category->id)?"selected":""}}>{{ @$category->program_category }}</option>
                  @endforeach
                </select>
                @error('program_category_id')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="program_category">Program Name<span class="text-red">*</span></label>
                <select name="program_id" class="form-control select2 @error('program_id') is-invalid @enderror" id="program_id">

                </select>
                @error('program_id')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
              </div>

                @include('backend.layouts.pertials.faculty_wise_department')

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

<script type="text/javascript">
    $(document).on('select change','#program_category_id',function(){
        var program_category_id = $('#program_category_id').val();
        $.ajax({
            url: "{{ route('category_wise_program') }}",
            type: "GET",
            data: { program_category_id: program_category_id },
            success: function(data)
            {
                console.log(data);
                if(data != 'fail')
                {
                    // $('#program_id').empty();
                    $('#program_id').append('<option disabled selected value ="">Select Department</option>');
                    $.each(data,function(index, program){
                        // console.log(program.id);
                        console.log($('#program_id').append( '<option value ="'+program.id+'">'+program.program_title +'</option>'));
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
