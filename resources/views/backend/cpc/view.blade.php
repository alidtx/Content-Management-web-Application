@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark"> @lang('List of CPC')</h4> --}}
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
                    <h5 class="m-0 text-dark float-left"> @lang('List of CPC')</h5>
                    <a href="{{route('cpc.add')}}" class="btn btn-success float-right">Add CPC Service</a>
                </div>
            </div>
        </div>
        @foreach($cpcs as $cpc)
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="bg-success p-2 text-center">{{$cpc->name}}</h5>
                    {{-- <p class="card-text">{!! $cpc->description !!}</p> --}}
                    {{-- <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Card link</a> --}}
                    <a href="{{route('cpc.section',$cpc->id)}}" class="card-link">Edit</a>
                    <a href="{{route('cpc.event.list',$cpc->id)}}" class="card-link">Events</a>
                    <a href="{{route('cpc.news.list',$cpc->id)}}" class="card-link">News</a>
                </div>
            </div>
        </div>
        @endforeach

        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <h6 class="bg-success p-2 text-center">Image Gallery</h5>
                    {{-- <p class="card-text">{!! $cpc->description !!}</p> --}}
                    {{-- <a href="#" class="card-link">Card link</a>
                    <a href="#" class="card-link">Card link</a> --}}
                    <a href="#" class="card-link">Edit</a>
                </div>
            </div>
        </div>
    </div>

  </div>
</div>

@endsection
