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
          {{-- <h4 class="m-0 text-dark">Assign member to club</h4> --}}
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{route('dashboard')}}">@lang('Home')</a></li>
            <li class="breadcrumb-item active">Assign member to club</li>
          </ol>
        </div>
      </div>
    </div>
  </div>

<div class="container-fluid">
  <div class="col-md-12">
    <div class="card card-outline card-primary">
      <div class="card-header">
        <h5>
          @if(isset($editData))
          @lang('Update member to club')
          @else
          @lang('Assign member to club')
          @endif
          {{-- <a class="btn btn-sm btn-success float-right" href="{{route('assign.to.member')}}"><i class="fa fa-list"></i> @lang('academic Committee Member') @lang('List')</a></h5> --}}
      </div>
      <!-- Form Start-->
      <form method="post" action="{{route('club.member.assign.to.club')}}" id="myForm" enctype="multipart/form-data">
          @csrf

          <div class="card-body">
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="faculty_name">Student</label>

                <select class="form-control selectpicker @error('club_member_id') is-invalid @enderror" name="club_member_id" id="selectNameAndBup" data-live-search="true">
                  <option value="">Select</option>
                  @foreach ($students as $student)
                    <option value="{{$student->id}}">{{$student->name}} - {{$student->student_id}} <span>
                    </span></option>
                  @endforeach
                </select>
                @error('club_member_id')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
              </div>

              <div class="form-group col-md-6">
                <label for="faculty_name">Club</label>

                <select class="form-control @error('club_id') is-invalid @enderror" name="club_id" id="selectNameAndBup" data-live-search="true">
                  <option value="">Select</option>
                  @foreach ($clubs as $club)
                    <option value="{{$club->id}}">{{$club->name}}<span>
                    </span></option>
                  @endforeach
                </select>
                @error('club_id')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
              </div>
              <div class="form-group col-md-6">
                <label for="faculty_name">Club Designations</label>

                <select class="form-control selectpicker @error('club_designation_id') is-invalid @enderror" name="club_designation_id" id="selectNameAndBup" data-live-search="true">
                  <option value="">Select</option>
                  @foreach ($club_designations as $club_designation)
                    <option value="{{$club_designation->id}}">{{$club_designation->name}}<span>
                    </span></option>
                  @endforeach
                </select>
                @error('club_designation_id')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
              </div>

              <div class="form-group col-md-3">
                <label for="">Start Date</label>
                <input type="text" class="form-control singledatepicker @error('sort') is-invalid @enderror" name="start_date" value="{{@$editData->sort}}">
                @error('sort')
                <span class="invalid-feedback" role="alert">
                     <strong>{{ $message }}</strong>
                 </span>
                @enderror
              </div>
              <div class="form-group col-md-3">
                <label for="">End Date</label>
                <input type="text" class="form-control singledatepicker @error('sort') is-invalid @enderror" name="end_date" value="{{@$editData->sort}}">
                @error('sort')
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
