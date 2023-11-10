<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Services\DepartmentService;
use App\Services\FacultyService;
use App\Models\Faculty;
use Illuminate\Http\Request;

class ManageDepartmentController extends Controller
{
    public function index()
    {
    	//$data = Department::with('faculty')->oldest()->get();
        $faculties = FacultyService::All();
        //dd($faculties);
        return view('backend.manage_department.view',compact('faculties'));
    }

    public function Add()
    {
    	return view('backend.manage_department.add');
    }

    public function Store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'faculty_id' => 'required',
            'name' => 'required|unique:departments',
            // 'ucam_department_id' => 'unique:departments'
        ],[
            'faculty_id.required' => 'You have to choose Faculty',
        ]);

    	$data = new Department();
        $data->faculty_id = $request->faculty_id;
        $data->name = $request->name;
        $data->ucam_department_id = $request->ucam_department_id;
        $data->about = $request->about;
        $data->profile_id = $request->profile_id;
        $data->slider_id = $request->slider_id;
        $data->location = $request->location;
        $data->contact = $request->contact;
        $data->sort_order = $request->sort_order;
        $data->status = $request->status;
    	// $img = $request->file('image');
        // if ($img) {
        //     $imgName = date('YmdHi').$img->getClientOriginalName();
        //     $img->move('public/upload/slider_images/', $imgName);
        //     $data['image'] = $imgName;
        // }
        // $data->created_by = Auth::user()->id;
        // dd($data);
        // $data->save();
    	return redirect()->route('setup.manage_department')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
    	$data['editData'] = Department::find($id);
    	return view('backend.manage_department.add',$data);
    }

    public function Update(Request $request,$id)
    {
        $request->validate([
            'faculty_id' => 'required',
            'name' => 'required',
        ]);
    	$data = Department::find($id);
        $data->faculty_id = $request->faculty_id;
        $data->name = $request->name;
        $data->ucam_department_id = $request->ucam_department_id;
        $data->about = $request->about;
        $data->profile_id = $request->profile_id;
        $data->slider_id = $request->slider_id;
        $data->location = $request->location;
        $data->contact = $request->contact;
        $data->sort_order = $request->sort_order;
        $data->status = $request->status;
    	// $img = $request->file('image');
        // if ($img) {
        //     @unlink(public_path('upload/slider_images/'.$data->image));
        //     $imgName = date('YmdHi').$img->getClientOriginalName();
        //     $img->move('public/upload/slider_images/', $imgName);
        //     $data['image'] = $imgName;
        // }
        // $data->updated_by = Auth::user()->id;
        $data->save();
    	return redirect()->route('setup.manage_department')->with('success','Data Updated successfully');
    }

    public function Delete(Request $request)
    {
    	$data = Department::find($request->id);
    	// if (file_exists('public/upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('public/upload/slider_images/' . $data->image);
        // }
        $data->delete();

        return redirect()->route('setup.manage_department')->with('success','Data Deleted successfully');
    }

    public function newDepartmentFromApi()
    {
        $ucam_department_ids = Department::pluck('ucam_department_id')->toArray();

        //dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','https://api.bup.edu.bd/api/GetFacultyDepartmentWiseProfile?departmentId=0&facultyId=0');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        $uniqueDepartmentIds = [];
        foreach($apiDatas as $key=>$apiData) {
            if(!in_array($apiData['DepartmentId'], $ucam_department_ids) && $apiData['FacultyId'] != NULL  && $apiData['DepartmentId'] != NULL)
            {
                if(!in_array($apiData['DepartmentId'], $uniqueDepartmentIds))
                {
                    $uniqueDepartmentIds[] = $apiData['DepartmentId'];
                    $clientdatas[] = $apiData;
                }
            }
        }
        //dd($uniqueFacultyIds);
        return view('backend.manage_department.for_api.new_department_from_api',compact('clientdatas'));
    }

    public function insertAllToDB()
    {
        $ucam_department_ids = Department::pluck('ucam_department_id')->toArray();

        //dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','https://api.bup.edu.bd/api/GetFacultyDepartmentWiseProfile?departmentId=0&facultyId=0');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        $uniqueDepartmentIds = [];
        foreach($apiDatas as $key=>$apiData) {
            if(!in_array($apiData['DepartmentId'], $ucam_department_ids) && $apiData['FacultyId'] != NULL  && $apiData['DepartmentId'] != NULL)
            {
                if(!in_array($apiData['DepartmentId'], $uniqueDepartmentIds))
                {
                    $uniqueDepartmentIds[] = $apiData['DepartmentId'];
                    $clientdatas[] = $apiData;
                }
            }
        }
        //dd($uniqueFacultyIds);
        foreach($clientdatas as $clientdata)
        {
            //$employee = Profile::firstOrNew(['id' => $clientdata['ID']]);
            $department = new Department;
            $department->name = $clientdata['Department'] ?? NULL;
            $department->ucam_department_id = $clientdata['DepartmentId'] ?? NULL;
            $department->faculty_id = FacultyService::ExistCheck($clientdata['FacultyId'],$clientdata['Department']) ?? NULL;
            $department->save();
        }
        return redirect()->back()->with('success','Data Inserted Successfully');
    }
}
