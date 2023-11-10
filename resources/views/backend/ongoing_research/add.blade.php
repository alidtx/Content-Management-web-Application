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
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark">Ongoing Research Add</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Ongoing Research')</li>
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
                        @if (isset($editData))
                            @lang('Ongoing Research') @lang('Update')
                        @else
                            @lang('Ongoing Research') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-info float-right" href="{{ route('news.ongoing_research') }}"><i
                                class="fa fa-list"></i> @lang('Ongoing Research') @lang('List')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post" action="{{ route('news.ongoing_research.store') }}" id="myForm"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-sm-12">
                                <label>Research For</label>
                                <select name="research_for" id="" class="form-control">
                                    <option value="">Select</option>
                                    <option value="1">Bangabandhu Chair</option>
                                    <option value="2">CHSR</option>
                                </select>
                                @error('research_for')
                                    <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Research Title</label>
                                <input id="title" type="text"
                                    value="{{ !empty($editData->title) ? $editData->title : old('title') }}"
                                    class="form-control @error('title') is-invalid @enderror" name="title"
                                    placeholder="Enter Research Title"> @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            @php
                                $profiles = \App\Models\Profile::whereNotIn('personnel_type', [2])->get();
                            @endphp
                            <div class="form-group col-sm-12">
                                <label>Project Director</label>
                                <select name="profile_id" id="" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($profiles as $profile)
                                        <option value="{{ $profile->id }}">{{ $profile->nameEn }}</option>
                                    @endforeach
                                </select>

                                @error('profile_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">
                                <label>PI/CO-PI</label>
                                <textarea id="author" type="text" class="form-control @error('author') is-invalid @enderror" name="author">{{ !empty($editData->author) ? $editData->author : old('author') }}</textarea>
                                @error('author')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Source of Fund</label>
                                <textarea id="source_of_fund" type="text" class="form-control @error('source_of_fund') is-invalid @enderror"
                                    name="source_of_fund">{{ !empty($editData->source_of_fund) ? $editData->source_of_fund : old('source_of_fund') }}</textarea>
                                @error('source_of_fund')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Area of Interest</label>
                                <textarea id="area_of_research" type="text" class="form-control @error('area_of_research') is-invalid @enderror"
                                    name="area_of_research">{{ !empty($editData->area_of_research) ? $editData->area_of_research : old('area_of_research') }}</textarea>
                                @error('area_of_research')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Status</label>
                                <select id="status" name="status" class="form-control form-control-sm select2">
                                    <option value="">Select Type</option>
                                    <option {{ !empty($editData) && $editData->status == 1 ? 'selected' : '' }}
                                        value="1">Active</option>
                                    <option {{ !empty($editData) && $editData->status == 0 ? 'selected' : '' }}
                                        value="0">Inactive</option>
                                </select>
                            </div>
                            <div class="form-group col-sm-6">
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

                            <div class="form-group col-sm-6">
                                <label>Upload Image<small style="color: brown"> (Max 2 mb)</small></label>
                                <input id="image" type="file" value=""
                                    class="form-control @error('image') is-invalid @enderror" name="image">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Upload File<small style="color: brown"> (Max 10 mb)</small></label>
                                <input id="file" type="file" value=""
                                    class="form-control @error('file') is-invalid @enderror" name="file">
                                @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>



                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit"
                                    class="btn btn-info">{{ @$editData ? 'Update' : 'Submit' }}</button>
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
