<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\ProgramCategory;

class ProgramCategoryController extends Controller
{
    public function index()
    {
    	$data['allCategories'] = ProgramCategory::all();

        return view('backend.program_category.view',$data);
    }

    public function Add()
    {
    	return view('backend.program_category.add');
    }

    public function Store(Request $request)
    {
        // $request->validate([
        //     'image' => 'required|mimes:jpg,jpeg,png'
        // ]);

        $params = $request->all();

        ProgramCategory::create($params);

    	return redirect()->route('setup.program_category')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
    	$data['editData'] = ProgramCategory::find($id);
    	return view('backend.program_category.add',$data);
    }

    public function Update(Request $request,$id)
    {
        // $request->validate([
        //     'image' => 'required|mimes:jpg,jpeg,png'
        // ]);
        $data = ProgramCategory::find($id);

        $params = $request->all();

        $data->update($params);

    	return redirect()->route('setup.program_category')->with('success','Data Updated successfully');
    }

    public function Delete(Request $request)
    {
    	$data = ProgramCategory::find($request->id);
        $data->delete();

        return redirect()->route('setup.program_category')->with('success','Data Deleted successfully');
    }


    
}
