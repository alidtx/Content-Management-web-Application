@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update Add Work Shop Seminar</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Work Shop Seminar</li>
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
                <a href="{{route('manage_workshop_seminar')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Work Shop Seminar</a>
            </div>
            <div class="card-body">
                <form action="{{ route('manage_workshop_seminar.update', $editData->id) }} " method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf

                    <div class="form-row">

                        <div class="form-group col-sm-4">
                            <label>Training Name</label>
                            <input id="traning" type="text" value="{{$editData->traning}}" class="form-control @error('traning') is-invalid @enderror" name="traning" placeholder="Write traning Name"> @error('traning')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Work Shop</label>
                            <input id="work_shop" type="text" value="{{$editData->work_shop}}" class="form-control @error('work_shop') is-invalid @enderror" name="work_shop" placeholder="Write Work Shop"> @error('work_shop')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Seminar</label>
                            <input id="seminar" type="text" value="{{$editData->seminar}}" class="form-control @error('seminar') is-invalid @enderror" name="seminar" placeholder="Write seminar name"> @error('seminar')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                        <div class="form-group col-sm-4">
                            <label>Participant</label>
                            <input id="participant" type="text" value="{{$editData->participant}}" class="form-control @error('participant') is-invalid @enderror" name="participant" placeholder="Write participant name"> @error('participant')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>


                        <div class="form-group col-sm-4">
                            <label>Schedule</label>
                            <input id="schedule" type="date"   value="{{ \Carbon\Carbon::parse($editData->schedule)->format('Y-m-d') }}"  class="form-control @error('schedule') is-invalid @enderror" name="schedule" placeholder="Write schedule name"> @error('schedule')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>

                    <div class="form-group col-sm-6">
                            <label>Facilator Name</label>
                            <select name="facilator" class="form-control select2" required>
                                <option value="">Select facilator Name</option>
                                  @foreach ($TrainingWorkShopMember as $item )
                                     <option value="{{$item->member->id}}" {{ $editData->id== $item->id ? "selected" : "" }}>{{$item->member->nameEn}}</option>
                                  @endforeach

                            </select>
                        </div>
                         </div>
                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i>Update Training Work Shop</button>
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
