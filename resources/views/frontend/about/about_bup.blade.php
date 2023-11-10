@extends('frontend.landing')
@php
$page_title = 'About';
@endphp
@section('title')
{{ $page_title }}
@endsection
<style>
    .about-wrap {
        padding: 25px 0 25px 0;
        font-size: 1rem;
    }

    .aboutSidebar ul li {
        background: #f1f1f1;
        color: white;
        margin-bottom: 5px;
        cursor: pointer;
        padding: 2px 0 3px 10px;
        display: block;
    }

    .aboutSidebar ul li:hover {
        /* background: #50A2CA; */
        border: 1px solid #198754;
    }

    .aboutSidebar .sidebarContent {
        margin-left: 32px;
        text-align: justify;
        margin-bottom: 16px;
    }

    .about-title {
        display: inline-block;
        color: #060606;
        font-weight: bold;
        border-bottom: 2px solid #198754;
    }

    .aboutSidebar ul a {
        text-decoration: none;
        display: block;
        width: 300px;
        font-size: 20px;
        font-weight: 600;
    }

    .aboutSidebar {
        position: absolute;
        height: 100%;
        z-index: 1;
    }

    .stickySidebar {
        position: sticky;
        position: -webkit-sticky;
        top: 105px;
    }
</style>
@section('content')

@include('frontend.partials.sections.banner', ['page_title' => $page_title])

<section>
    <div class="about-wrap">
        <div class="container">
            <div class="row d-flex flex-row justify-content-between">
                <div class="col-md-4 stickySidebar">
                    <div class="aboutSidebar">
                        <ul class="ps-0">
                            <li><a href="#history">History</a></li>
                            <li><a href="#vission">Vision</a></li>
                            <li><a href="#mission">Mission</a></li>
                            <li><a href="#value">Core Value</a></li>
                            <li><a href="#object">Object</a></li>
                        </ul>
                    </div>
                </div>

                <div class="offset-md-4 col-lg-8">
                    <div id="accordion">
                        <div class="rightSidebar">
                            <h3 class="about-title" id="history">History</h3>
                            <div>
                                <p>{!!$about->history!!}</p>
                            </div>
                            <h3 class="about-title" id="vission">Vision</h3>
                            <div>
                                <p>{!!$about->vision!!}</p>
                            </div>
                            <h3 class="about-title" id="mission">Mission</h3>
                            <div>
                                <p>{!!$about->mission!!}</p>
                            </div>
                            <h3 class="about-title" id="value">Core Value</h3>
                            <div>
                                <p>{!!$about->core_values!!}</p>
                            </div>
                            <h3 class="about-title" id="object">Object</h3>
                            <div>
                                <p>{!!$about->objective!!}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection