<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Designation;

class DesignationController extends Controller
{

    public function index(){
    	$data['designations'] = Designation::get();
    	return view('backend.designation.view-designation',$data);
        
    }

    public function add()
    {
    	return view('backend.designation.add-designation');
    }

    public function store(Request $request)
    {

    //   dd($request->all());

        $request->validate([

        ]);


        $data = new Designation();
        $data->name = $request->name;
        $data->purpose = $request->purpose;
        $data->status = $request->status;
        $data->layer = $request->layer;
        $data->sort_order = $request->sort_order;
        $data->save();

    	return redirect()->route('user.designation')->with('success','Data Saved successfully');
    }

    public function edit($id)
    {
        $data['editData'] = Designation::find($id);
        return view('backend.designation.add-designation',$data);
    }

    public function update(Request $request,$id)
    {
        $request->validate([

        ]);
        $data = Designation::find($id);
        $data->name = $request->name;
        $data->purpose = $request->purpose;
        $data->status = $request->status;
        $data->layer = $request->layer;
        $data->sort_order = $request->sort_order;
        $data->save();
        return redirect()->route('user.designation')->with('success','Data Updated successfully');
    }

    public function delete(Request $request)
    {
        $user = Designation::find($request->id);
        $user->delete();
        return redirect()->route('user.designation')->with('success','Data Deleted successfully');
    }
}
