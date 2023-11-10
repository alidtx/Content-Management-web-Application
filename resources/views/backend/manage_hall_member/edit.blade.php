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
          {{-- <h4 class="m-0 text-dark">Hall Member Edit</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Hall')</li>
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
          @lang('Hall Member') @lang('Update')
          @else
          @lang('Hall Member') @lang('Add')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('setup.manage_hall_member',$hall_id)}}"><i class="fa fa-list"></i> @lang('Hall Member') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{route('setup.manage_hall_member.update', $hall_id)}}"   id="myForm" enctype="multipart/form-data">
          @csrf
          <input type="hidden" name="hall_id" value="{{$hall_id}}">
          <div class="card-body">

            <div class="form-row">
                <div class="form-group col-md-4">
                  <label class="control-label">Member Type</label>
                  <select id="type_id" class="form-control form-control-sm select2" name="type_id">
                    <option {{ $hallEdit->type_id == 1 ? "selected" : ""}} value="1">Hall Tutor</option>
                    <option {{ $hallEdit->type_id == 2 ? "selected" : ""}} value="2">Administrative Staffs</option>
                  </select>
                  @error('status')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>


                <div class="form-group col-md-4">
                  <label class="control-label">Member</label>
                  <select id="member_id" class="form-control form-control-sm select2" name="member_id">
                    @foreach ($profiles as $profile)
                    <option value="{{ $profile->id }}"
                        {{ $hallEdit->member_id == $profile->id ? 'selected' : '' }}> {{ $profile->nameEn }}
                    </option>
                    @endforeach
                  </select>
                  @error('status')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>


                <div class="form-group col-md-4">
                  <label class="control-label">Status</label>
                  <select id="status" class="form-control form-control-sm select2" name="status">
                    <option {{ $hallEdit->status == 1 ? "selected" : ""}} value="1">Active</option>
                    <option {{ $hallEdit->status == 0 ? "selected" : ""}} value="0">Inactive</option>
                  </select>
                  @error('status')
                      <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                      </span>
                  @enderror
                </div>

              </div>



            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
            </div>
          </div>
        </form>
      <!--Form End-->
    </div>
  </div>
</div>

<script type="text/javascript">
    $(document).ready(function(){
      var a1 = CKEDITOR.replace('long_title_en');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
      var a1 = CKEDITOR.replace('long_title_bn');
      CKFinder.setupCKEditor( a1, '/ckfinder/' );
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function () {
      $('textarea').each(function(){
              $(this).val($(this).val().trim());
          }
      );

      $('#myForm').validate({
        ignore : [],
        debug : false,
        rules: {
          date: {
            required: true,
          },
          short_title_en: {
            required: true,
          },
          short_title_bn: {
            required: true,
          },
          long_title_en: {
            required: true,
          },
          long_title_bn: {
            required: true,
          },
          status: {
            required: true,
          }
        },
        messages: {

        },
        errorElement: 'span',
        errorPlacement: function (error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function (element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function (element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>

@endsection
