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
  /* body {font-family: Arial;} */

  /* Style the tab */
  .tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #d9e4d5;
  }

  /* Style the buttons inside the tab */
  .tab a {
    background-color: #d9e4d5;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
  }

  /* Change background color of buttons on hover */
  .tab a:hover {
    background-color: #97d182;
  }

  /* Create an active/current tablink class */
  .tab a.active {
    background-color: #afdfc4;
  }
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
          <h4 class="m-0 text-dark">{{ (isset($profile_conferences) && $profile_conferences->count() > 0)? "Update":"Add" }} Conference Info</h4>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">@lang('Home')</a></li>
            <li class="breadcrumb-item active">@lang('Profile')</li>
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
          @if((isset($profile_conferences) && $profile_conferences->count() > 0))
          @lang('Update') @lang('Conference Info')
          @else
          @lang('Add') @lang('Conference Info')
          @endif
          <a class="btn btn-sm btn-success float-right" href="{{route('manage_profile.from_database')}}"><i class="fa fa-list"></i> @lang('Profile') @lang('List')</a></h5>
      </div>
      <!-- Form Start-->
      <div class="tab">
        {{-- <button class="tablinks active" onclick="openCity(event, 'basic_info')">Basic Info</button>
        <button class="tablinks" onclick="openCity(event, 'journal_info')">Journal</button> --}}
        @if(@$profile_id)
        <a class="tablinks" href="{{ route('manage_profile.from_database.edit',$profile_id) }}" style="color: black;">Basic Info</a>
        @else
        <a class="tablinks" href="{{ route('manage_profile.from_database.add') }}" style="color: black;">Basic Info</a>
        @endif

        @if(@$profile_id)
        <a class="tablinks" href="{{ route('profile_journal_info_edit',$profile_id) }}" style="color: black;">Journal</a>
        @endif

        @if(@$profile_id)
        <a class="tablinks active" style="color: black;">Conference</a>
        @endif

        @if(@$profile_id)
        <a class="tablinks" href="{{ route('profile_book_info_edit',@$profile_id) }}" style="color: black;">Book</a>
        @endif

        @if(@$profile_id)
        <a class="tablinks" href="{{ route('profile_biography_info_edit',@$profile_id) }}" style="color: black;">Biography</a>
        @endif

        @if(@$profile_id)
        <a class="tablinks" href="{{ route('profile_professional_activity_info_edit',@$profile_id) }}" style="color: black;">Professional Activity</a>
        @endif

        @if(@$profile_id)
        <a class="tablinks" href="{{ route('profile_course_taught_info_edit',@$profile_id) }}" style="color: black;">Course Taught</a>
        @endif

        @if(@$profile_id)
        <a class="tablinks" href="{{ route('profile_award_honor_info_edit',@$profile_id) }}" style="color: black;">Award Honor</a>
        @endif

        @if(@$profile_id)
        <a class="tablinks" href="{{ route('profile_membership_info_edit',@$profile_id) }}" style="color: black;">Membership</a>
        @endif

        @if(@$profile_id)
        <a class="tablinks" href="{{ route('profile_research_area_interest_info_edit',@$profile_id) }}" style="color: black;">Research Area Interest</a>
        @endif

        {{-- @if(@$profile_id)
        <a class="tablinks" href="{{ route('profile_google_scholar_info_edit',@$profile_id) }}" style="color: black;">Google Scholar</a>
        @endif

        @if(@$profile_id)
        <a class="tablinks" href="{{ route('profile_research_gate_info_edit',@$profile_id) }}" style="color: black;">Research Gate</a>
        @endif

        @if(@$profile_id)
        <a class="tablinks" href="{{ route('profile_website_info_edit',@$profile_id) }}" style="color: black;">Website</a>
        @endif --}}

        @if(@$profile_id)
        <a class="tablinks" href="{{ route('profile_Social_media_info_edit',@$profile_id) }}" style="color: black;">Social Media Link</a>
        @endif



      </div>
      <div class="card-body">
        <form method="post" action="{{(@$profile_id)?route('profile_conference_info_update',$profile_id):route('profile_conference_info_store')}}" id="" enctype="multipart/form-data">
            @csrf
            <div id="conference_info" class="tabcontent">
                <h4>Conference Info</h4>
                {{-- class="form-row" removed for conflict of minimizing ckeditor features --}}
                <div class="" id="add_education_extra_div">
                  @if(!empty($profile_conferences))
                  @foreach($profile_conferences as $key => $profile_conference)
                  <div class="row remove_education_extra_div" style="margin-top: 2px;margin-left: 0; margin-right:0;">
                      <div class="col-11" style="border: 2px solid #e6e6b9;padding: 20px;border-radius: 10px 0px 0px 10px;">
                          <div class="row">
                              <div class="form-group col-sm-12">
                                  <label>Conference Detail</label>
                                  <input type="hidden" value="{{ !empty($profile_conference->id)? $profile_conference->id : "" }}" name="conference_id[{{$key}}]">
                                  <textarea id="" name="ConferenceDetail[{{$key}}]" class="form-control textarea">{{ !empty($profile_conference->ConferenceDetail)? $profile_conference->ConferenceDetail : "" }}</textarea>
                                  @error('ConferenceDetail')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span> @enderror
                              </div>
                          </div>
                      </div>
                      <div class="col-1" style="text-align: center;writing-mode: vertical-lr;background: #e6e6b9;border-radius: 0px 10px 10px 0px;">

                          <div class="form-group col-md-2">
                              {{-- @if($key != 0) --}}
                              <a id="delete" title="Delete" data-id="{{@$profile_conference->id}}" data-token="{{csrf_token()}}" data-route="{{route('remove_profile_conference')}}"> <i class="btn btn-danger fas fa-trash"> </i>  </a>
                              {{-- @endif --}}
                              <i class="btn btn-info fa fa-plus-circle add_education_extra"></i>
                          </div>

                      </div>
                  </div>
                  @endforeach
                  @endif

                  @if(empty($profile_conferences) || count($profile_conferences) == 0)
                  <div class="row remove_education_extra_div" style="margin-top: 2px;margin-left: 0; margin-right:0;">
                      <div class="col-11" style="border: 2px solid #e6e6b9;padding: 20px;border-radius: 10px 0px 0px 10px;">
                          <div class="row">
                              <div class="form-group col-sm-12">
                                  <label>Conference Detail</label>
                                  <textarea id="" name="ConferenceDetail[5000]" class="form-control textarea">{{ @$profile_conference->ConferenceDetail }}</textarea>
                                  @error('ConferenceDetail')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span> @enderror
                              </div>
                          </div>
                      </div>
                      <div class="col-1" style="text-align: center;writing-mode: vertical-lr;background: #e6e6b9;border-radius: 0px 10px 10px 0px;">

                          <div class="form-group col-md-2">
                              <i class="btn btn-info fa fa-plus-circle add_education_extra"></i>
                          </div>

                      </div>
                  </div>
                  @endif
                </div>
                <div class="form-row">
                  <div class="form-group col-md-3" style="margin-top: 20px;">
                      <button type="submit" class="btn btn-primary">{{(isset($profile_conferences) && $profile_conferences->count() > 0)?"Update":"Save"}}</button>
                  </div>
                </div>
            </div>

        </form>
        <!--Form End-->
      </div>
    </div>
  </div>
