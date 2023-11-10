  <!-- News -->
<div class="col-md">
    <div class="d-flex justify-content-between align-items-end">
      <h1 class="text-uppercase mb-3" style="color:#10C45C; font-size: 30px; text-shadow: 1px 2px gray;">News
      </h1>
      <a href="{{ route('news.all') }}" class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a>
    </div>
    <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
      <div class="position-absolute" style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
      </div>
    </div>
    <div class="shadow-lg p-3 mb-5 bg-light">
        @foreach($news as $n)
        <div class="d-flex justify-content-start align-items-center mt-3">
            <div class="col-lg-2 overflow-hidden">
              <a href="{{ route('news.details', $n->id) }}">
                <img class="" src="{{asset('public/upload/news/'.$n['image']) }}"
                    style="height: 70px" />
              </a>
            </div>
            <div class="col-lg-10 ms-3">
              <a href="{{ route('news.details', $n->id) }}">
                <p class="mb-0">{{date("d M Y", strtotime(@$n->date))}}</p>
                {{-- <p class="mb-0">{{@$n->author}} - {{date("d M Y",strtotime(@$n->date))}}</p> --}}
                <h1 class="fs-5">{{ Str::limit(@$n->title, 25) }}</h1>
              </a>
            </div>
        </div>
        @endforeach
      {{-- <div class="d-flex justify-content-start align-items-center mt-3">
        <div class="col-lg-2">
          <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
        </div>
        <div class="col-lg-10">
          <p class="mb-0">Craig Bator - 27 Dec 2020</p>
          <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
        </div>
      </div>
      <div class="d-flex justify-content-start align-items-center mt-3">
        <div class="col-lg-2">
          <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
        </div>
        <div class="col-lg-10">
          <p class="mb-0">Craig Bator - 27 Dec 2020</p>
          <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
        </div>
      </div>
      <div class="d-flex justify-content-start align-items-center mt-3">
        <div class="col-lg-2">
          <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
        </div>
        <div class="col-lg-10">
          <p class="mb-0">Craig Bator - 27 Dec 2020</p>
          <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
        </div>
      </div>
      <div class="d-flex justify-content-start align-items-center mt-3">
        <div class="col-lg-2">
          <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
        </div>
        <div class="col-lg-10">
          <p class="mb-0">Craig Bator - 27 Dec 2020</p>
          <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
        </div>
      </div>
      <div class="d-flex justify-content-start align-items-center mt-3">
        <div class="col-lg-2">
          <img class="" src="assets/img/home/img (5).png" style="width: 70px; height: 70px" />
        </div>
        <div class="col-lg-10">
          <p class="mb-0">Craig Bator - 27 Dec 2020</p>
          <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
        </div>
      </div> --}}
    </div>

  </div>
