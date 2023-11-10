@extends('frontend.faculty.tamplate_one.partials.main')

@section('content')
    <!-- Hero -->
    {{-- <section>
    <div class="business-hero-section d-flex align-items-center">
      <div class="container">
        <h1 class=" text-white font-poppins ">We empower you <br>
          to learn what you love.</h1>
      </div>
    </div>
  </section> --}}

    @include('frontend.partials.slider')

    <!-- Hero Title -->
    <section class="container">
        <div class=" bg-danger d-flex justify-content-between align-items-center px-2 py-4 ">
            <h1 class="text-white text-uppercase fs-6 fw-bold mb-0">Latest News</h1>
            <div>
                <p class="mb-0 text-white">250,998 people are learning with us</p>
            </div>
            <div>
                <h1 class="text-uppercase fs-6 d-flex align-items-center justify-content-end mb-0 text-white">learn More<i class="bi bi-arrow-right mx-2 fs-4"></i>
                </h1>
            </div>
        </div>
    </section>
    <!-- Program -->
    <section class="container">
        <div class="row d-flex justify-content-around gx-5 mt-5">
            @foreach ($program_cat as $program)
                <div class="col-12 col-md-6 col-lg-6 mt-3 mb-5">
                    <div style="height: 12rem; width: 17.5rem; background-color: rgba(0, 0, 0, 0.65); position: absolute; z-index: 1;">
                    </div>
                    <div class="card border-0 p-4">
                        <img class="" src="{{ asset('public/frontend/assets/img/faculty-of-bs/card.png') }}" alt="" style="z-index: 1;" />
                    </div>
                    <div class="d-flex justify-content-end">
                        <div class="d-block p-2 bg-dark bg-opacity-75 text-dark text-center position-absolute"
                            style="width: 22rem; margin-top: -6.75rem; z-index: 1;">
                            <h6 class="card-title text-info text-uppercase text-start">Undergraduate Program</h6>
                            <p class="card-text text-start text-white" style="font-size: 0.875rem">
                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam id praesentium voluptatibus animi accusamus, voluptas
                            </p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!-- Departments -->
    <section style="background: #FFEDC942;">
        <div class="container">
            <h1 class="fs-1 mb-0 text-center pt-5" id="fac-dept-section-heading">Departments</h1>
            <div class="row justify-content-center">
                @foreach ($departments as $department)
                    <div class="col-12 col-md-6 col-lg-4 mt-3 mb-5">
                        <div class="card shadow-lg bg-light rounded-3 border-0" id="fac-dept-section-card">
                            <h2 class="px-3 pt-5 text-uppercase text-center">
                                {{ $department->name }}
                            </h2>
                            <div class="d-flex justify-content-center">
                                <a href="#" type="button" class="btn btn-outline-secondary d-flex align-items-center justify-content-center learn-more-dept">Learn more</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </section>
    <!-- Our Fuculty Person -->
    <section>
        <div class="container">
            <h1 class=" text-secondary fs-3 mb-0 text-center pt-3">Our Faculty Person</h1>
            <div class="row justify-content-center">
                @foreach ($faculty_members as $member)
                    <div class="col-12 col-md-6 col-lg-3 my-3">
                        <div class="bg-danger card rounded-0 border-0" style="height: 350px;">
                            <img class="card-img-top rounded-0 border-0"
                                onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';"
                                src="{{ asset('public/upload/profiles/' . $member->profile->photo) }}" alt=""
                                height="250px" />
                            <div class="bs-social-icon position-absolute">
                                <a href="#"><i class="bi bi-facebook"></i></a>
                                <a href="#"><i class="bi bi-instagram"></i></a>
                                <a href="#"><i class="bi bi-youtube"></i></a>
                                <a href="#"><i class="bi bi-skype"></i></a>
                            </div>
                            <div class="card-body">
                                <a href="{{route('faculty_member.details', $member->id)}}">
                                    <h5 class="card-title text-white fs-6 mt-0 text-center">
                                        {{ $member->profile->nameEn }}
                                    </h5>
                                    <p class="card-text text-white text-center mb-0">
                                        {{ $member->profile->designation }}
                                    </p>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- News & Events -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h1 class="fs-4 text-secondary text-uppercase mb-0 mt-5">News</h1>
                    <hr class="mb-0 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: gray; height: 2px" />
                    <div class="row">
                        @foreach ($news as $new)
                            <div class="col-lg-6">
                                <img class="mt-3" src="{{ asset('public/upload/news/' . $new->image) }}"
                                    style="width:352px; height:250px">
                                <p class="mt-3 mb-0">{{ date('d M Y', strtotime($new->created_at)) }}</p>
                                <p>{!! $new->short_description !!}</p>
                            </div>
                        @endforeach
                    </div>
                </div>

                <div class="col-lg-4">
                    <h1 class="fs-4 text-secondary text-uppercase mt-5 mb-0">Events</h1>
                    <hr class="mb-0 mt-0 d-inline-block mx-auto" style="width: 90%; background-color: gray; height: 2px" />
                    @foreach ($events as $event)
                        <div class="d-flex justify-content-center align-items-center mt-3">
                            <div class="col-lg-3">
                                <img class="" src="{{ asset('public/upload/news/' . $event->image) }}"
                                    style="width: 70px; height: 70px" />
                            </div>
                            <div class="col-lg-9">
                                <p class="mb-0">{{date('d M Y', strtotime($event->date))}}</p>
                                <h1 class="fs-5">{{$event->title}}</h1>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Contact -->
    <section>
        <div class="container">
            <h1 class="fs-4 text-center mt-5 mb-3 fw-bold"><span class="text-secondary">Contact</span> With Us</h1>
            <div class="row d-flex justify-content-between">
                <div class=" vc-contact-card shadow p-3 mb-5 bg-white rounded" style="width: 22rem">
                    <div class="card-body">
                        <div class="contact-icon d-flex align-items-center">
                            <i
                                class="bi bi-envelope bg-secondary fs-2 text-white d-flex justify-content-center align-items-center"></i>
                            <h1 class="fs-4 fw-bold mx-2 text-secondary">Email</h1>
                        </div>
                        <p class="card-text mb-0 mt-3">
                            support@gmail.com
                        </p>
                        <p class="card-text">
                            bup@gmail.com
                        </p>
                    </div>
                </div>
                <div class="vc-contact-card shadow p-3 mb-5 bg-white rounded" style="width: 22rem">
                    <div class="card-body">
                        <div class="contact-icon d-flex align-items-center">
                            <i
                                class="bi bi-telephone bg-secondary fs-2 text-white d-flex justify-content-center align-items-center"></i>
                            <h1 class="fs-4 fw-bold mx-2 text-secondary">Call Us</h1>
                        </div>
                        <p class="card-text mb-0 mt-3">
                            support@gmail.com
                        </p>
                        <p class="card-text">
                            bup@gmail.com
                        </p>
                    </div>
                </div>
                <div class=" vc-contact-card shadow p-3 mb-5 bg-white rounded" style="width: 22rem">
                    <div class="card-body">
                        <div class="contact-icon d-flex align-items-center">
                            <i
                                class="bi bi-geo-alt bg-secondary fs-2 text-white d-flex justify-content-center align-items-center"></i>
                            <h1 class="fs-4 fw-bold mx-2 text-secondary">Location</h1>
                        </div>
                        <p class="card-text mb-0 mt-3">
                            support@gmail.com
                        </p>
                        <p class="card-text">
                            bup@gmail.com
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
