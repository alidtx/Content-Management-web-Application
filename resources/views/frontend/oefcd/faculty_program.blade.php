<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
</head>
 
<style> 
  .banner_img{ 
    background-image: url(../public/frontend/assets/img/oefcd/banner.jpg); 
    background-position: right top; 
    background-size: 70% 100%;
    background-color: rgba(13, 202, 76, 0.75);
  }
</style>

<body>
    @include('frontend.partials.topbar_oefcd')

    <!-- Navbar -->
    @include('frontend.partials.menus_oefcd')

  
    @include('frontend.partials.sections.banner_oefcd', ['page_title' => 'Faculty Development Programs '])
  
 <!-- Mission & Vision -->
 <section class="section_two">
    <div class="container"> 
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-md-6 profile-info my-5">  
                <h1 class="text-uppercase fs-3 mb-0 fw-bold">
                    Mission & Vision
                </h1>
                <div class="mb-0 mt-0 d-inline-block mx-auto" style="width: 100%; background-color: #86BC42; height: 8px"></div>
                <p style="text-align: justify;">
                {!! $info->mission_vision !!}
                </p>  
            </div>   
        </div> 
    </div>
 </section>
 <hr />
 <!-- Faculty Development Program -->
 <section class="section_two">
    <div class="container"> 
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-lg-12 col-md-6 profile-info my-5">  
                <h1 class="fs-3 text-uppercase fw-bold">
                Faculty Development Program
                </h1>
                <p style="text-align: justify;">
                {!! $info->content !!}
                </p>  
            </div>   
        </div> 
    </div>
 </section>
   
 

    <!-- Footer --> 

    @include('frontend.partials.footer_oefcd')

    @include('frontend.partials.footer-script')

  </body>

</html>