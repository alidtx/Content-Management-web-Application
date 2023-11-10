<?php

namespace App\Http\Controllers\Backend;

use App\Models\TrainingModel;
use App\Models\TrainingEventModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    //
    public function index()
    {
        $trainer_list = TrainingModel::all();
        return view('backend.oefcd.training.list', compact('trainer_list'));
    }

    public function create()
    {
        return view('backend.oefcd.training.add');
    }

    public function store(Request $request)
    {
        //return $request->all();
        $request->validate([
            'title' => 'required',
        ],[
            'title.required' => 'Title required'
        ]);

        $trainer_list = new TrainingModel();
        $trainer_list->title = $request->title;
        $trainer_list->venue = $request->venue;
        $trainer_list->start_at = date('Y-m-d', strtotime($request->start_at));
        $trainer_list->end_at = date('Y-m-d', strtotime($request->end_at));

        $trainer_list->save();

    	return redirect()->route('oefcd.staff.training.list')->with('success','Training Added successfully');

    }

    public function edit($id)
    {
        $editData = TrainingModel::findOrFail($id);
        return view('backend.oefcd.training.add', compact('editData'));
    }

    public function update($id, Request $request)
    {
         //return $request->all();
        $request->validate([
            'title' => 'required',
        ],[
            'title.required' => 'Title required'
        ]);

        $trainer_list = TrainingModel::find($id);
        $trainer_list->title = $request->title;
        $trainer_list->venue = $request->venue;
        $trainer_list->start_at = date('Y-m-d', strtotime($request->start_at));
        $trainer_list->end_at = date('Y-m-d', strtotime($request->end_at));

        $trainer_list->save();

    	return redirect()->route('oefcd.staff.training.list')->with('success','Training Update successfully');

    }



}
