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
				<h5>Slider Add<a class="btn btn-sm btn-success float-right" href="{{route('homepages.slider.view')}}"><i class="fa fa-list"></i> @lang('Slider') @lang('List')</a></h5>
			</div>
			<!-- Form Start-->
			<form id="myForm" enctype="multipart/form-data">
				@csrf
				<div class="card-body">
					<div class="show_module_more_event">
						<div class="form-row">
							<div class="form-group col-md-6">
                                @if(@$editData)
                                   <input type="hidden" name="slider_category_id" id=sliderId value="{{ $editData->slider_category_id }}">
                                @else
                                   <input type="hidden" name="slider_category_id" id=sliderId value="{{ $id }}">
                                @endif

								<label class="control-label">Hover Title 1</label>
								<input type="text" name="hover_title_1" id="hover_title_1" class="form-control @error('hover_title_1') is-invalid @enderror" autocomplete="off" value="{{ @$editData->hover_title_1 }}">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">Hover Title 2</label>
								<input type="text" name="hover_title_2" id="hover_title_2" class="form-control @error('hover_title_2') is-invalid @enderror" autocomplete="off" value="{{ @$editData->hover_title_2 }}">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">Slide Title</label>
								<input type="text" name="slider_title" id="slider_title" class="form-control @error('slider_title') is-invalid @enderror" autocomplete="off" value="{{ @$editData->slider_title }}">
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
<script type="text/javascript">
 $('#myForm').on('submit',function(e){
        e.preventDefault();
        let formData = new FormData(this);

        let slider_id = $('#sliderId').val();
        let hover_title_1 = $('#hover_title_1').val();
        let hover_title_2 = $('#hover_title_2').val();
        let slider_title = $('#slider_title').val();
        // let subject = $('#subject').val();
        // let message = $('#message').val();

        $.ajax({
          url:'{{route("homepages.slider-store")}}',
          type:"POST",
          data: formData,
          cache:false,
          contentType: false,
          processData: false,
          success:function(response){
            console.log(response);
            if (response) {
            //   $('#success-message').text(response.success);
            Command: toastr["success"](response.success)

            toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }
            $("#myForm")[0].reset();
            }
          },
        //   error: function(response) {
        //     $('#name-error').text(response.responseJSON.errors.name);
        //     $('#email-error').text(response.responseJSON.errors.email);
        //     $('#mobile-number-error').text(response.responseJSON.errors.mobile_number);
        //     $('#subject-error').text(response.responseJSON.errors.subject);
        //     $('#message-error').text(response.responseJSON.errors.message);
        //    }
         });
        });
</script>

@endsection
