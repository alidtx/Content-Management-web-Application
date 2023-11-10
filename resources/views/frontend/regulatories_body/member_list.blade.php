<!-- ===== slider section start ===== -->
@extends('frontend.landing')
<style>
    .scm-hero {
    height: 250px;
    background-image: linear-gradient(
            rgba(13, 202, 76, 0.75),
            rgba(1, 39, 11, 0.75)
        ),
        url({{ @$banner->image ? asset('public/upload/banner/'. $banner->image ): '' }});
}
</style>
@php
$page_title = $committee->name;
@endphp
@section('title'){{$page_title}} @endsection
@section('content')
<!-- ===== Page title section start ===== -->
<section>
    <div class="scm-hero d-flex justify-content-center align-items-center">
        <h1 class="text-uppercase text-white font-poppins">{{ $page_title }}</h1>
    </div>
</section>
<!-- Senate Chairman -->
<section class="container mt-5 ">
    @foreach ($members as $member)
    @if ($member->post_id == 2)
    <h1 class="text-secondary text-uppercase fs-3 mb-0 ">Chairman</h1>
    <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 14%; background-color: #8b0101; height: 4px"></div>
    @break
    @endif
    @endforeach
    <div class="row justify-content-center">
        @foreach ($members as $member)
        @if ($member->post_id == 2)
        {{-- @dd($member) --}}
        <div class="col-12 col-md-6 col-lg-3 my-3">
            <div class="bg-success card rounded-0 member-list-card">
                <img class="mb-0" src="{{ asset('public/upload/profiles/' . $member->profile->photo) }}"
                    onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';" alt="Image" />
                <div class="scm-social-icon position-absolute">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                    <a href="#"><i class="bi bi-skype"></i></a>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-white fs-6 mt-0 text-center">
                        {{$member->profile->nameEn}}
                    </h5>
                    <p class="card-text text-white text-center">
                        {{$member->profile->designation}} BUP
                    </p>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

</section>
<!-- Senate Member  -->
<section class="container mt-5 ">
    @foreach ($members as $member)
    @if ($member->post_id == 4)
    <h1 class=" text-secondary text-uppercase fs-3 mb-0 ">Member</h1>
    <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 12%; background-color: #8b0101; height: 4px"></div>
    @break
    @endif
    @endforeach
    <div class="row justify-content-center">
        @foreach ($members as $member)
        @if ($member->post_id == 4)
        {{-- @dd($member) --}}
        <div class="col-12 col-md-6 col-lg-3 my-3">
            <div class="bg-success card rounded-0 member-list-card">
                <img class="mb-0" src="{{ asset('public/upload/profiles/' . $member->profile->photo) }}"
                    onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';" alt="Image" />
                <div class="scm-social-icon position-absolute">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                    <a href="#"><i class="bi bi-skype"></i></a>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-white fs-6 mt-0 text-center">
                        {{$member->profile->nameEn}}
                    </h5>
                    <p class="card-text text-white text-center">
                        {{$member->profile->designation}} BUP
                    </p>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

</section>
<!-- Senate Secretary -->
<section class="container my-5 ">
    @foreach ($members as $member)
    @if ($member->post_id == 3)
    <h1 class=" text-secondary text-uppercase fs-3 mb-0 ">Secretary</h1>
    <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 14%; background-color: #8b0101; height: 4px"></div>
    @break
    @endif
    @endforeach
    <div class="row justify-content-center">
        @foreach ($members as $member)
        @if ($member->post_id == 3)
        {{-- @dd($member) --}}
        <div class="col-12 col-md-6 col-lg-3 my-3">
            <div class="bg-success card rounded-0 member-list-card">
                <img class="mb-0" src="{{ asset('public/upload/profiles/' . $member->profile->photo) }}"
                    onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';" alt="Image" />
                <div class="scm-social-icon position-absolute">
                    <a href="#"><i class="bi bi-facebook"></i></a>
                    <a href="#"><i class="bi bi-instagram"></i></a>
                    <a href="#"><i class="bi bi-youtube"></i></a>
                    <a href="#"><i class="bi bi-skype"></i></a>
                </div>
                <div class="card-body">
                    <h5 class="card-title text-white fs-6 mt-0 text-center">
                        {{$member->profile->nameEn}}
                    </h5>
                    <p class="card-text text-white text-center">
                        {{$member->profile->designation}} BUP
                    </p>
                </div>
            </div>
        </div>
        @endif
        @endforeach
    </div>

</section>
<!-- ===== Page content section end ===== -->
@endsection