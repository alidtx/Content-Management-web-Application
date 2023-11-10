@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Researcher Details</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item"><a href="{{route('chsr.researcher.list')}}">List</a></li>
                        <li class="breadcrumb-item active">View</li>
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
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="bg-success p-2 text-center">
                                            {{ $single_data->profile->nameEn }}</h5>
                                            <ul class="list-group">
                                                <li class="list-group-item"><b>Program Name:
                                                    </b>{{ isset($single_data->program_category->program_category) ? $single_data->program_category->program_category : '' }}
                                                </li>
                                                <li class="list-group-item"><b>Program Name:
                                                    </b>{{ isset($single_data->faculty->name) ? $single_data->faculty->name : '' }}
                                                </li>
                                                <li class="list-group-item"><b>Program Name:
                                                    </b>{{ isset($single_data->department->name) ? $single_data->department->name : '' }}
                                                </li>

                                            </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
