@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"> @lang('Gallery Category')</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Gallery Category')</li>
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
      <div class="card">
        <div class="card-header">
          <h5>@lang('Gallery') @lang('Category')
            <a class="btn btn-sm btn-success float-right" href="{{ route('setup.gallery_category.add') }}"><i class="fa fa-plus-circle"></i> @lang('Category') @lang('Add')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Gallery Category Name')</th>
                  <th>@lang('Category Parent')</th>
                  <th>@lang('Sort Order')</th>
                  <th style="width:10%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
                @foreach($allCategories as $category)
                @php
                $sub_cat = \App\Models\GalleryCategory::where('id',$category->sub_category)->first();
                @endphp
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$category->name}}</td>
                  <td>{{$category->name == 0 ? '' : @$sub_cat->name}}</td>
                  <td>{{@$category->sort}}</td>
                  <td>
                    <a class="btn btn-sm btn-success" title="Edit" href="{{route('setup.gallery_category.edit',@$category->id)}}"><i class="fa fa-edit"></i></a>
                    {{-- <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{@$category->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.program_category.delete')}}"><i class="fa fa-trash"></i></a> --}}
                    {{-- <a class="delete btn btn-sm btn-danger" data-id="{{$u['id']}}" data-table="users"><i class="fa fa-trash"></i></a> --}}
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
