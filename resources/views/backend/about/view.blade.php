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
		<ol class="breadcrumb float-right">
			<li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
			<li class="breadcrumb-item active">@lang('About')</li>
		</ol>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container fullbody">
	<div class="col-md-12">
		<div class="card card-outline card-primary">
			<div class="card-header">
               <h5>About Overview</h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{!empty($editData->id) ? route('about.update',$editData->id) : route('about.store')}}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="show_module_more_event">
						<div class="form-row">
							<div class="form-group col-md-12">
								<label class="control-label">History</label>
								<textarea name="history" class="form-control form-control-sm textarea" rows="7">{{@$editData->history}}</textarea>

							</div>
							<div class="form-group col-md-12">
								<label class="control-label">Mission</label>
								<textarea name="mission" class="form-control form-control-sm textarea" rows="7">{{@$editData->mission}}</textarea>

							</div>
							<div class="form-group col-md-12">
								<label class="control-label">Vision</label>
								<textarea name="vision" class="form-control form-control-sm textarea" rows="7">{{@$editData->vision}}</textarea>

							</div>
							<div class="form-group col-md-12">
								<label class="control-label">Core Values</label>
								<textarea name="core_values" class="form-control form-control-sm textarea" rows="7">{{@$editData->core_values}}</textarea>

							</div>

                            <div class="form-group col-md-12">
								<label class="control-label">Objective</label>
								<textarea name="objective" class="form-control form-control-sm textarea" rows="7">{{@$editData->objective}}</textarea>

							</div>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <label class="control-label">Banner Image</label>
                                <input type="file" name="banner_image" id="banner_image" class="@error('image') is-invalid @enderror">
                            </div>
                            <div class="card-body">
                                <img id="show_banner_image" class="img-fluid" src="{{(!empty(@$editData->image))?url('public/upload/about_images/'.@$editData->image):url('public/upload/no_image.png')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <label class="control-label">Core value Image</label>
                                <input type="file" name="core_value_image" id="core_value_image" class="@error('image') is-invalid @enderror">
                            </div>
                            <div class="card-body">
                                <img id="core_value_image_show" class="img-fluid" src="{{(!empty(@$editData->image))?url('public/upload/about_images/'.@$editData->image):url('public/upload/no_image.png')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <label class="control-label">Objective Image</label>
                                <input type="file" name="banner_image" id="objective_image" class="@error('image') is-invalid @enderror">
                            </div>
                            <div class="card-body">
                                <img id="objective_image_show" class="img-fluid" src="{{(!empty(@$editData->image))?url('public/upload/about_images/'.@$editData->image):url('public/upload/no_image.png')}}">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <label class="control-label">About Image 1</label>
                                <input type="file" name="about_image_1" id="about_image_1" class="@error('about_image_1') is-invalid @enderror">
                            </div>
                            <div class="card-body">
                                <img id="" class="" src="{{(!empty(@$editData->about_image_1))?url('public/upload/about/'.@$editData->about_image_1):url('public/upload/no_image.png')}}" width="80" height="80">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <label class="control-label">About Image 2</label>
                                <input type="file" name="about_image_2" id="about_image_2" class="@error('about_image_2') is-invalid @enderror">
                            </div>
                            <div class="card-body">
                                <img id="objective_image_show" class="img-fluid" src="{{(!empty(@$editData->about_image_2))?url('public/upload/about/'.@$editData->about_image_2):url('public/upload/no_image.png')}}" width="80" height="80">
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
    $(document).ready(function(){
        $('#banner_image').change(function (e) { //show Image before upload
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#show_banner_image').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        });
        $('#core_value_image').change(function (e) { //show Image before upload
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#core_value_image_show').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        });
        $('#objective_image').change(function (e) { //show Image before upload
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#objective_image_show').attr('src', e.target.result);
            };
            reader.readAsDataURL(e.target.files[0]);
        });
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
