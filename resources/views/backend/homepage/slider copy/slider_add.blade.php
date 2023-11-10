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
          <h1 class="m-0 text-dark"></h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Slider')</li>
          </ol>
        </div>
      </div>
    </div>
</div>
<div class="container">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header">
				<h5>
					@if(isset($editData))
					@lang('Slider') @lang('Update')
					@else
					@lang('Slider') @lang('Add')
					@endif
					<a class="btn btn-sm btn-success float-right" href="{{route('homepages.slider.view')}}"><i class="fa fa-list"></i> @lang('Slider') @lang('List')</a></h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{!empty($editData->id) ? route('homepages.slider.update',$editData->id) : route('homepages.slider.store')}}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="show_module_more_event">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="control-label">Slier Type</label>
								<input type="text" name="title" class="form-control @error('title') is-invalid @enderror" autocomplete="off">
							</div>
							<div class="form-group col-md-4">
								<label class="control-label">@lang('Image') <span style="color: red">(1366px X 270px) *</span></label>
								<input type="file" name="image" id="image" class="form-control form-control-sm @error('image') is-invalid @enderror" autocomplete="off">
							</div>
							<div class="form-group col-md-6">
		                    	<img id="show_image" src="{{(!empty(@$editData->image))?url('public/upload/slider_images/'.@$editData->image):url('public/upload/no_image.png')}}" style="height: 100px;border:1px solid #000;">
								@error('image')
								<span class="text-red">{{ $message }}</span>
								@enderror
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
    $(document).ready(function () {
      $('#myForm').validate({
        rules: {
        image: {
            required: true,
            extension: "jpg|jpeg|png"
        }
    },
    messages: {
        image: {
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
