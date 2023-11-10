<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;

use Illuminate\Http\UploadedFile;
use App\Models\Profile;

class ProfileFromDatabaseController extends Controller
{
    public function index()
    {
        // $profile_bup_nos = Profile::pluck('bup_no')->toArray();
        // $client = new \GuzzleHttp\Client();
        // $res = $client->request('GET','http://103.121.194.29/BUPWebApi/api/GetFacultyDepartmentWiseProfile?departmentId=0&facultyId=0');
        // $apiDatas = json_decode($res->getBody()->getContents(), true);

        // $clientdatas = [];
        // foreach($apiDatas as $key=>$apiData) {
        //     if(in_array($apiData['BupNo'], $profile_bup_nos))
        //     $clientdatas[] = $apiData;
        // }
        $data['profiles'] = Profile::all();
        
        return view('backend.manage_profile.from_database.view',$data);
    }

    public function updatedListInfacultyApi()
    {
        $profile_bup_nos = Profile::pluck('bup_no')->toArray();
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','https://api.bup.edu.bd/api/GetFacultyDepartmentWiseProfile?departmentId=0&facultyId=0');
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        foreach($apiDatas as $key=>$apiData) {
            if(in_array($apiData['BupNo'], $profile_bup_nos))
            $clientdatas[] = $apiData;
        }
    	//$data['profiles'] = Profile::all();
        return view('backend.manage_profile.from_database.updated_list_in_faculty_api',compact('clientdatas'));
    }

