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
          <h4 class="m-0 text-dark">Gallery Category Add</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Gallery Category')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5>
          @if(isset($editData))
          @lang('Gallery Category') @lang('Update')
          @else
           @lang('New Add')
          @endif
          <a class="btn btn-sm btn-success float-right" href="{{route('setup.gallery_category')}}"><i class="fa fa-list"></i> @lang('Category') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData)?route('setup.gallery_category.update',$editData->id):route('setup.gallery_category.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="name">@lang('Gallery Category Name') {{-- <span class="text-red">*</span> --}}</label>
                <input id="name" type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{@$editData->name}}" placeholder="">
                @error('name')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="sub_category">@lang('Category Parent')</label>
                <select name="sub_category" class="form-control select2  @error('sub_category') is-invalid @enderror">
                    <option disabled selected value="">@lang('Select')</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ @$editData->sub_category == $category->id ? 'selected' : '' }}>
                            {{ @$category->name }}</option>
                    @endforeach
                </select>
                @error('sub_category')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label>Sort Order</label>
                <input type="number" class="form-control @error('sort') is-invalid @enderror" name="sort" autocomplete="off" value="{{ !empty($editData->sort)? $editData->sort : old('sort') }}">
                @error('sort')
                  <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span> 
                @enderror
              </div>
             
              <div class="form-group col-md-6"> 
                <button type="submit" class="btn btn-primary" style="margin-top: 32px;">{{(@$editData)?"Update":"Submit"}}</button>
              </div>
            </div>
          </div>
        </form>
      <!--Form End-->
    </div>
  </div>
</div>



@endsection
