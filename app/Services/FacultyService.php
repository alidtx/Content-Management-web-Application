<?php
namespace App\Services;

use App\Models\Faculty;
use App\Models\ProgramCategory;
use App\Models\Department;
use App\Services\IService;
use Illuminate\Http\Request;

/**
 * Class FacultyService
 * @package App\Services
 */
class FacultyService implements IService
{

public static function All()
{
    $data = Faculty::all();
    return $data;

}
public function getAll()
{

}


    /**
     * Create a new data
     * @param Request $data
     * @return mixed
     */
    public function create(Request $data)
    {

    }

    /**
     * Update a data
     * @param Request $data
     * @param $id
     * @return mixed
     */
    
    public function update(Request $data,$id)
    {

    }
    /**
     * Delete a data
     * @param $id
     * @return mixed
     */
    public function delete($id)
    {

    }
    /**
     * Get a data by id
     * @param $id
     * @return mixed
     */
    public function getByID($id)
    {
        $data = Faculty::findOrFail($id);
        return $data;
    }

public static function programCategory()
{
   try{

    $data=ProgramCategory::take(2)
    ->get();
     return $data;

   }catch(\Exception $e){
    $d['error'] = 'Something wrong';
    return response()->json(["msg"=>$e->getMessage()]);
}
}


public  function facultyHead($data = ['faculty_id'=>null])
	{
        $where = [];
        if(@$data['faculty_id']){
            $where[] = ['id','=',$data['faculty_id']];
        }
       $faculty_head = Faculty::with('profile')->where($where)->first();
       return $faculty_head;
	}
    public  function facultyTamplate($data = ['faculty_id'=>null])
    {
        $where = [];
        if(@$data['faculty_id']){
            $where[] = ['id','=',$data['faculty_id']];
        }
        $faculty_head = Faculty::where($where)->pluck('tamplate')->first();
        return $faculty_head;
    }

    public  function facultyName($data = ['faculty_id'=>null])
    {
        $where = [];
        if(@$data['faculty_id']){
            $where[] = ['id','=',$data['faculty_id']];
        }
        $faculty_head = Faculty::where($where)->pluck('name')->first();
        return $faculty_head;
    }


public  function facultySlider($data = ['faculty_id'=>null])
{
    $where = [];
    if(@$data['faculty_id']){
        $where[] = ['id','=',$data['faculty_id']];
    }
    $slider = Faculty::with('slider')->where($where)->get();
    return $slider;
}


	public static function ExistCheck($id, $name)
	{
			$data = Faculty::where('ucam_faculty_id', $id)->first();
			if(!is_null($data)){

			    return $data->id;
            }else{

                //$data = Department::Create(['ucam_department_id'=>$id, "name"=> $name]);
                $data = new Faculty();
                $data->ucam_faculty_id = $id;
                $data->name = $name;
                $data->save();
                $data->id;
                return $data;
            }
	}
}
