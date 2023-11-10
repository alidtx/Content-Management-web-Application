@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0 text-dark">Add Leave</h1> --}}
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Leave</li>
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
                <h5 class="m-0 text-dark float-left">Add Leave</h5>
                <a href="{{route('manage_leave')}}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> View Leave</a>
            </div>
            <div class="card-body">
                <form action="{{ route('manage_leave.store') }} " method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label>Purpose Name <span class="text-red">*</span></label>
                            <input id="purpose" type="text" value="" class="form-control @error('purpose') is-invalid @enderror" name="purpose" placeholder="Write Some Purposes" > @error('purpose')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Passport Number <span class="text-red">*</span></label>
                            <input id="passport" type="text" value="" class="form-control @error('passport') is-invalid @enderror" name="passport" placeholder="Write a passport number" >
                            @error('passport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>



                        <div class="form-group col-sm-4">
                            <label>Country <span class="text-red">*</span></label>
                            <input id="country" type="text" value="" class="form-control @error('country') is-invalid @enderror" name="country" placeholder="Write country name" > @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Member <span class="text-red">*</span></label>
                            <select name="profile_id" class="form-control select2">
                                <option value="">Select member</option>
                                  @foreach($profiles as $profile )

                                <option value="{{$profile->id}}">{{$profile->nameEn}}</option>

                                   @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Start Date <span class="text-red">*</span></label>
                            <input id="start_by" type="date" value="" class="form-control @error('start_by') is-invalid @enderror" name="start_by" placeholder="Write start date" > @error('start_by')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>End Date <span class="text-red">*</span></label>
                            <input id="end_by" type="date" value="" class="form-control @error('end_by') is-invalid @enderror" name="end_by" placeholder="Write end date" > @error('end_by')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>


                        <div class="form-group col-sm-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="">Select Type</option>
                                <option value="1">Active</option>
                                <option value="0">Inactive</option>
                            </select>

                        </div>
                    </div>


                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> Save Leave</button>
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
