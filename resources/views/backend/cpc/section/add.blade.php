@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark">CPC Section </h4>
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
    $(function () {
      $.notify("{{$error}}", {globalPosition: 'top right', className: 'error'});
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
                    <a href="{{route('cpc.view')}}" class="btn btn-success">Back</a>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card">
                <form method="post" action="{{!empty($editData->id) ? route('user.designation.update',$editData->id) : route('cpc.section.store')}}" id="myForm">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="row justify-content-center">
                          <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Title <span class="text-red">*</span></label>
                                    <input type="text" name="title" id="name" class="form-control form-control-sm" value="{{@$editData->name}}">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Description</label>
                                    <textarea name="description" class="textarea" id="" cols="30" rows="10"> {{ @$editData->description}} </textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm" style="">
                                @if(isset($editData))
                                @lang('Update')
                                @else
                                @lang('Save')
                                @endif
                            </button>
                          </div>
                      </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

  </div>
</div>

@endsection
