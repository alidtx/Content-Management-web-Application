<div class="header">
  <div class="fixed-top">
    <!-- Top Bar -->
    <section id="topbar" class="bg-secondary d-flex justify-content-center align-items-center d-none d-md-block">
      <div class="container d-flex justify-content-end align-items-center topbar">
        <a href="#" class="fw-bold">Students</a>
        <a href="#" class="fw-bold">Faculty & Staff</a>
        <a href="#" class="fw-bold">Alumni</a>
      </div>
    </section>

    <nav class="navbar navbar-expand-lg bg-success" id="main-menu">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="{{ route('bangabandhu_chair') }}">
          <img src="{{ asset('public/frontend/assets/img/bup/logo.png') }}" alt="Logo"
            class="d-inline-block align-text-top" />
          <span class="text-white fs-6 fw-bold mb-0 mx-2 text-uppercase">Bangabandhu Chair <br />At Bup</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-uppercase" id="navbarSupportedContent">
          <ul class="navbar-nav bb-navbar-nav ms-auto mb-2 mb-lg-0 text-white text-sm-center">
            {{-- <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li> --}}
            <li class="nav-item">
              <a class="nav-link" href="{{ route('bangabandhu_chair.research') }}">Research & Sponsored</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('bangabandhu_chair.project') }}">Project</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('bangabandhu_chair.collaboration') }}">Collaborations</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('bangabandhu_chair.publication') }}">Publications</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('bangabandhu_chair.gallery') }}">Gallery</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

  </div>
</div>