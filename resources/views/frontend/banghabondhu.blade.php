<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@section('content')
       <!-- Banner -->
    <section>
      <div class="business-banner d-flex justify-content-center">
        <div>
          <h1 class="uppercase text-white font-poppins">
            LEADING FROM BANGLADESh
          </h1>
          <p class="text-white w-50">
            For more than 50 years, NUS Business School has offered a rigorous,
            relevant and rewarding business education to outstanding students
            from across the world.
          </p>
        </div>
      </div>
    </section>
    <main>
      <!-- Profile -->
      <section class="container">
        <div class="profile p-3 mb-5 rounded mt-5">
          <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-2 col-md-6 profile-img">
              <img
                class="rounded-circle"
                src="{{ asset('public/frontend/assets/img/profile (1).jpg') }}"
                style="width: 100%"
              />
            </div>
            <div class="col-10 profile-info">
              <h1 class="fs-4 fw-bold mb-0">
                Major General Md Mahbub-ul Alam, ndc, afwc, psc, Mphil, Phd
              </h1>
              <h1 class="fs-4 fw-bold text-primary">Vice Chancellor</h1>
              <p>
                Welcome to the website of Bangladesh University of Professionals
                (BUP). BUP is one of the leading public universities established
                on June 5, 2008 with it’s motto "Excellence Through Knowledge".
                BUP is established in a lush green landscape with own unique
                features located away from busy life of metropolitan city. The
                university provides a tranquil, pollution free, secured campus
                life, with uninterrupted congenial academic atmosphere. Welcome
                to the website of Bangladesh University of Professionals (BUP).
                BUP is one of the leading public universities established on
                June 5, 2008 with it’s motto "Excellence Through Knowledge". BUP
                is established in a lush green landscape with own unique
                features located away from busy life of metropolitan city. The
                university provides a tranquil, pollution free, secured campus
                life, with uninterrupted congenial academic atmosphere.
              </p>
            </div>
          </div>
        </div>
      </section>
      <!-- Banner -->
      <section class="bb-baner-section">
        <div class="container d-flex justify-content-center align-items-center">
          <div class="mt-5">
            <h1 class="text-white font-poppins text-center">
              To Quote <br />
              Father of the Nation<br />
              Bangabandhu Sheikh Mujibur Rahman
            </h1>
            <p class="fs-5 fw-bold text-center text-white mt-3">
              “I do not say anything to intellectuals. I respect them. I would
              only say this to them that, please use your intellects for the
              welfare of the people. I do not say anything more than this”
            </p>
            <p class="mt-3 fs-5 fw-bold text-center text-white">
              (The last public address at Suhrawardy Uddan, 26 March 1975)
            </p>
          </div>
        </div>
      </section>
      <!-- Our Research Person Card -->
      <section class="container">
        <h1
          class="fs-4 fw-bold text-primary d-flex justify-content-center my-5"
        >
          <span class="text-secondary mx-2"> Our </span> Research Persons
        </h1>
        <div class="row">
          <div class="col-lg-3 car bb-card">
            <div class="bb-card-img">
              <img
                src="{{ asset('public/frontend/assets/img/bb/card (3).png') }}"
                class="d-block w-100"
                alt="..."
              />
            </div>
            <div class="bb-card-content">
              <h1 class="text-uppercase mb-0">Dr. Imranul Haque</h1>
              <p>Professor</p>
            </div>
          </div>
          <div class="col-lg-3 car bb-card">
            <div class="bb-card-img">
              <img
                src="{{ asset('public/frontend/assets/img/bb/card (4).png') }}"
                class="d-block w-100"
                alt="..."
              />
            </div>
            <div class="bb-card-content">
              <h1 class="text-uppercase mb-0">Dr. Imranul Haque</h1>
              <p>Professor</p>
            </div>
          </div>
          <div class="col-lg-3 car bb-card">
            <div class="bb-card-img">
              <img
                src="{{ asset('public/frontend/assets/img/bb/card (1).png') }}"
                class="d-block w-100"
                alt="..."
              />
            </div>
            <div class="bb-card-content">
              <h1 class="text-uppercase mb-0">Dr. Imranul Haque</h1>
              <p>Professor</p>
            </div>
          </div>
          <div class="col-lg-3 car bb-card">
            <div class="bb-card-img">
              <img
                src="{{ asset('public/frontend/assets/img/bb/card (2).png') }}"
                class="d-block w-100"
                alt="..."
              />
            </div>
            <div class="bb-card-content">
              <h1 class="text-uppercase mb-0">Dr. Imranul Haque</h1>
              <p>Professor</p>
            </div>
          </div>
        </div>
      </section>
      <!-- Banner Card -->
      <section class="container-fluid mt-5">
        <div class="business-banner-card">
          <h1
            class="uppercase text-white font-poppins mt-6 d-flex justify-content-center"
          >
            Our Departments
          </h1>
          <!-- Carousel -->
          <div id="carouselExampleIndicators" class="carousel slide mb-0">
            <div class="carousel-indicators">
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="0"
                class="active"
                aria-current="true"
                aria-label="Slide 1"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="1"
                aria-label="Slide 2"
              ></button>
              <button
                type="button"
                data-bs-target="#carouselExampleIndicators"
                data-bs-slide-to="2"
                aria-label="Slide 3"
              ></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <div class="row">
                  <div class="col-lg-4">
                    <img
                      src="{{ asset('public/frontend/assets/img/business/card.png') }}"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                  <div class="col-lg-4">
                    <img
                      src="{{ asset('public/frontend/assets/img/business/card.png') }}"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                  <div class="col-lg-4">
                    <img
                      src="{{ asset('public/frontend/assets/img/business/card.png') }}"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-lg-4">
                    <img
                      src="{{ asset('public/frontend/assets/img/business/card.png') }}"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                  <div class="col-lg-4">
                    <img
                      src="{{ asset('public/frontend/assets/img/business/card.png') }}"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                  <div class="col-lg-4">
                    <img
                      src="{{ asset('public/frontend/assets/img/business/card.png') }}"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                </div>
              </div>
              <div class="carousel-item">
                <div class="row">
                  <div class="col-lg-4">
                    <img
                      src="{{ asset('public/frontend/assets/img/business/card.png') }}"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                  <div class="col-lg-4">
                    <img
                      src="{{ asset('public/frontend/assets/img/business/card.png') }}"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                  <div class="col-lg-4">
                    <img
                      src="{{ asset('public/frontend/assets/img/business/card.png') }}"
                      class="d-block w-100"
                      alt="..."
                    />
                  </div>
                </div>
              </div>
            </div>
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#carouselExampleIndicators"
              data-bs-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
          <!-- Carousel -->
        </div>
      </section>
    </main>
@endsection