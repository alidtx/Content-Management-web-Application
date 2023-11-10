<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8" />
 <meta http-equiv="X-UA-Compatible" content="IE=edge" />
 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
 <link rel="icon" type="image/x-icon" href="{{asset('public/frontend/assets/img/bup/logo.png')}}" />
 <title>Bangladesh University of Professionals</title>
 <link rel="stylesheet" href="{{('public/frontend/assets/css/style.css')}}" />
 <link rel="stylesheet" href="{{('public/frontend/css/main.min.css')}}" />
 <link rel="stylesheet" href="{{('public/frontend/assets/owl_carousel/css/owl.carousel.min.css')}}">
<link rel="stylesheet" href="{{('public/frontend/assets/owl_carousel/css/owl.theme.default.min.css')}}">

 <!--bootstrap-icons cdn-->
 <link rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css"
  integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg=="
  crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
 <!-- Top Bar -->
 {{-- <section id="topbar" class="d-flex justify-content-center align-items-center bg-success d-none d-md-block">
  <div class=" container topbar py-2 text-end">
   <a href="#">DSpace</a>
   <a href="#">Library</a>
   <a href="#">Payment Procedure</a>
   <a href="#">Faculty Members</a>
   <a href="#">Degree Verification</a>
   <a href="#">Important Contact</a>
   <a href="#">Apply Online</a>
  </div>
 </section> --}}

 @include('frontend.partials.topbar')

 <section class="bg-secondary d-none d-sm-block">
  <div class="container d-flex justify-content-start align-items-center ">
   <img src="{{asset('public/frontend/assets/img/bup/logo.png')}}" alt="" style="width: 60px;">
   <div class="py-3">
    <h1 class="text-white text-uppercase fs-3 fw-bold mb-0 mx-2">
     Institutional Quality Assurance Cell (iqac)<br>
    </h1>
    <p class="text-white mx-2 fs-6 mb-0">BANGLADESH UNIVERSITY OF PROFESSIONALS</p>
   </div>
  </div>
 </section>
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg mt-0">
  <div class="container">
   <a class="navbar-brand " href="#">
    <img src="{{asset('public/frontend/assets/img/bup/logo.png')}}" alt="Logo" class="d-sm-block d-lg-none" />
   </a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse text-center" id="navbarSupportedContent">
    <ul class="navbar-nav text-md-center" style="color: white;">
     {{-- <li class="nav-item">
      <a class="nav-link text-uppercase" aria-current="page" href="{{route('index')}}">Home</a>
     </li> --}}
     <li class="nav-item">
      <a class="nav-link @if(session()->get('active') == "about") active @endif text-uppercase" href="{{route('iqac')}}">About</a>
     </li>
     <li class="nav-item">
      <a class="nav-link @if(session()->get('active') == "team") active @endif text-uppercase" href="{{route('iqac_team')}}">Team</a>
     </li>
     <li class="nav-item">
      <a class="nav-link @if(session()->get('active') == "activity") active @endif text-uppercase" href="#">Activity</a>
     </li>
     <li class="nav-item">
      <a class="nav-link @if(session()->get('active') == "document") active @endif text-uppercase" href="{{route('iqac_document')}}">Documents</a>
     </li>
     <li class="nav-item">
      <a class="nav-link @if(session()->get('active') == "training_workshop") active @endif text-uppercase" href="{{route('iqac_training_workshop')}}"> Training & Workshop</a>
     </li>
     <li class="nav-item">
      <a class="nav-link @if(session()->get('active') == "news_event") active @endif text-uppercase" href="{{route('iqac_news_event')}}">News & Event</a>
     </li>
     <li class="nav-item">
      <a class="nav-link @if(session()->get('active') == "faq") active @endif text-uppercase" href="{{route('iqac_faq')}}">FAQ</a>
     </li>
     <li class="nav-item">
      <a class="nav-link @if(session()->get('active') == "contact") active @endif text-uppercase" href="{{route('iqac_contact')}}">Contact</a>
     </li>
    </ul>
   </div>
  </div>
 </nav>


 @section('content')
    @show
 

 <!-- Footer -->
 {{-- <footer>
  <div class="footer-top iqac-footer text-white">
   <div class="container">
    <div class="row">
     <div class="col-lg-4 col-md-6 footer-contact mt-5">
      <div class="d-flex justify-content-center align-items-center">
       <img class="mr-2" src="{{asset('public/frontend/assets/img/bup/logo.png')}}" style="width: 20%; margin-top: -10px" />
       <h3 class="fs-6 fw-bolder ms-2">
        BANGLADESH UNIVERSITY OF PROFESSIONALS
       </h3>
      </div>
      <div class="mt-3">
       <p class="mb-0">Mirpur Cantonment, Dhaka-1216</p>
       <p class="mb-0">Phone: +8809666790790</p>
       <p class="mb-0">Fax: 88-028000443</p>
       <p class="mb-0">Email: info@bup.edu.bd</p>
      </div>
     </div>

     <div class="col-lg-3 col-md-6 footer-links mt-5">
      <li><a href="#">About the University</a></li>
      <li><a href="#">Mission</a></li>
      <li><a href="#">Core Values</a></li>
      <li><a href="#">Objectives</a></li>
      <li><a href="#">Vision</a></li>
      <li><a href="#">Research at BUP</a></li>
      <li><a href="#">Mphil & PhD Programs</a></li>
      <li><a href="#">Complete Research</a></li>
      <li><a href="#">Ongoing Research</a></li>
     </div>

     <div class="col-lg-2 col-md-6 footer-links mt-5">
      <li><a href="#">BUP Journal</a></li>
      <li><a href="#">ASHC</a></li>
      <li><a href="#">Web Mail</a></li>
      <li><a href="#">Downloads</a></li>
      <li><a href="#">Library</a></li>
      <li><a href="#">APA</a></li>
      <li><a href="#">Privacy Policy</a></li>
     </div>

     <div class="col-lg-3 col-md-6 footer-links mt-5">
      <div class="social-icon d-flex justify-content-center">
       <i class="bi bi-facebook"></i>
       <i class="bi bi-instagram"></i>
       <i class="bi bi-youtube"></i>
       <i class="bi bi-skype"></i>
      </div>
      <div class="number d-flex justify-content-between my-5">
       <img src="{{asset('public/frontend/assets/img/bup/number1.jpg')}}" style="width: 45%" />
       <img src="{{asset('public/frontend/assets/img/bup/number2.jpg')}}" style="width: 45%" />
      </div>
     </div>
    </div>
   </div>
  </div>

  <div class="bg-success py-2 align-items-center">
   <div class="container text-white d-flex justify-content-between align-items-center">
    <div>
     <p class="mb-0">All rights Reserved &copy; BUP,2022</p>
    </div>
    <div>
     <p class="mb-0">
      Made with heart by <span style="color: orange">Nanosoft</span>
     </p>
    </div>
   </div>
  </div>
 </footer> --}}

 @include('frontend.partials.footer')

 
 <script src="https://code.jquery.com/jquery-2.2.4.js"> </script>
<script src="{{asset('public/frontend/assets/owl_carousel/js/owl.carousel.js')}}"></script>     
 <script src="{{asset('public/frontend/assets/js/bootstrap.bundle.min.js')}}"></script>

    <script>
        $('.researchCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            dots: false,
            autoplay: true,
            autoPlaySpeed: 5000,
            autoPlayTimeout: 5000,
            autoplayHoverPause: true,
            navText: ["<div class='nav-btn prev-slide' style='top: 50% !important;'></div>",
                "<div class='nav-btn next-slide' style='top: 50% !important;'></div>"
            ],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 3
                }
            }
        });
    </script>
</body>

</html>