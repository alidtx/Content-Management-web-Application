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
{{-- @include('frontend.partials.sections.banner', ['page_title' => $page_title]) --}}
<!-- ===== Page title section end ===== -->

<!-- Banner -->
<section>
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center">
        <h1 class="text-white font-poppins">{{ $profile->profile->nameEn }}</h1>
    </div>
</section>
<main class="container mt-5">
    <!-- Proffessor Profile -->
    <seciton>
        <div class="row">
            <div class="col-lg-3 ">
                <div class="shadow-sm p-3 mb-3 bg-light rounded">
                    <div class="faculty-profile-content">
                        <div class="d-flex justify-content-center">
                            {{-- <img class="rounded"
                                src="{{ asset('public/frontend/assets/img/faculty-of-bs/image 17.png') }}"
                                style="width: 80%" /> --}}
                                <img class="rounded" src="{{ asset('public/upload/profiles/' . $profile->profile->photo) }}"
                                onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';"
                                style="width: 100%" />
                        </div>
                        <div class="text-center mt-3">
                            <h1 class="text-uppercase fw-bold">{{ $profile->profile->nameEn }}</h1>
                            <p class="text-uppercase fw-bolder">{{ $profile->profile->designation }}</p>
                        </div>
                    </div>
                    <div class="social-section d-flex justify-content-center">
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
                    <p class="text-center mt-3">{{ @$profile->department->name }}<br>
                        {{ @$profile->faculty->name }}
                    </p>
                    <div class="faculty-contact">
                        <h1 class="d-flex justify-content-start align-items-center"><i
                                class="bi bi-telephone text-primary fs-3 mx-2 "></i>{{ $profile->profile->mobile }}</h1>
                        <hr>
                        <h1 class="d-flex justify-content-start align-items-center"><i
                                class="bi bi-envelope-at text-primary fs-3 mx-2 "></i>{{ $profile->profile->email }}</h1>
                        <hr>
                        <h1 class="d-flex justify-content-start align-items-center"><i
                                class="bi bi-geo-alt text-primary fs-3 mx-2 "></i>BANGLADESH UNIVERSITY OF PROFESSIONALS<br>
                            Mirpur Cantonment, Dhaka-1216</h1>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row shadow-sm p-3 mb-3 bg-light rounded g-2">
                    {{-- <div class="border-0"> --}}
                        <div class="nav nav-tabs border-0" id="myTab" role="tablist">
                            <div class="nav-item col-lg-2 col-md-6 d-flex justify-content-center" role="presentation">
                                <div class="nav-link card border-0 active" id="one-tab" data-bs-toggle="tab"
                                    data-bs-target="#one-tab-pane" type="button" role="tab" aria-controls="one-tab-pane"
                                    aria-selected="true"
                                    style="width: 120px; height: 140px; background: linear-gradient(180deg, #047C3B 0%, rgba(4, 124, 59, 0.3) 100%);">
                                    <div class="text-center mt-4">
                                        <img class="rounded"
                                            src="{{ asset('public/frontend/assets/img/faculty-of-bs/icon (6).png') }}"
                                            alt="icon">
                                        <h1 class="card-title fs-6 text-center text-white mt-2">Biography</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-item col-lg-2 col-md-6 d-flex justify-content-center" role="presentation">
                                <div class="nav-link card border-0" id="two-tab" data-bs-toggle="tab"
                                    data-bs-target="#two-tab-pane" type="button" role="tab" aria-controls="two-tab-pane"
                                    aria-selected="false"
                                    style="width: 120px; height: 140px; background: linear-gradient(180deg, #047C3B 0%, rgba(4, 124, 59, 0.3) 100%);">
                                    <div class="text-center mt-4">
                                        <img class="rounded"
                                            src="{{ asset('public/frontend/assets/img/faculty-of-bs/icon (5).png') }}"
                                            alt="icon">
                                        <h1 class="card-title fs-6 text-center text-white mt-2">Education</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-item col-lg-2 col-md-6 d-flex justify-content-center" role="presentation">
                                <div class="nav-link card border-0" id="three-tab" data-bs-toggle="tab"
                                    data-bs-target="#three-tab-pane" type="button" role="tab" aria-controls="three-tab-pane"
                                    aria-selected="false"
                                    style="width: 120px; height: 140px; background: linear-gradient(180deg, #047C3B 0%, rgba(4, 124, 59, 0.3) 100%);">
                                    <div class="text-center mt-4">
                                        <img class="rounded"
                                            src="{{ asset('public/frontend/assets/img/faculty-of-bs/icon (4).png') }}"
                                            alt="icon">
                                        <h1 class="card-title fs-6 text-center text-white mt-2">Publication</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-item col-lg-2 col-md-6 d-flex justify-content-center" role="presentation">
                                <div class="nav-link card border-0" id="four-tab" data-bs-toggle="tab"
                                    data-bs-target="#four-tab-pane" type="button" role="tab" aria-controls="four-tab-pane"
                                    aria-selected="false"
                                    style="width: 120px; height: 140px; background: linear-gradient(180deg, #047C3B 0%, rgba(4, 124, 59, 0.3) 100%);">
                                    <div class="text-center mt-4">
                                        <img class="rounded"
                                            src="{{ asset('public/frontend/assets/img/faculty-of-bs/icon (3).png') }}"
                                            alt="icon">
                                        <h1 class="card-title fs-6 text-center text-white">Research Activites</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-item col-lg-2 col-md-6 d-flex justify-content-center" role="presentation">
                                <div class="nav-link card border-0" id="five-tab" data-bs-toggle="tab"
                                    data-bs-target="#five-tab-pane" type="button" role="tab" aria-controls="five-tab-pane"
                                    aria-selected="false"
                                    style="width: 120px; height: 140px; background: linear-gradient(180deg, #047C3B 0%, rgba(4, 124, 59, 0.3) 100%);">
                                    <div class="text-center mt-4">
                                        <img class="rounded"
                                            src="{{ asset('public/frontend/assets/img/faculty-of-bs/icon (2).png') }}"
                                            alt="icon">
                                        <h1 class="card-title fs-6 text-center text-white mt-2">Awards</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-item col-lg-2 col-md-6 d-flex justify-content-center" role="presentation">
                                <div class="nav-link card border-0" id="six-tab" data-bs-toggle="tab"
                                    data-bs-target="#six-tab-pane" type="button" role="tab" aria-controls="six-tab-pane"
                                    aria-selected="false"
                                    style="width: 120px; height: 140px; background: linear-gradient(180deg, #047C3B 0%, rgba(4, 124, 59, 0.3) 100%);">
                                    <div class="text-center mt-4">
                                        <img class="rounded"
                                            src="{{ asset('public/frontend/assets/img/faculty-of-bs/icon (1).png') }}"
                                            alt="icon">
                                        <h1 class="card-title fs-6 text-center text-white mt-2">Course Taught</h1>
                                    </div>
                                </div>
                            </div>
                        </div>
                    {{-- </div> --}}
                </div>
                <div class="tab-content shadow-sm p-3 mb-5 bg-light rounded" id="myTabContent">
                    <div class="tab-pane fade show active" id="one-tab-pane" role="tabpanel"
                        aria-labelledby="one-tab" tabindex="0">

                        @foreach ($biographys as $biography)
                            {!! @$biography->Biography !!}
                        @endforeach

                    </div>

                    <div class="tab-pane fade" id="two-tab-pane" role="tabpanel" aria-labelledby="two-tab"
                        tabindex="0">
                        @php
                            $edu = explode(";",$profile->profile->detail_education);
                            // dd($edu);
                        @endphp
                        @foreach ($edu as $item)
                            {{ $item }}<br>
                        @endforeach
                        {{-- {{ @$profile->profile->detail_education }} --}}
                    </div>

                    <div class="tab-pane fade" id="three-tab-pane" role="tabpanel" aria-labelledby="three-tab"
                        tabindex="0">
                        <div class="shadow-sm p-3 mb-5 bg-light rounded">
                            <div class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link  active" id="pills-journal-tab" data-bs-toggle="pill"
                                        data-bs-target="#pills-journal" type="button" role="tab" aria-controls="pills-journal"
                                        aria-selected="true">Journal Publication</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-conference-tab" data-bs-toggle="pill" data-bs-target="#pills-conference"
                                        type="button" role="tab" aria-controls="pills-conference" aria-selected="true">Conference
                                        Papers</a>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link" id="pills-book-tab" data-bs-toggle="pill" data-bs-target="#pills-book"
                                        type="button" role="tab" aria-controls="pills-book" aria-selected="true">Books</a>
                                </li>
                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-journal" role="tabpanel"
                                    aria-labelledby="pills-journal-tab" tabindex="0">
                                    @foreach ($journals as $journal)
                                        {!! @$journal->JournalDetail !!}
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="pills-conference" role="tabpanel" aria-labelledby="pills-conference-tab"
                                    tabindex="0">
                                    @foreach ($conferences as $conference)
                                        {!! @$conference->ConferenceDetail !!}
                                    @endforeach
                                </div>
                                <div class="tab-pane fade" id="pills-book" role="tabpanel" aria-labelledby="pills-book-tab"
                                    tabindex="0">
                                    @foreach ($books as $book)
                                        {!! @$book->BookDetail !!}
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="tab-pane fade" id="four-tab-pane" role="tabpanel" aria-labelledby="four-tab"
                        tabindex="0">
                        @foreach ($researchs as $research)
                            {!! @$research->ResearchAreasOrInterest !!}
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="five-tab-pane" role="tabpanel" aria-labelledby="five-tab"
                    tabindex="0">
                        @foreach ($awards as $award)
                            {!! @$award->AwardHonor !!}
                        @endforeach
                    </div>

                    <div class="tab-pane fade" id="six-tab-pane" role="tabpanel" aria-labelledby="six-tab"
                        tabindex="0">
                        @foreach ($courses as $course)
                            {!! @$course->CourseTaught !!}
                        @endforeach

                    </div>
                </div>

            </div>
        </div>
    </seciton>
</main>
@endsection
