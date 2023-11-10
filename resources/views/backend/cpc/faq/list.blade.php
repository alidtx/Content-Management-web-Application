@extends('backend.layouts.app')
@section('content')
    <style type="text/css">
        .i-style {
            display: inline-block;
            padding: 10px;
            width: 2em;
            text-align: center;
            font-size: 2em;
            vertical-align: middle;
            color: #444;
        }

        .demo-icon {
            cursor: pointer;
        }
    </style>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark">FAQ List For {{ $cpc->name }}</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('cpc')</li>
                        <li class="breadcrumb-item active">@lang('faq')</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    {{-- <a href="{{ route('cpc.section.faq', $cpc->id) }}" class="btn btn-success">Add New</a> --}}
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th width="10%">SL</th>
                            <th>Question</th>
                            <th>Answer</th>
                            {{-- <th width="20%">Action</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($faqs as $faq)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $faq->question }}</td>
                                <td>{!! $faq->answer !!}</td>
                                {{-- <td>
                    <a href="" class="btn btn-primary">Edit</a>
                    <a href="" class="btn btn-primary">Delete</a>
                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
