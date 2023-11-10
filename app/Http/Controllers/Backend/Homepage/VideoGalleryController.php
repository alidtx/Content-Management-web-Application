<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class VideoGalleryController extends Controller
{
    public function index()
    {
        $data['gallery'] = Gallery::with('categories')->get();
        dd($data);
        // dd($data);

    	return view('backend.gallery.video_gallery.gallery-view')->with($data);
    }
    public function galleryAdd()
    {
        $data['category'] = GalleryCategory::all();
    	return view('backend.gallery.gallery-add')->with($data);
    }
    public function galleryStore(Request $request)
    {
    	$request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:10240',
        ]);
        $data = $request->all();
  		if($request->hasFile('image'))
  		{
  			$filename =date('Ymd') .'_'.time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/gallery'), $filename);
            $image=Image::make(public_path('upload/gallery/').$filename);
            $image->resize(1700,1000)->save(public_path('upload/gallery/').$filename);
            $data['image']= $filename;
            // dd($data);
            Gallery::create($data);
        	return redirect()->route('homepages.gallery')->with('info','successfully store gallery info.');
  		}

        Gallery::create($data);
        	return redirect()->route('homepages.gallery')->with('info','successfully store gallery info.');

    }
    public function galleryEdit($id=Null)
    {
    	if($id != Null)
    	{
    		$data['editData'] = Gallery::find($id);
            $data['category'] = GalleryCategory::all();
    		return view('backend.gallery.gallery-add')->with($data);
    	}
    	return redirect()->route('homepages.gallery')->with('error',"Don't try to be smart! Try again.");

    }

    public function galleryUpdate(Request $request,$id)
    {
    	$gallery = Gallery::find($id);
    	$data = $request->all();
        // dd($data);
    	if($request->hasFile('image'))
  		{
  			@unlink(public_path('upload/gallery/'.$gallery->image));
  			$filename =date('Ymd') .'_'.time() . '.' . $request->image->getClientOriginalExtension();
            $request->image->move(public_path('upload/gallery'), $filename);
            $image=Image::make(public_path('upload/gallery/').$filename);
            $image->resize(1700,1000)->save(public_path('upload/gallery/').$filename);
            $data['image']= $filename;
            $gallery->update($data);
        	return redirect()->route('homepages.gallery')->with('info','Successfully gallery updated.');
  		}
  		$gallery->update($data);
        	return redirect()->route('homepages.gallery')->with('info','Successfully gallery updated.');

    }
    public function galleryDelete(Request $request)
    {
    	$data = Gallery::find($request->id);
        @unlink(public_path('upload/gallery/'.$data->image));
    	$data->delete();
    	return redirect()->back();
    }
}
