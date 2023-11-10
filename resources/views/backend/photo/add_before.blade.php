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
    /* width:4em; */
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
                <select name="gallery_category_id" class="form-control select2">
                  <option disabled selected value="">@lang('Select')</option>
                  <option value="1" {{(@$editData->gallery_category_id=="0")?"selected":""}}>gallery_category_id 1</option>
                  <option value="2" {{(@$editData->gallery_category_id=="1")?"selected":""}}>gallery_category_id 2</option>
                </select>
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
                <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="file-input">
                @error('image')
                <span class="text-red">{{ $message }}</span>
                @enderror
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

              <div class="box row">
                <div class="options hide">
                  <label>Width</label>
                  <input type="number" class="img-w" value="300" min="100" max="1200" />
                </div>
                <button class="btn btn-info save hide" style="margin: 0 0 0 5px;">Crop</button>
                {{-- <a href="" class="btn download hide">Download</a> --}}
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
box = document.querySelector('.box'),
box_2 = document.querySelector('.box-2'),
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
				img.name = 'image';
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
  // box.classList.add('hide');
	// box_2.classList.add('hide');
	// img_result.classList.add('hide');
});
</script>


@endsection




