@extends('backend.layouts.app')
@section('content')
 <!-- Content Header (Page header) -->
 <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark"><b>{{$cpc->name}}</b> Contact Person</h4>
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
                <form method="post" action="{{!empty($editData->id) ? route('user.designation.update',$editData->id) : route('cpc.contact.store')}}" id="myForm">
                    {{csrf_field()}}
                    <div class="card-body">
                      <div class="row justify-content-center">
                          <div class="col-md-12">
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="">Cpc Service Type</label>

                                    <select name="cpc_id" id="" class="form-control @error('cpc_id') is-invalid @enderror">
                                        <option value="{{$cpc->id}}" readonly>{{$cpc->name}}</option>
                                    </select>
                                    @error('cpc_id')
                                    <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="faculty_name">Conatct Person</label>
                                    <select class="form-control selectpicker @error('profile_id') is-invalid @enderror" name="profile_id" id="selectNameAndBup" data-live-search="true">
                                      <option value="">Select</option>
                                      @foreach ($profiles as $profile)
                                        <option value="{{$profile->id}}" {{ $profile->id == @$editData->profile_id ? 'selected' : '' }}>{{$profile->nameEn}} - {{$profile->bup_no}} <span>
                                        </span></option>
                                      @endforeach
                                    </select>
                                    @error('profile_id')
                                    <span class="invalid-feedback" role="alert">
                                         <strong>{{ $message }}</strong>
                                     </span>
                                    @enderror
                                  </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Description</label>
                                    <textarea name="description" class="textarea" id="" cols="30" rows="10"> {{ @$editData->description}} </textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label class="control-label">Contact Form</label>
                                    <input type="checkbox" name="is_form">
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
