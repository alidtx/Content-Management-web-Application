<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
  @include('frontend.partials.metas')

  @include('frontend.partials.head')
</head>

<body>
  @include('frontend.partials.topbar_chsr')

  @include('frontend.partials.menus_chsr')

  <!-- Hero -->

  @include('frontend.partials.slider')

  {{-- <section>
    <div class="chsr-hero-section d-flex align-items-end">
      <div class="container ">
        <h1 class=" text-white font-poppins text-uppercase fs-4 ">leading from bangladesh</h1>
        <p class="col-lg-8 text-white font-poppins text-uppercase" style="font-size: 15px;">leading from bangladesh
          Lorem
          ipsum
          dolor, sit amet consectetur adipisicing elit. Hic rem dolore natus dignissimos magnam cupiditate, numquam
          debitis?
          Aliquid, facilis dolores?</p>

      </div>
    </div>
  </section> --}}
  <!-- Hero Title -->
  <section class="container">
    <div class=" d-flex justify-content-center align-items-center px-2 py-4 ">
      <h1 class="text-dark fs-6 mb-0">Lorem ipsum dolor sit amet consectetur adipisicing elit adipisicing elitisicing
        elit
        adipisicing elit..</h1>
    </div>
  </section>
  <!-- Phd & Mphil -->
  <section>
    <div class="chsr-Degree-section d-flex justify-content-center align-items-center ">
      <div class="container">
        <div class="row gx-5 justify-content-center">
          <div class="col-12 col-md-6 col-lg-5 mt-3 mb-5 border border-3 border-white mx-3">
            <h1 class="text-white text-center my-3" style="">MPhil</h1>
          </div>
          <div class="col-12 col-md-6 col-lg-5 mt-3 mb-5 border border-3 border-white mx-3">
            <h1 class="text-white text-center my-3" style="">Phd</h1>
          </div>
        </div>

      </div>
    </div>
  </section>
  <!-- Message from the dean chsr -->
  <section class="my-5">
    <div class="container align-items-center">
      <div class="row d-flex justify-content-between align-items-center">
        <div class="col-md col-lg-8  mt-0">
          <h1 class="text-uppercase fs-3 mb-0 fw-bold text-primary">Message from the dean chsr</h1>
          {!! @$message->short_description !!}
        </div>
        <div class="col-md col-lg-4">
          <div class="align-items-center">
            <img class="border border-5 border-primary rounded-circle"
              src="{{ asset('public/upload/profiles/' . $message->profile->photo) }}"
              onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';" height="230px"
              alt="">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Video -->
  <section class="" style="background-color:#2d3e50;">
    <div class="container">
      <div class="row d-flex justify-content-between align-items-center">
        <div class="col-12 col-lg-6 col-md-6">
            @if(!empty(@$video->youtube_link))
              <iframe src="{{@$video->youtube_link}}" max-width="90%" width="100%;" height="320px" frameborder="0" style="border:0;max-width: 100%;" allowfullscreen></iframe>
            @endif
        </div>
        <div class=" col-12 col-lg-6 col-md-6 text-white">
          {!! $about->description !!}
        </div>
      </div>
    </div>
  </section>
  <!-- Our Research Person -->
  <section>
    <div class="container mt-5">
      <h1 class=" text-danger fs-3 mb-0 text-center pb-3">Our Research Person</h1>
      <div class="row justify-content-center">
        @foreach ($supervisors as $item)
        <div class="col-12 col-md-6 col-lg-3 my-3">
          <div class="bg-danger card rounded-0 border-0" style="height: 350px;">
            <img class="card-img-top rounded-0 border-0"
              src="{{ asset('public/upload/profiles/' . @$item->profile->photo) }}"
              onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';" alt=""
              height="250px" />
            <div class="bs-social-icon position-absolute">
              <a href="#"><i class="bi bi-facebook"></i></a>
              <a href="#"><i class="bi bi-instagram"></i></a>
              <a href="#"><i class="bi bi-youtube"></i></a>
              <a href="#"><i class="bi bi-skype"></i></a>
            </div>

            <div class="card-body">
              <h5 class="card-title text-white fs-6 mt-0 text-center">
                {{ @$item->profile->nameEn }}
              </h5>
              <p class="card-text text-white text-center mb-0">
                {{ @$item->profile->designation }}
              </p>
            </div>

          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>
  <!-- Ongoing Research -->
  <section class="mt-5">
    <div class="container">
      <h1 class="text-uppercase text-info mb-3 " style="font-size: 30px; text-shadow: 1px 2px gray;">Ongoing Research</h1>
      <div class="position-relative" style="width: 100%; background-color: #94c35b; height: 1px;">
        <div class="position-absolute" style="width: 40%; background-color: #94c35b; height: 8px; margin-top: -4px;">
        </div>
      </div>
      <div class="row">
        <div class="carousel-wrap">
          <div class="owl-carousel owl-theme researchCarousel">
            @foreach ($ongoing_researches as $key=>$item)
            <div class="item">
              <div class="mt-3 mb-5">
                <div class="bg-light card border-0" style="height: 450">
                  <img class="mx-2 mt-2 rounded-2 " src="{{ asset('public/upload/journal/' . @$item->image) }}"
                    onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';" height="340"
                    alt="" />
                  <div class="card-body" style="text-align: left">
                    <h5 class="card-title fs-5 mt-2">
                      {{ Str::limit($item->title, 30) }}
                    </h5>
                    <p class="d-flex justify-content-start align-items-center my-2 mb-0"><i
                        class="bi bi-clock-history text-primary me-2 py-3 "></i>{{ date('M d, Y',
                      strtotime($item->date)) }}</i></p>
                    <p class="d-flex justify-content-start align-items-center">{{ $item->area_research }}</p>
                    <a href="#" type="button" class="btn btn-info text-white btn-sm">Read More
                    </a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>


      </div>
    </div>
  </section>
  <!-- Completed Research -->
  <section class="mt-5">
    <div class="container">
      <h1 class="text-uppercase text-info mb-3" style="font-size: 30px; text-shadow: 1px 2px gray;">Completed Research
      </h1>
      <div class=" position-relative" style="width: 100%; background-color: #94c35b; height: 1px;">
        <div class="position-absolute" style="width: 40%; background-color: #94c35b; height: 8px; margin-top: -4px;">
        </div>
      </div>
      <div class="row">
        <div class="carousel-wrap">
          <div class="owl-carousel owl-theme researchCarousel">
            @foreach ($completed_researches as $item)
            <div class="item">
              <div class="mt-3 mb-5">
                <div class="bg-light card border-0">
                  <img class="mx-2 mt-2 rounded-2 " src="src=" {{ asset('public/upload/journal/' . @$item->image) }}"
                  onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';" alt="" />
                  <div class="card-body" style="text-align: left">
                    <h5 class="card-title fs-5 mt-2">
                      {{ Str::limit($item->title, 30) }}
                    </h5>
                    <p class="d-flex justify-content-start align-items-center my-2 mb-0"><i
                        class="bi bi-clock-history text-primary me-2 py-3 "></i></i>{{ date('M d, Y',
                      strtotime($item->date))
                      }}</p>
                    <p class="d-flex justify-content-start align-items-center">{{ $item->area_research }}</p>
                    <a href="#" type="button" class="btn btn-info text-white btn-sm">Read More</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- News, Events & Notice -->
  <section>
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-md shadow-lg p-3 mb-5 bg-white rounded">
          <h1 class="bg-info text-white text-uppercase py-2 px-2 fs-3 mb-0 mt-0 " style="width: 100%;">Events</h1>
          @foreach($events as $event)
            <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="{{ route('events.details', $event->id) }}">
                  <img class="" src="{{asset('public/upload/news/'.$event['image']) }}"
                      style="width: 70px; height: 70px" />
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="{{ route('events.details', $event->id) }}" class="text-decoration-none">
                  <p class="mb-0">{{date("d M Y",strtotime(@$event->date))}}</p>
                  <h1 class="fs-5">{{Str::limit(@$event->title, 25)}}</h1>
                </a>
              </div>
            </div>
        @endforeach
        </div>
        <div class="col-lg-4 col-md shadow-lg p-3 mb-5 bg-white rounded">
          <h1 class="bg-info text-white text-uppercase py-2 px-2 fs-3 mb-0 mt-0 " style="width: 100%;">News</h1>
          @foreach($news as $event)
            <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="{{ route('events.details', $event->id) }}">
                  <img class="" src="{{asset('public/upload/news/'.$event['image']) }}"
                      style="width: 70px; height: 70px" />
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="{{ route('events.details', $event->id) }}" class="text-decoration-none">
                  <p class="mb-0">{{date("d M Y",strtotime(@$event->date))}}</p>
                  <h1 class="fs-5">{{Str::limit(@$event->title, 25)}}</h1>
                </a>
              </div>
            </div>
        @endforeach
        </div>
        <div class="col-lg-4 col-md shadow-lg p-3 mb-5 bg-white rounded">
          <h1 class="bg-info text-white text-uppercase py-2 px-2 fs-3 mb-0 mt-0 " style="width: 100%;">Notice</h1>
          @foreach($notices as $event)
            <div class="d-flex justify-content-start align-items-center mt-3">
              <div class="col-lg-2">
                <a href="{{ route('events.details', $event->id) }}">
                  <img class="" src="{{asset('public/upload/news/'.$event['image']) }}"
                      style="width: 70px; height: 70px" />
                </a>
              </div>
              <div class="col-lg-10 ms-4">
                <a href="{{ route('events.details', $event->id) }}" class="text-decoration-none">
                  <p class="mb-0">{{date("d M Y",strtotime(@$event->date))}}</p>
                  <h1 class="fs-5">{{Str::limit(@$event->title, 25)}}</h1>
                </a>
              </div>
            </div>
        @endforeach
        </div>
      </div>
    </div>
  </section>
  
  <!-- Footer -->

  @include('frontend.partials.footer_chsr')

  @include('frontend.partials.footer-script')
</body>

</html>