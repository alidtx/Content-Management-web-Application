<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@php
    $page_title = "Officers"
@endphp
@section('title'){{$page_title}} @endsection

@section('content')
    <!-- ===== Page title section start ===== -->
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])
    <!-- Senate Chairman -->
    <section class="container mt-5">
        {{-- <h1 class=" text-secondary text-uppercase fs-3 mb-0 ">VC'S Office</h1>
        <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #8b0101; height: 4px"></div> --}}
        <div class="row">
            @foreach ($profiles as $profile)
                <div>
                    <h1 class=" text-secondary text-uppercase fs-3 mb-0 ">{{ @$profile->office->name  }}</h1>
                    <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #8b0101; height: 4px">
                    </div>
                </div>


                @php
                    $profile_names = \App\Models\PersonnelsToOffice::with('profile')
                        ->where('office_id', @$profile->office->ucam_office_id)
                        ->get();

                    // dd($profile_names);

                @endphp
                @foreach ($profile_names as $name)
                    <div class="col-12 col-md-6 col-lg-3 my-3">
                        <div class="bg-success card rounded-0 member-list-card">
                            <img class="mb-0" src="{{ asset('public/upload/profiles/' . $name->profile->photo) }}"
                                onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';"
                                alt="Image"/>
                            <div class="scm-social-icon position-absolute">
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-youtube"></i></a>
                                <a href="#"><i class="bi bi-skype"></i></a>
                            </div>
                            <div class="card-body">
                                <a href="{{ route('office.people.details', $name->id) }}">
                                    <h5 class="card-title text-white fs-6 mt-0 text-center">
                                        {{ $name->profile->nameEn }}
                                    </h5>
                                </a>
                                <p class="card-text text-white text-center">
                                    {{ $name->profile->designation }}
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endforeach
        </div>
    </section>

    <!-- ===== Page content section end ===== -->
@endsection
