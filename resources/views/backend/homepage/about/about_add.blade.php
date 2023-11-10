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
			@lang('About') @lang('Manage')
		</h2>
		<ol class="breadcrumb float-right">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
			<li class="breadcrumb-item active">@lang('About')</li>
		</ol>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container fullbody">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5>
					@if(isset($editData))
					@lang('About') @lang('Update')
					@else
					@lang('About') @lang('Add')
					@endif
					<a class="btn btn-sm btn-success float-right" href="{{route('homepages.about.view')}}"><i class="fa fa-list"></i> @lang('About') @lang('List')</a></h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{!empty($editData->id) ? route('homepages.about.update',$editData->id) : route('homepages.about.store')}}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="show_module_more_event">
						<div class="form-row">
							<div class="form-group col-md-12">
								<label class="control-label">@lang('Description') (@lang('English')) <span class="text-red">*</span></label>
								<textarea name="description_en" class="form-control form-control-sm" rows="7">{{@$editData->description_en}}</textarea>
								@error('description_en')
								<span class="text-red">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group col-md-12">
								<label class="control-label">@lang('Description') (@lang('Bangla')) <span class="text-red">*</span></label>
								<textarea name="description_bn" class="form-control form-control-sm" rows="7">{{@$editData->description_bn}}</textarea>
								@error('description_bn')
								<span class="text-red">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">@lang('Image') <span style="color: red">(850px X 600px)</span> </label>
								<input type="file" name="image" id="image" class="form-control form-control-sm @error('image') is-invalid @enderror" autocomplete="off">
								@error('image')
								<span class="text-red">{{ $message }}</span>
								@enderror
							</div>
							<div class="form-group col-md-2">
		                    	<img id="show_image" src="{{(!empty(@$editData->image))?url('public/upload/about_images/'.@$editData->image):url('public/upload/no_image.png')}}" style="width: 150px;height: 100px;border:1px solid #000;">
		                    </div>
		                    <div class="form-group col-md-2" style="padding-top: 30px;">
		                    	<button type="submit" class="btn btn-success btn-sm">
									@if(isset($editData))
									@lang('Update')
									@else
									@lang('Save')
									@endif
								</button>
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
      var a1 = CKEDITOR.replace('description_en');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
      var a1 = CKEDITOR.replace('description_bn');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
    });
  </script>

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
