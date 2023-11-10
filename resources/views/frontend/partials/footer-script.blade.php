<!-- ==== Jquery Link ==== -->
{{-- <script src="https://code.jquery.com/jquery-2.2.4.js"></script> --}}
<script src="{{ asset('public/frontend/node_modules/aos/dist/aos.js') }}"></script>
<script src="{{ asset('public/frontend/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/frontend/assets/owl_carousel/js/owl.carousel.js') }}"></script>
<script src="{{ asset('public/frontend/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
{{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script> --}}

@yield('script')
<script>
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();
        var height = $('#topbar').innerHeight();

        
        if (scroll >= 15) {
            // console.log('object');
            // $("header").addClass("fixed-top");
            $('#topbar').addClass('hide');
            $('#main-menu').removeClass('nav-bg');
            $('#main-menu').css('margin-top', '-' + height + 'px');

        } else {
            // $("header").removeClass("fixed-top");
            $('#topbar').removeClass('hide');
            $('#main-menu').addClass('nav-bg');
            $('#main-menu').css('margin-top', '-' + 0 + 'px');
        }
        // Show button after 100px
        var showAfter = 100;
        if ($(this).scrollTop() > showAfter) {
            $('.back-to-top').fadeIn();
        } else {
            $('.back-to-top').fadeOut();
        }
    });
</script>
<script>
    AOS.init();
</script>
<script>
    $(document).ready(function(){

        $('#academicCarousel').owlCarousel({
            loop: true,
            margin: 10,
            autoplay: true,
            nav: true,
            navText: ["<div class='nav-btn prev-slide' style='top: 50% !important;'></div>", "<div class='nav-btn next-slide' style='top: 50% !important;'></div>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 4
                }
            }
        });
    
    
    
        $('.researchCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: ["<div class='nav-btn prev-slide'></div>", "<div class='nav-btn next-slide'></div>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 3
                }
            }
        });

        $('#qouteCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            navText: ["<div class='nav-btn prev-slide'></div>", "<div class='nav-btn next-slide'></div>"],
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 1
                },
                1000: {
                    items: 1
                }
            }
        });

        $('#departmentCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 2
                },
                1000: {
                    items: 3
                }
            }
        });

        $('#vcHonorBoardCarousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 2
                },
                600: {
                    items: 4
                },
                1000: {
                    items: 4
                }
            }
        });
    });
</script>

@yield('script-bottom')