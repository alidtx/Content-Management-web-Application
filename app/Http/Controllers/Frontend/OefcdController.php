<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Services\OefcdServices;
use App\Services\NewsEventNoticeServices;
use App\Models\Faq;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class OefcdController extends Controller
{
    
    private $OefcdServices;
    public function __construct(OefcdServices $OefcdServices)
    {
        $this->OefcdServices = $OefcdServices;
    }
    public function index()
    { 
        $data['news'] = NewsEventNoticeServices::getSelectedRange(1,2); //post type and number of array 
        $data['events'] = NewsEventNoticeServices::getSelectedRange(2,4); //post type and number of array 
        $data['all'] = []; //post type and last array 
        return view('frontend.oefcd.index', $data);
    }

    public function faculty()
    { 
        $data['info'] = OefcdServices::getby();  
        return view('frontend.oefcd.faculty_program', $data);
    }
    public function training()
    { 
        $data['trainer_list'] = OefcdServices::getAll();   
        return view('frontend.oefcd.staff_training', $data);
    }
    public function international_affairs()
    { 
        $id = 1;
        $data['about'] = OefcdServices::getByID($id);   
        return view('frontend.oefcd.international_affairs', $data);
    }
    
    public function research_sponsored()
    {
        // 
        return view('frontend.oefcd.research_sponsored');
    }
    public function project()
    {
        // 
        return view('frontend.oefcd.project');
    }
    public function collaborations()
    {
        // 
        return view('frontend.oefcd.collaborations');
    }
    public function publications()
    {
        // 
        return view('frontend.oefcd.publications');
    }

      
    public function oefcdFAQ()
    {
        $data['faqs']=Faq::where('faq_type',7)->where('status',1)->get();
        session()->put('active','faq');

        return view('frontend.oefcd.oefcd_faq',$data);
    }
    public function oefcdGallery()
    { 
        $arr = GalleryCategory::where('sub_category', 4)->where('status',1)->get()->pluck('id')->toArray(); 
        $arr[] =  4;
        //dd($arr);
        $data['galleries'] = Gallery::whereIn('gallery_category_id', $arr)->where('status',1)->get(); 

        return view('frontend.oefcd.oefcd_gallery',$data);
    }
    public function get_gdata(Request $request)
    { 
        $galleries = Gallery::where('gallery_category_id',$request->id)->where('status',1)->get(); 
        // foreach ($galleries as $key => $gallery) {
        //     $output.='<img alt="$gallery->title}}"
        //     src="public/upload/gallery_images/ $gallery->image"
        //     data-image="public/upload/gallery_images/$gallery->image "
        //     data-description="$gallery->title"
        //     style="display:none"> ';
        // }
        // return Response($output);
        if(isset($galleries))
		{
			return response()->json($galleries);
		}
		else
		{
			return response()->json('fail');
		}
    }
    public function oefcdGallery_category($id)
    {
        $data['galleries'] = Gallery::where('gallery_category_id',$id)->where('status',1)->get(); 
        //dd($data['galleries']); 

        return view('frontend.oefcd.oefcd_gallery',$data);
    }

     
}
