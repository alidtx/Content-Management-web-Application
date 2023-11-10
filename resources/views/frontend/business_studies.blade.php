<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@section('content')
     <!-- Banner -->
     <section>
      <div
        class="business-banner d-flex justify-content-center"
      >
        <div><h1 class="uppercase text-white font-poppins ">LEADING FROM BANGLADESh</h1>
        <p class="text-white w-50">For more than 50 years, NUS Business School has offered a rigorous, relevant and rewarding business education to outstanding students from across the world.</p></div>
      </div>
    </section>
    <section class="container">
      <div class=" bg-primary d-flex justify-content-between align-items-center flex-column px-2 py-4 ">
        <h1 class="text-white text-uppercase fs-6 fw-bold mb-0">Latest News</h1>
        <div>
<p class="mb-0 text-white"><i class="bi bi-back mx-2"></i>37th (Permanent) Recruitment List of c...</p>
        </div>
        <div>
<p class="mb-0 text-white"><i class="bi bi-back mx-2"></i>37th (Permanent) Recruitment List of c...</p>
        </div>
      </div>

    </section>
    <main class="container mt-3">
      <div class="container profile">
        <div class="row d-flex justify-content-center align-items-center">
          <div class="col-lg-3 col-md-6 profile-img mt-3">
            <img class="" src="{{ asset('public/frontend/assets/img/business/image 2.png') }}" style="width: 90%" />
            <p class="fw-bold mb-0 px-2">MD Moazzem Hossain</p>
            <p class="fw-bold mb-0 px-2">BGBM, (BAR), Phd</p>
          </div>
          <div class="col-9 profile-info">
            <h1 class="fs-3 fw-bold text-primary">Messege from Dean</h1>
            <p class="">
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Recusandae, dolores earum? Ipsa vitae tempora, fugiat ratione
              tenetur ipsum dolorem reiciendis?Lorem ipsum dolor sit amet
              consectetur adipisicing elit.dolor sit amet consectetur
              adipisicing elit. Recusandae, dolores earum? Ipsa vitae tempora,
              fugiat ratione tenetur ipsum dolorem reiciendis?Lorem ipsum dolor
              sit amet consectetur adipisicing elit. R Recusandae, dolores
              earum? Ipsa vitae tempora, fugiat ratione tenetur ipsum dolorem
              reiciendis?
            </p>
            <p>
              Lorem ipsum dolor sit amet consectetur adipisicing elit.
              Recusandae, dolores earum? Ipsa vitae tempora, fugiat ratione
              tenetur ipsum dolorem reiciendis?Lorem ipsum dolor sit amet
              consectetur adipisicing elit. Recusandae, dolores earum? Ipsa
              vitae tempora, fugiat ratione tenetur ipsum dolorem reiciendis?
            </p>
          </div>
        </div>
      </div>
      <!-- Program -->
      <div class="row d-flex justify-content-around gx-5 mt-5">
        <h1 class="fs-3 fw-bold text-primary mb-4">Our Program</h1>
        <div
          class="col-lg-6 d-flex justify-content-center align-items-center shadow-sm bg-primary rounded"
          style="width: 550px; height: 292px"
        >
          <div class="col-lg-9 profile-info mx-2 my-2">
            <h1 class="fs-3 fw-bold mb-2 text-uppercase">
              Undergraduate Program
            </h1>
            <p class="text-white fw-bold fs-5">
              FBS expanded its academic offer to undergraduate level. The
              admission procedure of BBA & MBA Programmes commences from
              October.
            </p>
          </div>
          <div class="col-lg-3 profile-img">
            <img
              class="rounded-circle"
              src="{{ asset('public/frontend/assets/img/business/Image (1).png') }}"
              style="width: 100%"
            />
          </div>
        </div>
        <div
          class="col-lg-6 d-flex justify-content-center align-items-center shadow-sm bg-primary rounded"
          style="width: 550px; height: 292px"
        >
          <div class="col-lg-9 profile-info mx-2 my-2">
            <h1 class="fs-3 fw-bold mb-2 text-uppercase">Graduate Program</h1>
            <p class="text-white fw-bold fs-5">
              FBS expanded its academic offer to undergraduate level. The
              admission procedure of BBA & MBA Programmes commences from
              October.
            </p>
          </div>
          <div class="col-lg-3 profile-img">
            <img
              class="rounded-circle"
              src="{{ asset('public/frontend/assets/img/business/Image (2).png') }}"
              style="width: 100%"
            />
          </div>
        </div>
      </div>
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
      <section>
        <h1 class="fs-4 fw-bold text-primary d-flex justify-content-center my-5">Our Faculty</h1>
        <div class="row">
                <div class="col-lg-3 car">
                    <div class="business-card-img">
                      <img
                      src="{{ asset('public/frontend/assets/img/business/image 13.png') }}"
                      class="d-block w-100"
                      alt="..."
                    />
                    </div>
                    <div class="business-card-content">
                      <h1 class="text-uppercase mb-0">Dr. Mohammad Zahedul Alam</h1>
                      <p>Associate Professor</p>
                    </div>

                  </div>
                <div class="col-lg-3 car">
                    <div class="business-card-img">
                      <img
                      src="{{ asset('public/frontend/assets/img/business/image 14.png') }}"
                      class="d-block w-100"
                      alt="..."
                    />
                    </div>
                    <div class="business-card-content">
                      <h1 class="text-uppercase mb-0">Dr. Mohammad Zahedul Alam</h1>
                      <p>Associate Professor</p>
                    </div>

                  </div>
                <div class="col-lg-3 car">
                    <div class="business-card-img">
                      <img
                      src="{{ asset('public/frontend/assets/img/business/image 15.png') }}"
                      class="d-block w-100"
                      alt="..."
                    />
                    </div>
                    <div class="business-card-content">
                      <h1 class="text-uppercase mb-0">Dr. Mohammad Zahedul Alam</h1>
                      <p>Associate Professor</p>
                    </div>

                  </div>
                <div class="col-lg-3 car">
                    <div class="business-card-img">
                      <img
                      src="{{ asset('public/frontend/assets/img/business/image 16.png') }}"
                      class="d-block w-100"
                      alt="..."
                    />
                    </div>
                    <div class="business-card-content">
                      <h1 class="text-uppercase mb-0">Dr. Mohammad Zahedul Alam</h1>
                      <p>Associate Professor</p>
                    </div>

                  </div>

                </div>
      </section>
      <!-- News & Events -->
      <section>
        <div class="row">
          <div class="col-lg-8">
             <h1 class="fs-4 text-secondary text-uppercase mb-0 mt-5">News</h1>
          <hr
                class="mb-0 mt-0 d-inline-block mx-auto"
                style="width: 100%; background-color: gray; height: 2px"
              />
            <div class="row">
              <div class="col-lg-6">
               <img class="mt-3" src="{{ asset('public/frontend/assets/img/business/eventimg.jpg') }}" style="width:352px; height:250px">
            <p class="mt-3 mb-0">27 Dec 2020</p>
            <p >Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis nemo enim, excepturi harum nesciunt maxime nobis amet qui ipsam, nam praesentium eius dicta tenetur commodi soluta animi quaerat similique dignissimos.</p>
            </div>
            <div class="col-lg-6">
            <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class=""
                src="{{ asset('public/frontend/assets/img/card (1).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <p class="mb-0">Craig Bator - 27 Dec 2020</p>
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class=""
                src="{{ asset('public/frontend/assets/img/card (1).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <p class="mb-0">Craig Bator - 27 Dec 2020</p>
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class=""
                src="{{ asset('public/frontend/assets/img/card (1).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <p class="mb-0">Craig Bator - 27 Dec 2020</p>
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class=""
                src="{{ asset('public/frontend/assets/img/card (1).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <p class="mb-0">Craig Bator - 27 Dec 2020</p>
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
          </div>
            </div>
          </div>

          <div class="col-lg-4">
             <h1 class="fs-4 text-secondary text-uppercase mt-5 mb-0">Events</h1>
          <hr
                class="mb-0 mt-0 d-inline-block mx-auto"
                style="width: 90%; background-color: gray; height: 2px"
              />
            <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class=""
                src="{{ asset('public/frontend/assets/img/card (1).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <p class="mb-0">Craig Bator - 27 Dec 2020</p>
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class=""
                src="{{ asset('public/frontend/assets/img/card (1).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <p class="mb-0">Craig Bator - 27 Dec 2020</p>
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class=""
                src="{{ asset('public/frontend/assets/img/card (1).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <p class="mb-0">Craig Bator - 27 Dec 2020</p>
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
            <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
              <img
                class=""
                src="{{ asset('public/frontend/assets/img/card (1).png') }}"
                style="width: 70px; height: 70px"
              />
            </div>
            <div class="col-lg-9">
              <p class="mb-0">Craig Bator - 27 Dec 2020</p>
              <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
            </div>
          </div>
          </div>
      </div>
      </section>
    </main>
@endsection
