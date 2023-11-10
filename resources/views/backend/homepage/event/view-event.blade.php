@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left" style="margin-top: 10px">Event Manage</h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
      <li class="breadcrumb-item active">@lang('Notice and Events')</li>
    </ol>
    <div class="clearfix"></div>
  </div>
</div>
@if ($errors->any())
  @foreach ($errors->all() as $error)
  <script type="text/javascript">
    $(function () {
      $.notify("{{$error}}", {globalPosition: 'top right', className: 'error'});
    });
  </script>
  @endforeach
  @endif
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Event List
                    <a class="btn btn-sm btn-success float-right" href="{{route('homepages.event.add')}}"><i class="fa fa-plus-circle"></i> Add Event</a>
                </h5>
           </div>
        <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped table-responsive">
                <thead>
                    <th>
                        <td>Sl</td>
                        <td>Title</td>
                        <td>Description</td>
                        <td>Status</td>
                        <td>Image</td>
                        <td>Action</td>
                    </th>
                </thead>
            </table>
        </div>
        </div>
      </div>
  </div>
</div>
@endsection
