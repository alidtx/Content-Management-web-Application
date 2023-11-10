<!DOCTYPE html>
<html lang="en">

<head>
    @include('frontend.partials.metas')

    @include('frontend.partials.head')
</head>

<body>
{{-- @include('frontend.faculty.tamplate_one.partials.topbar') --}}
@include('frontend.faculty.tamplate_one.partials.header')

   @yield('content')

@include('frontend.faculty.tamplate_one.partials.footer')
@include('frontend.partials.footer-script')

</body>

</html>
