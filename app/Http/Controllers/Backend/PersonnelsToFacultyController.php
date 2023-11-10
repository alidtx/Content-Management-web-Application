<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\PersonnelsToFaculty;
use App\Services\PersonnelsToFacultyService;

class PersonnelsToFacultyController extends Controller
{
    public function index()
    {
        $data['profiles'] = PersonnelsToFaculty::with('profile')->get();

        // return $data['profiles'];

        return view('backend.manage_profile.personnels_to_faculty.view',$data);
    }

    public function Add()
    {
    	return view('backend.manage_profile.personnels_to_faculty.add');
    }

    public function Store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'profile_id' => 'required',
            'faculty_id' => 'required',
            'department_id' => 'required',
            // 'photo_path' => 'mimes:jpg,jpeg,png'
        ]);
        $params = $request->all();
        PersonnelsToFaculty::create($params);

    	return redirect()->route('manage_profile.personnels_to_faculty')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
    	$data['editData'] = PersonnelsToFaculty::find($id);
    	return view('backend.manage_profile.personnels_to_faculty.add',$data);
    }

    public function Update(Request $request,$id)
    {
        $request->validate([
            // 'name' => 'required',
        ]);
        $params = $request->all();
        $data = PersonnelsToFaculty::find($id);
        $data->update($params);

    	return redirect()->route('manage_profile.personnels_to_faculty')->with('success','Data Saved successfully');
    }

    public function Delete(Request $request)
    {
    	$data = PersonnelsToFaculty::find($request->id);
    	// if (file_exists('public/upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('public/upload/slider_images/' . $data->image);
        // }
        $data->delete();

        return redirect()->route('manage_profile.personnels_to_faculty')->with('success','Data Deleted successfully');
    }

    public function status_change(Request $request, PersonnelsToFacultyService $PersonnelsToFaculty)
    {

        $PersonnelsToFaculty->statusChangeEvent($request);

        return redirect()->route('manage_profile.personnels_to_faculty')->with('success', 'Status Update Successfully');
    }
}
