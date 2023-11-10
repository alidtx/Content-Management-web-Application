@extends('backend.layouts.app')

@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">University Transport Route List</h1>
                </div>
                <!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Transport Route</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('transport.create') }}" class="btn btn-info btn-sm"><i class="fas fa-stream"></i> Add
                        Transport</a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Sl no.</th>
                                    <th>Route Title</th>
                                    <th>Start Point</th>
                                    <th>End Point</th>
                                    <th>Transport Up Route</th>
                                    <th>Transport Down Route</th>
                                    <th width="255px">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($transport as $i => $item)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->route_title }}</td>
                                        <td>{{ $item->start_point }}</td>
                                        <td>{{ $item->end_point }}</td>
                                        <td>{{ $item->transport_up_root }}</td>
                                        <td>{{ $item->transport_down_root }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-warning"
                                                href="{{ route('transport.edit', $item->id) }}">Edit</a>
                                            <a class="btn btn-sm btn-danger"
                                                href="{{ route('transport.delete', $item->id) }}">Delete</a>
                                            <a class="btn btn-sm btn-success"
                                                href="{{ route('route.time.list', $item->id) }}">Route Time Setup</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
