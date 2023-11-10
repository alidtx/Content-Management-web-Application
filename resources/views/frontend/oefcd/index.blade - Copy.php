<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
</head> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" />
<style>
  .section_two{ 
    background-image: url(public/frontend/assets/img/oefcd/bg2.jpg);
    background-color: #4db151;
    background-position: right top;
    background-repeat: repeat-y;
    background-size: 42.1%;
  }
  .lightboxContainer {
  position:relative;
  display:inline-block;
  }
  
  .lightboxContainer:after {
    content:url("public/frontend/assets/img/oefcd/playbutton.png");
    z-index:999;
    position:absolute;
    cursor: pointer;
    top:50%;
    left:50%;
    margin-left:-32px;
    margin-top:-32px;
    opacity:0.8;
  }
  
  .lightboxContainer:hover:after {
    opacity:1;
  }
  
  .lightboxContainer img {
      width: 100%; 
      height: 450px;
  }


  .section_three{ 
    background-image: url(public/frontend/assets/img/oefcd/bg3.jpg);
    background-position: right top;
    background-repeat: repeat-y;
    background-size: 42.1%;
  }
  .main-nav {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    margin: 0;
    padding: 0;
    width: 600px;
    height: 150px;
  }

  .main-nav li {
    list-style: none;
    position: absolute;
    width: 200px;
    height: 200px;
    /* background: #000; */
    transform: rotate(45deg);
    transition: 0.5s;
    margin: -100px;
    overflow: hidden;
    /* opacity: 1; */
    cursor: pointer;
  }

  .main-nav li:hover {
    opacity: 0.7;
  }

  .main-nav li.item1 {
    top: 0;
    left: 0;
  }

  .main-nav li.item2 {
    bottom: 8px;
    left: 23.6%;
  }

  .main-nav li.item3 {
    top: -5.2px;
    left: 46.3%;
  }

  .main-nav li.item4 {
    bottom: 17px;
    left: 70.2%;
  }

  .main-nav li.item5 {
    top: -7px;
    right: 37px;
  }

  .main-nav li .bg {
    width: 100%;
    height: 100%;
    /* transform: scale(1.1); */
  }
  
  .main-nav li.item1 .bg {
    background: url(public/frontend/assets/img/oefcd/d1.jpg);
    background-size: cover;
    background-position: center;
  }

  .main-nav li.item2 .bg {
    background: url(public/frontend/assets/img/oefcd/d2.jpg);
    background-size: cover;
    background-position: center;
  }

  .main-nav li.item3 .bg {
    background: url(public/frontend/assets/img/oefcd/d3.jpg);
    background-size: cover;
    background-position: center;
  }

  .main-nav li.item4 .bg {
    background: url(public/frontend/assets/img/oefcd/d4.png);
    background-size: cover;
    background-position: center;
  }

  .main-nav li.item5 .bg {
    background: url(public/frontend/assets/img/oefcd/d5.png);
    background-size: cover;
    background-position: center;
  }
 
  @media (max-width:1920px){
    .profile-img {
      padding-left: 54px;
    } 
  }
  @media (max-width:1680px){
    .profile-img {
      padding-left: 27px;
    } 
  }
  @media (max-width:1440px){
    .profile-img {
      padding-left: 0;
    } 
  }
  @media (max-width:1366px){
    .lightboxContainer img { 
      height: 450px;
    }
    .profile-img {
      padding-left: 13px;
    }  
  }
  @media (max-width:1280px){
    .profile-img {
      padding-left: 4px;
    }  
    .profile-img img {
      height: 442px;
    }
  }
  @media (max-width:1024px){
    .profile-img {
      padding-left: 0px;
    }  
    .profile-img img {
      height: 490px;
      margin-left: -5px;
    }
  @media (max-width:600px){
    .section_two {
      background-image: unset; 
    }
    .profile-img {
      padding-left: 16px;
    }
  }
</style>

<body>
    @include('frontend.partials.topbar_oefcd')

    <!-- Navbar -->
    @include('frontend.partials.menus_oefcd')

 
    <!-- Hero -->
    @include('frontend.partials.slider_oefcd')
 
  
 <!-- Profile -->
 <section class="section_two">
  <div class="container">
   <div class="profile rounded">
    <div class="row d-flex justify-content-center align-items-center">
     <div class="col-lg-7 col-md-6 profile-info my-5">
        <h1 class="fs-5 text-uppercase text-white mb-0">
        <span class="fw-bold">Ofecd</span> is
        </h1>
        <h1 class="fs-3 text-uppercase text-white fw-bold">
        Awesome
        </h1>
        <p class="text-white" style="text-align: justify;">
        Welcome to the website of Bangladesh University of Professionals
        (BUP). BUP is one of the leading public universities established
        on June 5, 2008 with it's motto "Excellence Through Knowledge".
        BUP is established in a lush green landscape with own unique
        features located away from busy life of metropolitan city. The
        university provides a tranquil, pollution free, secured campus
        life, with uninterrupted congenial academic atmosphere. Welcome
        to the website of Bangladesh University of Professionals (BUP).
        BUP is one of the leading public universities established on
        June 5, 2008 with it's motto "Excellence Through Knowledge". BUP
        is established in a lush green landscape with own unique
        features located away from busy life of metropolitan city. The
        university provides a tranquil, pollution free, secured campus
        life, with uninterrupted congenial academic atmosphere.
        </p>
        <a href="#" class="text-uppercase text-white pt-5">Explore More</a>
     </div>
      <div class="col-lg-4 col-md-6 profile-img ">
        <a class="popup-youtube" href="https://www.youtube.com/watch?v=qv7C_yp3h5E">
          <div class="lightboxContainer">
              <img src="{{ asset('public/frontend/assets/img/bb/profile.jpg') }}" />
          </div>
        </a>
      </div>
    </div>
   </div>
  </div>
 </section>
 <!-- Infographic -->
 

 <!-- daimond box -->
 <section class="section_three">
    <div class="container">
      <div class="row">
        <div class="col-lg-12" style="position: relative;height: 500px;">

          <ul class="main-nav">
            <li class="item1">
              <a href="{{route('oefcd.faculty')}}"><div class="bg"></div></a>
            </li>
            <li class="item2">
              <a href="{{route('oefcd.staff')}}"><div class="bg"><div class="bg"></div></a>
            </li>
            <li class="item3">
              <a href="{{route('oefcd.affairs')}}"><div class="bg"><div class="bg"></div></a>
            </li>
            <li class="item4">
              <a href="http://apa.bup.edu.bd/" target="_blank"> <div class="bg"></div></a>
            </li>
            <li class="item5">
              <a href="{{route('iqac')}}"><div class="bg"></div></a>
            </li>
          </ul>


        </div>
      
      </div>

    </div> 
 </section>
 <!-- News & Events -->
 <section>
  <div class="container">
   <div class="row">
    <div class="col-lg-8">
     <h1 class="fs-4 text-secondary text-uppercase mb-0 mt-3">News</h1>
     <hr class="mb-0 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: gray; height: 2px" />
     <div class="row">
      <div class="col-lg-6">
       <img class="mt-3" src="{{ asset('public/frontend/assets/img/oefcd/3.jpg') }}" style="width:352px; height:250px">
       <p class="mt-3 mb-0">27 Dec 2020</p>
       <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis nemo enim, excepturi harum nesciunt
        .</p>
      </div>
      <div class="col-lg-6">
       <img class="mt-3" src="{{ asset('public/frontend/assets/img/oefcd/5.jpg') }}" style="width:352px; height:250px">
       <p class="mt-3 mb-0">27 Dec 2020</p>
       <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
       <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Officiis nemo enim, excepturi harum nesciunt
        .</p>
      </div>
     </div>
    </div>

    <div class="col-lg-4">
     <h1 class="fs-4 text-secondary text-uppercase mt-3 mb-0">Events</h1>
     <hr class="mb-0 mt-0 d-inline-block mx-auto" style="width: 90%; background-color: gray; height: 2px" />
     <div class="d-flex justify-content-center align-items-center mt-3">
      <div class="col-lg-3">
       <img class="" src="{{ asset('public/frontend/assets/img/oefcd/1.jpg') }}" style="width: 70px; height: 70px" />
      </div>
      <div class="col-lg-9">
       <p class="mb-0">Craig Bator - 27 Dec 2020</p>
       <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
      </div>
     </div>
     <div class="d-flex justify-content-center align-items-center mt-3">
      <div class="col-lg-3">
       <img class="" src="{{ asset('public/frontend/assets/img/oefcd/4.jpg') }}" style="width: 70px; height: 70px" />
      </div>
      <div class="col-lg-9">
       <p class="mb-0">Craig Bator - 27 Dec 2020</p>
       <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
      </div>
     </div>
     <div class="d-flex justify-content-center align-items-center mt-3">
      <div class="col-lg-3">
       <img class="" src="{{ asset('public/frontend/assets/img/oefcd/2.jpg') }}" style="width: 70px; height: 70px" />
      </div>
      <div class="col-lg-9">
       <p class="mb-0">Craig Bator - 27 Dec 2020</p>
       <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
      </div>
     </div>
     <div class="d-flex justify-content-center align-items-center mt-3">
      <div class="col-lg-3">
       <img class="" src="{{ asset('public/frontend/assets/img/oefcd/6.jpg') }}" style="width: 70px; height: 70px" />
      </div>
      <div class="col-lg-9">
       <p class="mb-0">Craig Bator - 27 Dec 2020</p>
       <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
      </div>
     </div>
    </div>
   </div>
  </div>
 </section>

    <!-- Footer -->


    @include('frontend.partials.footer_oefcd')


<script>
  $(function() {
      $('.popup-youtube, .popup-vimeo').magnificPopup({
          disableOn: 700,
          type: 'iframe',
          mainClass: 'mfp-fade',
          removalDelay: 160,
          preloader: false,
          fixedContentPos: false
      });
  });
</script>

    @include('frontend.partials.footer-script')

  </body>

</html>