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
  .select2-container {
      width: 100% !important;
  }
</style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            {{-- <h4 class="m-0 text-dark">Landing Page Modal Add</h4>  --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Create')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card card-outline card-info">
      <div class="card-header">
        <h5>
          @if(isset($singleData))
          @lang('Modal') @lang('Update')
          @else
          @lang('New Modal') @lang('Add')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('landing-modal.modal_list')}}"><i class="fa fa-list"></i> @lang('Landing Page Modal') @lang('Lists')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$singleData) ? route('landing-modal.update',$singleData->id) : route('landing-modal.store')}}" id="" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="clubName">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ @$singleData->name}}" >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="faculty_name">@lang('Use For') {{-- <span class="text-red">*</span> --}}</label>
                    <select name="use_for" class="form-control select2 @error('use_for') is-invalid @enderror" id="use_for">
                    <option value="">@lang('Select')</option>                     
                      <option value="home" {{(@$singleData->use_for == 'home')?"selected":""}} selected>Home</option>   
                      <option value="faculties" {{(@$singleData->use_for == 'faculties')?"selected":""}}>Faculties</option>  
                      <option value="departments" {{(@$singleData->use_for == 'departments')?"selected":""}}>Departments</option>                  
                    </select>
                    @error('use_for')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror
                </div>
                <div class="form-group col-md-6" id="facultyID" @if(empty($singleData->faculty_id)) style="display: none;" @endif>
                    <label for="faculty_id">@lang('Faculty Name')</label>
                    @php
                    $faculties = App\Models\Faculty::all();
                    @endphp
                    <select name="faculty_id" class="form-control @error('faculty_id') is-invalid @enderror" id="faculty_id">
                    <option value="">@lang('All')</option>
                    @foreach ($faculties as $faculty )
                        <option class="faculty" value="{{@$faculty->id}}" {{(@$singleData->faculty_id == @$faculty->id)?"selected":""}}>{{@$faculty->name}}</option>
                    @endforeach
                    </select>
                    @error('faculty_id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror
                </div>
                
                <div class="form-group col-sm-6" id="departmentDiv" @if(empty($singleData->department_id)) style="display: none;" @endif>

                    @php
                    if(!empty($singleData) && !empty($singleData->faculty_id))
                    {
                        $departmentInfos = \App\Models\Department::where('faculty_id',$singleData->faculty_id)->get();
                    }
                    @endphp

                    <label class="control-label">Department Name</label>
                    <select id="department_id" class="form-control select2" name="department_id">
                        <option value="">@lang('All')</option>
                        @if(!empty($singleData) && !empty($departmentInfos))
                            @foreach($departmentInfos as $departmentInfo)
                                <option @if( !empty($singleData) && $singleData->department_id == $departmentInfo->ucam_department_id) selected @endif value="{{ $departmentInfo->ucam_department_id }}">{{ $departmentInfo->name }}</option>                 
                            @endforeach
                        @endif
                    </select>
                    @error('department_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                  
 
                <div class="form-group col-md-12"> 
                    <label for="">@lang('Description') {{-- <span class="text-red">*</span> --}}</label>
                    <textarea name="description" class="textarea" cols="30" rows="10">@if(!empty($singleData)){{ $singleData->description }}@endif</textarea>
                    @error('description')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> 
                    @enderror 
                </div>
               
              
 
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-info">{{(@$singleData)?"Update":"Submit"}}</button>
              </div>
            </div>
            </div>
          </div>
        </form>
      <!--Form End-->
    </div>
  </div>
</div>
 
<script>
      $('#use_for').on('change',function() {
          var use_for = $(this).val();
          //console.log(use_for);
          if(use_for == 'faculties'){
            
            $("#facultyID").show();   
            $("#departmentDiv").hide();
          }else if(use_for == 'departments'){
            
            $("#facultyID").show();  
            $("#departmentDiv").show();
          }else{
            $("#facultyID").hide();
            $("#departmentDiv").hide();
            
          } 
        });
  </script>
  
  <script type="text/javascript">
    
    $(document).on('select change','#faculty_id',function(){
        var faculty_id = $('#faculty_id').val();
        //console.log(faculty_id);
        $.ajax({
            url: "{{ route('faculty_wise_department') }}",
            type: "GET",
            data: { faculty_id: faculty_id },
            success: function(data)
            {
                //console.log(data);
                if(data != 'fail')
                {
                    $('#department_id').empty();
                    $('#department_id').append('<option disabled selected value ="">Select Department</option>');
                    $.each(data,function(index,subcatObj){
                        $('#department_id').append('<option value ="'+subcatObj.ucam_department_id+'">'+subcatObj.name +'</option>');
                    });
                }
                else
                {
                    console.log('failed');
                }
            }
        });
    });
  
  </script>
@endsection
