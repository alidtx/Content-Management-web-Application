@extends('frontend.landing')
@php
$page_title = 'Home Page';
@endphp
@section('title')
{{ $page_title }}
@endsection
<style>
    /*! CSS Used from: /css/app.css */
    *,
    :after,
    :before {
        box-sizing: border-box;
    }

    a {
        color: #50A2CA;
        text-decoration: none;
        background-color: transparent;
    }

    a:hover {
        color: #50A2CA;
        text-decoration: underline;
    }

    @media print {

        *,
        :after,
        :before {
            text-shadow: none !important;
            box-shadow: none !important;
        }

        a:not(.btn) {
            text-decoration: underline;
        }
    }

    /*! CSS Used from: /css/styles1.css */
    marquee a {
        color: #fff !important;
        font-size: 13px;
        font-weight: 600;
    }

    /*! CSS Used from: /css/styles1_responsive.css */
    @media screen and (max-width:1023px) {
        a {
            font-size: 13px;
        }

        marquee {
            margin-top: 6px;
        }
    }

    a {
        background-color: transparent;
        -webkit-text-decoration-skip: objects;
    }

    a:active,
    a:hover {
        outline-width: 0;
    }

    .whats_new_icon {
        width: 999;
        background: #8AC53C;
        color: black;
        position: absolute;
        margin-top: -36.5px;
        z-index: 99;
        font-size: 13px;
        font-weight: 700;
        padding: 5.7px;
    }

    .academicAbout h3 {
        overflow: hidden;
        max-height: 48px;
        min-height: 48px;
        letter-spacing: 1px;
    }

    .academicAbout p {
        max-height: 72px;
        overflow: hidden;
        font-family: "Work Sans";
        font-size: 0.875rem;
        line-height: 17px;
    }

    .home-content-heading {
        color: #10C45C;
        font-size: 30px;
        text-shadow: 0px 4px 4px rgb(0 0 0 / 25%);
        font-family: "Work Sans";
        font-style: normal;
        font-weight: 600;
        font-size: 2.25rem;
        line-height: 123.6%;
    }

    .academic-image {
        display: block;
        width: 100%;
    }

    .about_overview p {
        display: block;
        text-align: justify;
        font-weight: 400;
        line-height: 19.75px;
    }

    .about_overview a {
        width: 250px;
        margin-left: 22.5%;
        font-family: 'Work Sans';
        background-color: #275D38;
    }

    .academics_details h3 {
        font-family: 'Work Sans';
        font-weight: 400;
        line-height: 17.5px;
        font-size: 0.875rem;

    }

    .admission_details {
        width: 13.75rem;
        margin-top: -40px;
    }

    .admission_details h3 {
        font-family: 'Bebas Neue';
        font-size: 1.5rem;
    }

    .admission_details p {
        font-family: 'Poppins';

    }

    .read_more_btn {
        width: 150px;
        float: left;
        background-color: #10C45C !important;
        border: none !important;
        border-radius: 5px !important;
        font-family: 'Work Sans' !important;
        height: 40px !important;
        font-size: 1rem !important;
    }

    .achivement-bg {
        box-shadow: 0px 1px 4px rgba(0, 0, 0, 0.1);
        border-radius: 10px;
    }

    .achievement_ribbon1 {
        width: 150px;
        height: 50px;
        background: #B60404;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
        border-radius: 0px 0px 10px 10px;
        position: absolute;
        top: -10px;
        left: -150px;
    }

    .achievement_ribbon2 {
        width: 10px;
        height: 8px;
        transform: skew(150deg);
        background: #B60404;
        position: absolute;
        top: -10px;
        left: -153px;
    }

    #about-img1 {
        width: 75%;
        border: 8px solid #275D38;
    }

    #about-img2 {
        width: 80%;
        border: 8px solid #86BC42;
    }

    .research-container {
        background-color: #000;
    }

    .research-container img {
        opacity: 0.9;
    }

    .research-container:hover {
        background-color: #000;
    }

    .research-container img:hover {
        opacity: 0.8;
    }

    @media only screen and (max-width: 1026px) {
        .whats_new_icon {
            margin-top: -35.5px !important;
        }
    }

    .owl-carousel: {
        height: auto;
    }

    .owl-theme .owl-nav {
        margin-top: 0px !important;
    }

    .researchCarousel .owl-item {
        height: 34.5rem !important;
    }

    @media only screen and (max-width: 768px) {
        #marquee .whats_new_icon .update_text_news {
            display: none;
            width: 700;
        }
    }

    @media only screen and (min-width: 1399px) {
        #about-img2 {
            width: 90%;
        }

        #about-section {
            padding-bottom: 4rem;
        }
    }
