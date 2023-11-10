<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Image;

class ManageFacultyController extends Controller
{
    public function index()
    {
    	$data = Faculty::oldest()->get();
        return view('backend.manage_faculty.view_faculty',compact('data'));
    }

    public function Add()
    {
    	return view('backend.manage_faculty.add_faculty');
    }

    public function Store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name' => 'required|unique:faculties',
            'email' => 'required|unique:faculties,email',
            'image' => 'mimes:jpg,png,jpeg'
        ]);

    	$data = new Faculty();
        $data->name = $request->name;
        $data->ucam_faculty_id = $request->ucam_faculty_id;
        $data->about = $request->about;
        $data->profile_id = $request->profile_id;
        $data->slider_id = $request->slider_id;
        $data->location = $request->location;
        $data->contact = $request->contact;
        $data->email = $request->email;
        $data->room_no = $request->room_no;
        $data->sort_order = $request->sort_order;
        $data->tamplate = $request->tamplate;
        $data->status = $request->status;
    	$img = $request->file('image');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/faculty/', $imgName);
            $image=Image::make(public_path('upload/faculty/').$imgName);
            $image->resize(430,260)->save(public_path('upload/faculty/').$imgName);
            $data['image'] = $imgName;
        }
        // $data->created_by = Auth::user()->id;
        // dd($data);
        $data->save();
    	return redirect()->route('setup.manage_faculty')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
    	$data['editData'] = Faculty::find($id);
    	return view('backend.manage_faculty.add_faculty',$data);
    }

    public function Update(Request $request,$id)
    {
        // return $request->all();
        $request->validate([
            'name' => 'required|unique:faculties,name,'.$id,
            'email' => 'required|unique:faculties,email,'.$id,
            'image' => 'mimes:jpg,png,jpeg'
        ]);

    	$data = Faculty::find($id);
        $data->name = $request->name;
        $data->ucam_faculty_id = $request->ucam_faculty_id;
        $data->about = $request->about;
        $data->profile_id = $request->profile_id;
        $data->slider_id = $request->slider_id;
        $data->location = $request->location;
        $data->contact = $request->contact;
        $data->email = $request->email;
        $data->room_no = $request->room_no;
        $data->sort_order = $request->sort_order;
        $data->tamplate = $request->tamplate;
        $data->status = $request->status;
    	$img = $request->file('image');
        if ($img) {
            @unlink(public_path('upload/faculty/'.$data->image));
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/faculty/', $imgName);
            $image=Image::make(public_path('upload/faculty/').$imgName);
            $image->resize(245,225)->save(public_path('upload/faculty/').$imgName);
            $data['image'] = $imgName;
        }
        // $data->updated_by = Auth::user()->id;
        // dd($data);
        $data->save();
    	return redirect()->route('setup.manage_faculty')->with('success','Data Updated successfully');
    }

    public function Delete(Request $request)
    {
    	$data = Faculty::find($request->id);
    	// if (file_exists('public/upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('public/upload/slider_images/' . $data->image);
        // }
        $data->delete();

        return redirect()->route('setup.manage_faculty')->with('success','Data Deleted successfully');
    }

    public function newFacultyFromApi()
    {
        $ucam_faculty_ids = Faculty::pluck('ucam_faculty_id')->toArray();

        //dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','https://api.bup.edu.bd/api/GetFacultyDepartmentWiseProfile?departmentId=0&facultyId=0');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        $uniqueFacultyIds = [];
        foreach($apiDatas as $key=>$apiData) {
            if(!in_array($apiData['FacultyId'], $ucam_faculty_ids) && $apiData['FacultyId'] != NULL)
            {
                if(!in_array($apiData['FacultyId'], $uniqueFacultyIds))
                {
                    $uniqueFacultyIds[] = $apiData['FacultyId'];
                    $clientdatas[] = $apiData;
                }
            }
        }
        //dd($uniqueFacultyIds);
        return view('backend.manage_faculty.for_api.new_faculty_from_api',compact('clientdatas'));
    }

    public function insertAllToDB()
    {
        $ucam_faculty_ids = Faculty::pluck('ucam_faculty_id')->toArray();

        //dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','https://api.bup.edu.bd/api/GetFacultyDepartmentWiseProfile?departmentId=0&facultyId=0');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        $uniqueFacultyIds = [];
        foreach($apiDatas as $key=>$apiData) {
            if(!in_array($apiData['FacultyId'], $ucam_faculty_ids) && $apiData['FacultyId'] != NULL)
            {
                if(!in_array($apiData['FacultyId'], $uniqueFacultyIds))
                {
                    $uniqueFacultyIds[] = $apiData['FacultyId'];
                    $clientdatas[] = $apiData;
                }
            }
        }
        //dd($uniqueFacultyIds);
        foreach($clientdatas as $clientdata)
        {
            //$employee = Profile::firstOrNew(['id' => $clientdata['ID']]);
            $faculty = new Faculty;
            $faculty->name = $clientdata['Faculty'] ?? NULL;
            $faculty->ucam_faculty_id = $clientdata['FacultyId'] ?? NULL;
            $faculty->save();
        }
        return redirect()->back()->with('success','Data Inserted Successfully');
    }
}
