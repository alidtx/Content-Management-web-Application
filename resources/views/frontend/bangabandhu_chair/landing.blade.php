<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
</head>

<body>
    

    <!-- Navbar -->
    @include('frontend.partials.menus_bb')

    @yield('content')
    
    <!-- Footer -->

    @include('frontend.partials.footer_bb')

    @include('frontend.partials.footer-script')
</body>

</html>