@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update Banner' : 'Add Banner' }}</h1> --}}
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Banner Image</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">

        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="m-0 text-dark float-left">{{ !empty($editData)? 'Update Banner Image' : 'Add Banner Image' }}</h5>
                <a href="{{route('site-setting.banner')}}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> View Banner Image</a>
            </div>
            <div class="card-body">
                <form action="{{ !empty($editData)? route('site-setting.banner.update',$editData->id) : route('site-setting.banner.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">
                    @csrf
                    <div class="form-row">

                        <div class="form-group col-sm-6">
                            <label>Title <span class="text-red">*</span></label>
                            <input type="text" name="title" class="form-control  @error('title') is-invalid @enderror" id="title" value="{{ !empty($editData->title)? $editData->title : old('name') }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-6">
                            <label>Banner Image<small style="color: brown"> (Max 2 mb)</small><span class="text-red">*</span></label>
                            <input type="file" class="form-control filer_input_single @error('image') is-invalid @enderror" name="image"> @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-md-6">
                            <label for="ref_id">@lang('Banner Type') <span class="text-danger">*</span></label>
                            <select id="ref_id" name="ref_id" class="form-control select2">
                                <option value="" disabled>@lang('Please Select')</option>
                                @foreach ($types as $key => $type)
                                    <option value="{{ $type->id }}" {{ @$editData->ref_id == $type->id ? 'selected' : '' }} >
                                        {{ @$type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-sm-2" style="margin-top: 35px;">
                            <div class="form-check" style="margin-left: 5px;">
                              <input type="checkbox" name="status" class="form-check-input" id="status" value="1" {{ @$editData->status == 1 ? 'checked' : '' }}>
                              <label class="form-check-label" for="status">Status</label>
                            </div>
                        </div>

                        <div class="form-group col-sm-12">
                            <label>Description</label>
                            <textarea type="text" class="form-control @error('description') is-invalid @enderror textarea " name="description">{{ !empty($editData->description)? $editData->description : old('description') }}</textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> {{ !empty($editData)? 'Update Banner' : 'Save Banner' }}</button>
                    </div>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>
    @endsection
