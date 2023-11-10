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
			<li class="breadcrumb-item active">@lang('Bangabandhu Chair Researcher')</li>
		</ol>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container fullbody">
	<div class="col-md-12">
		<div class="card card-outline card-primary">
			<div class="card-header">
               <h5>Bangabandhu Chair Researcher</h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{ @$editData ? route('bangabandhu_chair.researcher.update',$editData->id) : route('bangabandhu_chair.researcher.store') }}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="show_module_more_event">
            
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="profile_id">@lang('Personnel Name') <span class="text-red">*</span></label>
                <select name="profile_id" class="form-control select2 @error('profile_id') is-invalid @enderror" {{(@$editData)?"disabled":""}}>
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
                <label for="status">@lang('Status') <span class="text-red">*</span></label>
                <select name="status" class="form-control select2 @error('status') is-invalid @enderror">
                  <option value="">@lang('Select')</option>
                  
                  <option value="1" {{(@$editData->status == '1')?"selected":""}}>Active</option>
                  <option value="0" {{(@$editData->status == '0')?"selected":""}}>Inactive</option>
                  
                </select>
                @error('status')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
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
