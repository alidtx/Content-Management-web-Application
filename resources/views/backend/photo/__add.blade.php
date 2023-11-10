@extends('backend.layouts.app')
@section('content')
    {{-- <style type="text/css">
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
<style>
  .select2-container .select2-selection--single {
    height: 35px;
  }
</style>
<style type="text/css">
    img {
      display: block;
      max-width: 100%;
    }
    .preview {
      overflow: hidden;
      width: 160px;
      height: 160px;
      margin: 10px;
      border: 1px solid red;
    }
    .modal-lg{
      max-width: 1000px !important;
    }
    </style> --}}
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
                            {{-- <div class="form-group col-md-6">
                <label for="faculty">@lang('Faculty') <span class="text-red">*</span></label>
                <select name="faculty_id" class="form-control select2">
                  <option value="">@lang('Select')</option>
                  <option value="1" {{(@$editData->faculty=="0")?"selected":""}}>Faculty 1</option>
                  <option value="2" {{(@$editData->faculty=="1")?"selected":""}}>Faculty 2</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="department">@lang('Department') <span class="text-red">*</span></label>
                <select name="department_id" class="form-control select2">
                  <option value="">@lang('Select')</option>
                  <option value="1" {{(@$editData->department=="0")?"selected":""}}>Department 1</option>
                  <option value="2" {{(@$editData->department=="1")?"selected":""}}>Department 2</option>
                </select>
              </div> --}}
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
        <div>
            <form id="fileupload" action="https://jquery-file-upload.appspot.com/" method="POST"
                enctype="multipart/form-data">
                @csrf
                <!-- Redirect browsers with JavaScript disabled to the origin page -->
                <noscript><input type="hidden" name="redirect"
                        value="https://blueimp.github.io/jQuery-File-Upload/" /></noscript>
                <!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
                <div class="row fileupload-buttonbar">
                    <div class="col-lg-7">
                        <!-- The fileinput-button span is used to style the file input field as button -->
                        <span class="btn btn-success fileinput-button">
                            <i class="glyphicon glyphicon-plus"></i>
                            <span>Add files...</span>
                            <input type="file" name="files[]" multiple />
                        </span>
                        <button type="submit" class="btn btn-primary start">
                            <i class="glyphicon glyphicon-upload"></i>
                            <span>Start upload</span>
                        </button>
                        <button type="reset" class="btn btn-warning cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>Cancel upload</span>
                        </button>
                        <button type="button" class="btn btn-danger delete">
                            <i class="glyphicon glyphicon-trash"></i>
                            <span>Delete selected</span>
                        </button>
                        <input type="checkbox" class="toggle" />
                        <!-- The global file processing state -->
                        <span class="fileupload-process"></span>
                    </div>
                    <!-- The global progress state -->
                    <div class="col-lg-5 fileupload-progress fade">
                        <!-- The global progress bar -->
                        <div class="progress progress-striped active" role="progressbar" aria-valuemin="0"
                            aria-valuemax="100">
                            <div class="progress-bar progress-bar-success" style="width: 0%;"></div>
                        </div>
                        <!-- The extended global progress state -->
                        <div class="progress-extended">&nbsp;</div>
                    </div>
                </div>
                <!-- The table listing the files available for upload/download -->
                <table role="presentation" class="table table-striped">
                    <tbody class="files"></tbody>
                </table>
            </form>
        </div>

    </div>
    </div>

    <script>
        $(function() {
            'use strict';
            $('#fileupload').fileupload({
                url: '{{ route('setup.photo.photos_upload') }}'
            });

            // Enable iframe cross-domain access via redirect option:
            $('#fileupload').fileupload(
                'option',
                'redirect',
                window.location.href.replace(/\/[^/]*$/, '/cors/result.html?%s')
            );

            $('#fileupload').addClass('fileupload-processing');

            $.ajax({
                    url: $('#fileupload').fileupload('option', 'url'),
                    dataType: 'json',
                    context: $('#fileupload')[0]
                })

                .always(function() {
                    $(this).removeClass('fileupload-processing');
                })

                .done(function(result) {
                    $(this)
                        .fileupload('option', 'done')
                        .call(this, $.Event('done'), {
                            result: result
                        });
                });
        });
    </script>
@endsection
