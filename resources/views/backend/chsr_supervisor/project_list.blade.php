@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark">Project/Thesis Lists</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Project List')</li>
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


                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="home-tab" data-toggle="tab" data-target="#home" type="button"
                            role="tab" aria-controls="home" aria-selected="true">On Going</button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link" id="profile-tab" data-toggle="tab" data-target="#profile" type="button"
                            role="tab" aria-controls="profile" aria-selected="false">Completed</button>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h5 class="text-center">Ongoing List
                                    {{-- <a class="btn btn-sm btn-info float-right" href="{{ route('chsr.researcher.create') }}"
                                        style="margin-right: 2px;"><i class="fa fa-plus-circle"></i> Add New</a> --}}
                                </h5>
                            </div>
                            <div class="card-body">
                                <table id="dataTable" class="table table-sm table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>@lang('SL')</th>
                                            <th>@lang('Title')</th>
                                            <th>@lang('Area of Research')</th>
                                            <th>@lang('Source of Fund')</th>
                                            {{-- <th>@lang('Action')</th> --}}

                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($ongoingResearches as $item)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ @$item->title }}</td>
                                                <td>{{ $item->area_research }}</td>
                                                <td>{{ $item->source_fund }}</td>
                                                {{-- <td>
                                                    <a class="btn btn-sm btn-success" title="Edit"
                                                        href="{{ route('setup.ongoing_research.edit', $item->id) }}"><i
                                                            class="fa fa-edit"></i></a>
                                                    <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$dept->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.manage_department.delete')}}"><i class="fa fa-trash"></i></a>
                                                </td> --}}
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h5 class="text-center">Completed List
                                    {{-- <a class="btn btn-sm btn-info float-right" href="{{ route('chsr.researcher.create') }}"
                                        style="margin-right: 2px;"><i class="fa fa-plus-circle"></i> Add New</a> --}}
                                </h5>
                            </div>
                            <div class="card-body">
                                <table id="dataTable" class="table table-sm table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Supervisor</th>
                                            <th>Author</th>
                                            <th>Year</th>
                                            <th>Image</th>
                                            <th>File</th>
                                            {{-- <th width="10%">Action</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($completedResearches as $completedResearch)
                                            <tr>
                                                <td> {{ $loop->iteration }}</td>
                                                <td>{{ @$completedResearch['title'] }}</td>
                                                <td>{{ @$completedResearch->profile->nameEn }}</td>
                                                <td>{{ @$completedResearch['author'] }}</td>

                                                <td>{{ @$completedResearch['year'] }}</td>

                                                <td>
                                                    <img src="{{ asset('public/upload/journal/' . $completedResearch['image']) }}"
                                                        width="80" height="80"
                                                        onerror="this.onerror=null;this.src='{{ asset('public/frontend/cuimages/dummy.png') }}';">
                                                </td>
                                                <td>
                                                    <a class="btn btn-sm btn-primary"
                                                        href="{{ asset('public/upload/journal/' . @$completedResearch->pdf) }}"
                                                        download="">Download</a>
                                                </td>
                                                <td>
                                                    {{-- <a href="{{ route('frontend-menu.completed_research.edit', @$completedResearch->id) }}"
                                                        class="btn btn-primary btn-flat btn-sm edit" data-type="image"
                                                        data-id="" data-table="Slider"><i class="fas fa-edit"></i></a> --}}
                                                    {{-- <a  class="delete btn btn-danger btn-flat btn-sm" data-route = "{{ route('frontend-menu.completed_research.delete') }}" data-id="{{ @$completedResearch->id }}" ><i class="fas fa-trash"></i></a> --}}
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
    </div>

@endsection
