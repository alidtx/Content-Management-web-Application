@extends('backend.layouts.app')
@section('content')
<style>
    .select2-container .select2-selection--single {
        height: 35px !important;
    }
</style>
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0 text-dark">{{ !empty($editData)? 'Update News | Event | Notice' : 'Add News | Event | Notice' }}</h1> --}}
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Special Achievement</li>
                </ol>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="m-0 text-dark float-left">{{ !empty($editData)? 'Update Special Achievement' : 'Add Special Achievement' }}</h5>
                <a href="{{ route('special_achievement.list') }}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> View Special Achievement</a>
            </div>
            <div class="card-body">
                <form id="newsForm" action="{{ !empty($editData)? route('special_achievement.update',$editData->id) : route('special_achievement.store') }}" method="post" enctype="multipart/form-data" autocomplete="off">

                        @csrf
                        <div class="form-row">

                            <div class="form-group col-sm-12">
                                <label>Title</label>
                                <input id="title" type="text"
                                    value="{{ !empty($editData->title) ? $editData->title : old('title') }}"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    placeholder="Title"> @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Date</label>
                                <input id="date" type="text"
                                    value="{{ !empty($editData->date) ? date('d-m-Y', strtotime($editData->date)) : old('date') }}"
                                    class="form-control singledatepicker @error('date') is-invalid @enderror" name="date"
                                    placeholder="Date"> @error('date')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Image<small style="color: brown"> (Max 2 mb)</small></label>
                                <input type="file"
                                    class="form-control filer_input_single @error('image') is-invalid @enderror"
                                    name="image"> @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Category</label>
                                <select name="category" id="category" class="form-control">
                                    <option value="">Select Category</option>
                                    <option value="1" {{ @$editData->category == '1' ? 'selected' : '' }}>Student</option>
                                    <option value="2" {{ @$editData->category == '2' ? 'selected' : '' }}>Teacher</option>
                                    <option value="3" {{ @$editData->category == '3' ? 'selected' : '' }}>Organization</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Short Description</label>
                                <textarea id="short_description" type="text" class="form-control @error('short_description') is-invalid @enderror"
                                    name="short_description">{{ !empty($editData->short_description) ? $editData->short_description : old('short_description') }}</textarea>
                                @error('short_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Long Description</label>
                                <textarea id="long_description" type="text"
                                    class="form-control @error('long_description') is-invalid @enderror textarea" name="long_description">{{ !empty($editData->long_description) ? $editData->long_description : old('long_description') }}</textarea>
                                @error('long_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i>
                            {{ !empty($editData) ? 'Update ' : 'Save' }}</button>
                    </form>

                </div>

            </div>
            <!--/. container-fluid -->
    </section>
@endsection
