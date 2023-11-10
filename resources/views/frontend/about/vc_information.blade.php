@extends('frontend.landing')
@php
    $page_title = 'Message from Vice Chancellor';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])

    <section class="container">
        <div class="profile my-5">
            <div class="row d-flex justify-content-center">
                <div class="col-sm-6 col-md-6 col-lg-3 profile-img">
                    <img class="rounded-circle" src="{{ asset('public/upload/profiles/' . @$vcInfo->profile->photo) }}"/>
                </div>
                <div class="col-sm-12 col-md-12 col-lg-9 profile-info">
                    <h1 class="fs-4 fw-bold mb-0">
                        {{$vcInfo->profile->nameEn}}
                    </h1>
                    <h1 class="fs-4 fw-bold text-primary">{{$vcInfo->profile->designation}}</h1>

                    <p>
                        {!! @$vcInfo->short_description !!}
                    </p>

                </div>
            </div>
        </div>
    </section>


    <section>
        <div class="container my-5 ">
            <h1 class="fs-4 fw-bold text-primary d-flex justify-content-center my-5">
                <span class="text-secondary mx-2"> Our </span> Vice Chancellor Honory Board
            </h1>
            <div class="carousel-wrap">
                <div class="owl-carousel owl-theme" id="vcHonorBoardCarousel">
                    @foreach ($vcHBM as $item)
                    <div class="item">
                        <div class="card rounded-0 bg-success" style="height: 400px">
                            <img class="" src="{{ asset('public/upload/vc_honor_board/'.$item->image) }}" height="250" alt="" />
                            <div class="card-body">
                                <h5 class="card-title text-white fs-5 text-center text-uppercase">
                                    {{$item->name}}
                                </h5>
                                <p class="card-text text-white text-center">
                                 {{$item->designation}}
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function() {

            $('.owl-carousel').owlCarousel({
                rtl: false,
                loop: true,
                margin: 10,
                nav: true,
                responsive: {
                    0: {
                        items: 1
                    },
                    600: {
                        items: 3
                    },
                    1000: {
                        items: 5
                    }
                }
            })




            //  $("#owl-demo").owlCarousel({
            //    navigation : true
            //  });

        });
    </script>
@endsection
