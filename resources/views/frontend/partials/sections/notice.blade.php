<div class="row ">
    <div class="col-lg-5 col-md"> 
        <h1 class="bg-primary text-white text-uppercase py-2 px-2 fs-3 mb-0 mt-0 " style="width: 100%;">Notices</h1>
       
      @foreach($notices as $notice)
        <div class="col-md my-3">
          <a href="{{ route('notice.details', $notice->id) }}">
            <p class="mb-0">{{@$notice->author}} - {{date("d M Y",strtotime(@$notice->date))}}</p>
            <h1 class="fs-5">{{@$notice->title}}</h1>
          </a>
        </div>
      @endforeach
      {{-- <div class="col-md my-3">
        <p class="mb-0">Craig Bator - 27 Dec 2020</p>
        <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
      </div>
      <div class="col-md my-3">
        <p class="mb-0">Craig Bator - 27 Dec 2020</p>
        <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
      </div>
      <div class="col-md my-3">
        <p class="mb-0">Craig Bator - 27 Dec 2020</p>
        <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
      </div>
      <div class="col-md my-3">
        <p class="mb-0">Craig Bator - 27 Dec 2020</p>
        <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
      </div>
      <div class="col-md my-3">
        <p class="mb-0">Craig Bator - 27 Dec 2020</p>
        <h1 class="fs-5">Lorem ipsum dolor sit amet consectetur</h1>
      </div> --}}
    </div>
    @php
        if(!empty($featuredVideo->youtube_link))
        {
            $str = $featuredVideo->youtube_link;
            $exp = explode('/',$str);
            $len = count($exp);
        }
    @endphp
    <div class="col-lg-7">
        {{-- <img class="" src="{{ asset('public/frontend/assets/img/home/video.png') }}" width="100%" /> --}}
        @if(!empty(@$featuredVideo->youtube_link))
            {{-- <iframe id="myVideo" preload="none" style="pointer-events:none;" width="100%;" height="350vw" src="{{ !empty($featuredVideo->youtube_link) ? $featuredVideo->youtube_link : '' }}?playlist={{ !empty($exp) ? $exp[$len-1] : '' }}&loop=1&enablejsapi=1&autoplay=1&mute=1&modestbranding=1&autohide=1&showinfo=0&controls=0" title="YouTube video player" frameborder="0" allow=""></iframe> --}}
            {{-- <iframe id="myVideo" preload="none" style="border-top-left-radius: 5000px;border-bottom-left-radius: 5000px;pointer-events:none;" width="100%;" height="350vw" src="https://www.youtube.com/embed/Fb57AZ8wBtU?playlist=Fb57AZ8wBtU&loop=1&enablejsapi=1&autoplay=1&mute=1&modestbranding=1&autohide=1&showinfo=0&controls=0" title="YouTube video player" frameborder="0" allow=""></iframe> --}}
            <iframe src="{{@$featuredVideo->youtube_link}}" max-width="90%" width="100%;" height="100%" frameborder="0" style="border:0;max-width: 100%;" allowfullscreen=""></iframe>
        @endif
    </div>
  </div>
