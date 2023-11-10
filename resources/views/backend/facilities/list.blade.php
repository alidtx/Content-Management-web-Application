@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark">On Campus Facilities</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
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
                    {{-- <a href="{{route('cpc.add')}}" class="btn btn-success">add</a>
                    <a href="{{route('cpc.view')}}" class="btn btn-success">Back</a> --}}
                    <h4 class="m-0 text-dark">On Campus Facilities</h4>
                </div>
            </div>
        </div>

        @php

        @endphp
        @foreach($facilities as $facility)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">

                    {{-- <p class="card-text">itle and make up the bulk of the card's content.</p> --}}
                    <img id="show_image" class="img-fluid"
                    src="{{ !empty(@$facility->image) ? url('public/upload/on_campus/' . @$facility->image) : url('public/upload/no-image.png') }}" style="height: 200px">
                    {{-- <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Card link</a> --}}
                    <h5 class="bg-success p-2 text-center">
                      <a href="{{route('on.campus.facility',$facility->id)}}">{{$facility->title}}</a>
                    </h5>

                </div>
            </div>
        </div>
        @endforeach
    </div>

  </div>
</div>

@endsection
