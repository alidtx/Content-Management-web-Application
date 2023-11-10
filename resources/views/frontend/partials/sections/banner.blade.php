<style>
    .faculty-profile-banner {
    background-image: linear-gradient(
            rgba(13, 202, 76, 0.75),
            rgba(1, 39, 11, 0.75)
        ),
        url({{ @$banner->image ? asset('public/upload/banner/'. $banner->image ): '' }});
}
</style>
<section>
    <div class="faculty-profile-banner d-flex justify-content-center align-items-center">
        <h1 class="text-uppercase text-white font-poppins">{{$page_title}}</h1>
    </div>
</section>
