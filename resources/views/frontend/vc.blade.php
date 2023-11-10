<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@section('content')
 
<!-- Banner -->
<section>
      <div  class="vc-banner d-flex justify-content-center align-items-center">
        <h1 class="text-uppercase text-white font-poppins">Office of the vice chancellor</h1>
      </div>
    </section>
    <main class="container">
      <!-- About VC Offices -->
      <div class="row">
        <div class="col-lg-8 mt-4">
          <h1 class="fs-4 text-primary fw-bold">About VC Offices</h1>
          <h6 class="text-secondary fw-bold">
            Appointment of the Vice-Chancellor:
          </h6>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati
            eaque et officiis quam fugit illo deserunt molestiae sed perferendis
            rem, eum accusamus laborum magnam error cum ea hic vitae dolores! At
            animi ipsam, fuga soluta, asperiores quam ea nulla molestiae quaerat
            quidem quod dolor rem? Ex similique tempora quia laudantium.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati
            eaque et officiis quam fugit illo deserunt molestiae sed perferendis
            rem, eum accusamus laborum magnam error cum ea hic vitae dolores! At
            animi ipsam, fuga soluta, asperiores quam ea nulla molestiae quaerat
            quidem quod dolor rem? Ex similique tempora quia laudantium.
          </p>
          <h6 class="text-secondary fw-bold">
            Power and duties of the Vice-Chancellor:
          </h6>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati
            eaque et officiis quam fugit illo deserunt molestiae sed perferendis
            rem, eum accusamus laborum magnam error cum ea hic vitae dolores! At
            animi ipsam, fuga soluta, asperiores quam ea nulla molestiae quaerat
            quidem quod dolor rem? Ex similique tempora quia laudantium.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati
            eaque et officiis quam fugit illo deserunt molestiae sed perferendis
            rem, eum accusamus laborum magnam error cum ea hic vitae dolores! At
            animi ipsam, fuga soluta, asperiores quam ea nulla molestiae quaerat
            quidem quod dolor rem? Ex similique tempora quia laudantium.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati
            eaque et officiis quam fugit illo deserunt molestiae sed perferendis
            rem, eum accusamus laborum magnam error cum ea hic vitae dolores! At
            animi ipsam, fuga soluta, asperiores quam ea nulla molestiae quaerat
            quidem quod dolor rem? Ex similique tempora quia laudantium.
          </p>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati
            eaque et officiis quam fugit illo deserunt molestiae sed perferendis
            rem, eum accusamus laborum magnam error cum ea hic vitae dolores! At
            animi ipsam, fuga soluta, asperiores quam ea nulla molestiae quaerat
            quidem quod dolor rem? Ex similique tempora quia laudantium.
          </p>
        </div>
        <div
          class="col-lg-4 mt-5 shadow p-3 mb-5 bg-white rounded h-auto d-inline-block"
        >
          <h1 class="fs-5 text-secondary">Latest News</h1>
          <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class="rounded-circle"
                src="{{ asset('public/frontend/assets/img/card (1).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
          <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class="rounded-circle"
                src="{{ asset('public/frontend/assets/img/card (2).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
          <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class="rounded-circle"
                src="{{ asset('public/frontend/assets/img/card (1).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
          <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class="rounded-circle"
                src="{{ asset('public/frontend/assets/img/card (2).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
          <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class="rounded-circle"
                src="{{ asset('public/frontend/assets/img/card (1).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
          <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class="rounded-circle"
                src="{{ asset('public/frontend/assets/img/card (2).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
        </div>
      </div>
      <!-- Contact -->
      <div class="container">
        <h1 class="fs-4 text-center mt-5 mb-3 fw-bold"><span class="text-secondary">Contact</span> With Us</h1>
        <div class="row d-flex justify-content-between">
        <div class=" vc-contact-card shadow p-3 mb-5 bg-white rounded" style="width: 22rem">
          <div class="card-body">
            <div class="contact-icon d-flex align-items-center"> 
              <i class="bi bi-envelope bg-secondary fs-2 text-white d-flex justify-content-center align-items-center"></i>
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
        <div class="vc-contact-card shadow p-3 mb-5 bg-white rounded" style="width: 22rem" >
          <div class="card-body">
            <div class="contact-icon d-flex align-items-center"> 
              <i class="bi bi-telephone bg-secondary fs-2 text-white d-flex justify-content-center align-items-center"></i>
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
              <i class="bi bi-geo-alt bg-secondary fs-2 text-white d-flex justify-content-center align-items-center"></i>
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
    </main>

@endsection