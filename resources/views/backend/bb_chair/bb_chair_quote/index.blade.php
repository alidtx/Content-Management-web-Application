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
                        <li class="breadcrumb-item">@lang('Bangabandhu Chair Quote')</li>
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
                        <h5>@lang('Bangabandhu Chair Quote') @lang('List')
                            <a class="btn btn-sm btn-primary float-right" href="{{ route('bangabandhu_chair.quote.create') }}"><i
                                    class="fa fa-plus-circle"></i> @lang('Bangabandhu Chair Quote') @lang('Add')</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <table id="dataTable" class="table table-sm table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>@lang('SL')</th>
                                    <th>@lang('Title1')</th>
                                    <th>@lang('Title2')</th>
                                    <th>@lang('Description')</th>
                                    <th style="width:10%">@lang('Action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($quotes as $quote)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $quote->title1 }}</td>
                                        <td>{{ $quote->title2 }}</td>
                                        <td>{{ $quote->description }}</td>
                                        <td>
                                            <a href="{{ route('bangabandhu_chair.quote.edit', $quote->id) }}" class="btn btn-primary btn-sm"
                                                title="Event Edit"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-danger btn-sm delete" id="delete" title="Delete"
                                                data-id="{{ $quote->id }}" data-token={{csrf_token()}} data-route="{{ route('bangabandhu_chair.quote.delete') }}"><i
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
