<?php

namespace App\Http\Controllers;

use App\Models\TrainingWorkShopSeminar;
use App\Models\Profile;

use Illuminate\Http\Request;

class TrainingWorkShopSeminarController extends Controller
{

    public function index()
    {

    	$data['traningList'] = TrainingWorkShopSeminar::get();
        return view('backend.workshop_seminar.list', $data);
    }
    public function add()
    {
        $data['offices'] = TrainingWorkShopSeminar::get();
        $data['TrainingWorkShopMember']=Profile::get();
    	return view('backend.workshop_seminar.add', $data);
    }

    public function store(Request $request)
    {
    //    dd($request->all());
        $request->validate([
            'traning'=>'required',
            'work_shop'=>'required',
            'seminar'=>'required',
            'participant'=>'required',
            'schedule'=>'required',
        ]);

    	$data           = new TrainingWorkShopSeminar();
        $data->traning     = $request->traning;
        $data->work_shop     = $request->work_shop;
        $data->seminar	     = $request->work_shop;
        $data->participant     = $request->work_shop;
        $data->schedule     = $request->schedule;
        $data->facilator     = $request->facilator;
        $data->save();
    	return redirect()->route('manage_workshop_seminar')->with('success','Data Saved successfully');
    }


    public function edit($id)
    {
    	$data['editData'] = TrainingWorkShopSeminar::find($id);
        $data['TrainingWorkShopMember'] = TrainingWorkShopSeminar::with('member')->get();
    	return view('backend.workshop_seminar.edit',$data);
    }

    public function update(Request $request,$id)
    {
        $request->validate([

            'traning'=>'required',
            'work_shop'=>'required',
            'seminar'=>'required',
            'participant'=>'required',
            'schedule'=>'required',
        ]);

    	$data           = TrainingWorkShopSeminar::find($id);
        $data->traning     = $request->traning;
        $data->work_shop     = $request->work_shop;
        $data->seminar	     = $request->seminar;
        $data->participant     = $request->participant;
        $data->schedule     = $request->schedule;
        $data->facilator     = $request->facilator;
        $data->save();
    	return redirect()->route('manage_workshop_seminar')->with('success','Data Updated successfully');
    }

    public function delete(Request $request)
    {
    	$data = TrainingWorkShopSeminar::find($request->id);
        $data->delete();
        return redirect()->route('manage_workshop_seminar')->with('success','Data Deleted successfully');
    }




}
