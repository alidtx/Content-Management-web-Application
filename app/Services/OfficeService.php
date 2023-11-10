<?php

namespace App\Services;

use App\Models\Office;
use Illuminate\Http\Request;
/**
 * Class OfficeService
 * @package App\Services
 */
class OfficeService implements IService
{
	/**
     * Get all data
     * @return mixed
     */
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
	{}
    /**
     * Get a data by id
     * @param $id
     * @return mixed
     */
    public function getByID($id)
	{
		$data = Office::findOrFail($id);
        
        return $data; 
	}

	public static function ExistCheck($id, $name)
	{
			$data = Office::where('ucam_office_id', $id)->first();
			if(!is_null($data)){

			    return $data->id;
            }else{

                $data = new Office();
                $data->ucam_office_id = $id;
                $data->name = $name;
                $data->save();
                
			    return $data->id;
            }
	}
}
