<?php

namespace App\Http\Controllers\Backend\Homepage;

use App\Http\Controllers\Controller;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    public function index()
    {
    	$data['allData'] = Event::all();
    	return view('backend.homepage.event.view-event',$data);
    }

    public function Add()
    {
    	return view('backend.homepage.event.add-event');
    }

    public function Store(Request $request)
    {
        // return $request->all();

        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

    	$data = new Event();
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

    public function Edit($id)
    {
    	$data['editData'] = Event::find($id);
    	return view('backend.homepage.event.add-event',$data);
    }

    public function sliderUpdate(Request $request,$id)
    {
        $request->validate([
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);
    	$data = Event::find($id);
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
    	return redirect()->route('homepages.event')->with('success','Data Updated successfully');
    }

    public function Delete(Request $request)
    {
    	$data = Event::find($request->id);
    	if (file_exists('public/upload/slider_images/' . $data->image) AND ! empty($data->image)) {
            unlink('public/upload/slider_images/' . $data->image);
        }
        $data->delete();

        return redirect()->route('homepages.event')->with('success','Data Deleted successfully');
    }
}
