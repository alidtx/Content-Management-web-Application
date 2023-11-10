<?php
namespace App\Services;

use App\Models\PersonnelsToFaculty;
use Illuminate\Http\Request;
/**
 * Class DeanHonorBoardService
 * @package App\Services
 */
class PersonnelsToFacultyService
{

    public function statusChangeEvent(Request $request)
    {
        $data = PersonnelsToFaculty::find($request->id);
        //DD('HERE') ;
        $data->status = $request->status;
        $data->update();
        return true;
    }

    public  function faculty_members($data = ['faculty_id'=>null])
	{
        $where = [];
        if(@$data['faculty_id']){
            $where[] = ['faculty_id','=',$data['faculty_id']];
        }
       $faculty_members = PersonnelsToFaculty::with('profile', 'faculty')->where($where)->get();
       return $faculty_members;
	}


}
