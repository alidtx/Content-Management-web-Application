<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@section('content')
       <!-- Banner -->
    <section>
        <div class="faculty-profile-banner mb-3 d-flex justify-content-center align-items-center">
            <h1 class="text-uppercase text-white font-poppins">Affiliation </h1>
        </div>
    </section>
    
    <main> 
    
        <section>

            <div class="academic-details mb-3">
                <div class="container">
                    <div class="row" > 
                        <div class="col-md-3 profile-img">
                            <img class="rounded-circle" src="{{ asset('public/'. $info->image =='' ? 'upload/affiliation'.$info->image : 'public/frontend/assets/img/home/brnad (1).png') }}"
                                style="width: 100%" />
                        </div> 

                        <div class="col-md-9">
                            <div class="card">
                                <div class="card-header">
                                    <h1 class="fs-4 fw-bold text-primary">{{ $info->inst_name }}</h1>
                                    <h1 class="fs-6">Type: {{ $info->institution_type }}</h1>
                                    <h1 class="fs-6 fw-bolder">Location: {{ $info->location }}</h1>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content">
                                    <div  id="outline" class="tabcontent active">
                                        <p>{!! $info->inst_description !!}</p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

        </section> 
   
    </main>
@endsection