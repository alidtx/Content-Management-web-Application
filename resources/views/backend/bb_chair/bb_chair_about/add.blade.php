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
			<li class="breadcrumb-item active">@lang('Bangabandhu Chair About')</li>
		</ol>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container fullbody">
	<div class="col-md-12">
		<div class="card card-outline card-primary">
			<div class="card-header">
               <h5>Bangabandhu Chair About</h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{ $editData ? route('bangabandhu_chair.about.update',$editData->id) : route('bangabandhu_chair.about.store') }}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="show_module_more_event">
						<div class="form-row">
              <div class="form-group col-md-6">
                <label for="profile_id">@lang('Personnel Name') <span class="text-red">*</span></label>
                <select name="profile_id" class="form-control select2 @error('profile_id') is-invalid @enderror">
                  <option value="">@lang('Select')</option>
                  @foreach($profiles as $profile)
                  <option value="{{ $profile->id }}" {{(@$editData->profile_id == $profile->id)?"selected":""}} >{{ @$profile->nameEn }}</option>
                  @endforeach
                </select>
                @error('profile_id')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label class="control-label">Slider</label>
                <select id="slider_id" class="form-control form-control-sm select2" name="slider_id">
                    <option disabled selected value="">Select</option>
                    @foreach($sliderMasters as $sliderMaster)
                        <option @if( !empty($editData) && $editData->slider_id == $sliderMaster->id) selected @endif value="{{ $sliderMaster->id }}">{{ $sliderMaster->name }}</option>
                    @endforeach
                </select>
                @error('slider_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>

							<div class="form-group col-md-12">
								<label class="control-label">About</label>
								<textarea name="message" class="form-control form-control-sm textarea" rows="7">{{@$editData->message}}</textarea>
							</div>
						</div>
					</div>
				</div>
        {{-- <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <label class="control-label">Image</label>
                        <input type="file" name="image" id="Vcimage" class="@error('image') is-invalid @enderror">
                    </div>
                    <div class="card-body">
                        <img id="show_Vcimage" class="img-fluid" src="{{(!empty(@$editData->image))?url('public/upload/vc/'.@$editData->image):url('public/upload/no_image.png')}}">
                    </div>
                </div>
            </div>
        </div> --}}
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
        $('#Vcimage').change(function (e) { //show Image before upload
            var reader = new FileReader();
            reader.onload = function (e) {
                $('#show_Vcimage').attr('src', e.target.result);
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
