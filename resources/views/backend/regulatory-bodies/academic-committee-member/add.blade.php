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
          <h4 class="m-0 text-dark">Add New Member</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">Academic Council Member</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header">
        <h5>
          @if(isset($editData))
          @lang('Academic Council Member') @lang('Update')
          @else
          @lang('Academic Council Member') @lang('Add')
          @endif
          <a class="btn btn-sm btn-success float-right" href="{{route('academic.committee.member')}}"><i class="fa fa-list"></i> @lang('academic Committee Member') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData)?route('academic.committee.member.update',$editData->id):route('academic.committee.member.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf

          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="faculty_name">Name</label>

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

              <div class="form-group col-md-6">
                <label for="faculty_name">Sort</label>
                <input type="text" class="form-control @error('sort') is-invalid @enderror" name="sort" value="{{@$editData->sort}}">
                @error('sort')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span> 
                @enderror
              </div>

              <div class="form-group col-md-6">
                <input type="hidden" name="committe_type_id" value="3">
              </div>

            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
              </div>
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
    $(document).ready(function(){
       $('#selectNameAndBup').on('change',function(){
          //  alert(this.value);
       });
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
