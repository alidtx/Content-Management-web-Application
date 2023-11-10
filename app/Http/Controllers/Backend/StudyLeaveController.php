<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudyLeave;
use App\Models\Profile;
use App\Services\StudyLeaveService;


class StudyLeaveController extends Controller
{
    public $service;
    public function __construct(StudyLeaveService $service)
    {
        $this->service = $service;
    }

    public function index()
    {
    	$data = StudyLeaveService::viewList();

        return view('backend.study_leave.list',compact('data'));
    }

    public function add()
    {
        $result['profiles'] = Profile::get();
    	return view('backend.study_leave.add', $result);
    }

    public function store(Request $request)
    {
        // return $request->all();
        $data = $request->validate([
            'passport' => 'required|unique:study_leaves,passport',
            'purpose'=>'required',
            'start_by'=>'required',
            'end_by'=>'required',
            'profile_id'=>'required',
            'country'=>'required',

        ]);
        $data['status'] = $request->status;
        $data['type'] = 'store';
        // $service = new StudyLeaveService();
        $this->service->saveData($data);

    	return redirect()->route('manage_leave')->with('success','Data Saved successfully');
    }

    public function edit($id)
    {

    	$data['editData']  = StudyLeave::find($id);

        $data['member_id'] = $id;
        $data['profiles']  = Profile::get();

    	return view('backend.study_leave.edit',$data);
    }


    public function update(Request $request,$id)
    {

        $request->validate([
            'passport' => 'required|unique:study_leaves,passport,'.$id,
        ]);

        $data = $request->all();
        $data['type'] = 'update';

        $this->service->saveData($data,$id);

    	return redirect()->route('manage_leave')->with('success','Data Updated successfully');
    }

    public function delete(Request $request)
    {
    	$data = StudyLeave::find($request->id);
        $data->delete();

        return redirect()->route('manage_leave')->with('success','Data Deleted successfully');
    }

}
