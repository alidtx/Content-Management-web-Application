{{-- @extends('backend.layouts.app')
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
              <div class="form-group col-md-6">
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
              </div>
              @if(@$editData->photo_path)
              <input type="hidden" name="image" value="{{ @$editData->photo_path }}" class="form-control @error('image') is-invalid @enderror" id="image">
              @endif
              <div class="form-group col-md-9">
                <label for="image">@lang('Image')</label>
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image">
                @error('image')
                <span class="text-red">{{ $message }}</span>
                @enderror
              </div>
              <div class="col-sm-3" @if(!isset($editData)) style="margin-bottom: 0px;margin-top: 35px;" @else style="margin-bottom: 0px;margin-top: 35px;" @endif>
                  <div class="form-check" style="margin-left: 0px;">
                    <input type="checkbox" name="status" class="form-check-input" id="status" value="1" {{ @$editData->status == 1 ? 'checked':'' }}>
                    <label data-toggle="tooltip" title="ON/OFF the checkbox to Active/Inactive user !" class="form-check-label" for="status">@if(session()->get('language') == 'en') Active / Inactive @else Active / Inactive @endif </label>
                  </div>
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

<script defer src="https://cdn.crop.guide/loader/l.js?c=123ABC"></script>

@endsection --}}




{{-- <!DOCTYPE html>
<html>
<head>
    <title>Laravel 9 Crop Image Before Upload using Cropper js - laratutorials.com</title>
    <meta name="_token" content="{{ csrf_token() }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
</head>
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
<body>
  
<div class="container mt-5">
  <div class="card">
    <h2 class="card-header">Laravel 9 Crop Image Before Upload - Wesley</h2>
    <div class="card-body">
      <h5 class="card-title">Please Selete Image For Cropping</h5>
      <input type="file" name="image" class="image">
    </div>
  </div>  
</div>
<div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="modalLabel">Laravel Cropper Js - Crop Image Before Upload - Tutsmake.com</h5>
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
                url: "crop-image-upload",
                data: {'_token': $('meta[name="_token"]').attr('content'), 'image': base64data},
                success: function(data){
                    console.log(data);
                    $modal.modal('hide');
                    alert("Crop image successfully uploaded");
                }
              });
         }
    });
})
</script>
</body>
</html> --}}

{{-- 
<html lang="en">
<head>
  <title>How to Image Upload and Crop in Laravel with Ajax</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.min.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.2/croppie.js"></script>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
<div class="container">
  <div class="card" style="max-height: 500px;">
    <div class="card-header bg-primary text-center text-white">How to Image Upload and Crop in Laravel with Ajax</div>
    <div class="card-body">

      <div class="row">
        <div class="col-md-4 text-center">
        <div id="upload-demo"></div>
        </div>
        <div class="col-md-4" style="padding:5%;">
        <strong>Select image to crop:</strong>
        <input type="file" id="image">

        <button class="btn btn-success btn-block upload-image" style="margin-top:2%">Cropping Image</button>
        </div>

        <div class="col-md-4">
        <div id="preview-crop-image" style="background:#9d9d9d;width:300px;padding:50px 50px;height:300px;"></div>
        </div>
      </div>

    </div>
  </div>
</div>


<script type="text/javascript">
$.ajaxSetup({
headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var resize = $('#upload-demo').croppie({
    enableExif: true,
    enableOrientation: true,    
    viewport: { // Default { width: 100, height: 100, type: 'square' } 
        width: 200,
        height: 200,
        type: 'circle' //square
    },
    boundary: {
        width: 300,
        height: 300
    }
});
$('#image').on('change', function () { 
  var reader = new FileReader();
    reader.onload = function (e) {
      resize.croppie('bind',{
        url: e.target.result
      }).then(function(){
        console.log('jQuery bind complete');
      });
    }
    reader.readAsDataURL(this.files[0]);
});
$('.upload-image').on('click', function (ev) {
  resize.croppie('result', {
    type: 'canvas',
    size: 'viewport'
  }).then(function (img) {
    $.ajax({
      url: "",
      type: "POST",
      data: {"image":img},
      success: function (data) {
        html = '<img src="' + img + '" />';
        $("#preview-crop-image").html(html);
      }
    });
  });
});
</script>


</body>
</html> --}}



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/css/bootstrap.min.css"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.css"/>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.6/cropper.js"></script>
</head>
<body>
  <style>

    .page {
      margin: 1em auto;
      max-width: 768px;
      display: flex;
      align-items: flex-start;
      flex-wrap: wrap;
      height: 100%;
    }
    
    .box {
      padding: 0.5em;
      width: 100%;
      margin:0.5em;
    }
    
    .box-2 {
      padding: 0.5em;
      width: calc(100%/2 - 1em);
    }
    
    .options label,
    .options input{
      width:4em;
      padding:0.5em 1em;
    }
    .btn{
      background:white;
      color:black;
      border:1px solid black;
      padding: 0.5em 1em;
      text-decoration:none;
      margin:0.8em 0.3em;
      display:inline-block;
      cursor:pointer;
    }
    
    .hide {
      display: none;
    }
    
    img {
      max-width: 100%;
    }
    </style>
  <main class="page">
    <h2>Upload ,Crop and save.</h2>
    <!-- input file -->
    <div class="box">
      <input type="file" id="file-input">
    </div>
    <!-- leftbox -->
    <div class="box-2">
      <div class="result"></div>
    </div>
    <!--rightbox-->
    <div class="box-2 img-result hide">
      <!-- result of crop -->
      <img class="cropped" src="" alt="">
    </div>
    <!-- input file -->
    <div class="box">
      <div class="options hide">
        <label> Width</label>
        <input type="number" class="img-w" value="300" min="100" max="1200" />
      </div>
      <!-- save btn -->
      <button class="btn save hide">Save</button>
      <!-- download btn -->
      <a href="" class="btn download hide">Download</a>
    </div>
  </main>
</body>
</html>



<script>
  // vars
let result = document.querySelector('.result'),
img_result = document.querySelector('.img-result'),
img_w = document.querySelector('.img-w'),
img_h = document.querySelector('.img-h'),
options = document.querySelector('.options'),
save = document.querySelector('.save'),
cropped = document.querySelector('.cropped'),
dwn = document.querySelector('.download'),
upload = document.querySelector('#file-input'),
cropper = '';

// on change show image with crop options
upload.addEventListener('change', (e) => {
  if (e.target.files.length) {
		// start file reader
    const reader = new FileReader();
    reader.onload = (e)=> {
      if(e.target.result){
				// create new image
				let img = document.createElement('img');
				img.id = 'image';
				img.src = e.target.result
				// clean result before
				result.innerHTML = '';
				// append new image
        result.appendChild(img);
				// show save btn and options
				save.classList.remove('hide');
				options.classList.remove('hide');
				// init cropper
				cropper = new Cropper(img);
      }
    };
    reader.readAsDataURL(e.target.files[0]);
  }
});

// save on click
save.addEventListener('click',(e)=>{
  e.preventDefault();
  // get result to data uri
  let imgSrc = cropper.getCroppedCanvas({
		width: img_w.value // input value
	}).toDataURL();
  // remove hide class of img
  cropped.classList.remove('hide');
	img_result.classList.remove('hide');
	// show image cropped
  cropped.src = imgSrc;
  dwn.classList.remove('hide');
  dwn.download = 'imagename.png';
  dwn.setAttribute('href',imgSrc);
});
</script>