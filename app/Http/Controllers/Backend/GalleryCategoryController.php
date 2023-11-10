<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\GalleryCategory;

class GalleryCategoryController extends Controller
{
    public function index()
    {
    	$data['allCategories'] = GalleryCategory::all();

        return view('backend.gallery_category.view',$data);
    }

    public function Add()
    {
        $data['categories'] = GalleryCategory::all();
    	return view('backend.gallery_category.add', $data);
    }

    public function Store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $params = $request->all();

        GalleryCategory::create($params);

    	return redirect()->route('setup.gallery_category')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['categories'] = GalleryCategory::all();
    	$data['editData'] = GalleryCategory::find($id);
    	return view('backend.gallery_category.add',$data);
    }

    public function Update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required'
        ]);
        $data = GalleryCategory::find($id);

        $params = $request->all();

        $data->update($params);

    	return redirect()->route('setup.gallery_category')->with('success','Data Updated successfully');
    }

    public function Delete(Request $request)
    {
    	$data = GalleryCategory::find($request->id);
        $data->delete();

        return redirect()->route('setup.gallery_category')->with('success','Data Deleted successfully');
    }

}
