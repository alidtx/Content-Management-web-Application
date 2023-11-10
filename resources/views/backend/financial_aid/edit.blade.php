@extends('backend.layouts.app')
@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            {{-- <h4 class="m-0 text-dark">Financial Aid Update</h4>  --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Edit')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h5>       
           @lang('Update Financial Aid')
        </h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{route('financial-aid.update',1)}}" id="" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
               
 
                <div class="form-group col-md-12"> 
                    <label for="">@lang('How aid works') {{-- <span class="text-red">*</span> --}}</label>
                    <textarea name="how_aid_works" class="textarea" cols="30" rows="10">@if(!empty($singleData)){{ $singleData->how_aid_works }}@endif</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror 
                </div>
               
                <div class="form-group col-md-12"> 
                    <label for="">@lang('Type of aids') {{-- <span class="text-red">*</span> --}}</label>
                    <textarea name="type_of_aids" class="textarea" cols="30" rows="10">@if(!empty($singleData)){{ $singleData->type_of_aids }}@endif</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror 
                </div>

                <div class="form-group col-md-12"> 
                    <label for="">@lang('Policies and procedures') {{-- <span class="text-red">*</span> --}}</label>
                    <textarea name="policies_and_procedures" class="textarea" cols="30" rows="10">@if(!empty($singleData)){{ $singleData->policies_and_procedures }}@endif</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror 
                </div>
              
                <div class="form-group col-md-12">
                    <label class="string optional" for="setting_Aid resource file">Aid resource file :
                        @if(!empty($singleData))
                           <a href="{{ asset('public/upload/financial_aids/'.$singleData->aid_file ) }}">Download PDF</a> 
                        @endif

                    </label><br>
                    <div class="form-group file optional setting_file">
 
                        <input class="form-control-file file optional" type="file" name="aid_file" id="setting_file">
                    </div>
                </div>
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">{{"Update"}}</button>
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