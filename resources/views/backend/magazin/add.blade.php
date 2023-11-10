@extends('backend.layouts.app')
@section('content')
<style type="text/css">
  .i-style{
        display: inline-block;
        padding: 10px;
        width: 2em;
        text-align: center;
        font-size: 2em;
        vertical-align: middle;
        color: #444;
  }
  .demo-icon{cursor: pointer; }
</style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            {{-- <h4 class="m-0 text-dark">Magazine Add</h4>  --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Create')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card card-outline card-info">
      <div class="card-header">
        <h5>
          @if(isset($editData))
          @lang('Magazine') @lang('Update')
          @else
          @lang('New Magazine') @lang('Add')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('news.magazine.list')}}"><i class="fa fa-list"></i> @lang('Magazine') @lang('Lists')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData) ? route('news.magazine.update',$editData->id) : route('news.magazine.store')}}" id="" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="clubName">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" value="{{ @$editData->name}}" >
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group col-sm-6" style="margin-bottom: 0;">
                    <label>Publish Date</label>
                    <input id="publish_date" type="text"
                        value="{{ !empty($editData->publish_date) ? date('d-m-Y', strtotime($editData->publish_date)) : old('publish_date') }}"
                        class="form-control singledatepicker @error('publish_date') is-invalid @enderror"
                        name="publish_date" placeholder="Date"> @error('publish_date')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label>Thumbnail image
                        <small style="color: brown"> (jpeg, jpg, gif, png, svg format only)</small>
                    </label>
                      @if(!empty($editData->image))
                        <img src="{{ asset('public/upload/magazine/'. $editData->image) }}" style="width:200px;">
                      @else
                      @endif
                    <input id="attachment" type="file" value=""
                        class="form-control @error('image') is-invalid @enderror" name="image">
                    @error('attachment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-sm-6">
                    <label>File*
                        <small style="color: brown"> (*pdf only)</small>
                    </label>
                      @if(!empty($editData->attachment))
                        <a href="{{ asset('public/upload/magazine/'. $editData->attachment) }}">Download PDF</a>
                      @else
                      @endif
                    <input id="attachment" type="file" value=""
                        class="form-control @error('attachment') is-invalid @enderror" name="attachment">
                    @error('attachment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>



            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-info">{{(@$editData)?"Update":"Submit"}}</button>
              </div>
            </div>
            </div>
          </div>
      </form>
      <!--Form End-->
    </div>
  </div>
</div>


@endsection
