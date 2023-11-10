
<div class="header">
    <div class="fixed-top">
        <!-- Top Bar -->
        <section id="topbar" class="d-flex justify-content-center align-items-center bg-success d-none d-md-block">
            <div class="topbar text-end container">
                <a href="#">DSpace</a>
                <a href="#">Library</a>
                <a href="#">Payment Procedure</a>
                <a href="{{route('faculty_member')}}">Faculty Members</a>
                <a href="#">Degree Verification</a>
                <a href="#">Important Contact</a>
                <a href="#">Apply Online</a>
            </div>
        </section>

        <nav id="main-menu" class="navbar navbar-expand-lg nav-bg w-100">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="{{ url('/') }}">
                    @include('frontend.partials.logo.bup_header')
                    <span class="text-primary fs-6 fw-bold mb-0 mx-2 d-none d-sm-block">BANGLADESH UNIVERSITY OF <br/>PROFESSIONALS</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto text-sm-center">
                        <li class="nav-item dropdown dropdown-hover position-static highlight-nav">
                            <a class="nav-link text-uppercase nav-bar-item-menu" href="#">About<span class="ms-2 dropdown-toggle d-lg-none"></span></a>
                            <div class="dropdown-menu mx-2 pt-0 w-100 border-0 rounded-0" style="margin-top:-3px !important;" aria-labelledby="navbarDropdown">
                                <div class=" container">
                                    <div class="bg-primary container d-sm-block d-none" style="width: 100%; height: 3px;">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-3 my-3 mb-lg-0 ">
                                            <h1 class="text-uppercase fs-6 fw-bold ms-3">About BUP</h1>
                                            <div class="bg-light" style="height: 1px; "></div>
                                            <div class="dropdown-item-group" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('about_overview') }}">History</a>
                                                <a class="dropdown-item" href="{{ route('vc_info') }}">VC's Secratariat</a>
                                                <a class="dropdown-item" href="{{ route('offices') }}">Offices</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 my-3 mb-lg-0 ">
                                            <h1 class="text-uppercase fs-6 fw-bold ms-3">Regulatory Bodies</h1>
                                            <div class=" bg-light" style="height: 1px; "></div>
                                            <div class="dropdown-item-group" aria-labelledby="navbarDropdown">
                                                @php
                                                $committee = \App\Models\CommitteType::all();
                                                @endphp
                                                @foreach ($committee as $item)
                                                <a class="dropdown-item"
                                                    href="{{ route('senate.member', $item->id) }}">{{$item->name}}</a>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 my-3 mb-lg-0 ">
                                            <h1 class="text-uppercase fs-6 fw-bold ms-3">Title</h1>
                                            <div class=" bg-light" style="height: 1px; "></div>
                                            <div class="dropdown-item-group" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Action</a>

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 my-3 mb-lg-0 ">
                                            <h1 class="text-uppercase fs-6 fw-bold ms-3">Title</h1>
                                            <div class=" bg-light" style="height: 1px; "></div>
                                            <div class="dropdown-item-group" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Action</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-hover position-static highlight-nav">
                            <a class="nav-link text-uppercase nav-bar-item-menu" href="{{ route('campus_life') }}">On Campus<span
                                    class="ms-2 dropdown-toggle d-lg-none"></span></a>
                        </li>

                        <li class=" nav-item dropdown dropdown-hover position-static highlight-nav">
                            <a class="nav-link text-uppercase nav-bar-item-menu" href="#"
                                id="navbarDropdown">Academics<span class="ms-2 dropdown-toggle d-lg-none">
                                </span></a>
                            <div class="dropdown-menu mx-2 pt-0 w-100 border-0 rounded-0" style="margin-top:-3px !important;" aria-labelledby="navbarDropdown">
                                <div class=" container">
                                    <div class="bg-primary container d-sm-block d-none" style="width: 100%; height: 3px;">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 col-lg-4 my-3 mb-lg-0 ">
                                            <h1 class="text-uppercase fs-6 fw-bold ms-3">Faculty</h1>
                                            <div class=" bg-light" style="height: 1px; "></div>
                                            <div class="dropdown-item-group" aria-labelledby="navbarDropdown">
                                                @php
                                                $faculties = \App\Models\Faculty::all();
                                                @endphp
                                                @foreach ($faculties as $faculty)
                                                <a class="dropdown-item"
                                                    href="{{ route('faculty_home', $faculty->id) }}">{{
                                                    $faculty->name }}</a>
                                                @endforeach

                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-4 my-3 mb-lg-0 ">
                                            <h1 class="text-uppercase fs-6 fw-bold ms-3">Others</h1>
                                            <div class="bg-light" style="height: 1px; "></div>
                                            <div class="dropdown-item-group" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('chsr_home') }}">CHSR</a>
                                                <a class="dropdown-item"
                                                    href="{{ route('bangabandhu_chair') }}">Bangabandhu Chair</a>
                                                <a class="dropdown-item" href="{{ route('iqac') }}">IQAC</a>
                                                <a class="dropdown-item" href="{{ route('oefcd') }}">OEFCD</a>
                                            </div>
                                        </div>
                                        {{-- <div class="col-md-6 col-lg-4 mb-3 mb-lg-0 ">
                                            <h1 class="text-uppercase fs-6 fw-bold ms-3">Title</h1>
                                            <div class=" bg-light" style="height: 1px; "></div>
                                            <div class="dropdown-item-group" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="nav-item dropdown dropdown-hover position-static highlight-nav">
                            <a class="nav-link text-uppercase nav-bar-item-menu" href="#">Admissions<span
                                    class="ms-2 dropdown-toggle d-lg-none"></span></a>
                            {{-- <div class="dropdown-menu mx-2 mt-0 w-100 border-0 rounded-0"
                                aria-labelledby="navbarDropdown">
                                <div class=" container">
                                    <div class="bg-primary container mt-3 d-sm-block d-none"
                                        style="width: 100%; height: 3px;">
                                    </div>
                                    <div class="row my-4">
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0 ">
                                            <h1 class="text-uppercase fs-6 fw-bold ms-3">Title</h1>
                                            <div class=" bg-light" style="height: 1px; "></div>
                                            <div class="dropdown-item-group" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0 ">
                                            <h1 class="text-uppercase fs-6 fw-bold ms-3">Title</h1>
                                            <div class=" bg-light" style="height: 1px; "></div>
                                            <div class="dropdown-item-group" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0 ">
                                            <h1 class="text-uppercase fs-6 fw-bold ms-3">Title</h1>
                                            <div class=" bg-light" style="height: 1px; "></div>
                                            <div class="dropdown-item-group" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0 ">
                                            <h1 class="text-uppercase fs-6 fw-bold ms-3">Title</h1>
                                            <div class=" bg-light" style="height: 1px; "></div>
                                            <div class="dropdown-item-group" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                                <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a>
                                                <a class="dropdown-item" href="#">Something else here</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </li>
                        <li class="nav-item dropdown dropdown-hover highlight-nav">
                            <a class="nav-link text-uppercase nav-bar-item-menu" href="#">Announcements<span
                                    class="ms-2 dropdown-toggle d-lg-none"></span></a>
                            <div class="dropdown-menu mx-2 pt-0 border-0 rounded-0" style="margin-top:-3px !important;" aria-labelledby="navbarDropdown">
                                <div class=" container">
                                    <div class="bg-primary container d-sm-block d-none" style="width: 100%; height: 3px;">
                                    </div>
                                    <div class="row">
                                        <div class="mb-lg-0 ">
                                            <div class="dropdown-item-group" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="{{ route('news.all') }}">
                                                    <h1 class="text-uppercase fs-6">News</h1>
                                                </a>
                                                <a class="dropdown-item" href="{{ route('events.all') }}">
                                                    <h1 class="text-uppercase fs-6">Events</h1>
                                                </a>
                                                <a class="dropdown-item" href="{{ route('notice.all') }}">
                                                    <h1 class="text-uppercase fs-6">Notice</h1>
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <h1 class="text-uppercase fs-6">Results</h1>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        {{-- <li class="nav-item">
                            <a class="nav-link text-uppercase nav-bar-item-menu" href="#">Announcements</a>
                        </li> --}}
                        <li class="nav-item highlight-nav">
                            <a class="nav-link text-uppercase nav-bar-item-menu" href="{{ route('procurement') }}">Procurement</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<script>
        $(function(){
            var href = "{{ url()->current()}}";
            var thisUrl = $('.dropdown-item[href="'+href+'"]');
            $(thisUrl).parents('.highlight-nav').find('.nav-bar-item-menu').css('borderBottom','3px solid #006a4e');
            $(thisUrl).css('backgroundColor','#006a4e').css('color', '#fff');
        });
</script>

<!-- ===== Header section end ===== -->