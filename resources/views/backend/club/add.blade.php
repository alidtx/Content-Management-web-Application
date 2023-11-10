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
            <li class="breadcrumb-item active">@lang('Club')</li>
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
          @lang('Club') @lang('Update')
          @else
          @lang('New Club') @lang('Add')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('club.list')}}"><i class="fa fa-list"></i> @lang('Club') @lang('Lists')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData) ? route('club.update',$editData->id) : route('club.store')}}" id="" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">

              <div class="form-group col-md-6">
                 <label for="clubName">Club Name</label>
                 <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Club Name" value="{{ @$editData->name}}" >
                 @error('name')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>

              @include('backend.layouts.pertials.faculty_wise_department')

              <div class="form-group col-md-12">
                <label for="">@lang('Description') {{-- <span class="text-red">*</span> --}}</label>
                <textarea name="description" class="textarea" id="" cols="30" rows="10"> {{ @$editData->description}} </textarea>
                 @error('description')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              <div class="form-group col-md-12">
                <label for="">@lang('Mission') {{-- <span class="text-red">*</span> --}}</label>
                <textarea name="mission" class="textarea" id="" cols="30" rows="10"> {{ @$editData->mission}} </textarea>
                 @error('mission')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              <div class="form-group col-md-12">
                <label for="">@lang('Vision') {{-- <span class="text-red">*</span> --}}</label>
                <textarea name="vision" class="textarea" id="" cols="30" rows="10">{{@$editData->vision}}</textarea>
                 @error('vision')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="motto">@lang('Motto')</label>
                <input id="motto" type="text" name="motto" class="form-control  @error('motto') is-invalid @enderror" value="{{@$editData->motto}}" placeholder="Motto">
                 @error('ucam_department_id')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="">@lang('Url')</label>
                <input id="" type="text" name="url" class="form-control  @error('motto') is-invalid @enderror" value="{{@$editData->url}}" placeholder="Https://">
                 @error('ucam_department_id')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="">Established Date</label>
                <input type="" name="establish_date" class="form-control singledatepicker" value="{{@$editData->establish_date}}">
              </div>
              <div class="form-group col-md-6">
                <label for="">@lang('Banner')</label>
                <input type="file" name="banner" id="image" class="form-control form-control-sm @error('image') is-invalid @enderror" autocomplete="off">
                 @error('image')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>
              <div class="form-group col-md-6">

              </div>

              <div class="form-group col-md-6">
                  <img id="showImage" class="img-fluid" src="{{(!empty(@$editData->banner)) ? url('public/upload/banner/'.@$editData->banner) : url('upload/no_image.png')}}">
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