</div>

<script id="extra_education_templete" type="text/x-handlebars-template">

    <div class="row remove_education_extra_div" style="margin-top: 2px;margin-left: 0; margin-right:0;">
        <div class="col-11" style="border: 2px solid #e6e6b9;padding: 20px;border-radius: 10px 0px 0px 10px;">
            <div class="row">
                <div class="form-group col-sm-12">
                    <label>Conference Detail</label>
                    <textarea id="" name="ConferenceDetail[@{{counter}}]" class="form-control textarea"></textarea>
                    @error('ConferenceDetail')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span> @enderror
                </div>
            </div>
        </div>
        <div class="col-1" style="text-align: center;writing-mode: vertical-lr;background: #e6e6b9;border-radius: 0px 10px 10px 0px;">

            <div class="form-group col-md-2">
                <i class="btn btn-info fa fa-plus-circle add_education_extra"></i>
                <i class="btn btn-danger fa fa-minus-circle remove_education_extra"> </i>
            </div>

        </div>
    </div>
</script>
<script type="text/javascript">
    $(document).ready(function(){
        var counter = 10000;
        $(document).on("click",".add_education_extra",function(){
            var source = $("#extra_education_templete").html();
            var template = Handlebars.compile(source);
            var data= {counter:counter};
            var html = template(data);
            $("#add_education_extra_div").append(html);
            $('.select2').select2();
            CKEDITOR.replace('ConferenceDetail['+counter+']');
            counter ++;
        });

        $(document).on("click", ".remove_education_extra", function (event) {
            $(this).closest(".remove_education_extra_div").remove();
        });
    });
</script>

  <script type="text/javascript">
    $(document).ready(function () {
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
