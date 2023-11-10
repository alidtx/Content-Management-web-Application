<section style="background: #F4E01D;overflow: hidden;">
     @php
        $slider = App\Models\Slider::where('slider_master_id', 9)->first();
    @endphp

    
    <div class="row">
        <div class="row col-md-6"> 
            <div class="col-md-2"></div>
            <div class="col-md-10" style="margin: auto;">
                <h1 class="text-uppercase fw-bold list-light">{!! $slider->text_on_banner !!}</h1>
                <p>{!! $slider->description !!}</p>
            </div>
        </div>
        <div class="col-md-6">
            
            <img src="{{ asset('public/upload/slider/' . $slider->image) }}" class="d-block" alt="...">
        </div>
      
    </div>
</section>
<!-- ===== slider section end ===== -->
