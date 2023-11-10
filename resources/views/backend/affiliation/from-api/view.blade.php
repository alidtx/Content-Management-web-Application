@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h4 class="m-0 text-dark"> @lang('List of Affiliation')</h4> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('Affiliation')</li>
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
                        <h5>@lang('Affiliation') @lang('List')
                            @if (!empty($clientdatas))
                                <a class="btn btn-sm btn-primary float-right" href="{{ route('affiliation.api.store') }}"><i
                                        class="fa fa-plus-circle"></i> @lang('Insert To DB')</a>
                            @else
                                <a class="btn btn-sm btn-primary float-right" href="{{ route('setup.affiliation') }}"><i
                                        class="fa fa-plus-circle"></i> @lang('View All Affiliation')</a>
                            @endif
                        </h5>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('Name')</th>
                                    <th>@lang('Description')</th>
                                    <th>@lang('institutionType')</th>
                                    <th>@lang('location')</th>
                                    {{-- <th>@lang('Url')</th>
                  <th>@lang('Logo')</th> --}}
                                    {{-- <th style="width:10%">@lang('Action')</th> --}}
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($clientdatas as $datum)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ @$datum['inst_name'] }}</td>
                                        <td>{{ @$datum['inst_description'] }}</td>
                                        <td>{{ @$datum['institutionType'] }}</td>
                                        <td>{{ @$datum['location'] }}</td>
                                        {{-- <td><a target="_blank" href="{{@$affiliation->url}}">{{@$affiliation->url}}</a></td>
                  <td><img src="{{asset('public/upload/affiliation/'.@$affiliation->logo) }}" height="60"></td> --}}

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
