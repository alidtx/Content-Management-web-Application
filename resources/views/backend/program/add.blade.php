@extends('backend.layouts.app')
@section('content')
    <style type="text/css">
        .i-style {
            display: inline-block;
            padding: 10px;
            width: 2em;
            text-align: center;
            font-size: 2em;
            vertical-align: middle;
            color: #444;
        }

        .demo-icon {
            cursor: pointer;
        }
    </style>
    <style>
        .select2-container .select2-selection--single {
            height: 35px;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark">Program Add</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Program')</li>
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
                            @lang('Program') @lang('Update')
                        @else
                            @lang('Program') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-success float-right" href="{{ route('setup.program') }}"><i
                                class="fa fa-list"></i> @lang('Program') @lang('List')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post"
                    action="{{ @$editData ? route('setup.program.update', $editData->id) : route('setup.program.store') }}"
                    id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="program_category">@lang('Program Category') {{-- <span class="text-red">*</span> --}}</label>
                                <select name="program_category_id"
                                    class="form-control @error('program_category_id') is-invalid @enderror select2">
                                    <option value="">@lang('Select')</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ @$editData->program_category_id == $category->id ? 'selected' : '' }}>
                                            {{ @$category->program_category }}</option>
                                    @endforeach
                                </select>
                                @error('program_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            @include('backend.layouts.pertials.faculty_wise_department')

                            <div class="form-group col-md-6">
                                <label for="program_title">@lang('Program Title')</label>
                                <input id="program_title" type="text" name="program_title"
                                    class="form-control @error('program_title') is-invalid @enderror"
                                    value="{{ @$editData->program_title }}" placeholder="">
                                @error('program_category_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="program_title">Course Outline</label>
                                <textarea name="outline" class="textarea" id="" cols="5" rows="5">{{ @$editData->outline }}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="program_title">Admission Criteria</label>
                                <textarea name="admission_criteria" class="textarea" id="" cols="5" rows="5">{{ @$editData->admission_criteria }}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="program_title">General Guidline</label>
                                <textarea name="general_guidline" class="textarea" id="" cols="5" rows="5">{{ @$editData->general_guidline }}</textarea>
                            </div>
                            <div class="form-group col-md-12">
                                <label for="program_title">Course List</label>
                                <textarea name="course_list" class="textarea" id="" cols="5" rows="5">{{ @$editData->course_list }}</textarea>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">@lang('Slider') {{-- <span class="text-red">*</span> --}}</label>
                                @php
                                    $sliders = App\Models\Slider::with('slider_master')->get();
                                @endphp
                                <select name="slider_id" class="form-control" id="">
                                    <option value="">@lang('Select')</option>
                                    @foreach ($sliders as $slider)
                                        <option value="{{ @$slider->id }}"
                                            {{ @$editData->slider_id == @$slider->id ? 'selected' : '' }}>
                                            {{ @$slider->slider_master->name }}</option>
                                    @endforeach
                                </select>
                                @error('slider_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">@lang('Admission') {{-- <span class="text-red">*</span> --}}</label>
                                <select name="is_admission" class="form-control" id="">
                                    <option value="">@lang('Select')</option>
                                    <option value="1" {{ @$editData->is_admission == 1 ? 'selected' : '' }}>ON
                                    </option>
                                    <option value="0" {{ @$editData->is_admission == 0 ? 'selected' : '' }}>OFF
                                    </option>
                                </select>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="ucam_program_id">@lang('Admission Start Date')</label>
                                <input id="" type="date" name="admission_start_date" class="form-control"
                                    value="{{ @$editData->admission_start_date }}" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="">@lang('Admission End Date')</label>
                                <input id="ucam_program_id" type="date" name="admission_end_date" class="form-control"
                                    value="{{ @$editData->admission_end_date }}" placeholder="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="ucam_program_id">@lang('Ucam Program ID')</label>
                                <input id="ucam_program_id" type="text" name="ucam_program_id" class="form-control"
                                    value="{{ @$editData->ucam_program_id }}" placeholder="">
                            </div>
                            <div class="form-group col-sm-3">
                                <label>Image<small style="color: brown"> (Max 2 mb)</small></label>
                                <input type="file"
                                    class="form-control filer_input_single @error('image') is-invalid @enderror"
                                    name="image"> @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-3">
                                <img src="{{ asset('public/upload/program/' . @$editData['image']) }}" width="80"
                                    height="80">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit"
                                    class="btn btn-primary">{{ @$editData ? 'Update' : 'Submit' }}</button>
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
        $(document).ready(function() {
            var a1 = CKEDITOR.replace('long_title_en');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
            var a1 = CKEDITOR.replace('long_title_bn');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('textarea').each(function() {
                $(this).val($(this).val().trim());
            });

            $('#myForm').validate({
                ignore: [],
                debug: false,
                rules: {
                    date: {
                        required: true,
                    },
                    short_title_en: {
                        required: true,
                    },
                    short_title_bn: {
                        required: true,
                    },
                    long_title_en: {
                        required: true,
                    },
                    long_title_bn: {
                        required: true,
                    },
                    status: {
                        required: true,
                    }
                },
                messages: {

                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
        });
    </script>
@endsection
