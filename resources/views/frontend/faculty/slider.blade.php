<div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
        @foreach ($sliders as $slider)
                <div class="carousel-item  {{ $loop->first ? 'active' : '' }} slider-img">
                    <img src="{{ asset('public/upload/slider/' . $slider->image) }}" class="d-block w-100" alt="...">
                    <div class="carousel-caption d-none d-md-block">
                        <h1 class="text-uppercase fw-bold list-light">{{ $slider->text_on_banner }}</h1>
                        <h5>{{ $slider->discription }}</h5>
                    </div>
                </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
