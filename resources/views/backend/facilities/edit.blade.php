@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark">On Campus Facilities</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">On Campus</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script type="text/javascript">
                $(function() {
                    $.notify("{{ $error }}", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                });
            </script>
        @endforeach
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="m-0 text-dark float-left">On Campus Facilities</h4>
                            <a href="{{ route('facilities') }}" class="btn btn-success float-right">View</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">{{ @$data->title }}</div>
                        <form method="post" action="{{ route('on.campus.update', $data->id) }}" id="myForm" enctype="multipart/form-data">
                            {{-- <form method="post" action="{{ route('cpc.section.update') }}" id="myForm"> --}}
                            {{ csrf_field() }}
                            <div class="card-body">
                                <div class="row justify-content-center">
                                    <div class="col-md-12">
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Title <span class="text-red">*</span></label>
                                                <input type="text" name="title" id="name"
                                                    class="form-control form-control-sm" value="{{ @$data->title }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-6">
                                                <label class="control-label">Establishment <span
                                                        class="text-red">*</span></label>
                                                <input type="date" name="establish_date"
                                                    value="{{ date('Y-m-d', strtotime($data->establish_date)) }}"
                                                    class="form-control form-control-sm">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Description</label>
                                                <textarea name="description" class="textarea" id="" cols="30" rows="10"> {{ @$data->description }} </textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Mission</label>
                                                <textarea name="mission" class="textarea" id="" cols="30" rows="10"> {{ @$data->mission }} </textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Vision</label>
                                                <textarea name="vision" class="textarea" id="" cols="30" rows="10"> {{ @$data->vision }} </textarea>
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <label class="control-label">Motto <span class="text-red">*</span></label>
                                                <input type="text" name="motto" id="name"
                                                    class="form-control form-control-sm" value="{{ @$data->motto }}">
                                            </div>
                                        </div>
                                        <div class="form-row">
                                            <div class="form-group col-md-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <label class="control-label">Add Image</label>
                                                        <input type="file" name="image" id="image"
                                                            class="@error('image') is-invalid @enderror">
                                                    </div>
                                                    <div class="card-body">
                                                        <img id="show_image" class="img-fluid"
                                                            src="{{ !empty(@$data->image) ? url('public/upload/on_campus/' . @$data->image) : url('public/upload/no-image.png') }}" style="height: 200px">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-success btn-sm" style="">
                                            @if (isset($editData))
                                                @lang('Update')
                                            @else
                                                @lang('Save')
                                            @endif
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#image').change(function (e) { //show Image before upload
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#show_image').attr('src', e.target.result);
                };
                reader.readAsDataURL(e.target.files[0]);
            });
        });
    </script>

@endsection
