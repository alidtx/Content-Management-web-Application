<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class VideoCategoryController extends Controller
{
    public function index()
    {
    	$data['gallery_category'] = GalleryCategory::all();
    	// dd($data['gallery_category']->toArray());
    	return view('backend.gallery.video_gallery.gallery-view')->with($data);
    }
    public function galleryCategoryAdd()
    {
    	return view('backend.gallery.video_gallery.gallery-add');
    }
    public function galleryCategoryStore(Request $request)
    {
       // return $request->all();
        $request->validate([
           'name' => 'required|unique:gallery_categories,name,except,id',
           'sort' => 'required'
        ]);
        $data = $request->all();
        GalleryCategory::create($data);
        	return redirect()->route('homepages.gallery.category')->with('info','successfully store gallery category.');

    }
    public function galleryCategoryEdit($id=Null)
    {
    	if($id != Null)
    	{
    		$data['editData'] = GalleryCategory::find($id);
    		return view('backend.gallery_category.gallery-category-add')->with($data);
    	}
    	return redirect()->route('homepages.gallery.category')->with('error',"Don't try to be smart! Try again.");

    }

    public function galleryCategoryUpdate(Request $request,$id)
    {
    	$gallery_category = GalleryCategory::find($id);
    	$data = $request->all();
  		$gallery_category->update($data);
        	return redirect()->route('homepages.gallery.category')->with('info','Successfully gallery category updated.');

    }
    public function galleryCategoryDelete(Request $request)
    {
    	$data = GalleryCategory::find($request->id);
    	$data->delete();
    	return redirect()->back();
    }
}
