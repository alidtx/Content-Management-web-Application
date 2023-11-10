@extends('frontend/partials/iqac_layout')

@php
    $page_title = "Team"
@endphp
@section('title'){{$page_title}} @endsection
@section('content')
@include('frontend.partials.sections.banner', ['page_title' => $page_title])

  <!-- Our Faculty Person -->
  <section>
    <div class="container" style="margin-top: 30px; margin-bottom: 30px;">
      {{-- <h1 class=" text-secondary fs-3 mb-0 text-center pt-3">Team</h1> --}}
      <div class="row justify-content-center">
        @foreach($teams as $team)
        <div class="col-12 col-md-6 col-lg-3 my-3">
            <div class="bg-danger card rounded-0 border-0" style="height: 360px;">
              <img class="card-img-top rounded-0 border-0" src="{{asset('public/upload/profiles/'.@$team->member->photo)}}" alt=""
                height="250px" />
              {{-- <div class="bs-social-icon position-absolute">
                <a href="#"><i class="bi bi-facebook"></i></a>
                <a href="#"><i class="bi bi-instagram"></i></a>
                <a href="#"><i class="bi bi-youtube"></i></a>
                <a href="#"><i class="bi bi-skype"></i></a>
              </div> --}}
              <div class="card-body">
                <h5 class="card-title text-white fs-6 mt-0 text-center">
                  {{@$team->member->nameEn}}
                </h5>
                <p class="card-text text-white text-center mb-0">
                    {{@$team->member->designation}}
                </p>
              </div>
            </div>
        </div>
        @endforeach
        {{-- <div class="col-12 col-md-6 col-lg-3 my-3">
          <div class="bg-danger card rounded-0 border-0" style="height: 350px;">
            <img class="card-img-top rounded-0 border-0" src="assets/img/faculty-of-bs/card (3).png" alt=""
              height="250px" />
            <div class="bs-social-icon position-absolute">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-youtube"></i></a>
              <a href="#"><i class="bi bi-skype"></i></a>
            </div>
            <div class="card-body">
              <h5 class="card-title text-white fs-6 mt-0 text-center">
                Dr. Imranul Haque
              </h5>
              <p class="card-text text-white text-center mb-0">
                Associate Professor
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 my-3">
          <div class="bg-danger card rounded-0 border-0" style="height: 350px;">
            <img class="card-img-top rounded-0 border-0" src="assets/img/faculty-of-bs/card (4).png" alt=""
              height="250px" />
            <div class="bs-social-icon position-absolute">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-youtube"></i></a>
              <a href="#"><i class="bi bi-skype"></i></a>
            </div>
            <div class="card-body">
              <h5 class="card-title text-white fs-6 mt-0 text-center">
                Dr. Imranul Haque
              </h5>
              <p class="card-text text-white text-center mb-0">
                Associate Professor
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 my-3">
          <div class="bg-danger card rounded-0 border-0" style="height: 350px;">
            <img class="card-img-top rounded-0 border-0" src="assets/img/faculty-of-bs/card (1).png" alt=""
              height="250px" />
            <div class="bs-social-icon position-absolute">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-youtube"></i></a>
              <a href="#"><i class="bi bi-skype"></i></a>
            </div>
            <div class="card-body">
              <h5 class="card-title text-white fs-6 mt-0 text-center">
                Dr. Imranul Haque
              </h5>
              <p class="card-text text-white text-center mb-0">
                Associate Professor
              </p>
            </div>
          </div>
        </div>
        <div class="col-12 col-md-6 col-lg-3 my-3">
          <div class="bg-danger card rounded-0 border-0" style="height: 350px;">
            <img class="card-img-top rounded-0 border-0" src="assets/img/faculty-of-bs/card (2).png" alt=""
              height="250px" />
            <div class="bs-social-icon position-absolute">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-youtube"></i></a>
              <a href="#"><i class="bi bi-skype"></i></a>
            </div>
            <div class="card-body">
              <h5 class="card-title text-white fs-6 mt-0 text-center">
                Dr. Imranul Haque
              </h5>
              <p class="card-text text-white text-center mb-0">
                Associate Professor
              </p>
            </div>
          </div>
        </div> --}}
      </div>
    </div>
  </section>

@endsection