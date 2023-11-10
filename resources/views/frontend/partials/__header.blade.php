
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
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-sm-center">
                        @php
                        $parents =DB::table('frontend_menus')->where('status',1)->where('parent_id','0')->where('menu_type_id', 1)->orderBy('sort_order','asc')->get();

                        @endphp
                        @foreach ($parents as $parent)
                        <li class="nav-item dropdown dropdown-hover position-static ">
                            <a class="nav-link text-uppercase nav-bar-item-menu" href="#">{{ $parent->title_en }}<span
                                    class="ms-2 dropdown-toggle d-lg-none"></span></a>
                            <div class="dropdown-menu mx-2 mt-0 w-100 border-0 rounded-0"
                                aria-labelledby="navbarDropdown">
                                <div class=" container">
                                    <div class="bg-primary container mt-3 d-sm-block d-none"
                                        style="width: 100%; height: 3px;">
                                    </div>
                                    <div class="row my-4">
                                        @php
                                        $subparents = DB::table('frontend_menus')->where('status',1)->where('parent_id',$parent->rand_id)->orderBy('sort_order','asc')->get();
                                        @endphp
                                        @foreach ($subparents as $subparent)
                                        <div class="col-md-6 col-lg-3 mb-3 mb-lg-0 ">
                                            <h1 class="text-uppercase fs-6 fw-bold ms-3">{{ $subparent->title_en }}</h1>
                                            <div class=" bg-light" style="height: 1px; "></div>
                                            <div class="dropdown-item-group" aria-labelledby="navbarDropdown">
                                                @php
                                                $lastparents =
                                                DB::table('frontend_menus')->where('status',1)->where('parent_id',$subparent->rand_id)->orderBy('sort_order','asc')->get();
                                                @endphp
                                                @foreach ($lastparents as $lastparent)
                                                <a class="dropdown-item"
                                                    href="{{$lastparent->url_link?route('menu_url',$lastparent->slug):'#'}}">{{ $lastparent->title_en }}</a>
                                                    
                                                @endforeach
                                                {{-- <a class="dropdown-item" href="{{ route('vc_info') }}">VC's
                                                    Secratariat</a>
                                                <a class="dropdown-item" href="{{ route('offices') }}">Offices</a> --}}
                                            </div>
                                                
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </li>
                            
                        @endforeach
                        


                        {{-- <li class="nav-item dropdown dropdown-hover">
                            <a class="nav-link text-uppercase nav-bar-item-menu" href="#">Announcements<span
                                    class=" ms-2 dropdown-toggle d-lg-none"></span></a>
                            <div class="dropdown-menu mx-2 mt-0 border-0 rounded-0" aria-labelledby="navbarDropdown">
                                <div class=" container">
                                    <div class="bg-primary container mt-3 d-sm-block d-none"
                                        style="width: 100%; height: 3px;">
                                    </div>
                                    <div class="row my-4">
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
                        </li> --}}
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<!-- ===== Header section end ===== -->