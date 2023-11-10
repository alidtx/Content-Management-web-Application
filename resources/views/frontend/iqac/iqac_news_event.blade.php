@extends('frontend/partials/iqac_layout')

@php
    $page_title = "News & Event"
@endphp
@section('title'){{$page_title}} @endsection
@section('content')
@include('frontend.partials.sections.banner', ['page_title' => $page_title])
<style>
  .thumbnail p {
  color: #4f4e4e;
}
  .thumbnail a {
  text-decoration: none; 
  color: black; 
}
  .thumbnail a:hover{
  color: green; 
}
  .thumbnail a h2 {
    font-size: 1.313em;
  margin-top: 0.6em;
  margin-bottom: 0.25em;
}
.dates-calendardate {
  font-family: "PT Sans",'Helvetica Neue',Arial,Helvetica,sans-serif;
  background: #002147;
  color: #fff;
  float: left;
  line-height: 1.3; 
  padding: .7em .5em;
  text-align: center;
  text-transform: uppercase;
  width: 3em;
  top: 5px;
  position: absolute;
}
</style>
  <!-- News & Events -->
  <section>
    <div class="container mt-5">
      <div class="row">
        <div class="col-md-9">
            
          <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase  mb-3 " style="color:#10C45C; font-size: 30px; text-shadow: 1px 2px gray;">News
            </h1>
            <a href="#" class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All News</a>
          </div>
         

        </div>

        <div class="col-md-3"> 
          <div class="d-flex justify-content-between align-items-end">
              <h1 class="text-uppercase  mb-3 " style="color:#10C45C; font-size: 30px; text-shadow: 1px 2px gray;">Events
              </h1>
              <a href="#" class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All Events</a>
            </div>
             
        </div> 
      </div> 
      <div class="row">
        
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="/w3images/lights.jpg">
              <img src="https://www.ox.ac.uk/sites/files/oxford/styles/ow_listing/s3/field/field_image_main/united%20nations%20small.jpg?itok=aHegInge" alt="Lights" style="width:100%">
              <div class="caption">
              <h2>Expert Comment: No UN member, whichever continent they are in, can claim Russia's invasion does not concern them</h2>
                <p>Lorem ipsum...</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="/w3images/nature.jpg">
              <img src="https://www.ox.ac.uk/sites/files/oxford/styles/ow_listing/s3/field/field_image_main/Anastasiia12.jpeg?itok=vD0S1IH4" alt="Nature" style="width:100%">
              <div class="caption">
              <h2>How Oxford has supported Ukrainian students </h2>
                <p>Lorem ipsum...</p>
              </div>
            </a>
          </div>
        </div>
        <div class="col-md-3">
          <div class="thumbnail">
            <a href="/w3images/fjords.jpg">
              <img src="https://www.ox.ac.uk/sites/files/oxford/styles/ow_listing/s3/b_c_hoyle_370.jpg?itok=7Ygq9guf" alt="Fjords" style="width:100%">
              <div class="caption">
              <h2>Professor Carolyn Hoyle, academic, advocate, campaigner</h2>
                <p>Lorem ipsum...</p>
              </div>
            </a>
          </div>
        </div>

        <div class="col-md-3">
          <div class="d-flex justify-content-start align-items-center mt-3" style="position:relative;">
                  <div class="col-lg-3">
                    
                      <div class="dates-calendardate date-calendardate-no-end">
                        <span class="date-calendardate date-calendardate-start"> 
                          <span class="date-calendardate-day">05</span>
                          <span class="date-calendardate-month">Feb</span>
                        </span>
                      </div>
 
                  </div>
                  <div class="col-lg-9">
                    <h2 class="fs-5">String trios by Leo Weiner, Richard Strauss and Egon Wellesz</h2>
                    <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                  </div>
                </div>
                <div class="d-flex justify-content-start align-items-center mt-3" style="position:relative;">
                  <div class="col-lg-3">
                    
                    <div class="dates-calendardate date-calendardate-no-end">
                      <span class="date-calendardate date-calendardate-start"> 
                        <span class="date-calendardate-day">15</span>
                        <span class="date-calendardate-month">Feb</span>
                      </span>
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <h2 class="fs-5">Queer connections - old 'stuff', new stories?</h2>
                    <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                  </div>
                </div>
                <div class="d-flex justify-content-start align-items-center mt-3" style="position:relative;">
                  <div class="col-lg-3">
                    
                    <div class="dates-calendardate date-calendardate-no-end">
                      <span class="date-calendardate date-calendardate-start"> 
                        <span class="date-calendardate-day">23</span>
                        <span class="date-calendardate-month">Feb</span>
                      </span>
                    </div>
                  </div>
                  <div class="col-lg-9">
                    <h2 class="fs-5">Lorem ipsum dolor sit amet consectetur</h2>
                    <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                  </div>
                </div>
          </div>
      </div>
    
    </div> 
  </section>


  <section>
    <div class="container mt-5">
      <div class="row align-items-center justify-content-center">
        <div class="col-md">
          <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase  mb-3 " style="color:#10C45C; font-size: 30px; text-shadow: 1px 2px gray;">News
            </h1>
            <a href="#" class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a>
          </div>
          <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
            <div class="position-absolute"
              style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
            </div>
          </div>
          <div class="shadow-lg p-3 mb-5 bg-light">
            <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
              </div>
              <div class="col-lg-10">
                <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
              </div>
            </div>
            <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
              </div>
              <div class="col-lg-10">
                <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
              </div>
            </div>
            <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
              </div>
              <div class="col-lg-10">
                <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
              </div>
            </div>
            <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
              </div>
              <div class="col-lg-10">
                <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
              </div>
            </div>
            <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
              </div>
              <div class="col-lg-10">
                <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
              </div>
            </div>
          </div>

        </div>
        <div class="col-md">
          <div class="d-flex justify-content-between align-items-end">
            <h1 class="text-uppercase  mb-3 " style="color:#10C45C; font-size: 30px; text-shadow: 1px 2px gray;">Events
            </h1>
            <a href="#" class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a>
          </div>
          <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
            <div class="position-absolute"
              style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
            </div>
          </div>
          <div class="shadow-lg p-3 mb-5 bg-light">
            <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-2">
                <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
              </div>
              <div class="col-10">
                <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
              </div>
            </div>
            <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-2">
                <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
              </div>
              <div class="col-10">
                <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
              </div>
            </div>
            <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-2">
                <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
              </div>
              <div class="col-10">
                <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
              </div>
            </div>
            <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-2">
                <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
              </div>
              <div class="col-10">
                <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
              </div>
            </div>
            <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-2">
                <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
              </div>
              <div class="col-10">
                <p class="mb-0">Craig Bator - 27 Dec 2020</p>
                <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
              </div>
            </div>

          </div>

        </div>
      </div>
    </div>
  </section>


@endsection