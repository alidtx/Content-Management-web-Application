@extends('backend.layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">{{ !empty($editData) ? 'Update Post' : 'Add Post' }}</h1> --}}
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active">Post</li>
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
                    <h5 class="m-0 text-dark float-left">{{ !empty($editData) ? 'Update Post' : 'Add Post' }}</h5>
                    <a href="{{ route('frontend-menu.post.view') }}" class="btn btn-info btn-sm float-right"><i
                            class="fas fa-stream"></i> View Post</a>
                </div>
                <div class="card-body">
                    <form
                        action="{{ !empty($editData) ? route('frontend-menu.post.update', $editData->id) : route('frontend-menu.post.store') }}"
                        method="post" enctype="multipart/form-data" autocomplete="off" id="myForm">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                @php
                                    $menu_types = \App\Models\MenuType::all();
                                @endphp
                                <label>Post Category</label>
                                <select name="type" id="" class="form-control select2">
                                    <option value="">Select</option>
                                    @foreach ($menu_types as $type)
                                        <option value="{{ $type->id }}" {{@$editData->type == $type->id ? 'selected' : ''}}>{{ $type->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Title</label>
                                <input id="title" name="title" type="text" value="{{ @$editData->title }}"
                                    class="form-control" placeholder="Post Title">
                            </div>

                            <div class="form-group col-sm-6">
                                <label>Meta Title</label>
                                <input id="meta_title" name="meta_title" type="text" value="{{ @$editData->meta_title }}"
                                    class="form-control" placeholder="Meta Title">
                            </div>
                            <div class="form-group col-sm-6">
                                <label>Meta Keyword</label>
                                <input id="meta_keyword" name="meta_keyword" type="text" value="{{ @$editData->meta_keyword }}"
                                    class="form-control" placeholder="Meta Keyword">
                            </div>

                            <div class="form-group col-sm-12">
                                <label>Description</label>
                                <textarea name="description" class="textarea">{{ @$editData->description }}</textarea>
                            </div>
                            <div class="form-group col-sm-12">
                                <label>Meta Description</label>
                                <textarea name="meta_description" class="textarea">{{ @$editData->meta_description }}</textarea>
                            </div>
                            {{-- <div class="form-row"> --}}
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
                            {{-- </div> --}}
                            <div class="form-group col-sm-3">
                                <button class="btn btn-sm btn-info">
                                    {{ !empty($editData) ? 'Update Post' : 'Save Post' }}</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>
            <!--/. container-fluid -->
    </section>
    <script type="text/javascript">
        $(document).ready(function() {
            // var a1 = CKEDITOR.replace('description');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
        });
    </script>
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
    <script>
        $(document).ready(function() {
            $('textarea').each(function() {
                $(this).val($(this).val().trim());
            });

            $('#myForm').validate({
                ignore: [],
                debug: false,
                errorClass: 'text-danger',
                validClass: 'text-success',
                rules: {
                    description: {
                        required: function() {
                            CKEDITOR.instances.description.updateElement();
                        },

                        minlength: 10
                    },
                    title: {
                        required: true
                    }
                },
                messages: {

                }
            });
        });
    </script>
@endsection
