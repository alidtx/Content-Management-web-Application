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
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left">
      @lang('Notice and Events') @lang('Manage')
    </h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
      <li class="breadcrumb-item active">@lang('Notice and Events')</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5>
          @if(isset($editData))
          @lang('Notice and Events') @lang('Update')
          @else
          @lang('Notice and Events') @lang('Add')
          @endif
          <a class="btn btn-sm btn-success float-right" href="{{route('homepages.event')}}"><i class="fa fa-list"></i> @lang('Notice and Events') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData)?route('homepages.event.update',$editData->id):route('homepages.event.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="short_title_en">@lang('Title') (@lang('English')) <span class="text-red">*</span></label>
                <input type="text" name="short_title_en" class="form-control" value="{{@$editData->short_title_en}}">
                <font style="color: red">{{($errors->has('short_title_en'))?($errors->first('short_title_en')):''}}</font>
              </div>
              <div class="form-group col-md-6">
                <label for="short_title_bn">@lang('Title') (@lang('Bangla')) <span class="text-red">*</span></label>
                <input type="text" name="short_title_bn" class="form-control" value="{{@$editData->short_title_bn}}">
                <font style="color: red">{{($errors->has('short_title_bn'))?($errors->first('short_title_bn')):''}}</font>
              </div>
              <div class="form-group col-md-12">
                <label for="long_title_en">@lang('Description') (@lang('English')) <span class="text-red">*</span></label>
                <textarea name="long_title_en" class="form-control" rows="8">{{@$editData->long_title_en}}</textarea>
              </div>
              <div class="form-group col-md-12">
                <label for="long_title_bn">@lang('Description') (@lang('Bangla')) <span class="text-red">*</span></label>
                <textarea name="long_title_bn" class="form-control" rows="8">{{@$editData->long_title_bn}}</textarea>
              </div>
              <div class="form-group col-md-3">
                <label for="date">@lang('Date') <span class="text-red">*</span></label>
                <input type="text" name="date" class="form-control singledatepicker" value="{{@$editData->date}}" placeholder="DD-MM-YYYY" autocomplete="off" readonly="">
              </div>
              <div class="form-group col-md-3">
                <label for="status">@lang('Type') <span class="text-red">*</span></label>
                <select name="status" class="form-control">
                  <option value="">@lang('Select')</option>
                  <option value="0" {{(@$editData->status=="0")?"selected":""}}>Notice</option>
                  <option value="1" {{(@$editData->status=="1")?"selected":""}}>Events</option>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="image">@lang('Image') (<span style="color: red">Size = 750px X 500px</span>) <span class="text-red">*</span></label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                @error('image')
                <span class="text-red">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-md-2">
                <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 120px;height: 100px;border:1px solid #000;">
              </div>
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
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
