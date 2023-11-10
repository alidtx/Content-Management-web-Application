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
          <a class="btn btn-sm btn-success float-right" href="{{route('homepages.slider.add')}}"><i class="fa fa-plus-circle"></i> @lang('Slider') @lang('Add')</a>
        </h5>
      </div>
        <div class="card-body">
          <table id="" class="table table-sm table-bordered table-striped">
            <thead>
              <tr>
                <th>SL</th>
                <th>Title</th>
                <th>Slider Image</th>
                <th style="width:10%">@lang('Action')</th>
              </tr>
            </thead>
            <tbody>
              @foreach($allData as $data)
              <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{ $data->title }}</td>
                <td>
                  <img id="show_image" src="{{(!empty(@$data->image))?url('public/upload/slider_images/'.@$data->image):url('public/upload/no_image.png')}}" style="height: 100px;border:1px solid #000;"></td>
                <td>
                  <a class="btn btn-sm btn-success" title="Edit" href="{{route('homepages.slider.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                  <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{$data->id}}" data-token="{{csrf_token()}}" href="{{route('homepages.slider.delete')}}"><i class="fa fa-trash"></i></a>
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
