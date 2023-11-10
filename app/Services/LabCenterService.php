<?php

namespace App\Services;

use App\Models\LabCenter;

use Illuminate\Http\Request;
/**
 * Class LabCenterService
 * @package App\Services
 */
class LabCenterService
{
	// This function shows list of LabCenter
	
	public static function LabCenterList()
	{
		try{
			$data = LabCenter::leftJoin('faculties', 'lab_centers.faculty_id', 'faculties.id')
			->leftJoin('departments', 'lab_centers.department_id', 'departments.ucam_department_id')
			->leftJoin('galleries', 'lab_centers.gallery_id', 'galleries.id')
			->select('lab_centers.id','lab_centers.status', 'lab_centers.title as lcname', 'lab_centers.description',
            'departments.name as dname', 'faculties.name  as fname', 'galleries.title as gname')
			->get(); 

            //dd($data['list']);
			
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}

	public static function LabCenterSingleData($id)
	{ 
			$data = LabCenter::find($id);  
			
			return $data; 
	}
    //Annual calendar event add
    public function saveEvent(Request $request)
    {            
        
        //dd($request->department_id);

        try{
            $data = LabCenter::Create($request->all());
            return $data;
            //$data->save();
            //return true;

        }catch(Exception $e){
            return $e;
        }
    }    
    //Annual calendar event edit
    public function updateEvent(Request $request, $id)
    {
        $data = LabCenter::find($id);        
        $data->title = $request->title;
        $data->description = $request->description;
        $data->faculty_id = $request->faculty_id;
        $data->department_id = $request->department_id;
        $data->gallery_id = $request->gallery_id;

        try{
            $data->update();
            return true;

        }catch(Exception $e){
            return $e;
        }
    }
    //Annual calendar event edit
    public function statusChangeEvent(Request $request)
    {
        $data = LabCenter::find($request->id);  
        $data->status = $request->status;
            $data->update();
            return true;

    }



}
