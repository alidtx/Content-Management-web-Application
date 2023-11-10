@extends('frontend/partials/iqac_layout')

 
@section('content') 


@include('frontend.partials.iqac_slider')

<!-- Card -->
<section class="container mt-5">
    <div class="row">

    <div class="carousel-wrap">
        <div class="owl-carousel owl-theme researchCarousel">

            @foreach($iqac_abouts as $iqac_about)
            <div class="col-12 mt-3 mb-5">
                <div class="card rounded-0 border border-2 border-primary">
                    <img class="" src="{{ asset('storage/app/public/media/igabout/'.@$iqac_about->image) }}" height="197px" alt="" />
                    <div class="card-body" style="height: 350px;">
                        <h5 class="card-title text-secondary fs-3 text-center">
                            @if ($iqac_about->type == 1)
                            <td>About</td>
                            @elseif ($iqac_about->type == 2)
                                <td>Story</td>
                            @elseif ($iqac_about->type == 3)
                                <td>Mission</td>
                            @elseif ($iqac_about->type == 4)
                                <td>Vision</td>
                            @elseif ($iqac_about->type == 5)
                                <td>Objective</td>
                            @elseif ($iqac_about->type == 6)
                                <td>Function</td>
                            @endif
                        </h5>
                        <p class="card-text">
                        {!! @$iqac_about->description !!}
                        </p>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>


     
    </div>
   </section>
   <!-- Recent Activites -->
   <section>
    <div class="container">
     <h1 class="text-uppercase text-secondary text-center fs-2 fw-bold">Recent Activites</h1>
     <div class="row mb-5">
         @foreach($trainingWorkshopSeminars as $trainingWorkshopSeminar)
        <div class="col-md col-lg-6 d-flex justify-content-start align-items-center mt-3">
            <div class="col-lg-2">
             <div class="text-center" style="border: 1px dotted green">
              <h1 class="mb-0 text-primary">{{date("d",strtotime(@$trainingWorkshopSeminar->schedule))}}</h1>
              <p style="font-size: 15px;">{{date("F Y",strtotime(@$trainingWorkshopSeminar->schedule))}}</p>
             </div>
            </div>
            <div class="col-lg-10 ms-2">
             <h1 class="fs-5 mb-0">{{@$trainingWorkshopSeminar->traning}}
             </h1>
             <p class="mb-0" style="color: #5b5959; font-size: 13px;">{{@$trainingWorkshopSeminar->work_shop}}</p>
            </div>
        </div>
        @endforeach
      
     </div>
    </div>
</section>

@endsection