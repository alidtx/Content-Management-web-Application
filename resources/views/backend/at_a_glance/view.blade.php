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
			<li class="breadcrumb-item active">@lang('At A Glance Numbers')</li>
		</ol>
		<div class="clearfix"></div>
	</div>
</div>

<div class="container fullbody">
	<div class="col-md-12">
		<div class="card card-outline card-primary">
			<div class="card-header">
               <h5>At A Glance Number</h5>
            </div>
			<!-- Form Start-->
			<form method="post" action="{{!empty($editData->id) ? route('manage_profile.numbers_at_a_glance.update',$editData->id) : route('manage_profile.numbers_at_a_glance.store')}}" enctype="multipart/form-data" id="myForm">
				@csrf
				<div class="card-body">
					<div class="show_module_more_event">
						<div class="form-row">
							<div class="form-group col-md-12">
                                <label for="student_number">@lang('Student Number') {{-- <span class="text-red">*</span> --}}</label>
                                <input id="student_number" type="text" name="student_number" class="form-control @error('student_number') is-invalid @enderror" value="{{@$editData->student_number}}" placeholder="">
                                @error('student_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror 
                            </div>
							<div class="form-group col-md-12">
                                <label for="faculty_member_number">@lang('Faculty Member Number') {{-- <span class="text-red">*</span> --}}</label>
                                <input id="faculty_member_number" type="text" name="faculty_member_number" class="form-control @error('faculty_member_number') is-invalid @enderror" value="{{@$editData->faculty_member_number}}" placeholder="">
                                @error('faculty_member_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror 
                            </div>
							<div class="form-group col-md-12">
                                <label for="office_staff_number">@lang('Office Staff Number') {{-- <span class="text-red">*</span> --}}</label>
                                <input id="office_staff_number" type="text" name="office_staff_number" class="form-control @error('office_staff_number') is-invalid @enderror" value="{{@$editData->office_staff_number}}" placeholder="">
                                @error('office_staff_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror 
                            </div>
							<div class="form-group col-md-12">
                                <label for="member_number">@lang('Member Number') {{-- <span class="text-red">*</span> --}}</label>
                                <input id="member_number" type="text" name="member_number" class="form-control @error('member_number') is-invalid @enderror" value="{{@$editData->member_number}}" placeholder="">
                                @error('member_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> 
                                @enderror 
                            </div>
                            <div class="form-group col-md-2" style="">
                                <button type="submit" class="btn btn-primary btn-sm">
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

@endsection
