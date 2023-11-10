<?php

namespace App\Services;

use Illuminate\Database\Eloquent\SoftDeletes; 
use App\Models\LandingModal;
use Illuminate\Http\Request;

/**
 * Class LandingModalService
 * @package App\Services
 */
class LandingModalService
{
	// This function shows list of LandingModal
	
	public static function LandingModalList()
	{ 
		try{
			$data = LandingModal::leftJoin('faculties', 'landing_modals.faculty_id', 'faculties.ucam_faculty_id')
			->leftJoin('departments', 'landing_modals.department_id', 'departments.ucam_department_id')
			->select('landing_modals.id','landing_modals.status', 'landing_modals.name', 'landing_modals.description',
            'landing_modals.use_for', 'departments.name as dname', 'faculties.name  as fname')
			->orderBy('id', 'DESC')->get();  
			
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}
 
    public function saveEvent(Request $request)
    {             
        $data = LandingModal::Create($request->all());
        return $data;  
    }    
	public static function ModlSingleData($id)
	{ 
			$data = LandingModal::find($id);  
			
			return $data; 
	}

    public function updateEvent(Request $request, $id)
    {
        $data = LandingModal::find($id);        
        $data->name = $request->name;
        $data->description = $request->description;
        $data->use_for = $request->use_for;  
        $data->department_id = $request->department_id;  
        $data->faculty_id = $request->faculty_id;  
        try{
            $data->update();
            return true;

        }catch(Exception $e){
            return $e;
        }
    }
    public function statusChangeEvent(Request $request)
    {
        $data = LandingModal::find($request->id);  
        $data->status = $request->status;
            $data->update();
            return true;

    }

}
