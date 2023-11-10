@extends('backend.layouts.app') @section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">Update Team Member</h1>
            </div>
            <!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active">Team Member</li>
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
                <a href="{{route('manage_team')}}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> View Team Member</a>
            </div>
            <div class="card-body">
                <form action="{{ route('manage_team.update', $editData->id) }} " method="post" enctype="multipart/form-data" autocomplete="off">

                    @csrf

                    <div class="form-row">

                        <div class="form-group col-sm-6">
                            <label>Team Member</label>
                            <select name="team_member" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($teamMember as $list)
                                <option value="{{@$list->id}}" {{ $editData->id== $list->id ? "selected" : "" }}>{{$list->nameEn}}</option>
                                @endforeach

                            </select>
                        </div>


                        <div class="form-group col-sm-6">
                            <label>Designation</label>
                            <select name="designation" class="form-control" required>
                                <option value="">Select</option>
                                @foreach($teamMember as $list)
                                <option value="{{@$list->id}}" {{ $editData->id== $list->id ? "selected" : "" }}>{{$list->designation}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-sm-3">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="">Select</option>
                                   @if ($editData->status==1)
                                   <option value="1" selected>Active</option>
                                   @else
                                   <option value="0">Inactive</option>
                                   @endif
                            </select>
                        </div>
                         </div>
                    <button class="btn bg-gradient-success btn-flat"><i class="fas fa-save"></i>Update Team Member</button>
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
