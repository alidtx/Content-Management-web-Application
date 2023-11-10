<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use App\Models\HallMember;
use App\Models\Hall;
use App\Models\SliderMaster;
use App\Models\Profile;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class HallMemberController extends Controller
{

    public function index($id)
    {
        $data['hall_id']=$id;
        $data['hallName']= Hall::get();

        return view('backend.manage_hall_member.view',$data);
    	return view('backend.manage_hall_member.add', $data);
    }


    public function memberWiseHall(Request $request)
    {

        //   dd($request->all());
        // return $request->all();
        $profile = Profile::where('personnel_type',$request->type_id)->get();
        return $profile;
        if(isset($profile))
        {
            return response()->json($profile);
        }
        else
        {
            return response()->json('fail');
        }

    }



    public function Store(Request $request)
    {

    //    return $request->all();

    	$data = new HallMember();
        $data->hall_id = $request->hall_id;
        $data->type_id = $request->type_id;
        $data->member_id = $request->member_id;
        $data->status = $request->status;
        $data->save();
    	return redirect()->route('setup.manage_hall_member',$data->hall_id)->with('success','Data Saved successfully');
    }

    public function Edit($id)
    {
        $data['hall_id'] = $id;
        $data['profiles']=Profile::get();
        $data['hallEdit']=HallMember::find($id);

        return view('backend.manage_hall_member.edit', $data);

    	// return view('backend.manage_hall_member.edit',$data);
    }



    public function Update(Request $request,$id)
    {

       // return $request->all();
    	$data = HallMember::find($id);
        $data->hall_id = $request->hall_id;
        $data->type_id = $request->type_id;
        $data->member_id = $request->member_id;
        $data->status = $request->status;

        $data->save();
    	// return redirect()->route('setup.manage_hall')->with('success','Data Updated successfully');
        return redirect()->route('setup.manage_hall_member',$data->hall_id)->with('success','Data Updated successfully');
    }











}
