@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark">Training Lists</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('OEFCD')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content-header -->
    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script type="text/javascript">
                $(function() {
                    $.notify("{{ $error }}", {
                        globalPosition: 'top right',
                        className: 'error'
                    });
                });
            </script>
        @endforeach
    @endif
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <a href="{{ route('oefcd.staff.training.create') }}" class="btn btn-sm btn-info"><i
                                    class="fas fa-plus"></i>
                                Add Training</a>
                        </div>
                        <div class="card-body">
                            <table id="dataTable" class="table table-sm table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th width="5%">#</th>
                                        <th width="45%">Name</th>
                                        <th width="15%">Venue</th>
                                        <th width="20%">Status</th> 
                                        <th width="10%">Trainer</th>
                                        <th width="10%">Trainee</th> 
                                        <th width="5%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($trainer_list as $list)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $list->title }} <br> <small>{{ date('d M Y', strtotime($list->start_at)) }} - 
                                             {{ date('d M Y', strtotime($list->end_at)) }}</small>
                                            </td>
                                            <td>{{ $list->venue }}</td>
                                            <td>@if($list->status == 1)
                                                <span class="btn btn-sm btn-success">Active</span>
                                                @else
                                                <span class="btn btn-sm btn-danger">Inactive</span>
                                                @endif

                                                
                                                
                                                @if(strtotime(now()) > strtotime($list->start_at) && strtotime(now()) > strtotime($list->end_at))
                                                    <span class="btn btn-sm btn-dark">Completed</span>
                                                @elseif(strtotime(now()) > strtotime($list->start_at) && strtotime(now()) < strtotime($list->end_at))
                                                    <span class="btn btn-sm btn-primary">Ongoing</span>
                                                @else 
                                                    <span class="btn btn-sm btn-warning">Upcoming</span> 
                                                @endif
                                            </td>
                                            <td><a href="{{ route('oefcd.staff.training_event.trainer_list', $list->id) }}" class="btn btn-sm btn-info"><i
                                    class="fas fa-eye"></i>
                                View </a></td>
                                            <td><a href="{{ route('oefcd.staff.training_event.trainee_list', $list->id) }}" class="btn btn-sm btn-info"><i
                                    class="fas fa-eye"></i>
                                    View </a></td> 
                                            <td>
                                                <a class="btn btn-sm btn-success" title="Edit"
                                                    href="{{ route('oefcd.staff.training.edit', $list->id) }}"><i
                                                        class="fa fa-edit"></i></a>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

            </div>

        </div>
    </div>

@endsection
 