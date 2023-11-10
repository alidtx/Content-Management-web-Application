@extends('backend.layouts.app') @section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">Add Blog</h1> --}}
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item">Blog</li>
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
                    <h5 class="m-0 text-dark float-left">Add Blog</h5>
                    <a href="{{ route('blog.index') }}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> View
                        Blogs</a>
                </div>
                <div class="card-body">

                    <form
                        action="{{ !empty($editData) ? route('blog.update', $editData->id) : route('blog.store') }} "method="post"
                        enctype="multipart/form-data" autocomplete="off">

                        @csrf
                        <div class="form-row">
                            <div class="form-group col-sm-6">
                                <label>Category</label>
                                <select name="category_id" class="form-control select2">
                                    <option value="">Select</option>
                                    <option value="1">Category 1</option>
                                    <option value="1">Category 11</option>
                                    <option value="1">Category 111</option>
                                    <option value="1">Category 1111</option>
                                </select>
                            </div>

                            <div class="form-group col-sm-6">
                                <label for="">Color</label>
                                <input type="color" name="color"
                                    value="{{ !empty($editData) ? $editData->title : old('title') }}" class="form-control"
                                    placeholder="Enter Title">
                            </div>
                            <div class="form-group col-sm-6">
                                <label for="">Title</label>
                                <input type="text" name="title"
                                    value="{{ !empty($editData) ? $editData->title : old('title') }}" class="form-control"
                                    placeholder="Enter Title">
                            </div>

                            <div class="form-group col-sm-12">
                                <label for="">Description</label>
                                <textarea name="description" id="" cols="5" rows="5">{{ @$editData->description }}</textarea>
                            </div>

                            <div class="form-group col-sm-3">
                                <label>Status</label>
                                <select name="status" class="form-control" required>
                                    <option value="">Select</option>
                                    <option value="1" {{ @$editData->status == 1 ? 'selected' : '' }}>Active</option>
                                    <option value="0" {{ @$editData->status == 0 ? 'selected' : '' }}>Inctive</option>
                                </select>
                            </div>
                        </div>

                        <button class="btn bg-gradient-info btn-flat"><i class="fas fa-save"></i>Save</button>
                    </form>

                </div>

            </div>
            <!--/. container-fluid -->
    </section>

    <script type="text/javascript">
        $(document).ready(function() {
            var a1 = CKEDITOR.replace('description');
            CKFinder.setupCKEditor(a1, '/ckfinder/');
        });
    </script>

    <script type="text/javascript">
        $(function() {
            $('#tour_name').on('keyup', function() {
                var Text = $(this).val();
                Text = Text.toLowerCase();
                Text = Text.replace(/[^a-zA-Z0-9]+/g, '-');
                $("#tour_slug").val(Text);
            });
        });
    </script>
@endsection
