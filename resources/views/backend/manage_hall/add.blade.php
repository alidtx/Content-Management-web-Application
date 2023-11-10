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
          {{-- <h4 class="m-0 text-dark">Hall Add</h4> --}}
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
          @lang('Hall') @lang('Update')
          @else
          @lang('Hall') @lang('Add')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('setup.manage_hall')}}"><i class="fa fa-list"></i> @lang('Hall') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{route('setup.manage_hall.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-4">

                <label for="hall_name">@lang('Hall Name') {{-- <span class="text-red">*</span> --}}</label>
                <input type="text" name="hall_name" placeholder="Hall Name" class="form-control" required>

                 @error('hall_name')

                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }} </strong>
                  </span>
                 @enderror

              </div>

              <div class="form-group col-md-4">
                <label for="Image">@lang('Image') {{-- <span class="text-red">*</span> --}}</label>
                <input type="file" name="image" placeholder="Image" class="form-control" required>
                 @error('image')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="email">@lang('email') {{-- <span class="text-red">*</span> --}}</label>
                <input type="email" name="email" placeholder="email" class="form-control" required>
                 @error('email')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="location">@lang('Location') {{-- <span class="text-red">*</span> --}}</label>
                <input type="text" name="location" placeholder="location" class="form-control" required>
                 @error('location')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="contact number">@lang('Contact Number') {{-- <span class="text-red">*</span> --}}</label>
                <input type="number" name="contact_number" placeholder="contact number" class="form-control" required>
                 @error('contact_number')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>

              <div class="form-group col-md-4">
                <label for="sort_order">@lang('Sort Order') {{-- <span class="text-red">*</span> --}}</label>
                <input type="number" name="sort_order" placeholder="Sort Order" class="form-control" required>
                 @error('sort_order')
                 <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                  </span>
                 @enderror
              </div>

              <div class="form-group col-md-4">
                <label class="control-label">Slider</label>
                <select id="slider_id" class="form-control form-control-sm select2" name="slider_id" required>
                    <option disabled selected value="">Select</option>
                    @foreach ($sliderMaster as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                    @endforeach
                </select>

              </div>

              <div class="form-group col-md-4">
                <label class="control-label">Provost</label>
                <select id="provost" class="form-control form-control-sm select2" name="provost" required>
                    <option disabled selected value="">Select</option>
                    @foreach ($provost as $item)
                    <option value="{{$item->id}}">{{$item->nameBn}}</option>
                    @endforeach
                </select>

              </div>


              <div class="form-group col-md-4">
                <label class="control-label">Status</label>
                <select id="status" class="form-control form-control-sm select2" name="status" required>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>

              </div>


              <div class="form-group col-md-4">
                <label for="url">@lang('URL') {{-- <span class="text-red">*</span> --}}</label>
                <input type="text" name="short_url" placeholder="Insert Url" class="form-control" required>
                 @error('short_url')
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
