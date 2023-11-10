 <!-- Hero -->
 <section>
    @php
        $sliders = App\Models\Slider::where('slider_master_id', 8)->get(); 
    @endphp
    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="false">
     <div class="carousel-inner">
        @foreach($sliders as $slider)
        <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
            <img src="{{ asset('public/upload/slider/' . $slider->image) }}" class="d-block w-100" alt="iqac banner">
            <div class="carousel-caption d-none d-md-block">
                <h1 class="text-uppercase fw-bold list-light">{!! $slider->text_on_banner !!}</h1>
                <h5>{!! $slider->description !!}</h5>
            </div>
        </div>
        @endforeach
       
     </div>
     <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="" aria-hidden="true">
       <i class="bi bi-chevron-compact-left fs-1 fw-bold"></i>
      </span>
      <span class="visually-hidden">Previous</span>
     </button>
     <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="" aria-hidden="true"><i class="bi bi-chevron-compact-right fs-1 fw-bold"></i></span>
      <span class="visually-hidden">Next</span>
     </button>
    </div>
   </section>