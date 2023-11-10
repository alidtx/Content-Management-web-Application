<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\SliderMaster;
use App\Models\SliderVideo;
use Image;

class SliderMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data['sliderMaster'] = SliderMaster::get();
        return view('backend.slider_master.slider-master-view')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add()
    {
        return view('backend.slider_master.slider-master-add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
    		'name' => 'required',
    		'animation_type' => 'required',

    	]);
        // $params = $request->all();
        // dd($params);
        $sliderType = new SliderMaster;
        $sliderType->name = $request->name;
        $sliderType->animation_type = $request->animation_type;
        $sliderType->slider_type = $request->slider_type;

        // dd($sliderType);
        $sliderType->save();

    	return redirect()->route('site-setting.slider-master')->with('success','New Slider Type Saved Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['editData'] = SliderMaster::find($id);
    	return view('backend.slider_master.slider-master-add')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
    		'name' => 'required',
    		'animation_type' => 'required',

    	]);
        // $params = $request->all();
        // dd($params);
    	$sliderType = SliderMaster::find($id);

        // $sliderType = new SliderMaster;
        $sliderType->name = $request->name;
        $sliderType->animation_type = $request->animation_type;
        $sliderType->slider_type = $request->slider_type;

        // dd($sliderType);
        $sliderType->save();

    	return redirect()->route('site-setting.slider-master')->with('info','Slider Type Updated Successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $data = SliderMaster::find($request->id);
    	$data->delete();
    }
}
