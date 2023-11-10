<div class="header">
  <div class="fixed-top">
    <!-- Top Bar -->
    <section id="topbar" class="d-flex align-items-center bg-secondary d-none d-md-block">
      <div class="container topbar text-end">
        <a href="#" class="fw-bold">Student</a>
        <a href="#" class="fw-bold">Faculty & Staff</a>
        <a href="#" class="fw-bold">Alumni</a>
      </div>
    </section>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg" id="main-menu">
      <div class="container">
        <a class="navbar-brand d-flex align-items-center " href="#">
          @include('frontend.partials.logo.bup_header')
          <span class="text-secondary text-uppercase fs-6 fw-bold mb-0 mx-2 d-none d-sm-block">{{$faculty_name}}</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-sm-center">
            <li class="nav-item">
              <a class="nav-link active text-uppercase" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item dropdown dropdown-hover position-static">
              <a class="nav-link text-uppercase" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="true">
                research & publication<spn class=" ms-2 dropdown-toggle d-lg-none"></spn>
              </a>
              <div class="dropdown-menu w-100 mt-0 border-0 rounded-0" aria-labelledby="navbarDropdown"
                style="border-top-left-radius: 0;border-top-right-radius: 0;">
                <div class="container">
                  <div class="row my-4">
                    <div class="col-md-6 col-lg-4 mb-3 mb-lg-0 ">
                      <div class="list-group list-group-flush">
                        <a href="" class="list-group-item list-group-item-action">Lorem ipsum</a>
                        <a href="" class="list-group-item list-group-item-action">Dolor sit</a>
                        <a href="" class="list-group-item list-group-item-action">Amet consectetur</a>
                        <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                        <a href="" class="list-group-item list-group-item-action">Adipisicing elit</a>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-3 mb-md-0">
                      <div class="list-group list-group-flush">
                        <a href="" class="list-group-item list-group-item-action">Iste quaerato</a>
                        <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                        <a href="" class="list-group-item list-group-item-action">Est iure</a>
                        <a href="" class="list-group-item list-group-item-action">Praesentium</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>

                      </div>
                    </div>
                    <div class="col-md-6 col-lg-4 mb-3 mb-md-0">
                      <div class="list-group list-group-flush">
                        <a href="" class="list-group-item list-group-item-action">Iste quaerato</a>
                        <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                        <a href="" class="list-group-item list-group-item-action">Est iure</a>
                        <a href="" class="list-group-item list-group-item-action">Praesentium</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class=" nav-item dropdown dropdown-hover position-static">
              <a class="nav-link text-uppercase" href="#" id="navbarDropdown">Notice<spn
                  class=" ms-2 dropdown-toggle d-lg-none ">
                </spn></a>
              <div class="dropdown-menu w-100 mt-0 border-0 rounded-0" aria-labelledby="navbarDropdown"
                style="border-top-left-radius: 0;border-top-right-radius: 0;">
                <div class="container">
                  <div class="row my-4">
                    <div class="col-md-6 col-lg-3 mb-3 mb-lg-0 ">
                      <div class="list-group list-group-flush">
                        <a href="" class="list-group-item list-group-item-action">Lorem ipsum</a>
                        <a href="" class="list-group-item list-group-item-action">Dolor sit</a>
                        <a href="" class="list-group-item list-group-item-action">Amet consectetur</a>
                        <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                        <a href="" class="list-group-item list-group-item-action">Adipisicing elit</a>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                      <div class="list-group list-group-flush">
                        <a href="" class="list-group-item list-group-item-action">Iste quaerato</a>
                        <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                        <a href="" class="list-group-item list-group-item-action">Est iure</a>
                        <a href="" class="list-group-item list-group-item-action">Praesentium</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3 mb-3 mb-md-0">
                      <div class="list-group list-group-flush">
                        <a href="" class="list-group-item list-group-item-action">Iste quaerato</a>
                        <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                        <a href="" class="list-group-item list-group-item-action">Est iure</a>
                        <a href="" class="list-group-item list-group-item-action">Praesentium</a>
                        <a href="" class="list-group-item list-group-item-action">Laboriosam</a>
                      </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                      <div class="list-group list-group-flush">
                        <a href="" class="list-group-item list-group-item-action">Cras justo odio</a>
                        <a href="" class="list-group-item list-group-item-action">Saepe</a>
                        <a href="" class="list-group-item list-group-item-action">Vel alias</a>
                        <a href="" class="list-group-item list-group-item-action">Sunt doloribus</a>
                        <a href="" class="list-group-item list-group-item-action">Cum dolores</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link text-uppercase" href="#">Department</a>
            </li>
            {{-- <li class="nav-item">
              <a class="nav-link text-uppercase" href="#">Research</a>
            </li> --}}
          </ul>
        </div>
      </div>
    </nav>
  </div>
</div>