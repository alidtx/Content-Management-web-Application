@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">List of Syndicate Committee Member</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Department')</li>
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
          <h5>Committee Member
            <a class="btn btn-sm btn-success float-right" href="{{ route('syndicate.committee.member.add') }}"><i class="fa fa-plus-circle"></i> Syndicate Committee Member Add</a>
          </h5>
        </div>
          <div class="card-body">
            <table id="dataTable" class="table table-sm table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sl</th>
                  <th>Name</th>
                  <th>Designation</th>
                  <th>Order</th>
                  <th>Image</th>
                  <th style="width:10%">@lang('Action')</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($comitteData as $comitte)

                <tr>
                  <td>{{$loop->iteration}}</td>
                  <td>{{ isset($comitte->getProfile[0]['nameEn']) ? $comitte->getProfile[0]['nameEn'] : ''}}</td>
                  <td>{{ isset($comitte->getProfile[0]['designation']) ? $comitte->getProfile[0]['designation'] : ''}}</td>
                  <td>{{$comitte->sort}}</td>
                  <td>
                    <img src="#" alt="userImage">
                    {{-- <img src="{{ isset($comitte->getProfile[0]['photo_path']) ? $comitte->getProfile[0]['photo_path'] : ''}}" alt="userImage"> --}}
                  </td>
                  <td>
                    <a href="{{route('syndicate.committee.member.edit',['id'=>$comitte->id])}}" class="btn btn-sm btn-success"><i class="fa fa-edit"></i></a>
                    {{-- <a href="" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> --}}
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
