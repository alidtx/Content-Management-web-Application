<footer>
  <div class="footer-top bg-secondary text-white">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-md-6 footer-contact mt-5 d-flex justify-content-start align-items-start">
          @include('frontend.partials.logo.bup_footer')

          <div class="ms-2">
            <h1 class="fs-5 fw-bolder text-uppercase">
              Center of higher study and research
            </h1>
            <h3 class="fs-6 fw-bolder">
              BANGLADESH UNIVERSITY OF <br> PROFESSIONALS
            </h3>
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

        <div class="col-lg-3 col-md-6 footer-links mt-5">
          <div class="social-icon d-flex justify-content-center">
            <i class="bi bi-facebook"></i>
            <i class="bi bi-instagram"></i>
            <i class="bi bi-youtube"></i>
            <i class="bi bi-skype"></i>
          </div>
          <div class="number d-flex justify-content-between my-5">
            <img src="{{ asset('public/frontend/assets/img/bup/number1.jpg') }}" style="width: 45%" />
            <img src="{{ asset('public/frontend/assets/img/bup/number2.jpg') }}" style="width: 45%" />
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-success py-4 align-items-center">
    <div class="container text-white d-flex justify-content-between align-items-center">
      <div>
        <p class="mb-0">All rights Reserved &copy; BUP, {{ date('Y') }}</p>
      </div>
      <div>
        <p class="mb-0">
          Made with heart by <a href="http://www.nanoit.biz/" target="__blank"><span style="color: orange">Nanosoft</span></a>
        </p>
      </div>
    </div>
  </div>
</footer>
