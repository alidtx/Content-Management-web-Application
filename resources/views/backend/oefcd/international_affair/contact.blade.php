
@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Contact</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item">About International</li>
                    <li class="breadcrumb-item">Affairs</li>
                    <li class="breadcrumb-item active">Contact</li>
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
                <a href="{{route('international.affair')}}" class="btn btn-info btn-sm"><i
                        class="fas fa-stream"></i> Back</a>
            </div>
            <div class="card-body">
                <form
                    action="#"
                    method="post" enctype="multipart/form-data" autocomplete="off" id="myForm">
                    @csrf
                    {{-- @include('backend.layouts.pertials.contact') --}}
                    <div class="form-row">
                        <div class="form-group col-sm-12">
                            <label>Contact Us</label>
                            <textarea name="content" class="textarea" required=""></textarea>
                        </div>
                        <div class="form-group col-sm-3">
                            <button class="btn btn-sm btn-primary">
                               Save</button>
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
