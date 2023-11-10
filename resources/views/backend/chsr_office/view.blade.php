@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark">CHSR Office</h1> --}}
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active">CHSR Office</li>
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
                <div class="card card-outline card-success">
                    <div class="card-header">
                        <h5>Office List
                            <a href="{{route('chsr.about.create')}}" class="btn btn-success float-right">Add Member to Office</a>
                        </h5>

                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="bg-success p-2 text-center">
                                            <a href="{{ route('chsr.dean.list') }}" class="card-link">Dean's Info</a>
                                            </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="bg-success p-2 text-center">
                                            <a href="{{ route('chsr.director.list') }}" class="card-link">Director's
                                                Info</a>
                                            </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="bg-success p-2 text-center">
                                            <a href="{{ route('chsr.deputy.director.list') }}" class="card-link">Deputy
                                                Director's Info</a>
                                            </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="bg-success p-2 text-center">
                                            <a href="{{ route('chsr.assistant.director.list') }}"
                                                class="card-link">Assistant Director's Info</a>
                                            </h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="card">
                                    <div class="card-body">
                                        <h6 class="bg-success p-2 text-center">
                                            <a href="{{ route('chsr.officer.list') }}" class="card-link">Officers's Info</a>
                                            </h5>
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
