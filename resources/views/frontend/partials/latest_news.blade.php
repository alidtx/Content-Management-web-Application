<div class="col-lg-4 mt-5 shadow p-3 mb-5 bg-white rounded h-auto d-inline-block">
      <h1 class="fs-5 text-secondary">Latest News</h1>

      @foreach($news as $n)
        <div class="d-flex justify-content-center align-items-center mt-3">
            <div class="col-lg-3">
                <a href="{{ route('news.details', $n->id) }}">
                  <img class="rounded-circle"  src="{{asset('public/upload/news/'.$n['image']) }}" style="width: 70px; height: 70px" />
                </a>
              </div>
              <div class="col-lg-9"> 
                <a href="{{ route('news.details', $n->id) }}">
                  <p class="mb-0">{{@$n->author}} - {{date("d M Y",strtotime(@$n->date))}}</p>
                  <h1 class="fs-5" style="overflow: hidden;">{{@$n->title}}</h1>
                </a>
              </div>
        </div>  
      @endforeach
</div> 