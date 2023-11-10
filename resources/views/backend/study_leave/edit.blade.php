@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update Leave</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
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

    <div class="card">
            <div class="card-header">
                <a href="{{route('manage_leave')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Leave</a>
            </div>
            <div class="card-body">
                <form action="{{ route('manage_leave.update', $editData->id)}} " method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">
                        <div class="form-group col-sm-4">
                            <label>Purpose Name</label>
                            <input id="purpose" type="text" value="{{$editData->purpose}}" class="form-control @error('purpose') is-invalid @enderror" name="purpose" placeholder="Write Some Purposes" > @error('purpose')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Passport Number</label>
                            <input id="passport" type="text" value="{{$editData->passport}}" class="form-control @error('passport') is-invalid @enderror" name="passport" placeholder="Write a passport number" >
                            @error('passport')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>



                        <div class="form-group col-sm-4">
                            <label>Country</label>
                            <input id="country" type="text" value="{{$editData->country}}" class="form-control @error('country') is-invalid @enderror" name="country" placeholder="Write country name" > @error('country')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Member</label>
                            <select name="profile_id" class="form-control select2">
                                <option value="">Select Member</option>
                                @foreach($profiles as $profile)

                               <option value="{{$profile->id}}" {{ $editData->profile_id == $profile->id ? "selected" : "" }} > {{$profile->nameEn}}</option>

                               @endforeach

                            </select>
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Start Date</label>
                            <input id="start_by" type="date" value="{{date('Y-m-d', strtotime($editData->start_by))}}" class="form-control @error('start_by') is-invalid @enderror" name="start_by" placeholder="Write start date" > @error('start_by')
                            <span class="invalid-feedback" role="alert">

                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>End Date</label>
                            <input id="end_by" type="date" value="{{date('Y-m-d', strtotime($editData->start_by))}}" class="form-control @error('end_by') is-invalid @enderror" name="end_by" placeholder="Write end date" > @error('end_by')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="">Select Type</option>
                                <option {{ $editData->status == 1 ? "selected" : ""}} value="1">Active</option>
                                <option {{ $editData->status == 0 ? "selected" : ""}} value="0">Inactive</option>
                            </select>

                        </div>
                    </div>
                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i> Update Leave</button>
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
