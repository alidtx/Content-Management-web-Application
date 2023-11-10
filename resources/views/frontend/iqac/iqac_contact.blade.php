@extends('frontend/partials/iqac_layout')

@php
    $page_title = "Contact"
@endphp
@section('title'){{$page_title}} @endsection
@section('content')
@include('frontend.partials.sections.banner', ['page_title' => $page_title])

  <!-- Contact -->
  <div class="container" style="margin-top: 30px;">
    <div class="row">
        <div class="col-12">
            <div class="box_shadow1 radius_all_10">
                <div class="row no-gutters">
                    <div class="col-md-4 container">	
                        <div class=" ">
                            <div class="">
                                <div class="overlay_bg_danger_90 icon_box text_white radius_all_10 background_bg animation animated fadeInUp">
                                    
                                    <div class="intro_desc">
                                        <b style="font-size: 20px;">Contact Form</b>
                                        <div class="col-md-12 animation animated fadeInLeft" data-animation="fadeInLeft" data-animation-delay="0.02s" style="animation-delay: 0.02s; opacity: 1;margin-top: 10px;">
                                            <div class="padding_eight_all">
                                                <div class="field_form">
                                                    <form method="post" action="">
                                                        @csrf
                                                        <div class="row">
                                                            <div class="form-group col-12">
                                                                <input name="name" required="required" placeholder="Full Name *" id="first-name" class="form-control" name="name" type="text">
                                                             </div><br><br><br>
                                                            <div class="form-group col-12">
                                                                <input name="email" required="required" placeholder="Email *" id="email" class="form-control" name="email" type="email">
                                                            </div><br><br><br>
                                                            <div class="form-group col-12">
                                                                <input name="phone" required="" placeholder="Phone" id="phone" class="form-control" name="phone" type="tel">
                                                            </div><br><br><br>
                                                            <div class="form-group col-12">
                                                                <input name="subject" placeholder="Subject *" id="subject" class="form-control" name="subject" type="text">
                                                            </div><br><br><br>
                                                            <div class="form-group col-lg-12">
                                                                <textarea name="message" required="required" placeholder="Message *" id="description" class="form-control" name="message" rows="3"></textarea>
                                                            </div><br><br><br><br><br>
                                                            <div class="col-lg-12">
                                                                <button class="btn btn-success" type="submit"  value="Submit">Submit</button>
                                                            </div><br><br><br>
                                                            {{-- <div class="col-lg-12 text-center">
                                                                <div id="alert-msg" class="alert-msg text-center"></div>
                                                            </div> --}}
                                                        </div>
                                                    </form>		
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8 animation animated fadeInRight" data-animation="fadeInRight" data-animation-delay="0.4s" style="animation-delay: 0.4s; opacity: 1;">
                        <b style="font-size: 16px;">Find us on map</b>
                        {{-- <div class="contact_map map_radius_rtrb overflow-hidden h-100">
                           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3652.578430063007!2d90.38622601498089!3d23.726744084600977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x9216af99d31fde46!2sDepartment%20of%20Electrical%20and%20Electronic%20Engineering%20BUET!5e0!3m2!1sen!2sbd!4v1574858123671!5m2!1sen!2sbd" width="800" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                        </div> --}}
                        <div class="contact_map map_radius_rtrb overflow-hidden h-100">
                            <iframe src="https://maps.google.com/maps?q=23.839626528920533,90.35765790749666&hl=en&z=14&amp;output=embed" width="800" height="500" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
                         </div>
                        
                         
                    </div>
                </div><br><br>
            </div>
        </div>
    </div>


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


@endsection