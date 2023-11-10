<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Page;

class CustomPageController extends Controller
{


    public function index()
    {
    	$data['custom_pages'] = Page::all();

        return view('backend.custom_page.view', $data);
    }

    public function Add()
    {
    	return view('backend.custom_page.add');
    }

    public function Store(Request $request)
    {
        $request->validate([
            // 'logo' => 'required|mimes:jpg,jpeg,png'
        ]);

    	$params = $request->all();
        Page::create($params);
    	return redirect()->route('setup.custom_page')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['editData'] = Page::find($id);
    	return view('backend.custom_page.add',$data);
    }

    public function Update(Request $request,$id)
    {
        // $request->validate([
        //     'image' => 'required|mimes:jpg,jpeg,png'
        // ]);
        $data = Page::find($id);
        $params = $request->all();
        $data->update($params);
    	return redirect()->route('setup.custom_page')->with('success','Data Updated successfully');
    }

    public function Delete(Request $request)
    {
    	$data = Page::find($request->id);
        $data->delete();

        return redirect()->route('setup.custom_page')->with('success','Data Deleted successfully');
    }



}
