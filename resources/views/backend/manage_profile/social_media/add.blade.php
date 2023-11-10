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
          <h4 class="m-0 text-dark">{{ (isset($profilesocialLink) && $profilesocialLink->count() > 0)? "Update":"Add" }} Social Media Link</h4>
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
          @if((isset($profilesocialLink) && $profilesocialLink->count() > 0))
          @lang('Update') @lang('Social Media Link')
          @else
          @lang('Add') @lang('Social Media Link')
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
        <a class="tablinks" href="{{ route('profile_conference_info_edit',@$profile_id) }}" style="color: black;">Conference</a>
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
        @endif --}}

        {{-- @if(@$profile_id)
        <a class="tablinks" href="{{ route('profile_research_gate_info_edit',@$profile_id) }}" style="color: black;">Research Gate</a>
        @endif --}}

        {{-- @if(@$profile_id)
        <a class="tablinks" style="color: black;">Website</a>
        @endif --}}

        @if(@$profile_id)
        <a class="tablinks active" href="{{ route('profile_Social_media_info_edit',@$profile_id) }}" style="color: black;">Social Media Link</a>
        @endif

      </div>
      <div class="card-body">
        {{-- <form method="post" action="{{(@$profile_id)?route('profile_Social_media_info_update',$profile_id):route('profile_website_info_store')}}" id="" enctype="multipart/form-data"> --}}
            <form method="post" action="{{route('profile_Social_media_info_update',$profile_id)}}"  enctype="multipart/form-data">
            @csrf
            <input type="hidden" id="" name="profile_id" value="{{$profile_id}}">
            <div id="website_info" class="tabcontent">
                <h4>Social Media Link</h4>
                {{-- class="form-row" removed for conflict of minimizing ckeditor features --}}
                <div class="" id="add_education_extra_div">

                  <div class="row " >
                      <div class="col-11" >
                          <div class="row">
                             <div class="form-group col-sm-4">
                                  <label>Facebook Link</label>
                                  {{-- <textarea id="" name="WebsiteAddress[5000]" class="form-control textarea">{{ @$profile_website->WebsiteAddress }}</textarea>
                                   --}}
                                   <input type="text" name="facebook_link" class="form-control" value="{{ !empty($profilesocialLink->facebook_link)? $profilesocialLink->facebook_link : "" }}" placeholder="Facebook Link">
                                  @error('facebook_link')
                                  <span class="invalid-feedback" role="alert">
                                      <strong>{{ $message }}</strong>
                                  </span> @enderror
                              </div>

                              <div class="form-group col-sm-4">
                                <label>Twitter Link</label>

                                 <input type="text" name="twitter_link" class="form-control" value="{{ !empty($profilesocialLink->twitter_link)? $profilesocialLink->twitter_link : "" }}" placeholder="Twitter Link">
                                @error('facebook_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>

                            <div class="form-group col-sm-4">
                                <label>Instagram Link</label>

                                 <input type="text" name="instagram_link" class="form-control" placeholder="Instagram Link"    value="{{ !empty($profilesocialLink->instagram_link)? $profilesocialLink->twitter_link : "" }}"  >
                                @error('instagram_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>

                            <div class="form-group col-sm-4">
                                <label>WhatsApp Link</label>

                                 <input type="text" name="whatsapp_link" class="form-control"placeholder="WhatsApp Link"  value="{{ !empty($profilesocialLink->whatsapp_link)? $profilesocialLink->whatsapp_link : "" }}" >
                                @error('whatsapp_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>

                            <div class="form-group col-sm-4">
                                <label>LinkedIn Link</label>

                                 <input type="text" name="linkedin_link" class="form-control" placeholder="LinkedIn Link" value="{{ !empty($profilesocialLink->linkedin_link)? $profilesocialLink->linkedin_link : "" }}">
                                @error('linkedin_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>


                            <div class="form-group col-sm-4">
                                <label>Google Scholar Link</label>

                                 <input type="text" name="google_scholar_link" class="form-control" placeholder="Google Scholar Link" value="{{ !empty($profilesocialLink->google_scholar_link)? $profilesocialLink->google_scholar_link : "" }}">
                                @error('google_scholar_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Research Gate Link</label>

                                 <input type="text" name="research_gate_link" class="form-control" placeholder="Research Gate Link" value="{{ !empty($profilesocialLink->research_gate_link)? $profilesocialLink->research_gate_link : "" }}">
                                @error('research_gate_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                            <div class="form-group col-sm-4">
                                <label>Website Link</label>

                                 <input type="text" name="website_link" class="form-control" placeholder="Website Link" value="{{ !empty($profilesocialLink->website_link)? $profilesocialLink->website_link : "" }}">
                                @error('website_link')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>

                          </div>
                      </div>

                  </div>

                </div>
                <div class="form-row">
                  <div class="form-group col-md-3" style="margin-top: 20px;">
                      <button type="submit" class="btn btn-primary">{{(isset($profile_websites) && $profile_websites->count() > 0)?"Update":"Save"}}</button>
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
                    <label>Name</label>
                    <input id="name" type="text"  class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Full name with Salutation">
                    @error('name')
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
            CKEDITOR.replace('WebsiteAddress['+counter+']');
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
