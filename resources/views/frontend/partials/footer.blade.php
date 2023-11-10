    <!-- ===== Footer section start ===== -->
    
    <footer>
      <div class="footer-top bg-secondary text-white home-footer-banner">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 col-md-6 footer-contact mt-5">
              <div class="d-flex justify-content-center align-items-center">
                @include('frontend.partials.logo.bup_footer')
                <h3 class="fs-6 fw-bolder">
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
              <li><a href="{{url('about')}}">About the University</a></li>
              <li><a href="{{url('about')}}">Mission</a></li>
              <li><a href="{{url('about')}}">Core Values</a></li>
              <li><a href="{{url('about')}}">Objectives</a></li>
              <li><a href="{{url('about')}}">Vision</a></li>
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
              <li><a href="{{url('http://apa.bup.edu.bd/')}}" target="_blank">APA</a></li>
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
                <img src="{{ asset('public/frontend/assets/img/bup/number1.jpg') }}" style="width: 45%" />
                <img src="{{ asset('public/frontend/assets/img/bup/number2.jpg') }}" style="width: 45%" />
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="bg-primary py-2 align-items-center">
        <div class="container text-white d-flex justify-content-between align-items-center">
          <div><p class="mb-0">All rights Reserved &copy; BUP, {{date('Y')}}</p></div>
          <div>
            <p class="mb-0">
              Made with heart by <a href="http://www.nanoit.biz/" target="_blank"><span style="color: orange">Nanosoft</span></a>
            </p>
          </div>
        </div>
      </div>
    </footer>
    <!-- ===== Footer section end ===== -->
