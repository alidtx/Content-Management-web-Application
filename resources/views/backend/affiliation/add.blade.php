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
                    {{-- <h4 class="m-0 text-dark">Affiliation Add</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Affiliation')</li>
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
                            @lang('Affiliation') @lang('Update')
                        @else
                            @lang('Affiliation') @lang('Add')
                        @endif
                        <a class="btn btn-sm btn-info float-right" href="{{ route('setup.affiliation') }}"><i
                                class="fa fa-list"></i> @lang('Affiliation') @lang('List')</a>
                    </h5>
                </div>
                <!-- Form Start-->
                <form method="post"
                    action="{{ @$editData ? route('setup.affiliation.update', $editData->id) : route('setup.affiliation.store') }}"
                    id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-row">
                            <div class="form-group col-md-5">
                                <label for="name">@lang('Affiliate Institute Name') <span class="text-red">*</span></label>
                                <input id="inst_name" type="text" name="inst_name"
                                    class="form-control @error('inst_name') is-invalid @enderror" value="{{ @$editData->inst_name }}"
                                    placeholder="">
                                @error('inst_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-5">
                                <label for="institution_type">@lang('Affiliate Institute Type') <span class="text-red">*</span></label>
                                <input id="institution_type" type="text" name="institution_type"
                                    class="form-control @error('institution_type') is-invalid @enderror" value="{{ @$editData->institution_type }}"
                                    placeholder="">
                                @error('institution_type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-2" style="margin-top: 35px;">
                                <div class="form-check" style="margin-left: 5px;">
                                  <input type="checkbox" name="is_featured" class="form-check-input" id="is_featured" value="1" {{ @$editData->is_featured == 1 ? 'checked':'' }}>
                                  <label class="form-check-label" for="is_featured">Is Featured?</label>
                                </div>
                            </div> 

                            <div class="form-group col-md-12">
                                <label for="description">@lang('Description About Affiliation')</label>
                                <textarea id="inst_description" name="inst_description" class="form-control textarea">{{ !empty($editData->inst_description) ? $editData->inst_description : '' }}</textarea>
                                @error('inst_description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-12">
                                <label for="url">@lang('URL') {{-- <span class="text-red">*</span> --}}</label>
                                <input id="url" type="url" name="url"
                                    class="form-control @error('url') is-invalid @enderror" value="{{ @$editData->url }}"
                                    placeholder="">
                                @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group col-md-12">
                                <label for="url">@lang('Location') {{-- <span class="text-red">*</span> --}}</label>
                                <input id="location" type="text" name="location"
                                    class="form-control @error('url') is-invalid @enderror" value="{{ @$editData->location }}"
                                    placeholder="">
                                @error('location')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">
                                <label for="logo">@lang('logo')</label>
                                <input type="file" name="image" id="imageFile"
                                    class="form-control @error('image') is-invalid @enderror">
                                @error('image')
                                    <span class="text-red">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group col-md-3">

                               <img id="show_image" class="img-fluid"
                                    src="{{ !empty(@$data->image) ? url('public/upload/affiliation/' . @$data->image) : url('public/upload/no-image.png') }}" style="height: 200px">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <button type="submit" class="btn btn-info">{{ @$editData ? 'Update' : 'Submit' }}</button>
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
        $(document).ready(function(){
            $('#imageFile').change(function (e) { //show Image before upload
                var reader = new FileReader();
                reader.onload = function (e) {
                    // console.log(e.target.result);
                    $('#show_image').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>

    <script type="text/javascript">
        // $(document).ready(function () {
        //   $('textarea').each(function(){
        //           $(this).val($(this).val().trim());
        //       }
        //   );

        //   $('#myForm').validate({
        //     ignore : [],
        //     debug : false,
        //     rules: {
        //       date: {
        //         required: true,
        //       },
        //       short_title_en: {
        //         required: true,
        //       },
        //       status: {
        //         required: true,
        //       }
        //     },
        //     messages: {

        //     },
        //     errorElement: 'span',
        //     errorPlacement: function (error, element) {
        //       error.addClass('invalid-feedback');
        //       element.closest('.form-group').append(error);
        //     },
        //     highlight: function (element, errorClass, validClass) {
        //       $(element).addClass('is-invalid');
        //     },
        //     unhighlight: function (element, errorClass, validClass) {
        //       $(element).removeClass('is-invalid');
        //     }
        //   });
        // });
    </script>
@endsection
