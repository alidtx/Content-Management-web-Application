<!-- ===== slider section start ===== -->
@extends('frontend.landing')

@php
$page_title = 'Campus Life';
@endphp
@section('title')
{{ $page_title }}
@endsection

@section('content')
<!-- Banner -->
@include('frontend.partials.sections.banner', ['page_title' => $page_title])

{{-- <section>
    <div class="campus-banner d-flex justify-content-center align-items-center">
        <h1 class="uppercase text-white font-poppins">Campus Life</h1>
    </div>
</section> --}}
<!-- Card Gallery -->
<section class="container mt-5">
    <div class="row gx-5 d-flex justify-content-between">
        @foreach ($on_campus_facilities as $facility)
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="campus-life-gallery">
                <div id="campus-img-div">
                    <img src="{{ asset('public/upload/on_campus/' . $facility->image) }}" class="" alt="Student Life"
                        onerror="this.onerror=null;this.src='{{ asset('public/upload/no-image.png') }}';" />
                </div>
            </div>
            <div class="mt-3">
                <h1 class="fs-6 text-secondary">BUP Library and Archive</h1>
                <h1 class="fs-6">{{ @$facility->title }}</h1>
            </div>
        </div>

        @endforeach


        {{-- <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="card-border d-flex align-items-center">
                <img class="" src="{{asset('public/frontend/assets/img/campus-life/card (4).jpg')}}" width="110%" />
            </div>
            <div class="mt-3">
                <h1 class="fs-6 text-secondary">BUP Library and Archive</h1>
                <h1 class="fs-6">Art, Exercise And Escapism In Nature</h1>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="card-border d-flex align-items-center">
                <img class="" src="{{asset('public/frontend/assets/img/campus-life/card (2).jpg')}}" width="110%" />
            </div>
            <div class="mt-3">
                <h1 class="fs-6 text-secondary">BUP Library and Archive</h1>
                <h1 class="fs-6">Art, Exercise And Escapism In Nature</h1>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="card-border d-flex align-items-center">
                <img class="" src="{{asset('public/frontend/assets/img/campus-life/card (3).jpg')}}" width="110%" />
            </div>
            <div class="mt-3">
                <h1 class="fs-6 text-secondary">BUP Library and Archive</h1>
                <h1 class="fs-6">Art, Exercise And Escapism In Nature</h1>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="card-border d-flex align-items-center">
                <img class="" src="{{asset('public/frontend/assets/img/campus-life/card (4).jpg')}}" width="110%" />
            </div>
            <div class="mt-3">
                <h1 class="fs-6 text-secondary">BUP Library and Archive</h1>
                <h1 class="fs-6">Art, Exercise And Escapism In Nature</h1>
            </div>
        </div>
        <div class="col-md-6 col-lg-4 mb-5 mb-lg-0">
            <div class="card-border d-flex align-items-center">
                <img class="" src="{{asset('public/frontend/assets/img/campus-life/card (1).jpg')}}" width="110%" />
            </div>
            <div class="mt-3">
                <h1 class="fs-6 text-secondary">BUP Library and Archive</h1>
                <h1 class="fs-6">Art, Exercise And Escapism In Nature</h1>
            </div>
        </div> --}}
    </div>
</section>
<!-- Campus Safety -->
<section class="mt-5">
    <h1 class="fs-3 fw-bold text-secondary text-center">Campus Safety</h1>
    <div
        class="container campus-safety-container bg-primary rounded-2 my-5 d-flex justify-content-around align-items-center">
        <div class="text-center text-white col-lg-3 col-md-6">
            <img src="{{asset('public/frontend/assets/img/campus-life/vector (1).png')}}">
            <h2 class="fs-1 fw-bold mb-0">120</h2>
            <p class="fw-bold">Top Experts</p>
        </div>
        <div class="text-center text-white col-lg-3 col-md-6">
            <img src="{{asset('public/frontend/assets/img/campus-life/vector (1).png')}}">
            <h2 class="fs-1 fw-bold mb-0">120</h2>
            <p class="fw-bold">Top Experts</p>
        </div>
        <div class="text-center text-white col-lg-3 col-md-6">
            <img src="{{asset('public/frontend/assets/img/campus-life/vector (1).png')}}">
            <h2 class="fs-1 fw-bold mb-0">120</h2>
            <p class="fw-bold">Top Experts</p>
        </div>
        <div class="text-center text-white col-lg-3 col-md-6">
            <img src="{{asset('public/frontend/assets/img/campus-life/vector (1).png')}}">
            <h2 class="fs-1 fw-bold mb-0">120</h2>
            <p class="fw-bold">Top Experts</p>
        </div>
    </div>
</section>
<!-- Campus Safety -->
<section class="mt-5">
    <h1 class="fs-3 fw-bold text-secondary text-center">Student Life</h1>
</section>
@endsection