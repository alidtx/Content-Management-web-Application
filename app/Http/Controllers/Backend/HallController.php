<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\Hall;
use App\Models\SliderMaster;
use Illuminate\Support\Facades\DB;
use App\Models\Profile;
use Storage;

use Illuminate\Http\Request;

class HallController extends Controller
{

    public function index()
    {
    	$data['hall']= Hall::with('provostProfile')->get();
        return view('backend.manage_hall.view',$data);
    }


    public function Add()
    {
        $data['sliderMaster'] = SliderMaster::get();
        $data['provost']=Profile::get();
    	return view('backend.manage_hall.add', $data);
    }

    public function Store(Request $request)
    {
       //return $request->all();

        $request->validate([

          'hall_name'=>'required',
          'email'=>'required|email',
          'location'=>'required',
          'contact_number'=>'required',
          'short_url'=>'required',
          'image'=>'required|mimes:jpg,jpeg,png',

        ]);


    	$data = new Hall();
        $data->name = $request->hall_name;
        $data->email = $request->email;
        $data->contact_number = $request->contact_number;
        $data->location = $request->location;
        $data->slider_master_id = $request->slider_id;
        $data->sort_oder = $request->sort_order;
        $data->provost = $request->provost;
        $data->status = $request->status;
        $data->short_url = $request->short_url;
        $data->image = $request->image;

        if ($request->hasfile('image')) {


            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('/public/media/hall', $image_name);
            $data->image = $image_name;
        }

        $data->save();
    	return redirect()->route('setup.manage_hall')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {

    	$data['editData'] = Hall::find($id);
        $data['faculty'] = SliderMaster::get();
        $data['provost']=Profile::get();
    	return view('backend.manage_hall.edit',$data);
    }



    public function Update(Request $request,$id)
    {
        //return $request->all();
    	$data = Hall::find($id);
        $data->name = $request->hall_name;
        $data->email = $request->email;
        $data->contact_number = $request->contact_number;
        $data->location = $request->location;
        $data->slider_master_id = $request->slider_id;
        $data->sort_oder = $request->sort_order;
        $data->provost = $request->provost;
        $data->status = $request->status;
        $data->short_url = $request->short_url;


        if ($request->hasfile('image')) {

            if ($request->post('id') > 0) {

                $arrImage = DB::table('halls')->where(['id' => $request->post('id')])->get();

                if (Storage::exists('/public/media/hall/' . $arrImage[0]->image)) {

                    Storage::delete('/public/media/hall/' . $arrImage[0]->image);
                }
            }

            $image = $request->file('image');
            $ext = $image->extension();
            $image_name = time() . '.' . $ext;
            $image->storeAs('/public/media/hall', $image_name);
            $data->image = $image_name;
        }

        // $data->image = $request->image;
        $data->save();
    	return redirect()->route('setup.manage_hall')->with('success','Data Updated successfully');
    }




}
