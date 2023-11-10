@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark"> @lang('List of Photo Gallery')</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Photo Gallery')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
<!-- /.content-header -->
@if ($errors->any())
  @foreach ($errors->all() as $error)
  <script type="text/javascript">
    $(function () {
      $.notify("{{$error}}", {globalPosition: 'top right', className: 'error'});
    });
  </script>
  @endforeach
  @endif
<div class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h5>@lang('Photo Gallery') @lang('List')
            <a class="btn btn-sm btn-primary float-right" href="{{ route('setup.photo.add') }}"><i class="fa fa-plus-circle"></i> @lang('Photo Gallery') @lang('Add')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Title')</th>
                  <th>@lang('Gallery Category')</th>
                  <th>@lang('Image')</th>
                  {{-- <th>@lang('Faculty')</th>
                  <th>@lang('Department')</th> --}}
                  <th style="width:10%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
                @foreach($galleries as $gallery)
                @php
                $gallery_category = \App\Models\GalleryCategory::where('id',$gallery->gallery_category_id)->first();
                @endphp
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$gallery->title}}</td>
                  <td>{{@$gallery_category->name}}</td>
                  <td>
                    <img src="{{ asset('public/upload/gallery_images/'. $gallery->image) }}" width="80" height="80"> 
                  </td>
                  <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{route('setup.photo.edit',@$gallery->id)}}"><i class="fa fa-edit"></i></a>
                    <a class="btn btn-sm btn-danger" id="delete" href="#" title="Delete" data-id="{{@$gallery->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.photo.delete')}}"><i class="fa fa-trash"></i></a>
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
