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
<style type="text/css">
    img {
      display: block;
      max-width: 100%;
    }
    .preview {
      overflow: hidden;
      width: 160px; 
      height: 160px;
      margin: 10px;
      border: 1px solid red;
    }
    .modal-lg{
      max-width: 1000px !important;
    }
    </style>
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h4 class="m-0 text-dark">Photo Gallery Add</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Photo Gallery')</li>
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
          @lang('Photo Gallery') @lang('Update')
          @else
          @lang('Photo Gallery') @lang('Add')
          @endif
          <a class="btn btn-sm btn-success float-right" href="{{route('setup.photo')}}"><i class="fa fa-list"></i> @lang('Photo Gallery') @lang('List')</a></h5>
      </div>

      <form method="post" action="{{(@$editData)?route('setup.photo.update',$editData->id):route('setup.photo.store')}}" id="myForm" enctype="multipart/form-data">
          @csrf
          <div class="card-body">
            <div class="form-row">
              {{-- <div class="form-group col-md-6">
                <label for="faculty">@lang('Faculty') <span class="text-red">*</span></label>
                <select name="faculty_id" class="form-control select2">
                  <option value="">@lang('Select')</option>
                  <option value="1" {{(@$editData->faculty=="0")?"selected":""}}>Faculty 1</option>
                  <option value="2" {{(@$editData->faculty=="1")?"selected":""}}>Faculty 2</option>
                </select>
              </div>
              <div class="form-group col-md-6">
                <label for="department">@lang('Department') <span class="text-red">*</span></label>
                <select name="department_id" class="form-control select2">
                  <option value="">@lang('Select')</option>
                  <option value="1" {{(@$editData->department=="0")?"selected":""}}>Department 1</option>
                  <option value="2" {{(@$editData->department=="1")?"selected":""}}>Department 2</option>
                </select>
              </div> --}}
              <div class="form-group col-md-6">
                <label for="gallery_category_id">@lang('Gallery Category') <span class="text-red">*</span></label>
                <select name="gallery_category_id" class="form-control select2  @error('gallery_category_id') is-invalid @enderror">
                  <option disabled selected value="">@lang('Select')</option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}" {{(@$editData->gallery_category_id==$category->id)?"selected":""}}>{{ @$category->name }}</option>
                  @endforeach
                </select>
                @error('gallery_category_id')
                    <span class="text-red">{{ $message }}</span>
                @enderror
              </div>
              <div class="form-group col-md-12">
                <label for="title">@lang('Title')</label>
                <input id="title" type="text" name="title" class="form-control" value="{{@$editData->title}}" placeholder="">
              </div>
              @if(@$editData->photo_path)
              <input type="hidden" name="image" value="{{ @$editData->photo_path }}" class="form-control @error('image') is-invalid @enderror" id="image">
              @endif
              <div class="form-group col-md-12">
                <label for="image">@lang('Image')</label>
                <input type="file" name="image" class="image form-control @error('image') is-invalid @enderror" id="file-input">
                @error('image')
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


<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalLabel">Crop Image Before Upload</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="img-container">
              <div class="row">
                  <div class="col-md-8">
                      <img id="image" src="https://avatars0.githubusercontent.com/u/3456749">
                  </div>
                  <div class="col-md-4">
                      <div class="preview"></div>
                  </div>
              </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <button type="button" class="btn btn-primary" id="crop">Crop</button>
        </div>
      </div>
    </div>
  </div>
  <script>
  var $modal = $('#modal');
  var image = document.getElementById('image');
  var cropper;
    
  $("body").on("change", ".image", function(e){
      var files = e.target.files;
      var done = function (url) {
        image.src = url;
        $modal.modal('show');
      };
      var reader;
      var file;
      var url;
      if (files && files.length > 0) {
        file = files[0];
        if (URL) {
          done(URL.createObjectURL(file));
        } else if (FileReader) {
          reader = new FileReader();
          reader.onload = function (e) {
            done(reader.result);
          };
          reader.readAsDataURL(file);
        }
      }
  });
  $modal.on('shown.bs.modal', function () {
      cropper = new Cropper(image, {
        aspectRatio: 1,
        viewMode: 3,
        preview: '.preview'
      });
  }).on('hidden.bs.modal', function () {
     cropper.destroy();
     cropper = null;
  });
  $("#crop").click(function(){
      canvas = cropper.getCroppedCanvas({
          width: 160,
          height: 160,
        });
      canvas.toBlob(function(blob) {
          url = URL.createObjectURL(blob);
          var reader = new FileReader();
           reader.readAsDataURL(blob); 
           reader.onloadend = function() {
              var base64data = reader.result; 
              $.ajax({
                  type: "POST",
                  dataType: "json",
                  url: "{{route('crop_image_upload')}}",
                  data: {'_token': $('meta[name="csrf-token"]').attr('content'), 'image': base64data},
                  success: function(data){
                      console.log(data);
                      $modal.modal('hide');
                      alert("Image Cropped Successfully");
                  }
                });
           }
      });
  })
  </script>


@endsection




