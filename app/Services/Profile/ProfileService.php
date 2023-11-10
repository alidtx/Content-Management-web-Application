<?php

namespace App\Services\Profile;

use App\Models\Department;
use App\Models\Faculty;
use App\Models\Hall;
use App\Models\Page;
use App\Models\Office;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\IService;

/**
 * Class PageService
 * @package App\Services
 */
class ProfileService implements IService
{
    
    public function getAll()
	{
		try{
			$data = Profile::all();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}
    public function create(Request $request)
    {            
        
    }  
	public function getByID($id)
	{ 
        $data = Page::find($id);
        
        return $data; 
	}
    public function update(Request $request, $id)
    {
        
    }

    public function delete($id)
    {
        
    }

    public static function headList($type, $id)
    {
        if ($type == 1) {
            return Faculty::with('profile')->where('id', $id)->first();
        } else if ($type == 2) {
            $newData = Department::join('profiles', 'profiles.id', 'departments.profile_id')->where('departments.id', $id)
                ->select('departments.name as dept_name', 'profiles.*')->first();

            return $newData;
        } else if ($type == 3) {
            $newData = Office::join('profiles', 'profiles.id', 'offices.profile_id')->where('offices.id', $id)
                ->select('offices.name as ref_name', 'profiles.*')->first();
            return $newData;
        } else if ($type == 4) {
            $newData = Hall::join('profiles', 'profiles.id', 'halls.provost')->where('halls.id', $id)
                ->select('halls.name as ref_name', 'profiles.*')->first();
            return $newData;
        }
    }

    public function getFacultyPersonnel()
	{
		try{
			$data = Profile::where('personnel_type', 1)->get();
			return $data;
		}
		catch(\Exception $e){
			$d['error'] = 'Something wrong';
			return response()->json(["msg"=>$e->getMessage()]);
        }
	}

}
