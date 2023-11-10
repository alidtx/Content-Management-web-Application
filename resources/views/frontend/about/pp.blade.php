<!-- ===== slider section start ===== -->
@extends('frontend.landing')
@php
    $page_title = 'About';
@endphp
@section('title')
    {{ $page_title }}
@endsection
@section('content')
    @include('frontend.partials.sections.banner', ['page_title' => $page_title])
    <style>
        .about-wrap {
            padding: 25px 0 25px 0;
            font-size: 1rem;
        }

        .aboutSidebar ul li {
            background: #198754;
            margin-bottom: 3px;
            border-left: 8px solid yellow;
            cursor: pointer;
            padding: 2px 0 3px 10px;
            color: black;
            font-size: 17px
        }

        .aboutSidebar ul li:hover {
            background: #486959;
        }

        .aboutSidebar .sidebarContent{
            margin-left: 32px;
            text-align: justify;
            margin-bottom: 16px;
        }
        .aboutSidebar .sidebarContent h3{
           color: #c68e17;
           font-size: 22px;
        }
    </style>


    <section>
        <div class="about-wrap">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="aboutSidebar">
                            <ul>
                                <a href="#history"><li>History</li></a>
                                <a href="#vission"><li>Vission</li></a>
                                <a href="#mission"><li>Mission</li></a>
                                <a href="#value"><li>Core Value</li></a>
                                <a href="#object"><li>Object</li></a>
                            </ul>
                        </div>
                        <div class="aboutSidebar">
                            <div class="sidebarContent">
                                <h3>Bup in press</h3>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae mollitia a distinctio eius
                                dignissimos laboriosam id adipisci quo vero quis laborum, doloremque nisi architecto magnam
                                dolorum optio, beatae, incidunt voluptates.</p>
                               <a href="">Read More</a>
                            </div>
                        </div>
                        <div class="aboutSidebar">
                            <div class="sidebarContent">
                                <h3>Notice Board</h3>
                                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quae mollitia a distinctio eius
                                dignissimos laboriosam id adipisci quo vero quis laborum, doloremque nisi architecto magnam
                                dolorum optio, beatae, incidunt voluptates.</p>
                               <a href="">Read More</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-8">
                        <div id="accordion">
                            <h3 id="history">History</h3>
                            <div>
                              <p>
                              Mauris mauris ante, blandit et, ultrices a, suscipit eget, quam. Integer
                              ut neque. Vivamus nisi metus, molestie vel, gravida in, condimentum sit
                              amet, nunc. Nam a nibh. Donec suscipit eros. Nam mi. Proin viverra leo ut
                              odio. Curabitur malesuada. Vestibulum a velit eu ante scelerisque vulputate.
                              </p>
                            </div>
                            <h3 id="vission">Vission</h3>
                            <div>
                              <p>
                              Sed non urna. Donec et ante. Phasellus eu ligula. Vestibulum sit amet
                              purus. Vivamus hendrerit, dolor at aliquet laoreet, mauris turpis porttitor
                              velit, faucibus interdum tellus libero ac justo. Vivamus non quam. In
                              suscipit faucibus urna.
                              </p>
                            </div>
                            <h3 id="mission">Mission</h3>
                            <div>
                              <p>
                              Nam enim risus, molestie et, porta ac, aliquam ac, risus. Quisque lobortis.
                              Phasellus pellentesque purus in massa. Aenean in pede. Phasellus ac libero
                              ac tellus pellentesque semper. Sed ac felis. Sed commodo, magna quis
                              lacinia ornare, quam ante aliquam nisi, eu iaculis leo purus venenatis dui.
                              </p>
                              <ul>
                                <li>List item one</li>
                                <li>List item two</li>
                                <li>List item three</li>
                              </ul>
                            </div>
                            <h3 id="value">Core Value</h3>
                            <div>
                              <p>
                              Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                              et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                              faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                              mauris vel est.
                              </p>
                              <p>
                              Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                              Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                              inceptos himenaeos.
                              </p>
                            </div>
                            <h3 id="object">Object</h3>
                            <div>
                              <p>
                              Cras dictum. Pellentesque habitant morbi tristique senectus et netus
                              et malesuada fames ac turpis egestas. Vestibulum ante ipsum primis in
                              faucibus orci luctus et ultrices posuere cubilia Curae; Aenean lacinia
                              mauris vel est.
                              </p>
                              <p>
                              Suspendisse eu nisl. Nullam ut libero. Integer dignissim consequat lectus.
                              Class aptent taciti sociosqu ad litora torquent per conubia nostra, per
                              inceptos himenaeos.
                              </p>
                            </div>
                          </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
