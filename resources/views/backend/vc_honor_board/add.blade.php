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
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h1 class="m-0 text-dark"> VC's Honor Board Member</h1> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">VC's Honor Board Member</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
<!-- /.content-header -->

<div class="container fullbody">
	<div class="col-md-12">
		<div class="card card-outline card-info">
			<div class="card-header">
               <h5>New VC's Honor Board Member
                <a class="btn btn-sm btn-info float-right" href="{{ route('vc.honor.board.list') }}" style="margin-right: 2px;"><i class="fa fa-plus-circle"></i> @lang('View List')</a>
              </h5>
			</div>
			<!-- Form Start-->
			<form method="post" action="{{ !empty($editData) ? route('vc.honor.board.update', @$editData->id) : route('vc.honor.board.store')}}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="show_module_more_event">
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="control-label">Name <span class="text-red">*</span></label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name"  value="{{ !empty($editData->name)? $editData->name : old('name') }}">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">Designation</label>
                                <input type="text" name="designation" class="form-control" placeholder="Enter Designation" value="{{ !empty($editData->designation)? $editData->designation : old('designation') }}">
							</div>
						</div>
						<div class="form-row">
							<div class="form-group col-md-6">
								<label class="control-label">Start Date <span class="text-red">*</span></label>
                                <input type="date" name="start_date" class="form-control" value="{{ !empty($editData->start_date)? $editData->start_date : old('start_date') }}">
							</div>
							<div class="form-group col-md-6">
								<label class="control-label">End Date <span class="text-red">*</span></label>
                                <input type="date" name="end_date" class="form-control" value="{{ !empty($editData->end_date)? $editData->end_date : old('end_date') }}">
							</div>
						</div>
					</div>
				</div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <label class="control-label">VC's Image</label>
                                <input type="file" name="image" id="Vcimage" class="@error('image') is-invalid @enderror">
                            </div>
                            <div class="card-body">
                                <img id="show_Vcimage" class="img-fluid" src="{{(!empty(@$editData->image))?url('public/upload/vc_honor_board/'.@$editData->image):url('public/upload/no_image.png')}}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-2" style="padding-top: 30px;">
                    <button type="submit" class="btn btn-info btn-sm">
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
