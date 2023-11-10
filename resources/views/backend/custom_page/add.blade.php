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
          {{-- <h4 class="m-0 text-dark">Custom Page Add</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Custom Page')</li>
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
          @lang('Custom Page') @lang('Update')
          @else
          @lang('Custom Page') @lang('Add')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('setup.custom_page')}}"><i class="fa fa-list"></i> @lang('Custom Page') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData)?route('setup.custom_page.update',$editData->id):route('setup.custom_page.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="title">@lang('Title') {{-- <span class="text-red">*</span> --}}</label>
                 <input id="title" type="text" name="title" class="form-control @error('title') is-invalid @enderror" value="{{@$editData->title}}" placeholder="">
                 @error('title')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                 @enderror 
              </div>
              <div class="form-group col-md-12">
                <label for="description">@lang('Description') {{-- <span class="text-red">*</span> --}}</label>
                <textarea id="description" name="description" class="form-control textarea">{{ !empty($editData->description)? $editData->description : "" }}</textarea>
                @error('description')
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
          </div>
        </form>
      <!--Form End-->
    </div>
  </div>
</div>


  <script type="text/javascript">
    // $(document).ready(function () {
    //   $('textarea').each(function(){
    //           $(this).val($(this).val().trim());
    //       }
    //   );

    //   $('#myForm').validate({
    //     ignore : [],
    //     debug : false,
    //     rules: {
    //       date: {
    //         required: true,
    //       },
    //       short_title_en: {
    //         required: true,
    //       },
    //       status: {
    //         required: true,
    //       }
    //     },
    //     messages: {

    //     },
    //     errorElement: 'span',
    //     errorPlacement: function (error, element) {
    //       error.addClass('invalid-feedback');
    //       element.closest('.form-group').append(error);
    //     },
    //     highlight: function (element, errorClass, validClass) {
    //       $(element).addClass('is-invalid');
    //     },
    //     unhighlight: function (element, errorClass, validClass) {
    //       $(element).removeClass('is-invalid');
    //     }
    //   });
    // });
  </script>

@endsection
