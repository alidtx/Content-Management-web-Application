@extends('backend.layouts.app')
@section('content')
     
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h4 class="m-0 text-dark">Photo Gallery Add</h4>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                            <li class="breadcrumb-item active">@lang('Photo Gallery')</li>
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
                            @if (isset($editData))
                                @lang('Photo Gallery') @lang('Update')
                            @else
                                @lang('Photo Gallery') @lang('Add')
                            @endif
                            <a class="btn btn-sm btn-success float-right" href="{{ route('setup.photo') }}"><i
                                    class="fa fa-list"></i> @lang('Photo Gallery') @lang('List')</a>
                        </h5>
                    </div>

                    <form method="post"
                        action="{{ @$editData ? route('setup.photo.update', $editData->id) : route('setup.photo.store') }}"
                        id="myForm" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-row">
                                
                                <div class="form-group col-md-6">
                                    <label for="gallery_category_id">@lang('Gallery Category') <span class="text-red">*</span></label>
                                    <select name="gallery_category_id"
                                        class="form-control select2  @error('gallery_category_id') is-invalid @enderror">
                                        <option disabled selected value="">@lang('Select')</option>
                                        @foreach ($categories as $category)
                                            <option value="{{ $category->id }}"
                                                {{ @$editData->gallery_category_id == $category->id ? 'selected' : '' }}>
                                                {{ @$category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('gallery_category_id')
                                        <span class="text-red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="title">@lang('Title')</label>
                                    <input id="title" type="text" name="title" class="form-control"
                                        value="{{ @$editData->title }}" placeholder="">
                                </div>
                                @if (@$editData->photo_path)
                                    <input type="hidden" name="image" value="{{ @$editData->photo_path }}"
                                        class="form-control @error('image') is-invalid @enderror" id="image">
                                @endif
                                <div class="form-group col-md-12">
                                    <label for="image">@lang('Image')</label>
                                    <input type="file" name="image"
                                        class="image form-control @error('image') is-invalid @enderror" id="file-input">
                                    @error('image')
                                        <span class="text-red">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="col-md-12">
                                    <!-- The file upload form used as target for the file upload widget -->

                                </div>

                                {{-- <div class="col-sm-3" @if (!isset($editData)) style="margin-bottom: 0px;margin-top: 35px;" @else style="margin-bottom: 0px;margin-top: 35px;" @endif>
                    <div class="form-check" style="margin-left: 0px;">
                        <input type="checkbox" name="status" class="form-check-input" id="status" value="1" {{ @$editData->status == 1 ? 'checked':'' }}>
                        <label data-toggle="tooltip" title="ON/OFF the checkbox to Active/Inactive user !" class="form-check-label" for="status">@if (session()->get('language') == 'en') Active / Inactive @else Active / Inactive @endif </label>
                    </div>
                </div> --}}
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-primary">{{ @$editData ? 'Update' : 'Submit' }}</button>
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
