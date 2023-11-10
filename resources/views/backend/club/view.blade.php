@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark"> @lang('List of Club')</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Club')</li>
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
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <h5>@lang('Club') @lang('List')
                            <a class="btn btn-sm btn-primary float-right" href="{{ route('club.add') }}"><i
                                    class="fa fa-plus-circle"></i> @lang('Club') @lang('Add')</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('Club Name')</th>
                                    <th>@lang('Faculty')</th>
                                    <th>@lang('Department')</th>
                                    <th style="width:8%">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clubs as $club)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $club->name }}</td>
                                        <td>{{ isset($club->faculty->name) ? $club->faculty->name : '' }}</td>
                                        <td>{{ isset($club->department->name) ? $club->department->name : '' }}</td>
                                        <td>
                                            <a href="{{ route('club.events.list',$club->id) }}" class="btn btn-info btn-sm"
                                                title="Event List"><i class="fa fa-list"></i></a>
                                            <a href="{{ route('club.edit', $club->id) }}" class="btn btn-primary btn-sm"
                                                title="Edit Club"><i class="fa fa-edit"></i></a>
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

@endsection
