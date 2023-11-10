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
    <style>
        .select2-container {
            display: block;
        }
    </style>
    <style>
        .ms-container {
            width: 100%;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark">Club Add</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Club')</li>
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
                            @lang('Event') @lang('Update')
                        @else
                            @lang('New Event') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-success float-right" href="{{ route('event.list') }}"><i
                                class="fa fa-list"></i> @lang('Event') @lang('Lists')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post" action="{{ @$editData ? route('event.update', $editData->id) : route('event.store') }}"
                    id="" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">

                            <div class="form-group col-md-6">
                                <label for="event_for">@lang('Event For') <span class="text-red">*</span></label>
                                <select id="event_for" name="event_" class="form-control select2">
                                    <option value="" disabled selected>@lang('Select')</option>
                                    <option value="1">
                                        Academic
                                    </option>
                                    <option value="2">
                                        Office
                                    </option>
                                    <option value="3">
                                        Club
                                    </option>
                                </select>
                            </div>


                            <div id="faculty_div" class="form-group col-md-12" style="display: none;">
                                <label for="faculty_id">@lang('Faculty') <span class="text-red">*</span></label>
                                <select id="faculty_id" name="faculty_id[]" class="form-control lou-multi-select" multiple>
                                    @foreach ($faculties as $faculty)
                                        <option value="{{ $faculty->id }}"
                                            {{ @$editData->faculty_id == $faculty->id ? 'selected' : '' }}>
                                            {{ @$faculty->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                            <div id="department_div" class="form-group col-md-12" style="display: none;">
                                <label for="department_id">@lang('Department') <span class="text-red">*</span></label>
                                <select id="department_id" name="department_id[]" class="form-control lou-multi-select"
                                    multiple>
                                </select>
                            </div>
                            @php
                                $clubs = \App\Models\Club::all();
                            @endphp
                            <div id="club_div" class="form-group col-md-6" style="display: none;">
                                <label for="">@lang('Select Club') <span class="text-red">*</span></label>
                                <select id="" name="club_id" class="form-control">
                                    <option value="">Select</option>
                                    @foreach ($clubs as $club)
                                        <option value="{{ $club->id }}">{{ $club->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            {{-- <div id="office_div" class="form-group col-md-12" style="display: none;">
                                <label for="office_id">@lang('Office') <span class="text-red">*</span></label>
                                <select id="office_id" name="office_id" class="form-control select2" multiple>
                                  <option value="" disabled>@lang('Select')</option>
                                  <option value="1" {{(@$editData->office_id=="0")?"selected":""}}>Office 1</option>
                                  <option value="2" {{(@$editData->office_id=="1")?"selected":""}}>Office 2</option>
                                </select>
                              </div>
                              <div id="service_div" class="form-group col-md-12" style="display: none;">
                                <label for="service_id">@lang('Service') <span class="text-red">*</span></label>
                                <select id="service_id" name="service_id" class="form-control select2" multiple>
                                  <option value="" disabled>@lang('Select')</option>
                                  <option value="1" {{(@$editData->service_id=="0")?"selected":""}}>Service 1</option>
                                  <option value="2" {{(@$editData->service_id=="1")?"selected":""}}>Service 2</option>
                                </select>
                              </div> --}}


                            <div class="form-group col-md-12">
                                <label for="clubName">Title</label>
                                {{-- <input type="hidden" name="event_for" value="3"> --}}
                                <input type="text" name="title"
                                    class="form-control @error('title') is-invalid @enderror" placeholder="Title"
                                    value="{{ @$editData->title }}">
                                @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">@lang('Description') {{-- <span class="text-red">*</span> --}}</label>
                                <textarea name="description" class="textarea" id="" cols="30" rows="10"> {{ @$editData->description }} </textarea>
                                @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="motto">@lang('Location')</label>
                                <input id="motto" type="text" name="location"
                                    class="form-control  @error('location') is-invalid @enderror"
                                    value="{{ @$editData->location }}" placeholder="Location">
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">Start Date</label>
                                <input type="" name="start_date" class="form-control singledatepicker"
                                    value="{{ @$editData->start_date }}">
                            </div>
                            <div class="form-group col-md-12">
                                <label for="">End Date</label>
                                <input type="" name="end_date" class="form-control singledatepicker"
                                    value="{{ @$editData->end_date }}">
                            </div>

                            <div class="form-group col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="visible" value="1"
                                        id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Visible
                                    </label>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="show_on_homepage"
                                        value="1" id="flexCheckChecked" checked>
                                    <label class="form-check-label" for="flexCheckChecked">
                                        Show Home Page
                                    </label>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="">@lang('Banner')</label>
                                <input type="file" name="banner" id="image"
                                    class="@error('image') is-invalid @enderror" autocomplete="off">
                                @error('image')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-6">
                                <img id="showImage" class="img-fluid"
                                    src="{{ !empty(@$editData->banner) ? url('public/upload/banner/' . @$editData->banner) : url('upload/no_image.png') }}">
                                @error('image')
                                    <span class="text-red">{{ $message }}</span>
                                @enderror
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
        $(document).on('select change', '#event_for', function() {
            var event_for = $('#event_for').val();
            // alert(event_for);
            if (event_for == 1) {
                document.getElementById("faculty_div").style.display = "";
                document.getElementById("department_div").style.display = "";
                document.getElementById("club_div").style.display = "none";
            } else if (event_for == 2) {
                document.getElementById("faculty_div").style.display = "none";
                document.getElementById("department_div").style.display = "none";
                document.getElementById("club_div").style.display = "none";

            } else if (event_for == 3) {
                document.getElementById("faculty_div").style.display = "none";
                document.getElementById("department_div").style.display = "none";
                document.getElementById("club_div").style.display = "";

            }
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            var a1 = CKEDITOR.replace('description');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
            var a1 = CKEDITOR.replace('mission');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
            var a1 = CKEDITOR.replace('vision');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) { //show Image before upload
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });
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
                    name: {
                        required: true,
                    },
                    member_list: {
                        required: true,
                    },
                    faculty_id: {
                        required: true,
                    },
                    department_id: {
                        required: true,
                    },
                    description1: {
                        required: true,
                    },
                    mission1: {
                        required: true,
                    },
                    vision1: {
                        required: true,
                    },
                    motto: {
                        required: true,
                    },
                    banner: {
                        required: true,
                    },
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

    <script type="text/javascript">
        $(document).on('change', '#faculty_id', function() {
            var faculty_id = $('#faculty_id').val();
            var department_id = $('#department_id').val();
            $.ajax({
                url: "{{ route('multiple_faculty_wise_department') }}",
                type: "GET",
                data: {
                    faculty_id: faculty_id
                },
                success: function(data) {
                    $('#department_id').empty().multiSelect('refresh');
                    $.each(data, function(index, subcatObj) {
                        $('#department_id').multiSelect('addOption', {
                            value: subcatObj.id,
                            text: subcatObj.name
                        });
                    });
                    $('#department_id').multiSelect('select', department_id);
                    $('#department_id').trigger('change');
                }
            });
        });
    </script>
@endsection
