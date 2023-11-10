<!DOCTYPE html>
<html class="no-js" lang="en">
	<style>
		.home-footer-banner {
		background-image: linear-gradient(
				rgba(139, 1, 1, 1),
				rgba(139, 1, 1,0.75)
			),
			url({{ @$banner->image ? asset('public/upload/banner/'. $banner->image ): '' }});
	}
	</style>
<head>
	@include('frontend.partials.metas')

	@include('frontend.partials.head')
</head>

<body>

	<!-- Header Section Start From Here -->
	@include('frontend.partials.header')
	<!-- Header Section End Here -->

	@yield('content')
	<!-- Content Here -->

	<!-- Footer Area Start -->
	@include('frontend.partials.footer')
	<!-- Footer Area End -->
	<!-- Modal -->
	@include('frontend.partials.modal')

	@include('frontend.partials.footer-script')
</body>

</html>