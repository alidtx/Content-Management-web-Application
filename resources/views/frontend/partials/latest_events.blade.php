 
<div class="col-md-4">
    <div class="d-flex justify-content-between align-items-end">
      <h1 class="text-uppercase  mb-3 " style="color:#10C45C; font-size: 30px; text-shadow: 1px 2px gray;">Latest EVents
      </h1>
      <!-- <a href="#" class="text-uppercase text-primary mb-0 text-decoration-none fw-bold">All</a> -->
    </div>
    <div class=" position-relative" style="width: 100%; background-color: #10C45C; height: 1px;">
      <div class="position-absolute"
        style="width: 40%; background-color: #10C45C; height: 8px; margin-top: -4px;">
      </div>
    </div>
    <div class="shadow-lg p-3 mb-5 bg-light">
        @foreach($events as $event)
        <div class="d-flex latest_newsevents justify-content-start align-items-center mt-3">
            <div class="col-lg-4">
              <a href="{{ route('events.details', $event->id) }}">
                <img class="" src="{{asset('public/upload/news/'.$event['image']) }}"
                    style="width: 70px; height: 70px" />
              </a>
            </div>
            <div class="col-lg-8">
              <a href="{{ route('events.details', $event->id) }}">
                <p class="mb-0">{{@$event->author}} - {{date("d M Y",strtotime(@$event->date))}}</p>
                <h1 class="fs-5" style="overflow: hidden;">{{@$event->title}}</h1>
              </a>
            </div>
        </div>
        @endforeach 
    </div>

  </div>
