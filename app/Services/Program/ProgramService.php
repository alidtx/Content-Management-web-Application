<?php

namespace App\Services\Program;

use App\Models\Faculty;
use App\Models\Program;
use App\Models\ProgramCategory;
use App\Services\IService;
use Illuminate\Http\Request;

/**
 * Class FacultyService
 * @package App\Services
 */
class ProgramService implements IService
{
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
    /**
     * Get a data by id
     * @param $id
     * @return mixed
     */
    public function getByID($id)
    {
    }

    public function getApiProgramData()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', config('configure.program_api'));
        $apiData = json_decode($res->getBody()->getContents(), true);
        
        return $apiData;
    }

    public function storeApiProgramData()
    {
        $client = new \GuzzleHttp\Client(['verify' => false]);
        $res = $client->request('GET', config('configure.program_api'));
        $apiData = json_decode($res->getBody()->getContents(), true);

        // $clientdata = [];

        foreach($apiData as $key=>$apiDatum) {
            $faculty = Faculty::where('id', $apiDatum['FacultyId'])->first();
            $program_category = ProgramCategory::where('program_category', $apiDatum['ProgramType'])->first();

            $data = new Program();
            $data-> program_category_id = $program_category->id;
            $data->	faculty_id = $faculty->id;
            // $data->	department_id = 0;
            $data->	program_title = $apiDatum['DetailName'];
            $data->	short_title = $apiDatum['ShortName'];
            $data->	ucam_program_id = $apiDatum['ProgramID'];
            $data->	duration = $apiDatum['Duration'];
            $data->	total_credit = $apiDatum['TotalCredit'];

            $data->save();
        }

        return $data;
    }




    // public static function ExistCheck($id, $name)
    // {
    //     $data = Faculty::where('ucam_faculty_id', $id)->first();
    //     if (!is_null($data)) {

    //         return $data->id;
    //     } else {

    //         //$data = Department::Create(['ucam_department_id'=>$id, "name"=> $name]);
    //         $data = new Faculty();
    //         $data->ucam_faculty_id = $id;
    //         $data->name = $name;
    //         $data->save();
    //         $data->id;
    //         return $data;
    //     }
    // }
}
