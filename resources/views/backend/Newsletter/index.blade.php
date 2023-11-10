@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark"> @lang('Newsletter Management')</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Create New')</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
<!-- /.content-header -->


<div class="content">
  <div class="container-fluid">
    <div class="col-md-12">
      <div class="card card-outline card-primary">
        <div class="card-header">
          <h5>@lang('Newsletter Management')
            <a class="btn btn-sm btn-primary float-right" href="{{ route('news.newsletter.add') }}"><i class="fa fa-plus-circle"></i> @lang('Newsletter') @lang('Add')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('Sl')</th>
                  <th>@lang('Name')</th>
                  <th>@lang('Issue No')</th>
                  <th>@lang('images')</th>
                  <th>@lang('Attachments')</th>
                  <th>@lang('Publish Date')</th>
                  <th style="width:13%">@lang('Action')</th>
                </tr>
              </thead>


              <tbody>
                @foreach($allData as $data)
                <tr>
                  <th>{{ $data->id }}</th>
                  <td>{{ $data->name }}</td>
                  <td>{{ $data->issue_no }}</td>
                  <td>@if(!empty($data->image))
                      <img src="{{ asset('public/upload/newsletter/'. $data->image) }}" style="width:200px;">
                      @else
                      @endif
                  </td>
                  <td>@if(!empty($data->attachment))
                        <a href="{{ asset('public/upload/newsletter/'. $data->attachment) }}">Download PDF</a>
                      @else
                      @endif
                  </td>
                  <td>{{date('d/m/Y',strtotime($data['publish_date']))}}</td>
                  <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{route('news.newsletter.edit',$data->id)}}"><i class="fa fa-edit"></i></a>
                    @if($data->status == 1)
                    <a class="statuschange btn btn-sm btn-success" title="Inactive" data-id="{{$data->id}}" data-action="0" data-route="{{route('news.newsletter.status_change')}}" data-token="{{csrf_token()}}" href="">
                      <i class="fa fa-check" aria-hidden="true"></i>
                        Acitve
                    </a>
                    @else
                    <a class="statuschange btn btn-sm btn-danger" title="Inactive" data-id="{{$data->id}}" data-action="1" data-route="{{route('news.newsletter.status_change')}}" data-token="{{csrf_token()}}" href="">
                      <i class="fa fa-ban" aria-hidden="true"></i>
                        Inacitve
                    </a>
                    @endif
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
