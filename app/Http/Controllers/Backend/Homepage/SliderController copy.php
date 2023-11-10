<?php

namespace App\Http\Controllers\Backend\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use Auth;
use Image;


class SliderController extends Controller
{
    public function sliderView()
    {
    	$data['allData'] = Slider::where('status','1')->get();
    	return view('backend.homepage.slider.slider_view',$data);
    }

    public function sliderAdd()
    {
    	return view('backend.homepage.slider.slider_add');
    }

    public function sliderStore(Request $request)
    {
        return $request->all();

        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

    	$data = new Slider();
        $data->title = $request->title;
        $data->slider_category_id = $request->slider_id;
    	$img = $request->file('image');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/slider_images/', $imgName);
            // $img = Image::make(public_path('upload/slider_images/').$imgName);
            // $img->resize(1140,292)->save(public_path('upload/slider_images/').$imgName);
            $data['image'] = $imgName;
        }
        $data->created_by = Auth::user()->id;
        $data->save();
    	return redirect()->route('homepages.slider.view')->with('success','Data Saved successfully');
    }

    public function sliderEdit($id)
    {
    	$data['editData'] = Slider::find($id);
    	return view('backend.homepage.slider.slider_add',$data);
    }

    public function sliderUpdate(Request $request,$id)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);
    	$data = Slider::find($id);
    	$img = $request->file('image');
        if ($img) {
            @unlink(public_path('upload/slider_images/'.$data->image));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/slider_images/', $imgName);
            // $img = Image::make(public_path('upload/slider_images/').$imgName);
            // $img->resize(1600,900)->save(public_path('upload/slider_images/').$imgName);
            $data['image'] = $imgName;
        }
        $data->updated_by = Auth::user()->id;
        $data->save();
    	return redirect()->route('homepages.slider.view')->with('success','Data Updated successfully');
    }

    public function sliderDelete(Request $request)
    {
    	$data = Slider::find($request->id);
    	if (file_exists('public/upload/slider_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/slider_images/' . $data->image);
        }
        $data->delete();

        return redirect()->route('homepages.slider.view')->with('success','Data Deleted successfully');
    }
}
