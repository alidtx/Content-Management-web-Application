<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@section('content')
 
 <!-- Banner -->
 <section>
      <div
        class="vc-banner d-flex justify-content-center align-items-center"
      >
        <h1 class="text-uppercase text-white font-poppins">Office of the vice chancellor</h1>
      </div>
    </section>
    <main class="container mt-3">
      <h1 class="fs-4 text-primary py-3 fw-bold">People of vc Office</h1>
       <div class="profile shadow-sm p-3 mb-5 bg-light rounded">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-2 col-md-6 profile-img">
            <img
              class="rounded-circle"
              src="{{ asset('public/frontend/assets/img/profile (1).jpg') }}"
              style="width: 100%"
            />
          </div>
          <div class="col-10 profile-info">
            <h1 class="fs-4 fw-bold mb-0">Major General Md Mahbub-ul Alam, ndc, afwc, psc, Mphil, Phd</h1>
            <h1 class="fs-4 fw-bold text-primary">Vice Chancellor</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, dolores earum? Ipsa vitae tempora, fugiat ratione tenetur ipsum dolorem reiciendis?Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae, dolores earum? Ipsa vitae tempora, fugiat ratione tenetur ipsum dolorem reiciendis?</p>
          </div>
        </div>
      </div>
      <div class=" row d-flex justify-content-between g-5">
          <div class="officer-card col-lg-6 d-flex justify-content-center align-items-center shadow-sm bg-light rounded">
              <div class="col-lg-3 profile-img">
              <img
                class="rounded-circle"
                src="{{ asset('public/frontend/assets/img/profile (2).jpg') }}"
                style="width: 80%"
              />
              </div>
              <div class="col-lg-9 profile-info mx-2 my-2">
              <h1 class="fs-5 fw-bold mb-0">Major Arif Nashad</h1>
              <h1 class="fs-4 fw-bold text-primary">Ps</h1>
              <pa>Abc@bup.edu.bd</pa>
              <div class="d-flex justify-content-end px-3">
                <a href="#" class="btn btn-outline-primary">See Profile</a>
              </div>
            </div>
          </div>
          <div class="col-lg-6 d-flex justify-content-center align-items-center shadow-sm bg-light rounded">
              <div class="col-lg-3 profile-img') }}">
              <img
                class="rounded-circle"
                src="{{ asset('public/frontend/assets/img/profile (1).png') }}"
                style="width: 80%"
              />
              </div>
              <div class="col-lg-9 profile-info mx-2 my-2">
              <h1 class="fs-5 fw-bold mb-0">Major Md Shazid Hossain</h1>
              <h1 class="fs-4 fw-bold text-primary">APs</h1>
              <pa>Abc@bup.edu.bd</pa>
              <div class="d-flex justify-content-end px-3">
                <a href="#" class="btn btn-outline-primary">See Profile</a>
              </div>
            </div>
          </div>
        
        </div>
       <!-- Contact -->
      <div class="container">
        <h1 class="fs-4 text-center mt-5 mb-3 fw-bold"><span class="text-primary">Contact</span> With Us</h1>
        <div class="row d-flex justify-content-between">
        <div class=" vc-contact-card shadow p-3 mb-5 bg-white rounded" style="width: 22rem">
          <div class="card-body">
            <div class="contact-icon d-flex align-items-center"> 
              <i class="bi bi-envelope bg-primary fs-2 text-white d-flex justify-content-center align-items-center"></i>
              <h1 class="fs-4 fw-bold mx-2 text-primary">Email</h1>
            </div>
            <p class="card-text mb-0 mt-5">
              support@gmail.com
            </p>
            <p class="card-text">
              bup@gmail.com
            </p>
          </div>
        </div>
        <div class="vc-contact-card shadow p-3 mb-5 bg-white rounded" style="width: 22rem" >
          <div class="card-body">
            <div class="contact-icon d-flex align-items-center"> 
              <i class="bi bi-telephone bg-primary fs-2 text-white d-flex justify-content-center align-items-center"></i>
              <h1 class="fs-4 fw-bold mx-2 text-primary">Call Us</h1>
            </div>
            <p class="card-text mb-0 mt-5">
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
              <i class="bi bi-geo-alt bg-primary fs-2 text-white d-flex justify-content-center align-items-center"></i>
              <h1 class="fs-4 fw-bold mx-2 text-primary">Location</h1>
            </div>
            <p class="card-text mb-0 mt-5">
              support@gmail.com
            </p>
            <p class="card-text">
              bup@gmail.com
            </p>
          </div>
        </div>
      </div>
      </div>
    </main>

@endsection