</style>
@section('content')
<section id="marquee" style="display: none">
    <div class="" style="max-width: 100%;">
        {{-- #364e72 --}}

        <marquee style="background:#006B4E;color:white;font-weight:600;position:relative;z-index:1;height: 30px;"
            onmouseover="stop()" onmouseout="start()">

            @foreach ($scrollbarNews as $n)
            <a href="" style="font-size: 17px; font-family: Tahoma;">{{ $n->title }}</a>
            {{ $loop->last ? '' : '|' }}
            @endforeach

        </marquee>
        <div class="whats_new_icon"
            style="border-top-right-radius: 5px !important;border-bottom-right-radius: 5px !important;white-space: nowrap;">
            News<span class="update_text_news"> Update</span>
        </div>

    </div>


</section>
<!-- Slider Start From Here -->
@include('frontend.partials.slider')
<!-- Slider End Here -->
<!-- Message from the vice chancellor -->
<section class="" style="background-color: #2d3e50;">
    <div class="container mb-5 align-items-center">
        <div class="row d-flex justify-content-between align-items-center">
            <div class="col-md col-lg-8  mt-0" style="color:#fff">
                <h1 class="text-uppercase fs-3 mb-0 fw-bold" style="color:#86BC42">Message from the vice chancellor</h1>
                <div class="mb-0 mt-0 d-inline-block mx-auto"
                    style="width: 100%; background-color: #86BC42; height: 8px">
                </div>
                <p>
                    {!! Str::limit(@$vcInfo->short_description, 845) !!} <a href="{{route('vc_info')}}">Read More</a>
                </p>
                {{-- <div>
                    {!! Str::limit($vcInfo->short_description, 750) !!}
                </div> --}}
            </div>
            <div class="col-md col-lg-4">
                <div class="mb-5 text-center mt-5">
                    <img style="border:8px solid #86BC42;"
                        src="{{ asset('public/upload/profiles/' . @$vcInfo->profile->photo) }}"
                        onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';"
                        height="300" width="300" alt="">
                    <h5 class="card-title text-white fs-6 mt-0 text-start text-uppercase mt-3 ms-4">
                        {{ @$vcInfo->profile->nameEn }}<br> {{ @$vcInfo->profile->designation }}</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About -->
<section class="">
    <div class="container">
        <h1 class="text-uppercase mb-3 home-content-heading">About our university</h1>
        <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
            <div class="position-absolute"
                style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
            </div>
        </div>
        <div class="row justify-content-between" id="about-section">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-7 mt-4">
                <div class="position-relative">
                    <div data-aos="zoom-in-right" data-aos-delay="50" data-aos-duration="1000"
                        data-aos-easing="ease-in-out">
                        <img class="img-fluid" id="about-img1"
                            src="{{ asset('public/upload/about/' . @$aboutUni['about_image_1']) }}" style="" />
                    </div>
                    <div class="position-absolute" data-aos="zoom-in-left" data-aos-delay="50" data-aos-duration="1000"
                        data-aos-easing="ease-in-out" style="top: 1.75rem; z-index: -1; left: 1.25rem;">
                        <img class="img-fluid d-sm-block" id="about-img2"
                            src="{{ asset('public/upload/about/' . $aboutUni['about_image_2']) }}" style="" />
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-5 pt-4 about_overview">
                <p>
                    {!! $aboutUni->history !!}
                </p>
                <a href="{{ route('about_overview') }}" type="button"
                    class="btn btn-success btn-md rounded-0 text-uppercase">Find More
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Academics -->
<section class="my-4">
    <div class="" style="background-image: url({{ asset('public/frontend/assets/img/bup/academic_banner.png') }}); background-repeat: no-repeat;
      background-position: center; background-size: cover;">
        <div class="home-academics">
            <div class=" container">
                <div class="d-flex justify-content-between align-items-end">
                    <h1 class="text-uppercase mb-3 home-content-heading">
                        Academics
                    </h1>
                    <a href="{{ route('academics') }}"
                        class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a>
                </div>
                <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
                    <div class="position-absolute"
                        style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="owl-carousel" id="academicCarousel">
                            @foreach ($faculties as $faculty)
                            <div class="">
                                <div class="mt-3 mb-5">
                                    <div class="bg-primary bg-opacity-50 card rounded-0 overflow-hidden">
                                        <img class="p-2 academic-image w-100"
                                            src="{{ asset('public/upload/faculty/' . $faculty->image) }}"
                                            onerror="this.onerror=null;this.src='{{ asset('public/upload/no-image.png') }}';"
                                            alt="" />
                                        <div class="card-body academicAbout">
                                            <h3 class="card-title text-white fs-5 text-center text-uppercase">
                                                {{ $faculty->name }}
                                            </h3>
                                            <p class="card-text">
                                                {!! Str::limit(@$faculty->about, 50) !!}
                                            </p>
                                            <a class="text-white academics_details"
                                                href="{{ route('academics.academics_details', $faculty->id) }}">
                                                <h3
                                                    class="text-uppercase d-flex align-items-center justify-content-end mb-0">
                                                    Find More<i class="bi bi-arrow-right mx-2"></i>
                                                </h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Current Admissions -->
<section class="my-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase mb-3  home-content-heading">Current Admissions</h1>
            <a href="" class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a>
        </div>
        <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
            <div class="position-absolute"
                style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
            </div>
        </div>
        <div class="row">
            <div class="carousel-wrap">
                <div class="owl-carousel owl-theme" id="admissionCarousel">
                    @foreach ($admission_programs as $program)
                    <div class="item">
                        <div class="mt-3 mb-5">
                            <div class="card">
                                <img class="rounded-2" src="{{ asset('public/upload/program/' . $program['image']) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('public/upload/no-image.png') }}';"
                                    alt="" />
                            </div>
                            <div class="d-flex justify-content-center">
                                <div
                                    class="d-block p-2 bg-primary text-white text-center position-absolute admission_details">
                                    <h3 class="card-title my-2 text-uppercase">
                                        {{ @$program->program_title }}
                                    </h3>
                                    <p class="card-text">
                                        {{ @$program->program_category->program_category }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Research in BUP -->
<section class="my-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase mb-3 home-content-heading">
                Research in Bup
            </h1>
            <a href="" class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a>
        </div>
        <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
            <div class="position-absolute"
                style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
            </div>
        </div>
        <div class="row">
            <div class="carousel-wrap">
                <div class="owl-carousel owl-theme researchCarousel">
                    @foreach ($completedResearches as $completedResearch)
                    <div class="item">
                        <div class="mt-3">
                            <div class="position-absolute text-white d-flex justify-content-center"
                                id="research-ribbon">
                                <p class="mt-3">
                                    {{ @$completedResearch->research_for == 1 ? 'Bangabandhu Chair' :
                                    (@$completedResearch->research_for == 2 ? 'CHSR' : 'BUP') }}
                                </p>
                            </div>
                            <a href="#">
                                <div class="card rounded-0 research-container">
                                    <img class=""
                                        src="{{ asset('public/upload/journal/' . $completedResearch['image']) }}" alt=""
                                        height="528px;" />
                                </div>
                                <div class="d-flex justify-content-end">
                                    <div class="d-block p-2 bg-light bg-opacity-80 text-dark text-center position-absolute"
                                        style="width: 320px; margin-top: -130px;">
                                        <p class="card-text fw-bold" style="text-align: justify;">
                                            {{ @$completedResearch->title }} <br>
                                            Authors: {{ @$completedResearch->author }}
                                        </p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>
<!-- On Campus Gallery -->
<section class="">
    <div class="" style="background-image: url({{ asset('public/frontend/assets/img/bup/oncampus_banner.png') }}); background-repeat: no-repeat;
      background-position: center; background-size: cover;">
        <div class="container">
            <h1 class="text-uppercase mb-3 home-content-heading">On Campus
            </h1>
            <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
                <div class="position-absolute"
                    style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
                </div>
            </div>
            <div class="row mt-3">
                @foreach ($on_campus_facilities as $facility)
                <div class="col-lg-3 col-md-12 mb-4 mb-lg-0 ">
                    <a href="">
                        <div class="over-container">
                            <img src="{{ asset('public/upload/on_campus/' . $facility['image']) }}"
                                onerror="this.onerror=null;this.src='{{ asset('public/upload/no-image.png') }}';"
                                class=" shadow-1-strong mb-4 over-img" alt="Student Life" />
                            <div class="position-absolute campus-title" style="right:0px; bottom:20px">
                                <div class=" text-white d-flex justify-content-center"
                                    style="width: 200px; height: 40px; background: #B60404; box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);">
                                    <p class="mt-2 text-right"> {{ @$facility->title }} </p>
                                </div>
                            </div>
                            <div class="overlay">
                                <div class="text">{{ @$facility->title }}</div>
                            </div>
                        </div>
                    </a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- Glance -->
<section>
    <div class="" style="background-image:linear-gradient(
          rgba(0, 0, 0, 0.75),
          rgba(0, 0, 0, 0.75)
        ), url({{ asset('public/frontend/assets/img/bup/banner.jpg') }}); background-repeat: no-repeat;
      background-position: center;
      background-size: cover;">
        <div class=" container">
            <h1 class="text-white fs-2 mb-0 text-center py-3 fw-bold">We are in <span class="text-primary">Numbers
                </span> at a glance
            </h1>
            <div class="row pb-3">
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 my-3">
                    <div class="bg-info bg-opacity-50 card rounded-0 glance-div">
                        <div class="card-body" style="min-height: 210px;">
                            <h1 class="card-title text-white fw-bold text-center">
                                {{-- <i class="bi bi-people-fill"></i> --}}
                                {{-- <i class="fa fa-users" aria-hidden="true"></i> --}}
                                <img class="pt-3" src="{{ asset('public/frontend/assets/img/bup/glance1.svg') }}"
                                    alt="" />
                            </h1>
                            <h1 class="card-title text-white fw-bold text-center" style="font-size: 40px;">
                                {{ @$at_a_glance->student_number }}
                            </h1>
                            <p class="card-title fw-bold text-center">
                                Students
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 my-3">
                    <div class="card rounded-0 bg-info bg-opacity-50 glance-div">
                        <div class="card-body" style="min-height: 210px;">
                            <h1 class="card-title text-white fw-bold text-center">
                                {{-- <i class="fas fa-chart-line" aria-hidden="true"></i></h1> --}}
                            <img class="pt-3" src="{{ asset('public/frontend/assets/img/bup/glance2.svg') }}" alt="" />
                            <h1 class="card-title text-white fw-bold text-center" style="font-size: 40px;">
                                {{ @$at_a_glance->faculty_member_number ? @$at_a_glance->faculty_member_number :
                                $personnels_to_faculty_count }}
                            </h1>
                            <p class="card-title fw-bold text-center">
                                Faculty Member
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 my-3">
                    <div class="bg-info bg-opacity-50 card rounded-0 glance-div">
                        <div class="card-body" style="min-height: 210px;">
                            <h1 class="card-title text-white fw-bold text-center">
                                <img class="pt-3" src="{{ asset('public/frontend/assets/img/bup/glance3.svg') }}"
                                    alt="" />

                            </h1>
                            <h1 class="card-title text-white fw-bold text-center" style="font-size: 40px;">
                                {{ @$at_a_glance->office_staff_number ? @$at_a_glance->office_staff_number :
                                $personnels_to_office_count }}
                            </h1>
                            <p class="card-title fw-bold text-center">
                                Office Staff
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-3 my-3">
                    <div class="bg-info bg-opacity-50 card rounded-0 glance-div">
                        <div class="card-body" style="min-height: 210px;">
                            <h1 class="card-title text-white fw-bold text-center">
                                <img class="pt-3" src="{{ asset('public/frontend/assets/img/bup/glance4.svg') }}"
                                    alt="" />
                            </h1>
                            <h1 class="card-title text-white fw-bold text-center" style="font-size: 40px;">
                                {{ @$at_a_glance->member_number ? @$at_a_glance->member_number : $profile_count }}
                            </h1>
                            <p class="card-title fw-bold text-center">
                                Member
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Special Achievments -->
<section>
    <div style="background: rgba(0, 178, 255, 0.05);">
        <div class="container py-4">
            <div class="d-flex justify-content-between align-items-end">
                <h1 class="text-uppercase mb-3 home-content-heading">
                    Special Achievments
                </h1>
                <a href="" class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a>
            </div>
            <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
                <div class="position-absolute"
                    style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
                </div>
            </div>

            <div class="row">
                <div class="carousel-wrap">
                    <div class="owl-carousel owl-theme" id="achievementCarousel">
                        @foreach ($special_achievements as $special_achievement)
                        <div class="item">
                            <div class="my-4">
                                <div class="achivement-bg card border-0 pb-3">
                                    <img class="p-2 rounded-2" style="border-radius: 15px !important;"
                                        src="{{ asset('public/upload/special_achievement/' . $special_achievement['image']) }}"
                                        alt="" />
                                    <div class="align-self-end position-absolute">
                                        <div class=" text-white d-flex justify-content-center achievement_ribbon1"
                                            style="">
                                            <p class="mt-3">
                                                {{ @$special_achievement->category == 1 ? 'Student' :
                                                (@$special_achievement->category == 2 ? 'Teacher' : 'BUP') }}
                                            </p>
                                        </div>
                                        <div class="achievement_ribbon2">

                                        </div>
                                    </div>
                                    <div class="card-body" style="min-height:290px">
                                        <h5 class="card-title fs-5 mt-2">
                                            {{ Str::limit(@$special_achievement->title, 50) }}
                                        </h5>
                                        <p class="d-flex justify-content-start align-items-center my-2 mb-0"><i
                                                class="bi bi-clock-history text-primary me-2 py-3 fs-6"></i></i>{{
                                            date('F d, Y', strtotime($special_achievement->date)) }}
                                        </p>
                                        <p class="d-flex justify-content-start align-items-center"
                                            style="text-align:justify; min-height:100px;">
                                            {{ Str::limit(@$special_achievement->short_description, 150) }}</p>
                                        <a href="{{url('archivement/'.$special_achievement->id)}}" type="button"
                                            class="btn btn-primary btn-sm read_more_btn pt-2 fst-italic">Read More
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Notice -->
<section>
    <div class="container">
        @include('frontend.partials.sections.notice')
    </div>
</section>
<!-- News & Events -->
<section class="mt-5">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-9">
                <div class="d-flex justify-content-between align-items-end">
                    <h1 class="text-uppercase mb-3 home-content-heading">
                        News
                    </h1>
                    <a href="{{ route('news.all') }}"
                        class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a>
                </div>
                <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
                    <div class="position-absolute"
                        style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
                    </div>
                </div>
                <div class="row row-cols-1 row-cols-md-3 upcoming-events mt-3">

                    @include('frontend.partials.sections.news_new')
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-3">
                <div class="d-flex justify-content-between align-items-end">
                    <h1 class="text-uppercase mb-3 home-content-heading">
                        Events
                    </h1>
                    <a href="{{ route('events.all') }}"
                        class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a>
                </div>
                <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
                    <div class="position-absolute"
                        style="width: 70%; background-color: #10C45C; height: 8px; margin-top: -4px;">
                    </div>
                </div>
                {{-- <div class="row row-cols-1 row-cols-md-3 mt-3"> --}}
                    {{-- @include('frontend.partials.sections.news_new') --}}
                    @include('frontend.partials.sections.events_new')
                    {{-- </div> --}}

            </div>
        </div>
    </div>

</section>
<!-- Affiliations -->
<section class="mb-5 mt-4">
    <div class="container">
        <div class="d-flex justify-content-between align-items-end">
            {{-- <h1 class="text-uppercase mb- 3home-content-heading">News
            </h1>
            <a href="{{ route('news.all') }}"
                class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a> --}}
            <h1 class="text-uppercase  mb-3 home-content-heading">
                Affiliate Institute
            </h1>
            <a href="{{ route('all.affiliate.institutes') }}"
                class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a>
        </div>

        <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
            <div class="position-absolute"
                style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
            </div>
        </div>
    </div>
    <div id="carouselExample" class="carousel slide mt-3">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class=" container affiliations-container bg-light rounded-2 mb-3">
                    <div class="row d-flex justify-content-between flex-sm-row">
                        @foreach ($affiliations as $affiliation)
                        <div class="col-lg-2 d-flex align-items-center my-3">
                            <div class="text-center">
                                <img src="{{ $affiliation->image ? asset('public/upload/affiliation/'.@$affiliation->image) : asset('public/frontend/assets/img/home/brnad (1).png')}}"
                                    alt="">
                                <p class="text-center"><a href="{{ route('affiliation', $affiliation->id) }}"
                                        style="text-decoration: none; font-weight: 600;">{{$affiliation->inst_name}}</a>
                                </p>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

@section('script')

{{-- <script>
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var height = $('#topbar').innerHeight();

        
        if (scroll >= 15) {
            // console.log('object');
            // $("header").addClass("fixed-top");
            $('#topbar').addClass('hide');
            $('#main-menu').removeClass('nav-bg');
            $('#main-menu').css('margin-top', '-' + height + 'px');

        } else {
            // $("header").removeClass("fixed-top");
            $('#topbar').removeClass('hide');
            $('#main-menu').addClass('nav-bg');
            $('#main-menu').css('margin-top', '-' + 0 + 'px');
        }
        // Show button after 100px
        var showAfter = 100;
        if ($(this).scrollTop() > showAfter) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });
</script> --}}

<script>
    $('#admissionCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoPlaySpeed: 5000,
            autoPlayTimeout: 5000,
            autoplayHoverPause: true,
            navText: ["<div class='nav-btn prev-slide' style='top: 135px !important;'></div>",
                "<div class='nav-btn next-slide' style='top: 135px !important;'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
</script>
<script>
    $('#researchCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            autoplay: true,
            autoPlaySpeed: 5000,
            autoPlayTimeout: 5000,
            autoplayHoverPause: true,
            navText: ["<div class='nav-btn prev-slide' style='top: 50% !important;'></div>",
                "<div class='nav-btn next-slide' style='top: 50% !important;'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
</script>
<script>
    $('#achievementCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            // autoplay: true,
            autoPlaySpeed: 5000,
            autoPlayTimeout: 5000,
            autoplayHoverPause: true,
            navText: ["<div class='nav-btn prev-slide' style='top: 50% !important;'></div>",
                "<div class='nav-btn next-slide' style='top: 50% !important;'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
</script>
@endsection