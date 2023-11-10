@extends('backend.layouts.app')
<style>
    .fa-cog {
        font-size: 47px !important;
        color: #5dabad;
        padding-left: 61px;
    }
</style>
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h4 class="m-0 text-dark"> @lang('List of CPC')</h4>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">@lang('CPC')</li>
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
                            {{-- <a href="{{route('cpc.add')}}" class="btn btn-success">add</a> --}}
                            <a href="{{ route('cpc.view') }}" class="btn btn-success">Back</a>

                        </div>
                    </div>
                </div>

                @php

                @endphp
                @foreach ($cpc_section as $cpc)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <p><i class="fa fa-cog" style="font-size: 15px;" aria-hidden="true"></i></p>
                                <h5 class="bg-success p-2 text-center">
                                    <a href="{{ route('cpc.section.edit', $cpc->id) }}">{{ $cpc->title }}</a>
                                </h5>

                            </div>
                        </div>
                    </div>
                @endforeach

                @if ($id == 1)
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                              <p><i class="fa fa-cog" style="font-size: 15px;" aria-hidden="true"></i></p>
                              <h5 class="bg-success p-2 text-center">
                              <a href="{{ route('cpc.section.ourteam') }}">Our Team</a>
                              </h5>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <p><i class="fa fa-cog" style="font-size: 15px;" aria-hidden="true"></i></p>
                                <h5 class="bg-success p-2 text-center">
                                <a href="{{ route('cpc.section.people.list', ['cpc_id' => $id]) }}">Resource people</a>
                                </h5>
                            </div>
                        </div>
                    </div>
                @endif

                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                          <p><i class="fa fa-cog" style="font-size: 15px;" aria-hidden="true"></i></p>
                            <h5 class="bg-success p-2 text-center">
                            <a href="{{ route('cpc.section.faq.list', ['cpc_id' => $id]) }}">FAQ</a>
                            </h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card">
                        <div class="card-body">
                            <p><i class="fa fa-cog" style="font-size: 15px;" aria-hidden="true"></i></p>
                            <h5 class="bg-success p-2 text-center">
                            <a href="{{ route('cpc.contact.list', ['cpc_id' => $id]) }}" class="card-link">Contact Us</a>
                            </h5>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
