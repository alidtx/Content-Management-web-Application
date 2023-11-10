@extends('frontend.landing')
@php
    $page_title = "Home Page"
@endphp
@section('title'){{$page_title}} @endsection
@section('content')

 <!-- Slider Start From Here -->
 @include('frontend.partials.slider')
 <!-- Slider End Here -->

   <!-- Message from the vice chancellor -->
   <section style="background-color: #2d3e50;">
    <div class="container my-5">
      <h1 class=" text-primary text-uppercase fs-3 mb-0 fw-bold pt-3">Message from the vice
        chancellor</h1>
      <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #01803d; height: 4px"></div>
      <div class="row d-flex justify-content-between mt-0">
        <div class="col-md col-lg-8  mt-0">
          <p class="text-white">{!!$vcInfo->message!!}</p>
        </div>
        <div class="col-md col-lg-4 d-flex justify-content-center">
          <div class="mb-5 text-center">
            <img class="border border-5 border-primary" src="{{asset('public/frontend/assets/img/vc/profile (1).jpg')}}" alt=""
              style="margin-top: -100px;">
            <h5 class="card-title text-white fs-6 mt-0 text-center text-uppercase mt-3">
              Major General Md Mahbub-ul Alam ndc, afwc, psc, Mphil, Phd Vice Chancellor, BUP
            </h5>
          </div>
        </div>

      </div>
    </div>
  </section>

  
  <!-- About -->
  <section>
    <div class="container mt-5">
      <h1 class=" text-primary text-uppercase fs-3 mb-0 " style="text-shadow: 1px 2px gray;">About our university</h1>
      <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #01803d; height: 4px"></div>
      <div class="container row d-flex justify-content-between align-items-start">
        <div class="col-md col-lg-7 text-start mt-3">
          <!-- <img class=" border border-5 border-primary" src="{{asset('public/frontend/assets/img/home/img (2).png')}}" width="100%" /> -->
          <div class="">
            <div class="z-3 position-absolute p-5 rounded-3">
              <img class="border border-5 border-primary" src="{{asset('public/frontend/assets/img/bb/banner-card.jpg')}}" width="500px" />
            </div>
            <div class="z-2 position-absolute p-5 rounded-3 mx-5 mt-5">
              <img class=" border border-5 border-primary" src="{{asset('public/frontend/assets/img/home/img (2).png')}}" width="80%" />

              {{-- <img height="170px"
              src="{{ @$office->member->image ? asset('public/upload/members/' . @$office->member->image) : asset('public/frontend/dummy/user-dummy.jpeg') }}"
              onerror="this.onerror=null;this.src='{{ asset('public/frontend/dummy/user-dummy.jpeg') }}';"
              alt="Image" /> --}}
            </div>
          </div>
        </div>
        <div class="col-md col-lg-5">
          <p class="text-justify">
            {!!$aboutUni->history!!}
          </p>
          <a href="#" type="button" class="btn btn-success btn-md rounded-0">Find More
          </a>
        </div>
      </div>
    </div>
  </section>
  <!-- Academics -->
  <section>
    <div class="home-academics">
      <div class=" container">
        <h1 class=" text-primary text-uppercase fs-3 mb-0 " style="text-shadow: 1px 2px gray;">Academics</h1>
        <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #01803d; height: 4px"></div>
        <div class="row">

    @foreach ($program_cat as $item)
          <div class="col-12 col-md-6 col-lg-3 my-5">
            <div class="bg-primary bg-opacity-50 card rounded-0">
              <img class="mx-2 mt-2" src="{{asset('public/frontend/assets/img/home/img (4).png')}}" alt="" />
              <div class="card-body">
                <h5 class="card-title text-white fs-3 text-center">
                  {{$item->program_category}}
                </h5>
                <p class="card-text">
                  At present BUP conducting total {{count($item->program)}} Programs

                </p>
                <a class="text-white text-decoration-none" href="#">
                  <h1 class="text-uppercase fs-6 d-flex align-items-center justify-content-end mb-0">
                    Find More<i class="bi bi-arrow-right mx-2 fs-4"></i>
                  </h1>
                </a>
              </div>
            </div>
          </div>
          @endforeach

          {{-- <div class="col-12 col-md-6 col-lg-3 my-5">
            <div class="bg-primary bg-opacity-50 card rounded-0">
              <img class="mx-2 mt-2" src="{{asset('public/frontend/assets/img/home/img (5).png')}}" alt="" />
              <div class="card-body">
                <h5 class="card-title text-white fs-3 text-center">
                  Graduate Program
                </h5>
                <p class="card-text">
                  At present BUP conducting total 16 Programs
                </p>
                <a class="text-white text-decoration-none" href="#">
                  <h1 class="text-uppercase fs-6 d-flex align-items-center justify-content-end mb-0">
                    Find More<i class="bi bi-arrow-right mx-2 fs-4"></i>
                  </h1>
                </a>
              </div>
            </div>
          </div> --}}

          {{-- <div class="col-12 col-md-6 col-lg-3 my-5">
            <div class="bg-primary bg-opacity-50 card rounded-0">
              <img class="mx-2 mt-2" src="{{asset('public/frontend/assets/img/home/img (6).png')}}" alt="" />
              <div class="card-body">
                <h5 class="card-title text-white fs-3 text-center">
                  Postgraduate Program
                </h5>
                <p class="card-text">
                  At present BUP conducting total 16 Programs
                </p>
                <a class="text-white text-decoration-none" href="#">
                  <h1 class="text-uppercase fs-6 d-flex align-items-center justify-content-end mb-0">
                    Find More<i class="bi bi-arrow-right mx-2 fs-4"></i>
                  </h1>
                </a>
              </div>
            </div>
          </div> --}}

          {{-- <div class="col-12 col-md-6 col-lg-3 my-5">
            <div class="bg-primary bg-opacity-50 card rounded-0">
              <img class="mx-2 mt-2" src="{{asset('public/frontend/assets/img/home/img (4).png')}}" alt="" />
              <div class="card-body">
                <h5 class="card-title text-white fs-3 text-center">
                  Certificate<br> Course
                </h5>
                <p class="card-text">
                  At present BUP conducting total 16 Programs
                </p>
                <a class="text-white text-decoration-none" href="#">
                  <h1 class="text-uppercase fs-6 d-flex align-items-center justify-content-end mb-0">
                    Find More<i class="bi bi-arrow-right mx-2 fs-4"></i>
                  </h1>
                </a>
              </div>
            </div>
          </div> --}}



        </div>
      </div>
    </div>
  </section>
  <!-- Current Admissions -->
  <section>
    <div class="container">
      <h1 class=" text-primary text-uppercase fs-3 mb-0 " style="text-shadow: 1px 2px gray;">Current Admission</h1>
      <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #01803d; height: 4px"></div>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4 my-5">
          <div class="card rounded-0">
            <img class="" src="{{asset('public/frontend/assets/img/home/img (4).png')}}" alt="" />
          </div>
          <div class="d-flex justify-content-center">
            <div class="d-block p-2 bg-primary bg-opacity-75 text-white text-center position-absolute "
              style="width: 200px; margin-top: -40px;">
              <h5 class="card-title  fs-5 my-2 text-uppercase">
                Undergraduate
              </h5>
              <p class="card-text">
                Admission
              </p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 my-5">
          <div class="card rounded-0">
            <img class=" " src="{{asset('public/frontend/assets/img/home/img (4).png')}}" alt="" />
          </div>
          <div class="d-flex justify-content-center">
            <div class="d-block p-2 bg-primary bg-opacity-75 text-white text-center position-absolute "
              style="width: 200px; margin-top: -40px;">
              <h5 class="card-title  fs-5 my-2 text-uppercase">
                Graduate
              </h5>
              <p class="card-text">
                Admission
              </p>
            </div>
          </div>
        </div>

        <div class="col-12 col-md-6 col-lg-4 my-5">
          <div class="card rounded-0">
            <img class=" " src="{{asset('public/frontend/assets/img/home/img (4).png')}}" alt="" />
          </div>
          <div class="d-flex justify-content-center">
            <div class="d-block p-2 bg-primary bg-opacity-75 text-white text-center position-absolute "
              style="width: 200px; margin-top: -40px;">
              <h5 class="card-title  fs-5 my-2 text-uppercase">
                Postgraduate
              </h5>
              <p class="card-text">
                Admission
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Research in BUP -->
  <section>
    <div class="container mt-5">
      <h1 class=" text-primary text-uppercase fs-3 mb-0 " style="text-shadow: 1px 2px gray;">Research in Bup</h1>
      <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #01803d; height: 4px"></div>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4 my-5">
          <div class="card rounded-0">
            <img class=" " src="{{asset('public/frontend/assets/img/home/img (4).png')}}" alt="" />
          </div>
          <div class="d-flex justify-content-end">
            <div class="d-block p-2 bg-light bg-opacity-75 text-dark text-center position-absolute "
              style="width: 320px; margin-top: -100px;">
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam id praesentium voluptatibus animi
                accusamus, voluptas
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-5">
          <div class="card rounded-0">
            <img class=" " src="{{asset('public/frontend/assets/img/home/img (4).png')}}" alt="" />
          </div>
          <div class="d-flex justify-content-end">
            <div class="d-block p-2 bg-light bg-opacity-75 text-dark text-center position-absolute "
              style="width: 320px; margin-top: -100px;">
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam id praesentium voluptatibus animi
                accusamus, voluptas
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-5">
          <div class="card rounded-0">
            <img class=" " src="{{asset('public/frontend/assets/img/home/img (4).png')}}" alt="" />
          </div>
          <div class="d-flex justify-content-end">
            <div class="d-block p-2 bg-light bg-opacity-75 text-dark text-center position-absolute "
              style="width: 320px; margin-top: -100px;">
              <p class="card-text">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quam id praesentium voluptatibus animi
                accusamus, voluptas
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- On Campus Gallery -->
  <section>
    <div class="container">
      <h1 class=" text-primary text-uppercase fs-3 mb-0 " style="text-shadow: 1px 2px gray;">On Campus</h1>
      <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #01803d; height: 4px"></div>
      <div class="row">
        <div class="col-lg-3 col-md-12 mb-4 mb-lg-0">
          <img src="{{asset('public/frontend/assets/img/home/g (1).png')}}" class="w-100 shadow-1-strong  mb-4" alt="Boat on Calm Water" />
          <img src="{{asset('public/frontend/assets/img/home/g (1).png')}}" class="w-100 shadow-1-strong  mb-4" alt="Boat on Calm Water" />
        </div>

        <div class="col-lg-3 mb-4 mb-lg-0">
          <img src="{{asset('public/frontend/assets/img/home/g (2).png')}}" class="w-100 shadow-1-strong  mb-4" alt="Mountains in the Clouds" />
        </div>

        <div class="col-lg-3 mb-4 mb-lg-0">
          <img src="{{asset('public/frontend/assets/img/home/g (1).png')}}" class="w-100 shadow-1-strong  mb-4" alt="Waves at Sea" />
          <img src="{{asset('public/frontend/assets/img/home/g (1).png')}}" class="w-100 shadow-1-strong  mb-4" alt="Waves at Sea" />
        </div>
        <div class="col-lg-3 mb-4 mb-lg-0">
          <img src="{{asset('public/frontend/assets/img/home/g (1).png')}}" class="w-100 shadow-1-strong  mb-4" alt="Waves at Sea" />
          <img src="{{asset('public/frontend/assets/img/home/g (1).png')}}" class="w-100 shadow-1-strong  mb-4" alt="Waves at Sea" />
        </div>
      </div>
    </div>
  </section>
  <!-- Glance -->
  <section>
    <div class="glance-bg">
      <div class=" container">
        <h1 class="text-white fs-2 mb-0 text-center py-3 fw-bold">We are in <spna class="text-primary">Nmbers</spna> at
          a glance
        </h1>
        <div class="row">
          <div class="col-12 col-md-6 col-lg-3 my-3">
            <div class="bg-opacity-50 card rounded-0" style="width: 230px; height: 210px; background-color: #7EE2FF;">
              <div class="card-body">
                <h1 class="card-title text-white fw-bold text-center">
                  <i class="bi bi-people-fill" style="font-size: 60px;"></i>
                </h1>
                <h1 class="card-title text-white fw-bold text-center" style="font-size: 60px;">
                  3K
                </h1>
                <p class="card-title fw-bold text-center">
                  Students
                </p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 my-3">
            <div class="bg-opacity-50 card rounded-0" style="width: 230px; height: 210px; background-color: #7EE2FF;">
              <div class="card-body">
                <h1 class="card-title text-white fw-bold text-center">
                  <i class="bi bi-people-fill" style="font-size: 60px;"></i>
                </h1>
                <h1 class="card-title text-white fw-bold text-center" style="font-size: 60px;">
                  3K
                </h1>
                <p class="card-title fw-bold text-center">
                  Students
                </p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 my-3">
            <div class="bg-opacity-50 card rounded-0" style="width: 230px; height: 210px; background-color: #7EE2FF;">
              <div class="card-body">
                <h1 class="card-title text-white fw-bold text-center">
                  <i class="bi bi-people-fill" style="font-size: 60px;"></i>
                </h1>
                <h1 class="card-title text-white fw-bold text-center" style="font-size: 60px;">
                  3K
                </h1>
                <p class="card-title fw-bold text-center">
                  Students
                </p>
              </div>
            </div>
          </div>
          <div class="col-12 col-md-6 col-lg-3 my-3">
            <div class="bg-opacity-50 card rounded-0" style="width: 230px; height: 210px; background-color: #7EE2FF;">
              <div class="card-body">
                <h1 class="card-title text-white fw-bold text-center">
                  <i class="bi bi-people-fill" style="font-size: 60px;"></i>
                </h1>
                <h1 class="card-title text-white fw-bold text-center" style="font-size: 60px;">
                  3K
                </h1>
                <p class="card-title fw-bold text-center">
                  Students
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </section>
  <!-- Special Achievments -->
  <section class="mt-5">
    <div class="container">
      <h1 class=" text-primary text-uppercase fs-3 mb-0 " style="text-shadow: 1px 2px gray;">Special Achievments</h1>
      <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #01803d; height: 4px"></div>
      <div class="row">
        <div class="col-12 col-md-6 col-lg-4 my-5">
          <div class="bg-light card">
            <img class="mx-2 mt-2 rounded-2" src="{{asset('public/frontend/assets/img/home/img (1).png')}}" alt="" />
            <div class="card-body">
              <h5 class="card-title fs-5 mt-2">
                35 Stellar Graphics Design Blogs to Keep You Educated and Inspired
              </h5>
              <p class="d-flex justify-content-start align-items-center my-2 mb-0"><i
                  class="bi bi-clock-history text-primary me-2 py-3 "></i></i>January 25, 2023</p>
              <p class="d-flex justify-content-start align-items-center">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Nihil minus ullam harum quia suscipit accusantium iure non. Aut, facere veniam!</p>
              <a href="#" type="button" class="btn btn-primary btn-sm">Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-5">
          <div class="bg-light card">
            <img class="mx-2 mt-2 rounded-2" src="{{asset('public/frontend/assets/img/home/img (3).png')}}" alt="" />
            <div class="card-body">
              <h5 class="card-title fs-5 mt-2">
                35 Stellar Graphics Design Blogs to Keep You Educated and Inspired
              </h5>
              <p class="d-flex justify-content-start align-items-center my-2 mb-0"><i
                  class="bi bi-clock-history text-primary me-2 py-3 "></i></i>January 25, 2023</p>
              <p class="d-flex justify-content-start align-items-center">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Nihil minus ullam harum quia suscipit accusantium iure non. Aut, facere veniam!</p>
              <a href="#" type="button" class="btn btn-primary btn-sm">Read More
              </a>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4 my-5">
          <div class="bg-light card">
            <img class="mx-2 mt-2 rounded-2" src="{{asset('public/frontend/assets/img/home/img (1).png')}}" alt="" />
            <div class="card-body">
              <h5 class="card-title fs-5 mt-2">
                35 Stellar Graphics Design Blogs to Keep You Educated and Inspired
              </h5>
              <p class="d-flex justify-content-start align-items-center my-2 mb-0"><i
                  class="bi bi-clock-history text-primary me-2 py-3 "></i></i>January 25, 2023</p>
              <p class="d-flex justify-content-start align-items-center">Lorem ipsum dolor sit amet consectetur
                adipisicing elit. Nihil minus ullam harum quia suscipit accusantium iure non. Aut, facere veniam!</p>
              <a href="#" type="button" class="btn btn-primary btn-sm">Read More
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </section>
  <!-- Notice -->
  <section>
    <div class="container mt-5">
        @include('frontend.partials.sections.notice')
    </div>
  </section>
  <!-- News & Events -->
  <section>
    <div class="container mt-5">
      <div class="row align-items-center justify-content-center">
        @include('frontend.partials.sections.news')
        @include('frontend.partials.sections.events')
      </div>
    </div>
  </section>
  <!-- Affiliations -->
  <section class="container mb-5 ">
    <h1 class=" text-primary text-uppercase fs-3 mb-0 " style="text-shadow: 1px 2px gray;">affiliate institution</h1>
    <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 30%; background-color: #01803d; height: 4px"></div>

    <div class="affiliations-container bg-light rounded-2">
      <div class="row d-flex justify-content-between">
        <div class="col-lg-2 d-flex align-items-center my-3">
          <div class="text-center">
            <img src="{{asset('public/frontend/assets/img/home/brnad (1).png')}}" alt="">
            <p class="text-center">Bangladesh Military
              Academy</p>
          </div>
        </div>
        <div class="col-lg-2 d-flex align-items-center my-3">
          <div class="text-center">
            <img src="{{asset('public/frontend/assets/img/home/brnad (2).png')}}" alt="">
            <p class="text-center">Bangladesh Military
              Academy</p>
          </div>
        </div>
        <div class="col-lg-2 d-flex align-items-center my-3">
          <div class="text-center">
            <img src="{{asset('public/frontend/assets/img/home/brnad (3).png')}}" alt="">
            <p class="text-center">Bangladesh Military
              Academy</p>
          </div>
        </div>
        <div class="col-lg-2 d-flex align-items-center my-3">
          <div class="text-center">
            <img src="{{asset('public/frontend/assets/img/home/brnad (4).png')}}" alt="">
            <p class="text-center">Bangladesh Military
              Academy</p>
          </div>
        </div>
        <div class="col-lg-2 d-flex align-items-center my-3">
          <div class="text-center">
            <img src="{{asset('public/frontend/assets/img/home/brnad (5).png')}}" alt="">
            <p class="text-center">Bangladesh Military
              Academy</p>
          </div>
        </div>
        <div class="col-lg-2 d-flex align-items-center my-3">
          <div class="text-center">
            <img src="{{asset('public/frontend/assets/img/home/brnad (6).png')}}" alt="">
            <p class="text-center">Bangladesh Military
              Academy</p>
          </div>
        </div>
      </div>
    </div>

  </section>

@endsection
