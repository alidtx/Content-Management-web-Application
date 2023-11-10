@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update Document</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Work Document</li>
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

        <div class="card">
            <div class="card-header">
                <a href="{{route('manage_document')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Document</a>
            </div>
            <div class="card-body">
                <form action="{{ route('manage_document.update', $editData->id) }} " method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf

                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label>Title</label>
                            <input id="title" type="text" value="{{$editData->title}}" class="form-control @error('title') is-invalid @enderror" name="title" placeholder="Write a title"> @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Image</label>
                            <input id="image" type="file" value="" class="form-control @error('image') is-invalid @enderror" name="image" >
                            <img height="50px" src="{{asset('storage/app/public/media/trainingimage/'.@$editData->image)}}" alt="">
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Document</label>
                            <input id="document" type="file" value="" class="form-control @error('document') is-invalid @enderror" name="document" >
                            <a href="{{asset('storage/app/public/media/training/'.$editData->document)}}" alt="_blank"><img style="cursor: pointer" height="30px" src="{{asset('storage/app/public/media/training/pdf.png')}}" alt=""></a>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                         </div>
                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> Update Document</button>
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
