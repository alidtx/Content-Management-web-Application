<?php

namespace App\Http\Controllers\Backend\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SliderCategory;
use Auth;
use Image;
use DB;


class SliderController extends Controller
{
    public function sliderView()
    {
    	$data['allData'] = SliderCategory::oldest()->get();
        // return $data;
    	return view('backend.homepage.slider.slider_type_view',$data);
    }

    public function sliderTypAdd()
    {
    	return view('backend.homepage.slider.slider_type_add');
    }

    public function sliderTypeStore(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:slider_categories,name'
        ]);

    	$data = new SliderCategory();
        $data->name = $request->title;
        $data->created_by = Auth::user()->id;
        $data->save();
    	return redirect()->route('homepages.slider.view')->with('success','Data Saved successfully');
    }

    public function sliderTypeEdit($id)
    {
    	$data['editData'] = SliderCategory::find($id);

    	return view('backend.homepage.slider.slider_type_add',$data);
    }

    public function sliderUpdate(Request $request,$id)
    {
        $request->validate([
            'title' => 'required|unique:slider_categories,name'
        ]);
    	$data = SliderCategory::find($id);
        $data->name = $request->title;
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




    // Slider Add
    public function sliderAdd($id)
    {
        return view('backend.homepage.slider.slider_add',compact('id'));
    }
    public function sliderStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'hover_title_1' => 'required',
            'hover_title_2' => 'required',
            'slider_title' => 'required',
        ]);

        $slider_data = new Slider();
        $img = $request->file('image');
        // dd($img);
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/slider_images/', $imgName);
            // $img = Image::make(public_path('upload/slider_images/').$imgName);
            // $img->resize(1140,292)->save(public_path('upload/slider_images/').$imgName);
            $slider_data['image'] = $imgName;
        }
        $slider_data->slider_category_id  = $request->slider_category_id;
        $slider_data->hover_title_1  = $request->hover_title_1;
        $slider_data->hover_title_2  = $request->hover_title_2;
        $slider_data->slider_title  = $request->slider_title;

        $slider_data->save();

        return response()->json(['success'=>'Slider is successfully Uploaded!']);

    }

    public function typeWiseSlideView($id)
    {
        // category_name
        $category_name = SliderCategory::find($id);

        $sliders = Slider::where('slider_category_id',$id)->get();
        // return $sliders;

        return view('backend.homepage.slider.slider_view',compact('sliders','category_name'));
    }

    public function typeWiseSlideEdit($id)
    {
        $editData = Slider::find($id);
        // return $editData;
        return view('backend.homepage.slider.slider_edit',compact('editData'));
    }

    public function sliderWiseUpdate(Request $request)
    {
        $edit = Slider::find($request->slider_id);

        $edit->hover_title_1 = $request->hover_title_1;
        $edit->hover_title_2 = $request->hover_title_2;
        $edit->slider_title  = $request->slider_title;
        $edit->save();

        return response()->json(['success'=>'Slider Updated']);


    }
}