    public function insertAllToDB()
    {
        $profile_bup_nos = Profile::pluck('bup_no')->toArray();
        //dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','https://api.bup.edu.bd/api/GetFacultyDepartmentWiseProfile?departmentId=0&facultyId=0');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        foreach($apiDatas as $key=>$apiData) {
            #$desing->desing_id return me for example: hc1wXBL7zCsdfMu
            if(!in_array($apiData['BupNo'], $profile_bup_nos))
            $clientdatas[] = $apiData;
        }
        //dd($clientdatas);
        foreach($clientdatas as $clientdata)
        {
            //$employee = Profile::firstOrNew(['id' => $clientdata['ID']]);
            $profile = new Profile;
            // $profile->faculty_id = $clientdata['FacultyId'] ?? NULL;
            // $profile->department_id = $clientdata['DepartmentId'] ?? NULL;
            // $profile->office_id = $clientdata['OfficeID'] ?? NULL;
            $profile->bup_no = $clientdata['BupNo'] ?? NULL;
            $profile->nameEn = $clientdata['NameEng'] ?? NULL;
            $profile->nameBn = $clientdata['NameBng'] ?? NULL;
            $profile->email = $clientdata['Email'] ?? NULL;
            $profile->designation = $clientdata['Designation'] ?? NULL;
            $profile->phone = $clientdata['Phone'] ?? NULL;
            $profile->mobile = $clientdata['Mobile'] ?? NULL;
            $profile->blood_group = $clientdata['BloodGroup'] ?? NULL;
            $profile->rank = $clientdata['Rank'] ?? NULL;
            $profile->appointment_type = $clientdata['AppointmentType'] ?? NULL;
            $profile->detail_education = $clientdata['DetailEducation'] ?? NULL;
            $profile->experience = $clientdata['Experience'] ?? NULL;
            $profile->photo_path = $clientdata['PhotoPath'] ?? NULL;
            $profile->save();
        }
        return redirect()->back()->with('success','Data Inserted Successfully');
    }

    public function Add()
    {
    	return view('backend.manage_profile.from_database.add_profile');
    }

    public function Store(Request $request)
    {
        // return $request->all();
        $request->validate([
            'nameEn' => 'required',
            'bup_no' => 'unique:profiles',
            'photo_path' => 'mimes:jpg,jpeg,png'
        ]);

    	$profile = new Profile;
        // $profile->faculty_id = $request->faculty_id;
        // $profile->department_id = $request->department_id;
        // $profile->office_id = $request->office_id;
        $profile->bup_no = $request->bup_no;
        $profile->nameEn = $request->nameEn;
        $profile->nameBn = $request->nameBn;
        $profile->email = $request->email;
        $profile->designation = $request->designation;
        $profile->phone = $request->phone;
        $profile->mobile = $request->mobile;
        $profile->blood_group = $request->blood_group;
        $profile->rank = $request->rank;
        $profile->appointment_type = $request->appointment_type;
        $profile->detail_education = $request->detail_education;
        $profile->experience = $request->experience;

    	$img = $request->file('photo');
        if ($img) {
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/profiles/', $imgName);
            $profile['photo'] = $imgName;
        }
        $profile->save();
    	return redirect()->route('manage_profile.from_database')->with('success','Data Saved successfully');
    }

    public function viewSingleProfile($BupNo)
    {
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','http://103.121.194.29/BUPWebApi/api/GetIndividualFacultyProfile?bupNo='.$BupNo);
        // dd($res);
        $clientdatas = json_decode($res->getBody()->getContents(), true);
        //dd($clientdatas);
        return view('backend.manage_profile.from_api.view_single_profile',compact('clientdatas'));
    }

    public function Edit($id)
    {
    	$data['editData'] = Profile::find($id);
    	return view('backend.manage_profile.from_database.add_profile',$data);
    }

    public function Update(Request $request,$id)
    {
        $request->validate([
            'nameEn' => 'required',
            // 'name' => 'required',
        ]);
    	$profile = Profile::find($id);
        // $profile->faculty_id = $request->faculty_id;
        // $profile->department_id = $request->department_id;
        // $profile->office_id = $request->office_id;
        $profile->bup_no = $request->bup_no;
        $profile->nameEn = $request->nameEn;
        $profile->nameBn = $request->nameBn;
        $profile->email = $request->email;
        $profile->designation = $request->designation;
        $profile->phone = $request->phone;
        $profile->mobile = $request->mobile;
        $profile->blood_group = $request->blood_group;
        $profile->rank = $request->rank;
        $profile->appointment_type = $request->appointment_type;
        $profile->detail_education = $request->detail_education;
        $profile->experience = $request->experience;
    	$img = $request->file('photo');
        if ($img) {
            if($profile->photo)
            {
                @unlink(public_path('upload/profiles/'.$profile->photo));
            }
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/profiles/', $imgName);
            $profile['photo'] = $imgName;
        }
        $profile->save();
    	return redirect()->route('manage_profile.from_database')->with('success','Data Updated successfully');
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

    public function editModifiedPersonnels($BupNo)
    {
        //dd($BupNo);
        $data['editData'] = Profile::where('bup_no',$BupNo)->first();

        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','http://103.121.194.29/BUPWebApi/api/GetIndividualFacultyProfile?bupNo='.$BupNo);
        $data['apiDatas'] = json_decode($res->getBody()->getContents(), true);
        //dd($data['apiDatas']);
    	return view('backend.manage_profile.from_database.edit_modified_personnels',$data);
    }

    public function updateModifiedPersonnels($BupNo, Request $request)
    {
        $request->validate([
            'nameEn' => 'required',
            // 'name' => 'required',
        ]);
    	$profile = Profile::where('bup_no',$BupNo)->first();
        // $profile->faculty_id = $request->faculty_id;
        // $profile->department_id = $request->department_id;
        // $profile->office_id = $request->office_id;
        $profile->bup_no = $request->bup_no;
        $profile->nameEn = $request->nameEn;
        $profile->nameBn = $request->nameBn;
        $profile->email = $request->email;
        $profile->designation = $request->designation;
        $profile->phone = $request->phone;
        $profile->mobile = $request->mobile;
        $profile->blood_group = $request->blood_group;
        $profile->rank = $request->rank;
        $profile->appointment_type = $request->appointment_type;
        $profile->detail_education = $request->detail_education;
        $profile->experience = $request->experience;
    	$img = $request->file('photo');
        if($img) {
            if($profile->photo)
            {
                @unlink(public_path('upload/profiles/'.$profile->photo));
            }
            $imgName = date('YmdHi').$img->getClientOriginalName();
            $img->move('public/upload/profiles/', $imgName);
            $profile['photo'] = $imgName;
        }
        $profile->save();
    	return redirect()->route('manage_profile.from_database.updated_list_in_faculty_api')->with('success','Data Updated successfully');
    }
}
