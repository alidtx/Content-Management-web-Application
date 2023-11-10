<?php

namespace App\Http\Controllers\Backend;

use App\Models\TrainingModel;
use App\Models\TrainingEventModel;
use App\Models\Profile;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TrainingEventController extends Controller
{
    
    public function index($id)
    {  
        //dd('here');
        $training = TrainingModel::find($id);
        $trainer_list = TrainingEventModel::join('profiles','profiles.id', 'training_events.member_id')
        ->where('training_events.type', 1)
        ->where('training_events.training_id', $id)
        ->select('training_events.id','profiles.nameEn','profiles.designation')
        ->get();
        //dd($trainer_list);
        return view('backend.oefcd.training_event.list', compact('trainer_list', 'training'));
    }
    public function trainee_index($id)
    {  
        //dd('here');
        $training = TrainingModel::find($id);
        $trainer_list = TrainingEventModel::join('profiles','profiles.id', 'training_events.member_id')
        ->where('training_events.type', 2)
        ->where('training_events.training_id', $id)
        ->select('training_events.id','profiles.nameEn','profiles.designation')
        ->get(); 
        return view('backend.oefcd.training_event.trainee_list', compact('trainer_list', 'training'));
    }
 
    public function trainer_create($id)
    {
        $training = TrainingModel::find($id);
        $trainer_list = Profile::all();
        return view('backend.oefcd.training_event.add', compact('trainer_list', 'training'));
    }
    public function trainer_store(Request $request)
    {
        //return $request->all();
        $request->validate([
            'training_id' => 'required',
        ],[
            'training_id.required' => 'Title required'
        ]);
        $check_exist = TrainingEventModel::where('member_id', $request->trainer_id)
        ->where('training_id', $request->training_id)
        ->exists();

        if($check_exist){
            return redirect()->route('oefcd.staff.trainer.trainer_create', $request->training_id)->with('error','Trainee Already Exist');
        }

        $trainer_list = new TrainingEventModel();
        $trainer_list->training_id = $request->training_id; 
        $trainer_list->member_id = $request->trainer_id;
        $trainer_list->type = $request->type; 

        $trainer_list->save();

    	return redirect()->route('oefcd.staff.training_event.trainer_list', $request->training_id)->with('success','Trainer Added successfully');

    }
    public function trainee_create($id)
    {
        $training = TrainingModel::find($id);
        $trainer_list = Profile::all();
        return view('backend.oefcd.training_event.trainee_add', compact('trainer_list', 'training'));
    }
    public function trainee_store(Request $request)
    {
        //return $request->all();
        $request->validate([
            'training_id' => 'required',
        ],[
            'training_id.required' => 'Title required'
        ]);

        $check_exist = TrainingEventModel::where('member_id', $request->trainee_id)
        ->where('training_id', $request->training_id)
        ->exists();

        if($check_exist){
            return redirect()->route('oefcd.staff.training_event.trainee_create', $request->training_id)->with('error','Trainee Already Exist');
        }
        $trainer_list = new TrainingEventModel();
        $trainer_list->training_id = $request->training_id; 
        $trainer_list->member_id = $request->trainee_id;
        $trainer_list->type = 2; 

        $trainer_list->save();

    	return redirect()->route('oefcd.staff.training_event.trainee_list', $request->training_id)->with('success','Trainee Added successfully');

    }

    
    public function trainer_edit($id)
    { 
        $editData = TrainingEventModel::find($id);
        //dd($editData->training_id);
        $training = TrainingModel::find($editData->training_id);
        $trainer_list = Profile::all();
        return view('backend.oefcd.training_event.add', compact('editData', 'training', 'trainer_list'));
    }

    public function trainer_update($id, Request $request)
    {
         //return $request->all();
        $request->validate([
            'training_id' => 'required',
        ],[
            'training_id.required' => 'Title required'
        ]);

         
        $trainer_list = TrainingEventModel::find($id);
        $trainer_list->training_id = $request->training_id; 
        $trainer_list->member_id = $request->trainer_id;
        $trainer_list->type = $request->type; 

        $trainer_list->save();

    	return redirect()->route('oefcd.staff.training.list')->with('success','Trainer Update successfully');

    }

    
    public function trainee_edit($id)
    { 
        $editData = TrainingEventModel::find($id);
        $training = TrainingModel::find($editData->training_id);
        $trainer_list = Profile::all();
        //dd($editData->training_id);
        return view('backend.oefcd.training_event.trainee_add', compact('editData', 'training', 'trainer_list'));
    }

    public function trainee_update($id, Request $request)
    {
         //return $request->all();
        $request->validate([
            'training_id' => 'required',
        ],[
            'training_id.required' => 'Title required'
        ]);

         
        $trainer_list = TrainingEventModel::find($id);
        $trainer_list->training_id = $request->training_id; 
        $trainer_list->member_id = $request->trainee_id;
        $trainer_list->type = $request->type; 

        $trainer_list->save();

    	return redirect()->route('oefcd.staff.training.list')->with('success','Trainee Update successfully');

    }



}
