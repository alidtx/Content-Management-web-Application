<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
    
</head>
 

<body>
    @include('frontend.partials.topbar_oefcd')

    <!-- Navbar -->
    @include('frontend.partials.menus_oefcd')
    @php
        $page_title = "Research & Sponsored"
    @endphp
    @section('title'){{$page_title}} @endsection
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])
    <!-- Contact -->
   
   
    <div class="container"> 
        <p>coming soon..</p> 
    </div>






    @include('frontend.partials.footer_oefcd')

    @include('frontend.partials.footer-script')

  </body>

</html>