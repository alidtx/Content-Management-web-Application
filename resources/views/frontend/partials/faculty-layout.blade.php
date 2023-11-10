<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>BUP</title>


    <link rel="stylesheet" href="{{ asset('public/frontend/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('public/frontend/css/main.min.css') }}">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.2/font/bootstrap-icons.min.css"
        integrity="sha512-YFENbnqHbCRmJt5d+9lHimyEMt8LKSNTMLSaHjvsclnZGICeY/0KYEeiHwD1Ux4Tcao0h60tdcMv+0GljvWyHg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css"
        integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.css"
        integrity="sha512-OTcub78R3msOCtY3Tc6FzeDJ8N9qvQn1Ph49ou13xgA9VsH9+LRxoFU6EqLhW4+PKRfU+/HReXmSZXHEkpYoOA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"
        integrity="sha512-STof4xm1wgkfm7heWqFJVn58Hm3EtS31XFaagaa8VMReCXAkQnJZ+jEy8PCC/iT18dFy95WcExNHFTqLyp72eQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>


</head>

<body>
    <!-- Top Bar -->
    <section id="topbar" class="bg-secondary py-2">
        <div class="container d-flex justify-content-end align-items-center topbar py-2">
            <a href="#">Students</a>
            <a href="#">Faculty & Staff</a>
            <a href="#">Alumni</a>
        </div>
    </section>
    <!-- Navbar -->
    <header id="header" class="container-lg">
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <img src="{{ asset('public/frontend/assets/img/bup/logo.png') }}" alt="Logo"
                        class="d-inline-block align-text-top" />
                    <span class="text-primary text-uppercase text-secondary fs-6 fw-bold mb-0 mx-2">
                        @section('faculty_title') @show
                    </span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse text-uppercase" id="navbarSupportedContent">
                    <ul class="business-navbar-nav navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Research&Publication</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Department</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Notice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Notice</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Research</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- Banner -->



    @section('container')

    @show




    <!-- Footer -->
    <footer>
        <div class="footer-top bg-primary text-white">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-lg-4 col-md-6 footer-contact mt-5">
                        <div class="d-flex justify-content-center align-items-center">
                            <img class="mr-2" src="assets/img/logo.png" style="width: 20%; margin-top: -10px" />
                            <h3 class="fs-6 fw-bolder">
                                BANGLADESH UNIVERSITY OF PROFESSIONALS
                            </h3>
                        </div>
                        <div class="mt-3">
                            <p class="mb-0">Mirpur Cantonment, Dhaka-1216</p>
                            <p class="mb-0">Phone: +8809666790790</p>
                            <p class="mb-0">Fax: 88-028000443</p>
                            <p class="mb-0">Email: info@bup.edu.bd</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links my-5">
                        <li><a href="#">Accessibility</a></li>
                        <li><a href="#">Financial Aid</a></li>
                        <li><a href="#">News & Events</a></li>
                        <li><a href="#">Food Service</a></li>
                        <li><a href="#">Notice Board</a></li>
                        <li><a href="#">Directories</a></li>
                    </div>

                    <div class="col-lg-3 col-md-6 footer-links mt-5">
                        <li><a href="#">Central Library</a></li>
                        <li><a href="#">Financial Aid</a></li>
                        <li><a href="#">Campus Safety</a></li>
                        <li><a href="#">Registrar Office</a></li>
                        <li><a href="#">Facility Services</a></li>
                        <li><a href="#">Medical Center</a></li>
                    </div>

                    <div class="col-lg-2 col-md-6 footer-links mt-5">
                        <li><a href="#">ICT Cell</a></li>
                        <li><a href="#">Forms & Downloads</a></li>
                        <li><a href="#">Result Archive</a></li>
                        <li><a href="#">Residence Halls</a></li>
                        <li><a href="#">Conference</a></li>
                        <li><a href="#">Campus Attractions</a></li>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-danger py-2 align-items-center">
            <div class="container text-white d-flex justify-content-between align-items-center">
                <div>
                    <p class="px-2 mb-0">All rights Reserved &copy; BUP,2022</p>
                </div>
            </div>
        </div>
    </footer>


    <script src="{{asset('public/frontend/js/bootstrap.otherbundle.min.js')}}"></script>

</body>

</html>
