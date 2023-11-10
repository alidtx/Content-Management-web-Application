<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')

</head>

<body>
    {{-- @include('frontend.partials.topbar_bb') --}}

    <!-- Navbar -->
    @include('frontend.partials.menus_bb')

    <!-- Hero -->
    @include('frontend.partials.slider')

    <!-- Profile -->
    <section class="container">
        <div class="profile rounded my-5">
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-lg-3 col-md-12 profile-img text-center">
                    <img class="rounded-circle object-cover" src="{{ asset('public/upload/profiles/' . @$about->profile->photo) }}"
                        onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';" height="220px" width="220px"/>
                </div>
                <div class="col-lg-9 col-md-12 profile-info">
                    <h2 class="fs-4 fw-bold mb-0">
                        {{ $about->profile->nameEn }}
                    </h2>
                    <h2 class="fs-5 fw-bold text-primary">{{ $about->profile->designation }}
                    </h2>
                    <p>
                        {!! $about->message !!}
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner -->
    <section class="bb-banner-section">
        <div class="container d-flex justify-content-center align-items-center">
            <div class="carousel-wrap">
                <div class="owl-carousel owl-theme" id="qouteCarousel">
                    @foreach ($quotes as $item)
                    <div class="item">
                        <div class="my-5">
                            <h2 class="text-white text-center pb-5">
                                To Quote <br />
                                {{-- {{ $item->title1 }}<br /> --}}
                                {{  Str::limit(@$item->title1, 35)  }}<br />
                                {{ Str::limit(@$item->title2, 35) }}
                            </h2>
                            <p class="fs-5 text-center text-white">
                                {!! Str::limit(@$item->description, 300) !!}
                                {{-- {!! $item->description !!} --}}
                            </p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- Our Research Person Card -->
    <section class="my-5">
        <h1 class="fs-1 fw-bold text-primary d-flex justify-content-center ">
            <span class="text-secondary mx-2"> Our </span> Research Persons
        </h1>
        <div class="container pt-5">
            <div class="row g-3">
                @foreach ($researchers as $item)
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card rounded-0 bg-success member-list-card">
                        <img class="object-cover" src="{{ asset('public/upload/profiles/' . @$item->profile->photo) }}"
                            onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';" alt="" />
                        <div class="card-body">
                            <h5 class="card-title text-white fs-6 mt-0 text-center">
                                {{-- Dr. Imranul Haque --}}
                                {{ $item->profile->nameEn }}
                            </h5>
                            <p class="card-text text-white text-center">
                                {{ $item->profile->designation }}
                                {{-- Associate Professor --}}
                            </p>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Banner Card -->
    <section class="bg-success">
        <div class="container pt-5">
            <h1 class="text-center text-white">Research</h1>
            <div class="row g-3 d-flex justify-content-between">
                <div class="carousel-wrap">
                    <div class="owl-carousel owl-theme researchCarousel bb-research-item">
                        @foreach ($researchs as $item)
                        <div class="item">
                            <div class="card rounded-0 my-5">
                                <img class="card-img-top rounded-0 p-2"
                                    src="{{ asset('public/upload/profiles/' . @$item->image) }}"
                                    onerror="this.onerror=null;this.src='{{ asset('public/upload/user-dummy.jpeg') }}';"
                                    alt="Card image cap">
                                <div class="card-body">
                                    <h6 class="card-text mb-0 fs-7">{{ $item->profile->nameEn }} - {{ date('d M Y', strtotime($item->date)) }}</h6>
                                    <h5 class="card-title fs-5 pt-1">{{ $item->title }}</h5>
                                    <div id="bb-reseach-description">
                                        <p class="card-text fs-6">{!! Str::limit(@$item->description, 135) !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->

    @include('frontend.partials.footer_bb')

    @include('frontend.partials.footer-script')
</body>

</html>