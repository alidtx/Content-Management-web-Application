<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Models\StudyLeave;


/**
 * Class StudyLeaveService
 * @package App\Services
 */
class StudyLeaveService
{

     public static function viewList()
     {
        $data = StudyLeave::with('profile')->latest()->get();
        return $data;
     }

     public function saveData($request,$id=null)
     {
        if($request['type'] === 'store'){
            $data              = new StudyLeave();
            $data->purpose     = $request['purpose'];
            $data->passport    = $request['passport'];
            $data->country     = $request['country'];
            $data->start_by	   = $request['start_by'];
            $data->end_by      = $request['end_by'];
            $data->profile_id  = $request['profile_id'];
            $data->status      = $request['status'];
            $data->save();
        }
        elseif($request['type'] === 'update'){
            $data           = StudyLeave::find($id);
            $data->purpose     = $request['purpose'];
            $data->passport    = $request['passport'];
            $data->country     = $request['country'];
            $data->start_by	   = $request['start_by'];
            $data->end_by      = $request['end_by'];
            $data->profile_id  = $request['profile_id'];
            $data->status      = $request['status'];
            $data->save();
        }

        return $data;
     }
}
