    <script src="{{ asset('public/frontend/js/unitegallery.min.js') }}"></script>

	<link rel="stylesheet" href="{{ asset('public/frontend/css/unite-gallery.css') }}" type="text/css" />
	
    <script src="{{ asset('public/frontend/js/ug-theme-tiles.js') }}"></script>
  

    <div class="container">
		<h3></h3>
		<div id="effects_tiles_columns" class="effects_buttons_wrapper">
			<span id="tiles_type_justified" style="display:none;"></span>
			<nav class="navbar navbar-expand-lg" style="display: block;">
				<ul class="navbar-nav ofecd-navbar-nav ms-auto mb-2 mb-lg-0 text-sm-center">
					<li class="nav-item" style="background: #ccc;border-radius: 4px;margin-right: 2px;">
						<a href="{{route('oefcd.oefcd_gallery')}}" class="nav-link">All</a> 
					</li>
					@php
						$gallery_categories = \App\Models\GalleryCategory::where('sub_category',4)->get();
					@endphp
					@foreach($gallery_categories as $gcat)
						<li class="nav-item" style="background: #ccc;border-radius: 4px;margin-right: 2px;">
							<a href="{{route('oefcd.gallery.category', @$gcat->id)}}" data-filter="{{$gcat->id}}" class="nav-link click">{{$gcat->name}}</a> 
						</li>
					@endforeach
				</ul>
			</nav>
			 
 
		</div>

        <div id="gallery" style="display:none;margin:20px 0;">
            @foreach($galleries as $gallery)
 
                <img alt="{{$gallery->title}}"
                    src="{{asset('public/upload/gallery_images/'. $gallery->image)}}"
                    data-image="{{asset('public/upload/gallery_images/'. $gallery->image)}}"
                    data-description="{{$gallery->title}}"
                    style="display:none"> 

            @endforeach 


                
        </div> 
			 
		
	</div> 
 
  

	<script type="text/javascript">

		jQuery(document).ready(function(){

			jQuery("#gallery").unitegallery({
				tile_border_color:"#7a7a7a",
				tile_outline_color:"#8B8B8B",
				tile_enable_shadow:true,
				tile_shadow_color:"#8B8B8B",
				tile_overlay_opacity:0.3,
				tile_show_link_icon:true,
				tile_image_effect_type:"sepia",
				tile_image_effect_reverse:true,
				tile_enable_textpanel:true,
				lightbox_textpanel_title_color:"e5e5e5",
				tiles_col_width:230,
				tiles_space_between_cols:20				
			});

		});
		
	</script>
<!-- <script>
    
    $('.click').click(function (evt) {
        evt.preventDefault();
        var id = $(this).attr('data-filter');
        $.ajax({
            type: "GET",
            url: "{{ route('get_gdata') }}",
            dataType: "json",
            data: {
                id: id
            }, 
        }).done(function (data) {
            // I'm assuming that the 'property_details' table has a 'url' field?
            // If not, just replace this with whatever you need.
			console.log(data); 
			$.each(data,function(index, g){
				// console.log(program.id);
				console.log($('#gallery').append( '<img alt="'+ g.title +'" src="../public/upload/gallery_images/'+ g.image +'" data-image="../public/upload/gallery_images/'+ g.image +'" data-description="' +g.title+'" style="display:block;width:50%;">' ));
			});
             
            if (data && data.hasOwnProperty('url')) {
                window.location = data.url;
            }
        });
    });
</script> -->