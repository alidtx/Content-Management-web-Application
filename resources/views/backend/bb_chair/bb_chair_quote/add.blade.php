@extends('backend.layouts.app')
@section('content')
<style type="text/css">
  .i-style {
    display: inline-block;
    padding: 10px;
    width: 2em;
    text-align: center;
    font-size: 2em;
    vertical-align: middle;
    color: #444;
  }

  .demo-icon {
    cursor: pointer;
  }
</style>
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
      <li class="breadcrumb-item active">@lang('Bangabandhu Chair Quote')</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>

<div class="container fullbody">
  <div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h5>Bangabandhu Chair Quote</h5>
      </div>
      <!-- Form Start-->
      <form method="post"
        action="{{ @$editData ? route('bangabandhu_chair.quote.update',$editData->id) : route('bangabandhu_chair.quote.store') }}"
        enctype="multipart/form-data" id="myForm">
        @csrf
        <div class="card-body">
          <div class="show_module_more_event">

            <div class="form-row">
              <div class="form-group col-sm-6">
                <label for="">Title1</label>
                <input type="text" name="title1" value="{{ !empty($editData) ? $editData->title1 : old('title1') }}"
                  class="form-control @error('title1') is-invalid @enderror" placeholder="Enter Title1">
                @error('title1')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
                @enderror
              </div>
              <div class="form-group col-sm-6">
                <label for="">Title2</label>
                <input type="text" name="title2" value="{{ !empty($editData) ? $editData->title2 : old('title2') }}"
                  class="form-control" placeholder="Enter Title2">
              </div>

              <div class="form-group col-md-12">
                <label class="control-label">Description</label>
                <textarea name="description" class="form-control form-control-sm textarea"
                  rows="7">{{ !empty($editData) ?$editData->description : old('description') }}</textarea>
              </div>
            </div>
          </div>
        </div>

        <div class="form-group col-md-2" style="padding-top: 30px;">
          <button type="submit" class="btn btn-primary btn-sm">
            @if(isset($editData))
            @lang('Update')
            @else
            @lang('Save')
            @endif
          </button>
        </div>

      </form>
      <!--Form End-->
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function () {
      $('textarea').each(function(){
        $(this).val($(this).val().trim());
      });
      $('#myForm').validate({
        rules: {
        	description_en: {
            required: true,
          },
          description_bn: {
            required: true,
          },
          images:{
            required: true,
            extension: "jpg|jpeg|png"
        }
        },

        messages: {
            images: {
				required: "Please Upload Image.",
				extension: "Please upload file in these format only (jpg, jpeg, png)."
			}
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