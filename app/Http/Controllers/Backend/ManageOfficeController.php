<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Office;

class ManageOfficeController extends Controller
{
    public function index()
    {
    	$data = Office::all();
        return view('backend.manage_office.view_office',compact('data'));
    }

    public function Add()
    {
    	return view('backend.manage_office.add_office');
    }

    public function Store(Request $request)
    {
        // return $request->all(); 
        $request->validate([
            'name' => 'required|unique:offices',
            'ucam_office_id' => 'required|unique:offices'
        ]);

    	$data = new Office();
        $data->name = $request->name;
        $data->ucam_office_id = $request->ucam_office_id;
        $data->about = $request->about;
        $data->profile_id = $request->profile_id;
        $data->slider_id = $request->slider_id;
        $data->location = $request->location;
        $data->contact = $request->contact;
        $data->sort_order = $request->sort_order;
        $data->status = $request->status;
        $data->save();
    	return redirect()->route('setup.manage_office')->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
    	$data['editData'] = Office::find($id);
    	return view('backend.manage_office.add_office',$data);
    }

    public function Update(Request $request,$id)
    {
        $request->validate([
            'name' => 'required',
            'ucam_office_id' => 'required'
        ]);
    	$data = Office::find($id);
        $data->name = $request->name;
        $data->ucam_office_id = $request->ucam_office_id;
        $data->about = $request->about;
        $data->profile_id = $request->profile_id;
        $data->slider_id = $request->slider_id;
        $data->location = $request->location;
        $data->contact = $request->contact;
        $data->sort_order = $request->sort_order;
        $data->status = $request->status;
        $data->save();
    	return redirect()->route('setup.manage_office')->with('success','Data Updated successfully');
    }

    public function Delete(Request $request)
    {
    	$data = Office::find($request->id);
    	// if (file_exists('public/upload/slider_images/' . $data->image) AND ! empty($data->image)) {
        //     unlink('public/upload/slider_images/' . $data->image);
        // }
        $data->delete();

        return redirect()->route('setup.manage_office')->with('success','Data Deleted successfully');
    }

    public function newOfficeFromApi()
    {
        $ucam_office_ids = Office::pluck('ucam_office_id')->toArray();
       
        //dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','https://api.bup.edu.bd/api/GetOfficeEmployeeProfile?officeId=0&page=0&size=0');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        $uniqueOfficeIDs = [];
        foreach($apiDatas as $key=>$apiData) {
            if(!in_array($apiData['OfficeID'], $ucam_office_ids) && $apiData['OfficeID'] != NULL)
            {
                if(!in_array($apiData['OfficeID'], $uniqueOfficeIDs))
                {
                    $uniqueOfficeIDs[] = $apiData['OfficeID'];
                    $clientdatas[] = $apiData;
                }
            }
        }
        //dd($uniqueOfficeIDs);
        return view('backend.manage_office.for_api.new_office_from_api',compact('clientdatas'));
    }

    public function insertAllToDB()
    {
        $ucam_office_ids = Office::pluck('ucam_office_id')->toArray();
       
        //dd($profile_bup_nos);
        $client = new \GuzzleHttp\Client();
        $res = $client->request('GET','https://api.bup.edu.bd/api/GetOfficeEmployeeProfile?officeId=0&page=0&size=0');
        // dd($res);
        $apiDatas = json_decode($res->getBody()->getContents(), true);

        $clientdatas = [];
        $uniqueOfficeIDs = [];
        foreach($apiDatas as $key=>$apiData) {
            if(!in_array($apiData['OfficeID'], $ucam_office_ids) && $apiData['OfficeID'] != NULL)
            {
                if(!in_array($apiData['OfficeID'], $uniqueOfficeIDs))
                {
                    $uniqueOfficeIDs[] = $apiData['OfficeID'];
                    $clientdatas[] = $apiData;
                }
            }
        }
        //dd($uniqueOfficeIDs);
        foreach($clientdatas as $clientdata)
        {
            //$employee = Profile::firstOrNew(['id' => $clientdata['ID']]);
            $office = new Office;
            $office->name = $clientdata['Office'] ?? NULL;
            $office->ucam_office_id = $clientdata['OfficeID'] ?? NULL;
            $office->save();
        }
        return redirect()->back()->with('success','Data Inserted Successfully');
    }
}
