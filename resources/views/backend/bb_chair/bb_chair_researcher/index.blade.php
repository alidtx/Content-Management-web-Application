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
                        <li class="breadcrumb-item">@lang('Bangabandhu Chair Researcher')</li>
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
                        <h5>@lang('Bangabandhu Chair Researcher') @lang('List')
                            <a class="btn btn-sm btn-primary float-right" href="{{ route('bangabandhu_chair.researcher.create') }}"><i
                                    class="fa fa-plus-circle"></i> @lang('Bangabandhu Chair Researcher') @lang('Add')</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('Personnel Name')</th>
                                    <th>@lang('Status')</th>
                                    <th style="width:10%">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($researchers as $researcher)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $researcher->profile->nameEn }}</td>
                                        <td>{{ $researcher->status == 1 ? 'Active' : 'Inactive' }}</td>
                                        <td>
                                            <a href="{{ route('bangabandhu_chair.researcher.edit', $researcher->id) }}" class="btn btn-primary btn-sm"
                                                title="Event Edit"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger btn-sm delete" id="delete" title="Delete"
                                                data-id="{{ $researcher->id }}" data-token={{csrf_token()}} data-route="{{ route('bangabandhu_chair.researcher.delete') }}"><i
                                                    class="fa fa-trash"></i></a>
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
