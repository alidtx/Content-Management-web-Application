@extends('backend.layouts.app')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">CHSR Office</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                        <li class="breadcrumb-item "><a href="{{route('chsr.about.office')}}">CHSR Office</a></li>
                        <li class="breadcrumb-item active">{{$name}}</li>
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
                        <h5>{{ $name }}'s List

                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($dean_infos as $dean)
                                <div class="col-md-6">
                                    <div class="card">
                                        <div class="card-body">
                                            <h6 class="bg-success p-2 text-center">{{ isset($dean->profile->nameEn) ? $dean->profile->nameEn : ''  }}</h5>
                                                <ul class="list-group">
                                                    <li class="list-group-item"><b>Rank: </b>{{ isset($dean->profile->rank) ? $dean->profile->rank : ''  }}
                                                    </li>
                                                    <li class="list-group-item"><b>Designation: </b>{{ $name=='Dean' ? 'Dean' : $dean->designations->name }}</li>
                                                    <li class="list-group-item"><b>Room No: </b>{{ isset($dean->room_no) ? $dean->room_no : ''  }}</li>
                                                    <li class="list-group-item"><b>Email: </b>{{ isset($dean->email) ? $dean->email : '' }}</li>
                                                </ul>
                                        </div>
                                        <a href="{{route('chsr.about.edit',$dean->id)}}" class="btn btn-outline-info">Edit</a>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
