<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@php
    $page_title = 'Office People Profile';
@endphp
@section('title')
    {{ $page_title }}
@endsection

@section('content')
    <!-- ===== Page title section start ===== -->
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])
    <!-- ===== Page title section end ===== -->

    <!-- ===== Page content section start ===== -->
    <main class="container mt-5">
        <!-- Profile -->
        <div class="profile shadow-sm p-3 mb-5 bg-light rounded">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-2 col-md-6 profile-img">
                    <img class="rounded" src="{{ asset('public/upload/profiles/' . $profile->profile->photo) }}"
                        onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';"
                        style="width: 100%" />

                </div>
                <div class="col-10 profile-info">
                    <h1 class="fs-4 fw-bold text-primary">{{ $profile->profile->nameEn }}</h1>
                    <h1 class="fs-6">
                        <i class="bi bi-person-fill"></i><span
                            class="mx-2 text-">{{ $profile->profile->designation }}</span>
                    </h1>
                    <h1 class="fs-6">
                        <i class="bi bi-telephone-fill"></i><span class="mx-2">{{ $profile->profile->mobile }}</span>
                    </h1>
                    <h1 class="fs-6">
                        <i class="bi bi-at"></i><span class="mx-2">{{ $profile->profile->email }}</span>
                    </h1>
                    <h2 class="fs-6 fw-bolder">
                        {{ $profile->office->name }}
                    </h2>
                </div>
            </div>
            <hr />
            <div class="profile-nav nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link  active bg-light text-danger" id="pills-overview-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-overview" type="button" role="tab" aria-controls="pills-overview"
                        aria-selected="true">Overview</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link bg-light text-danger" id="pills-edu-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-edu" type="button" role="tab" aria-controls="pills-edu"
                        aria-selected="true">Education</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link bg-light text-danger" id="pills-exp-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-exp" type="button" role="tab" aria-controls="pills-exp"
                        aria-selected="true">Experience</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link bg-light text-danger" id="pills-soc-tab" data-bs-toggle="pill"
                        data-bs-target="#pills-soc" type="button" role="tab" aria-controls="pills-soc"
                        aria-selected="true">Social Media</a>
                </li>
            </div>
        </div>
        <article class="content shadow-sm p-3 mb-5 bg-light rounded">
            <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade show active" id="pills-overview" role="tabpanel"
                    aria-labelledby="pills-overview-tab" tabindex="0">
                    @foreach ($biographys as $biography)
                        {!! @$biography->Biography !!}
                    @endforeach
                </div>
                <div class="tab-pane fade" id="pills-edu" role="tabpanel" aria-labelledby="pills-edu-tab" tabindex="0">
                    @php
                        $edu = explode(";",$profile->profile->detail_education);
                        // dd($edu);
                    @endphp
                    @foreach ($edu as $item)
                        {{ $item }}<br>
                    @endforeach
                    {{-- {{ @$profile->profile->detail_education }} --}}
                </div>
                <div class="tab-pane fade" id="pills-exp" role="tabpanel" aria-labelledby="pills-exp-tab" tabindex="0">
                    {{ @$profile->profile->experience }}
                </div>
                <div class="tab-pane fade" id="pills-soc" role="tabpanel" aria-labelledby="pills-soc-tab" tabindex="0">
                    <div class="social-section d-flex">
                        <div class="faculty-social-icon text-center">
                            <a href="{{ @$social->google_scholar_link ? $social->google_scholar_link : '#' }}"><img class=""
                                    src="{{ asset('public/frontend/assets/img/faculty-of-bs/social-icon (1).png') }}"
                                    alt="icon"></a>
                        </div>
                        <div class="faculty-social-icon text-center">
                            <a href="{{ @$social->research_gate_link ? $social->research_gate_link : '#' }}"><img class=""
                                    src="{{ asset('public/frontend/assets/img/faculty-of-bs/social-icon (2).png') }}"
                                    alt="icon"></a>
                        </div>
                        <div class="faculty-social-icon text-center">
                            <a href="{{ @$social->linkedin_link ? $social->linkedin_link : '#' }}"><img class=""
                                    src="{{ asset('public/frontend/assets/img/faculty-of-bs/social-icon (3).png') }}"
                                    alt="icon"></a>
                        </div>
                        <div class="faculty-social-icon text-center">
                            <a href="{{ @$social->website_link ? $social->website_link : '#' }}"><img class=""
                                    src="{{ asset('public/frontend/assets/img/faculty-of-bs/social-icon (4).png') }}"
                                    alt="icon"></a>
                        </div>
                    </div>

                </div>
            </div>
        </article>
    </main>
    <!-- ===== Page content section end ===== -->
@endsection
