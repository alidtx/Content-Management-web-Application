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
<style>
  .select2-container .select2-selection--single {
    height: 35px;
  }
</style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          {{-- <h4 class="m-0 text-dark">Career Add</h4> --}}
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

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card card-outline card-info">
      <div class="card-header">
        <h5>
          @if(isset($editData))
          @lang('Career') @lang('Update')
          @else
          @lang('Career') @lang('Add')
          @endif
          <a class="btn btn-sm btn-info float-right" href="{{route('setup.career.view')}}"><i class="fa fa-list"></i> @lang('Career') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <form method="post" action="{{(@$editData)?route('setup.career.update',$editData->id):route('setup.career.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-12">
                <label for="title">@lang('Title') <span class="text-red">*</span></label>
                <input id="title" type="text" name="title" value="{{@$editData->title}}" class="form-control">
                @error('title')
                <span class="text-red">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-md-4">
                <label for="date">@lang('Date')</label>
                <input type="text" name="date" class="form-control singledatepicker" value="{{@$editData->date}}" placeholder="DD-MM-YYYY" autocomplete="off" readonly="">
                @error('date')
                <span class="text-red">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-md-4">
                <label for="type">@lang('Type') <span class="text-red">*</span></label>
                <select name="type" class="form-control select2">
                  <option disabled selected value="">@lang('Select')</option>
                  <option value="1" {{(@$editData->type=="1")?"selected":""}}>Notice</option>
                  <option value="2" {{(@$editData->type=="2")?"selected":""}}>Form</option>
                  <option value="3" {{(@$editData->type=="3")?"selected":""}}>Result</option>
                </select>
                @error('type')
                <span class="text-red">{{ $message }}</span>
                @enderror
              </div>
              {{-- @if(@$editData->attachment)
              <input type="hidden" name="attachment" value="{{ @$editData->attachment }}" class="form-control @error('attachment') is-invalid @enderror" id="attachment">
              @endif
              <div class="form-group col-md-4">
                <label for="attachment">@lang('Attachment') (@lang('PDF'))</label>
                <input type="file" name="attachment" class="form-control @error('attachment') is-invalid @enderror" id="attachment">
                @error('attachment')
                <span class="text-red">{{ $message }}</span>
                @enderror
              </div> --}}
              <div class="form-group col-sm-12 increment">
                {{-- <div class="control-group input-group"> --}}
                    
                    @php $attachments = \App\Models\CareerAttachment::where('career_id', !empty($editData->id)? $editData->id : '')->get(); @endphp
                    @if($attachments->count() != 0)
                        <label>Existing Files</label>
                    @endif
                    <div class="form-group">
                        @foreach($attachments as $attachment)
                            {{-- <img src="{{ asset('public/upload/office_order/'.$attachment['attachment']) }}" height="80"> --}}
                            @php 
                                if($attachment->attachment != Null)
                                {
                                    $ext = explode('.',$attachment->attachment);
                                    //dd($ext[1]);
                                }
                            @endphp
                            @if($attachment->attachment != Null) <a target="_blank" href="{{ asset('public/upload/career/'.$attachment['attachment']) }}"><img src="{{ asset('public/images/pdf_icon.png') }}" height="80"></a>@endif

                            {{-- <a href="{{ route('setup.career.remove_career_attachment',$attachment->id) }}" class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></a> --}}
                            <a class="btn btn-sm btn-danger" id="delete" title="Delete" data-id="{{@$attachment->id}}" data-token="{{csrf_token()}}" data-route="{{route('setup.career.remove_career_attachment')}}"><i class="fas fa-trash-alt"></i></a>
                        @endforeach
                    </div>
                {{-- </div> --}}
            </div>    
            <div class="form-group col-sm-12">
                    <label>Upload new Attachment (PDF)</label>
                    <input id="attachment" type="file" value="" multiple="multiple" class="form-control @error('attachment') is-invalid @enderror" name="attachment[]"> 
                    @error('attachment')
                    <span class="text-red">{{ $message }}</span>
                    @enderror
            </div>
              {{-- <div class="col-sm-3" @if(!isset($editData)) style="margin-bottom: 0px;margin-top: 35px;" @else style="margin-bottom: 0px;margin-top: 35px;" @endif>
                  <div class="form-check" style="margin-left: 0px;">
                    <input type="checkbox" name="status" class="form-check-input" id="status" value="1" {{ @$editData->status == 1 ? 'checked':'' }}>
                    <label data-toggle="tooltip" title="ON/OFF the checkbox to Active/Inactive user !" class="form-check-label" for="status">@if(session()->get('language') == 'en') Active / Inactive @else Active / Inactive @endif </label>
                  </div>
              </div> --}}
            </div>
            <div class="form-row">
              <div class="form-group col-md-3">
                <button type="submit" class="btn btn-info">{{(@$editData)?"Update":"Submit"}}</button>
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
    $(document).ready(function () {
      $('textarea').each(function(){
              $(this).val($(this).val().trim());
          }
      );

      $('#myForm').validate({
        ignore : [],
        debug : false,
        rules: {
          // date: {
          //   required: true,
          // },
          // short_title_en: {
          //   required: true,
          // },
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
