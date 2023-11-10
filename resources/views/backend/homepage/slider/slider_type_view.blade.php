@extends('backend.layouts.app')
@section('content')
<div class="col-xl-12">
  <div class="breadcrumb-holder">
    <h2 class="main-title float-left" style="margin-top: 10px">@lang('Slider') @lang('Manage')</h2>
    <ol class="breadcrumb float-right">
      <li class="breadcrumb-item"><a href="{{route('dashboard')}}"><strong>@lang('Home')</strong></a></li>
      <li class="breadcrumb-item active">@lang('Slider')</li>
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
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5>@lang('Slider') @lang('List')
          <a class="btn btn-sm btn-success float-right" href="{{route('homepages.slider.type')}}"><i class="fa fa-plus-circle"></i>Slider Type Add</a>
        </h5>
      </div>
        <div class="card-body">
          <table id="" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>SL</th>
                <th>Slider Type</th>
                <th style="width:15%">@lang('Action')</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $data)
              <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{ $data->name }}</td>
                  <td>
                    <a class="btn btn-sm btn-success" title="Add Slider" href="{{route('homepages.slider.add',$data->id)}}"><i class="fa fa-plus-circle"></i></a>
                    <a class="btn btn-sm btn-success" title="Edit" href="{{route('homepages.slider.type.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$data->id}}" data-token="{{csrf_token()}}" href="{{route('homepages.slider.delete')}}"><i class="fa fa-trash"></i></a>
                    <a class="btn btn-sm btn-success" title="view" href="{{route('homepages.slider.typeView',$data->id)}}"><i class="fa fa-eye" aria-hidden="true"></i>
                    </a>
                  </td>
               </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
@endsection
