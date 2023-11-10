
 <!-- Navbar -->
 <nav class="navbar navbar-expand-lg">
  <div class="container">
   <a class="navbar-brand d-flex align-items-center" href="{{ route('oefcd') }}">
        <img src="{{ asset('public/frontend/assets/img/bup/logo.png') }}" alt="Logo" width="35" height="35" class="d-inline-block align-text-top" />
        <span class="text-primary fs-6 fw-bold mb-0 mx-2 d-none d-sm-block">
            OEFCD 
        </span>
   </a>
   <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
   </button>
   <div class="collapse navbar-collapse text-uppercase" id="navbarSupportedContent">
    <ul class="navbar-nav ofecd-navbar-nav ms-auto mb-2 mb-lg-0 text-sm-center">
     <li class="nav-item">
      <a class="nav-link" href="{{route('oefcd')}}">Home</a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="{{route('oefcd.research_sponsored')}}">Research & Sponsored</a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="{{route('oefcd.project')}}">Project</a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="{{route('oefcd.collaborations')}}">Collaborations</a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="{{route('oefcd.publications')}}">Publications</a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="{{route('oefcd.oefcd_gallery')}}">Gallery</a>
     </li>
     <li class="nav-item">
      <a class="nav-link" href="{{route('oefcd.oefcd_faq')}}">FAQ</a>
     </li>
    </ul>
   </div>
  </div>
 </nav>