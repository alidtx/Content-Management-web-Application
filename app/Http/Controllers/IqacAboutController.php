<?php

namespace App\Http\Controllers;
use App\Models\iqacAbout;
use Illuminate\Http\Request;

class IqacAboutController extends Controller
{


    public function index()
    {
    	$data['IQACabouts']=IQACabout::get();
        return view('backend.iqac_about.list',$data);
    }


    public function add()
    {
    	return view('backend.iqac_about.add');
    }



    public function store(Request $request)
    {
        // return $request->all();
        $request->validate([

            'short_description' => 'required',
            'image' =>'required|mimes:jpeg,jpg,png',

        ]);

    	$data           = new IQACabout();
        $data->type     = $request->type;
        $data->description	     = $request->short_description;

        if($request->hasfile('image')){
            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/igabout',$image_name);
            $data->image=$image_name;
        }
        $data->save();
    	return redirect()->route('manage_iqac_about')->with('success','Data Saved successfully');
    }


    public function edit($id)
    {

    	$data['editData'] = IQACabout::find($id);
    	return view('backend.iqac_about.edit',$data);
    }

    public function update(Request $request,$id)
    {


        $request->validate([
            'short_description' => 'required',
            'image' => 'mimes:jpeg,jpg,png',
        ]);

    	$data           = IQACabout::find($id);
        $data->type     = $request->type;
        $data->description	     = $request->short_description;

        if($request->hasfile('image')){

            $image=$request->file('image');
            $ext=$image->extension();
            $image_name=time().'.'.$ext;
            $image->storeAs('/public/media/igabout',$image_name);
            $data->image=$image_name;
        }

        $data->save();
    	return redirect()->route('manage_iqac_about')->with('success','Data Updated successfully');
    }

    public function delete(Request $request)
    {
    	$data = IQACabout::find($request->id);
        $data->delete();
        return redirect()->route('manage_iqac_about')->with('success','Data Deleted successfully');
    }






}
