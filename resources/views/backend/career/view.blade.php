@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark"> @lang('List of Career')</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Career')</li>
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
          <h5>@lang('Career') @lang('List')
            <a class="btn btn-sm btn-primary float-right" href="{{ route('setup.career.add') }}"><i class="fa fa-plus-circle"></i> @lang('Career') @lang('Add')</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>@lang('SL')</th>
                  <th>@lang('Title')</th>
                  <th>@lang('Date')</th>
                  <th>@lang('Type')</th>
                  <th>@lang('Attachments')</th>
                  <th style="width:10%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
                @foreach($careers as $career)
                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{@$career->title}}</td>
                  <td>{{@$career->date}}</td>
                  <td>{{@$career->type == 1 ? 'Notice' : (@$career->type == 2 ? 'Form' : 'Result')}}</td>
                  <td style="text-align: center;">
                    @php $attachments = \App\Models\CareerAttachment::where('career_id',$career->id)->get(); @endphp
                    @foreach($attachments as $attachment)
                    {{-- <img src="{{ asset('public/frontend/images/pdf_icon.png') }}" height="40"> --}}
                    @php 
                      if($attachment->attachment != Null)
                      {
                          $ext = explode('.',$attachment->attachment);
                          //dd($ext[1]);
                      }
                    @endphp
                    @if($attachment->attachment != Null) <a target="_blank" href="{{ asset('public/upload/career/'.$attachment->attachment) }}"><img src="{{ asset('public/images/pdf_icon.png') }}" height="40"></a>@endif
                    {{-- <img src="{{ asset('public/frontend/images/doc_icon.png') }}" height="40"> --}}
                    @endforeach
                </td>
                  <td>
                    <a class="btn btn-sm btn-primary" title="Edit" href="{{route('setup.career.edit',@$career->id)}}"><i class="fa fa-edit"></i></a>
                    {{-- <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{@$career->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.career.delete')}}"><i class="fa fa-trash"></i></a> --}}
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
