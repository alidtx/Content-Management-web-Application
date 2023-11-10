<?php

namespace App\Services;

use App\Models\Department;
use App\Models\Faculty;
use Illuminate\Http\Request;

/**
 * Class DepartmentService
 * @package App\Services
 */
class DepartmentService implements IService
{
    //Faculty checking by ucam faculty id if exist then return primarykey or Insert new
    public static function ExistCheck($id, $name)
    {
        $data = Department::where('ucam_department_id', $id)->first();
        if (!is_null($data)) {

            return $data->id;
        } else {

            //$data = Department::Create(['ucam_department_id'=>$id, "name"=> $name]);
            $data = new Department();
            $data->ucam_department_id = $id;
            $data->name = $name;
            $data->save();
            $data->id;
            return $data;
        }
    }

    public static function DepartmentList($data = ['faculty_id' => null])
    {
        $where = [];
        if (@$data['faculty_id']) {
            $where[] = ['faculty_id', '=', $data['faculty_id']];
        }
        $deparment_list = Department::where($where)->get();
        return $deparment_list;
    }
    /**
     * Get all data
     * @return mixed
     */
    public function getAll()
    {
        $data = Department::where('status', 1)->get();
        return $data;
    }
    /**
     * Get a data by id
     * @param $id
     * @return mixed
     */
    public function getByID($id)
    {
        $data = Department::find($id);
        return $data;
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
    public function update(Request $data, $id)
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
}
