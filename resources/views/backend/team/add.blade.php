@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                {{-- <h1 class="m-0 text-dark">Add Team Member</h1> --}}
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                    <li class="breadcrumb-item active">Add Team</li>
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

  {{-- @php
    foreach ($variable as $key => $value) {
       echo $value->nameEn;
    }
  @endphp --}}



<section class="content">
    <div class="container-fluid">

        <div class="card card-outline card-info">
            <div class="card-header">
                <h5 class="m-0 text-dark float-left">Add Team Member</h5>
                <a href="{{route('manage_team')}}" class="btn btn-info btn-sm float-right"><i class="fas fa-stream"></i> View Team</a>
            </div>
            <div class="card-body">

                <form action="{{ route('manage_team.store') }} " method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf
                    <div class="form-row">

                    <div class="form-group col-sm-6">
                            <label>Team Member</label>
                            <select name="team_member" class="form-control select2" required>
                                <option value="">Select</option>
                                  @foreach ($teaMember as $list )
                                  <option value="{{$list->id}}">{{$list->nameEn}}</option>
                                  @endforeach
                            </select>
                        </div>

                      @php
                          $designations = \App\Models\Designation::all();
                      @endphp
                        <div class="form-group col-sm-6">
                            <label>Designation</label>
                            <select name="designation" class="form-control select2" required>
                                <option value="">Select</option>
                                @foreach ($designations as $designation )
                                <option value="{{$designation->id}}">{{$designation->name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-3">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">Select</option>
                                  <option value="1">Active</option>
                                  <option value="0">Inactive</option>
                            </select>
                        </div>
                         </div>

                    <button class="btn bg-gradient-info btn-flat"><i class="fas fa-save"></i> Add Team</button>
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
