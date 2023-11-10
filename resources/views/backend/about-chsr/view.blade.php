@extends('backend.layouts.app')
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h4 class="m-0 text-dark">CHSR</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
                    <li class="breadcrumb-item active">@lang('CHSR')</li>
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
                        <a href="#" class="btn btn-success">Back</a>
                    </div>
                </div>
            </div>

            @foreach ($chsrs as $chsr)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="bg-success p-2 text-center">
                            <a href="{{ route('chsr.edit', $chsr->id) }}" class="card-link">{{ $chsr->title }}</a>
                        </h5>
                    </div>
                </div>
            </div>
            @endforeach

            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        <h5 class="bg-success p-2 text-center">
                            <a href="#" class="card-link">Contact</a>
                        </h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection