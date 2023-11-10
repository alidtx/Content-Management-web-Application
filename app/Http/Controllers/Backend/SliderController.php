<?php

namespace App\Http\Controllers\Backend;

use App\Helpers\ImageHelper;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SliderVideo;
use Image;

class SliderController extends Controller
{
    public function index($slider_master_id)
    {
    	$data['slider'] = Slider::where('slider_master_id',$slider_master_id)->orderBy('id','desc')->get();
        $data['slider_master_id'] = $slider_master_id;
    	return view('backend.slider.slider-view')->with($data);
    }

    public function addSlider($slider_master_id)
    {
        $data['slider_master_id'] = $slider_master_id;
    	return view('backend.slider.slider-add',$data);
    }

    public function storeSlider(Request $request)
    {

    	$request->validate([
    		'image' => 'required|mimes:jpg,png',
    	]);
        $params = $request->all();

        $params['show_description'] = $request->show_description ?? 0;
    	if ($file = $request->file('image'))
        {
            $config = array(
                'name'      => "image",
                'path'      => 'upload/slider',
                'width'     => 1920,
                'height'    => 610
            );
            $image = ImageHelper::uploadImage($config);
            $params['image'] = $image['filename'];
        }
        // dd($params);
    	Slider::create($params);
    	return redirect()->route('site-setting.slider',$request->slider_master_id)->with('info','New Slider Upload Successfully.');


    }

    public function editSlider($slider_master_id,$id)
    {
    	$data['editData'] = Slider::where('slider_master_id',$slider_master_id)->where('id',$id)->firstOrFail();
        $data['slider_master_id'] = $slider_master_id;
    	return view('backend.slider.slider-add')->with($data);
    }

    public function updateSlider(Request $request, $id)
    {
        $request->validate([
    		'image' => 'mimes:jpg,png',
        ]);
    	$data = Slider::find($id);
        $params = $request->all();
        $params['show_description'] = $request->show_description ?? 0;
    	if ($file = $request->file('image'))
        {
            @unlink(public_path('upload/slider/'.$data->image));
            $config = array(
                'name'      => "image",
                'path'      => 'upload/slider',
                //'width'     => 1920,
                //'height'    => 610
            );
            $image = ImageHelper::uploadImage($config);
            $params['image'] = $image['filename'];
        }
    	$data->update($params);

    	return redirect()->route('site-setting.slider',$request->slider_master_id)->with('info','Slider Update Successfully');

    }

    public function deleteSlider(Request $request)
    {
    	$data = Slider::find($request->id);
    	$data->delete();

    }

    public function storeSliderVideo(Request $request)
    {
        $data = SliderVideo::first();
        $params = $request->all();
        $params['show_video'] = $request->show_video ?? 0;
        $params['opacity'] = $request->opacity;
        if($request->hasFile('video'))
        {
            if(!empty($data))
            {
                @unlink(public_path('upload/slider/'.$data->video));
            }
            $path = $request->file('video')->store('videos', ['disk' => 'my_files']);
            $params['video'] = $path;
        }
        if(!empty($data))
        {
            $data->update($params);
        }
        else
        {
            SliderVideo::create($params);
        }
    	return redirect()->back()->with('info','Saved Successfully.');
    }
}
