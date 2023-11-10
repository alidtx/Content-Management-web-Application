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
          <h4 class="m-0 text-dark">FAQ for {{$cpc->name}}</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('cpc')</li>
            <li class="breadcrumb-item active">@lang('faq')</li>
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
          {{-- @if(isset($editData))
          @lang('Senate Committe Member') @lang('Update')
          @else
          @lang('Senate Committe Member') @lang('Add')
          @endif --}}
          <a class="btn btn-success" href="{{ URL::previous() }}">Back</a>
          {{-- <a class="btn btn-sm btn-success float-right" href="{{route('cpc.resource.perople.list')}}"><i class="fa fa-list"></i> Resource People List</a></h5> --}}
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData)?route('senate.committee.member.update',$editData->id):route('cpc.faq.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf

          <div class="card-body">
            <div class="form-row">
            <div class="form-group col-md-12">
                <label for="">Cpc Service Type</label>

                <select name="cpc_service_id" id="" class="form-control @error('cpc_service_id') is-invalid @enderror">
                    <option value="{{$cpc->id}}" readonly>{{$cpc->name}}</option>
                </select>
                @error('cpc_service_id')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group col-md-12">
                <label for="">Question <span class="text-red">*</span> </label>
                <input type="text" name="question" class="form-control @error('question') is-invalid @enderror" placeholder="Enter Question">
                @error('question')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="form-group col-md-12">
                <label for="">Answer  <span class="text-red">*</span></label>
                <textarea name="answer" id="" cols="5" rows="5" class="form-control @error('answer') is-invalid @enderror" placeholder="Answer"></textarea>
                @error('answer')
                <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
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
      var a1 = CKEDITOR.replace('answer');
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
