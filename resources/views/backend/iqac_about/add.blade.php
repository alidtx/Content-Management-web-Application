@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0 text-dark">Add IQAC</h1> --}}
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Add IQAC</li>
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
                <h5 class="m-0 text-dark float-left">Add IQAC</h5>
                <a href="{{route('manage_iqac_about')}}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> View IQAC</a>
            </div>
            <div class="card-body">

                <form action="{{ route('manage_iqac_about.store') }} " method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf

                    <div class="form-row">
                        {{-- <div class="form-group col-sm-12">
                            <label>Title</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title" autocomplete="off" value="{{ !empty($editData->title)? $editData->title : old('title') }}"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div> --}}
                        <div class="form-group col-sm-6">
                            <label>Type IQAC</label>
                            <select name="type" class="form-control" required>
                                <option value="">Select Type</option>
                                  <option value="1">about</option>
                                  <option value="2">story</option>
                                  <option value="3">mission</option>
                                  <option value="4">vission</option>
                                  <option value="5">objective</option>
                                  <option value="6">function</option>
                            </select>
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Image</label>
                            <input id="image" type="file" value="" class="form-control @error('image') is-invalid @enderror" name="image" placeholder="Write Faculty Name" > @error('image')

                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>


                        <div class="form-group col-sm-12">
                            <label>Short Description</label>
                            <textarea type="text" class="form-control @error('short_description') is-invalid @enderror textarea " name="short_description">{{ !empty($editData->short_description)? $editData->short_description : old('short_description') }}</textarea>
                            @error('short_description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                         </div>

                    <button class="btn bg-gradient-info btn-flat"><i class="fas fa-save"></i> Add IQAC</button>
                </form>

            </div>

        </div>
        <!--/. container-fluid -->
    </section>
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
