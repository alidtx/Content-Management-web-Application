<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PersonnelsToOffice;
use App\Services\PersonnelsToOfficeService;

class PersonnelsToOfficeController extends Controller
{
    public function index()
    {
    	 $data['profiles'] = PersonnelsToOffice::with('profile')->get();

        return view('backend.manage_profile.personnels_to_office.view',$data);
    }

    public function Add()
    {
    	return view('backend.manage_profile.personnels_to_office.add');
    }

    public function Store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
            'office_id' => 'required',
            // 'photo_path' => 'mimes:jpg,jpeg,png'
        ]);
        $params = $request->all();
        PersonnelsToOffice::create($params);

    	return redirect()->route('manage_profile.personnels_to_office')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
    	$data['editData'] = PersonnelsToOffice::find($id);
    	return view('backend.manage_profile.personnels_to_office.add',$data);
    }

    public function Update(Request $request,$id)
    {
        $request->validate([
            // 'name' => 'required',
        ]);
        $params = $request->all();
        $data = PersonnelsToOffice::find($id);
        $data->update($params);

    	return redirect()->route('manage_profile.personnels_to_office')->with('success','Data Saved successfully');
    }

    public function Delete(Request $request)
    {
    	$data = PersonnelsToOffice::find($request->id);
    	// if (file_exists('public/upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('public/upload/slider_images/' . $data->image);
        // }
        $data->delete();

        return redirect()->route('manage_profile.personnels_to_office')->with('success','Data Deleted successfully');
    }

    public function status_change(Request $request, PersonnelsToOfficeService $PersonnelsToOffice)
    {

        $PersonnelsToOffice->statusChangeEvent($request);

        return redirect()->route('manage_profile.personnels_to_office')->with('success', 'Status Update Successfully');
    }
}
